<?php
/* Uses parameters of post types:
 * 
 * http://codex.wordpress.org/Function_Reference/register_post_type
 * 
 * */

// Register new post type
$appc_cpt = new APPC_CPT('work', [
	'simple_labels' => [
		'singular' => __( 'Work' ),
		'plural' => __( 'Works' )
	],
	'map_meta_cap' => true,
	'public' => true,
	'show_ui' => true,
	'has_archive' => false,
	'hierarchical' => false,
	'show_in_menu' => true,
	'menu_icon'=>'dashicons-images-alt', /* see other icon options here: https://developer.wordpress.org/resource/dashicons/ */
	'menu_position' => 25,
	'supports' => ['title', 'editor', 'thumbnail'],
	'rewrite' => [
		'slug' => 'work'
	],
	'list_columns' => array(
		'cb' => '<input type="checkbox" />',
		'title' => __('Work'),
		'post_id' => __('Post ID'),
		'date' => __('Date')
	)
]);

$appc_cpt->set_column_data(function($column, $post_id ){
	if($column == 'post_id') {
		echo $post_id;
	}
});