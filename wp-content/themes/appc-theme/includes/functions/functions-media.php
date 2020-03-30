<?php
// add support for featured images on CPTs
add_theme_support('post-thumbnails');

// add a custom image size
add_image_size( 'custom-large', 768, 768 );

// load image sizes for selection
add_filter( 'image_size_names_choose', function( $sizes ) {
	return array_merge( $sizes, array(
		'custom-large' => __( 'Custom Large' )
	) );
});