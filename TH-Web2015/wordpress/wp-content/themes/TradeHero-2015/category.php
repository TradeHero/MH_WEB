<?php
/**
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$exclude_cat = get_cat_id( 'TH' );

query_posts( array(
	'paged'				=> $paged,
	'posts_per_page'	=> get_option('posts_per_page'),
	'post_status'		=> 'publish',
	'cat'				=> empty( $exclude_cat ) ? $cat : $cat . ',-' . $exclude_cat
) );

$posts = $wp_query->posts;

tradehero_activate_blog_nav();
get_header(); 

$current_page = get_query_var('paged') ? get_query_var('paged') : 1;
?>
<main role="main" class="blog masonry-style">
	<?php 
	// Get banner from posts page
	$blog_page_ID = get_option( 'page_for_posts' );
	tradehero_get_banner( $blog_page_ID ); 
	?>
	<div id="main" class="row">
		<div class="row-content buffer">
			<?php
			the_content();
			if ( is_active_sidebar( 'sidebar-category' ) ) {
			?>
				<aside role="complementary" class="column small-three right">
					<?php dynamic_sidebar( 'sidebar-category' ); ?>
				</aside>
				<div class="column small-nine small-last">
			<?php } else { ?>
				<div class="column">
			<?php } ?>
				<div class="grid-items preload">
					<div class="shuffle-sizer three"></div>
					<?php
					$facebook_page_id = get_field('fb_page_id', 'option');
					if( !empty( $facebook_page_id ) ) {
						// Prepend 2 facebook posts to the mansory
						$perpage = get_field('fb_limit_per_page', 'option');
						$offset = $current_page * $perpage;
						$access_token = get_field('fb_access_token', 'option');
					?>
						<script class="ajax-get-helper" type="text/html" 
						data-request="https://graph.facebook.com/v2.4/<?php echo $facebook_page_id; ?>/posts?offset=<?php echo $offset; ?>&amp;limit=<?php echo $perpage; ?>&amp;fields=id,message,attachments,created_time&amp;access_token=<?php echo $access_token; ?>">
						{{ each data as post }}
							<article class="column six item facebook-feed">
								<h5 class="meta-post">
									<a href="https://www.facebook.com/<?php echo $facebook_page_id; ?>" target="_blank"><span class="fa fa-lg fa-facebook-square"></span> TradeHero</a>&nbsp;-&nbsp;
									<time datetime="{{ post.created_time }}">{{ post.created_time | dateFormat: 'MMM dd, yyyy' }}</time>
									<div class="fb-follow" data-href="https://www.facebook.com/TradeHero" data-width="100" data-height="20" data-layout="button" data-show-faces="true"></div>
								</h5>
								{{ if post.attachments.data }}
									{{ if post.attachments.data[0].media && post.attachments.data[0].media.image }}
										<figure>
											<a target="_blank" href="{{ post.attachments.data[0].url }}" 
											title="{{ post.attachments.data[0].title }}">
												<img src="{{ post.attachments.data[0].media.image.src }}" 
												width="{{ post.attachments.data[0].media.image.width }}" 
												height="{{ post.attachments.data[0].media.image.height }}">
												{{ if post.attachments.data[0].type == 'video_autoplay' }}
													<span class="play-button"></span>
												{{ /if }}
											</a>
										</figure>
									{{ /if }}
									{{ if post.attachments.data[0].type == 'share' || post.attachments.data[0].type == 'video_autoplay' }}
										<h2 class="article-title">
											<a target="_blank" 
											href="{{ post.attachments.data[0].url }}" 
											title="{{ post.attachments.data[0].title }}">{{ post.attachments.data[0].title }}</a>
										</h2>
									{{ /if }}
								{{ /if }}
								<p>{{ post.message | autolink }}</p>
							</article>
						{{ /each }}
						</script>
					<?php
					}
					// Load blog posts
					foreach( $posts as $post ) {
						setup_postdata( $post );
					?>
						<article class="column six item">
							<?php get_template_part( 'widget', 'post-meta-heading' ); ?>
							<figure><?php the_post_thumbnail( ); ?></figure>
							<h2 class="article-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h2>
							<?php
							$excerpt = get_the_excerpt();
							if( $excerpt ) {
								echo $excerpt;
							?>
								<div class="read-more"><a href="<?php the_permalink(); ?>">View full post ...</a></div>
							<?php
							}
							else {
								the_content('<div class="read-more"><a href="' . the_permalink() . '">View full post ...</a></div>');
							}
							?>
						</article>
					<?php } ?>
				</div>
				<?php get_template_part( 'widget', 'posts-pagination' ); ?>
			</div>
		</div><!-- row-content -->
	</div><!-- row -->
</main>

<?php get_footer(); ?>