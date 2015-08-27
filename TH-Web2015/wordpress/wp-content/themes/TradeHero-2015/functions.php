<?php
/**
 * TradeHero functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */

/**
 * TradeHero setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since TradeHero 2.0
 */
function tradehero_setup () {
	// Remove autop filter
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );
	
	/*
	 * Makes theme available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'tradehero', get_template_directory() . '/languages' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Adds RSS feed links to <head> for posts and comments.
	// add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	// add_theme_support( 'custom-background', array(
	// 	'default-color' => 'f5f5f5',
	// ) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'chat'
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

	// This theme styles the visual editor with editor-style.css to match the theme style.
	// add_editor_style();
	
	add_filter( 'widget_text', 'do_shortcode' );
	
	/*
	 * menus
	 */
	register_nav_menus(
		array(
			'header_menu' 	=> 'Header',
			'footer_menu' 	=> 'Footer',
			'language' 		=> 'Language'
		)
	);
	
	/*
	 * filters
	 */
	require get_template_directory() . '/inc/title-filter.php';
	require get_template_directory() . '/inc/paging-filter.php';
	require get_template_directory() . '/inc/widget-categories-filter.php';
	require get_template_directory() . '/inc/subcategory-hierarchy.php';

	/*
	 * register dynamic sidebars
	 */
	require get_template_directory() . '/inc/category-sidebar.php';

	/*
	 * shortcodes
	 */
	require get_template_directory() . '/inc/compat-shortcode.php';
	require get_template_directory() . '/inc/sidebar-shortcode.php';
	require get_template_directory() . '/inc/banner-shortcode.php';
	require get_template_directory() . '/inc/slider-shortcode.php';
	require get_template_directory() . '/inc/video-shortcode.php';
	require get_template_directory() . '/inc/member-shortcode.php';
	require get_template_directory() . '/inc/feature-shortcode.php';
	require get_template_directory() . '/inc/grid-shortcode.php';

	/**
	 * Ajax handlers
	 */
	require get_template_directory() . '/inc/ajax-feedback.php';
	require get_template_directory() . '/inc/ajax-send-message.php';
	require get_template_directory() . '/inc/ajax-leaderboard.php';
}
add_action( 'after_setup_theme', 'tradehero_setup' );


/**
 * Helpers
 */
require get_template_directory() . '/inc/get-banner.php';
function tradehero_boolean_to_string( $var ) {
	return $var ? 'true' : 'false';
}
function tradehero_activate_blog_nav() {
	function tradehero_active_blog_nav_class($classes, $item){
		if( $item->title == 'Blog' ){
		    $classes[] = 'active';
		}
		return $classes;
	}
	add_filter('nav_menu_css_class' , 'tradehero_active_blog_nav_class' , 10 , 2);
}
function tradehero_random_avatar() {
	echo get_template_directory_uri() . '/img/avatars/' . rand(0,7) . '.png';
}
?>