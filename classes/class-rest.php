<?php

namespace IXPC;

use WP_Error;

class Rest {

	public function init_hooks(): void {

		add_action( 'rest_api_init', [ $this, 'endpoints' ] );

	}

	public function endpoints(): void {

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
					'default' => true,
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
			'callback' => [$this, 'reminder'],
			'permission_callback' => '__return_true',
			'args'     => [
				'email'    => [
					'default' => '',
				],
			],
		] );

		register_rest_route( IXPC_REST_ROUT_PREFIX, 'validate/', [
			'methods'  => 'POST',
			'callback' => [$this, 'validate'],
			'permission_callback' => '__return_true',
			'args'     => [
				'key'    => [
					'required' => true,
				],
				'login'    => [
					'required' => true,
				],
			],
		] );

		register_rest_route( IXPC_REST_ROUT_PREFIX, 'get_form/', [
			'methods'  => 'POST',
			'callback' => [$this, 'get_the_forms'] ,
			'permission_callback' => '__return_true',
			'args'     => [
				'form_type'    => [
					'default' => 'auth',
				],
			],
		] );

		register_rest_route( IXPC_REST_ROUT_PREFIX, 'setpass/', [
			'methods'  => 'POST',
			'callback' => [$this, 'setpass'],
			'permission_callback' => '__return_true',
			'args'     => [
				'new_pass'    => [
					'required' => true,
				],
				'rpassword'    => [
					'required' => true,
				],
				'user_id'    => [
					'required' => true,
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
				$response['status'] = 200;
				$response['code'] = 'success';
				$response['form'] ='auth';
				$response['message'] = __("Auth Successful", "ixpc");
				return $response;
			} else {
//				print_r($user->get_error_message());
//				return $user->get_error_message();
				$error->add( 'invalid_auth', __( 'Invalid login or password', 'ixpc' ) );
				return $error;
			}
		} else {
			$error->add( 'invalid_auth', __( 'Invalid login or password', 'ixpc' ) );
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
			$error->add( 'username_exists', __( 'Username already exists.', 'ixpc' ), array('status' => 400));
			return $error;
		}

		if ( $email &&  is_email($request_user_data['email']) ) {
			$email_exists = email_exists($email);
		} else {
			$error->add( 'email_exists', __( 'Email already exists.', 'ixpc' ), array('status' => 401));
			return $error;
		}

		if ( !$username_exists && !$email_exists ) {
			$user_id = wp_create_user($username, $password, $email);
			if (!is_wp_error($user_id)) {
				$user = get_user_by('id', $user_id);
				$user->set_role('subscriber');

				$response['status'] = 200;
				$response['code'] = 'success';
				$response['form'] ='register';
				$response['message'] = __("User '" . $username . "' Registration was Successful", "ixpc");
			} else {
				$error->add( 'err_create_user', __( 'Error during registration.', 'ixpc' ), array('status' => 403));
				return $error;
			}
		}

		return $response;
	}

	public function reminder( \WP_REST_Request $request ) {

		$response = array();
		$error = new WP_Error;

		$request_user_data = $request->get_body_params();

		$remind_email = $request_user_data['email'];

		if ( is_email( $remind_email ) ) {
			$user_data = get_user_by('email', $remind_email);
		} else {
			$user_data = get_user_by('login', $remind_email);
		}
		$user_id = $user_data->ID;
		print_r($request_user_data);

		if ( empty( $user_data ) ) {
			$error->add( 'err_remind_password', __( 'User not found.', 'ixpc' ), array('status' => 400));
			return $error;
		}

		$user_login = $user_data->user_login;
		$user_email = $user_data->user_email;
		$key        = get_password_reset_key( $user_data );

		if ( is_wp_error( $key ) ) {
			return $key;
		}

		$message = site_url( "/personal-cabinet/forgot-pass?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' );

		$title = __( 'Password Reset' );

		$defaults = array(
			'to'      => $user_email,
			'subject' => $title,
			'message' => $message,
			'headers' => '',
		);

		$mail = wp_mail( $defaults['to'], $defaults['subject'], $defaults['message'], $defaults['headers']);

		return $mail;
	}

	public function get_the_forms( \WP_REST_Request $request ) {

		$request_data = $request->get_body_params();
		$form_type = $request_data['form_type'];

		ob_start();

		$args = array();

		if ( $form_type === 'auth' ) {
			load_template(
				ixpc()->templater->get_template('/login/auth.php'),
				true,
				$args
			);
		}

		if ( $form_type === 'register' ) {
			load_template(
				ixpc()->templater->get_template('/login/register.php'),
				true,
				$args
			);
		}

		if ( $form_type === 'reminder' ) {
			load_template(
				ixpc()->templater->get_template('/login/reminder.php'),
				true,
				$args
			);
		}

		return ob_get_clean();
	}

	public function setpass( \WP_REST_Request $request ) {

		$request_data = $request->get_body_params();

		wp_set_password( $request_data['new_pass'], $request_data['user_id'] );

		return 'success';

	}




}