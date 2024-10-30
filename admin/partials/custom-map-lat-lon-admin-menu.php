<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
*
 * @since      1.0.0
 *
 * @package    Custom_Map_Lat_Lon
 * @subpackage Custom_Map_Lat_Lon/admin/partials
 */

function register_custom_map_page() {
    add_menu_page(
        __( 'Custom Map Coordinates', 'custom-map-lat-lon' ),
        'Custom Map',
        'manage_options',
        'custom-map-lat-lon-page',
        'custom_map_page_callback',
        'dashicons-location-alt',
        75
    );
}
add_action( 'admin_menu', 'register_custom_map_page' );

function custom_map_page_callback() {
    $message = '';
    $type = '';

    // Check if the form has been submitted
    if (isset($_POST['custom-map-latitude']) && isset($_POST['custom-map-longitude'])) {
        $new_latitude = sanitize_text_field(trim($_POST['custom-map-latitude']));
        $new_longitude = sanitize_text_field(trim($_POST['custom-map-longitude']));

        // Verify the nonce
        if (!wp_verify_nonce($_POST['_wpnonce'], 'save_lat_long')) {
            $message = __("Something went wrong. Please try again.", "custom-map-lat-lon");
            $type = 'error';
        } elseif (empty($new_latitude) || empty($new_longitude)) {
            $message = __("Latitude and longitude values are required.", "custom-map-lat-lon");
            $type = 'error';
        } elseif (!is_numeric($new_latitude) || !is_numeric($new_longitude)) {
            $message = __("Latitude and longitude values must be numeric.", "custom-map-lat-lon");
            $type = 'error';
        } else {
            // Save the latitude and longitude values
            update_option('custom-map-latitude', $new_latitude);
            update_option('custom-map-longitude', $new_longitude);
            $message = __("Latitude and longitude values saved successfully", "custom-map-lat-lon");
            $type = 'success';
        }
    }
    ?>

    <div class="wrap">
        <h1 class="wp-heading-inline"> <?php esc_html_e('Custom Map Coordinates', 'custom-map-lat-lon'); ?> </h1>

        <?php if ($message): ?>
            <div class="notice notice-<?php echo esc_attr($type); ?>">
                <p><?php esc_html_e($message, 'custom-map-lat-lon'); ?></p>
            </div>
        <?php endif; ?>

        <form method="post">
            <?php wp_nonce_field('save_lat_long'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="custom-map-latitude"> <?php esc_html_e('Latitude', 'custom-map-lat-lon'); ?> </label></th>
                    <td>
                        <input type="text" name="custom-map-latitude" id="custom-map-latitude" placeholder="23.343424" value="<?php echo esc_html(get_option('custom-map-latitude')); ?>" >
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="custom-map-longitude"> <?php esc_html_e('Longitude', 'custom-map-lat-lon'); ?> </label></th>
                    <td>
                        <input type="text" name="custom-map-longitude" id="custom-map-longitude" placeholder="54.343424" value="<?php echo esc_html(get_option('custom-map-longitude')); ?>" >
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value=" <?php esc_html_e('Save Changes', 'custom-map-lat-lon'); ?>">
            </p>
        </form>
    </div>
    <?php
}