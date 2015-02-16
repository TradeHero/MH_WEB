<?php

	// Menus
	register_nav_menus( array(
		'top' 		=> __( 'Top Menu', 'th-2015' ),
		'bottom'  	=> __( 'Bottom Menu', 'th-2015' ),
	) );

	// Dynamic Sidebar
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<aside>',
		'after_widget' => '</aside>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	// Tidy up the <head> a little. Full reference of things you can show/remove is here: http://rjpargeter.com/2009/09/removing-wordpress-wp_head-elements/
	remove_action('wp_head', 'wp_generator');// Removes the WordPress version as a layer of simple security 

	// Post thumbnails
	add_theme_support('post-thumbnails');
	add_image_size( 'thumbnail', 300, 300 ); 

	// Hide useless admin bar
	add_filter('show_admin_bar', '__return_false');

	// Post formats
	function add_post_formats() {
    add_theme_support( 'post-formats', array( 'gallery', 'quote', 'video', 'aside', 'image', 'link' ) );
	}
	add_action( 'after_setup_theme', 'add_post_formats', 20 );

?>