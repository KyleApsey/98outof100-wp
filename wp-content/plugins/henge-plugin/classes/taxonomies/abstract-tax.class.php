<?php 
abstract class Abstract_TAX {
	
	// the tax object
	protected $tax;
	
	public function __construct($tax = null) {
		// set the taxonomy object
		$this->tax = APPC_UTILITY::get_wp_taxonomy($tax);
	}

	// get name
	public function get_name($number_of_characters = 0, $ellipsis = '...') {
		return APPC_UTILITY::get_excerpt_from_text($this->tax->name, $number_of_characters, $ellipsis);
	}

	// get description
	public function get_description($number_of_characters = 0, $ellipsis = '...') {
		return APPC_UTILITY::get_excerpt_from_text($this->tax->description, $number_of_characters, $ellipsis);
	}

	// get term id
	public function get_id() {
		return $this->tax->term_id;
	}

	// update url 
	public function get_url(){
		return get_term_link($this->tax->term_id, $this->tax->taxonomy);
	}

	// get term parent
    public function get_parent() {
	    return $this->tax->parent;
    }
	
}