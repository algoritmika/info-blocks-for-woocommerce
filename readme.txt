=== Info Blocks for WooCommerce ===
Contributors: wpcodefactory, omardabbas, karzin, anbinder, algoritmika, kousikmukherjeeli
Tags: woocommerce, info, info block, woo commerce
Requires at least: 4.4
Tested up to: 6.6
Stable tag: 1.4.4
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Info blocks for WooCommerce.

== Description ==

**Info Blocks for WooCommerce** plugin lets you add info blocks to numerous positions in WooCommerce.

### &#9989; Usage Example #1 ###

Add static text (e.g.: "30 days money return guarantee!") after "Add to cart" button for all products.

* Add new block via "WooCommerce > Info Blocks > Add New"
* Set block's content to `30 days money return guarantee!`
* Set block's position to `Single product: Inside single product summary` and position's priority to `39`

### &#9989; Usage Example #2 ###

Add total sales number to the frontend meta section for all products.

* Add new block via "WooCommerce > Info Blocks > Add New"
* Set block's content to `Total sales: [alg_wc_ib_get_post_meta key="total_sales"]`
* Set block's position to `Single product: Product meta end`

### &#9989; Usage Example #3 ###

Add static text (e.g.: "Free shipping for all orders over $35!") to cart and checkout pages.

* Add new block via "WooCommerce > Info Blocks > Add New"
* Set block's content to `Free shipping for all orders over $35!`
* Set block's positions to `Cart: Before cart table` and `Checkout: Before order review`

### &#9989; Usage Example #4 ###

Add static text (e.g.: "Only today: ") before the price for all products.

* Add new block via "WooCommerce > Info Blocks > Add New"
* Set block's content to `Only today:&nbsp;` (`&nbsp;` is a "non-breaking space" symbol)
* Set block's position to `General: Before product price`

### &#9989; Available Positions ###

**General**

* Before product price
* After product price
* Instead of product price
* On empty product price

**Single product**

* Before single product
* Before single product summary
* Inside single product summary
* After single product summary
* After single product
* Before add to cart form
* Before add to cart button
* After add to cart button
* After add to cart form
* Product meta start
* Product meta end

**Single product tabs**

* Description: Heading start
* Description: Heading end
* Description: Instead of heading
* Description: Content start
* Description: Content end
* Description: Instead of content
* Additional information: Heading start
* Additional information: Heading end
* Additional information: Instead of heading
* Additional information: Content end

**Product archives**

* Before product
* Before product title
* Inside product title
* After product title
* After product

**Cart**

* Before cart
* Before cart table
* Before cart contents
* Cart contents
* Cart coupon
* Cart actions
* After cart contents
* After cart table
* Cart collaterals
* After cart
* Before cart totals
* Cart totals: Before shipping
* Cart totals: After shipping
* Cart totals: Before order total
* Cart totals: After order total
* Proceed to checkout
* After cart totals
* Before shipping calculator
* After shipping calculator
* If cart is empty

**Mini cart**

* Before mini cart
* Before buttons
* After mini cart

**Checkout**

* Before checkout form
* Before customer details
* Billing
* Shipping
* After customer details
* Before order review
* Order review
* After order review
* After checkout form
* Before checkout shipping form
* After checkout shipping form
* Before order notes
* After order notes
* Before checkout billing form
* After checkout billing form
* Before checkout registration form
* After checkout registration form
* Review order: Before cart contents
* Review order: After cart contents
* Review order: Before shipping
* Review order: After shipping
* Review order: Before order total
* Review order: After order total
* Order Received (Thank You) page

### &#9989; Shortcodes ###

* `[alg_wc_ib_get_post_meta]` displays product's meta value, e.g.: `[alg_wc_ib_get_post_meta key="total_sales"]`
* `[alg_wc_ib_get_option]` displays site's option, e.g.: `[alg_wc_ib_get_option option="admin_email"]`

### &#127942; Premium Version ###

[Premium plugin version](https://wpfactory.com/item/info-blocks-for-woocommerce/) allows you to set additional **visibility** options for each block.

### &#128472; Feedback ###

* We are open to your suggestions and feedback. Thank you for using or trying out one of our plugins!
* [Visit plugin site](https://wpfactory.com/item/info-blocks-for-woocommerce/).

== Installation ==

1. Upload the entire plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Start by visiting plugin settings at "WooCommerce > Info Blocks".

== Changelog ==

= 1.4.4 - 30/07/2024 =
* WC tested up to: 9.1.
* Tested up to: 6.6.

= 1.4.3 - 26/09/2023 =
* WC tested up to: 8.1.
* Tested up to: 6.3.
* Update plugin icon, banner.

= 1.4.2 - 18/06/2023 =
* WC tested up to: 7.8.
* Tested up to: 6.2.

= 1.4.1 - 13/11/2022 =
* Tested up to: 6.1.
* WC tested up to: 7.1.
* Readme.txt updated.
* Deploy script added.

= 1.4.0 - 19/10/2021 =
* Dev - `[alg_wc_info_block]` shortcode added.
* Dev - "Tips" meta box added.
* Dev - Code refactoring.
* WC tested up to: 5.8.

= 1.3.0 - 07/08/2021 =
* Dev - Positions - "General: Before product price" block position added.
* Dev - Positions - "General: After product price" block position added.
* Dev - Positions - "General: Instead of product price" block position added.
* Dev - Positions - "General: On empty product price" block position added.
* Dev - Positions - "Single product tabs: Description: Heading start" block position added.
* Dev - Positions - "Single product tabs: Description: Heading end" block position added.
* Dev - Positions - "Single product tabs: Description: Instead of heading" block position added.
* Dev - Positions - "Single product tabs: Description: Content start" block position added.
* Dev - Positions - "Single product tabs: Description: Content end" block position added.
* Dev - Positions - "Single product tabs: Description: Instead of content end" block position added.
* Dev - Positions - "Single product tabs: Additional information: Heading start" block position added.
* Dev - Positions - "Single product tabs: Additional information: Heading end" block position added.
* Dev - Positions - "Single product tabs: Additional information: Instead of heading" block position added.
* Dev - Positions - "Single product tabs: Additional information: Content end" block position added.
* Dev - Code refactoring.
* WC tested up to: 5.5.
* Tested up to: 5.8.

= 1.2.0 - 29/06/2021 =
* Dev - Visibility - "Required/hidden product categories/tags" options added.
* Dev - Plugin is initialized on the `plugins_loaded` action now.
* Dev - Code refactoring.
* WC tested up to: 5.4.
* Tested up to: 5.7.

= 1.1.1 - 15/02/2021 =
* Dev - Localisation - `load_plugin_textdomain()` moved to the `init` hook.
* Dev - Settings - Descriptions updated.
* WC tested up to: 5.0.
* Tested up to: 5.6.

= 1.1.0 - 02/01/2020 =
* Dev - Code refactoring and clean up.
* WC tested up to: 3.8.
* Tested up to: 5.3.

= 1.0.1 - 07/02/2019 =
* Dev - Meta boxes - Sanitizing input.
* Dev - Meta boxes - Escaping output.

= 1.0.0 - 24/12/2018 =
* Initial Release.

== Upgrade Notice ==

= 1.0.0 =
This is the first release of the plugin.
