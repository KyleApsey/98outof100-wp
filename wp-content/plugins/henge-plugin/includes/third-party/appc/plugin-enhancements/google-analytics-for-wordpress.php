<?php
if ( is_plugin_active( 'google-analytics-for-wordpress/googleanalytics.php' ) ) {
	// Google Analytics profile
	add_filter( 'monsterinsights_get_ua', function($ua) {
		return GOOGLE_ANALYTICS_PROFILE;
	}, 10, 1 );
		
	// show in the admin the Google Analytics constant
	add_filter( 'monsterinsights_get_option', function($value, $key, $default) {
		$value = ($key=='dashboards_disabled') ? true : $value;
		return ($key == 'analytics_profile_name') ? '<code>' . GOOGLE_ANALYTICS_PROFILE . '</code> (PHP Constant)' : $value;
	}, 10, 3 );
			
	// Hide Monster Insight GA authentication buttons
	add_action('admin_head', function() {
		echo '<style>#monsterinsights-google-reauthenticate-submit,#monsterinsights-google-deauthenticate-submit,#monsterinsights-input-dashboards-disabled{display:none;}</style>';
	});
}