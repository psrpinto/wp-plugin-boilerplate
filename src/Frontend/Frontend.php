<?php

namespace WpPluginBoilerplate\Frontend;

/**
 * Frontend-facing functionality.
 */
class Frontend
{
    public function __construct($loader, $assets, $templating)
    {
        $assets->add_style('frontend/css/frontend.css');
        $assets->add_script('frontend/js/frontend.js');
    }
}
