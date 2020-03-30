<?php
/* Uses parameters of post types:
 *
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 *
 * */

// Register new taxonomy
register_taxonomy( 'appc_taxonomy', array( 'appc_cpt' ), array(
	'hierarchical'      => true,
	'labels'            => array(
		'name'              => __( 'APPC Taxonomies' ),
		'singular_name'     => __( 'APPC Taxonomy' ),
		'search_items'      => __( 'Search APPC Taxonomies' ),
		'all_items'         => __( 'All APPC Taxonomies' ),
		'parent_item'       => __( 'Parent APPC Taxonomies' ),
		'parent_item_colon' => __( 'Parent APPC Taxonomy:' ),
		'edit_item'         => __( 'Edit APPC Taxonomy' ),
		'update_item'       => __( 'Update APPC Taxonomy' ),
		'add_new_item'      => __( 'Add New APPC Taxonomy' ),
		'new_item_name'     => __( 'New APPC Taxonomy' ),
		'menu_name'         => __( 'APPC Taxonomies' ),
		'popular_items'		=> __( 'Popular APPC Taxonomies' )
	),
	'query_var'         => true,
	'rewrite'           => array(
		'hierarchical' => true,
		'slug' => 'appc_tax'
	)
));