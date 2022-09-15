<?php
/**
 * Plugin Name:       Ix Personal Cabinet
 * Plugin URI:        https://github.com/ixdit/ix-personal-cabinet
 * Description:       Plugin Personal users cabinet
 * Author:            Dmitry Vorobiev & Artem Abramovich
 * Author URI:
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ix-personal-cabinet
 * Domain Path:       /languages/
 *
 * Version:           1.0.0
 *
 * WC requires at least: 5.2.0
 * WC tested up to: 6.1
 *
 * RequiresWP: 5.5
 * RequiresPHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'IXPC_PLUGIN_DIR', __DIR__ );
define( 'IXPC_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
define( 'IXPC_PLUGIN_FILE', plugin_basename( __FILE__ ) );

define( 'IXPC_REST_ROUT_PREFIX', 'ix/v1/');

define( 'IXPC_PLUGIN_VER', '1.0.0' );

define( 'IXPC_PLUGIN_NAME', 'Ix Personal Cabinet' );

require IXPC_PLUGIN_DIR . '/vendor/autoload.php';

if ( ! function_exists( 'ixpc' ) ) {
	/**
	 *
	 * @return object IXPC class object.
	 * @since 1.0.0
	 */
	function ixpc(): object {

		return IXPC\Main::instance();;
	}
}

ixpc();