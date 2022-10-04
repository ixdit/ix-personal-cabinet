<?php

namespace IXPC;

class Endpoints {

	public function init_hooks(): void {

		add_action( 'init', [ $this, 'add_endpoint' ] );

		add_action( 'ixpc_account_content', [ $this, 'add_endoint_template' ] );
		add_action( 'ixpc_account_edit-profile_endpoint', [ $this, 'edit_account' ] );

	}

	public function add_endpoint() {

		//query checkpoint for user forms
		add_rewrite_endpoint( 'forgot-pass', EP_ROOT | EP_PAGES );

		//query checkpoint for personal cabinet
		add_rewrite_endpoint( 'dashboard', EP_ROOT | EP_PAGES );
		add_rewrite_endpoint( 'articles', EP_ROOT | EP_PAGES );
		add_rewrite_endpoint( 'profile', EP_ROOT | EP_PAGES );
		add_rewrite_endpoint( 'edit-profile', EP_ROOT | EP_PAGES );
		add_rewrite_endpoint( 'change-pass', EP_ROOT | EP_PAGES );
	}


	public function add_endoint_template() {

		global $wp;

		if ( ! empty( $wp->query_vars ) ) {
			foreach ( $wp->query_vars as $key => $value ) {
				// Ignore pagename param.
				if ( 'pagename' === $key ) {
					continue;
				}

//				do_action( 'qm/info',$key);
//				do_action( 'qm/info',$value);

				if ( has_action( 'ixpc_account_' . $key . '_endpoint' ) ) {
					do_action( 'ixpc_account_' . $key . '_endpoint', $value );

					return;
				}
			}
		}

	}

	public function edit_account() {

		load_template(
			ixpc()->templater->get_template( '/personal-cabinet/edit-account.php' ),
			true,
			[
				'current_user' => get_user_by( 'id', get_current_user_id() ),
			]
		);

	}

}