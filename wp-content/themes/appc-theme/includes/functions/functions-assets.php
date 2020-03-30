<?php
/* Add styles and scripts */
add_action( 'wp_enqueue_scripts',  function() {
	// load styles
	appc_enqueue_style( 'theme-global', get_template_directory_uri() . '/assets/css/style.css');
	// load fonts
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Playfair+Display:400,700,900&display=swap');
	// let's switch out jQuery with the latest
	wp_deregister_script( 'jquery' );
	appc_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', [], '3.4.1', false);

	// enqueue our own javascript frameworks
	appc_enqueue_script('theme-frameworks', get_template_directory_uri() . '/assets/js/dist/frameworks.js', [], false, false);
	
	// enqueue our global javascript file
	appc_enqueue_script('theme-webapp', get_template_directory_uri() . '/assets/js/dist/webapp.js', ['jquery', 'theme-frameworks'], false, false);
	/*wp_localize_script( 'theme-webapp', 'appc_global', [
		'global_var' => 'something'
	]);*/

	// enable this if you're going to use the WordPress REST API
	//wp_enqueue_script( 'wp-api' );
	
	if(is_front_page()) {
		appc_enqueue_script('front_page', get_template_directory_uri() . '/assets/js/dist/front-page.js', ['jquery', 'theme-webapp'] );
	} else if(is_page_template('page-some_page.php')) {
		//appc_enqueue_script('some_page', get_template_directory_uri() . '/assets/js/dist/some-page.js', ['jquery', 'theme-webapp'] );
	}
});