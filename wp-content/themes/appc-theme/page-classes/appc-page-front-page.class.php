<?php
class APPC_Page_Front_Page extends Abstract_Page_Template {

    // ------------------------
    // hero
    // ------------------------
    // hero heading
    public function get_hero_heading() {
        return get_field('field_5ddd3d03f56c2', $this->get_id());
    }
    // hero image
    public function get_hero_image() {
        $img_obj = get_field('field_5ddcb2b99ba6e', $this->get_id());
        return APPC_UTILITY::get_ACF_image($img_obj);
    }

    // works hero image
    public function get_hero_image_works() {
        $img_obj = get_field('field_5ddd36a18bae8', $this->get_id());
        return APPC_UTILITY::get_ACF_image($img_obj);
    }

    // blog hero image
    public function get_hero_image_blog() {
        $img_obj = get_field('field_5ddeb3ffc5078', $this->get_id());
        return APPC_UTILITY::get_ACF_image($img_obj);
    }

    // about hero image
    public function get_hero_image_about() {
        $img_obj = get_field('field_5ddd36938bae7', $this->get_id());
        return APPC_UTILITY::get_ACF_image($img_obj);
    }

    // contact hero image
    public function get_hero_image_contact() {
        $img_obj = get_field('field_5ddeb4fac5079', $this->get_id());
        return APPC_UTILITY::get_ACF_image($img_obj);
    }

    // ------------------------
    // about
    // ------------------------
    // has about
    public function has_about() {
        return (!empty($this->get_about_image()) || !empty($this->get_about_text()));
    }

    // about image
    public function get_about_image() {
        $img_obj = get_field('field_5ddd3446d1c3a', $this->get_id());
        return APPC_UTILITY::get_ACF_image($img_obj);
    }

    // about text
    public function get_about_text() {
        return get_field('field_5ddd3450d1c3b', $this->get_id());
    }

    // ------------------------
    // works
    // ------------------------
    // has works
    public function has_works() {
        return (!empty($this->get_works_text()) || !empty($this->get_works_projects()));
    }

    // works text
    public function get_works_text() {
        return get_field('field_5ddd36d28baeb', $this->get_id());
    }

    // works projects
    public function get_works_projects() {
        $picked_project_ids = get_field('field_5ddd383ff0edd', $this->get_id());
        return (!empty($picked_project_ids) ? array_map(function($project_id) {
            return new APPC_CPT_Work($project_id);
        }, $picked_project_ids) : false);
    }

    // ------------------------
    // blog
    // ------------------------
    // has blog
    public function has_blog() {
        return !empty($this->get_blog_posts());
    }

    // get blog posts
    public function get_blog_posts() {
        $query = new APPC_Query();
        return $query->get_posts([
            'limit' => -1
        ])['results'];
    }

    // ------------------------
    // contact
    // ------------------------
    // has contact
    public function has_contact() {
        return !empty($this->get_contact_text());
    }

    // get contact text
    public function get_contact_text() {
        return get_field('field_5ddecf0518ee8', $this->get_id());
    }
    

}