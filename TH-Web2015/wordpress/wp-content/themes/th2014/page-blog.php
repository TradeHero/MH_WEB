<?php
/*
Template Name: Page Blog
*/

?>

<?php get_header(); ?>

<main class="simple-page">
    <div class="static-header dark clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div id="posts">
                    <h1>What's happening</h1>
                    <?php
                    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } 
                    elseif ( get_query_var('page') ) { $paged = get_query_var('page');
                    } else { $paged = 1; }

                    // $args = array( 'posts_per_page' => 5, 'order'=> 'DESC', 'cat' => '193', 'paged' => $paged,'orderby'=>'date');
                    $args = array( 'posts_per_page' => 5, 'order'=> 'DESC', 'paged' => $paged,'orderby'=>'date');
                    ?>
                    <?php query_posts('cat=-112'); ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <div class="post">
                        <?php echo get_the_post_thumbnail($page->ID, array(960,360), array('class' => 'img-responsive')); ?>
                        <br /><br />
                        <span class="date thin"><?php the_time(__('j F Y', 'kubrick')) ?></span>
                        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <div class="blog-content">        
                            <p><?php the_excerpt(144);?></p>
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
    </div>
</div>
</main>

<?php get_footer(); ?>