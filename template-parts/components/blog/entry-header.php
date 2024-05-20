<?php
/**
 * Template For Post Entry Header
 *
 * @package Blogify
 */

$the_post_id        = get_the_ID();
$has_post_thumbnail = has_post_thumbnail();
$the_post_link = get_the_permalink();
?>
<header class="entry-header">
	<?php
	if ( $has_post_thumbnail ) {
		?>
        <div class="entry-image mb-3">
            <a href="<?php echo esc_url( $the_post_link ) ?>">
                <?php the_post_custom_thumbnail(
                    $the_post_id,
                    'featured-thumbnail',
                    [
                        'class' => 'attachment attachment-featured-thumbnail featured-image '
                    ]
                ); ?>
            </a>
        </div>
		<?php
	}
	?>
</header>
