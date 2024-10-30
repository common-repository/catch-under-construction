<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.catchplugins.com
 * @since      1.0.0
 *
 * @package    Catch_Under_Construction
 * @subpackage Catch_Under_Construction/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Catch_Under_Construction
 * @subpackage Catch_Under_Construction/includes
 * @author     Catch Plugins <www.catchplugins.com>
 */
class Catch_Under_Construction_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'catch-under-construction',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
