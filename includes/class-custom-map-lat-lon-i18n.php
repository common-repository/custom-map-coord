<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
*
 * @since      1.0.0
 *
 * @package    Custom_Map_Lat_Lon
 * @subpackage Custom_Map_Lat_Lon/includes
 * @author     Manish Shah <shahmanish877@gmail.com>
 */
class Custom_Map_Lat_Lon_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'custom-map-lat-lon',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
