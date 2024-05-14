<?php
/**
 * Theme Menus
 *
 * @package Blogify
 */

namespace BLOGIFY_THEME\Inc;

use BLOGIFY_THEME\Inc\Traits\Singleton;

class Menus {
	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	protected  function setup_hooks():void {
		// Load hooks
		add_action( 'init', [ $this, 'register_menus' ] );
	}

	public function register_menus():void {
		register_nav_menus( [
			'blogify-header-menu' => __( 'Header Menu', BLOGIFY_TEXTDOMAIN ),
			'blogify-footer-menu' => __( 'Footer Menu', BLOGIFY_TEXTDOMAIN )
		] );
	}

}