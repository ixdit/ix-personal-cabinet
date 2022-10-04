<?php

namespace IXPC;

class Endpoints {

	public function init_hooks(): void {

		add_action( 'init', [ $this, 'add_ixpc_endpoint' ] );

	}

	public function add_ixpc_endpoint() {

		//query checkpoint for user forms
		add_rewrite_endpoint( 'forgot-pass', EP_ROOT | EP_PAGES );

		//query checkpoint for personal cabinet
		add_rewrite_endpoint( 'dashboard', EP_ROOT | EP_PAGES );
		add_rewrite_endpoint( 'articles', EP_ROOT | EP_PAGES );
		add_rewrite_endpoint( 'profile', EP_ROOT | EP_PAGES );
		add_rewrite_endpoint( 'change-pass', EP_ROOT | EP_PAGES );
	}

}