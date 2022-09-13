<?php

namespace IXPC;

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

		load_template(
			ixpc()->templater->get_template('/login/auth.php'),
			true,
			$args
		);

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