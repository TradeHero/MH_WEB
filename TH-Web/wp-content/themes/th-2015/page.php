<?php 
/* Default page template */
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div id="intro-wrap">
			<div id="intro" class="preload darken">
			<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<div class="intro-item" style="background: url('<?php echo $background['0'];?>')">
					<div class="caption">
						<h2><?php the_title(); ?></h2>
					</div><!-- caption -->
				</div><!-- intro -->
			</div><!-- intro -->				
		</div><!-- intro-wrap -->
		<div id="main">
			<section class="row section">
				<div class="row-content buffer even clear-after">				
					<?php the_content(); ?>
				</div>
			</section>	
		</div><!-- End #main -->
	</article>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>