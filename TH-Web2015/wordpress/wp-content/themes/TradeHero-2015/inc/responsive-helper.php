<?php
/**
 * Column calculation
 * @since TradeHero 2.0
 */
function tradehero_cal_col( $item_length ) {
	$col = 'twelve';
	switch( 12 / $item_length ) {
		case 12: $col = 'twelve'; break;
		case 6: $col = 'six'; break;
		case 4: $col = 'four'; break;
		case 3: $col = 'three'; break;
		case 2: $col = 'two'; break;
		case 1: $col = 'one'; break;
	}
	return $col;
}
?>