<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php $background = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' ); ?>
    
    <div class="row buffer even">
        <div class="row-content">
            <div class="column six push-three">
                <article class="single-post">
                	<h1><?php the_title(); ?></h1>
                	<h5 class="meta-post"><a href="<?php get_category_link(); ?>"><?php the_category( ', ' ); ?></a> - <time datetime="2013-11-10"><?php the_date(); ?></time></h5>
                	<?php the_content(); ?>
                </article>
            </div>
        </div>
    </div>

<?php endwhile; else: ?>
    <p>Sorry, this page does not exist</p>
<?php endif; ?>
    
<?php get_footer(); ?>