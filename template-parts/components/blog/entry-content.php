<?php
/**
 * Template for Entry Content
 *
 * @package Blogify
 */
?>

<div class="entry-content">
	<?php
	if ( is_single() ) {
		the_content(
			sprintf(
				wp_kses(
					__( 'Continue reading %s <span class="nav-meta">→</span>', BLOGIFY_TEXTDOMAIN ),
					[ 'span' => [ 'class' => [] ] ]
				),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )

			)
		);

		wp_link_pages( [
			'before' => '<div class="page-links">Pages:',
			'after'  => '</div>',
		] );

	} else {
		blogify_the_excerpt( '200' );
		echo blogify_read_more();
	}
	?>
</div>
