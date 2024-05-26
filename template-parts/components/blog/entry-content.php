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

        echo "<div class='container'><div class='row'>";
        previous_post_link( '<div class="col col-md-6 d-flex flex-row gap-2 align-items-center"> <span class="fs-3">«</span><div><div>Previous</div><div>%link</div></div> </div>' );
        next_post_link( '<div class="col col-md-6 d-flex flex-row gap-2 align-items-center justify-content-end"><div><div>Next</div><div>%link</div></div><span class="fs-3">»</span> </div>' );
        echo "</div></div>";

	} else {
		blogify_the_excerpt( '200' );
		echo blogify_read_more();
	}
	?>
</div>
