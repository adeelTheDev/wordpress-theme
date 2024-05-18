<?php
/**
 * Content Template
 * 
 * @package Blogify
 */
?>
<article class="col-lg-4 col-md-6 col-sm-12" <?php  ?> >
<?php
the_title( '<h3>', '</h3>' );
the_excerpt();
?>
</article>
