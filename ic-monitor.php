<?php
/**
 * Plugin Name:     INCUCA Monitor
 * Plugin URI:      https://incuca.net
 * Description:     WordPress plugin to expose website data through REST API
 * Author:          INUCA
 * Author URI:      https://incuca.net
 * Text Domain:     ic-monitor
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Ic_Monitor
 */

add_action( 'rest_api_init', function () {
  register_rest_route( 'myplugin/v1', '/author/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'my_awesome_func',
  ) );
} );
