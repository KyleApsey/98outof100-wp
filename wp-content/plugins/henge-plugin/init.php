<?php
/*
Plugin Name: Henge Plugin
Description: This plugin add the custom functionality to WordPress
Version:     1.0.0
Author:      Kyle Apsey
 */

define( 'TEMPLATE_PLUGIN_PATH', plugin_dir_path(__FILE__));
define( 'TEMPLATE_PLUGIN_URL', plugin_dir_url(__FILE__));

// Load Third-Party
foreach (glob(TEMPLATE_PLUGIN_PATH. '/includes/third-party/*.php') as $filename) { include $filename; }

// Load Functions
foreach (glob(TEMPLATE_PLUGIN_PATH. '/includes/functions/*.php') as $filename) { include $filename; }

// Load root classes
foreach (glob(TEMPLATE_PLUGIN_PATH . '/classes/*.php') as $filename) { require_once $filename; }

// Load Custom Post Type Classes
require_once TEMPLATE_PLUGIN_PATH. '/classes/custom-post-types/abstract-cpt.class.php';
foreach (glob(TEMPLATE_PLUGIN_PATH. '/classes/custom-post-types/*.class.php') as $filename) { require_once $filename; }

// Load Site Config Classes
foreach (glob(TEMPLATE_PLUGIN_PATH. '/classes/site-config/*.class.php') as $filename) { require_once $filename; }

// Load Taxonomy Classes
require_once TEMPLATE_PLUGIN_PATH. '/classes/taxonomies/abstract-tax.class.php';
foreach (glob(TEMPLATE_PLUGIN_PATH. '/classes/taxonomies/*.class.php') as $filename) { require_once $filename; }