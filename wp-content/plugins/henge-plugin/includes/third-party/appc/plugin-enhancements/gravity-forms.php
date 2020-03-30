<?php
if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
	
	// disable the gravity scroll on confirmation
	add_filter('gform_confirmation_anchor', function() {
		return false;
	});
	
}