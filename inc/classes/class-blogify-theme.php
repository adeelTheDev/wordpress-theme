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
		$this->setup_hooks();
	}

	protected  function setup_hooks():void {
		// Load hooks
		add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
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

}