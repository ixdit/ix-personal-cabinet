<?php

namespace IXPC;

class main {

	private static $instance;

	public static function instance() {

		if ( is_null( self::$instance ) ) :
			self::$instance = new self();
		endif;

		return self::$instance;

	}

	private function __construct() {

		$this->init();

	}

	public function init() {

//		( new Requirements() )->init();
//		( new Register_Field() )->init();
//		( new Output() )->init();

	}

}