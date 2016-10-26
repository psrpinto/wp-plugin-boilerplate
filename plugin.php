<?php

/*
 * The plugin bootstrap file.
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation, deactivation and uninstall hooks and finally runs
 * the plugin.
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

register_activation_hook(__FILE__, array('WpPluginBoilerplate\Lifecycle', 'activate'));
register_deactivation_hook(__FILE__, array('WpPluginBoilerplate\Lifecycle', 'deactivate'));

$wpPluginBoilerplateId = 'wp-plugin-boilerplate';
$wpPluginBoilerplateVersion = '1.0.0';

$WpPluginBoilerplatePlugin = new WpPluginBoilerplate\Core\Plugin($wpPluginBoilerplateId, $wpPluginBoilerplateVersion);
$WpPluginBoilerplatePlugin->run();

if (class_exists('WP_CLI')) {
    // Register WP-CLI commands
    foreach (glob(__DIR__.'/src/Command/*Command.php') as $path) {
        $class = '\\WpPluginBoilerplate\\'.str_replace(array(__DIR__.'/src/', '.php', '/'), array('', '', '\\'), $path);

        // Read the @slug annotation from the PHPDoc of the class
        $reflection = new ReflectionClass(new $class());
        preg_match_all('/@slug (.*?)\n/s', $reflection->getDocComment(), $annotations);
        $slug = array_pop($annotations[1]);

        if (!empty($slug)) {
            WP_CLI::add_command($slug, $class);
        }
    }
}
