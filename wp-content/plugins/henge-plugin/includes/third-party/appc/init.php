<?php 
// Setups up APPC custom functionality
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// lets add our plugin enhancements
foreach (glob(dirname(__FILE__) . '/plugin-enhancements/*.php') as $filename) { include $filename; }

// lets load our custom WordPress object classes
foreach (glob(dirname(__FILE__) . '/wp-objects/*.class.php') as $filename) { include $filename; }