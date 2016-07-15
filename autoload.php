<?php

namespace WpPluginBoilerplate;

spl_autoload_register(function ($class) {
    // We only autoload classes in our namespace
    if (strpos($class, __NAMESPACE__) === false) {
        return;
    }

    // Our classes are directly under a `src/` directory and not under a directory
    // with the same name as the namespace. Because of this, we remove the
    // namespace from the path.
    $class = str_replace(['\\', __NAMESPACE__], [DIRECTORY_SEPARATOR, ''], $class);

    require_once realpath(plugin_dir_path(__FILE__)."src$class.php");
});
