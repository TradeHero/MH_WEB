<?php
/**
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */

?>
<?php get_header(); ?>

<main role="main">
	<?php
	$careers_cat_ID = get_cat_id( 'careers' );
	if( is_category() ) {
		$children_categories = get_categories( array(
			'child_of' => $careers_cat_ID
		) );
	?>
		<div id="main" class="row">
			<div class="row-content buffer">
				<div class="row">
					<h1>Hiring in TradeHero</h1>
					<?php
					$decription = category_description( $cat );
					if( empty( $description ) ) {
						$decription = category_description( $careers_cat_ID  );
					}
					?>
					<p><?php echo $decription; ?></p>
				</div>
				<aside class="column small-three right">
					<div class="widget">
						<h4 class="widget-title"><span class="icon icon-pin"></span>Location</h4>
						<ul class="plain">
							<?php
							foreach( $children_categories as $category ) {
							?>
								<li><a href="<?php echo get_category_link( $category->cat_ID ); ?>" title="<?php echo $category->name . ' | ' . $category->description; ?>"><?php echo $category->name; ?></a></li>
							<?php
							}
							?>
						</ul>
					</div>
					<a class="button button-block blue" href="mailto:hiring@tradehero.mobi">Apply Now</a>
				</aside>
				<div class="column small-nine small-last">
					<div class=" blog masonry-style">
						<?php
						while( have_posts() ) {
							the_post();
						?>
							<article>
								<?php get_template_part( 'widget', 'post-meta-heading' ); ?>
								<h2><?php the_title(); ?></h2>
								<?php the_content(); ?>
							</article>
						<?php
						}
						?>
					</div>
				</div>
			</div><!-- row-content -->
		</div><!-- row -->
	<?php
	}
	?>
</main>

<?php get_footer(); ?>