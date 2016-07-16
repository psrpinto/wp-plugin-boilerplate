<?php

namespace WpPluginBoilerplate\Command;

/**
 * Poops unicorns.
 *
 * @slug plugin-boilerplate
 */
class Command extends \WP_CLI_Command
{
    /**
     * Prints a greeting.
     *
     * ## OPTIONS
     *
     * <name>
     * : The name of the person to greet.
     *
     * [--type=<type>]
     * : Whether or not to greet the person with success or error.
     * ---
     * default: success
     * options:
     *   - success
     *   - error
     * ---
     *
     * ## EXAMPLES
     *
     *     wp example hello Newman
     *
     * @when before_wp_load
     */
    public function hello($args)
    {
        \WP_CLI::success('Hello '.$args[0]);
    }
}
