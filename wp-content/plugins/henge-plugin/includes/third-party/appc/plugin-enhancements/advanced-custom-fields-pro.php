<?php
if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
	
	if(WP_ENVIRONMENT=='localhost') {
		add_filter('acf/settings/save_json', function( $paths ) {
			return TEMPLATE_PLUGIN_PATH . 'includes/objects/acf_json';
		});
	} else {
		// don't load the acf admin if not localhost
		add_filter('acf/settings/show_admin', '__return_false');
	}
	
	add_filter('acf/settings/load_json', function( $paths ) {
		return [ TEMPLATE_PLUGIN_PATH . 'includes/objects/acf_json' ];
	});
		
	// registers the Google API Key to be used for Google Maps
	add_filter('acf/settings/google_api_key', function () {
		return GOOGLE_API_KEY;
	});

	if( !class_exists('acf_field_read_only') ) :
	
		// initialize
		add_action('acf/include_field_types', 	function() {
			class acf_field_read_only extends acf_field {
			
				function __construct() {
					
					$this->name = 'read_only';
					$this->label = __('Read-only', 'acf-read_only');
					$this->category = 'basic';
					
					// do not delete!
					parent::__construct();
				}
				
				function render_field( $field ) {
					$value = is_array($field['value']) ? $field['value'] : [ $field['value'] ];
					// render
					echo acf_esc_html( '<code>' . implode(', ', $value) . '</code>' );
				}
				
			}
			new acf_field_read_only;
		});

	endif;
}