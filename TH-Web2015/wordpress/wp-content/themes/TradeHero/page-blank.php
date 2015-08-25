<?php 
/*
Template Name: Blank
*/
get_header(); ?>
  <div class="jum-maincontainer">
    <div class="container jcontainer">

      <div class="jumbotron">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="jp-icon" id="jp-tq-icon"><?php the_post_thumbnail('full'); ?></div>
        <h2><?php the_title(); ?></h2>

          <p class="lead"><?php the_content(); ?></p>



          <?php /*<p><a class="btn btn-lg btn-success" href="#">Join Now</a></p> */ ?>

        <?php endwhile; else: ?>

        <?php endif; ?>

      </div>

    </div> <!-- /container -->
  </div>

<?php get_footer(); ?>
