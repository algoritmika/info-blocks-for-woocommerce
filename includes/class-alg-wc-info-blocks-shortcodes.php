<?php
/**
 * Add Custom Messages Anywhere in WooCommerce - Shortcodes Class
 *
 * @version 2.0.0
 * @since   1.3.0
 *
 * @author  Algoritmika Ltd
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Alg_WC_Info_Blocks_Shortcodes' ) ) :

class Alg_WC_Info_Blocks_Shortcodes {

	/**
	 * Constructor.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 *
	 * @todo    (dev) add common attributes (`before`, `after` etc.)
	 * @todo    (dev) add more shortcodes (e.g., `[alg_wc_ib_get_cart prop="total"]`)
	 */
	function __construct() {
		add_shortcode( 'alg_wc_ib_get_post_meta', array( $this, 'alg_wc_ib_get_post_meta' ) );
		add_shortcode( 'alg_wc_ib_get_option',    array( $this, 'alg_wc_ib_get_option' ) );
	}

	/*
	 * alg_wc_ib_get_post_meta.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function alg_wc_ib_get_post_meta( $atts ) {
		if ( ! isset( $atts['key'] ) ) {
			return '';
		}
		return wp_kses_post(
			get_post_meta(
				get_the_ID(),
				$atts['key'],
				true
			)
		);
	}

	/*
	 * alg_wc_ib_get_option.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function alg_wc_ib_get_option( $atts ) {
		if ( ! isset( $atts['option'] ) ) {
			return '';
		}
		return wp_kses_post(
			get_option(
				$atts['option'],
				( isset( $atts['default'] ) ? $atts['default'] : false )
			)
		);
	}

}

endif;

return new Alg_WC_Info_Blocks_Shortcodes();
