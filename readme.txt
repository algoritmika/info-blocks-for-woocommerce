=== Add Custom Messages Anywhere in WooCommerce ===
Contributors: algoritmika, thankstoit, anbinder, karzin
Tags: woocommerce, info, info block, woo commerce
Requires at least: 4.4
Tested up to: 6.8
Stable tag: 2.0.2
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Add any information blocks to your WooCommerce store, from product pages to cart and checkout, display tailored messages, product metadata, etc.

== Description ==

Add any information blocks to your WooCommerce store, from product pages to cart and checkout, display tailored messages, product metadata, or store options using dynamic content and shortcodes.

The **Add Custom Messages Anywhere in WooCommerce** plugin allows you to enhance your WooCommerce site by adding customized content or "info blocks" to numerous positions throughout the platform, offering you a straightforward way to enrich your customer's browsing and shopping experience.

You have the freedom to create multiple info blocks, each with distinctive content, positioning, and visibility settings, to tailor the shopping experience to suit your business strategy precisely.

Whether it's spotlighting promotional offers or displaying static reassuring messages like money-back guarantees, the plugin provides an extensive range of positions to place these info blocks, from general settings to specific locations within product tabs. This allows for strategic placement of valuable information where it will have the highest impact.

### 🚀 Dynamically Show Content Across Your Store ###

Create & manage custom information blocks/sections within your WooCommerce store, craft and strategically place various types of information – whether promotional messages, special guarantees, or product-related details – across multiple locations in your store.

This feature empowers you to enhance the shopping experience by providing relevant and timely information at key points in the customer journey, such as near product prices, within cart and checkout pages, and on order confirmation screens.

### 🚀 Customizable Text Blocks for Promotions and Information ###

Easily add static text blocks, like a "30 days money return guarantee", "Excellent customer service", "24/7 chat support" to product pages or global store areas.

This feature is ideal for highlighting special offers or important information across your store.

### 🚀 Add Info About Product Sales and Metadata ###

Use the `[alg_wc_ib_get_post_meta]` shortcode to display product-related metadata like total sales numbers.

This option allows you to offer important info to customers during their purchase journey, enhancing product credibility and transparency.

### 🚀 Flexible Position/Priority Options ###

Control where the blocks appear by defining the position and priority for each, the plugin offers a wide range of positioning options for info blocks.

Select to show blocks on various positions, from before product prices to cart and checkout pages, ensuring that your messages are seen at the most impactful points in the customer journey.

### 🚀 Utilization of Shortcodes for Extended Functionality ###

Leverage shortcodes like `[alg_wc_ib_get_option]` to display site options (like an email) or product meta values (like an image or price), adding a layer of dynamic content to your store's info blocks.

### ℹ How Does It Work? ###

* Create a new info block via "WooCommerce > Info Blocks > Add New" from your admin dashboard.
* For this newly created block, you must set: title (visible to admin only), content, and position.
* Optionally, you can set visibility options (e.g., show info block for selected products only).
* You can create as many different info blocks as you need. Each block will have its own content, position, visibility, etc.

### ✅ Usage Example #1 ###

Add static text (e.g.: "30 days money return guarantee!") after "Add to cart" button for all products.

* Add new block via "WooCommerce > Info Blocks > Add New"
* Set block's content to `30 days money return guarantee!`
* Set block's position to `Single product: Inside single product summary` and position's priority to `39`

### ✅ Usage Example #2 ###

Add total sales number to the frontend meta section for all products.

* Add new block via "WooCommerce > Info Blocks > Add New"
* Set block's content to `Total sales: [alg_wc_ib_get_post_meta key="total_sales"]`
* Set block's position to `Single product: Product meta end`

### ✅ Usage Example #3 ###

Add static text (e.g.: "Free shipping for all orders over $35!") to cart and checkout pages.

* Add new block via "WooCommerce > Info Blocks > Add New"
* Set block's content to `Free shipping for all orders over $35!`
* Set block's positions to `Cart: Before cart table` and `Checkout: Before order review`

### ✅ Usage Example #4 ###

Add static text (e.g.: "Only today: ") before the price for all products.

* Add new block via "WooCommerce > Info Blocks > Add New"
* Set block's content to `Only today:&nbsp;` (`&nbsp;` is a "non-breaking space" symbol)
* Set block's position to `General: Before product price`

### ℹ Available Positions ###

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

### ℹ Visibility ###

* You can set **visibility** options for each block: visible/invisible products/categories/tags.

### ℹ Shortcodes ###

* `[alg_wc_ib_get_post_meta]` displays product's meta value, e.g.: `[alg_wc_ib_get_post_meta key="total_sales"]`
* `[alg_wc_ib_get_option]` displays site's option, e.g.: `[alg_wc_ib_get_option option="admin_email"]`

### ℹ More ###

* The plugin is **"High-Performance Order Storage (HPOS)"** compatible.

### 🗘 Feedback ###

* We are open to your suggestions and feedback. Thank you for using or trying out one of our plugins!
* Head to the plugin [GitHub Repository](https://github.com/thanks-to-it/info-blocks-for-woocommerce) to find out how you can pitch in.

== Installation ==

1. Upload the entire plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the "Plugins" menu in WordPress.
3. Start by visiting plugin settings at "WooCommerce > Info Blocks".

== Frequently Asked Questions ==

= How can I debug the output? =

Add `alg_wc_ib_debug` to the URL, e.g.: `https://example.com/product/my-awesome-product/?alg_wc_ib_debug`

= Are there any filters available for the developers? =

Yes, `alg_wc_info_blocks_positions` and `alg_wc_info_blocks_options`.

== Screenshots ==

1. Info block example - Backend
2. Info block example - Frontend

== Changelog ==

= 2.0.2 - 26/05/2025 =
* Dev - Display raw info block content.
* Dev - Developers - Add `alg_wc_info_blocks_display_sanitize_content` filter.

= 2.0.1 - 23/05/2025 =
* readme.txt updated.

= 2.0.0 - 15/05/2025 =
* Dev - Visibility (product, category, tag) options moved to the free version.
* Dev - Security - Output escaped.
* Dev - Security - Input sanitized.
* Dev - Security - Nonces added.
* Dev - "High-Performance Order Storage (HPOS)" compatibility.
* Dev - PHP v8.2 compatibility (dynamic properties).
* Dev - Admin settings descriptions updated.
* Dev - Code refactoring.
* Dev - Coding standards improved.
* WC tested up to: 9.8.
* Tested up to: 6.8.

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
