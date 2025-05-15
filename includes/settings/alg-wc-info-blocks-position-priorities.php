<?php
/**
 * Add Custom Messages Anywhere in WooCommerce - Position Priorities
 *
 * @version 2.0.0
 * @since   2.0.0
 *
 * @author  Algoritmika Ltd
 */

defined( 'ABSPATH' ) || exit;

?>
<details style="margin-top: 10px;">
	<summary style="cursor: pointer;"><strong id="positions"><?php esc_html_e( 'Position priorities', 'info-blocks-for-woocommerce' ); ?></strong></summary>
	<p><?php echo wp_kses_post( __( 'Below you can see all available info block positions. For each position - existing/known WooCommerce hooks and priorities are listed (this is not a final list, as your theme or other plugins may add their own hooks). So, for example, if you would need to output some info block on "Inside single product summary" right after product title, you would need to choose <code>Inside single product summary</code> position and set priority to <code>6</code>.', 'info-blocks-for-woocommerce' ) ); ?></p>
	<h4 id="positions-single-product"><?php esc_html_e( 'Single product', 'info-blocks-for-woocommerce' ); ?></h4>
	<table class="widefat striped fixed">
		<tbody>
			<tr>
				<td><em><?php esc_html_e( 'Position', 'info-blocks-for-woocommerce' ); ?></em></td>
				<td><em><?php esc_html_e( 'Existing/known WC hooks and priorities', 'info-blocks-for-woocommerce' ); ?></em></td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before single product', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
						<tr>
							<td><strong><?php esc_html_e( 'Output all notices', 'info-blocks-for-woocommerce' ); ?></strong></td>
							<td>10</td>
						</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
			<th><?php esc_html_e( 'Before single product summary', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Show product sale flash', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Show product images', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>20</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Inside single product summary', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Title', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>5</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Rating', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Price', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Excerpt', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>20</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Add to cart', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>30</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Meta', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>40</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Sharing', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>50</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After single product summary', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Output product data tabs', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Upsell display', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>15</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Output related products', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>20</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After single product', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before add to cart form', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before add to cart button', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After add to cart button', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After add to cart form', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Product meta start', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Product meta end', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
		</tbody>
	</table>
	<h4 id="positions-product-archives"><?php esc_html_e( 'Product archives', 'info-blocks-for-woocommerce' ); ?></h4>
	<table class="widefat striped fixed">
		<tbody>
			<tr>
				<td><em><?php esc_html_e( 'Position', 'info-blocks-for-woocommerce' ); ?></em></td>
				<td><em><?php esc_html_e( 'Existing/known WC hooks and priorities', 'info-blocks-for-woocommerce' ); ?></em></td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before product', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Product link open', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before product title', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Show product loop sale flash', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Product thumbnail', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Inside product title', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Product title', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After product title', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Rating', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>5</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Price', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After product', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Product link close', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>5</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Add to cart', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<h4 id="positions-cart"><?php esc_html_e( 'Cart', 'info-blocks-for-woocommerce' ); ?></h4>
	<table class="widefat striped fixed">
		<tbody>
			<tr>
			<td><em><?php esc_html_e( 'Position', 'info-blocks-for-woocommerce' ); ?></em></td>
			<td><em><?php esc_html_e( 'Existing/known WC hooks and priorities', 'info-blocks-for-woocommerce' ); ?></em></td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before cart', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Output all notices', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before cart table', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before cart contents', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Cart contents', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Cart coupon', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Cart actions', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After cart contents', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After cart table', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Cart collaterals', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Cross sell display', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Cart totals', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After cart', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before cart totals', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Cart totals: Before shipping', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Cart totals: After shipping', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Cart totals: Before order total', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Cart totals: After order total', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Proceed to checkout', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Button proceed to checkout', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>20</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After cart totals', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before shipping calculator', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After shipping calculator', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'If cart is empty', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Output all notices', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>5</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'WC empty cart message', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<h4 id="positions-mini-cart"><?php esc_html_e( 'Mini cart', 'info-blocks-for-woocommerce' ); ?></h4>
	<table class="widefat striped fixed">
		<tbody>
			<tr>
				<td><em><?php esc_html_e( 'Position', 'info-blocks-for-woocommerce' ); ?></em></td>
				<td><em><?php esc_html_e( 'Existing/known WC hooks and priorities', 'info-blocks-for-woocommerce' ); ?></em></td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before mini cart', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before buttons', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After mini cart', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
		</tbody>
	</table>
	<h4 id="positions-checkout"><?php esc_html_e( 'Checkout', 'info-blocks-for-woocommerce' ); ?></h4>
	<table class="widefat striped fixed">
		<tbody>
			<tr>
				<td><em><?php esc_html_e( 'Position', 'info-blocks-for-woocommerce' ); ?></em></td>
				<td><em><?php esc_html_e( 'Existing/known WC hooks and priorities', 'info-blocks-for-woocommerce' ); ?></em></td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before checkout form', 'info-blocks-for-woocommerce' ); ?></th>
			<td>
				<table>
					<tbody>
						<tr>
							<td><strong><?php esc_html_e( 'Checkout login form', 'info-blocks-for-woocommerce' ); ?></strong></td>
							<td>10</td>
						</tr>
						<tr>
							<td><strong><?php esc_html_e( 'Checkout coupon form', 'info-blocks-for-woocommerce' ); ?></strong></td>
							<td>10</td>
						</tr>
						<tr>
							<td><strong><?php esc_html_e( 'Output all notices', 'info-blocks-for-woocommerce' ); ?></strong></td>
							<td>10</td>
						</tr>
					</tbody>
				</table>
			</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before customer details', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Billing', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Shipping', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After customer details', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before order review', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Order review', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Order review', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
							<tr>
								<td><strong><?php esc_html_e( 'Checkout payment', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>20</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After order review', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After checkout form', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before checkout shipping form', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After checkout shipping form', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before order notes', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After order notes', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before checkout billing form', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After checkout billing form', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Before checkout registration form', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'After checkout registration form', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Review order before cart contents', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Review order after cart contents', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Review order before shipping', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Review order after shipping', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Review order before order total', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Review order after order total', 'info-blocks-for-woocommerce' ); ?></th>
				<td>-</td>
			</tr>
			<tr>
				<th><?php esc_html_e( 'Order Received (Thank You) page', 'info-blocks-for-woocommerce' ); ?></th>
				<td>
					<table>
						<tbody>
							<tr>
								<td><strong><?php esc_html_e( 'Order details table', 'info-blocks-for-woocommerce' ); ?></strong></td>
								<td>10</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</details>
<?php
