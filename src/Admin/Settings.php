<?php

namespace WpPluginBoilerplate\Admin;

class Settings
{
    private $templating;

    public function __construct($loader, $templating)
    {
        $this->templating = $templating;

        $loader->add_action('admin_menu', $this, 'admin_menu');
    }

    public function admin_menu()
    {
        add_options_page(
            __('WP Plugin Boilerplate', 'wp-plugin-boilerplate'),
            __('WP Plugin Boilerplate', 'wp-plugin-boilerplate'),
            'manage_options',
            'wp-plugin-boilerplate',
            array($this, 'render')
        );
    }

    public function render()
    {
        $this->templating->render('admin/settings');
    }
}
