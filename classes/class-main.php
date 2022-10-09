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
		( new Shortcodes() )->init_hooks();
		( new Rest() )->init_hooks();
		( new Enqueue() )->init_hooks();
		( new Endpoints() )->init_hooks();
		( new Front() )->init_hooks();

	}

	public function get_endpoints_array(): array {

		return [
			'forgot-pass'  => [
				'title'       => __( 'Forgot password', 'ixpc' ),
				'description' => 'Dashboard forgot password',
				'cabinet_page_url' => $this->get_cabinet_page_url(),
			],
			'dashboard'    => [
				'title'       => __( 'Dashboard', 'ixpc' ),
				'description' => 'Dashboard description',
				'cabinet_page_url' => $this->get_cabinet_page_url(),
			],
			'articles'     => [
				'title'       => __('Articles', 'ixpc' ),
				'description' => 'Dashboard articles',
				'cabinet_page_url' => $this->get_cabinet_page_url(),
			],
			'profile'      => [
				'title'       => __('Profile', 'ixpc'),
				'description' => 'Dashboard profile',
				'cabinet_page_url' => $this->get_cabinet_page_url(),
			],
			'edit-profile' => [
				'title'       => __('Edit profile', 'ixpc'),
				'description' => 'Dashboard edit profile',
				'cabinet_page_url' => $this->get_cabinet_page_url(),
			],
			'change-pass'  => [
				'title'       => __( 'Change pass', 'ixpc' ),
				'description' => 'Dashboard change pass',
				'cabinet_page_url' => $this->get_cabinet_page_url(),
			],
			'logout'  => [
				'title'       => __( 'Logout', 'ixpc' ),
				'description' => '',
				'cabinet_page_url' => wp_logout_url( $this->get_cabinet_page_url() ),
			],
		];
	}

	public function get_cabinet_page_url() {

		return get_permalink( 50247 );

	}


}