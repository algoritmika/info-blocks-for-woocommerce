<?php
/*
Plugin Name: Info Blocks for WooCommerce
Plugin URI: https://wpfactory.com/item/info-blocks-for-woocommerce/
Description: Info blocks for WooCommerce.
Version: 1.4.4
Author: WPFactory
Author URI: https://wpfactory.com
Text Domain: info-blocks-for-woocommerce
Domain Path: /langs
WC tested up to: 9.1
Requires Plugins: woocommerce
*/

defined( 'ABSPATH' ) || exit;

if ( 'info-blocks-for-woocommerce.php' === basename( __FILE__ ) ) {
	/**
	 * Check if Pro plugin version is activated.
	 *
	 * @version 1.2.0
	 * @since   1.2.0
	 */
	$plugin = 'info-blocks-for-woocommerce-pro/info-blocks-for-woocommerce-pro.php';
	if (
		in_array( $plugin, (array) get_option( 'active_plugins', array() ), true ) ||
		( is_multisite() && array_key_exists( $plugin, (array) get_site_option( 'active_sitewide_plugins', array() ) ) )
	) {
		return;
	}
}

defined( 'ALG_WC_INFO_BLOCKS_VERSION' ) || define( 'ALG_WC_INFO_BLOCKS_VERSION', '1.4.4' );

defined( 'ALG_WC_INFO_BLOCKS_FILE' ) || define( 'ALG_WC_INFO_BLOCKS_FILE', __FILE__ );

require_once( 'includes/class-alg-wc-info-blocks.php' );

if ( ! function_exists( 'alg_wc_info_blocks' ) ) {
	/**
	 * Returns the main instance of Alg_WC_Info_Blocks to prevent the need to use globals.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function alg_wc_info_blocks() {
		return Alg_WC_Info_Blocks::instance();
	}
}

add_action( 'plugins_loaded', 'alg_wc_info_blocks' );
