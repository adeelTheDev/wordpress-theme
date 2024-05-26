<?php
/**
 * Template For Entry Footer
 *
 * @package Blogify
 */

$article_terms = wp_get_post_terms( get_the_ID(), [ 'category', 'post_tag' ] );

if( empty( $article_terms ) || ! is_array( $article_terms ) ) {
	return;
}

?>

<div class="entry-footer mt-4">
	<?php foreach ( $article_terms as $article_term ){ ?>
		<a href="<?php echo esc_url( get_term_link( $article_term ) ) ?>" class="post-term btn btn-sm btn-outline-secondary my-1 mx-1">
			<?php if( $article_term->taxonomy === 'post_tag' ){
				echo  '#' . esc_html__( $article_term->name );
			} else{
				echo esc_html__( $article_term->name );
			}?>
		</a>
	<?php } ?>
</div>
