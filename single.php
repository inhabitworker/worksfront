<?php
/**
 * Post page.
 */

get_header();



while ( have_posts() ) :
	the_post();

	do_action( 'worksfront_before_post' );

	the_content();

	do_action( 'worksfront_after_post' );
endwhile;

get_footer();
