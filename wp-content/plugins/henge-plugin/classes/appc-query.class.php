<?php
class APPC_Query {

    // default query variables
    protected $default_numberposts_limit = -1;
    protected $default_page_number = 1;
    protected $default_orderby = 'menu_order';
    protected $default_term_orderby = 'term_order';
    protected $default_order = 'ASC';
    protected $default_hide_empty = false;
    protected $default_fields = 'ids';

    // --------------------
    // post object queries
    // --------------------
    // get posts
    public function get_posts($opts = []) {
        // get any options that we will use in our query
        $options = array_merge([
            'limit' => $this->default_numberposts_limit, // max number of posts to query for
            'page_number' => $this->default_page_number,
            'orderby' => $this->default_orderby,
            'order' => $this->default_order,
            'exclude' => [], // array of post ids
        ], $opts);
        // build the query object
        $query_object = [
            'posts_per_page' => $options['limit'],
            'paged' => $options['page_number'],
            'post_type' => 'post',
            'orderby' => $options['orderby'],
            'order' => $options['order']
        ];
        // add any excluded post ids
        if(!empty($options['exclude'])) {
            $query_object['post__not_in'] = $options['exclude'];
        }
        // do the query
        $the_query = new WP_Query($query_object);
        // create response object
        $response = [
            'results' => [],
            'limit' => $options['limit'],
            'page' => $options['page_number'],
            'total_results' => 0,
            'total_pages' => 0
        ];
        // if our response is not a wp_error
        if(!is_wp_error($the_query)) {
            $response['results'] = array_map(function($post) {
                return new APPC_CPT_Post($post);
            }, $the_query->posts);
            $response['total_results'] = $the_query->found_posts;
            $response['total_pages'] = max(($the_query->found_posts > 0 ? 1 : 0), $the_query->max_num_pages);
        }
        // return the response object
        return $response;
    }

    // get works
    public function get_works($opts = []) {
        // get any options that we will use in our query
        $options = array_merge([
            'limit' => $this->default_numberposts_limit, // max number of posts to query for
            'page_number' => $this->default_page_number,
            'orderby' => $this->default_orderby,
            'order' => $this->default_order,
            'exclude' => [], // array of post ids
        ], $opts);
        // build the query object
        $query_object = [
            'posts_per_page' => $options['limit'],
            'paged' => $options['page_number'],
            'post_type' => 'work',
            'orderby' => $options['orderby'],
            'order' => $options['order']
        ];
        // add any excluded post ids
        if(!empty($options['exclude'])) {
            $query_object['post__not_in'] = $options['exclude'];
        }
        // do the query
        $the_query = new WP_Query($query_object);
        // create response object
        $response = [
            'results' => [],
            'limit' => $options['limit'],
            'page' => $options['page_number'],
            'total_results' => 0,
            'total_pages' => 0
        ];
        // if our response is not a wp_error
        if(!is_wp_error($the_query)) {
            $response['results'] = array_map(function($post) {
                return new APPC_CPT_Work($post);
            }, $the_query->posts);
            $response['total_results'] = $the_query->found_posts;
            $response['total_pages'] = max(($the_query->found_posts > 0 ? 1 : 0), $the_query->max_num_pages);
        }
        // return the response object
        return $response;
    }


    // --------------------
    // taxonomy queries
    // --------------------
    // get inspiration categories
    public function get_inspiration_categories($opts = []) {
        // get any options that we will use in our query
        $options = array_merge([
            'limit' => $this->default_numberposts_limit,
            'orderby' => $this->default_term_orderby,
            'order' => $this->default_order,
            'hide_empty' => $this->default_hide_empty,
            'fields' => $this->default_fields,
            'by_post_id' => false,
            'post_ids' => [],
            'exclude' => [],
            'only_parents' => false
        ], $opts);
        // build the query object
        $query_object = [
            'taxonomy' => 'rs-inspiration-cat',
            'orderby' => $options['orderby'],
            'order' => $options['order'],
            'hide_empty' => $options['hide_empty'],
            'fields' => $options['fields']
        ];
        if($options['by_post_id']) {
            $query_object['object_ids'] = $options['post_ids'];
        }
        // add any excluded term ids
        if(!empty($options['exclude'])) {
            $query_object['exclude'] = $options['exclude'];
        }
        if($options['only_parents']) {
            $query_object['parent'] = 0;
        }
        // do the query
        $the_query = new WP_Term_Query($query_object);
        $response = [
            'results' => [],
            'limit' => $options['limit']
        ];
        // if our response is not a wp_error
        if(!is_wp_error($the_query) && !empty($the_query->terms)) {
            $response['results'] = array_map(function($term) {
                return $term;
            }, $the_query->terms);
        }
        return $response;
    }

}