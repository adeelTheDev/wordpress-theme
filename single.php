<?php

/**
 * Template for single blog post
 *
 * @package Blogify
 */

get_header();
?>
	<div class="primary" id="primary">
		<main id="main" class="main">
			<?php if ( have_posts() ) : ?>
				<div class="container">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content' );
					endwhile; // have_posts(); ?>
				</div>
			<?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; // have_posts();
			?>
		</main>
	</div>
<?php
get_footer();
