<?php
abstract class Abstract_Page_Template {

	// post object
	protected $post;

	// constructor
	public function __construct($post = null) {
		// set the post object
		$this->post = APPC_UTILITY::get_wp_post($post);
	}

	// get the post_id
	public function get_id() {
		return $this->post->ID;
	}

	// get permalink
	public function get_permalink() {
		return get_permalink($this->post);
	}

	// get page title
	public function get_title($number_of_characters = 0, $ellipsis = '...') {
		return APPC_UTILITY::get_excerpt_from_text($this->post->post_title, $number_of_characters, $ellipsis);
	}

	// get excerpt
	public function get_excerpt($number_of_characters = 140, $ellipsis = '...') {
		return APPC_UTILITY::get_excerpt_from_text($this->get_content(), $number_of_characters, $ellipsis);
	}

	// get page content
	public function get_content() {
		return apply_filters('the_content', $this->post->post_content);
	}

	// get feautured image
    protected $featured_image = null;
    public function get_featured_image($imageSize = 'post-thumbnail') {
        if($this->featured_image === null) {
			$this->featured_image = APPC_UTILITY::get_featured_image($this->get_id(), $imageSize);
        }
        return $this->featured_image;
	}

}