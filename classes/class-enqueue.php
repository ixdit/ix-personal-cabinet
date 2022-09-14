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
			false
		);

		wp_register_style(
			'ixpc-styles',
			IXPC_PLUGIN_URI . 'assets/css/style.css',
			[],
			IXPC_PLUGIN_VER
		);

		wp_enqueue_script( 'ixpc-scripts' );
		wp_enqueue_style( 'ixpc-styles' );

	}

}