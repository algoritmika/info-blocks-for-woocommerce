<?php
/**
 * Info Blocks for WooCommerce - Meta Boxes - Positions
 *
 * @version 1.3.0
 * @since   1.1.0
 *
 * @author  Algoritmika Ltd
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

return apply_filters( 'alg_wc_info_blocks_positions', array(
	__( 'General', 'info-blocks-for-woocommerce' ) => array(
		'alg_wc_ib_before_price_html'                                    => __( 'Before product price', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_after_price_html'                                     => __( 'After product price', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_instead_price_html'                                   => __( 'Instead of product price', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_after_empty_price_html'                               => __( 'On empty product price', 'info-blocks-for-woocommerce' ),
	),
	__( 'Single product', 'info-blocks-for-woocommerce' ) => array(
		'woocommerce_before_single_product'                              => __( 'Before single product', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_single_product_summary'                      => __( 'Before single product summary', 'info-blocks-for-woocommerce' ),
		'woocommerce_single_product_summary'                             => __( 'Inside single product summary', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_single_product_summary'                       => __( 'After single product summary', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_single_product'                               => __( 'After single product', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_add_to_cart_form'                            => __( 'Before add to cart form', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_add_to_cart_button'                          => __( 'Before add to cart button', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_add_to_cart_button'                           => __( 'After add to cart button', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_add_to_cart_form'                             => __( 'After add to cart form', 'info-blocks-for-woocommerce' ),
		'woocommerce_product_meta_start'                                 => __( 'Product meta start', 'info-blocks-for-woocommerce' ),
		'woocommerce_product_meta_end'                                   => __( 'Product meta end', 'info-blocks-for-woocommerce' ),
	),
	__( 'Single product tabs', 'info-blocks-for-woocommerce' ) => array(
		'alg_wc_ib_before_product_description_heading'                   => __( 'Description: Heading start', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_after_product_description_heading'                    => __( 'Description: Heading end', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_instead_product_description_heading'                  => __( 'Description: Instead of heading', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_before_content'                                       => __( 'Description: Content start', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_after_content'                                        => __( 'Description: Content end', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_instead_content'                                      => __( 'Description: Instead of content', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_before_product_additional_information_heading'        => __( 'Additional information: Heading start', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_after_product_additional_information_heading'         => __( 'Additional information: Heading end', 'info-blocks-for-woocommerce' ),
		'alg_wc_ib_instead_product_additional_information_heading'       => __( 'Additional information: Instead of heading', 'info-blocks-for-woocommerce' ),
		'woocommerce_product_additional_information'                     => __( 'Additional information: Content end', 'info-blocks-for-woocommerce' ),
	),
	__( 'Product archives', 'info-blocks-for-woocommerce' ) => array(
		'woocommerce_before_shop_loop_item'                              => __( 'Before product', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_shop_loop_item_title'                        => __( 'Before product title', 'info-blocks-for-woocommerce' ),
		'woocommerce_shop_loop_item_title'                               => __( 'Inside product title', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_shop_loop_item_title'                         => __( 'After product title', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_shop_loop_item'                               => __( 'After product', 'info-blocks-for-woocommerce' ),
	),
	__( 'Cart', 'info-blocks-for-woocommerce' ) => array(
		'woocommerce_before_cart'                                        => __( 'Before cart', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_cart_table'                                  => __( 'Before cart table', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_cart_contents'                               => __( 'Before cart contents', 'info-blocks-for-woocommerce' ),
		'woocommerce_cart_contents'                                      => __( 'Cart contents', 'info-blocks-for-woocommerce' ),
		'woocommerce_cart_coupon'                                        => __( 'Cart coupon', 'info-blocks-for-woocommerce' ),
		'woocommerce_cart_actions'                                       => __( 'Cart actions', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_cart_contents'                                => __( 'After cart contents', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_cart_table'                                   => __( 'After cart table', 'info-blocks-for-woocommerce' ),
		'woocommerce_cart_collaterals'                                   => __( 'Cart collaterals', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_cart'                                         => __( 'After cart', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_cart_totals'                                 => __( 'Before cart totals', 'info-blocks-for-woocommerce' ),
		'woocommerce_cart_totals_before_shipping'                        => __( 'Cart totals: Before shipping', 'info-blocks-for-woocommerce' ),
		'woocommerce_cart_totals_after_shipping'                         => __( 'Cart totals: After shipping', 'info-blocks-for-woocommerce' ),
		'woocommerce_cart_totals_before_order_total'                     => __( 'Cart totals: Before order total', 'info-blocks-for-woocommerce' ),
		'woocommerce_cart_totals_after_order_total'                      => __( 'Cart totals: After order total', 'info-blocks-for-woocommerce' ),
		'woocommerce_proceed_to_checkout'                                => __( 'Proceed to checkout', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_cart_totals'                                  => __( 'After cart totals', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_shipping_calculator'                         => __( 'Before shipping calculator', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_shipping_calculator'                          => __( 'After shipping calculator', 'info-blocks-for-woocommerce' ),
		'woocommerce_cart_is_empty'                                      => __( 'If cart is empty', 'info-blocks-for-woocommerce' ),
	),
	__( 'Mini cart', 'info-blocks-for-woocommerce' ) => array(
		'woocommerce_before_mini_cart'                                   => __( 'Before mini cart', 'info-blocks-for-woocommerce' ),
		'woocommerce_widget_shopping_cart_before_buttons'                => __( 'Before buttons', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_mini_cart'                                    => __( 'After mini cart', 'info-blocks-for-woocommerce' ),
	),
	__( 'Checkout', 'info-blocks-for-woocommerce' ) => array(
		'woocommerce_before_checkout_form'                               => __( 'Before checkout form', 'info-blocks-for-woocommerce' ),
		'woocommerce_checkout_before_customer_details'                   => __( 'Before customer details', 'info-blocks-for-woocommerce' ),
		'woocommerce_checkout_billing'                                   => __( 'Billing', 'info-blocks-for-woocommerce' ),
		'woocommerce_checkout_shipping'                                  => __( 'Shipping', 'info-blocks-for-woocommerce' ),
		'woocommerce_checkout_after_customer_details'                    => __( 'After customer details', 'info-blocks-for-woocommerce' ),
		'woocommerce_checkout_before_order_review'                       => __( 'Before order review', 'info-blocks-for-woocommerce' ),
		'woocommerce_checkout_order_review'                              => __( 'Order review', 'info-blocks-for-woocommerce' ),
		'woocommerce_checkout_after_order_review'                        => __( 'After order review', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_checkout_form'                                => __( 'After checkout form', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_checkout_shipping_form'                      => __( 'Before checkout shipping form', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_checkout_shipping_form'                       => __( 'After checkout shipping form', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_order_notes'                                 => __( 'Before order notes', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_order_notes'                                  => __( 'After order notes', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_checkout_billing_form'                       => __( 'Before checkout billing form', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_checkout_billing_form'                        => __( 'After checkout billing form', 'info-blocks-for-woocommerce' ),
		'woocommerce_before_checkout_registration_form'                  => __( 'Before checkout registration form', 'info-blocks-for-woocommerce' ),
		'woocommerce_after_checkout_registration_form'                   => __( 'After checkout registration form', 'info-blocks-for-woocommerce' ),
		'woocommerce_review_order_before_cart_contents'                  => __( 'Review order: Before cart contents', 'info-blocks-for-woocommerce' ),
		'woocommerce_review_order_after_cart_contents'                   => __( 'Review order: After cart contents', 'info-blocks-for-woocommerce' ),
		'woocommerce_review_order_before_shipping'                       => __( 'Review order: Before shipping', 'info-blocks-for-woocommerce' ),
		'woocommerce_review_order_after_shipping'                        => __( 'Review order: After shipping', 'info-blocks-for-woocommerce' ),
		'woocommerce_review_order_before_order_total'                    => __( 'Review order: Before order total', 'info-blocks-for-woocommerce' ),
		'woocommerce_review_order_after_order_total'                     => __( 'Review order: After order total', 'info-blocks-for-woocommerce' ),
		'woocommerce_thankyou'                                           => __( 'Order Received (Thank You) page', 'info-blocks-for-woocommerce' ),
	),
) );
