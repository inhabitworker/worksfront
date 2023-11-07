<?php
/**
 * WooCommerce-centric template components.
 *
 * Anything involving:
 * - Specialized homepage (template-homepage)
 * - Product content/'posts'
 * - Sorting
 * - Category
 * - Cart
 *
 * There's even some pagination hackery, ugly integration stuff.
 *
 * Most important to note perhaps is that it seems most of the basic templatings, for product basics etc, is left to those provided/injected by the originating plugin.
 *
 * @link https://github.com/woocommerce/woocommerce/tree/7.9.0/plugins/woocommerce/templates
 */

/**
 * Cart with account link for header.
 *
 * The cart widget originates in the main WooCommerce plugin:
 * > woocommerce/plugins/woocommerce/includes/widgets/class-wc-widget-cart.php
 *
 * Which is registered by function "wc_register_widgets" applied to standard "widgets_init":
 * > woocommerce/plugins/woocommerce/includes/wc-widget-functions.php
 */
function worksfront_header_woocommerce() {
	if ( worksfront_is_woocommerce_activated() ) {
		if ( is_cart() ) {
			$class = 'active';
		}
		?>
		<nav>
			<div>
				<a href="/account">Account</a>
			</div>
			<div>
				<a href="/cart"> Cart </a>
			</div>
		</nav>
			<?php
	}
}

/**
 * Storefront shop messages
 *
 * @uses    worksfront_do_shortcode
 */
function storefront_shop_messages() {
	if ( ! is_checkout() ) {
		echo wp_kses_post( worksfront_do_shortcode( 'woocommerce_messages' ) );
	}
}
