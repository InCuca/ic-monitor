<?php
require( __DIR__ . '/../ic-monitor.php' );

/**
 * Describe IcMonitor
 *
 * @package InCuca
 */
class IcMonitor extends WP_UnitTestCase {

	/**
	 * It returns number of blocked attacks through /incuca/v1/blocked-attacks
	 */
	function testReturnsBlockedAttacksThroughEndpoint() {
		do_action( 'rest_api_init' );
		$req = new WP_REST_Request( 'GET', '/incuca/v1/blocked-attacks' );
		$res = rest_do_request( $req );
		$this->assertEquals( 200, $res->status );

	}
}
