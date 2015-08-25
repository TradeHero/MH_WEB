<?php
/**
 * Template Name: Article Flow
 * 
 * 
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */

if( !is_home() ) {
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	query_posts( array(
		'paged'				=> $paged,
		'posts_per_page'	=> get_option('posts_per_page'),
		'post_status'		=> 'publish',
		'cat'				=> $cat
	) );

	$posts = $wp_query->posts;
}
get_template_part( 'category' );
?>