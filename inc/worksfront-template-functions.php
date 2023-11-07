<?php
/**
 * Template functions, to be provided to WordPress via hooks.
 * This gives a programmatically constructed template.
 *
 * In the original storefront theme, we can see these take charge of broader site layout components:
 * - Generic post/page content
 * - Navigation
 * - Header
 * - etc.
 *
 * WooCommerce templating governed either by the originating plugin or specified in /woocommerce specific functions, involving woocommerce 'hijacking' via before_content hook.
 *
 * @package worksfront
 */

/**
 * Open header template.
 */
function worksfront_header_open() {
	echo '<header>';
}

/**
 * Header identity component.
 */
function worksfront_identity() {
	?>
		<div>
			<?php
			if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
				$logo = get_custom_logo();
				$html = '<div class="identity">' . $logo . '</div>';
			} else {
				$html = '<div class="identity"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></div>';
			}

			echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</div>
	<?php
}

/**
 * The main navigation bar in the header.
 */
function worksfront_main_navigation() {
	?>
		<nav class="main">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main',
					)
				);
			?>
		</nav>
	<?php
}

/**
 * Header widget region.
 */
function worksfront_header_widgets() {
	if ( is_active_sidebar( 'header-widgets' ) ) {
		?>
			<div class="header-widgets">
				<?php dynamic_sidebar( 'header-widgets' ); ?>
				<span> widget </span>
			</div>
		<?php
	}
}

/**
 * Close header template.
 */
function worksfront_header_close() {
	echo '</header>';
}

/**
 * Main content wrapper.
 */
function worksfront_before_content() {
	echo '<main>';
}

/**
 * Main content wrapper close.
 */
function worksfront_after_content() {
	echo '<main>';
}

/**
 * Open footer wrapper.
 */
function worksfront_footer_open() {
	echo '<footer>';
}

/**
 * Social links with icons.
 */
function worksfront_links() {
	echo '<span>links here</span>';
}

/**
 * Close footer wrapper.
 */
function worksfront_footer_close() {
	echo '</footer>';
}