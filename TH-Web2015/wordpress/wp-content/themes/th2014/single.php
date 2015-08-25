<?php
/**
 * The template for displaying all single posts
 *
 * @package TH2014
 * @subpackage TH2014
 * @since TH2014 1.0
 */

get_header(); ?>
<div id="blog" class="static-header dark clearfix">
    <div class="container">
		
	            
<div id="posts" class="dark clearfix col-xs-8 col-centered">

    <?php while (have_posts()) : the_post(); ?>
    <div class="post">
        <?php echo get_the_post_thumbnail($page->ID, array(960,360)); ?>
		<br /><br />
		<span class="date thin"><?php the_time(__('j F Y', 'kubrick')) ?></span>
        <h2><?php the_title(); ?></h2>
		<div class="blog-content">        
		<?php 
		the_content();
		//the_excerpt(250);
		 ?>
		</div>
    </div><!-- .post -->
<br /><br /><hr class="blogbottom" />
    <?php endwhile; ?>
</div><!-- #posts -->
<div class="pagination">
    <div class="prev-posts">
    <?php previous_posts_link('Newer Entries &raquo;'); ?>
    </div><!-- .prev-posts -->
    <div class="next-posts">
    <?php next_posts_link('&laquo; Older Entries'); ?>
    </div><!-- .next-posts -->
    
</div><!-- .pagination -->

		
	</div>
</div>


<?php //get_sidebar(); ?>
<?php get_footer(); ?>