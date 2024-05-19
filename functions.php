<?php
/**
 * Theme Functions
 *
 * @package Blogify
 */

if( !defined( 'GET_THEME_DIRECTORY_URI' ) ) {
	define('GET_THEME_DIRECTORY_URI', get_template_directory_uri());
}

if( !defined( 'GET_THEME_DIRECTORY' ) ) {
	define('GET_THEME_DIRECTORY', untrailingslashit( get_template_directory() ) );
}

if( !defined('BLOGIFY_TEXTDOMAIN') ) {
	define( 'BLOGIFY_TEXTDOMAIN', 'blogify');
}



require_once  GET_THEME_DIRECTORY . '/inc/helpers/autoloader.php';
require_once  GET_THEME_DIRECTORY . '/inc/helpers/template-tags.php';

function blogify_get_theme_instance() {
	\BLOGIFY_THEME\Inc\BLOGIFY_THEME::get_instance();
}
blogify_get_theme_instance();