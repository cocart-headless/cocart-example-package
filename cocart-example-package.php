<?php
/*
 * Plugin Name: CoCart Example Package
 * Plugin URI:  https://cocart.xyz
 * Description: Just an example package to be used as a feature plugin.
 * Author:      Sébastien Dumont
 * Author URI:  https://sebastiendumont.com
 * Version:     1.0.1
 * Text Domain: cocart-example-package
 * Domain Path: /languages/
 * Requires at least: 5.4
 * Requires PHP: 7.0
 * WC requires at least: 4.3
 * WC tested up to: 5.1
 *
 * @package CoCart Example Package
 */

defined( 'ABSPATH' ) || exit;

if ( version_compare( PHP_VERSION, '7.0', '<' ) ) {
	return;
}

if ( ! defined( 'COCART_EXAMPLE_PACKAGE_FILE' ) ) {
	define( 'COCART_EXAMPLE_PACKAGE_FILE', __FILE__ );
}

// Include the main CoCart Example Package class.
if ( ! class_exists( 'CoCart_Example_Package', false ) ) {
	include_once( untrailingslashit( plugin_dir_path( COCART_EXAMPLE_PACKAGE_FILE ) ) . '/includes/class-cocart-example-package.php' );
}

/**
 * Returns the main instance of CoCart_Example_Package and only runs if it does not already exists.
 *
 * @return CoCart_Example_Package
 */
if ( ! function_exists( 'CoCart_Example_Package' ) ) {
	function CoCart_Example_Package() {
		return CoCart_Example_Package::init();
	}

	CoCart_Example_Package();
}
