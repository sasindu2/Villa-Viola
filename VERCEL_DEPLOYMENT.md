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
4. Vercel will automatically detect the configuration

### 3. **Environment Variables**
Set these in your Vercel dashboard:

**Required:**
- `APP_KEY` - Generate with: `php artisan key:generate --show`
- `APP_URL` - Your Vercel domain (e.g., `https://villa-viola.vercel.app`)

**Database (if using):**
- `DB_CONNECTION=mysql`
- `DB_HOST=your-database-host`
- `DB_PORT=3306`
- `DB_DATABASE=your-database-name`
- `DB_USERNAME=your-username`
- `DB_PASSWORD=your-password`

**Mail (if using):**
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
├── build.sh             # Build script
└── vite.config.js       # Vite configuration
```

## ⚙️ Build Process

The build process (`build.sh`):
1. Installs PHP dependencies with Composer
2. Installs and builds frontend assets with npm/Vite
3. Optimizes Laravel for production
4. Caches configuration, routes, and views

## 🌐 Features

- ✅ Server-side rendering with Laravel
- ✅ Client-side React with Inertia.js
- ✅ Optimized static asset serving
- ✅ Production-ready caching headers
- ✅ Automatic build optimization

## 📝 Notes

- The website uses both Laravel backend and React frontend
- Static assets are served directly by Vercel's CDN
- Form submissions work via AJAX (no page reloads)
- Multi-language support (English/Italian)

## 🆘 Troubleshooting

**Build fails?**
- Check that all environment variables are set
- Verify `composer.json` and `package.json` are valid
- Ensure `.env.example` exists with all required keys

**404 errors?**
- Check Vercel function logs
- Verify routes in `vercel.json`
- Ensure `api/index.php` is correctly configured
