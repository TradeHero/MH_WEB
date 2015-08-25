				<div id="sidebar-sticky"  class="sidebar fourcol last clearfix">

					<?php if ( is_active_sidebar( 'sidebar-sticky' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar-sticky' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

						<div class="alert alert-help">
							<p><?php _e("Please activate some Widgets.", "bonestheme");  ?></p>
						</div>

					<?php endif; ?>

				</div>	