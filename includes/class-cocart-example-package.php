<?php
/**
 * CoCart Example Package core setup.
 *
 * @author   Sébastien Dumont
 * @category Package
 * @license  GPL-2.0+
 */

namespace CoCart\ExamplePackage;

 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main CoCart Example Package class.
 *
 * @class CoCart\ExamplePackage\ExampleClass
 */
final class ExampleClass {

	/**
	 * Plugin Version
	 *
	 * @access public
	 *
	 * @static
	 */
	public static $version = '1.0.6';

	/**
	 * Cloning is forbidden.
	 *
	 * @access public
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Cloning this object is forbidden.', 'cocart-example-package' ), '1.0.6' );
	} // END __clone()

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @access public
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Unserializing instances of this class is forbidden.', 'cocart-example-package' ), '1.0.6' );
	} // END __wakeup()

	/**
	 * Initiate CoCart Example Package.
	 *
	 * @access public
	 *
	 * @static
	 */
	public static function init() {
		// Autocorrect plugin slug used so that dependent plugins can be installed/activated.
		add_filter( 'wp_plugin_dependencies_slug', array( __CLASS__, 'convert_plugin_dependency_slug' ) );

		// Load translation files.
		add_action( 'init', array( __CLASS__, 'load_plugin_textdomain' ), 0 );
	} // END init()

	/**
	 * Converts the plugin slug to the correct slug for the current version.
	 * This ensures that when the plugin is installed in a different folder name,
	 * the correct slug is used so that dependent plugins can be installed/activated.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @param string $slug The plugin slug to convert.
	 *
	 * @return string
	 */
	public static function convert_plugin_dependency_slug( $slug ) {
		if ( COCART_EXAMPLE_PACKAGE_SLUG === $slug ) {
			$slug = dirname( plugin_basename( COCART_EXAMPLE_PACKAGE_FILE ) );
		}

		return $slug;
	} // END convert_plugin_dependency_slug()

	/**
	 * Return the name of the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_name() {
		return 'CoCart Example Package';
	}

	/**
	 * Return the version of the package.
	 *
	 * @access public
	 *
	 * @static
	 *
	 * @return string
	 */
	public static function get_version() {
		return self::$version;
	}

	/**
	 * Return the path to the package.
	 *
	 * @access public
	 *
	 * @static
	 *
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
	 *
	 * @static
	 */
	public static function load_plugin_textdomain() {
		if ( function_exists( 'determine_locale' ) ) {
			$locale = determine_locale();
		} else {
			$locale = is_admin() ? get_user_locale() : get_locale();
		}

		$locale = apply_filters( 'plugin_locale', $locale, COCART_EXAMPLE_PACKAGE_SLUG ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound

		unload_textdomain( COCART_EXAMPLE_PACKAGE_SLUG );
		load_textdomain( COCART_EXAMPLE_PACKAGE_SLUG, WP_LANG_DIR . '/' . COCART_EXAMPLE_PACKAGE_SLUG . '/' . COCART_EXAMPLE_PACKAGE_SLUG . '-' . $locale . '.mo' );
		load_plugin_textdomain( COCART_EXAMPLE_PACKAGE_SLUG, false, plugin_basename( dirname( COCART_EXAMPLE_PACKAGE_FILE ) ) . '/languages' ); // phpcs:ignore PluginCheck.CodeAnalysis.DiscouragedFunctions.load_plugin_textdomainFound
	} // END load_plugin_textdomain()

} // END class
