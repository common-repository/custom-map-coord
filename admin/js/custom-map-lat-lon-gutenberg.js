( function( wp ) {
	const { __ } = wp.i18n;
	const { TextControl, PanelBody } = wp.components;
	const { registerBlockType } = wp.blocks;
	const { InspectorControls } = wp.blockEditor;

	registerBlockType('custom-map/custom-map-lat-lon', {
		title: __('Custom Map Coordinates', 'custom-map-lat-lon'),
		description: __("A custom block to display google map with latitude & longitude (leave blank for default values)", "custom-map-lat-lon"),
		icon: 'location',
		category: 'common',
		attributes: {
			latitude: {
				type: 'string'
			},
			longitude: {
				type: 'string'
			}
		},
		edit: function( props ) {
			const { attributes, setAttributes } = props;
			const { latitude, longitude } = attributes;

			return [
				wp.element.createElement(
					InspectorControls,
					{},
					[
						wp.element.createElement(
							PanelBody,
							{},
							[
								wp.element.createElement( TextControl, {
									label: __( 'Latitude', 'custom-map-lat-lon' ),
									value: latitude,
									onChange: function( newLatitude ) {
										setAttributes( { latitude: newLatitude } );
									}
								} ),
								wp.element.createElement( TextControl, {
									label: __( 'Longitude', 'custom-map-lat-lon' ),
									value: longitude,
									onChange: function( newLongitude ) {
										setAttributes( { longitude: newLongitude } );
									}
								} )
							]
						)
					]
				),
				wp.element.createElement(
					'h3',
					{ className: 'custom-block-edit' },
					'Custom map with Latitude & Longitude'
				)
			];
		},
		save: function( props ) {
			const { attributes } = props;
			const { latitude, longitude } = attributes;

			return wp.element.createElement(
				'div',
				{ className: 'custom-block' },
				`[map-coordinate lat="${ latitude }" lon="${ longitude }"]`
			);
		}
	} );
} )( window.wp );
