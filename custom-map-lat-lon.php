<?php

/**
 * @since             1.0.0
 * @package           Custom_Map_Lat_Lon
 *
 * @wordpress-plugin
 * Plugin Name:       Coordinate for Google Map (No API Required)
 * Plugin URI:        https://#
 * Description:       This plugin adds the shortcode ([map-coordinate lat="xx" lon="xx"]) and also a Gutenberg block, elementor widget to display Google Maps with Latitude & Longitude. There is also an admin menu to add Latitude & Longitude globally for all Gutenberg blocks, elementor widgets and shortcodes.
 * Version:           1.1
 * Author:            Manish Shah
 * Author URI:        https://www.manishshah.info.np
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-map-lat-lon
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'CUSTOM_MAP_LAT_LON_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-map-lat-lon-activator.php
 */
function activate_custom_map_lat_lon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-map-lat-lon-activator.php';
	Custom_Map_Lat_Lon_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-map-lat-lon-deactivator.php
 */
function deactivate_custom_map_lat_lon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-map-lat-lon-deactivator.php';
	Custom_Map_Lat_Lon_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_map_lat_lon' );
register_deactivation_hook( __FILE__, 'deactivate_custom_map_lat_lon' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-map-lat-lon.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_custom_map_lat_lon() {

	$plugin = new Custom_Map_Lat_Lon();
	$plugin->run();

}


/**
 * Registers elementor widget
 *
 * @since    1.1
 */
function register_list_widget( $widgets_manager ) {

    require_once plugin_dir_path( __FILE__ ) . 'admin/elementor-addon/widgets/map-coord-widget.php';
    $widgets_manager->register( new \Map_Coord_Widget() );
}
add_action( 'elementor/widgets/register', 'register_list_widget' );

run_custom_map_lat_lon();

