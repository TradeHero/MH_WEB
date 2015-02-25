<?php
	//Disable the auto adding of <p> tags
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );

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

	// Columns: Halves

	function one_half($attr, $content = null ) {
		return '<div class="column six ' . $attr['class'] . ' ">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_half', 'one_half');

	
	function one_half_last($attr, $content = null ) {
		return '<div class="column six last ' . $attr['class'] . ' ">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_half_last', 'one_half_last');

	// Columns: Thirds
	
	function one_third($attr, $content = null ) {
		return '<div class="column four ' . $attr['class'] . ' ">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_third', 'one_third');

	
	function one_third_last($attr, $content = null ) {
		return '<div class="column four last ' . $attr['class'] . ' ">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_third_last', 'one_third_last');

	// Columns: Fourths

	function one_fourth($attr, $content = null ) {
		return '<div class="column three ' . $attr['class'] . ' ">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_fourth', 'one_fourth');

	
	function one_fourth_last($attr, $content = null ) {
		return '<div class="column three last ' . $attr['class'] . ' ">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_fourth_last', 'one_fourth_last');

	function three_fourths($attr, $content = null ) {
		return '<div class="column nine ' . $attr['class'] . ' ">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('three_fourths', 'three_fourths');

	function three_fourths_last($attr, $content = null ) {
		return '<div class="column nine last ' . $attr['class'] . ' ">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('three_fourths_last', 'three_fourths_last');


	// Sections

	function section($attr, $content = null ) {
		return 
			'<section class="row section"><div class="row-content clear-after ' . $attr['class'] . ' ">'
				. do_shortcode( $content ) .
			'</div></section>'		
		;
	}
	add_shortcode('section', 'section');
?>