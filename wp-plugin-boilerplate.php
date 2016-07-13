<?php

namespace WpPluginBoilerplate;

use WpPluginBoilerplate\Core\Activator;
use WpPluginBoilerplate\Core\Plugin;

/*
 * The plugin bootstrap file.
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @wordpress-plugin
 * Plugin Name:       WP Plugin Boilerplate
 * Plugin URI:        https://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        https://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-plugin-boilerplate
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

spl_autoload_register(function ($class) {
    if (strpos($class, $root_namespace = 'WpPluginBoilerplate') === false) {
        return;
    }

    $path = plugin_dir_path(__FILE__).'src';
    foreach (explode('\\', $class) as $token) {
        if ($token === $root_namespace) {
            continue;
        }

        $path .= DIRECTORY_SEPARATOR.$token;
    }

    require_once $path.'.php';
});

// Plugin activation
register_activation_hook(__FILE__, function () {
    Activator::activate();
});

// Plugin deactivation
register_deactivation_hook(__FILE__, function () {
    Activator::deactivate();
});

/*
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks, then kicking off
 * the plugin from this point in the file does not affect the page life cycle.
 */
(new Plugin())->run();
