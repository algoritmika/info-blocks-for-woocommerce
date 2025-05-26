<?php
/*
Plugin Name: Add Custom Messages Anywhere in WooCommerce
Plugin URI: https://wordpress.org/plugins/info-blocks-for-woocommerce/
Description: Add custom messages anywhere in WooCommerce. Beautifully.
Version: 2.0.2
Author: Algoritmika Ltd
Author URI: https://profiles.wordpress.org/algoritmika/
Text Domain: info-blocks-for-woocommerce
Domain Path: /langs
WC tested up to: 9.8
Requires Plugins: woocommerce
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

defined( 'ABSPATH' ) || exit;

if ( 'info-blocks-for-woocommerce.php' === basename( __FILE__ ) ) {
	/**
	 * Check if Pro plugin version is activated.
	 *
	 * @version 2.0.0
	 * @since   1.2.0
	 */
	$plugin = 'info-blocks-for-woocommerce-pro/info-blocks-for-woocommerce-pro.php';
	if (
		in_array( $plugin, (array) get_option( 'active_plugins', array() ), true ) ||
		(
			is_multisite() &&
			array_key_exists( $plugin, (array) get_site_option( 'active_sitewide_plugins', array() ) )
		)
	) {
		defined( 'ALG_WC_INFO_BLOCKS_FILE_FREE' ) || define( 'ALG_WC_INFO_BLOCKS_FILE_FREE', __FILE__ );
		return;
	}
}

defined( 'ALG_WC_INFO_BLOCKS_VERSION' ) || define( 'ALG_WC_INFO_BLOCKS_VERSION', '2.0.2' );

defined( 'ALG_WC_INFO_BLOCKS_FILE' ) || define( 'ALG_WC_INFO_BLOCKS_FILE', __FILE__ );

require_once plugin_dir_path( __FILE__ ) . 'includes/class-alg-wc-info-blocks.php';

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
