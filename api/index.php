<?php

// Vercel entry point for Laravel application

$projectRoot = dirname(__DIR__);
chdir($projectRoot);

define('LARAVEL_START', microtime(true));

if (!file_exists($projectRoot . '/vendor/autoload.php')) {
    http_response_code(500);
    echo "Laravel dependencies not found.";
    exit(1);
}

if (!file_exists($projectRoot . '/.env') && file_exists($projectRoot . '/.env.example')) {
    copy($projectRoot . '/.env.example', $projectRoot . '/.env');
}

chdir($projectRoot . '/public');
require $projectRoot . '/public/index.php';
