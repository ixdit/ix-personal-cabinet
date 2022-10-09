<?php

namespace IXPC;

class Front {

	public function  init_hooks(): void {

		add_action( 'ixpc_account_navigation', [ $this, 'navigation' ] );

	}

	public function navigation() {

		$args = ixpc()->get_endpoints_array();
		unset($args['forgot-pass'], $args['edit-profile'],   $args['change-pass']);

		load_template(
			ixpc()->templater->get_template( '/personal-cabinet/nav.php' ),
			true,
			$args
		);

	}

}