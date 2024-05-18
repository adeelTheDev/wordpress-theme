<?php
/**
 * No Content Template
 *
 * @package Blogify
 */
?>
<section>
	<div class="container">
		<header class="page-header py-5 text-center">
			<h1 class="page-title">
				<?php esc_html_e( 'Nothing Found', BLOGIFY_TEXTDOMAIN ); ?>
			</h1>
		</header>
	</div>
	<div class="container">
		<div class="row">
			<div class="col col d-flex flex-column align-items-center text-center fs-5">
				<?php
                $allowed_html = [
	                'p' => [
                         'class' => []
                    ],
	                'a' => [
		                'href' => []
	                ]
                ];
                if( is_home() && current_user_can( 'publish_posts' ) ){
					printf(
						wp_kses(
							__( '<p>Read to publish your first post? <a href="%s"> Get Started </a> </p>', BLOGIFY_TEXTDOMAIN),
                            $allowed_html
						),
                        admin_url('post-new.php')
					);
                } elseif ( is_search() ) {
					printf(
						wp_kses(
							__( '<p> Sorry but nothing matched your search term, Please try again with some different keywords.</p>', BLOGIFY_TEXTDOMAIN),
                        	$allowed_html
						)
					);
                    get_search_form();
                } else {
	                printf(
		                wp_kses(
			                __( '<p> It seems that we cannot find what you are looking for. Perhaps search can help.</p>', BLOGIFY_TEXTDOMAIN),
			                $allowed_html
		                )
	                );
	                get_search_form();
                } ?>
			</div>
		</div>
	</div>
</section>
