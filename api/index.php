<?php

// Forward Vercel requests to Laravel's public/index.php

// Change to the public directory
chdir(__DIR__ . '/../public');

// Include the Laravel application
require __DIR__ . '/../public/index.php';
