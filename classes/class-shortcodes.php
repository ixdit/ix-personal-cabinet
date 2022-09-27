<?php

namespace IXPC;

use WP_REST_Request;

class Shortcodes {

	public function init_hooks() {

		add_shortcode( 'ixpc', [ $this, 'ixpc_function' ] );

		add_shortcode( 'ixpc_login', [ $this, 'login' ] );
		add_shortcode( 'ixpc_auth', [ $this, 'auth' ] );
		add_shortcode( 'ixpc_reminder', [ $this, 'reminder' ] );
		add_shortcode( 'ixpc_setpass', [ $this, 'setpass' ] );

	}

	public function ixpc_function( $args = [] ) {

		ob_start();


		if ( is_user_logged_in() ) {

			load_template(
				ixpc()->templater->get_template( '/personal_cabinet.php' ),
				true,
//		        $args
			);

		} else {

            global $wp_query;

			if ( isset( $wp_query->query_vars['forgot-pass'] ) ) {
				if ( isset( $_GET['key'], $_GET['login'] ) && $_GET['action'] == 'rp' ) {

					$user = check_password_reset_key( $_GET['key'], $_GET['login'] );

                    $args = [
	                    'user' => $user,
                    ];


					load_template(
						ixpc()->templater->get_template( '/login/setpass.php' ),
						true,
						$args
					);

				} else {

					load_template(
						ixpc()->templater->get_template( '/login/reminder.php' ),
						true,
					);
				}
			} else {

				load_template(
					ixpc()->templater->get_template( '/login/wrapper.php' ),
					true,
				);
			}

		}

		return ob_get_clean();

	}


	public function login( $args = [] ) {

		ob_start();


		load_template(
			ixpc()->templater->get_template( '/login/register.php' ),
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

		load_template(
			ixpc()->templater->get_template( '/login/auth.php' ),
			true,
			$args
		);

		return ob_get_clean();
	}

	public function reminder( $args = [] ) {

		ob_start();

		load_template(
			ixpc()->templater->get_template( '/login/reminder.php' ),
			true,
			$args
		);

		return ob_get_clean();
	}

	public function setpass( $args = [] ) {

		ob_start();

		load_template(
			ixpc()->templater->get_template( '/login/setpass.php' ),
			true,
			$args
		);

		return ob_get_clean();
	}

}