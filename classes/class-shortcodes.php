<?php

namespace IXPC;

class Shortcodes {

	public function init_hooks() {

		add_shortcode( 'ixpc', [ $this, 'personal_cabinet' ] );

	}

	public function personal_cabinet( $args = [] ) {

		ob_start();


		if ( is_user_logged_in() ) {

			load_template(
				ixpc()->templater->get_template( '/personal_cabinet.php' ),
				true,
				array(
					'current_user' => get_user_by( 'id', get_current_user_id() ),
				)
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



}