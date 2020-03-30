<?php

// this is a static class for utility (shared) methods
class APPC_UTILITY {

	// get a post object
	public static function get_wp_post($post = null, $use_global_fallback = true) {
		// try get the post from the provided data
		if(!empty($post)) {
			$this_post = gettype($post) == 'integer' ? get_post($post) : $post;
			return !empty($this_post) ? $this_post : false;
		}
		// if the use global fallback is set
		if($use_global_fallback) {
			global $post;
			return $post;
		}
		// otherwise
		return false;
	}

	// get a taxonomy object
	public static function get_wp_taxonomy($tax = null, $use_global_fallback = true) {
		// try to get the post from the data provided
		if(!empty($tax)) {
			$this_tax = gettype($tax) == "integer" ? get_term($tax) : $tax;
			return !empty($this_tax) ? $this_tax : false;
		}
		// use the global fallback if its set
		if($use_global_fallback) {
			global $tax;
			return $tax;
		}
		// otherwise
		return false;
	}

	// gets featured image data
	public static function get_featured_image($post_id = '', $imageSize = 'post-thumbnail') {
		// if there is a thumbnail_id/we have a featured image for this post
        $thumbnail_id = get_post_thumbnail_id($post_id);
        if(!empty($thumbnail_id)) {
            return [
                'title' => get_the_title($thumbnail_id),
                'url' => get_the_post_thumbnail_url($post_id, $imageSize),
                'alt' => get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true)
            ];
        }
		return false;
	}

	// gets an excerpt from a text
	public static function get_excerpt_from_text($text = '', $number_of_characters = 0, $ellipsis = '...') {
		// the basic excerpt, making sure to strip shortcodes and all tags
		$excerpt = wp_strip_all_tags(strip_shortcodes($text), true);
		// if we have characters set, then we'll trim
		if($number_of_characters > 0) {
			if(strlen($excerpt) > $number_of_characters) {
				$excerpt = substr($excerpt, 0, $number_of_characters);
				// the but excerpt will look really funky if its just cuts a work in half
				// so we'll try to find a 'space' to cut the text
				for($i = (strlen($excerpt)-1); $i >= 0; $i--) {
					if($excerpt[$i] == ' ') {
						$excerpt = substr($excerpt, 0, $i);
						break;
					}
				}
				return $excerpt . $ellipsis;
			}
			return $excerpt;
		} 
		return $excerpt;
	}

	// gets an acf link
	public static function get_ACF_link($linkACFObject, $defaultButtonText='') {
		// standardizing ACF link
		if(!empty($linkACFObject)) {
			return [
				'title' => empty($linkACFObject['title']) ? $defaultButtonText : $linkACFObject['title'],
				'url' => $linkACFObject['url'],
				'target' => empty($linkACFObject['target']) ? "_self" : $linkACFObject['target']
			];
		}
		return false;
	}

	// get ACF image array
    public static function get_ACF_image($imageACFObject, $imageSize = '') {
        // standardizing ACF image array
        if(!empty($imageACFObject)) {
            // set the basic image properties
            $imageObject = [
                'title' => $imageACFObject['title'],
                'url' => $imageACFObject['url'],
                'alt' => $imageACFObject['alt']
            ];
            // let's look for the specific image size to set the url
            if(!empty($imageSize)) {
                if(isset($imageACFObject['sizes'][$imageSize])) {
                    $imageObject['url'] = $imageACFObject['sizes'][$imageSize];
                }
			}
			return $imageObject;
        }
        return false;
	}

	// get youtube information from a youtube url
    public static function get_youtube_data_from_url($url) {
        if(!empty($url)) {
            $pattern = '/[\\?\\&]v=([^\\?\\&]+)/';
            preg_match($pattern, $url, $matches);
            $id = $matches[1];
            return [
                'iframe' => '//www.youtube.com/embed/' . $id . '?rel=0&enablejsapi=0&modestbranding=1&fs=1',
                'thumbnail_low' => '//img.youtube.com/vi/' . $id . '/sddefault.jpg',
                'thumbnail_med' => '//img.youtube.com/vi/' . $id . '/mqdefault.jpg',
                'thumbnail_high' => '//img.youtube.com/vi/' . $id . '/hqdefault.jpg',
                'thumbnail_max' => '//img.youtube.com/vi/' . $id . '/maxresdefault.jpg'
            ];
		} 
		return false;
    }

    // get ACF file array
    public static function get_ACF_file($fileACFObject) {
        // standardizing ACF file array
        if(!empty($fileACFObject)) {
            // set the basic image properties
            $fileObject = [
                'title' => $fileACFObject['title'],
                'url' => $fileACFObject['url'],
                'filename' => $fileACFObject['filename'],
                'subtype' => $fileACFObject['subtype'],
            ];
            return $fileObject;
        }
        return false;
    }

    // get ACF media gallery
    public static function get_ACF_media_gallery($galleryACFObject, $size = '') {
        $gallery = false;
        // standardizing ACF media gallery array
        if(!empty($galleryACFObject)) {
            // an array to store all of our gallery media in
            $gallery = [];
            foreach($galleryACFObject as $item) {
                // if we are looking for a size, and it's set for this item use it, else use the default url
                $url = (!empty($size) && isset($item['sizes'][$size])? $item['sizes'][$size] : $item['url']);
                $gallery[] = [
                    'title' => $item['title'],
                    'url' => $url,
                    'alt' => $item['alt'],
                    'type' => $item['type'],
                    'mime_type' => $item['mime_type'],
                ];
            }
        }
        return $gallery;
    }

    // get formatted click to call number
    public static function get_formatted_click_to_call_number($phone_number) {
        // initialize as false, to supply only valid number else we won't use the tel: protocol
        $formatted_click_to_call_number = false;
        if(!empty($phone_number)) {
            // remove special characters and letters
            $number_only = preg_replace('/[^0-9]/','', $phone_number);
            // if the first number is the USA country code (1)
            if($number_only[0] === "1") {
                // if the number has 11 digits (country code included)
                $formatted_click_to_call_number = (strlen($number_only) === 11 ? '+' . $number_only : false);
            } else {
                // if the number has 10 digits (country code excluded)
                // make sure the USA country code (1) is the first character
                $formatted_click_to_call_number = (strlen($number_only) === 10 ? '+1' . $number_only : false);
            }
        }
        return $formatted_click_to_call_number;
    }

    // share link generator
    public static function get_share_links($opts = []) {
        $options = array_merge([
            'page_url' => '',
            'image_url' => '',
            'title' => '',
            'body' => ''
        ], $opts);

        return [
            'pinterest' => [
                'link' => '//pinterest.com/pin/create/button/?url=' . $options['page_url']  . '&media=' . $options['image_url'],
                'width' => '750',
                'height' => '650'
            ],
            'facebook' => [
                'link' => '//www.facebook.com/sharer.php?u=' . $options['page_url'],
                'width' => '750',
                'height' => '650'
            ],
            'twitter' => [
                'link' => '//twitter.com/share?text=' . urlencode($options['title']) . '&url=' .  $options['page_url'],
                'width' => '750',
                'height' => '650'
            ],
            'email' => [
                'link' => 'mailto:?subject=' . $options['title'] . '&body=' . $options['body'],
                'width' => '',
                'height' => ''
            ]
        ];
    }

}