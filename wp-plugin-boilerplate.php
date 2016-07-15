<?php

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

if (!defined('WPINC')) {
    die; // Forbid direct execution
}

require_once __DIR__.'/autoload.php';

register_activation_hook(__FILE__, ['WpPluginBoilerplate\Core\Lifecycle', 'activate']);
register_deactivation_hook(__FILE__, ['WpPluginBoilerplate\Core\Lifecycle', 'deactivate']);

(new WpPluginBoilerplate\Core\Plugin('wp-plugin-boilerplate', '1.0.0'))->run();
