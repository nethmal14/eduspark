<?php
// includes/config.php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Shared hosting would change this
define('DB_PASS', '');
define('DB_NAME', 'eduspark_db');

define('SITE_URL', 'http://localhost/eduspark'); // Update for production
define('SITE_NAME', 'EduSpark');
define('SITE_DESC', 'Sri Lankan Student Platform for O/L and A/L students.');

// GitHub Live Updater configuration
define('GITHUB_REPO_URL', 'https://github.com/nethmal14/eduspark.git');
define('GITHUB_ZIP_URL', 'https://github.com/nethmal14/eduspark/archive/refs/heads/main.zip');

