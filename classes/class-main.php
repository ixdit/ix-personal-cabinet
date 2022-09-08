<?php

namespace IXPC;

class Main {

	private static ?Main $instance = null;

	public Templater $templater;

	public static function instance(): Main {

		if ( is_null( self::$instance ) ) :
			self::$instance = new self();
		endif;

		return self::$instance;

	}

	private function __construct() {

		$this->init();

	}

	public function init() {

		$this->templater = new Templater();
		( new Shortcodes() )->init_hoocks();

//		( new Requirements() )->init();
//		( new Register_Field() )->init();
//		( new Output() )->init();

	}



}