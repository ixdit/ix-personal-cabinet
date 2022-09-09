<?php

namespace IXPC;

class Rest {

	public function init_hooks() {

		add_action( 'rest_api_init', [ $this, 'endpoints' ] );

	}

	public function endpoints() {

		register_rest_route( 'ix/v1/', 'register/', [
			'methods'  => 'POST',
			'callback' => [$this, 'register'],
			'permission_callback' => '__return_true',
			'args'     => [
				'username' => [
					'default' => '',
				],
				'email'    => [
					'default' => '',
				],
				'password' => [
					'password' => '',
				],
			],
		] );

		register_rest_route( 'ix/v1/', 'auth/', [
			'methods'  => 'POST',
			'callback' => 'auth',
			'permission_callback' => function () {
				return current_user_can( 'edit_others_posts' );
			},
			'args'     => [
				'login' => [
					'default' => '',
				],
				'password' => [
					'password' => '',
				],
			],
		] );

		register_rest_route( 'ix/v1/', 'reminder/', [
			'methods'  => 'POST',
			'callback' => 'reminder',
			'permission_callback' => function () {
				return current_user_can( 'edit_others_posts' );
			},
			'args'     => [
				'email'    => [
					'default' => '',
				],
			],
		] );

	}

	public function register( \WP_REST_Request $request ) {

		print_r($request);

	}

}