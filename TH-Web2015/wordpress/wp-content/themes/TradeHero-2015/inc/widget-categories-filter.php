<?php
/**
 * Exclude preserved categories from category widget
 * @since TradeHero 2.0
 */
function widget_categories_args_filter( $cat_args ) {
	$exclude_arr[] = get_cat_id( 'TH' );

	function get_children_cats( $parent ) {
		$children = get_categories( array( 'child_of' => $parent ) );
		$ids = array();
		foreach( $children as $child ) {
			$cat_ID = $child->cat_ID;
			$ids[] = $cat_ID;
			$ids = array_merge( $ids, get_children_cats( $cat_ID ) );
		}
		return $ids;
	}

	foreach ( $exclude_arr as $parent ) {
		$exclude_arr = array_merge( $exclude_arr, get_children_cats( $parent ) );
	}

	if( isset( $cat_args['exclude'] ) && !empty( $cat_args['exclude'] ) )
		$exclude_arr = array_unique( array_merge( explode( ',', $cat_args['exclude'] ), $exclude_arr ) );
	$cat_args['exclude'] = implode( ',', $exclude_arr );
	return $cat_args;
}

add_filter( 'widget_categories_args', 'widget_categories_args_filter', 10, 1 );
?>