<?php

namespace IXPC;

class Endpoints {

	public function init_hooks(): void {

		add_action( 'init', [ $this, 'add_endpoint' ] );

		add_action( 'ixpc_account_content', [ $this, 'add_endoint_template' ] );

		add_action( 'ixpc_account_dashboard_endpoint', [ $this, 'dashboard' ] );
		add_action( 'ixpc_account_profile_endpoint', [ $this, 'view_profile' ] );
		add_action( 'ixpc_account_edit-profile_endpoint', [ $this, 'edit_account' ] );
		add_action( 'ixpc_account_change-pass_endpoint', [ $this, 'change_pass' ] );
		add_action( 'ixpc_account_articles_endpoint', [ $this, 'articles' ] );

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

				do_action( 'qm/info',$key);
//				do_action( 'qm/info',$value);

				if ( has_action( 'ixpc_account_' . $key . '_endpoint' ) ) {
					do_action( 'ixpc_account_' . $key . '_endpoint', $value );

					return;
				}
			}
		}

	}

	public function dashboard() {

		load_template(
			ixpc()->templater->get_template( '/personal-cabinet/dashboard.php' ),
			true,
			[
				'current_user' => get_user_by( 'id', get_current_user_id() ),
			]
		);

	}

	public function view_profile() {

		load_template(
			ixpc()->templater->get_template( '/personal-cabinet/profile.php' ),
			true,
			[
				'current_user' => get_user_by( 'id', get_current_user_id() ),
			]
		);

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

	public function change_pass() {
		load_template(
			ixpc()->templater->get_template( '/personal-cabinet/change-pass.php' ),
			true,
			[
				'current_user' => get_user_by( 'id', get_current_user_id() ),
			]
		);
	}

	public function articles() {

		load_template(
			ixpc()->templater->get_template( '/personal-cabinet/articles.php' ),
			true,
			[
				'current_user' => get_user_by( 'id', get_current_user_id() ),
			]
		);

	}


}