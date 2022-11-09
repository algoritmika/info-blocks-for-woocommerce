<?php
/**
 * Info Blocks for WooCommerce - Filters to Actions Class
 *
 * @version 1.3.0
 * @since   1.3.0
 *
 * @author  Algoritmika Ltd
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Alg_WC_Info_Blocks_Filters_To_Actions' ) ) :

class Alg_WC_Info_Blocks_Filters_To_Actions {

	/**
	 * Constructor.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function __construct() {
		$this->action_filters = array(
			'alg_wc_ib_before_content'                                       => 'the_content',
			'alg_wc_ib_after_content'                                        => 'the_content',
			'alg_wc_ib_instead_content'                                      => 'the_content',
			'alg_wc_ib_before_product_description_heading'                   => 'woocommerce_product_description_heading',
			'alg_wc_ib_after_product_description_heading'                    => 'woocommerce_product_description_heading',
			'alg_wc_ib_instead_product_description_heading'                  => 'woocommerce_product_description_heading',
			'alg_wc_ib_before_product_additional_information_heading'        => 'woocommerce_product_additional_information_heading',
			'alg_wc_ib_after_product_additional_information_heading'         => 'woocommerce_product_additional_information_heading',
			'alg_wc_ib_instead_product_additional_information_heading'       => 'woocommerce_product_additional_information_heading',
			'alg_wc_ib_before_price_html'                                    => 'woocommerce_get_price_html',
			'alg_wc_ib_after_price_html'                                     => 'woocommerce_get_price_html',
			'alg_wc_ib_instead_price_html'                                   => 'woocommerce_get_price_html',
			'alg_wc_ib_after_empty_price_html'                               => 'woocommerce_empty_price_html',
		);
		add_action( 'alg_wc_info_blocks_position_action_added', array( $this, 'add_action_filter' ) );
	}

	/**
	 * add_action_filter.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function add_action_filter( $action ) {
		if ( isset( $this->action_filters[ $action ] ) ) {
			add_filter( $this->action_filters[ $action ], array( $this, $action ), PHP_INT_MAX );
			unset( $this->action_filters[ $action ] );
		}
	}

	/*
	 * alg_wc_ib_before_product_additional_information_heading.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_before_product_additional_information_heading( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_before_product_additional_information_heading', 'before' );
	}

	/*
	 * alg_wc_ib_after_product_additional_information_heading.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_after_product_additional_information_heading( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_after_product_additional_information_heading', 'after' );
	}

	/*
	 * alg_wc_ib_instead_product_additional_information_heading.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_instead_product_additional_information_heading( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_instead_product_additional_information_heading', 'instead' );
	}

	/*
	 * alg_wc_ib_before_product_description_heading.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_before_product_description_heading( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_before_product_description_heading', 'before' );
	}

	/*
	 * alg_wc_ib_after_product_description_heading.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_after_product_description_heading( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_after_product_description_heading', 'after' );
	}

	/*
	 * alg_wc_ib_instead_product_description_heading.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_instead_product_description_heading( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_instead_product_description_heading', 'instead' );
	}

	/*
	 * alg_wc_ib_after_empty_price_html.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_after_empty_price_html( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_after_empty_price_html', 'after', array( 'is_frontend' ) );
	}

	/*
	 * alg_wc_ib_before_price_html.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_before_price_html( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_before_price_html', 'before', array( 'is_frontend' ) );
	}

	/*
	 * alg_wc_ib_after_price_html.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_after_price_html( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_after_price_html', 'after', array( 'is_frontend' ) );
	}

	/*
	 * alg_wc_ib_instead_price_html.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_instead_price_html( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_instead_price_html', 'instead', array( 'is_frontend' ) );
	}

	/*
	 * alg_wc_ib_before_content.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_before_content( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_before_content', 'before', array( 'is_product' ) );
	}

	/*
	 * alg_wc_ib_after_content.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_after_content( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_after_content', 'after', array( 'is_product' ) );
	}

	/*
	 * alg_wc_ib_instead_content.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_instead_content( $content ) {
		return $this->alg_wc_ib_filter_to_action( $content, 'alg_wc_ib_instead_content', 'instead', array( 'is_product' ) );
	}

	/*
	 * alg_wc_ib_filter_to_action.
	 *
	 * @version 1.3.0
	 * @since   1.3.0
	 */
	function alg_wc_ib_filter_to_action( $content, $action, $before_or_after_or_instead, $checks = array() ) {
		if (
			( ! in_array( 'is_product',  $checks ) || ( function_exists( 'is_product' ) && is_product() ) ) &&
			( ! in_array( 'is_frontend', $checks ) || ( ! is_admin() || wp_doing_ajax() ) )
		) {
			ob_start();
			do_action( $action );
			$result  = ob_get_clean();
			switch ( $before_or_after_or_instead ) {
				case 'before':
					return $result . $content;
				case 'after':
					return $content . $result;
				case 'instead':
					return $result;
			}
		}
		return $content;
	}

}

endif;

return new Alg_WC_Info_Blocks_Filters_To_Actions();
