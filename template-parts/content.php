<?php
/**
 * Content Template
 * 
 * @package Blogify
 */

$entry_classes = is_single() ? 'mb-5' : 'col-lg-4 col-md-6 col-sm-12 mb-5';

?>
<article id="post-<?php the_ID() ?>" <?php post_class( $entry_classes ); ?>>
<?php
    $components = [ 'entry-header', 'entry-meta', 'entry-content', 'entry-footer' ];
    foreach ( $components as $component ) {
        get_template_part( "template-parts/components/blog/$component" );
    }
?>
</article>
