<?php
/**
 * Template for Entry Content
 *
 * @package Blogify
 */
?>

<div class="entry-content">
	<?php
	if( is_single() ){
		the_content(
			sprintf(
                wp_kses(
                    __( 'Continue reading %s <span class="nav-meta">→</span>', BLOGIFY_TEXTDOMAIN ),
                    [ 'span' => [ 'class' => [] ] ]
                ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )

            )
		);
	} else {
		blogify_the_excerpt( '200' );
        echo blogify_read_more();
	}
	?>
</div>
