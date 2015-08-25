<?php
/**
 * [th_feature icon_class="icon-doc" title="Feature Title"]<p>Put feature content here.. </p>[/th_feature]
 * @since TradeHero 2.0
 */
function tradehero_feature_shortcode( $atts, $content = null ) {
    $a = shortcode_atts( array(
    	'icon_class'        => 'icon-doc',
        'icon_color'        => 'red',
        'icon_url'          => null,
        'title'             => 'Feature Title',
        'anchor'            => null
    ), $atts );

    $icon_tag = empty( $a['anchor'] ) ? 'span' : 'a';
    $html = '<div class="feature">';
    if( !empty( $a['icon_class'] ) ) {
        $html .= '<' . $icon_tag . ' class="small-icon ' . $a['icon_color'] . ' feature-icon" data-owl-anchor="' . $a['anchor'] . '">
                    <i class="icon ' . $a['icon_class'] . '"></i>
                </' . $icon_tag . '>';
    } 
    else if ( !empty( $a['icon_url'] ) ) {
        $html .= '<' . $icon_tag . ' class="small-icon feature-icon" data-owl-anchor="' . $a['anchor'] . '">
                    <img src="'. $a['icon_url'] . '" alt="' . $a['title'] . '">
                 </' . $icon_tag . '>';
    }
    $html .= '<div class="small-icon-text clear-after feature-text">
                <h4 class="feature-title">' . $a['title'] . '</h4>
                <div class="feature-content">' . $content . '</div>
            </div>';
    $html .= '</div>';
    return $html;
}
add_shortcode( 'th_feature', 'tradehero_feature_shortcode' );
?>