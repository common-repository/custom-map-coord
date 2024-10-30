=== Coordinate for Google Map (No API Required) ===
Contributors: shahmanish877
Tags: google map, maps, coordinates, latitude longitude, google maps, google map coordinates, google map latitude longitude
Requires at least: 5.6 or higher
Tested up to: 6.4.3
Stable tag: 1.1
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Use Google Maps without API using coordinates (latitude & longitude) anywhere in WordPress with help of shortcodes & Gutenberg block

== Description ==

No **API key** needed to use google maps, use direct iframe method.
This plugin allows to use the shortcode (**`[map-coordinate]`**), custom Elementor widget or a Gutenberg block to display Google Maps with Latitude & Longitude. There is also an admin menu to add Latitude & Longitude globally for all Gutenberg blocks and shortcodes.

You can add the coordinates globally for the map to use from admin menu (**`Custom Map`**) as shown on screenshot #1.

The shortcode for the map to display is:

`[map-coordinate]`

You can also add different coordinates for each shortcode:

`[map-coordinate lat="xx" lon="xx"]`

If you are using Gutenberg editor for your posts, then you can also use the Gutenberg block - **Custom Map Coordinates**
Custom elementor widget is also available to use for Elementor page builder.

== Changelog ==
1. Elementor widget added in 1.1

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the 'Custom Map' screen from admin menu to add coordinates globally for shortcodes & gutenberg block.
4. Or you can use shortcode or gutenberg directly to add different coordinates in any posts.


== Screenshots ==

1. Admin menu to set default google map coordinates
2. Shortcode [map-coordinate] that uses default coordinates from admin menu
3. Shortcode with custom map coordinates
4. Custom Gutenberg block
5. Custom Gutenberg block preview for displaying map with coordinates
6. Custom Elementor widget
