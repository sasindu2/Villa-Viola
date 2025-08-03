# Multi-stage build for optimized Laravel + React application

### Stage 1: Node.js build stage for frontend assets
FROM node:18-alpine AS node-builder

WORKDIR /app

# Copy package files for dependency installation
COPY package*.json ./

# Install all dependencies (including dev dependencies needed for build)
RUN npm ci && npm cache clean --force

# Copy source code (excluding items in .dockerignore)
COPY . .

# Build frontend assets with Vite
RUN npm run build

### Stage 2: PHP Production Image
FROM php:8.2-fpm-alpine AS production

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apk add --no-cache \
    zip \
    unzip \
    curl \
    git \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    oniguruma-dev \
    sqlite \
    sqlite-dev \
    nginx \
    supervisor \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo \
        pdo_mysql \
        pdo_sqlite \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        opcache

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copy application files
COPY . /var/www

# Copy built frontend assets from node-builder stage
COPY --from=node-builder /app/public/build /var/www/public/build

# Set proper permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy environment file and generate app key
COPY .env.example .env
RUN php artisan key:generate

# Configure PHP-FPM
RUN echo "pm.max_children = 10" >> /usr/local/etc/php-fpm.d/www.conf \
    && echo "pm.start_servers = 3" >> /usr/local/etc/php-fpm.d/www.conf \
    && echo "pm.min_spare_servers = 2" >> /usr/local/etc/php-fpm.d/www.conf \
    && echo "pm.max_spare_servers = 4" >> /usr/local/etc/php-fpm.d/www.conf \
    && echo "pm.max_requests = 200" >> /usr/local/etc/php-fpm.d/www.conf

# Configure PHP for production
RUN echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.memory_consumption=128" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.interned_strings_buffer=8" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.max_accelerated_files=4000" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.revalidate_freq=60" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.fast_shutdown=1" >> /usr/local/etc/php/conf.d/opcache.ini

# Configure Nginx
COPY <<EOF /etc/nginx/nginx.conf
user www-data;
worker_processes auto;
pid /run/nginx.pid;

events {
    worker_connections 1024;
    use epoll;
    multi_accept on;
}

http {
    include /etc/nginx/mime.types;
    default_type application/octet-stream;
    
    log_format main '\$remote_addr - \$remote_user [\$time_local] "\$request" '
                    '\$status \$body_bytes_sent "\$http_referer" '
                    '"\$http_user_agent" "\$http_x_forwarded_for"';
    
    access_log /var/log/nginx/access.log main;
    error_log /var/log/nginx/error.log warn;
    
    sendfile on;
    tcp_nopush on;
    tcp_nodelay on;
    keepalive_timeout 65;
    types_hash_max_size 2048;
    client_max_body_size 20M;
    
    gzip on;
    gzip_vary on;
    gzip_min_length 10240;
    gzip_proxied expired no-cache no-store private must-revalidate no_last_modified no_etag auth;
    gzip_types
        text/plain
        text/css
        text/xml
        text/javascript
        application/x-javascript
        application/xml+rss
        application/javascript
        application/json;
    
    include /etc/nginx/conf.d/*.conf;
}
EOF

# Create Nginx virtual host
COPY <<EOF /etc/nginx/conf.d/default.conf
server {
    listen 80;
    server_name localhost;
    root /var/www/public;
    index index.php index.html;

    # Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-XSS-Protection "1; mode=block" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header Referrer-Policy "no-referrer-when-downgrade" always;
    add_header Content-Security-Policy "default-src 'self' http: https: data: blob: 'unsafe-inline'" always;

    # Handle static assets
    location ~* \.(js|css|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
        try_files \$uri =404;
    }

    # Laravel application
    location / {
        try_files \$uri \$uri/ /index.php?\$query_string;
    }

    # PHP handler
    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_param SCRIPT_FILENAME \$realpath_root\$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    # Deny access to hidden files
    location ~ /\. {
        deny all;
    }
}
EOF

# Configure Supervisor
COPY <<EOF /etc/supervisor/conf.d/supervisord.conf
[supervisord]
nodaemon=true
user=root
logfile=/var/log/supervisor/supervisord.log
pidfile=/var/run/supervisord.pid

[program:nginx]
command=nginx -g "daemon off;"
autostart=true
autorestart=true
stderr_logfile=/var/log/nginx/error.log
stdout_logfile=/var/log/nginx/access.log

[program:php-fpm]
command=php-fpm -F
autostart=true
autorestart=true
stderr_logfile=/var/log/php-fpm.log
stdout_logfile=/var/log/php-fpm.log
EOF

# Create log directories
RUN mkdir -p /var/log/supervisor /var/log/nginx

# Expose port
EXPOSE 80

# Start supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
