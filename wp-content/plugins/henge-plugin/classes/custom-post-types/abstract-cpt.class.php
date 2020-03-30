<?php 
abstract class Abstract_CPT {
	
	// the post object
	protected $post;
	
	public function __construct($post = null) {
		// set the post object
		$this->post = APPC_UTILITY::get_wp_post($post);
	}

	// get the post
	public function get_post() {
		if(!empty($this->post)) {
			return $this->post;
		}
		return null;
	}

	// get post id
	public function get_id() {
		if(!empty($this->post)) {
			return $this->post->ID;
		}
		return null;
	}

    public function get_date() {
        return get_the_date();
    }

	// get post permalink
	public function get_permalink() {
		return get_permalink($this->post);
	}

	// get post content
	public function get_content() {
		return apply_filters('the_content', $this->post->post_content);
	}

	// get post title
	public function get_title($number_of_characters = 0, $ellipsis = '...') {
		return APPC_UTILITY::get_excerpt_from_text($this->post->post_title, $number_of_characters, $ellipsis);
	}

	// get excerpt from the user content
	public function get_excerpt($number_of_characters = 140, $ellipsis = '...') {
		return APPC_UTILITY::get_excerpt_from_text($this->get_content(), $number_of_characters, $ellipsis);
	}

    // get the featured image
    protected $featured_image = null;
    public function get_featured_image($imageSize = 'post-thumbnail') {
        if($this->featured_image === null) {
			$this->featured_image = APPC_UTILITY::get_featured_image($this->get_id(), $imageSize);
        }
        return $this->featured_image;
    }
	
}