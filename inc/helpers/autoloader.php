<?php
/**
 * Autoloader File For Theme
 *
 * @package Blogify
 */

namespace BLOGIFY_THEME\Inc\Helpers;

/**
 * Autoloader function
 *
 * @param string $resource Resource namespace
 *
 * @return void
 */

function autoloader(string $resource = ''): void {

	$resource_path = false;
	$namespace_root = 'BLOGIFY_THEME\\';
	$resource = trim( $resource, '\\' ); # STEP 1: Removed backslash -> BLOGIFY_THEME\Inc\Helpers\autoloader


	if(empty($resource) || strpos($resource, '\\') === false || strpos($resource, $resource_path !== 0)) {
		// Not our namespace, bail out
		return;
	}


	// Remove our root namespace
	$resource = str_replace($namespace_root, '', $resource); # STEP 2: Removed root namespace -> Inc\Helpers\autoloader


	$path = explode(
		'\\',
		str_replace('_', '-', strtolower($resource))
	); # STEP 3: replace underscore with hyphen , convert to lowercase & convert into array -> ['inc', 'helpers', 'autoloader']


	// Not provided complete namespace path
	if(empty($path[0]) || empty($path[1])) {
		return;
	}

	$directory = '';
	$file_name = '';

	if('inc' === $path[0]) {

		switch ($path[1]) {
			case 'traits':
				$directory = 'traits';
				$file_name = sprintf('trait-%s', trim( strtolower( $path[2] ) ) );
				break;

			case 'widget':
			case 'blocks': // phpcs:ignore PSR@.ControlStructures.SwitchDeclaration.TerminatingComment
			/**
			 * If there is class name provided for specific directory then load that
			 */
				if( !empty( $path[2] ) ) {
					$directory = sprintf( 'classes/%s', $path[1] );
					$file_name = sprintf( 'class-%s', trim( strtolower( $path[2] ) ) );
					break;
				}
			default:
				$directory = 'classes';
				$file_name = sprintf( 'class-%s', trim( strtolower( $path[1] ) ) );
				break;
		}

		$resource_path = sprintf( '%s/inc/%s/%s.php', untrailingslashit( GET_THEME_DIRECTORY ), $directory, $file_name );

	}

	/**
	 * If $is_valid_file has 0 means valid path or 2 means the path contains a windows drive path.
	 */
	$is_valid_file = validate_file( $resource_path );

	if( !empty($resource_path) && file_exists( $resource_path ) && ( 0 === $is_valid_file || 2 === $is_valid_file ) ) {
		require_once( $resource_path ); // phpcs:ignore
	}

}


spl_autoload_register('\BLOGIFY_THEME\Inc\Helpers\autoloader');