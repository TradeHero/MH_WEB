<?php  
/* Template name: Blog Page */
get_header();?>
	
	<div id="intro-wrap"  data-height="22.222">
		<div id="intro" class="preload darken">
			<div class="intro-item" style="background-color: red;">
				<div class="caption">
					<h2>What's happening</h2>
					<p>The universe is made of stories, not of atoms.</p>
				</div><!-- caption -->		
			</div><!-- intro -->
		</div><!-- intro -->				
	</div><!-- intro-wrap -->

	<div id="main" class="row">
		<div class="row-content buffer-left buffer-right buffer-bottom clear-after">
			<div class="column nine">
				
			</div>
			<aside class="column three last"><?php get_sidebar(); ?></aside>
		</div>
	</div>

<?php get_footer(); ?>