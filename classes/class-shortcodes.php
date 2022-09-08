<?php

namespace IXPC;

class Shortcodes {

	public function init_hooks() {

		add_shortcode( 'ixpc_login', [ $this , 'login' ] );

	}

	public function login( $args = [] ) {

		ob_start();

		load_template(
			ixpc()->templater->get_template('/login/auth.php'),
			true,
			$args
		);

		return ob_get_clean();
	}

}