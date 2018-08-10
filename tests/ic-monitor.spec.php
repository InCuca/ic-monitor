<?php
/**
 * Class IcMonitor
 *
 * PHPUnit 5.1 doc https://phpunit.de/manual/5.1/en/index.html
 * WP_UnitTestCase doc https://github.com/rnagle/wordpress-unit-tests/blob/master/includes/factory.php
 *
 * @package Ic_Monitor
 */

/**
 * Describe IcMonitor
 */
class IcMonitor extends WP_UnitTestCase {

	/**
	 * It returns number of blocked attacks through /incuca/v1/blocked-attacks
	 */
	function testReturnsBlockedAttacksThroughEndpoint() {
		require(__DIR__ . '/../ic-monitor.php');
		$wp_rest_server_class = apply_filters( 'wp_rest_server_class', 'WP_REST_Server' );
        $server = new $wp_rest_server_class;
		$req = new WP_REST_Request( 'GET', '/wp-json/incuca/v1/blocked-attacks' );
		$res = $server->dispatch($req);
		$this->assertEquals(200, $res->status);

	}
}
