<?php
/**
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */
?>
<footer class="center">
	<?php
	$social_medias = get_field('social_medias', 'option');
	if( !empty( $social_medias ) ) {
		echo '<ul class="inline meta-social">';
		foreach( $social_medias as $social_media ) {
			$name = $social_media['social_media_name'];
			$url = $social_media['social_media_url'];
			echo '<li>';
			echo '<a target="_blank" href="' . $url . '" class="' . $name . '-share border-box">';
			echo '<i class="fa fa-' . $name . ' fa-lg"></i>';
			echo '</a>';
			echo '</li>';
		}
		echo '</ul>';
	}

	wp_nav_menu( array(
		'theme_location'	=> 'footer_menu',
		'container'			=> false,
		'menu_class'		=> 'breadcrumb footer-links',
		'depth'				=> 1
	) );
	?>

	<div class="copyright">
		<?php the_field('footer_info', 'option'); ?>
	</div>
</footer>