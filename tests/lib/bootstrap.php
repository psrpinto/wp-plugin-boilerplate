<?php

// Give access to tests_add_filter() function
require_once __DIR__.'/includes/functions.php';

// Manually load the plugin being tested
tests_add_filter('muplugins_loaded', function () {
    require __DIR__.'/../../plugin.php';
});

// Start up the WP testing environment
require __DIR__.'/includes/bootstrap.php';
require __DIR__.'/../TestCase.php';
