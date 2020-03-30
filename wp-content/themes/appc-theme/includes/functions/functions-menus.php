<?php
/* Example use of wp_nav_menu with class support on li and a elements
wp_nav_menu([
	 'theme_location' => 'header-menu',
	 'container' => false,
	 'items_wrap' => '%3$s', // this removes the ul wrapper
	 'li_classes' => 'site-header__nav-top-item',
	 'a_classes' => 'site-header__nav-top-item-link'
]);
*/

// register menus
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array(
		'header-menu' => 'Header Menu'
	));
}

// this will add css classes to nav menu items
add_filter('nav_menu_css_class',function($classes, $item, $args) {
	if(isset($args->li_classes)) {
		$classes[] = $args->li_classes;
	}
	return $classes;
},1,3);
	
// this will add css classes to nav menu links
add_filter('nav_menu_link_attributes',function($atts, $item, $args) {
	$classes = $item->classes;
	if(isset($args->a_classes)) {
		$classes[] = $args->a_classes;
	}
	$atts['class'] = implode(' ', $classes);
	return $atts;
},1,3);