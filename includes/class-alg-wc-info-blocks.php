<?php
/**
 * Add Custom Messages Anywhere in WooCommerce - Main Class
 *
 * @version 2.0.0
 * @since   1.0.0
 *
 * @author  Algoritmika Ltd
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Alg_WC_Info_Blocks' ) ) :

final class Alg_WC_Info_Blocks {

	/**
	 * Plugin version.
	 *
	 * @var   string
	 * @since 1.0.0
	 */
	public $version = ALG_WC_INFO_BLOCKS_VERSION;

	/**
	 * core.
	 *
	 * @version 2.0.0
	 * @since   2.0.0
	 */
	public $core;

	/**
	 * @var   Alg_WC_Info_Blocks The single instance of the class
	 * @since 1.0.0
	 */
	protected static $_instance = null;

	/**
	 * Main Alg_WC_Info_Blocks Instance.
	 *
	 * Ensures only one instance of Alg_WC_Info_Blocks is loaded or can be loaded.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 *
	 * @static
	 * @return  Alg_WC_Info_Blocks - Main instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Alg_WC_Info_Blocks Constructor.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 *
	 * @access  public
	 */
	function __construct() {

		// Check for active WooCommerce plugin
		if ( ! function_exists( 'WC' ) ) {
			return;
		}

		// Set up localisation
		add_action( 'init', array( $this, 'localize' ) );

		// Declare compatibility with custom order tables for WooCommerce
		add_action( 'before_woocommerce_init', array( $this, 'wc_declare_compatibility' ) );

		// Pro
		if ( 'info-blocks-for-woocommerce-pro.php' === basename( ALG_WC_INFO_BLOCKS_FILE ) ) {
			require_once plugin_dir_path( __FILE__ ) . 'pro/class-alg-wc-info-blocks-pro.php';
		}

		// Include required files
		$this->includes();

		// Admin
		if ( is_admin() ) {
			$this->admin();
		}

	}

	/**
	 * localize.
	 *
	 * @version 1.2.0
	 * @since   1.1.1
	 */
	function localize() {
		load_plugin_textdomain(
			'info-blocks-for-woocommerce',
			false,
			dirname( plugin_basename( ALG_WC_INFO_BLOCKS_FILE ) ) . '/langs/'
		);
	}

	/**
	 * wc_declare_compatibility.
	 *
	 * @version 2.0.0
	 * @since   2.0.0
	 *
	 * @see     https://github.com/woocommerce/woocommerce/wiki/High-Performance-Order-Storage-Upgrade-Recipe-Book#declaring-extension-incompatibility
	 */
	function wc_declare_compatibility() {
		if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			$files = (
				defined( 'ALG_WC_INFO_BLOCKS_FILE_FREE' ) ?
				array( ALG_WC_INFO_BLOCKS_FILE, ALG_WC_INFO_BLOCKS_FILE_FREE ) :
				array( ALG_WC_INFO_BLOCKS_FILE )
			);
			foreach ( $files as $file ) {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility(
					'custom_order_tables',
					$file,
					true
				);
			}
		}
	}

	/**
	 * includes.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function includes() {
		$this->core = require_once plugin_dir_path( __FILE__ ) . 'class-alg-wc-info-blocks-core.php';
	}

	/**
	 * admin.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function admin() {

		// Action links
		add_filter( 'plugin_action_links_' . plugin_basename( ALG_WC_INFO_BLOCKS_FILE ), array( $this, 'action_links' ) );

		// Meta boxes
		require_once plugin_dir_path( __FILE__ ) . 'settings/class-alg-wc-info-blocks-meta-boxes.php';

		// Version updated
		if ( get_option( 'alg_wc_info_blocks_version', '' ) !== $this->version ) {
			add_action( 'admin_init', array( $this, 'version_updated' ) );
		}

	}

	/**
	 * action_links.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 *
	 * @param   mixed $links
	 * @return  array
	 */
	function action_links( $links ) {
		$custom_links = array();

		$custom_links[] = '<a href="' . admin_url( 'edit.php?post_type=alg_wc_info_block' ) . '">' .
			__( 'Info blocks', 'info-blocks-for-woocommerce' ) .
		'</a>';

		return array_merge( $custom_links, $links );
	}

	/**
	 * version_updated.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function version_updated() {
		update_option( 'alg_wc_info_blocks_version', $this->version );
	}

	/**
	 * plugin_url.
	 *
	 * @version 1.2.0
	 * @since   1.0.0
	 *
	 * @return  string
	 */
	function plugin_url() {
		return untrailingslashit( plugin_dir_url( ALG_WC_INFO_BLOCKS_FILE ) );
	}

	/**
	 * plugin_path.
	 *
	 * @version 1.2.0
	 * @since   1.0.0
	 *
	 * @return  string
	 */
	function plugin_path() {
		return untrailingslashit( plugin_dir_path( ALG_WC_INFO_BLOCKS_FILE ) );
	}

}

endif;
