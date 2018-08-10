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
 * @package         IC_Monitor
 */

if ( ! function_exists( 'ic_get_blocked_attacks' ) ) {
	/**
	 * Return the number of blocked attacks
	 */
	function ic_get_blocked_attacks() {
		global $wpdb;
		$server_tables = $wpdb->get_results( 'SHOW TABLES' );
		// TODO: Check against server_tables
		$tables = array(
			'wfBlocks7',
			'wfBlockedCommentLog',
			'wfBlockedIPLog',
			'wfBlocks7',
		);
		$count  = 0;
		foreach ( $tables as $table ) {
			$table  = $wpdb->prefix . $table;
			$count += $wpdb->get_var(
				$wpdb->prepare( 'SELECT COUNT(*) FROM `%s`;', $table )
			);
		}
		return $count;
	}
}

if ( ! function_exists( 'ic_register_endpoints' ) ) {
	function ic_register_endpoints() {
		register_rest_route(
			'incuca/v1', '/blocked-attacks', array(
				'methods'  => 'GET',
				'callback' => 'ic_get_blocked_attacks',
			)
		);
	}
	add_action( 'rest_api_init', 'ic_register_endpoints' );
}

