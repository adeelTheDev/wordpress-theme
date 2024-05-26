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

function blogify_posted_on():void {

	$time = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	$text_before_time = __( 'Posted on: ', BLOGIFY_TEXTDOMAIN );

	if( get_the_time( 'U' ) === get_the_modified_time( 'U' ) ) {
		$time = sprintf(
			$time,
			get_the_date( 'DATE_W3C' ),
			get_the_date()
		);
	}else {
		$time = sprintf(
			$time,
			get_the_modified_date( 'DATE_W3C' ),
			get_the_modified_date()
		);
	}

	$time = sprintf(
		'%1$s <a href="%2$s" class="entry-date-link">%3$s</a>',
		$text_before_time,
		esc_url( get_permalink() ),
		$time
	);

	$time = '<span class="posted-on">' . $time . '</span>';
	echo  $time;

}

function blogify_posted_by():void {
	$byline = '<span class="author vcard"><a href="%1$s">%2$s</a></span>';

	$byline = sprintf(
		$byline,
		get_author_posts_url( get_the_author_meta( 'ID' ) ),
		get_the_author()
	);

	printf(
		esc_html_x( 'by %s', 'Post author', BLOGIFY_TEXTDOMAIN ),
		$byline
	);

}

function blogify_the_excerpt( $trim_character_count = 150 ) {

	$excerpt = wp_strip_all_tags( get_the_excerpt() );
	$excerpt = substr( $excerpt, 0, $trim_character_count );
	$excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
	echo $excerpt . '[...]';
	return;

}

function blogify_read_more ( $more = '' ) {

	if( is_single() ) {
		return;
	}

	return sprintf(
		'<a href="%1$s" class="btn btn-success">%2$s</a>',
		esc_url( get_the_permalink() ),
		__( 'Continue Reading', BLOGIFY_TEXTDOMAIN )
	);

}