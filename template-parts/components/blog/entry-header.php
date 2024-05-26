<?php
/**
 * Template For Post Entry Header
 *
 * @package Blogify
 */

$the_post_id        = get_the_ID();
$has_post_thumbnail = has_post_thumbnail();
$the_post_link      = get_the_permalink();
$hide_page_title    = get_post_meta( $the_post_id, '_hide_page_title', true );
$title_class        = ( ! empty( $hide_page_title ) && $hide_page_title === 'YES' ) ? 'd-none' : '';
$feature_image_size = is_single() ? 'featured-large' : 'featured-thumbnail';
?>
<header class="entry-header">

	<?php

	/**
	 * Display Featured Image
	 */
	if ( $has_post_thumbnail ) {
		$thumbnail = get_the_post_custom_thumbnail(
			$the_post_id,
			$feature_image_size,
			[
				'class' => 'attachment attachment-featured-thumbnail featured-image '
			]
		);
		?>
        <div class="entry-image mb-3">
			<?php
			if ( is_single() ) {
				echo $thumbnail;
			} else {
				?>
                <a href="<?php echo esc_url( $the_post_link ) ?>">
					<?php echo $thumbnail; ?>
                </a>
				<?php
			}
			?>
        </div>
		<?php
	}

	/**
	 * Display Title
	 */

	if ( is_single() || is_page() ) {
		printf(
			'<h1 class="page-title text-dark %1$s">%2$s</h1>',
			esc_attr( $title_class ),
			wp_kses_post( get_the_title() )
		);
	} else {
		printf(
			'<h2 class="entry-title fs-3 mb-3"><a href="%1$s" class="text-dark">%2$s</a></h2>',
			esc_url( $the_post_link ),
			wp_kses_post( get_the_title() )
		);
	}
	?>

</header>
