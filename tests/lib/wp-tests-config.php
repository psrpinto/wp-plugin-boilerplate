<?php

/* Path to the WordPress codebase you'd like to test. Add a forward slash in the end. */
define('ABSPATH', 'vendor/johnpbloch/wordpress/');

// Test with multisite enabled.
// Alternatively, use the tests/phpunit/multisite.xml configuration file.
// define('WP_TESTS_MULTISITE', true);

// Force known bugs to be run.
// Tests with an associated Trac ticket that is still open are normally skipped.
// define('WP_TESTS_FORCE_KNOWN_BUGS', true);

// Test with WordPress debug mode (default).
define('WP_DEBUG', true);

// This configuration file will be used by the copy of WordPress being tested.
// wordpress/wp-config.php will be ignored.

// !!!!! WARNING !!!!!
// These tests will DROP ALL TABLES in the database with the prefix named below.
// DO NOT use a production database or one that is shared with something else.

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

if (file_exists(__DIR__.'/../wp-tests-config-local.php')) {
    $locals = include __DIR__.'/../wp-tests-config-local.php';
}

if (getenv('DB_HOST')) {
    define('DB_HOST', getenv('DB_HOST'));
} elseif (isset($locals['DB_HOST'])) {
    define('DB_HOST', $locals['DB_HOST']);
} else {
    define('DB_HOST', 'localhost');
}

define('DB_NAME', getenv('DB_NAME') ? getenv('DB_NAME') : @$locals['DB_NAME']);
define('DB_USER', getenv('DB_USER') ? getenv('DB_USER') : @$locals['DB_USER']);
define('DB_PASSWORD', getenv('DB_PASSWORD') ? getenv('DB_PASSWORD') : @$locals['DB_PASSWORD']);

if (!DB_NAME || !DB_USER || !DB_PASSWORD) {
    die('You must define your test DB_NAME, DB_USER and DB_PASSWORD in a tests/wp-tests-config-local.php file or as environment variables');
}

$table_prefix = 'wptests_';   // Only numbers, letters, and underscores

define('WP_TESTS_DOMAIN', 'example.org');
define('WP_TESTS_EMAIL', 'admin@example.org');
define('WP_TESTS_TITLE', 'Test Blog');

define('WP_PHP_BINARY', 'php');

define('WPLANG', '');
