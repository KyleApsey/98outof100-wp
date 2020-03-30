<?php
/***************
 * This file should not be manipulated!  This is a core file to the theme.
 * Please make changes to the files in the /includes folder.
 * Add template files in the root theme folder
 ***************/

// global variable
define('TEMPLATE_THEME_PATH', get_template_directory());
define('TEMPLATE_THEME_URL', get_template_directory_uri());
// proxy function for registering styles (helps with cachebusting)
function appc_enqueue_style( $handle, $src = '', $deps = array(), $ver = false, $media = 'all' ) {
	wp_enqueue_style( $handle, $src, $deps, ($ver ? $ver : filemtime( str_replace(TEMPLATE_THEME_URL, TEMPLATE_THEME_PATH, $src) )), $media);
}

// proxy function for registering styles (helps with cachebusting)
function appc_enqueue_script( $handle, $src = '', $deps = array(), $ver = false, $in_footer = true ) {
	if(!$ver) {
		if($ver = @filemtime( str_replace(TEMPLATE_THEME_URL, TEMPLATE_THEME_PATH, $src)) ) {
			// all good here
		} else {
			$current_theme = wp_get_theme();
			$ver = $current_theme->get('Version');
		}
	}
	wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer);
}
		
// media loading
require_once TEMPLATE_THEME_PATH . '/includes/functions/functions-media.php';

// asset loading
require_once TEMPLATE_THEME_PATH . '/includes/functions/functions-assets.php';

// menu loading
require_once TEMPLATE_THEME_PATH . '/includes/functions/functions-menus.php';

// options page loading
require_once TEMPLATE_THEME_PATH . '/includes/functions/functions-options.php';

// import page classes
foreach (glob(TEMPLATE_THEME_PATH. '/includes/page_classes/*.class.php') as $filename) { require_once $filename; }

// import page classes
require_once TEMPLATE_THEME_PATH . '/page-classes/abstract-page-template.class.php';
foreach (glob(TEMPLATE_THEME_PATH. '/page-classes/*.class.php') as $filename) { require_once $filename; }

// import part classes
require_once TEMPLATE_THEME_PATH . '/part-classes/abstract-part-template.class.php';
foreach (glob(TEMPLATE_THEME_PATH. '/part-classes/*.class.php') as $filename) { require_once $filename; }