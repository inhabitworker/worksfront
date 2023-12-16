<?php
/**
 * Template hooks bring the component pieces from template functions, and hook them up.
 *
 * @package worksfront
 */

/**
 * Header
 */
add_action( 'worksfront_header', 'worksfront_header_open', 0 );
add_action( 'worksfront_header', 'worksfront_identity', 20 );
add_action( 'worksfront_header', 'worksfront_main_navigation', 25 );
// WooCommerce header features hooked in woocommerce template hooks.
add_action( 'worksfront_header', 'worksfront_header_close', 41 );

/**
 * Pre-content
 */
add_action( 'worksfront_before_content', 'worksfront_before_content', 0 );
add_action( 'worksfront_after_content', 'worksfront_after_content', 99 );

/** 
 * Blog/index top.
 */
add_action( 'worksfront_blog_top', 'worksfront_blog_header', 1 );

/**
 * Post/article
 */

add_action( 'worksfront_before_post', 'worksfront_post_head', 0 );
add_action( 'worksfront_before_post', 'worksfront_post_open', 1 );
add_action( 'worksfront_after_post', 'worksfront_post_close', 1 );


/**
 * Footer
 */
add_action( 'worksfront_footer', 'worksfront_footer_open', 0 );
// Links?.
add_action( 'worksfront_header', 'worksfront_footer_widgets', 30 );
add_action( 'worksfront_footer', 'worksfront_footer_close', 41 );
