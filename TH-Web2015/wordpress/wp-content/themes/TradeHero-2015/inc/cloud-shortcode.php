<?php
/**
 * [th_cloud height="300"]
 * [th_cloud_item]<a href="#">tag1</a>[/th_cloud_item]
 * [th_cloud_item]<a href="#">tag2</a>[/th_cloud_item]
 * [/th_cloud]
 * 
 * @since TradeHero 2.0
 */
function tradehero_cloud_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
    	'height'		=> 500
    ), $atts );

    $html = '<div class="tag-cloud">
				<canvas width="500" height="' . $a['height'] . '" class="tag-cloud-canvas"></canvas>
				<div class="tag-cloud-tags">
					<ul>' . do_shortcode( $content ) . '</ul>
				</div>
			</div>';
	return $html;
}
add_shortcode( 'th_cloud', 'tradehero_cloud_shortcode' );

function tradehero_cloud_item_shortcode( $atts, $content = null ) {
	$html = '<li>' . $content . '</li>';
	return $html;
}
add_shortcode( 'th_cloud_item', 'tradehero_cloud_item_shortcode' );
?>