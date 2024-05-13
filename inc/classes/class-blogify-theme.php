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
		$this->set_hooks();
	}

	protected  function set_hooks() {

	}
}