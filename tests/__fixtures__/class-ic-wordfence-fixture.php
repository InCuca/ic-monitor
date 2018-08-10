<?php

class IC_Wordfence_Fixture {

	var $db;

	function __construct( $db ) {
		$this->db = $db;
	}

	function execute( $sql ) {
		$sql     = str_replace( 'wp_', $this->db->prefix, $sql );
		$queries = explode( ';', $sql );

		array_pop( $queries ); // remove last empty string

		foreach ( $queries as $query ) {
			$this->db->query( $query );
		}
	}

	public function setup() {
		$sql = file_get_contents( __DIR__ . '/wordfence-fixture.sql' );
		$this->execute( $sql );
	}
}
