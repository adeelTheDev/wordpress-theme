<?php
/**
 * Theme Functions
 *
 * @package Blogify
 */

if(!defined('GET_THEME_DIRECTORY_URI')) {
	define('GET_THEME_DIRECTORY_URI', get_template_directory_uri());
}

if(!defined('GET_THEME_DIRECTORY')) {
	define('GET_THEME_DIRECTORY', untrailingslashit( get_template_directory() ) );
}

require_once  GET_THEME_DIRECTORY . '/inc/helpers/autoloader.php';

function blogify_get_theme_instance() {
	\BLOGIFY_THEME\Inc\BLOGIFY_THEME::get_instance();
}
blogify_get_theme_instance();

function blogify_enqueue_scripts() {

	//	Register Styles
	wp_register_style('blogify-stylesheet', GET_THEME_DIRECTORY_URI . '/assets/css/main.style.css', ['bootstrap'], filemtime(GET_THEME_DIRECTORY . '/assets/css/main.style.css'));
	wp_register_style('bootstrap', GET_THEME_DIRECTORY_URI . '/assets/library/css/bootstrap.min.css', [], filemtime(GET_THEME_DIRECTORY . '/assets/library/css/bootstrap.min.css'));

	// Register Scripts
	wp_register_script('blogify-script', GET_THEME_DIRECTORY_URI . '/assets/js/main.script.js', '', filemtime(GET_THEME_DIRECTORY . '/assets/js/main.script.js'), true);

	// Enqueue Styles
	wp_enqueue_style('blogify-stylesheet');
	wp_enqueue_style('bootstrap');

	// Enqueue Scripts
	wp_enqueue_script('blogify-script');

}

add_action('wp_enqueue_scripts', 'blogify_enqueue_scripts');