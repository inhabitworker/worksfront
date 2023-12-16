<?php
/**
 * Hook up woocommerce-centric template pieces.
 */

/**
 * Header
 *
 * @see worksfrontfront_header_woocommerce()
 */
// add_action( 'worksfront_header', 'worksfront_header_woocommerce', 30 );

/**
 * Layout.
 *
 * @see  worksfront_before_content()
 * @see  worksfront_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  worksfront_shop_messages()
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_before_main_content', 'worksfront_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'worksfront_after_content', 10 );

add_action( 'worksfront_shop_top', 'worksfront_shop_messages', 15 );
add_action( 'worksfront_blog_top', 'worksfront_shop_messages', 15 );

add_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 30 );

add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
