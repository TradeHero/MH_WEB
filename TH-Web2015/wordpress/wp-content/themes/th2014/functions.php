<?php 

include_once (dirname(__FILE__) .'/../../../wp-admin/includes/taxonomy.php');

//disable the auto adding of <p> tags
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// Create some posts/pages when theme is activated
if (isset($_GET['activated']) && is_admin()){
		
		//create categories
		wp_create_category( 'feedback' );
		
        $new_page_title = 'Home';
        $new_page_content = file_get_contents(dirname(__FILE__) .'/extras/homecontents.txt');
        $new_page_template = 'page-home.php'; // use '' if none
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }
		
        $new_page_title = 'Learning';
        $new_page_content = file_get_contents(dirname(__FILE__) .'/extras/learningcontents.txt');
        $new_page_template = 'page-learning.php'; // use '' if none
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }
		
        $new_page_title = 'Partners';
        $new_page_content = file_get_contents(dirname(__FILE__) .'/extras/partnerscontents.txt');
        $new_page_template = 'page-partners.php';  // use '' if none
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }
        $new_page_title = 'Community';
        $new_page_content = file_get_contents(dirname(__FILE__) .'/extras/communitycontents.txt');
        $new_page_template = 'page-community.php'; // use '' if none
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }
        $new_page_title = 'Competitions';
        $new_page_content = file_get_contents(dirname(__FILE__) .'/extras/competitionscontents.txt');
        $new_page_template = 'page-competitions.php';  // use '' if none
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }
        $new_page_title = 'Amy Warner';
        $new_page_content = 'Probably one of the best start-up ideas in Singapore.';
        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'post',
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
				update_post_meta($new_page_id, 'Company', 'Investor at <span class="highlight">Pear Inc.</span>');
				update_post_meta($new_page_id, 'Photo', '/wp-content/themes/th2014/img/people/profile-1.jpg');
				wp_set_object_terms( $new_page_id, 'feedback','category',true );
        }		
		// Use a static front page
		$about = get_page_by_title( 'Home' );
		update_option( 'page_on_front', $about->ID );
		update_option( 'show_on_front', 'page' );
}


//Add thumbnail support
add_theme_support( 'post-thumbnails' );

//Add post formats support
add_theme_support( 'post-formats', array( 'link', 'quote' ) );

// Add Your Menu Locations
function register_my_menus() {
  register_nav_menus( array(
    'header_menu' => 'Header',
    'footer_menu' => 'Footer',
    ) );
} 
add_action( 'init', 'register_my_menus' );

// filter the Gravity Forms button type
add_filter("gform_submit_button", "form_submit_button", 10, 2);
function form_submit_button($button, $form){
    return "<button class='button btn' id='gform_submit_button_{$form["id"]}'><span>{$form['button']['text']}</span></button>";
}

// Register sidebar
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
     ));



// Function to add shortcode block
function home_hero($attr, $content = null ) {
if(!empty($attr)){
	$short = '
    <div id="hero" class="static-header light clearfix">
        <div class="container">
            <div class="col-sm-6 pull-left">
                <div class="text-heading">
                    <h1 class="animated hiding" data-animation="bounceInDown" data-delay="0">'.$attr['title'].'</h1>
                    <p class="animated hiding" data-animation="fadeInDown" data-delay="500">'.$attr['subhead'].'</p>
                    <div class="wpvl_auto_thumb_box_wrapper">
                        <div class="wpvl_auto_thumb_box" style="margin:20px auto; height:65px;">
                            <a rel="wp-video-lightbox" href="https://www.youtube.com/watch?v=gqQ4841EGbI&amp;autoplay=1&amp;width=720&amp;height=480" title="">
                                <img src="/wp-content/themes/th2014/img/btn-home-learnMore.png" alt="" scale="0" width="215">
                            </a>
                        </div>
                    </div>
                    <div class="hero-cta">
                        <a href="https://itunes.apple.com/sg/app/tradehero-mobile/id572226383?mt=8" class="animated hiding" data-animation="bounceIn" data-delay="700">
                            <img src="'.$attr['image1'].'" width="128" />    
                        </a>    
                        <a href="https://play.google.com/store/apps/details?id=com.tradehero.th&hl=en" class="animated hiding" data-animation="bounceIn" data-delay="900">
                            <img src="'.$attr['image2'].'" width="128" />    
                        </a>
                    </div>
                    <div class="stats">
                        <p>'.do_shortcode($content).'</p>
                    </div>
                    <div class="social row-centered">
                        <a href="https://www.facebook.com/TradeHero"><img src="http://en.tradehero.mobi/wp-content/themes/th2014/img/icn-facebook.png" alt="Like us on Facebook" /></a>
                        <a href="https://twitter.com/tradeheromobile"><img src="http://en.tradehero.mobi/wp-content/themes/th2014/img/icn-twitter.png" alt="Follow us on Twitter" /></a>
                        <a href="https://www.youtube.com/user/TradeHeroMobile"><img src="http://en.tradehero.mobi/wp-content/themes/th2014/img/icn-youtube.png" alt="Subscribe to our YouTube channel" /></a>
                    </div>
                </div>
            </div>    
            <div class="col-sm-6 pull-right">
                <div class="hero-img">
                    <img src="'.$attr['image3'].'" alt="screenshots" class="img-responsive animated hiding" data-animation="bounceInUp" data-delay="1000" />
                </div>
            </div>
        </div>
    </div>
    ';
}else{

}
    return $short;
}
add_shortcode('home_hero', 'home_hero');

// Function to add shortcode block
function home_process1($attr, $content = null ) {
if(!empty($attr)){
	$short = '<hr class="no-margin" /><section id="process" class="section dark">
        <div class="container">
            <div class="section-content row">                
                <div class="col-sm-6 pull-right animated hiding" data-animation="fadeInRight">
                    <img src="'.$attr['image'].'" class="img-responsive" alt="'.$attr['alt'].'" />
                </div>
                <div class="col-sm-6 animated hiding" data-animation="fadeInLeft">
					<br/><br/>
                    <article>
                        <h3>'.$attr['title'].'</h3>
                        <div class="sub-title">'.$attr['subhead'].'</div>
                        <p>'.$content.'</p>
                    </article>
                </div>
                
                <hr class="clearfix" />
                <a id="showHere"></a>';

}else{

}
    return $short;
}
add_shortcode('home_process1', 'home_process1');

// Function to add shortcode block
function home_process2($attr, $content = null ) {
if(!empty($attr)){
	$short = '<div class="col-sm-6 animated hiding" data-animation="fadeInLeft">
                    <img src="'.$attr['image'].'" class="img-responsive" alt="'.$attr['alt'].'" />
                </div>
                <div class="col-sm-6 animated hiding" data-animation="fadeInRight">
					<br/><br/>
                    <article>
                        <h3>'.$attr['title'].'</h3>
                        <div class="sub-title">'.$attr['subhead'].'</div>
                        <p>'.$content.'</p>
                    </article>
                </div>
                
            </div>
        </div>
    </section>';
}else{

}
    return $short;
}
add_shortcode('home_process2', 'home_process2');

// Function to add shortcode block
function home_features($attr) {
	$short = '	<section id="features-list" class="section dark">
        <div class="container animated hiding" data-animation="fadeInDown">
            <h2>'.$attr['title'].'</h2>';
    return $short;
}
add_shortcode('home_features', 'home_features');

// Function to add shortcode block
function home_feature($attr, $content = null ) {
$icon = "";
if(substr($attr['icon'],0,4)=='icon'){
	$icon = '<i class="icon '.$attr['icon'].' icon-active"></i>';
}

if(substr($attr['icon'],0,4)=='http'){
	$icon = '<img src="'.$attr['icon'].'" />';
}

	$short = '<div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">	
					'.$icon.'
                    <span class="h7">'.$attr['title'].'</span>
                    <p class="thin">'.$content.' </p>
                </article>
            </div>';
    return $short;
}
add_shortcode('home_feature', 'home_feature');

// Function to add shortcode block
function home_features_close() {
	$short = '</div>
    </section>	';
    return $short;
}
add_shortcode('home_features_close', 'home_features_close');

	
// Function to add shortcode block
function home_awards($attr, $content = null ) {
	$short = '	<section id="awards" class="section dark">
        <div class="container">
            <div class="section-header animated hiding" data-animation="fadeInDown">
                <h2>'.$attr['title'].'</h2>
                <div class="sub-heading">'.$content.'</div>
            </div>
            <div class="section-content">                
                <ul class="list-inline logos">';
    return $short;
}
add_shortcode('home_awards', 'home_awards');
	
// Function to add shortcode block
function home_award($attr) {
	$short = '<li><a href="'.$attr['target'].'" target="_blank"><img class="animated hiding" data-animation="fadeInUp" data-delay="0" src="'.$attr['image'].'" alt="'.$attr['alt'].'" /></a></li> ';
    return $short;
}
add_shortcode('home_award', 'home_award');
	
// Function to add shortcode block
function home_awards_close() {
	$short = '</ul>
            </div>
        </div>
    </section>';
    return $short;
}
add_shortcode('home_awards_close', 'home_awards_close');
	 
// Function to add shortcode block
function home_feedback() {

$outp .= '<section id="feedback" class="section light">
        <div class="container">
            <div class="section-header animated hiding" data-animation="fadeInDown">
                <h2>WHAT <span class="highlight">PEOPLE</span> SAY</h2>
            </div>
            <div class="section-content">
			
				<!-- BEGIN SLIDER CONTENT -->
				<div class="col-sm-10 col-sm-offset-1">
					<div class="flexslider testimonials-slider center animated hiding" data-animation="fadeInTop">	
						<ul class="slides">';
$outc = '<section id="feedback-controls" class="section light">
		<div class="container">
			<div class="col-md-10 col-md-offset-1">
			<!-- BEGIN CONTROLS -->
						<div class="flex-manual">';
						
$args = array(
	'category_name'      => 'feedback',
	'posts_per_page'     => 3,
	'order'    => 'ASC'
);

query_posts( $args );

while ( have_posts() ) : the_post();

    $outp .= '<li><div class="testimonial resp-center clearfix"><blockquote>';
    $outp .= get_the_content();
    $outp .= '</blockquote></div></li>';
	
	$outc .= '<div class="col-xs-12 col-sm-4 wrap"><div class="switch flex-active"><img alt="client" src="';
	$outc .= get_post_meta( get_the_ID(), 'Photo', true );
	$outc .= '" class="sm-pic img-circle pull-left" width="69" height="70"><p><span class="highlight">';
	$outc .= get_the_title();
	$outc .= '</span><br/>';
	$outc .= get_post_meta( get_the_ID(), 'Company', true );
	$outc .= '</p></div></div>';
endwhile;

wp_reset_query();
$outp .= '</ul>
					</div>
				</div>
				<!-- END SLIDER -->
            </div>
        </div>
    </section>';
$outc .= '</div>
			<!-- END CONTROLS -->
			</div>
		</div>
	</section>';	
return $outp.$outc;
}
add_shortcode('home_feedback', 'home_feedback');


function learning_top($attr) {

if(!empty($attr)){
	$learntop = '    <div id="learning-top" class="static-header light clearfix">
        <div class="container">
            <div class="row" id="hero-inner">
                <div class="col-md-8 col-md-offset-2">
                    <div class="text-heading">
                        <h1 class="animated hiding" data-animation="bounceInDown" data-delay="0">'.$attr['title'].'</h1>
                        <hr />
                        <input id="learning-search" class="form-control input-lg" type="text" placeholder="'.$attr['question'].'">
                    </div>
                </div>
            </div>';
$tabs = '<div class="row" id="hero-inner2">
                <div class="col-md-12 col-md-offset-2"><br><br>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">';

}else{

}
    return $learntop.$tabs;
}
add_shortcode('learning_top', 'learning_top');

function learning_top_tab($attr) {


	$tabs .= '<li class=' . $attr['active'] .'><a href="#'. strtolower($attr['title']).'" role="tab" data-toggle="tab"><img src="'.$attr['icon'].'" />'.$attr['title'].'</a></li>';

    return $tabs;
    //return $learntop.$tabs.$learntopclose;
}
add_shortcode('learning_top_tab', 'learning_top_tab');

function learning_top_close($attr) {

$tabs .='</ul>
                </div>
            </div>';

$learntopclose = '        </div>
    </div>';
    return $tabs.$learntopclose;
    //return $learntop.$tabs.$learntopclose;
}
add_shortcode('learning_top_close', 'learning_top_close');
	 
// Function to add shortcode block
function learning_features($attr) {
	$short = '    <section id="features-list" class="section dark">
        <div class="container animated hiding" data-animation="fadeInDown">
            <h2>'.$attr['title'].'</h2>
            <p class="thin">'.$attr['subhead'].'</p>';
    return $short;
}
add_shortcode('learning_features', 'learning_features');

// Function to add shortcode block
function learning_feature($attr, $content = null ) {
	$short = '<div class="col-md-4 col-sm-6 col-xs-12">
                <article class="center">	
					<i class="icon '.$attr['icon'].' icon-active"></i>
                    <span class="h7">'.$attr['title'].'</span>
                    <p class="thin">'.$content.' </p>
					<a action="'.$attr['url'].'"><button type="button" class="btn btn-link">'.$attr['button'].'</button></a>
                </article>
            </div>';
    return $short;
}
add_shortcode('learning_feature', 'learning_feature');

// Function to add shortcode block
function learning_features_close() {
	$short = '</div>
    </section>	';
    return $short;
}
add_shortcode('learning_features_close', 'learning_features_close');

// Function to add shortcode block
function learning_tab_contents($attr) {
	$short = '    <section id="features-list2" class="section dark">
<!-- Tab panes -->
<div class="tab-content">';
    return $short;
}
add_shortcode('learning_tab_contents', 'learning_tab_contents');

// Function to add shortcode block
function learning_tab_content($attr, $content = null ) {
	$active = "";
	$postone = get_post($attr['pid']);
	if($attr['id']=="videos"){$active=" active";}
	$short = '<div class="tab-pane'.$active.'" id="'.$attr['id'].'">'.$content.$postone->post_content.'</div>';
    return $short;
}   
add_shortcode('learning_tab_content', 'learning_tab_content');

// Function to add shortcode block
function learning_tab_contents_close() {
	$short = '</div>
</section>';
    return $short;
}
add_shortcode('learning_tab_contents_close', 'learning_tab_contents_close');

//Partners Top
function partners_top($attr) {
if(!empty($attr)){
	$short = '    <div id="partners-top" class="static-header light clearfix">
        <div class="container">
            <div class="row" id="hero-inner">
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-heading">
                        <h1 class="animated hiding" data-animation="bounceInDown" data-delay="0">'.$attr['title'].'</h1>
                        <hr />
                        <p class="animated hiding" data-animation="fadeInDown" data-delay="500">'.$attr['subhead'].'</p>
                        <form action="'.$attr['url'].'"><button type="button" class="btn btn-default btn-lg">'.$attr['button'].'</button></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="showHere"></a>';
}else{

}
    return $short;
}
add_shortcode('partners_top', 'partners_top');

//Community Top
function community_top($attr) {
if(!empty($attr)){
	$short = '    <div id="partners-top" class="static-header light clearfix">
        <div class="container">
            <div class="row" id="hero-inner">
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-heading">
                        <h1 class="animated hiding" data-animation="bounceInDown" data-delay="0">'.$attr['title'].'</h1>
                        <hr />
                        <p class="animated hiding" data-animation="fadeInDown" data-delay="500">'.$attr['subhead'].'</p>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}else{

}
    return $short;
}
add_shortcode('community_top', 'community_top');

//////////////////////////////
// Competition page shortcodes
//////////////////////////////

function competition_top($attr, $content = null ) {
if(!empty($attr)){
    $short = '    <div id="'.$attr['provider'].'" class="static-header light clearfix">
        <div class="container">
            <div class="row" id="hero-inner">
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-heading">
                        <p class="thin">'.$content.' </p>
                        <div class="competition-icon">
                            <img class="img-responsive" src="'.$attr['image1'].'" />
                        </div>
                        <div class="competition-title">
                            <h1 class="animated hiding" data-animation="bounceInDown" data-delay="0">'.$attr['title'].'</h1>
                        </div>
                        <hr />
                        <p class="animated hiding" data-animation="fadeInDown" data-delay="500">'.$attr['subhead'].'</p>
                        <a class="competition-button-1" href="'.$attr['url'].'"><button type="button" class="btn btn-default">'.$attr['button'].'</button></a>
                        <a class="competition-button-2" href="'.$attr['url2'].'"><button type="button" class="btn btn-default">'.$attr['button2'].'</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="showHere"></a>';
}else{

}
    return $short;
}
add_shortcode('competition_top', 'competition_top');

function competition_intro($attr) {
if(!empty($attr)){
    $short = '    <section id="competition-intro" class="section dark">
        <div class="container animated hiding" data-animation="fadeInDown">
            <h2>'.$attr['title'].'</h2>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <article class="center">    
                    <p class="thin competition-thai">'.$attr['subhead'].'</p>
                </article>
            </div>
        </div>
    </section>';
}else{

}
    return $short;
}
add_shortcode('competition_intro', 'competition_intro');

// Add the slug to the page class
function add_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_body_class' );

/* Modify the read more link on the_excerpt() */
 
function et_excerpt_length($length) {
    return 140;
}
add_filter('excerpt_length', 'et_excerpt_length');
 
/* Add a link  to the end of our excerpt contained in a div for styling purposes and to break to a new line on the page.*/
 
function et_excerpt_more($more) {
    global $post;
    return '<div class="view-full-post"><a href="'. get_permalink($post->ID) . '" class="view-full-post-btn">View Full Post</a></div>';
}
add_filter('excerpt_more', 'et_excerpt_more');


?>