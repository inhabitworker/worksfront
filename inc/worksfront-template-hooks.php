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
add_action( 'worksfront_header', 'worksfront_header_widgets', 30 );
add_action( 'worksfront_header', 'worksfront_header_close', 41 );

/**
 * Footer
 */
add_action( 'worksfront_footer', 'worksfront_footer_open', 0 );
add_action( 'worksfront_footer', 'worksfront_links', 20 );
add_action( 'worksfront_footer', 'worksfront_footer_close', 41 );
