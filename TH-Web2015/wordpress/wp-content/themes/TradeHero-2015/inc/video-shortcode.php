<?php
/**
 * [th_video mp4="" ogv="" webm=""]
 * @since TradeHero 2.0
 */
function tradehero_video_shortcode( $atts ) {
    $a = shortcode_atts( array(
    	'mp4'				=> null,
    	'ogv'				=> null,
    	'webm'				=> null,
    	'autoplay'			=> false,
    	'width'				=> 640,
    	'height'			=> 390,
    	'loop'				=> false,
    	'muted'				=> false,
    	'class'				=> 'th-video'
    ), $atts );
    $html = '<video class="' . $a['class'] . '"';
    $html .= ' width="' . $a['width'] . '"';
    $html .= ' height="' . $a['height'] . '"';
    if( $a['loop'] )  $html .= ' loop';
    if( $a['muted'] )  $html .= ' muted';
    if( $a['autoplay'] ) $html .= ' autoplay';
    $html .= '>';
    $html .= '<source src="' . $a['mp4'] . '" type="video/mp4" />';
    $html .= '<source src="' . $a['webm'] . '" type="video/webm" />';
    $html .= '<source src="' . $a['ogv'] . '" type="video/ogg" />';
    $html .= '<object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="' . $a['width'] . '" height="' . $a['height'] . '">';
    $html .= '<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />';
    $html .= '<param name="allowFullScreen" value="false" />';
    $html .= '<param name="wmode" value="transparent" />';
    $html .= '<param name="flashVars" value="config={\'playlist\':[{\'url\':\'' . urlencode( $a['mp4'] ) . '\',\'autoPlay\':' . (string)$a['autoplay'] .'}]}" />';
    $html .= '</object></video>';
    return $html;
}
add_shortcode( 'th_video', 'tradehero_video_shortcode' );
?>