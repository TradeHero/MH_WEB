<?php
/*
Template Name: Page Press
*/

?>
<?php get_header(); ?>

<div id="press-top" class="static-header light clearfix"  style="height: 180px;">
    <div class="container">
        <div class="row" id="hero-inner">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-heading">
                    <h1 class="animated hiding" data-animation="bounceInDown" data-delay="0">Press Coverage</h1>
                </div>
            </div>
        </div>
     </div>
</div>
<a id="showHere"></a>
	<section id="learning-content" class="section dark">
		<div class="container">
			<div class="row" id="blog">
				<?php
	            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } 
	            elseif ( get_query_var('page') ) { $paged = get_query_var('page');
	            } else { $paged = 1; }

	           // $args = array( 'posts_per_page' => 5, 'order'=> 'DESC', 'cat' => '193', 'paged' => $paged,'orderby'=>'date');
	            $args = array( 'posts_per_page' => 5, 'order'=> 'DESC', 'paged' => $paged,'orderby'=>'date');
	            ?>
	            <?php query_posts('cat=112'); ?>
	            <?php while (have_posts()) : the_post(); ?>
	            <div class="post">
	                <?php echo get_the_post_thumbnail($page->ID, array(960,360), array('class' => 'img-responsive')); ?>
	                <br /><br />
	                <span class="date thin"><?php the_time(__('j F Y', 'kubrick')) ?></span>
	                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	                <div class="blog-content">        
	                    <p><?php the_excerpt(140);?></p>
	                </div>
	            </div><!-- .post -->
	        	<br /><br /><hr class="blogbottom" />
	            <?php endwhile; ?>
			</div>
		</div>
    </section>


<?php get_footer(); ?>