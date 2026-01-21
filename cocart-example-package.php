<?php
/*
 * Plugin Name: CoCart Example Package
 * Plugin URI:  https://cocartapi.com
 * Description: Just an example package to be used as a feature plugin for CoCart.
 * Author:      CoCart Headless, LLC
 * Author URI:  https://cocartapi.com
 * Version:     1.0.6
 * Text Domain: cocart-example-package
 * Domain Path: /languages/
 * Requires at least: 6.3
 * Requires PHP: 7.4
 *
 * Copyright:   CoCart Headless, LLC
 * License:     GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package CoCart Example Package
 */

defined( 'ABSPATH' ) || exit;

if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
	return;
}

if ( ! defined( 'COCART_EXAMPLE_PACKAGE_FILE' ) ) {
	define( 'COCART_EXAMPLE_PACKAGE_FILE', __FILE__ );
}

if ( ! defined( 'COCART_EXAMPLE_PACKAGE_SLUG' ) ) {
	define( 'COCART_EXAMPLE_PACKAGE_SLUG', 'cocart-example-package' );
}

// Include the main CoCart Example Package class.
if ( ! class_exists( 'CoCart\ExamplePackage\ExampleClass', false ) ) {
	include_once( untrailingslashit( plugin_dir_path( COCART_EXAMPLE_PACKAGE_FILE ) ) . '/includes/class-cocart-example-package.php' );
}

/**
 * Returns the main instance of cocart_example_package and only runs if it does not already exists.
 *
 * @return cocart_example_package
 */
if ( ! function_exists( 'cocart_example_package' ) ) {
	function cocart_example_package() {
		return \CoCart\ExamplePackage\ExampleClass::init();
	}

	cocart_example_package();
}
