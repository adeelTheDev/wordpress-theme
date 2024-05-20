<?php
/**
 * Bootstraps The Theme
 *
 * @package Blogify
 */

namespace BLOGIFY_THEME\Inc;

use BLOGIFY_THEME\Inc\Traits\Singleton;

class BLOGIFY_THEME {
	use Singleton;

	protected function __construct() {
		// Load class.
		Menus::get_instance();

		$this->setup_hooks();
	}

	protected  function setup_hooks():void {
		// Load hooks
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
	}

	public  function enqueue_styles():void {
		//	Register Styles
		wp_register_style('blogify-stylesheet', GET_THEME_DIRECTORY_URI . '/assets/css/main.style.css', ['bootstrap'], filemtime(GET_THEME_DIRECTORY . '/assets/css/main.style.css'));
		wp_register_style('bootstrap', GET_THEME_DIRECTORY_URI . '/assets/library/css/bootstrap.min.css', [], filemtime(GET_THEME_DIRECTORY . '/assets/library/css/bootstrap.min.css'));

		// Enqueue Styles
		wp_enqueue_style('blogify-stylesheet');
		wp_enqueue_style('bootstrap');
	}

	public  function enqueue_scripts():void {
	// Register Scripts
	wp_register_script('blogify-script', GET_THEME_DIRECTORY_URI . '/assets/js/main.script.js', [], filemtime(GET_THEME_DIRECTORY . '/assets/js/main.script.js'), true);
	wp_register_script('bootstrap-script', GET_THEME_DIRECTORY_URI . '/assets/library/js/bootstrap.min.js', [], filemtime(GET_THEME_DIRECTORY . '/assets/library/js/bootstrap.min.js'), true);

	// Enqueue Scripts
	wp_enqueue_script('blogify-script');
	wp_enqueue_script('bootstrap-script');
}

	public function setup_theme():void {

		// TODO: Implement translation

		add_theme_support( 'title-tag' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'custom-logo' ,[
			'height' => 100,
			'width' => 400,
			'flex-height' => true,
			'flex-width' => true,
			'header-text' => [ 'site-title', 'site-description' ]
		] );

		add_theme_support( 'custom-background', [
			'default-color' => '#FFF',
			'default-image' => ''
		] );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style'
		] );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		global $content_width;
		if( ! isset( $content_width ) ) $content_width = 1280;

		add_editor_style();

		add_image_size( 'featured-thumbnail', 356, 237, true  );

	}

}