<?php

require __DIR__ . '/__fixtures__/class-ic-wordfence-fixture.php';
require __DIR__ . '/../ic-monitor.php';

class IC_Monitor_Spec extends WP_UnitTestCase {

	/**
	 * It returns number of blocked attacks through /incuca/v1/blocked-attacks
	 */
	function testReturnsBlockedAttacksThroughEndpoint() {
		do_action( 'rest_api_init' );
		$req = new WP_REST_Request( 'GET', '/incuca/v1/blocked-attacks' );
		$res = rest_do_request( $req );

		$this->assertEquals( 200, $res->status );
		$this->assertEquals( 0, $res->data );
	}

	/**
	 * It returns number of blocked attacks from Wordfence /incuca/v1/blocked-attacks
	 */
	function testReturnsWordfenceBlockedAttacksThroughEndpoint() {
		global $wpdb;
		$wf = new IC_Wordfence_Fixture( $wpdb );
		$wf->setup();

		do_action( 'rest_api_init' );
		$req = new WP_REST_Request( 'GET', '/incuca/v1/blocked-attacks' );
		$res = rest_do_request( $req );

		$this->assertEquals( 200, $res->status );
		$this->assertEquals( 3, $res->data );
	}
}
