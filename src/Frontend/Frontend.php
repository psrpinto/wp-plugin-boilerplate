<?php

namespace WpPluginBoilerplate\Frontend;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 */
class Frontend
{
    /**
     * The ID of this plugin.
     *
     * @var string The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @var string The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of the plugin.
     * @param string $version     The version of this plugin.
     */
    public function __construct($plugin_name, $version, $loader)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        $loader->add_action('wp_enqueue_scripts', $this, 'enqueue_styles');
        $loader->add_action('wp_enqueue_scripts', $this, 'enqueue_scripts');
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     */
    public function enqueue_styles()
    {
        wp_enqueue_style($this->plugin_name, $this->asset_path('css/frontend.css'), [], $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     */
    public function enqueue_scripts()
    {
        wp_enqueue_script($this->plugin_name, $this->asset_path('js/frontend.js'), ['jquery'], $this->version, false);
    }

    private function asset_path($file)
    {
        return plugin_dir_url(realpath(__DIR__.'/../')).'assets/frontend/'.$file;
    }
}
