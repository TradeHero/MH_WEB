<?php 
/**
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */

$features = get_field( 'features' );
if( $features ) {
?>
<div class="row features">
	<?php
	foreach( $features as $index => $feature ) { 
		$feature_class = 'column medium-four' . ( $index%3 == 2 ? ' medium-last' : '' );
		$icon_entry_type = $feature['icon_entry_type'];
		$icon_url = null;
		$icon_class = null;
		if( $icon_entry_type == 'class' ) {
			$icon_class = $feature['icon'];
		} else {
			$icon_url = $feature['icon'];
		}
		echo '<div class="' . $feature_class . '">';
		echo tradehero_feature_shortcode( array(
			'icon_class'	=> $icon_class,
			'icon_color'	=> $feature['icon_color'],
			'icon_url'		=> $icon_url,
			'title'			=> $feature['title']
		), $feature['content'] );
		echo '</div>';
	} 
	?>
</div>
<?php } ?>