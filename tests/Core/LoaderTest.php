<?php

namespace WpPluginBoilerplate\Tests\Core;

use WpPluginBoilerplate\Core\Loader;

class LoaderTest extends \TestCase
{
    public function setUp()
    {
        $this->loader = new Loader();
    }

    public function test_add_action()
    {
        $this->loader->add_action('foo_action', 'foo_component', 'foo_function');
        $this->loader->register_hooks();

        $this->assertHookIsRegistered('foo_action', 'foo_component', 'foo_function');
    }

    public function test_add_filter()
    {
        $this->loader->add_filter('foo_filter', 'foo_component', 'foo_function');
        $this->loader->register_hooks();

        $this->assertHookIsRegistered('foo_filter', 'foo_component', 'foo_function');
    }
}
