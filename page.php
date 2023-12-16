<?php
/**
 * Static page, and WooCommerce injection page.
 */

get_header();
do_action( 'worksfront_shop_top' );

while ( have_posts() ) :
	the_post();

	the_content();
endwhile;

get_footer();
