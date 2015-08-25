<?php 
/**
 * Template Name: Home
 * 
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */
?>
<?php 
require get_template_directory() . '/inc/app-download-redirection.php';
get_header(); 
?>

<main role="main" id="fullpage">
	<?php
	while( have_posts() ) : the_post();
	$intro_video_full_url = get_field('intro_video_full_url');
	?>
	<section id="download" class="row section download">
		<div class="row-content buffer-left buffer-right">
			<div class="column large-seven">
				<h1 class="brand-name"><?php bloginfo('name'); ?>&nbsp;
				<?php if( !empty( $intro_video_full_url ) ) { ?>
					<a class="get-more popup-youtube mobile-hide" 
					href="<?php echo $intro_video_full_url; ?>">
						<span class="icon icon-youtube-play"></span> WATCH INTRO
					</a>
				<?php } ?>
				</h1>
				<h2 class="section-heading"><?php bloginfo('description'); ?></h2>
				<h4 class="section-summary buffer-top buffer-bottom"><?php the_field('app_description'); ?></h4>

				<div class="row buffer-top mobile-hide">
				<?php 
				$qrcode_url = null;
				$qrcode_alt = 'Download TradeHero App';
				$qrcode_width =  '100%';
				$download_qrcode_type = get_field('download_qrcode_type');
				if( $download_qrcode_type == 'image' ) {
					$download_qrcode = get_field( 'download_qrcode_image' );
					$qrcode_url = $download_qrcode['url'];
					$qrcode_alt = $download_qrcode['alt'];
					$qrcode_width =  $download_qrcode['width'];
				}
				if( $download_qrcode_type == 'url' ) {
					$qrcode_url = get_field( 'download_qrcode_url' );
				}
				if( !empty( $qrcode_url ) ) {
				?>
					<div class="qrcode column three">
						<img src="<?php echo $qrcode_url; ?>" 
						alt="<?php echo $qrcode_alt; ?>" 
						width="<?php echo $qrcode_width; ?>">
					</div>
				<?php 
				}
				?>
					<form method="post" action="/wp-admin/admin-ajax.php?action=message" class="column tiny-nine tiny-last medium-seven medium-last ajax-form">
						<div class="row">
							<label for="email"><?php the_field('email_form_label'); ?></label>
							<input type="email" class="plain reset email buffer" name="to" placeholder="<?php the_field('email_form_placeholder'); ?>">
							<input type="submit" class="plain button red" value="<?php the_field('email_form_button_text'); ?>">
							<input type="hidden" name="message" value="<?php echo htmlentities( get_field('email_template') ); ?>">
							<input type="hidden" name="subject" value="<?php the_field('email_subject'); ?>">
						</div>
					</form>
				</div>

				<?php if( !empty( $intro_video_full_url ) ) { ?>
				<a class="get-more desktop-hide" target="_blank" href="<?php echo $intro_video_full_url; ?>"><span class="icon icon-youtube-play"></span> WATCH INTRO</a>
				<?php } ?>
			</div>
			<div class="column large-five large-last right">
				<div class="phone-container">
					<div class="phone-screen">
						<?php $intro_video_post_image = get_field('intro_video_post_image'); ?>
						<img class="video-post-image" src="<?php echo $intro_video_post_image['url']; ?>" alt="<?php echo $intro_video_post_image['alt']; ?>" width="<?php echo $intro_video_post_image['width']; ?>">
						<video class="mobile-hide" autoplay="autoplay" loop="loop" muted="muted" width="242" height="431">
							<source src="<?php the_field('intro_video_mp4'); ?>" type="video/mp4" />
							<source src="<?php the_field('intro_video_webm'); ?>" type="video/webm" />
							<source src="<?php the_field('intro_video_ogv'); ?>" type="video/ogg" />
							<object type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" width="242" height="431">
								<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
								<param name="allowFullScreen" value="false" />
								<param name="wmode" value="transparent" />
								<param name="flashVars" value="config={'playlist':[{'url':'<?php urlencode( the_field('intro_video_mp4') ); ?>','autoPlay':true}]}" />
								<!-- <span title="No video playback capabilities, please download the video below">Big Buck Bunny</span> -->
							</object>
						</video>
					</div>
				</div>
			</div>

			<div class="row buffer-top buffer-bottom desktop-hide">
				<?php get_template_part( 'widget', 'app-download' ); ?>
			</div>
		</div>
		<div class="icon-arrow-scroll-down mobile-hide"></div>
	</section>
	<section id="why" class="row section why owl-deep-link">
		<div class="row-content buffer-left buffer-right clear-after">
			<?php
			$why_play = get_field( 'why_play_items' );
			?>
			<div class="column large-five side-mockup mobile-hide">
				<div class="phone-container black">
					<div class="phone-screen slider">
						<figure>
							<?php
							foreach( $why_play as $index => $item ) {
								$image = $item['screenshot'];
							?>
								<div class="phone-screen-section <?php if( $index == 0 ) echo 'active'; ?>">
									<?php if( $image ) { ?>
									<img src="<?php echo $image['url']; ?>" 
									alt="<?php echo $image['alt']; ?>" 
									width="<?php echo $image['width']; ?>">
									<?php } ?>
								</div>
							<?php
							}
							?>
						</figure>
					</div>
				</div>
			</div>
			<div class="column large-seven large-last">
				<h2 class="section-heading"><?php the_field('why_play_title'); ?></h2>
				<div class="row buffer-top why-tradehero">
					<?php 
					foreach( $why_play as $index => $item ) {
						$wrapper_class = 'column tiny-six medium-four';
						if( $index%3 == 2 ) $wrapper_class .= ' medium-last'; 
						if( $index%2 == 1 ) $wrapper_class .= ' tiny-last';
						echo '<div class="' . $wrapper_class . '">';
						echo tradehero_feature_shortcode( array(
					    	'icon_class'        => $item['icon_class'],
					        'icon_color'        => 'red',
					        'title'             => $item['title'],
					        'anchor'			=> $index
						), '<p class="text-s">' . $item['content'] . '</p>' );
						echo '</div>';
					}
					?>
				</div>
			</div>
		</div>
		<div class="icon-arrow-scroll-down mobile-hide"></div>
	</section>
	<section id="academy" class="row section academy">
		<div class="row-content">
			<h2 class="section-heading"><a class="button g-ytsubscribe red" href="https://www.youtube.com/user/TradeHeroMobile" target="_blank" data-channel="TradeHero"><span class="fa fa-youtube fa-lg"> </span> Subscribe</a><?php the_field('youtube_channel_caption'); ?></h2>
			<div class="section-summary"><?php the_field('youtube_channel_description'); ?></div>
			<div class="desktop-slider video-slider" data-autoplay="3000">
				<script class="ajax-get-helper" type="text/html"
				data-request="https://www.googleapis.com/youtube/v3/search?part=snippet%2Cid&channelId=<?php the_field('youtube_channel_ID'); ?>&maxResults=<?php the_field('youtube_channel_max_results'); ?>&order=<?php the_field('youtube_channel_order') ?>&type=video&key=<?php the_field('google_api_key') ?>">
					<figure>
						{{each items as video}}
						<div class="youtube-thumbnail" style="background-image:url('{{video.snippet.thumbnails.high.url}}');">
							<div class="youtube-video" data-video-id="{{video.id.videoId}}"><span class="youtube-play-button"></span></div>
							<div class="youtube-video-caption">{{video.snippet.title}}</div>
						</div>
						{{/each}}
					</figure>
				</script>
			</div>
		</div>
		<div class="icon-arrow-scroll-down mobile-hide"></div>
	</section>
	<section id="heroes" class="row section heroes has-footer">
		<div class="row-content buffer-left buffer-right even">
			<div class="column large-nine medium-eight">
				<div class="row">
					<h3 class="section-title">Stock Heroes of Last 1 Month  <a class="read-more keep-right" href="heroes.html">Get more&gt;&gt;</a></h3>
					<div class="row hero hero-big">
						<div class="column large-three small-two tiny-three">
							<div class="keep-left avatar">
								<div class="icon icon-crown-2"></div>
								<img src="img/tmp/avatars/placeholder.jpg" alt="" width="100" height="100">
							</div>
						</div>
						<div class="column large-nine large-last small-ten small-last tiny-nine tiny-last profile">
							<div class="column small-six">
								<span class="name">lawan170</span>&nbsp;&nbsp;
								<span class="percent raising">217.3</span>
							</div>
							<div class="column small-two info">
								<span class="icon icon-diamond"></span> LV.6
							</div>
							<div class="column small-four small-last info">
								<span class="icon icon-users"></span> Followers: 1k
							</div>
						</div>
						<div class="column large-nine large-last performances buffer-top">
							<div class="column large-three small-four">
								<dl class="column small-twelve tiny-four">
									<dt class="column reset small-ten">Positions</dt>
									<dd class="column small-two small-last">9</dd>
								</dl>
								<dl class="column small-twelve tiny-four">
									<dt class="column reset small-ten">Monthly Trades</dt>
									<dd class="column small-two small-last">8</dd>
								</dl>
								<dl class="column small-twelve tiny-four tiny-last">
									<dt class="column reset small-ten">Avg. Days Held</dt>
									<dd class="column small-two small-last">29</dd>
								</dl>
							</div>
							<div class="column large-nine large-last small-eight small-last charts">
								<div class="leaderboard-chart" data-percent="11">
									<div class="chart-content">
										<div class="chart-result">Poor</div>
										<div class="chart-title">Trade Consistency</div>
									</div>
								</div>
								<div class="leaderboard-chart" data-percent="8">
									<div class="chart-content">
										<div class="percent"></div>
										<div class="chart-title">Win Ratio</div>
									</div>
								</div>
								<div class="leaderboard-chart" data-percent="45">
									<div class="chart-content">
										<div class="chart-result">Great</div>
										<div class="chart-title">Relative Performance</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="column large-three small-six hero">
							<div class="keep-left avatar">
								<a href="#"><img src="img/tmp/avatars/2.jpg" alt="" width="60" height="60"></a>
							</div>
							<div class="">
								<div class="name"><a href="#">没钱，又难过</a></div>
								<div class="percent raising">101.50</div>
							</div>
						</div>
						<div class="column large-three small-six small-last hero">
							<div class="keep-left avatar">
								<a href="#"><img src="img/tmp/avatars/3.jpg" alt="" width="60" height="60"></a>
							</div>
							<div class="">
								<div class="name"><a href="#">Taufik Eouxtachious</a></div>
								<div class="percent raising">93.37</div>
							</div>
						</div>
						<div class="column large-three small-six hero">
							<div class="keep-left avatar">
								<a href="#"><img src="img/tmp/avatars/4.jpg" alt="" width="60" height="60"></a>
							</div>
							<div class="">
								<div class="name"><a href="#">🚀昂斯哒波博～</a></div>
								<div class="percent raising">84.05</div>
							</div>
						</div>
						<div class="column large-three large-last small-six small-last hero">
							<div class="keep-left avatar">
								<a href="#"><img src="img/tmp/avatars/5.jpg" alt="" width="60" height="60"></a>
							</div>
							<div class="">
								<div class="name"><a href="#">舒心暖男周云龙</a></div>
								<div class="percent raising">74.27</div>
							</div>
						</div>
						<div class="column large-three small-six hero">
							<div class="keep-left avatar">
								<a href="#"><img src="img/tmp/avatars/6.jpg" alt="" width="60" height="60"></a>
							</div>
							<div class="">
								<div class="name"><a href="#">Ash Di Murro</a></div>
								<div class="percent raising">73.85</div>
							</div>
						</div>
						<div class="column large-three small-six small-last hero">
							<div class="keep-left avatar">
								<a href="#"><img src="img/tmp/avatars/7.jpg" alt="" width="60" height="60"></a>
							</div>
							<div class="">
								<div class="name"><a href="#">Jesse Higbee</a></div>
								<div class="percent raising">66.43</div>
							</div>
						</div>
						<div class="column large-three small-six hero">
							<div class="keep-left avatar">
								<a href="#"><img src="img/tmp/avatars/8.jpg" alt="" width="60" height="60"></a>
							</div>
							<div class="">
								<div class="name"><a href="#">Qi Chua</a></div>
								<div class="percent raising">61.16</div>
							</div>
						</div>
						<div class="column large-three large-last small-six small-last hero">
							<div class="keep-left avatar">
								<a href="#"><img src="img/tmp/avatars/placeholder.jpg" alt="" width="100" height="100"></a>
							</div>
							<div class="">
								<div class="name"><a href="#">游客8632610201</a></div>
								<div class="percent raising">53.89</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="row buffer-top">
					<div class="column five">
						<div class="plain calendar-vertical">
							<a class="calendar-heading" href="#event-calendar-1">
								<span class="column three reset calendar-time">1 Jul<br/>31 Jul</span>
								<span class="column nine last calendar-subject">OANDA FX Challenge</span>
							</a>
							<div id="event-calendar-1" class="buffer-left buffer-right calendar-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua... <a href="#">Read more...</a></p>
							</div>
							<a class="calendar-heading" href="#event-calendar-2">
								<span class="column three reset calendar-time">1 Aug<br/>31 Aug</span>
								<span class="column nine last calendar-subject">Warrents Competition</span>
							</a>
							<div id="event-calendar-2" class="buffer-left buffer-right calendar-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
							</div>
							<a class="calendar-heading" href="#event-calendar-3">
								<span class="column three reset calendar-time">1 Sep<br/>30 Sep</span>
								<span class="column nine last calendar-subject">Autumn Stock Challenge</span>
							</a>
							<div id="event-calendar-3" class="buffer-left buffer-right calendar-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
							</div>
							<a class="calendar-heading" href="#event-calendar-4">
								<span class="column three reset calendar-time">1 Sep<br/>30 Sep</span>
								<span class="column nine last calendar-subject">OANDA FX Challenge</span>
							</a>
							<div id="event-calendar-4" class="buffer-left buffer-right calendar-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
							</div>
						</div>
					</div>
					<div class="column seven last post-area article-widget">
						<article>
							<h3>OANDA FX challenge winners of June</h3>
							<time>5 July, 2015</time>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
							<a href="#" class="button transparent blue keep-right">Read More ...</a>
						</article>
					</div>
				</div> -->
			</div>
			<div class="column large-three large-last medium-four medium-last">
				<div class="tabs">
					<ul class="inline clear-after tabs-title">
						<li class="column three reset"><a href="#leaderboard-india">India</a></li>
						<li class="column three reset"><a href="#leaderboard-na">NA</a></li>
						<li class="column three reset"><a href="#leaderboard-sea">SEA</a></li>
						<li class="column three reset last"><a href="#leaderboard-ea">EA</a></li>
					</ul>
					<h3 class="section-title">Heroes by Region<!--  <a class="read-more keep-right" href="heroes.html">Get more&gt;&gt;</a> --></h3>
					<div id="leaderboard-india" class="tab-content">
						<ol class="leaderboard">
							<li>
								<div class="row">
									<div class="column seven name">Piriya Saengyotha</div>
									<div class="column five last percent raising">100.9</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Yong</div>
									<div class="column five last percent raising">83.88</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Paul Donoghue</div>
									<div class="column five last percent raising">74.08</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Napat Srichan</div>
									<div class="column five last percent raising">74.08</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Siddhartha Vijaykumar</div>
									<div class="column five last percent raising">58.17</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">T kay R</div>
									<div class="column five last percent raising">55.43</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">plaster</div>
									<div class="column five last percent raising">50.84</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Leo Rungsiriwattan</div>
									<div class="column five last percent raising">44.56</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">ilLooKiiZli</div>
									<div class="column five last percent raising">41.20</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Lim Chow Long</div>
									<div class="column five last percent raising">41.12</div>
								</div>
							</li>
						</ol>
					</div>
					<div id="leaderboard-na" class="tab-content">
						<ol class="leaderboard">
							<li>
								<div class="row">
									<div class="column seven name">举步相思(谢绝闲聊)</div>
									<div class="column five last percent raising">147.40</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Austin Mcdonald</div>
									<div class="column five last percent raising">123.80</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">天命所归</div>
									<div class="column five last percent raising">121.60</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
									<div class="column five last percent raising">118.20</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">sakthidas</div>
									<div class="column five last percent raising">114.90</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Kanyapak Insee</div>
									<div class="column five last percent raising">109.40</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">...、刺青</div>
									<div class="column five last percent raising">101.10</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Nik Zitelli</div>
									<div class="column five last percent raising">92.11</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Rid Supachai</div>
									<div class="column five last percent raising">79.37</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">David Steenson</div>
									<div class="column five last percent raising">78.68</div>
								</div>
							</li>
						</ol>
					</div>
					<div id="leaderboard-sea" class="tab-content">
						<ol class="leaderboard">
							<li>
								<div class="row">
									<div class="column seven name">Joemarie Inson</div>
									<div class="column five last percent raising">68.31</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Break Out</div>
									<div class="column five last percent raising">67.40</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Siriwat Sirisathaworn</div>
									<div class="column five last percent raising">65.71</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Boh Tablazon</div>
									<div class="column five last percent raising">62.09</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Peet Wannasarnmetha</div>
									<div class="column five last percent raising">55.97</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Shane Young</div>
									<div class="column five last percent raising">47.98</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Trevor Stack</div>
									<div class="column five last percent raising">44.11</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Ruttapon Nae</div>
									<div class="column five last percent raising">43.26</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">i3377</div>
									<div class="column five last percent raising">40.97</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">N'ae Ne</div>
									<div class="column five last percent raising">39.15</div>
								</div>
							</li>
						</ol>
					</div>
					<div id="leaderboard-ea" class="tab-content">
						<ol class="leaderboard">
							<li>
								<div class="row">
									<div class="column seven name">WhiteEve</div>
									<div class="column five last percent raising">697.80</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">海军</div>
									<div class="column five last percent raising">256.00</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Po Haay</div>
									<div class="column five last percent raising">252.90</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Billy Li</div>
									<div class="column five last percent raising">195.70</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Anthony Amicucci</div>
									<div class="column five last percent raising">193.30</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">对冲</div>
									<div class="column five last percent raising">190.50</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">魂斗罗</div>
									<div class="column five last percent raising">182.50</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">Da零.</div>
									<div class="column five last percent raising">182.10</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name"></div>
									<div class="column five last percent raising">178.80</div>
								</div>
							</li>
							<li>
								<div class="row">
									<div class="column seven name">夏雨</div>
									<div class="column five last percent raising">175.40</div>
								</div>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<?php get_template_part( 'widget', 'footer' ); ?>
	</section>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>