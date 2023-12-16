<?php
/**
 * Standard issue WordPress functions file.
 */

/**
 * Access composer packages.
 */
require 'vendor/autoload.php';

define( 'WORKSFRONT_ROOT', plugins_url( '', __FILE__ ) );
define( 'WORKSFRONT_ROOT_DIR', plugin_dir_path( __FILE__ ) );

$worksfront_vite = new WP_Vite\WP_Vite( 'worksfront', 'http://localhost:4510' );

$worksfront = require 'inc/class-worksfront.php';

require 'inc/worksfront-functions.php';
require 'inc/worksfront-template-hooks.php';
require 'inc/worksfront-template-functions.php';
$worksfront_admin = require 'inc/admin/class-worksfront-admin.php';

if ( worksfront_is_woocommerce_activated() ) {

	require 'inc/woocommerce/worksfront-woocommerce-functions.php';
	require 'inc/woocommerce/worksfront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/worksfront-woocommerce-template-functions.php';
}
