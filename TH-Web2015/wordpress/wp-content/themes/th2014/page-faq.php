<?php
/*
Template Name: FAQ Page
*/

?>

<?php get_header(); ?>
<main class="simple-page">
    <div class="static-header dark clearfix">
        <div class="container">
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
</main>
<?php get_footer(); ?>