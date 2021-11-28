<?php
/**
 * This file is designed to be used to load as package NOT a WP plugin!
 *
 * @version 1.0.2
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
if ( ! class_exists( 'cocart_example_package', false ) ) {
	include_once( untrailingslashit( plugin_dir_path( COCART_EXAMPLE_PACKAGE_FILE ) ) . '/includes/class-cocart-example-package.php' );
}

/**
 * Returns the main instance of cocart_example_package and only runs if it does not already exists.
 *
 * @return cocart_example_package
 */
if ( ! function_exists( 'cocart_example_package' ) ) {
	function cocart_example_package() {
		return cocart_example_package::init();
	}

	cocart_example_package();
}
