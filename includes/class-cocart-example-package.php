<?php
/**
 * CoCart Example Package core setup.
 *
 * @author   Sébastien Dumont
 * @category Package
 * @license  GPL-2.0+
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main CoCart Example Package class.
 *
 * @class CoCart_Example_Package
 */
final class CoCart_Example_Package {

	/**
	 * Plugin Version
	 *
	 * @access public
	 * @static
	 */
	public static $version = '1.0.0';

	/**
	 * Initiate CoCart Example Package.
	 *
	 * @access public
	 * @static
	 */
	public static function init() {
		// Load translation files.
		add_action( 'init', array( __CLASS__, 'load_plugin_textdomain' ), 0 );
	} // END init()

	/**
	 * Return the name of the package.
	 *
	 * @access public
	 * @static
	 * @return string
	 */
	public static function get_name() {
		return 'CoCart Example Package';
	}

	/**
	 * Return the version of the package.
	 *
	 * @access public
	 * @static
	 * @return string
	 */
	public static function get_version() {
		return self::$version;
	}

	/**
	 * Return the path to the package.
	 *
	 * @access public
	 * @static
	 * @return string
	 */
	public static function get_path() {
		return dirname( __DIR__ );
	}

	/**
	 * Load the plugin translations if any ready.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/cocart-example-package/cocart-example-package-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/cocart-example-package-LOCALE.mo
	 *
	 * @access public
	 * @static
	 */
	public static function load_plugin_textdomain() {
		if ( function_exists( 'determine_locale' ) ) {
			$locale = determine_locale();
		} else {
			$locale = is_admin() ? get_user_locale() : get_locale();
		}

		$locale = apply_filters( 'plugin_locale', $locale, 'cocart-example-package' );

		unload_textdomain( 'cocart-example-package' );
		load_textdomain( 'cocart-example-package', WP_LANG_DIR . '/cocart-example-package/cocart-example-package-' . $locale . '.mo' );
		load_plugin_textdomain( 'cocart-example-package', false, plugin_basename( dirname( COCART_EXAMPLE_PACKAGE_FILE ) ) . '/languages' );
	} // END load_plugin_textdomain()

} // END class
