<?php
/**
 * Standard issue WordPress functions file.
 */

$worksfront = require 'inc/class-worksfront.php';

require 'inc/worksfront-functions.php';
require 'inc/worksfront-template-hooks.php';
require 'inc/worksfront-template-functions.php';

if ( worksfront_is_woocommerce_activated() ) {
	// Add woocommerce class to worksfront class instance. Apparently deprecated and should probably be added in constructor or something.
	$worksfront->woocommerce = require 'inc/woocommerce/class-worksfront-woocommerce.php';

	require 'inc/woocommerce/worksfront-woocommerce-functions.php';
	require 'inc/woocommerce/worksfront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/worksfront-woocommerce-template-functions.php';
}
