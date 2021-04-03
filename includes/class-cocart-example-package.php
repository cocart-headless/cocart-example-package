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
	public static $version = '1.0.1';

	/**
	 * Initiate CoCart Example Package.
	 *
	 * @access public
	 * @static
	 */
	public static function init() {
		// Install CoCart Products upon activation.
		register_activation_hook( COCART_EXAMPLE_PACKAGE_FILE, array( __CLASS__, 'activate_addon' ) );

		// Update CoCart add-on counter upon deactivation.
		register_deactivation_hook( COCART_EXAMPLE_PACKAGE_FILE, array( __CLASS__, 'deactivate_addon' ) );

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
	 * Runs when the plugin is activated.
	 *
	 * Adds plugin to list of installed CoCart add-ons.
	 *
	 * @access public
	 */
	public static function activate_addon() {
		$addons_installed = get_option( 'cocart_addons_installed', array() );

		$plugin = plugin_basename( COCART_EXAMPLE_PACKAGE_FILE );

		// Check if plugin is already added to list of installed add-ons.
		if ( ! in_array( $plugin, $addons_installed, true ) ) {
			array_push( $addons_installed, $plugin );
			update_option( 'cocart_addons_installed', $addons_installed );
		}
	} // END activate_addon()

	/**
	 * Runs when the plugin is deactivated.
	 *
	 * Removes plugin from list of installed CoCart add-ons.
	 *
	 * @access public
	 */
	public static function deactivate_addon() {
		$addons_installed = get_option( 'cocart_addons_installed', array() );

		$plugin = plugin_basename( COCART_EXAMPLE_PACKAGE_FILE );

		// Remove plugin from list of installed add-ons.
		if ( in_array( $plugin, $addons_installed, true ) ) {
			$addons_installed = array_diff( $addons_installed, array( $plugin ) );
			update_option( 'cocart_addons_installed', $addons_installed );
		}
	} // END deactivate_addon()

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
