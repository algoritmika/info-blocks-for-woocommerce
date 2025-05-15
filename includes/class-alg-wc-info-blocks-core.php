<?php
/**
 * Add Custom Messages Anywhere in WooCommerce - Core Class
 *
 * @version 2.0.0
 * @since   1.0.0
 *
 * @author  Algoritmika Ltd
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Alg_WC_Info_Blocks_Core' ) ) :

class Alg_WC_Info_Blocks_Core {

	/**
	 * info_blocks.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	public $info_blocks;

	/**
	 * Constructor.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 *
	 * @todo    (v1.0.0) test with WPML
	 * @todo    (feature) user role visibility
	 * @todo    (feature) country (by IP) visibility?
	 */
	function __construct() {

		// WP stuff
		add_action( 'init',       array( $this, 'create_info_blocks_post_type' ), 10 );
		add_action( 'admin_menu', array( $this, 'add_menu_link' ), PHP_INT_MAX );

		// Filters to actions
		require_once plugin_dir_path( __FILE__ ) . 'class-alg-wc-info-blocks-filters-to-actions.php';

		// Displaying info blocks
		$this->init_info_blocks();
		foreach ( $this->info_blocks as $position => $info_block_priority_data ) {
			foreach ( $info_block_priority_data as $priority => $info_block_data ) {
				add_action( $position, array( $this, 'alg_wc_display_info_blocks' ), $priority );
				do_action( 'alg_wc_info_blocks_position_action_added', $position );
			}
		}

		// Info block (display) shortcode
		add_shortcode( 'alg_wc_info_block', array( $this, 'alg_wc_info_block_shortcode' ) );

		// Shortcodes
		require_once plugin_dir_path( __FILE__ ) . 'class-alg-wc-info-blocks-shortcodes.php';

	}

	/*
	 * current_filter_priority.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function current_filter_priority() {
		global $wp_filter;
		$current_filter_data = $wp_filter[ current_filter() ];
		if ( class_exists( 'WP_Hook' ) && is_a( $current_filter_data, 'WP_Hook' ) ) {
			// since WordPress v4.7
			return $current_filter_data->current_priority();
		} else {
			// before WordPress v4.7
			return key( $current_filter_data );
		}
	}

	/**
	 * alg_wc_info_block_shortcode.
	 *
	 * @version 1.4.0
	 * @since   1.4.0
	 */
	function alg_wc_info_block_shortcode( $atts, $content = '' ) {
		$block_id = (
			isset( $atts['id'] ) ?
			$atts['id'] :
			(
				(
					isset( $atts['slug'] ) &&
					( $post = get_page_by_path( $atts['slug'], OBJECT, 'alg_wc_info_block' ) )
				) ?
				$post->ID :
				false
			)
		);
		if ( empty( $block_id ) ) {
			return '';
		}
		return $this->get_info_block_content(
			$this->get_info_block_data( $block_id ),
			$block_id,
			'shortcode',
			'NA'
		);
	}

	/**
	 * get_info_block_content.
	 *
	 * @version 2.0.0
	 * @since   1.4.0
	 *
	 * @todo    (dev) add option to choose between (probably for each block individually): a) `do_shortcode()`, b) `apply_filters( 'the_content' )` or c) no filtering at all?
	 */
	function get_info_block_content( $block_data, $block_id = '', $position = '', $priority = '' ) {

		if ( ! $this->is_block_visible( $block_data ) ) {
			return '';
		}

		remove_shortcode( 'alg_wc_info_block' );
		$result = do_shortcode( $block_data['content'] );
		add_shortcode( 'alg_wc_info_block', array( $this, 'alg_wc_info_block_shortcode' ) );

		// Debug (optional)
		if (
			isset( $_GET['alg_wc_ib_debug'] ) && // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			current_user_can( 'manage_woocommerce' )
		) {
			$result .= '<span style="font-size:x-small;border:1px dotted red;margin-left:5px;padding:2px;">' .
				sprintf(
					/* Translators: %s: Block position. */
					__( 'Position: %s', 'info-blocks-for-woocommerce' ),
					'<code>' . $position . '</code>'
				) . ' ' .
				sprintf(
					/* Translators: %s: Block position priority. */
					__( 'Priority: %s', 'info-blocks-for-woocommerce' ),
					'<code>' . $priority . '</code>'
				) . ' ' .
				sprintf(
					/* Translators: %s: Block ID. */
					__( 'Info block ID: %s', 'info-blocks-for-woocommerce' ),
					'<code>' . $block_id . '</code>'
				) . ' ' .
			'</span>';
		}

		return $result;
	}

	/**
	 * is_block_visible.
	 *
	 * @version 2.0.0
	 * @since   1.1.0
	 */
	function is_block_visible( $block_data ) {
		$post_id = get_the_ID();

		// Posts (i.e., products)
		if ( '' !== $block_data['required_post_ids'] ) {
			$required_post_ids = array_map( 'trim', explode( ',', $block_data['required_post_ids'] ) );
			if ( ! in_array( $post_id, $required_post_ids ) ) {
				return false;
			}
		}
		if ( '' !== $block_data['hidden_post_ids'] ) {
			$hidden_post_ids = array_map( 'trim', explode( ',', $block_data['hidden_post_ids'] ) );
			if ( in_array( $post_id, $hidden_post_ids ) ) {
				return false;
			}
		}

		// Product categories and tags
		if (
			(
				! empty( $block_data['required_product_cat_ids'] ) &&
				! has_term( $block_data['required_product_cat_ids'], 'product_cat', $post_id )
			) ||
			(
				! empty( $block_data['hidden_product_cat_ids'] ) &&
				has_term( $block_data['hidden_product_cat_ids'], 'product_cat', $post_id )
			) ||
			(
				! empty( $block_data['required_product_tag_ids'] ) &&
				! has_term( $block_data['required_product_tag_ids'], 'product_tag', $post_id )
			) ||
			(
				! empty( $block_data['hidden_product_tag_ids'] ) &&
				has_term( $block_data['hidden_product_tag_ids'], 'product_tag', $post_id )
			)
		) {
			return false;
		}

		// It's visible...
		return true;
	}

	/**
	 * alg_wc_display_info_blocks.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function alg_wc_display_info_blocks() {
		$position = current_filter();
		$priority = $this->current_filter_priority();
		if ( $position && $priority ) {
			foreach ( $this->info_blocks[ $position ][ $priority ] as $block_id => $block_data ) {
				echo wp_kses_post(
					$this->get_info_block_content(
						$block_data,
						$block_id,
						$position,
						$priority
					)
				);
			}
		}
	}

	/**
	 * get_info_block_data.
	 *
	 * @version 2.0.0
	 * @since   1.4.0
	 */
	function get_info_block_data( $block_id ) {
		return array(
			'content'                  => get_post_field( 'post_content', $block_id ),
			'required_post_ids'        => get_post_meta( $block_id, '_' . 'required_post_ids', true ),
			'hidden_post_ids'          => get_post_meta( $block_id, '_' . 'hidden_post_ids', true ),
			'required_product_cat_ids' => get_post_meta( $block_id, '_' . 'required_product_cat_ids', true ),
			'hidden_product_cat_ids'   => get_post_meta( $block_id, '_' . 'hidden_product_cat_ids', true ),
			'required_product_tag_ids' => get_post_meta( $block_id, '_' . 'required_product_tag_ids', true ),
			'hidden_product_tag_ids'   => get_post_meta( $block_id, '_' . 'hidden_product_tag_ids', true ),
		);
	}

	/**
	 * init_info_blocks.
	 *
	 * @version 1.4.0
	 * @since   1.0.0
	 */
	function init_info_blocks() {
		$this->info_blocks = array();
		$args = array(
			'post_type'      => 'alg_wc_info_block',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'ID',
			'order'          => 'ASC',
			'fields'         => 'ids',
		);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			foreach ( $loop->posts as $block_id ) {
				$positions = get_post_meta( $block_id, '_' . 'positions', true );
				if ( ! empty( $positions ) ) {
					$position_priorities = get_post_meta( $block_id, '_' . 'position_priorities', true );
					foreach ( $positions as $position ) {
						$position_priority = (
							isset( $position_priorities[ $position ] ) ?
							$position_priorities[ $position ] :
							10
						);
						$this->info_blocks[ $position ][ $position_priority ][ $block_id ] = $this->get_info_block_data( $block_id );
					}
				}
			}
		}
	}

	/**
	 * add_menu_link.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 */
	function add_menu_link() {
		add_submenu_page(
			'woocommerce',
			__( 'Info Blocks', 'info-blocks-for-woocommerce' ),
			__( 'Info Blocks', 'info-blocks-for-woocommerce' ),
			'manage_woocommerce',
			'edit.php?post_type=alg_wc_info_block'
		);
	}

	/**
	 * create_info_blocks_post_type.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 *
	 * @see     https://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @todo    (dev) add info: "Title is for admin only"
	 * @todo    (dev) re-check `capabilities` and `capability_type`
	 */
	function create_info_blocks_post_type() {
		register_post_type( 'alg_wc_info_block',
			array(
				'labels'             => array(
					'name'               => _x( 'Info Blocks', 'post type general name', 'info-blocks-for-woocommerce' ),
					'singular_name'      => _x( 'Info Block', 'post type singular name', 'info-blocks-for-woocommerce' ),
					'menu_name'          => _x( 'Info Blocks', 'admin menu', 'info-blocks-for-woocommerce' ),
					'name_admin_bar'     => _x( 'Info Block', 'add new on admin bar', 'info-blocks-for-woocommerce' ),
					'add_new'            => _x( 'Add New', 'info block', 'info-blocks-for-woocommerce' ),
					'add_new_item'       => __( 'Add New Info Block', 'info-blocks-for-woocommerce' ),
					'new_item'           => __( 'New Info Block', 'info-blocks-for-woocommerce' ),
					'edit_item'          => __( 'Edit Info Block', 'info-blocks-for-woocommerce' ),
					'view_item'          => __( 'View Info Block', 'info-blocks-for-woocommerce' ),
					'all_items'          => __( 'All Info Blocks', 'info-blocks-for-woocommerce' ),
					'search_items'       => __( 'Search Info Blocks', 'info-blocks-for-woocommerce' ),
					'parent_item_colon'  => __( 'Parent Info Blocks:', 'info-blocks-for-woocommerce' ),
					'not_found'          => __( 'No info blocks found.', 'info-blocks-for-woocommerce' ),
					'not_found_in_trash' => __( 'No info blocks found in Trash.', 'info-blocks-for-woocommerce' ),
				),
				'description'        => __( 'WooCommerce custom info block', 'info-blocks-for-woocommerce' ),
				'public'             => false,
				'publicly_queryable' => false,
				'show_ui'            => true,
				'show_in_menu'       => false,
				'query_var'          => false,
				'map_meta_cap'       => true,
				'has_archive'        => false,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'revisions' ),
			)
		);
	}

}

endif;

return new Alg_WC_Info_Blocks_Core();
