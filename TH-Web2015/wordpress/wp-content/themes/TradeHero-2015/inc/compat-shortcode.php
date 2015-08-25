<?php
/**
 * @since TradeHero 1.0
 */
/* Competitions */
function competition_top($attr, $content = null ) {
    $attr = shortcode_atts( array(
        'background_image' => null,
        'provider'  => null,
        'image1'    => null,
        'title'     => null,
        'subhead'   => null,
        'strech'    => 'false',
        'url'       => null,
        'url2'      => null,
        'button'    => null,
        'button2'   => null
    ), $attr );
    $content_inner = '<div class="row-content buffer">
                        <div class="text-center">
                            <p>'.$content.' </p>
                            <div class="competition-icon">
                                <img class="img-responsive" src="'.$attr['image1'].'" />
                            </div>
                            <div class="competition-title">
                                <h1 class="animated hiding" data-animation="bounceInDown" data-delay="0">'.$attr['title'].'</h1>
                            </div>
                            <hr />
                            <p class="animated hiding" data-animation="fadeInDown" data-delay="500">'.$attr['subhead'].'</p>';
    if( !empty( $attr['button'] ) ) {
        $content_inner .= '<a class="button red competition-button-1" href="'.$attr['url'].'">'.$attr['button'].'</a>';
    }
    if( !empty( $attr['button2'] ) ) {
        $content_inner .= '<a class="button red competition-button-2" href="'.$attr['url2'].'">'.$attr['button2'].'</a>';
    }
    $content_inner .= '</div></div>';
    $banner_item = tradehero_banner_item_shortcode( array(
        'image' => $attr['background_image']
    ), $content_inner );
    return tradehero_banner_shortcode( array(
        'stretch'       => true,
        'autoheight'    => true
    ), $banner_item );
}
add_shortcode('competition_top', 'competition_top');

function competition_intro($attr) {
    $attr = shortcode_atts( array(
        'title'     => null,
        'subhead'   => null
    ), $attr );
    $short = '<div class="row-content buffer-left buffer-right buffer-top text-center animated hiding" data-animation="fadeInDown">
                <h2>'.$attr['title'].'</h2>
                <p>'.$attr['subhead'].'</p>
            </div>';
    return $short;
}
add_shortcode('competition_intro', 'competition_intro');

/* Learning features */
// Function to add shortcode block
function learning_features($attr) {
     $attr = shortcode_atts( array(
        'title'     => null,
        'subhead'   => null
    ), $attr );
    $short = '<div class="row-content buffer-left buffer-right buffer-bottom text-center">
            <h2>'.$attr['title'].'</h2>
            <p>'.$attr['subhead'].'</p>
            <div class="features">';
    return $short;
}
add_shortcode('learning_features', 'learning_features');

// Function to add shortcode block
function learning_feature($attr, $content = null ) {
     $attr = shortcode_atts( array(
        'title'     => null,
        'icon'      => null,
        'url'       => null,
        'button'    => null
    ), $attr );
    $content_inner = '<p>' . $content . '</p>';
    if( !empty( $attr['button'] ) )  {
        $content_inner .= '<a class="button red" target="_blank" href="'.$attr['url'].'">'.$attr['button'].'</a>';
    }
    return tradehero_feature_shortcode( array(
        'title'         => $attr['title'],
        'icon_class'    => $attr['icon']
    ), $content_inner );
}
add_shortcode('learning_feature', 'learning_feature');

// Function to add shortcode block
function learning_features_close() {
    $short = '</div></div>';
    return $short;
}
add_shortcode('learning_features_close', 'learning_features_close');

?>