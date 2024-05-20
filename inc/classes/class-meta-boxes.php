<?php
/**
 * Custom Meta Boxes
 *
 * @package Blogify
 */

namespace BLOGIFY_THEME\Inc;

use BLOGIFY_THEME\Inc\Traits\Singleton;

class Meta_boxes {
	use Singleton;

	protected function __construct() {

		$this->setup_hooks();
	}

	protected function setup_hooks(): void {
		// Load hooks

		add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
		add_action( 'save_post', [ $this, 'save_post_meta_data' ] );
	}

	public function add_custom_meta_box() {
		$screens = [ 'post' ];
		foreach ( $screens as $screen ) {
			add_meta_box(
				'hide_page_title',
				__( 'Hide Page title' ),
				[ $this, 'hide_page_title_html' ],
				$screen,
				'side',
				'high'
			);
		}
	}

	public function hide_page_title_html( $post ) {
		$value = get_post_meta( $post->ID, '_hide_page_title', true );

        /**
		 * Add nonce to verify user
		 */
        wp_nonce_field( plugin_basename( __FILE__ ), 'hide_page_title_filed_nonce' );
		?>
        <div class="components-panel__body">
            <select name="hide_page_title" id="hide-page-title-field" class="postbox"
                    style="border: 1px solid lightgrey; min-width: 0; width: 100%; padding: 0 0 0 8px">
                <option value="">
					<?php esc_html_e( 'Select', BLOGIFY_TEXTDOMAIN ); ?>
                </option>
                <option value="YES" <?php selected( $value, 'YES' ); ?>>
					<?php esc_html_e( 'Yes', BLOGIFY_TEXTDOMAIN ); ?>
                </option>
                <option value="NO" <?php selected( $value, 'NO' ); ?>>
					<?php esc_html_e( 'No', BLOGIFY_TEXTDOMAIN ); ?>
                </option>
            </select>
        </div>
		<?php
	}

    public function save_post_meta_data( $post_id ) {

	    /**
	     * Return if current user is not permitted to edit current post
	     */
        if( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

	    /**
	     * Return if the hide_title_field doesn't exist in $_POSt
	     */
	    if( ! array_key_exists( 'hide_page_title', $_POST ) ) {
		    return;
	    }

	    /**
	     * Verify nonce.
	     */
        if(
            ! isset( $_POST[ 'hide_page_title_filed_nonce' ] ) ||
            ! wp_verify_nonce( $_POST[ 'hide_page_title_filed_nonce' ], plugin_basename( __FILE__ ) )
        ) {
            return;
        }

	    update_post_meta( $post_id, '_hide_page_title', $_POST[ 'hide_page_title' ] );

    }

}