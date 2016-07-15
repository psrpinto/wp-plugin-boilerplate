<?php

namespace WpPluginBoilerplate\Core;

/**
 * Templating engine.
 */
class Templating
{
    /**
     * Render a template.
     *
     * @param string $path Path to the template to render, relative to the
     *                     `templates/` directory
     * @param array  $data This array can be referenced in the template.
     */
    public function render($path, $data = [])
    {
        include realpath(__DIR__."/../../templates/$path.php");
    }
}
