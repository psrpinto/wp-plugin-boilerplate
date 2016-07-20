# WP Plugin Boilerplate
An object-oriented boilerplate for developing high-quality, testable WordPress plugins.

[![Build Status](https://travis-ci.org/regularjack/wp-plugin-boilerplate.svg?branch=master)](https://travis-ci.org/regularjack/wp-plugin-boilerplate)

*Requires PHP 5.4+ (5.5+ for running tests)*

## Features

* Autoload PHP classes
    - Use PHP namespaces
    - No more need to `include` every plugin file
* Unit Testing
    - Testing with PHPunit works out of the box
    - Just write your test class and run `phpunit`
    - Ready for travis
* Integration with WP-CLI
* And more:
    - Admin settings screen

## Installation
Install directly into the plugins folder of a WordPress installation and then rename from `wp-plugin-boilerplate` to whatever you want your plugin to be named (the following commands assume your plugin will be named `wp-foo`):

    cd wp-content/plugins
    git clone git@github.com:regularjack/wp-plugin-boilerplate.git wp-foo
    cd wp-plugin-boilerplate
    mv languages/wp-plugin-boilerplate.pot languages/wp-foo.pot
    find . -type f -exec sed -i 's/WP Plugin Boilerplate/WP Foo/g' {} +
    find . -type f -exec sed -i 's/WpPluginBoilerplate/WpFoo/g' {} +
    find . -type f -exec sed -i 's/wp-plugin-boilerplate/wp-foo/g' {} +
    rm -rf README.md .git

- Create /tests/lib/wp-tests-config.php
- Travis variables

# Ack

- [DevinVinson/WordPress-Plugin-Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate)
- WP-CLI