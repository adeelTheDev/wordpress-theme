<?php
/**
 * Content Template
 * 
 * @package Blogify
 */
?>
<article id="post-<?php the_ID() ?>" <?php post_class( 'col-lg-4 col-md-6 col-sm-12' ); ?>>
<?php
    $components = [ 'entry-header', 'entry-meta', 'entry-content', 'entry-footer' ];
    foreach ( $components as $component ) {
        get_template_part( "template-parts/components/blog/$component" );
    }
?>
</article>
