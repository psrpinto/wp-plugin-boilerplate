<?php

namespace WpPluginBoilerplate\Core;

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered through the plugin, and
 * registers them with the WordPress API when the `run` function is called.
 */
class Loader
{
    /**
     * The array of actions to be registered with WordPress.
     *
     * @var array
     */
    private $actions;

    /**
     * The array of filters to be registered with WordPress.
     *
     * @var array
     */
    private $filters;

    public function __construct()
    {
        $this->actions = [];
        $this->filters = [];
    }

    /**
     * Add a new action to be registered with WordPress.
     *
     * @param string $hook          The name of the WordPress action that is being registered.
     * @param object $component     A reference to the instance of the object on which the action is defined.
     * @param string $callback      The name of the function definition on the $component.
     * @param int    $priority      The priority at which the function should be fired.
     * @param int    $accepted_args The number of arguments that should be passed to the $callback.
     */
    public function add_action($hook, $component, $callback, $priority = 10, $accepted_args = 1)
    {
        $this->add('action', $hook, $component, $callback, $priority, $accepted_args);
    }

    /**
     * Add a new filter to be registered with WordPress.
     *
     * @param string $hook          The name of the WordPress filter that is being registered.
     * @param object $component     A reference to the instance of the object on which the filter is defined.
     * @param string $callback      The name of the function definition on the $component.
     * @param int    $priority      The priority at which the function should be fired.
     * @param int    $accepted_args The number of arguments that should be passed to the $callback.
     */
    public function add_filter($hook, $component, $callback, $priority = 10, $accepted_args = 1)
    {
        $this->add('filter', $hook, $component, $callback, $priority, $accepted_args);
    }

    /**
     * Register the filters and actions with WordPress.
     */
    public function register_hooks()
    {
        foreach ($this->filters as $hook) {
            add_filter($hook['hook'], [$hook['component'], $hook['callback']], $hook['priority'], $hook['accepted_args']);
        }

        foreach ($this->actions as $hook) {
            add_action($hook['hook'], [$hook['component'], $hook['callback']], $hook['priority'], $hook['accepted_args']);
        }
    }

    private function add($type, $hook, $component, $callback, $priority, $accepted_args)
    {
        $hook = [
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args,
        ];

        switch ($type) {
            case 'action':
                $this->actions[] = $hook;
                break;
            case 'filter':
                $this->filters[] = $hook;
                break;
        }
    }
}
