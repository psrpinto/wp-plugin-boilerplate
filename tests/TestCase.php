<?php

abstract class TestCase extends \WP_UnitTestCase
{
    protected function assertHookIsRegistered($hook, $component, $function)
    {
        global $wp_filter;
        $found = false;

        if (isset($wp_filter[$hook])) {
            foreach ($wp_filter[$hook] as $hook) {
                foreach ($hook as $key => $hook) {
                    $found = $key === $component.'::'.$function;
                    $found = $found && $hook['function'][0] === $component;
                    $found = $found && $hook['function'][1] === $function;

                    if ($found) {
                        goto ret;
                    }
                }
            }
        }

        ret:
            $this->assertTrue($found);
    }
}
