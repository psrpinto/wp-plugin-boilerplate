<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit; // Forbid direct execution
}

require_once __DIR__.'/autoload.php';

WpPluginBoilerplate\Lifecycle::uninstall();
