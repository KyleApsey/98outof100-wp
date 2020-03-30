<?php
/* Name: APPC_CPT
 * Description: Helper class to generating and customizing Custom Post Types
 * Author: Kyle Apsey
 * Company: APPC
 * Version: 1.0.0
 */
if( !class_exists('APPC_CPT') ) {
	class APPC_CPT {
	    
	    public $Type;
	    public $Args;
	    public $Metaboxes=array();
	    
	    // create new Custom Post Type
	    public function __construct( $type = '', $args = array(), $textdomain = 'default' ) {
	        if( $this->is_valid_cpt_name($type) ) {
	            $this->Type = $type;
	            $this->Args = $args;
	            
	            if(array_key_exists('simple_labels', $this->Args) && is_array($this->Args['simple_labels'])) {
	            	$labels = array_merge(['plural' => 'Posts', 'singular' => 'Post', 'featured_image' => 'Featured Image'], $this->Args['simple_labels']);
	            	$this->Args['labels'] = [
						'name'                  => _x( $labels['plural'], 'Post Type General Name', $textdomain ),
	            		'singular_name'         => _x( $labels['singular'], 'Post Type Singular Name', $textdomain ),
	            		'menu_name'             => __( $labels['plural'], $textdomain ),
	            		'name_admin_bar'        => __( $labels['singular'], $textdomain ),
	            		'archives'              => __( $labels['singular'] . ' Archives', $textdomain ),
	            		'parent_item_colon'     => __( 'Parent ' . $labels['singular'] . ':', $textdomain ),
	            		'all_items'             => __( 'All ' . $labels['plural'], $textdomain ),
	            		'add_new_item'          => __( 'Add New ' . $labels['singular'], $textdomain ),
	            		'add_new'               => __( 'Add New ' . $labels['singular'], $textdomain ),
	            		'new_item'              => __( 'New ' . $labels['singular'], $textdomain ),
	           			'edit_item'             => __( 'Edit ' . $labels['singular'], $textdomain ),
	           			'update_item'           => __( 'Update ' . $labels['singular'], $textdomain ),
	           			'view_item'             => __( 'View ' . $labels['singular'], $textdomain ),
	           			'search_items'          => __( 'Search ' . $labels['plural'], $textdomain ),
	           			'not_found'             => __( 'No ' . strtolower($labels['plural']) . ' found', $textdomain ),
	           			'not_found_in_trash'    => __( 'No ' . strtolower($labels['plural']) . ' found in Trash', $textdomain ),
	           			'featured_image'        => __( $labels['featured_image'], $textdomain ),
	           			'set_featured_image'    => __( 'Set ' . strtolower($labels['featured_image']), $textdomain ),
	           			'remove_featured_image' => __( 'Remove ' . strtolower($labels['featured_image']), $textdomain ),
	            		'use_featured_image'    => __( 'Use as ' . strtolower($labels['featured_image']), $textdomain ),
	           			'insert_into_item'      => __( 'Insert into ' . strtolower($labels['singular']), $textdomain ),
	           			'uploaded_to_this_item' => __( 'Uploaded to this ' . strtolower($labels['singular']), $textdomain ),
	           			'items_list'            => __( $labels['plural'] . ' list', $textdomain ),
	           			'items_list_navigation' => __( $labels['plural'] . ' list navigation', $textdomain ),
	           			'filter_items_list'     => __( 'Filter ' . strtolower($labels['singular']) . ' list', $textdomain ),
	            	];
	            }
	            
	            register_post_type( $this->Type, $this->Args );
	            
	            // what columns to display when showing the list of post types
	            add_filter('manage_' . ($this->Type) . '_posts_columns', array( &$this, 'post_type_columns' ));
	        } else {
	            return 'CPT Name is not valid (20 character max, no upper case or spaces).';
	        }
	    }
	    
	    // customize the post type column label
	    public function post_type_columns($defaults) {
	        return $this->Args['list_columns'];
	    }
	    
	    // what data to display for each column
	    public function set_column_data($function) {
	        add_action('manage_' . ($this->Type) . '_posts_custom_column', $function, 10, 2);
	    }
	    
	    // is the CPT name max of 20 characters and doesn't contain upper case or space?
	    public function is_valid_cpt_name($string='') {
	        return (strlen($string)>0 && strlen($string)<=20) && !preg_match('/[A-Z\ ]/', $string);
	    }
	}
}