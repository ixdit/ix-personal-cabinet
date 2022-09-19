<?php

namespace IXPC;

use WP_REST_Request;

class Shortcodes {

	public function init_hooks() {

		add_shortcode( 'ixpc_login', [ $this , 'login' ] );
		add_shortcode( 'ixpc_auth', [ $this , 'auth' ] );
		add_shortcode( 'ixpc_reminder', [ $this , 'reminder' ] );

	}

	public function login( $args = [] ) {

		ob_start();

		load_template(
			ixpc()->templater->get_template('/login/register.php'),
			true,
			$args
		);

		return ob_get_clean();
	}

	public function auth( $args = [] ) {

		ob_start();

		?>
		<div class="ixpc_forms_wrapper">

		</div>
		<?php

//		$request = new WP_REST_Request( 'POST', 'ix/v1/form' );
//		// Установим параметры запроса
//		$request->set_param( 'form', 'auth' );
//		$response = rest_do_request( $request );
//
//		print_r($request);

//		load_template(
//			ixpc()->templater->get_template('/login/auth.php'),
//			true,
//			$args
//		);

		return ob_get_clean();
	}

	public function reminder( $args = [] ) {

		ob_start();

		load_template(
			ixpc()->templater->get_template('/login/reminder.php'),
			true,
			$args
		);

		return ob_get_clean();
	}

}