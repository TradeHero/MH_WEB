<?php
/**
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */

?>
<?php get_header(); ?>

<main role="main">
	<?php tradehero_get_banner(); ?>
	<div id="main" class="row">
		<div class="row-content buffer-left buffer-right buffer-bottom">
		<?php
			if( have_posts() ) {
				the_post();
				the_content();
			}
			get_template_part( 'widget', 'features' );
		?>
		</div>
	</div>
</main>

<?php get_footer(); ?>