<?php
/**
 * @package WordPress
 * @subpackage TradeHero-2015
 * @since TradeHero 2.0
 */
?>
<div id="pagination">
	<ul class="clear-after reset plain">
		<li id="older" class="pagination-nav"><?php previous_post_link('%link', '<i class="fa fa-chevron-left"></i> Previous Post'); ?></li>  
		<li id="newer" class="pagination-nav"><?php next_post_link('%link', 'Next Post <i class="fa fa-chevron-right"></i>'); ?></li> 
	</ul>
</div>