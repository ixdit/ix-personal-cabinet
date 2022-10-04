<?php

namespace IXPC;

class Enqueue {

	public function init_hooks(): void {

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_script_style' ], 100 );

	}

	function enqueue_script_style() {

		wp_register_script(
			'ixpc-scripts',
			IXPC_PLUGIN_URI . 'assets/js/main.js',
			[ 'jquery' ],
			IXPC_PLUGIN_VER,
			true
		);

		wp_register_script(
			'ixpc-account',
			IXPC_PLUGIN_URI . 'assets/js/account.js',
			[ 'jquery' ],
			IXPC_PLUGIN_VER,
			true
		);

		wp_register_style(
			'ixpc-styles',
			IXPC_PLUGIN_URI . 'assets/css/style.css',
			[],
			IXPC_PLUGIN_VER
		);

		wp_enqueue_script( 'ixpc-scripts' );
		wp_enqueue_style( 'ixpc-account' );
		wp_enqueue_style( 'ixpc-styles' );

		wp_localize_script(
		'ixpc-scripts',
		'rest_data',
			array(
			'root'  => esc_url_raw( rest_url() ),
//			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'wp_rest'),
			),
		);


	}

}