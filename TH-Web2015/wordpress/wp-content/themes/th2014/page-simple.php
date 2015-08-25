<?php
/*
Template Name: Page Simple
*/

?>

<?php get_header(); ?>

<main class="simple-page">
    <div class="static-header dark clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if(have_posts()) : ?>
				   <?php while(have_posts()) : the_post(); ?>
				   		<?php the_content(); ?>
					<?php endwhile; ?>		
					<?php else : ?>
						<div class="alert alert-info">
						  <strong>No content in this loop</strong>
						</div>	
				<?php endif; ?>
            </div>
        </div>
    </div>
</div>
</main>	

<?php get_footer(); ?>