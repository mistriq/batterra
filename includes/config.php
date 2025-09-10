<?php
// Site Configuration
define('SITE_NAME', 'Batterra');
define('SITE_URL', 'https://www.batterra.cz');
define('SITE_EMAIL', 'info@batterra.cz');
define('SITE_PHONE', '+420 xxx xxx xxx');
define('SITE_ADDRESS', 'Batterra a.s., Praha');

// Database Configuration (for future CMS integration)
define('DB_HOST', 'localhost');
define('DB_NAME', 'batterra_db');
define('DB_USER', 'batterra_user');
define('DB_PASS', '');

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Include utility functions
require_once __DIR__ . '/functions.php';
?>