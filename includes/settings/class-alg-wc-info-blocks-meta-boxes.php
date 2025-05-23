<?php
/**
 * Add Custom Messages Anywhere in WooCommerce - Meta Boxes Class
 *
 * @version 2.0.0
 * @since   1.0.0
 *
 * @author  Algoritmika Ltd
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Alg_WC_Info_Blocks_Meta_Boxes' ) ) :

class Alg_WC_Info_Blocks_Meta_Boxes {

	/**
	 * position_options.
	 *
	 * @version 2.0.0
	 * @since   2.0.0
	 */
	public $position_options;

	/**
	 * Constructor.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function __construct() {
		add_action( 'add_meta_boxes',              array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post_alg_wc_info_block', array( $this, 'save_meta_boxes' ), 10, 3 );
		add_action( 'woocommerce_screen_ids',      array( $this, 'add_wc_screen_id' ) );
	}

	/**
	 * get_position_options.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 *
	 * @todo    (feature) positions: add more hooks, e.g., cart price
	 * @todo    (feature) positions: add Storefront hooks
	 * @todo    (feature) positions: add hooks with predefined priority
	 */
	function get_position_options() {
		if ( ! isset( $this->position_options ) ) {
			$this->position_options = require_once plugin_dir_path( __FILE__ ) . 'alg-wc-info-blocks-meta-boxes-positions.php';
		}
		return $this->position_options;
	}

	/**
	 * get_taxonomy_options.
	 *
	 * @version 2.0.0
	 * @since   1.2.0
	 */
	function get_taxonomy_options( $taxonomy, $current_terms ) {
		$result = array();
		$terms  = get_terms( array( 'taxonomy' => $taxonomy, 'hide_empty' => false ) );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			$result = wp_list_pluck( $terms, 'name', 'term_id' );
		}
		if ( ! empty( $current_terms ) ) {
			foreach ( $current_terms as $current_term_id ) {
				if ( ! isset( $result[ $current_term_id ] ) ) {
					$result[ $current_term_id ] = sprintf(
						/* Translators: %d: Term ID. */
						__( 'Term #%d', 'info-blocks-for-woocommerce' ),
						$current_term_id
					);
				}
			}
		}
		return $result;
	}

	/**
	 * get_options.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 *
	 * @todo    (desc) `tips`: `( '' != ( $slug = get_post_field( 'post_name', get_post() ) ) ? '[alg_wc_info_block slug="' . $slug . '"]' : '' )`
	 * @todo    (feature) visibility: custom taxonomy
	 * @todo    (dev) visibility: posts: as select box?
	 * @todo    (dev) positions: add option to set custom filters
	 * @todo    (dev) positions: add option to switch between: a) `chosen_select` and b) "standard"?
	 */
	function get_options() {
		return apply_filters( 'alg_wc_info_blocks_options', array(

			'position_options' => array(
				'title'    => __( 'Position(s)', 'info-blocks-for-woocommerce' ),
				'desc'     => __( 'After selecting the positions, click "Update" - you will be able to fine-tune positions with position priorities then.', 'info-blocks-for-woocommerce' ),
				'context'  => 'normal',
				'priority' => 'high',
				'options'  => array(
					array(
						'id'       => 'positions',
						'type'     => 'select',
						'class'    => 'chosen_select',
						'css'      => 'width:100%;',
						'multiple' => true,
						'default'  => array(),
						'options'  => $this->get_position_options(),
					),
				),
			),

			'visibility_options' => array(
				'title'    => __( 'Visibility', 'info-blocks-for-woocommerce' ),
				'context'  => 'normal',
				'priority' => 'high',
				'options'  => array(
					array(
						'title'    => __( 'Visible (required) post IDs', 'info-blocks-for-woocommerce' ),
						'desc_tip' => __( 'Comma separated list of post (e.g., product) IDs to show this info block on.', 'info-blocks-for-woocommerce' ),
						'id'       => 'required_post_ids',
						'type'     => 'text',
						'css'      => 'width:100%;',
						'default'  => '',
					),
					array(
						'title'    => __( 'Invisible (hidden) post IDs', 'info-blocks-for-woocommerce' ),
						'desc_tip' => __( 'Comma separated list of post (e.g., product) IDs to hide this info block on.', 'info-blocks-for-woocommerce' ),
						'id'       => 'hidden_post_ids',
						'type'     => 'text',
						'css'      => 'width:100%;',
						'default'  => '',
					),
					array(
						'title'    => __( 'Visible (required) product categories', 'info-blocks-for-woocommerce' ),
						'desc_tip' => __( 'List of product categories to show this info block on.', 'info-blocks-for-woocommerce' ),
						'id'       => 'required_product_cat_ids',
						'type'     => 'select',
						'multiple' => true,
						'class'    => 'chosen_select',
						'css'      => 'width:100%;',
						'default'  => array(),
						'options'  => $this->get_taxonomy_options(
							'product_cat',
							get_post_meta( get_the_ID(), '_' . 'required_product_cat_ids', true )
						),
					),
					array(
						'title'    => __( 'Invisible (hidden) product categories', 'info-blocks-for-woocommerce' ),
						'desc_tip' => __( 'List of product categories to hide this info block on.', 'info-blocks-for-woocommerce' ),
						'id'       => 'hidden_product_cat_ids',
						'type'     => 'select',
						'multiple' => true,
						'class'    => 'chosen_select',
						'css'      => 'width:100%;',
						'default'  => array(),
						'options'  => $this->get_taxonomy_options(
							'product_cat',
							get_post_meta( get_the_ID(), '_' . 'hidden_product_cat_ids', true )
						),
					),
					array(
						'title'    => __( 'Visible (required) product tags', 'info-blocks-for-woocommerce' ),
						'desc_tip' => __( 'List of product tags to show this info block on.', 'info-blocks-for-woocommerce' ),
						'id'       => 'required_product_tag_ids',
						'type'     => 'select',
						'multiple' => true,
						'class'    => 'chosen_select',
						'css'      => 'width:100%;',
						'default'  => array(),
						'options'  => $this->get_taxonomy_options(
							'product_tag',
							get_post_meta( get_the_ID(), '_' . 'required_product_tag_ids', true )
						),
					),
					array(
						'title'    => __( 'Invisible (hidden) product tags', 'info-blocks-for-woocommerce' ),
						'desc_tip' => __( 'List of product tags to hide this info block on.', 'info-blocks-for-woocommerce' ),
						'id'       => 'hidden_product_tag_ids',
						'type'     => 'select',
						'multiple' => true,
						'class'    => 'chosen_select',
						'css'      => 'width:100%;',
						'default'  => array(),
						'options'  => $this->get_taxonomy_options(
							'product_tag',
							get_post_meta( get_the_ID(), '_' . 'hidden_product_tag_ids', true )
						),
					),
				),
			),

			'admin_note_options' => array(
				'title'   => __( 'Admin note', 'info-blocks-for-woocommerce' ),
				'desc'    => __( 'Admin note is visible on the current page only.', 'info-blocks-for-woocommerce' ),
				'context' => 'side',
				'options' => array(
					array(
						'id'      => 'admin_note',
						'type'    => 'textarea',
						'css'     => 'width:100%;height:100px',
						'default' => '',
					),
				),
			),

			'tips' => array(
				'title'          => __( 'Tips', 'info-blocks-for-woocommerce' ),
				'desc'           => '<span class="dashicons dashicons-lightbulb"></span> ' .
					sprintf(
						/* Translators: %s: Shortcode. */
						__( 'You can also display this block with shortcode: %s', 'info-blocks-for-woocommerce' ),
						'<pre>' . '[alg_wc_info_block id="' . get_the_ID() . '"]' . '</pre>'
					),
				'context'        => 'side',
				'options'        => array(),
				'desc_style_tag' => 'span',
			),

		) );
	}

	/**
	 * add_meta_boxes.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 */
	function add_meta_boxes() {
		foreach ( $this->get_options() as $section_id => $section ) {
			add_meta_box(
				'alg-wc-info-blocks-data-' . $section_id,
				$section['title'],
				array( $this, 'display_meta_box' ),
				'alg_wc_info_block',
				( $section['context']  ?? 'advanced' ),
				( $section['priority'] ?? 'default' ),
				array( 'id' => $section_id, 'section' => $section )
			);
		}
	}

	/**
	 * display_meta_box.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 *
	 * @todo    (dev) add positions (priorities) dynamically with AJAX
	 * @todo    (dev) add nonce
	 * @todo    (dev) code refactoring (e.g.: `if ( 'position_options' === $metabox['args']['id'] )`)?
	 * @todo    (dev) `extends WC_Settings_API`?
	 */
	function display_meta_box( $post, $metabox ) {

		$post_id = get_the_ID();
		$html    = '';
		$options = $this->get_options();

		if ( ! empty( $metabox['args']['section']['desc'] ) ) {
			$desc_style_tag = (
				isset( $metabox['args']['section']['desc_style_tag'] ) ?
				$metabox['args']['section']['desc_style_tag'] :
				'em'
			);
			$html .= '<p><' . $desc_style_tag . '>' .
				$metabox['args']['section']['desc'] .
			'</' . $desc_style_tag . '></p>';
		}

		if ( ! empty( $options[ $metabox['args']['id'] ]['options'] ) ) {

			$html .= '<table class="widefat striped">';

			foreach ( $options[ $metabox['args']['id'] ]['options'] as $option ) {

				if ( 'title' === $option['type'] ) {

					$html .= '<tr>';
					$html .= '<th colspan="3" style="text-align: left; font-weight: bold;">' .
						$option['title'] .
					'</th>';
					$html .= '</tr>';

				} else {

					// Option value
					$meta_name = '_' . $option['id'];
					if ( get_post_meta( $post_id, $meta_name ) ) {
						$option_value = get_post_meta( $post_id, $meta_name, true );
					} else {
						$option_value = ( $option['default'] ?? '' );
					}

					// Custom attributes, CSS, input ending
					$css               = ( $option['css'] ?? '' );
					$input_ending      = '';
					$custom_attributes = '';
					if ( ! empty( $option['readonly'] ) ) {
						if ( ! isset( $option['custom_attributes'] ) ) {
							$option['custom_attributes'] = '';
						}
						$option['custom_attributes'] .= ' readonly';
					}

					if ( 'select' === $option['type'] ) {

						if ( isset( $option['multiple'] ) ) {
							$custom_attributes = ' multiple';
							$option_name       = $option['id'] . '[]';
						} else {
							$option_name       = $option['id'];
						}
						if ( isset( $option['custom_attributes'] ) ) {
							$custom_attributes .= ' ' . $option['custom_attributes'];
						}
						$select_options = '';
						foreach ( $option['options'] as $select_option_key => $select_option_value ) {
							if ( is_array( $select_option_value ) ) {
								$select_options .= '<optgroup label="' . $select_option_key . '">';
								foreach ( $select_option_value as $select_option_key_inner => $select_option_value_inner ) {
									$select_option_key_inner = sanitize_key( $select_option_key_inner );
									$select_options .= (
										'<option' .
											' value="' . $select_option_key_inner . '"' .
											' ' . selected(
												in_array( (string) $select_option_key_inner, $option_value, true ),
												true,
												false
											) .
										'>' .
											esc_attr( $select_option_key . ': ' . $select_option_value_inner ) .
										'</option>'
									);
								}
								$select_options .= '</optgroup>';
							} else {
								$select_option_key = sanitize_key( $select_option_key );
								$selected = '';
								if ( is_array( $option_value ) ) {
									foreach ( $option_value as $single_option_value ) {
										$selected = selected( $single_option_value, $select_option_key, false );
										if ( '' != $selected ) {
											break;
										}
									}
								} else {
									$selected = selected( $option_value, $select_option_key, false );
								}
								$select_options .= '<option value="' . $select_option_key . '" ' . $selected . '>' .
									$select_option_value .
								'</option>';
							}
						}

					} elseif ( 'textarea' !== $option['type'] ) {

						$input_ending = (
								' id="' . $option['id'] . '"' .
								' name="' . $option['id'] . '"' .
								' value="' . esc_attr( $option_value ) . '"' .
							'>'
						);
						if ( isset( $option['custom_attributes'] ) ) {
							$input_ending = ' ' . $option['custom_attributes'] . $input_ending;
						}
						if ( isset( $option['placeholder'] ) ) {
							$input_ending = ' placeholder="' . $option['placeholder'] . '"' . $input_ending;
						}

					}

					// Field by type
					switch ( $option['type'] ) {
						case 'price':
							$field_html = '<input' .
								' style="' . $css . '"' .
								' class="short wc_input_price"' .
								' type="number"' .
								' step="0.0001"' .
								$input_ending;
							break;
						case 'date':
							$field_html = '<input' .
								' style="' . $css . '"' .
								' class="input-text"' .
								' display="date"' .
								' type="text"' .
								$input_ending;
							break;
						case 'textarea':
							$field_html = (
								'<textarea' .
									' style="' . $css . '"' .
									' id="' . $option['id'] . '"' .
									' name="' . $option['id'] . '"' .
								'>' .
									esc_html( $option_value ) .
								'</textarea>'
							);
							break;
						case 'select':
							$field_html = (
								'<select' .
									$custom_attributes .
									' class="' . ( $option['class'] ?? '' ) . '"' .
									' style="' . $css . '"' .
									' id="' . $option['id'] . '"' .
									' name="' . $option_name . '"' .
								'>' .
									$select_options .
								'</select>'
							);
							break;
						default:
							$field_html = '<input' .
								' style="' . $css . '"' .
								' class="short"' .
								' type="' . $option['type'] . '"' .
								$input_ending;
							break;
					}

					$html .= '<tr>';
					// Title
					if ( ! empty( $option['title'] ) ) {
						$maybe_desc_tip = (
							! empty( $option['desc_tip'] ) ?
							wc_help_tip( $option['desc_tip'], true ) :
							''
						);
						$html .= '<th style="text-align:left;width:25%;">' .
							$option['title'] . $maybe_desc_tip .
						'</th>';
					}
					// Desc
					if ( ! empty( $option['desc'] ) ) {
						$html .= '<td style="font-style:italic;width:25%;">' .
							$option['desc'] .
						'</td>';
					}
					$html .= '<td>' . $field_html . '</td>';
					$html .= '</tr>';

				}
			}

			$html .= '</table>';

		}

		if ( 'position_options' === $metabox['args']['id'] ) {
			$positions = get_post_meta( $post_id, '_' . 'positions', true );
			if ( ! empty( $positions ) ) {
				$position_options    = $this->get_position_options();
				$position_priorities = get_post_meta( $post_id, '_' . 'position_priorities', true );
				$html .= '<h5>' . __( 'Selected Position(s)', 'info-blocks-for-woocommerce' ) . '</h5>';
				$html .= '<table class="widefat striped">';
				$html .= '<tr>' .
					'<th>' . __( 'Position', 'info-blocks-for-woocommerce' ) . '</th>' .
					'<th>' . __( 'Priority', 'info-blocks-for-woocommerce' ) . '</th>' .
				'</tr>';
				foreach ( $positions as $position ) {
					$position_title = '';
					foreach ( $position_options as $position_section => $position_option ) {
						if ( isset( $position_option[ $position ] ) ) {
							$position_title = $position_section . ': ' . $position_option[ $position ];
							break;
						}
					}
					$position_title = (
						'' !== $position_title ?
						$position_title :
						'<code>' . $position . '</code>'
					);
					$position_value = ( $position_priorities[ $position ] ?? 10 );
					$html .= '<tr>';
					$html .= '<td>' . $position_title . '</td>';
					$html .= '<td>' .
						'<input' .
							' type="number"' .
							' name="position_priorities[' . $position . ']"' .
							' value="' . $position_value . '"' .
						'>' .
						(
							'' !== ( $help_tip = $this->get_known_hooks_and_priorities( $position ) ) ?
							wc_help_tip( $help_tip, true ) :
							''
						) .
					'</td>';
					$html .= '</tr>';
				}
				$html .= '</table>';
			}
			ob_start();
			require_once plugin_dir_path( __FILE__ ) . 'alg-wc-info-blocks-position-priorities.php';
			$html .= ob_get_clean();
		}

		echo wp_kses( $html, $this->get_allowed_html() );
		wp_nonce_field( 'alg_wc_info_block_save', '_alg_wc_info_block_save_nonce' );
	}

	/**
	 * get_allowed_html.
	 *
	 * @version 2.0.0
	 * @since   2.0.0
	 */
	function get_allowed_html() {
		$allowed_html = array(
			'input' => array(
				'type'        => true,
				'id'          => true,
				'name'        => true,
				'class'       => true,
				'style'       => true,
				'value'       => true,
				'step'        => true,
				'checked'     => true,
				'placeholder' => true,
				'display'     => true,
			),
			'select' => array(
				'id'       => true,
				'name'     => true,
				'class'    => true,
				'style'    => true,
				'multiple' => true,
			),
			'optgroup' => array(
				'label' => true,
			),
			'option' => array(
				'value'    => true,
				'selected' => true,
			),
		);
		return array_merge(
			wp_kses_allowed_html( 'post' ),
			$allowed_html
		);
	}

	/**
	 * get_known_hooks_and_priorities.
	 *
	 * @version 1.1.0
	 * @since   1.0.0
	 *
	 * @todo    (dev) re-test this
	 */
	function get_known_hooks_and_priorities( $hook ) {
		if ( ! defined( 'WP_DEBUG' ) || ! WP_DEBUG ) {
			return '';
		}
		$known_hooks = array();
		global $wp_filter;
		if (
			isset( $wp_filter[ $hook ] ) &&
			isset( $wp_filter[ $hook ]->callbacks ) &&
			is_array( $wp_filter[ $hook ]->callbacks )
		) {
			foreach ( $wp_filter[ $hook ]->callbacks as $callback_priority => $callbacks_data ) {
				if ( is_array( $callbacks_data ) ) {
					foreach ( $callbacks_data as $callback_hook => $callback_data ) {
						if ( is_string( $callback_hook ) ) {
							if ( false !== strpos( $callback_hook, 'alg_wc_display_info_blocks' ) ) {
								continue;
							}
							$callback_hook_human_readable = $callback_hook;
							if (
								strlen( $callback_hook_human_readable ) > 32 &&
								is_numeric( $callback_hook_human_readable[0] )
							) {
								$callback_hook_human_readable = substr( $callback_hook_human_readable, 32 );
							}
							$callback_hook_human_readable = str_replace( '_', ' ', $callback_hook_human_readable );
							$known_hooks[] = $callback_hook_human_readable . ' - ' . $callback_priority;
						}
					}
				}
			}
		}
		return (
			! empty( $known_hooks ) ?
			sprintf(
				/* Translators: %s: Hook list. */
				__( 'Current hooks: %s.', 'info-blocks-for-woocommerce' ),
				'<br>* ' . implode( ', <br>* ', $known_hooks )
			) :
			''
		);
	}

	/**
	 * save_meta_boxes.
	 *
	 * @version 2.0.0
	 * @since   1.0.0
	 *
	 * @todo    (dev) validate input (i.e., `is_numeric()` or `is_int()`)?
	 * @todo    (dev) code refactoring (`position_priorities`)?
	 */
	function save_meta_boxes( $post_id, $post, $update ) {

		if (
			$update &&
			(
				! isset( $_POST['_alg_wc_info_block_save_nonce'] ) ||
				! wp_verify_nonce(
					sanitize_text_field( wp_unslash( $_POST['_alg_wc_info_block_save_nonce'] ) ),
					'alg_wc_info_block_save'
				)
			)
		) {
			wp_die( esc_html__( 'Invalid nonce.', 'info-blocks-for-woocommerce' ) );
		}

		foreach ( $this->get_options() as $section_id => $section ) {
			foreach ( $section['options'] as $option ) {
				if ( 'title' === $option['type'] || ! empty( $option['readonly'] ) ) {
					continue;
				}
				$value = $option['default'];
				if ( isset( $_POST[ $option['id'] ] ) ) {
					switch ( $option['type'] ) {
						case 'textarea':
							$value = sanitize_textarea_field( wp_unslash( $_POST[ $option['id'] ] ) );
							break;
						case 'select':
							$value = (
								is_array( $_POST[ $option['id'] ] ) ?
								array_map( 'sanitize_key', $_POST[ $option['id'] ] ) :
								sanitize_key( $_POST[ $option['id'] ] )
							);
							break;
						default: // 'text'
							$value = sanitize_text_field( wp_unslash( $_POST[ $option['id'] ] ) );
					}
				}
				update_post_meta( $post_id, '_' . $option['id'], $value );
			}
		}

		update_post_meta(
			$post_id,
			'_' . 'position_priorities',
			(
				isset( $_POST['position_priorities'] ) ?
				(
					is_array( $_POST['position_priorities'] ) ?
					array_map( 'sanitize_text_field', wp_unslash( $_POST['position_priorities'] ) ) :
					sanitize_text_field( wp_unslash( $_POST['position_priorities'] ) )
				) :
				array()
			)
		);

	}

	/**
	 * add_wc_screen_id.
	 *
	 * @version 1.0.0
	 * @since   1.0.0
	 *
	 * @see     `WC_Admin_Assets::admin_scripts()`
	 */
	function add_wc_screen_id( $screen_ids ) {
		$screen_ids[] = 'alg_wc_info_block';
		return $screen_ids;
	}

}

endif;

return new Alg_WC_Info_Blocks_Meta_Boxes();
