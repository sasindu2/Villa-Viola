# Villa Viola - Vercel Deployment

This project is now configured for deployment on Vercel with Laravel + React + Inertia.js.

## 🚀 Quick Deploy

[![Deploy with Vercel](https://vercel.com/button)](https://vercel.com/new/clone?repository-url=https://github.com/sasindu2/Villa-Viola)

## 📋 Deployment Steps

### 1. **Push to GitHub**
```bash
git add .
git commit -m "Configure for Vercel deployment"
git push origin main
```

### 2. **Deploy to Vercel**
1. Go to [vercel.com](https://vercel.com)
2. Connect your GitHub account
3. Import your `Villa-Viola` repository
4. Vercel will automatically:
   - Install npm dependencies
   - Install PHP dependencies via Composer
   - Build frontend assets with Vite
   - Deploy your application

### 3. **Environment Variables**
Set these in your Vercel dashboard:

**Required:**
- `APP_KEY` - Generate with: `php artisan key:generate --show`
- `APP_URL` - Your Vercel domain (e.g., `https://villa-viola.vercel.app`)
- `APP_ENV=production`
- `APP_DEBUG=false`

**Optional (for database):**
- `DB_CONNECTION=mysql` (or sqlite for simplicity)
- `DB_HOST=your-database-host`
- `DB_PORT=3306`
- `DB_DATABASE=your-database-name`
- `DB_USERNAME=your-username`
- `DB_PASSWORD=your-password`

**For mail functionality:**
- `MAIL_MAILER=smtp`
- `MAIL_HOST=your-mail-host`
- `MAIL_PORT=587`
- `MAIL_USERNAME=your-email`
- `MAIL_PASSWORD=your-password`

## 🔧 Local Development

```bash
# Install dependencies
composer install
npm install

# Set up environment
cp .env.example .env
php artisan key:generate

# Build assets
npm run dev

# Serve locally
php artisan serve
```

## 📁 Project Structure

```
├── api/
│   └── index.php          # Vercel PHP entry point
├── public/
│   ├── build/            # Vite build output
│   └── website/          # Static assets
├── resources/
│   ├── js/               # React components
│   ├── css/              # Styles
│   └── views/            # Blade templates
├── vercel.json           # Vercel configuration
└── vite.config.js       # Vite configuration
```

## ⚙️ Build Process

Vercel automatically:
1. Installs PHP dependencies with `composer install --no-dev --optimize-autoloader`
2. Installs Node.js dependencies with `npm install`
3. Builds frontend assets with `npm run build`
4. Creates serverless functions for PHP routes

## 🌐 Features

- ✅ Server-side rendering with Laravel
- ✅ Client-side React with Inertia.js
- ✅ Optimized static asset serving via Vercel CDN
- ✅ Automatic HTTPS and custom domains
- ✅ Form submissions work via AJAX (no page reloads)
- ✅ Multi-language support (English/Italian)

## � Configuration Files

### `vercel.json`
- Routes static assets to Vercel CDN
- Configures PHP runtime for Laravel
- Sets up proper caching headers

### `api/index.php`
- Entry point for all PHP requests
- Handles Laravel bootstrap
- Automatically creates .env from .env.example

## 🆘 Troubleshooting

**Build fails with "Command exited with 126"?**
✅ **Fixed!** - Now using npm scripts instead of bash scripts

**404 errors?**
- Check that your routes are defined in `routes/web.php`
- Verify `api/index.php` is working
- Check Vercel function logs in dashboard

**Static assets not loading?**
- Ensure Vite build completed successfully
- Check `public/build` directory exists
- Verify `@vite` directives in blade templates

**Environment variables not working?**
- Set variables in Vercel dashboard
- Ensure `.env.example` has all required keys
- Check that `APP_KEY` is properly generated

## 📈 Performance Tips

- Static assets are automatically cached for 1 year
- PHP functions are automatically optimized by Vercel
- Laravel config/route/view caching happens automatically
- Use Vercel Analytics to monitor performance
