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
			<script type="text/html" class="ajax-get-helper"
			data-request="/wp-admin/admin-ajax.php?action=leaderboard">
				<div class="column large-nine medium-eight">
					<div class="row">
						<h3 class="section-title">Stock Heroes of Last 30 Days</h3>
						{{ each data as d }}
							{{ if d.leaderboardName == 'Last 30 Days' }}
								{{ if d.users && d.users[0] }}
									<div class="row hero hero-big">
										<div class="column large-three small-two tiny-three">
											<div class="keep-left avatar">
												<div class="icon icon-crown-2"></div>
												{{if d.users[0].avatar}}<img src="{{ d.users[0].avatar }}" alt="" width="60" height="60">{{/if}}
												{{if !d.users[0].avatar}}<img src="<?php echo get_template_directory_uri(); ?>/img/avatars/{{ 7 | randomNumber }}.png" alt="" width="60" height="60">{{/if}}
											</div>
										</div>
										<div class="column large-nine large-last small-ten small-last tiny-nine tiny-last profile">
											<div class="column small-four">
												<span class="name">{{ d.users[0].displayName }}</span>&nbsp;&nbsp;
											</div>
											<div class="column small-four info">
												<span class="icon icon-globe"></span> Country: {{ d.users[0].countryCode }}
											</div>
											<div class="column small-four small-last info">
												<span class="icon icon-users"></span> Followers: {{ d.users[0].followers }}
											</div>
										</div>
										<div class="column large-nine large-last performances buffer-top">
											<div class="column large-four small-six">
												<dl class="column small-twelve tiny-four">
													<dt class="column reset small-nine">Avg. Monthly Trades</dt>
													<dd class="column small-three small-last">{{ d.users[0].avgTradesPerMonth | number:2 }}</dd>
												</dl>
												<dl class="column small-twelve tiny-four">
													<dt class="column reset small-nine">Last Month Trades</dt>
													<dd class="column small-three small-last">{{ d.users[0].tradesInPeriod }}</dd>
												</dl>
											</div>
											<div class="column large-four small-three charts">
												<div class="leaderboard-chart" data-percent="49">
													<div class="chart-content">
														<div class="chart-result green">{{ d.users[0].roiInPeriod.replace(/\.\d*\%$/, '%') }}</div>
														<div class="chart-title">ROI in Period</div>
													</div>
												</div>
											</div>
											<div class="column large-four large-last small-three small-last charts">
												<div class="leaderboard-chart" data-percent="{{ d.users[0].winRatio * 100 }}">
													<div class="chart-content">
														<div class="percent"></div>
														<div class="chart-title">Win Ratio</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								{{ /if }}
								<div class="row">
									{{ each d.users as user i }}
										{{ if i != 0 && i < 9 }}
											<div class="column large-three small-six hero {{if i % 4 == 0}}large-last{{/if}} {{if i % 2 == 0}}small-last{{/if}}">
												<div class="keep-left avatar">
													{{if user.avatar}}<img src="{{ user.avatar }}" alt="" width="60" height="60">{{/if}}
													{{if !user.avatar}}<img src="<?php echo get_template_directory_uri(); ?>/img/avatars/{{ 7 | randomNumber }}.png" alt="" width="60" height="60">{{/if}}
												</div>
												<div class="">
													<div class="name">{{ user.displayName }}</div>
													<div class="percent raising">{{ user.roiInPeriod }}</div>
												</div>
											</div>
										{{ /if }}
									{{ /each }}
								</div>
							{{ /if }}
						{{ /each }}
					</div>
				</div>
				<div class="column large-three large-last medium-four medium-last">
					<div class="tabs">
						<ul class="inline clear-after tabs-title">
							{{ each data as d i }}
								{{if d.leaderboardName == 'Europe'}}<li class="column two reset" style="width:20%;"><a href="#leaderboard-{{ i }}" title="{{ d.leaderboardName }}">EU</a></li>{{/if}}
								{{if d.leaderboardName == 'India'}}<li class="column two reset" style="width:20%;"><a href="#leaderboard-{{ i }}" title="{{ d.leaderboardName }}">IN</a></li>{{/if}}
								{{if d.leaderboardName == 'North America'}}<li class="column two reset" style="width:20%;"><a href="#leaderboard-{{ i }}" title="{{ d.leaderboardName }}">NA</a></li>{{/if}}
								{{if d.leaderboardName == 'South East Asia'}}<li class="column two reset" style="width:20%;"><a href="#leaderboard-{{ i }}" title="{{ d.leaderboardName }}">SEA</a></li>{{/if}}
								{{if d.leaderboardName == 'East Asia'}}<li class="column two reset" style="width:20%;"><a href="#leaderboard-{{ i }}" title="{{ d.leaderboardName }}">EA</a></li>{{/if}}
							{{ /each }}
						</ul>
						<h3 class="section-title">Heroes by Region<!--  <a class="read-more keep-right" href="heroes.html">Get more&gt;&gt;</a> --></h3>
						{{ each data as d i }}
							{{ if d.leaderboardName == 'Europe' ||
								d.leaderboardName == 'India' ||
								d.leaderboardName == 'North America' ||
								d.leaderboardName == 'South East Asia' ||
								d.leaderboardName == 'East Asia' }}
								<div id="leaderboard-{{ i }}" class="tab-content">
									<ol class="leaderboard">
										{{ each d.users as user }}
											<li>
												<div class="row">
													<div class="column seven name">{{ user.displayName }}</div>
													<div class="column five last percent raising">{{ user.roiInPeriod }}</div>
												</div>
											</li>
										{{ /each }}
									</ol>
								</div>
							{{ /if }}
						{{ /each }}
					</div>
				</div>
			</script>
		</div>
		<?php get_template_part( 'widget', 'footer' ); ?>
	</section>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>