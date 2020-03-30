<?php
if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {
	// filter Yoast Meta priority
	add_filter( 'wpseo_metabox_prio', function() { return 'low';});
}