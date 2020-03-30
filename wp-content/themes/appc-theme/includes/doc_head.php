<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php wp_title() ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0" />
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
		<?php wp_head(); ?>	
	</head>
	
	<body <?php body_class(); ?>>