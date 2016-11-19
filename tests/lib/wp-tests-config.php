<?php

// This configuration file will be used by the copy of WordPress being tested.
// wordpress/wp-config.php will be ignored.
//
// !!!!! WARNING !!!!!
// These tests will DROP ALL TABLES in the database with the prefix named below.
// DO NOT use a production database or one that is shared with something else.

require_once __DIR__.'/../../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__.'/../', getenv('TRAVIS') ? '.env.travis' : '.env');
$dotenv->overload();
$dotenv->required(array('DB_HOST', 'DB_NAME', 'DB_USER'));

define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));

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

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

$table_prefix = 'wptests_';   // Only numbers, letters, and underscores

define('WP_TESTS_DOMAIN', 'example.org');
define('WP_TESTS_EMAIL', 'admin@example.org');
define('WP_TESTS_TITLE', 'Test Blog');

define('WP_PHP_BINARY', 'php');

define('WPLANG', '');
