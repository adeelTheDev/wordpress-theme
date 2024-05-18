<?php

/**
 * Theme Entry File
 *
 * @package Blogify
 */

get_header();
?>
    <div class="primary" id="primary">
        <main id="main" class="main">
			<?php if ( true ) : ?>
                <div class="container">
					<?php if ( is_home() && ! is_front_page() ): ?>
                        <header class="page-header py-5 text-center">
                            <h1 class="page-title">
								<?php single_post_title(); ?>
                            </h1>
                        </header>
					<?php endif; // is_home() && ! is_front_page() ?>
					<?php
					$index = 0;
                    $number_of_columns = 3;
                    while ( have_posts() ) : the_post(); ?>
                        <?php if($index % $number_of_columns === 0 ): ?>
                        <div class="row">
                            <?php endif;
                            get_template_part( 'template-parts/content' );
                            $index++;
                            if( $index % $number_of_columns === 0 ): ?>
                        </div>
                        <?php
                        endif; // $index % $number_of_columns === 0
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
