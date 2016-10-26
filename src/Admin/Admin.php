<?php

namespace WpPluginBoilerplate\Admin;

/**
 * Admin-specific functionality.
 */
class Admin
{
    public function __construct($loader, $assets, $templating)
    {
        $assets->add_style('admin/css/admin.css');
        $assets->add_script('admin/js/admin.js');
    }
}
