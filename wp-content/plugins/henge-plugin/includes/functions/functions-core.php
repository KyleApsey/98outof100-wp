<?php	
// load custom admin styles
add_action( 'admin_enqueue_scripts', function() {
	wp_enqueue_style( 'appc-admin', TEMPLATE_PLUGIN_URL . '/assets/css/admin.css' );
});

// do not load the admin bar
show_admin_bar( false );

// let's load custom post types and taxonomies
add_action('init', function() {
	// Custom Post Types
	foreach (glob(TEMPLATE_PLUGIN_PATH. '/includes/objects/custom_post_types/*.cpt.php') as $filename) { include $filename; }
	// Taxonomies
	foreach (glob(TEMPLATE_PLUGIN_PATH. '/includes/objects/taxonomies/*.tax.php') as $filename) { include $filename; }
}, 10);

// we need to allow for the youtube content embed to be correclty sized
// so in order to do this we need to wrap a div around it
add_filter('embed_oembed_html', function($cached_html, $url, $attr, $post_id) {
	if ((false !== strpos( $url, "://youtube.com")) || (false !== strpos( $url, "://www.youtube.com")) || (false !== strpos( $url, "://youtu.be" ))) {
		// this is a youtube embed, so we want to only show related videos and modest branding
		$cached_html = str_replace('feature=oembed', 'feature=oembed&rel=0&modestbranding=1', $cached_html);
		// this is you tubevideo embed, so let's make it responsive
		$cached_html = '<div class="responsive-youtube">' . $cached_html . '</div>';
    }
    return $cached_html;
}, 99, 4);