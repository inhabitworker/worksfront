<?php
/**
 * Header component appearing across website.
 */

?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> >
		<?php wp_body_open(); ?>
		<?php do_action( 'worksfront_header' ); ?>
		<?php do_action( 'worksfront_before_content' ); ?>
		<?php do_action( 'worksfront_content_top' ); ?>
