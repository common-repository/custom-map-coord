<?php

/**
 * The admin-specific functionality of the plugin.
*
 * @since      1.0.0
 *
 * @package    Custom_Map_Lat_Lon
 * @subpackage Custom_Map_Lat_Lon/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and hooks to
 * enqueue the admin-specific JavaScript.
 *
 * @package    Custom_Map_Lat_Lon
 * @subpackage Custom_Map_Lat_Lon/admin
 * @author     Manish Shah <shahmanish877@gmail.com>
 */
class Custom_Map_Lat_Lon_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

    }

	/**
	 * Register the JavaScript for registering gutenberg block.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/custom-map-lat-lon-gutenberg.js',  array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-block-editor' ), $this->version, true );
	}

}
