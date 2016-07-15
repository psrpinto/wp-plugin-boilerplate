<?php

namespace WpPluginBoilerplate\Core;

use WpPluginBoilerplate\Admin\Admin;
use WpPluginBoilerplate\Frontend\Frontend;

/**
 * The core plugin class.
 */
class Plugin
{
    /**
     * The plugin's unique id.
     *
     * @var string
     */
    private $id;

    /**
     * @var Loader
     */
    private $loader;

    public function __construct($id, $version)
    {
        $this->id = $id;

        $this->loader = new Loader();
        $this->loader->add_action('plugins_loaded', $this, 'load_plugin_textdomain');

        $assets = new Assets($id, $version, $this->loader, is_admin());
        $templating = new Templating();

        if (is_admin()) {
            new Admin($this->loader, $assets, $templating);
        } else {
            new Frontend($this->loader, $assets, $templating);
        }
    }

    /**
     * Run the plugin.
     */
    public function run()
    {
        $this->loader->register_hooks();
    }

    /**
     * Load internationalization files.
     */
    public function load_plugin_textdomain()
    {
        load_plugin_textdomain(
            $this->id,
            $deprecated = false,
            __DIR__.'/../../languages/'
        );
    }
}
