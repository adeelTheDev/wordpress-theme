<?php

/**
 * Template for single blog post
 *
 * @package Blogify
 */

get_header();
?>
	<div class="primary" id="primary">
		<main id="main" class="main py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8">
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
                    </div>
                    <div class="col-12 col-md-4">
                        <?php get_sidebar() ?>
                    </div>
                </div>
            </div>
		</main>
	</div>
<?php
get_footer();
