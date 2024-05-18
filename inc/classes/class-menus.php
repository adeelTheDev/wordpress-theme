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

	public function get_menu_id( string $location ):string|int {
		$locations = get_nav_menu_locations();
		if( !empty( $locations ) ){
			$menu_id = $locations[ $location ];
			return ! empty( $menu_id ) ? $menu_id : '';
		}
		return '';
	}

	public function get_menu_items( string|int $menu_id ):void {
		$menu_items = wp_get_nav_menu_items( $menu_id );
		print_r( $menu_items );
	}

	public  function get_child_menu_items( array $menu_array, int $parent_id ):array {
		$child_menus = [];
		if( !empty( $menu_array ) && is_array( $menu_array ) && !empty( $parent_id ) ) {
			foreach ( $menu_array as $menu ) {
				if( intval( $menu->menu_item_parent ) === $parent_id ) {
					array_push( $child_menus, $menu );
				}
			}
		}
		return $child_menus;
	}

}