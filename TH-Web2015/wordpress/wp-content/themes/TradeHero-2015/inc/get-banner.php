<?php
/**
 * Get banner
 * @since TradeHero 2.0
 */

function tradehero_get_banner ( $post_ID = null ) {
	$banners = get_field( 'banner_items', $post_ID );
	if( !empty( $banners ) ) {
		$banner_html = '';
		foreach( $banners as $banner ) {
			$image = $banner['image'];
			$banner_html .= tradehero_banner_item_shortcode( array(
				'background_color'	=> '#' . $banner['background_color'],
				'image'				=> $image ? $image['url'] : null,
				'caption'			=> $banner['caption'],
				'link'			=> $banner['link']
			), $banner['content'] );
		}
		$banner_html = tradehero_banner_shortcode( array(
			'height'		=> get_field( 'banner_height', $post_ID ),
			'autoplay'		=> get_field( 'banner_autoplay_speed', $post_ID ),
			'navigation'	=> get_field( 'banner_show_navigation', $post_ID ),
			'pagination'	=> get_field( 'banner_show_pagination', $post_ID ),
			'transition'	=> get_field( 'banner_transition', $post_ID ),
			'stretch'		=> get_field( 'banner_is_stretch', $post_ID ),
			'autoheight'	=> get_field( 'banner_autoheight', $post_ID )
		), $banner_html );
		echo $banner_html;
	}
}
?>