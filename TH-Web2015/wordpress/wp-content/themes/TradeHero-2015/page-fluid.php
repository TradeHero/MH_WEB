<?php
/**
 * Template Name: Content Fluid
 * 
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */

?>
<?php get_header(); ?>

<main role="main">
<?php
	if( have_posts() ) {
		the_post();
		the_content();
	}
?>
</main>

<?php get_footer(); ?>