# WP Plugin Boilerplate
An object-oriented boilerplate for developing WordPress plugins. Based on [DevinVinson/WordPress-Plugin-Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate)

**Requires PHP 5.4 or later**

## Features

* Autoload PHP classes
* Properly namespaced PHP classes
* Admin settings screen

## Installation
Install directly into the plugins folder of a WordPress installation and then rename from `wp-plugin-boilerplate` to whatever you want your plugin to be named (the following commands assume your plugin will be named `wp-foo`):

    cd wp-content/plugins
    git clone git@github.com:regularjack/wp-plugin-boilerplate.git wp-foo
    cd wp-plugin-boilerplate
    mv wp-plugin-boilerplate.php wp-foo.php
    mv languages/wp-plugin-boilerplate.pot languages/wp-foo.pot
    find . -type f -exec sed -i 's/WP Plugin Boilerplate/WP Foo/g' {} +
    find . -type f -exec sed -i 's/WpPluginBoilerplate/WpFoo/g' {} +
    find . -type f -exec sed -i 's/wp-plugin-boilerplate/wp-foo/g' {} +
    rm -rf README.md .git