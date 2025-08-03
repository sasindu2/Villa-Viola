const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

console.log('🚀 Starting Vercel build process...');

try {
    // Copy .env.example to .env if it doesn't exist
    if (!fs.existsSync('.env')) {
        console.log('📋 Creating .env file...');
        fs.copyFileSync('.env.example', '.env');
    }

    // Generate Laravel app key
    console.log('🔑 Generating Laravel app key...');
    try {
        execSync('php artisan key:generate --force', { stdio: 'inherit' });
    } catch (error) {
        console.log('⚠️  Could not generate app key (this is normal on Vercel)');
    }

    // Copy built assets to public directory if they exist
    const buildDir = path.join('public', 'build');
    if (fs.existsSync(buildDir)) {
        console.log('📁 Copying built assets...');
        
        // Get all files from build directory
        const files = fs.readdirSync(buildDir, { recursive: true });
        
        files.forEach(file => {
            const srcPath = path.join(buildDir, file);
            const destPath = path.join('public', file);
            
            if (fs.statSync(srcPath).isFile()) {
                // Create directory if it doesn't exist
                const destDir = path.dirname(destPath);
                if (!fs.existsSync(destDir)) {
                    fs.mkdirSync(destDir, { recursive: true });
                }
                
                // Copy file
                fs.copyFileSync(srcPath, destPath);
                console.log(`  ✅ Copied: ${file}`);
            }
        });
    } else {
        console.log('⚠️  No build directory found');
    }

    // Try to optimize Laravel for production
    console.log('⚡ Optimizing Laravel...');
    try {
        execSync('php artisan config:cache', { stdio: 'inherit' });
        execSync('php artisan route:cache', { stdio: 'inherit' });
        execSync('php artisan view:cache', { stdio: 'inherit' });
    } catch (error) {
        console.log('⚠️  Laravel optimization failed (this is normal on Vercel)');
    }

    console.log('✅ Build completed successfully!');
    
} catch (error) {
    console.error('❌ Build failed:', error.message);
    process.exit(1);
}
