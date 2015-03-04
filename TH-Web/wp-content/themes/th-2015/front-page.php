<?php 
/* Front page template */
get_header(); ?>

<div id="home">	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="intro-wrap">
		<div id="intro" class="preload" data-autoplay="5000" data-navigation="true" data-pagination="true" data-transition="fadeUp">
			<div class="intro-item" style="background-color: #1376FB; background-image: url('<?php bloginfo('template_url'); ?>/assets/img/bg-home.jpg');">
				<div class="caption">
					<h2>Trade Better, Together</h2>
					<p>Join the global movement of over a million users that empowers you to invest.<br />
					Practice risk free using real market data, share insights, and earn cash, while having fun everyday!</p>
					<a id="cta-apple" class="button" href="#"><img src="<?php bloginfo('template_url'); ?>/assets/img/btn-download-apple.png" /></a><a id="cta-google" class="button" href="#"><img src="<?php bloginfo('template_url'); ?>/assets/img/btn-download-google.png" /></a>
					
				</div><!-- caption -->
			</div>
		</div><!-- intro -->
	</div><!-- end #intro-wrap -->
	<div id="main">
		<?php the_content(); ?></p>
	</div><!-- End #main -->
	<?php endwhile; ?>
	<?php endif; ?>
</div><!-- end #home -->	
<?php get_footer(); ?>