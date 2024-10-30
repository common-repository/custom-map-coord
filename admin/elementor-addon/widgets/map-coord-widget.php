<?php
class Map_Coord_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'map_coord_widget';
    }

    public function get_title() {
        return __( 'Google Map Coordinates', 'custom-map-lat-lon' );
    }

    public function get_icon() {
        return 'eicon-map-pin';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_map_coord_settings',
            [
                'label' => __( 'Map Coordinates Settings', 'custom-map-lat-lon' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(
            'latitude',
            [
                'label' => __( 'Latitude', 'custom-map-lat-lon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => '22',
                'required' => true,
                'sanitize_callback' => function( $value ) {
                    return is_numeric( $value ) ? $value : '';
                },
                'validate' => [
                    'is_numeric' => true,
                    'required' => true,
                ],
            ]
        );

        $this->add_control(
            'longitude',
            [
                'label' => __( 'Longitude', 'custom-map-lat-lon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'description' => esc_html__( 'Leave blank to use default coordinates from admin menu', 'custom-map-lat-lon' ),
                'placeholder' => '92',
                'required' => true,
                'sanitize_callback' => function( $value ) {
                    return is_numeric( $value ) ? $value : '';
                },
                'validate' => [
                    'is_numeric' => true,
                    'required' => true,
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $lat = $settings['latitude'];
        $lon = $settings['longitude'];

        // Check if latitude and longitude are valid
        if ($lat && $lon) {
            if (is_numeric($lat) && is_numeric($lon)) {
                $shortcode = '[map-coordinate lat="'.$lat.'" lon="'.$lon.'"]';
                $output = do_shortcode($shortcode);
                echo $output;
            } else {
                echo __('Invalid latitude or longitude', 'custom-map-lat-lon');
            }
        }else{
            $shortcode = '[map-coordinate]';
            $output = do_shortcode($shortcode);
            echo $output;
        }

    }
}
