<?php
/**
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */
?>

<?php 
tradehero_activate_blog_nav();
get_header(); 
?>

<main role="main">
	<div id="main" class="row">
		<div class="row-content buffer-left buffer-right buffer-bottom">
			<?php
			if( have_posts() ) {
				the_post();
			?>
			<div class="post-area clear-after">
				<div class="post-thumbnail"><?php the_post_thumbnail( 'full' ); ?></div>
				
				<article role="main">
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_sharing_toolbox meta-social"></div>
					<?php get_template_part( 'widget', 'post-meta-heading' ); ?>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>	
				</article>

			</div><!-- post-area -->
			<?php
			}
			get_template_part( 'widget', 'post-pagination' );
			?>
		</div><!-- row-content -->
	</div><!-- row -->
</main>

<?php get_footer(); ?>