<?php
/**
 * Creates Shortcode to Display google map with latitude & longitude
**/

function shortcode_custom_map_lat_lon($atts)
{
    ob_start();

    $default_lat = get_option('custom-map-latitude');
    $default_lon = get_option('custom-map-longitude');

    if ( $default_lat == '' && $default_lon == '') {
        $default_lat = '27.67';
        $default_lon = '85.34';
    }

    $default = array(
        'lat' => $default_lat,
        'lon' => $default_lon,
    );

    $attr = shortcode_atts($default, $atts);

    $lat = $attr['lat'];
    $lon = $attr['lon'];

    if(empty($attr['lat']) || $lat == 'undefined'){
        $lat = $default_lat;
    }
    if(empty($attr['lon']) || $lon == 'undefined'){
        $lon = $default_lon;
    }

    ?>
    <div class="custom-map-container">
        <div class="row">
            <div class="custom-map-iframe">
                <iframe src="https://maps.google.com/maps?q=<?php echo esc_html($lat); ?>,<?php echo esc_html($lon); ?>&hl=es;z=14&amp;output=embed&z=15" frameborder=0  width="100%" height="400px"></iframe>
            </div>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('map-coordinate', 'shortcode_custom_map_lat_lon');
