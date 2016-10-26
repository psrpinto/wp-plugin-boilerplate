<?php

namespace WpPluginBoilerplate\Core;

class Assets
{
    private $plugin_id;
    private $plugin_version;
    private $base_dir;

    private $styles = array();
    private $scripts = array();

    public function __construct($plugin_id, $plugin_version, $loader, $is_admin, $base_dir = 'static')
    {
        $this->plugin_id = $plugin_id;
        $this->plugin_version = $plugin_version;
        $this->base_dir = plugin_dir_url(realpath(__DIR__.'/../')).$base_dir;

        if ($is_admin) {
            $loader->add_action('admin_enqueue_scripts', $this, 'enqueue_styles');
            $loader->add_action('admin_enqueue_scripts', $this, 'enqueue_scripts');
        } else {
            $loader->add_action('wp_enqueue_scripts', $this, 'enqueue_styles');
            $loader->add_action('wp_enqueue_scripts', $this, 'enqueue_scripts');
        }
    }

    public function add_style($path, $deps = array(), $media = 'all')
    {
        $this->styles[] = array(
            'path'  => $path,
            'deps'  => $deps,
            'media' => $media,
        );
    }

    public function add_script($path, $deps = array('jquery'), $in_footer = true)
    {
        $this->scripts[] = array(
            'path'      => $path,
            'deps'      => $deps,
            'in_footer' => $in_footer,
        );
    }

    private function id($path)
    {
        return $this->plugin_id.'-'.str_replace(DIRECTORY_SEPARATOR, '-', $path);
    }

    private function url($path)
    {
        return $this->base_dir.'/'.$path;
    }

    public function enqueue_styles()
    {
        foreach ($this->styles as $style) {
            wp_enqueue_style(
                $this->id($style['path']),
                $this->url($style['path']),
                $style['deps'],
                $this->plugin_version,
                $style['media']
            );
        }
    }

    public function enqueue_scripts()
    {
        foreach ($this->scripts as $script) {
            wp_enqueue_script(
                $this->id($script['path']),
                $this->url($script['path']),
                $script['deps'],
                $this->plugin_version,
                $script['in_footer']
            );
        }
    }
}
