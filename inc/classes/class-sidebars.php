<?php
/**
 * Theme's Sidebar
 *
 * @package Blogify
 */

namespace BLOGIFY_THEME\Inc;

use BLOGIFY_THEME\Inc\Traits\Singleton;

class Sidebars {
	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks(): void {
		// Load hooks
		add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
	}

	public function register_sidebars() {

		register_sidebar( [
			'name'          => __( 'Sidebar', BLOGIFY_TEXTDOMAIN ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Main sidebar', BLOGIFY_TEXTDOMAIN ),
			'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		] );

		register_sidebar( [
			'name'          => __( 'Footer Column 1', BLOGIFY_TEXTDOMAIN ),
			'id'            => 'footer-1',
			'description'   => __( 'Footer Column 1', BLOGIFY_TEXTDOMAIN ),
			'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		] );

		register_sidebar( [
			'name'          => __( 'Footer Column 2', BLOGIFY_TEXTDOMAIN ),
			'id'            => 'footer-2',
			'description'   => __( 'Footer Column 2', BLOGIFY_TEXTDOMAIN ),
			'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		] );

		register_sidebar( [
			'name'          => __( 'Footer Column 3', BLOGIFY_TEXTDOMAIN ),
			'id'            => 'footer-3',
			'description'   => __( 'Footer Column 3', BLOGIFY_TEXTDOMAIN ),
			'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		] );

		register_sidebar( [
			'name'          => __( 'Footer Column 4', BLOGIFY_TEXTDOMAIN ),
			'id'            => 'footer-4',
			'description'   => __( 'Footer Column 4', BLOGIFY_TEXTDOMAIN ),
			'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>'
		] );
	}

}