<?php

namespace WpPluginBoilerplate;

spl_autoload_register(function ($class) {
    // Only autoload classes in our namespace
    if (strpos($class, __NAMESPACE__) === false) {
        return;
    }

    // Classes are directly under a `src/` (or `lib/`) directory and not under a
    // directory with the same name as the namespace. Because of this, we remove
    // the namespace from the path.
    $class = str_replace(array('\\', __NAMESPACE__), array(DIRECTORY_SEPARATOR, ''), $class);

    $base_dir = plugin_dir_path(__FILE__);
    $src_class = $base_dir.'src'.$class.'.php';

    if (!file_exists($src_class)) {
        // Try to load from lib/
        return require_once realpath($base_dir.'lib'.$class.'.php');
    }

    require_once realpath($src_class);
});
