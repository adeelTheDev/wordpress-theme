<?php
/**
 * Reusable functions
 *
 * @package Blogify
 */

function get_the_post_custom_thumbnail( $post_id = null, $size = 'featured-thumbnail', $attr = [] ) {

	if( ! $post_id ) {
		$post_id = get_the_ID();
	}

	if( has_post_thumbnail( $post_id ) ) {
		$default_attributes = [];
		$attr = array_merge( $attr, $default_attributes );
	}

	return wp_get_attachment_image( get_post_thumbnail_id( $post_id ), $size, false, $attr );

}

function the_post_custom_thumbnail( $post_id = null, $size = 'featured-thumbnail', $attr = [] ):void {
	echo get_the_post_custom_thumbnail( $post_id, $size, $attr );
}
