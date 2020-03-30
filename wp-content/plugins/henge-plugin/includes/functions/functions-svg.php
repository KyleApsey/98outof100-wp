<?php
function get_dimensions_for_svg( $svg ) {
	$fail = (object) array( 'width' => 0, 'height' => 0 );

	// Welp, nothing we can do here...
	if ( ! function_exists( 'simplexml_load_file' ) ) {
		return $fail;
	}

	$svg = simplexml_load_file( $svg );
	$attributes = $svg ? $svg->attributes() : false;

	// Probably an invalid XML file?
	if( ! $attributes ) {
		return $fail;
	}

	$width = (string) $attributes->width;
	$height = (string) $attributes->height;

	return (object) array( 'width' => $width, 'height' => $height );
}

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype( $filename, $mimes );

	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
  }, 10, 4 );

add_filter( 'upload_mimes', function( $existing_mime_types = array() ) {
	return $existing_mime_types + array( 'svg' => 'image/svg+xml' );
});

add_filter( 'wp_prepare_attachment_for_js', function( $response, $attachment, $meta ) {
	if( $response['mime'] == 'image/svg+xml' && empty( $response['sizes'] ) ) {
		$svg_file_path = get_attached_file( $attachment->ID );
		$dimensions = get_dimensions_for_svg( $svg_file_path );

		$response[ 'sizes' ] = array(
				'full' => array(
					'url' => $response[ 'url' ],
					'width' => $dimensions->width,
					'height' => $dimensions->height,
					'orientation' => $dimensions->width > $dimensions->height ? 'landscape' : 'portrait'
			)
		);
	}

	return $response;
}, 10, 3 );

add_action( 'admin_enqueue_scripts', function() {
	// Media Listing Fix
	wp_add_inline_style( 'wp-admin', ".media .media-icon img[src$='.svg'] { width: auto; height: auto; }" );
	// Featured Image Fix
	wp_add_inline_style( 'wp-admin', "#postimagediv .inside img[src$='.svg'] { width: 100%; height: auto; }" );
});

add_action( 'wp_head', function() {
	// Featured Image Fix
	echo "<style>.post-thumbnail img[src$='.svg'] { width: 100%; height: auto; }</style>";
});