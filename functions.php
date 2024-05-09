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
	define('GET_THEME_DIRECTORY', get_template_directory());
}


function blogify_enqueue_scripts() {
	wp_enqueue_style('blogify-stylesheet', GET_THEME_DIRECTORY_URI . '/assets/css/main.style.css', '', filemtime(GET_THEME_DIRECTORY . '/assets/css/main.style.css'));
	wp_enqueue_script('blogify-script', GET_THEME_DIRECTORY_URI . '/assets/js/main.script.js', '', filemtime(GET_THEME_DIRECTORY . '/assets/js/main.script.css'), true);
}

add_action('wp_enqueue_scripts', 'blogify_enqueue_scripts');