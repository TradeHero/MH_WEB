<?php get_header();?>

	<div id="intro-wrap"  data-height="11.111">
		<div id="intro" class="preload darken">
			<div class="intro-item" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/bg-blog.png');">
				<div class="caption">
					<h2>What's New</h2>
				</div><!-- caption -->		
			</div><!-- intro -->
		</div><!-- intro -->				
	</div><!-- intro-wrap -->

	<div id="main" class="row">
		<div class="row-content buffer-left buffer-right buffer-bottom clear-after">
			<div class="column eight blog list-style">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="clear-after">
						<div class="column three">
							<figure><?php the_post_thumbnail('thumbnail'); ?></figure>	
						</div>
						<div class="column nine last">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<h5 class="meta-post"><a href="<?php get_category_link(); ?>"><?php the_category( ', ' ); ?></a> - <time datetime="2013-11-10"><?php the_date(); ?></time></h5>
							<p><?php the_content(); ?></p>	
						</div>
					</article>
				<?php endwhile; // End the loop. ?>
			<?php /* Display navigation to next/previous pages when applicable */ ?>
			<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			    <div id="pagination">
			    	<div id="pagination">
						<ul class="clear-after reset plain">
							<li id="older" class="pagination-nav"><?php next_posts_link( __( 'Older posts' ) ); ?></li> 
							<li id="newer" class="pagination-nav"><?php previous_posts_link( __( 'Newer posts' ) ); ?></li>  
						</ul>
					</div>
			    </div>
			<?php endif; ?>
			</div>
			<aside class="column three last"><?php get_sidebar(); ?></aside>
		</div>
	</div>

<?php get_footer(); ?>