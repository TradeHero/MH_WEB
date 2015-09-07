<?php
/**
 * Template Name: Contact
 * 
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */
require get_template_directory() . '/inc/responsive-helper.php';
?>
<?php get_header(); ?>

<main role="main">
	<?php tradehero_get_banner(); ?>

	<div id="main">
		<div class="row-content buffer">
		<?php
		while( have_posts() ) : the_post();
		the_content();
		$locations = get_field('locations');
		if( $locations ) {
			$location_length = count($locations);
			$col = tradehero_cal_col( $location_length );
		?>
			<div class="column small-six tabs">
				<ul class="plain reset tabs-title">
				<?php
				foreach( $locations as $index => $location ) {
					$location_title = $location['title'];
					$id_attr = 'location-' . trim($location_title);
				?>
					<li class="column reset <?php if( $index == $location_length ) { echo $col . ' last'; } else { echo $col; } ?>">
						<a href="#<?php echo $id_attr; ?>"><span class="icon icon-pin"></span>&nbsp;<?php echo $location_title; ?></a>
					</li>
				<?php } ?>
				</ul>
				<?php
				foreach( $locations as $index => $location ) {
					$location_title = $location['title'];
					$id_attr = 'location-' . $location_title;
				?>
					<article id="<?php echo $id_attr; ?>" class="tab-content location">
						<?php
						$map = $location['location'];
						if( $map ) {
						?>
						<div class="map" 
						data-maplat="<?php echo $map['lat']; ?>" 
						data-maplon="<?php echo $map['lng']; ?>" 
						data-mapzoom="15" 
						data-color="" 
						data-height="22" 
						data-img="<?php echo get_template_directory_uri(); ?>/img/marker.png" 
						data-info="TradeHero <?php echo $location_title; ?>"></div>
						<?php
						}
						echo $location['details'];
						?>
					</article>
				<?php } ?>
			</div>
		<?php
		}
		?>
			<div class="column small-six small-last">
				<h3><?php the_field( 'support_form_title' ); ?></h3>
				<form id="contact-form" class="contact-section ajax-form" method="post" action="/wp-admin/admin-ajax.php?action=feedback">
					<span class="pre-input"><i class="icon icon-user"></i></span>
					<input class="name buffer" type="text" name="username" placeholder="Full name" required minlength="3">
					<span class="pre-input"><i class="icon icon-email"></i></span>
					<input class="email buffer" type="email" name="email" placeholder="Email address" required>
					<?php
					$support_types = get_field( 'support_types' );
					if( !empty( $support_types ) ) {
						$types = explode( '<br />', $support_types );
					?>
					<span class="pre-input"><i class="icon icon-images"></i></span>
					<select name="type" class="buffer">
						<?php
						foreach ($types as $type) {
							$type = trim( $type );
						?>
						<option value="<?php echo $type; ?>"><?php echo $type; ?></option>
						<?php
						}
						?>
					</select>
					<?php
					}
					?>
					<textarea class="buffer" name="message" placeholder="Don't forget that kindness is all!" required minlength="20"></textarea>
					<input id="send" class="plain button red" type="submit" value="Send a Message">
					<input type="hidden" name="to" value="<?php the_field( 'support_email' ); ?>">
				</form>	
				<div id="success"></div>
			</div>
		<?php endwhile; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>