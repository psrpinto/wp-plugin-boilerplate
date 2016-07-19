#!/usr/bin/env bash
set -ex

WP_CORE_DIR=vendor/johnpbloch/wordpress
WP_TESTS_DIR=tests/lib
WP_VERSION=$(composer show johnpbloch/wordpress | grep "versions : \*" | sed 's/versions : \* //g')

download() {
  if [ `which curl` ]; then
    curl -s "$1" > "$2";
  elif [ `which wget` ]; then
    wget -nv -O "$2" "$1"
  fi
}

install_tests_lib() {
  download https://raw.github.com/markoheijnen/wp-mysqli/master/db.php $WP_CORE_DIR/wp-content/db.php
  mkdir -p $WP_TESTS_DIR
  svn co --quiet https://develop.svn.wordpress.org/tags/${WP_VERSION}/tests/phpunit/includes/ $WP_TESTS_DIR/includes
}

install_db() {
  local DB_HOST=$(php -r 'require "tests/lib/wp-tests-config.php"; echo DB_HOST;');
  local DB_NAME=$(php -r 'require "tests/lib/wp-tests-config.php"; echo DB_NAME;');
  local DB_USER=$(php -r 'require "tests/lib/wp-tests-config.php"; echo DB_USER;');
  local DB_PASSWORD=$(php -r 'require "tests/lib/wp-tests-config.php"; echo DB_PASSWORD;');

  # parse DB_HOST for port or socket references
  local PARTS=(${DB_HOST//\:/ })
  local DB_HOST=${PARTS[0]};
  local DB_SOCK_OR_PORT=${PARTS[1]};
  local EXTRA=""

  if ! [ -z $DB_HOST ] ; then
    if [ $(echo $DB_SOCK_OR_PORT | grep -e '^[0-9]\{1,\}$') ]; then
      EXTRA=" --host=$DB_HOST --port=$DB_SOCK_OR_PORT --protocol=tcp"
    elif ! [ -z $DB_SOCK_OR_PORT ] ; then
      EXTRA=" --socket=$DB_SOCK_OR_PORT"
    elif ! [ -z $DB_HOST ] ; then
      EXTRA=" --host=$DB_HOST --protocol=tcp"
    fi
  fi

  # If DB_PASSWORD is empty, do not supply the --password flag
  if [[ -z $DB_PASSWORD ]]; then
    AUTH=" --user=$DB_USER"
  else
    AUTH=" --user=$DB_USER --password=$DB_PASSWORD"
  fi

  # Create database if it doesn't exist
  if ! mysql -e "use $DB_NAME"$AUTH$EXTRA; then
    mysqladmin create $DB_NAME$AUTH$EXTRA
  fi
}

install_tests_lib
install_db
