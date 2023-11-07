<?php
/**
 * General functions for the theme.
 */

/**
 * Check if WooCommerce is enabled via existence of class.
 */
function worksfront_is_woocommerce_activated() {
	return class_exists( 'WooCommerce' ) ? true : false;
}

/**
 * Call a shortcode function by tag name.
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function worksfront_do_shortcode( $tag, array $atts = array(), $content = null ) {
	global $shortcode_tags;

	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
		return false;
	}

	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}
