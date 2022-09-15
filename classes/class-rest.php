<?php

namespace IXPC;

class Rest {

	public function init_hooks() {

		add_action( 'rest_api_init', [ $this, 'endpoints' ] );

	}

	public function endpoints() {

		register_rest_route( 'ix/v1/', 'auth/', [
			'methods'  => 'POST',
			'callback' => [ $this, 'auth'],
			'permission_callback' => '__return_true',
			'args'     => [
				'login' => [
					'default' => '',
				],
				'password' => [
					'password' => '',
				],
			],
		] );

		register_rest_route( 'ix/v1/', 'register/', [
			'methods'  => 'POST',
			'callback' => [$this, 'register'],
			'permission_callback' => '__return_true',
			'args'     => [
				'username' => [
					'required' => true,
				],
				'email'    => [
					'required' => true,
				],
				'password' => [
					'required' => true,
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

		register_rest_route( 'ix/v1/', 'form/', [
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

	public function auth( \WP_REST_Request $request ) {

		print_r($request);

		return 'ok';
	}

	public function register( \WP_REST_Request $request ) {

//		print_r($request);
		$response = array();

		$request_user_data = $request->get_body_params();
		$username = sanitize_text_field($request_user_data['username']);
		$email = sanitize_text_field($request_user_data['email']);
		$password = sanitize_text_field($request_user_data['password']);

		$error = new WP_Error();

		$username_exists = username_exists($username);
		if ( $username_exists ) {
			$error->add( 'username_exists', __( 'Username already exists.', 'ix-register' ), array('status' => 400));
			return $error;
		}

		$email_exists = email_exists($email);
		if ( $email_exists ) {
			$error->add( 'email_exists', __( 'Email already exists.', 'ix-register' ), array('status' => 400));
		}

		$user_id = wp_create_user($username, $password, $email);
		if (!is_wp_error($user_id)) {
			$user = get_user_by('id', $user_id);
			$user->set_role('subscriber');

			$response['code'] = 200;
			$response['message'] = __("User '" . $username . "' Registration was Successful", "ix-register");
		} else {
			return $user_id;
		}

		return $response;
	}

	public function reminder( \WP_REST_Request $request ) {

		print_r($request);

		return 'ok';
	}

}