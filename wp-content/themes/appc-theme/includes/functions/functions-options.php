<?php

// --------------------
// options pages
// --------------------
// pages
if(function_exists('acf_add_options_page')) {
    // site config
    acf_add_options_page([
        'page_title' => __('Site Config'),
        'menu_title' => __('Site Config'),
        'menu_slug' => 'site-config',
        'parent_slug' => '',
        'capability' => 'edit_posts',
        'position' => 59,
        'icon_url' => 'dashicons-admin-generic',
        'post_id' => 'site-config'
    ]);
}

// sub pages
if(function_exists('acf_add_options_sub_page')) {
    // site config general content
    acf_add_options_sub_page([
        'page_title' => __('General Content'),
        'menu_title' => __('General Content'),
        'parent_slug' => 'site-config',
        'menu_slug' => 'site-config-general-content',
        'capability' => 'edit_posts',
        'post_id' => 'site-config-general-content'
    ]);

}