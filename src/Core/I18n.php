<?php

namespace WpPluginBoilerplate\Core;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 */
class I18n
{
    public function __construct($loader)
    {
        $loader->add_action('plugins_loaded', $this, 'load_plugin_textdomain');
    }

    /**
     * Load the plugin text domain for translation.
     */
    public function load_plugin_textdomain()
    {
        load_plugin_textdomain(
            'wp-plugin-boilerplate',
            false,
            dirname(dirname(plugin_basename(__FILE__))).'/languages/'
        );
    }
}
