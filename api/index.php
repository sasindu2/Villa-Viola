<?php

// Vercel entry point for Laravel application

// Set the current working directory to the project root
$projectRoot = dirname(__DIR__);
chdir($projectRoot);

// Ensure we have the correct paths
define('LARAVEL_START', microtime(true));

// Check if Laravel is properly set up
if (!file_exists($projectRoot . '/vendor/autoload.php')) {
    http_response_code(500);
    echo "Laravel dependencies not found. Please run 'composer install'.";
    exit(1);
}

// Check if .env exists, if not copy from .env.example
if (!file_exists($projectRoot . '/.env') && file_exists($projectRoot . '/.env.example')) {
    copy($projectRoot . '/.env.example', $projectRoot . '/.env');
}

// Set working directory to public for Laravel
chdir($projectRoot . '/public');

// Include Laravel application
require $projectRoot . '/public/index.php';
