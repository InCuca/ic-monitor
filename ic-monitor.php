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
 * @package         InCuca
 */

if ( ! function_exists( 'ic_get_blocked_attacks' ) ) {
	/**
	 * Return the number of blocked attacks
	 */
	function ic_get_blocked_attacks() {
		return 0;
	}
	add_action(
		'rest_api_init', function () {
			register_rest_route(
				'incuca/v1', '/blocked-attacks', array(
					'methods'  => 'GET',
					'callback' => 'ic_get_blocked_attacks',
				)
			);
		}
	);
}
