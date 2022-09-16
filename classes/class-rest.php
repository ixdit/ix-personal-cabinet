<?php

namespace IXPC;

use WP_Error;

class Rest {

	public function init_hooks() {

		add_action( 'rest_api_init', [ $this, 'endpoints' ] );

	}

	public function endpoints() {

		register_rest_route( IXPC_REST_ROUT_PREFIX, 'auth/', [
			'methods'  => 'POST',
			'callback' => [ $this, 'auth'],
			'permission_callback' => '__return_true',
			'args'     => [
				'login' => [
					'required' => true,
				],
				'password' => [
					'required' => true,
				],
				'remember' => [
					'default' => '',
				],
			],
		] );

		register_rest_route( IXPC_REST_ROUT_PREFIX, 'register/', [
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

		register_rest_route( IXPC_REST_ROUT_PREFIX, 'reminder/', [
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

		$response = array();

		$get_auth_params = $request->get_body_params();

		$login = $get_auth_params['login'];
		$password = $get_auth_params['password'];
		$remember = $get_auth_params['remember'];

		$error = new WP_Error;

		if ( $login && $password ) {

			$auth_params = array();
			$auth_params['user_login'] = $login;
			$auth_params['user_password'] = $password;
			if ( $remember ) {
				$auth_params['remember'] = true;
			}

			$user = wp_signon( $auth_params, false );
//			print_r($user);
			if ( !is_wp_error($user) ) {
				$response['code'] = 200;
				$response['message'] = __("Auth Successful", "ix-auth");
				return $response;
			} else {
				return $user->get_error_message();
			}
		} else {
			$error->add( 'invalid_auth', __( 'Invalid login or password', 'ix-auth' ) );
			return $error;
		}
//
	}

	public function register( \WP_REST_Request $request ) {

//		print_r($request);
		$response = array();

		$request_user_data = $request->get_body_params();
		$username = sanitize_text_field($request_user_data['username']);
		$email = sanitize_email( $request_user_data['email'] );
		$password = $request_user_data['password'];

		$error = new WP_Error;

		$username_exists = username_exists($username);

		if ( $username_exists ) {
			$error->add( 'username_exists', __( 'Username already exists.', 'ix-register' ), array('status' => 400));
			return $error;
		}

		if ( $email &&  is_email($request_user_data['email']) ) {
			$email_exists = email_exists($email);
		} else {
			$error->add( 'email_exists', __( 'Email already exists.', 'ix-register' ), array('status' => 400));
			return $error;
		}

		if ( !$username_exists && !$email_exists ) {
			$user_id = wp_create_user($username, $password, $email);
			if (!is_wp_error($user_id)) {
				$user = get_user_by('id', $user_id);
				$user->set_role('subscriber');

				$response['code'] = 200;
				$response['message'] = __("User '" . $username . "' Registration was Successful", "ix-register");
			} else {
				$error->add( 'create_user', __( 'Error during registration.', 'ix-register' ), array('status' => 400));
				return $error;
			}
		}

		return $response;
	}

	public function reminder( \WP_REST_Request $request ) {

		print_r($request);

		return 'ok';
	}

}