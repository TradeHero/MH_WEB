<?php get_header(); ?>

<?php
	if ( is_front_page()  ) {
		// Include the featured content template.
		get_template_part( 'page-home' );
	}else{
?>
<?php if(have_posts()) : ?>
   <?php while(have_posts()) : the_post(); ?>	
    <div id="" class="static-header light clearfix">
        <div class="container">
            <div class="row" id="hero-inner">
                <div class="col-md-8 col-md-offset-2">
                    <div class="text-heading">
                        <h1 class="animated hiding" data-animation="bounceInDown" data-delay="0"><?php the_title(); ?></h1>
                        <hr />
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   <section id="features-list" class="section dark">

		 	<?php the_content(); ?>
    </section> 		
	<?php endwhile; ?>
		
		<?php else : ?>
		
		<div class="alert alert-info">
		  <strong>No content in this loop</strong>
		</div>
		
<?php endif;
}
?>


<?php get_footer(); ?>