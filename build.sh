#!/bin/bash

# Vercel build script for Laravel + Vite + React

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install and build frontend assets
npm ci
npm run build

# Copy built assets to public directory for Vercel
if [ -d "public/build" ]; then
    echo "Copying built assets..."
    cp -r public/build/* public/ 2>/dev/null || echo "No files to copy"
fi

# Set up Laravel for production
cp .env.example .env
php artisan key:generate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Build completed successfully!"
