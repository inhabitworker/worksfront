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

require 'walkers/class-worksfront-walker-nav-menu.php';

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
	// Sticking with an explicit single menu for now.
	$cart_count = WC()->cart->get_cart_contents_count();
	$cart_count_string = $cart_count  === 0 ? '' : '(' . $cart_count . ')' ;
	?>
	<nav id="main-menu">
		<a id="menu-toggle" href="javascript:void(0);" onclick="menuToggle()">&#9776;</a>
		<a class="blog" href=<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>> <span class="icon"> &#128221; </span> Blog </a>
		<a class="shop" href=<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?> > <span class="icon"> &#127978; </span> Shop </a>
		<a class="account" href=<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>> <span class="icon"> &#128100; </span> Account </a>
		<a class="basket" href=<?php echo esc_url( wc_get_page_permalink( 'cart' ) ); ?> > <span class="icon"> &#128722; </span> Cart <?php echo $cart_count_string; ?></a>
	</nav>

	<?php
	/** A wp_nav_menu(
		array(
			'theme_location' => 'main',
			'container'      => 'nav',
			'items_wrap'     => '%3$s',
			'walker'         => new Worksfront_Walker_Nav_Menu(),
		)
	);
	 **/
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
	echo '</main>';
}

/**
 * Open footer wrapper.
 */
function worksfront_footer_open() {
	echo '<footer>';
}

/**
 * Header widget region.
 */
function worksfront_footer_widgets() {
	if ( is_active_sidebar( 'footer-widgets' ) ) {
		?>
			<div class="footer-widgets">
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
			</div>
		<?php
	}
}

/**
 * Close footer wrapper.
 */
function worksfront_footer_close() {
	echo '</footer>';
}

/**
 * Custom terms (categories/tags) display, adds colour.
 *
 * @param string $type The type of term desired.
 */
function worksfront_terms( $type = 'tags' ) {
	$is_tags = 'tags' === $type ? true : false;

	$terms  = $is_tags ? get_the_tags() : get_the_category();
	$before = $is_tags ? 'Tags:' : 'Categories:';
	$empty  = 'n/a'; // $is_tags ? 'unagged' : 'uncategorised';

	?>
	<div class="<?php echo $type; ?>">
	<span class="pre"><?php echo esc_attr( $before ); ?></span>
	<?php

	if ( $terms ) {
		foreach ( $terms as $term ) {
			$colour = get_term_meta( $term->term_id, 'worksfront_colour', true );
			$link   = $is_tags ? get_tag_link( $term ) : get_category_link( $term );

			echo ' <a href="' . $link . '" style="background-color: ' . $colour . '" >' . $term->name . '</a>';
		}
	} else {
		echo esc_attr( $empty );
	}
	?>
	</div>
	<?php
}

/**
 * Framing and functions for blog pages.
 */
function worksfront_blog_header() {
	?>
	<div class="blog-heading">
		<?php get_search_form(); ?>
	</div>
	<?php
}

/**
 * Post head with title, metadata and assoc terms links.
 */
function worksfront_post_head() {
	if( is_product() ) return;
	$post_id = get_the_ID();
	?>
	<div class="post-head-container">
		<h1> <?php the_title(); ?> </h1>
		<div class="post-meta-container">
			<?php the_date( null, '<div class="date"><span class="pre">Posted:</span>', '</div>' ); ?>
			<?php worksfront_terms( 'categories' ); ?>
			<?php worksfront_terms( 'tags' ); ?>
		</div>
	</div>
	<?php
}

/**
 * Open single post container.
 */
function worksfront_post_open() {
	$class = is_product() ? 'product' : 'blog';
	?>
		<article class="<?php echo $class; ?>">
	<?php
}

/**
 * Close single post container.
 */
function worksfront_post_close() {
	?>
		</article>
	<?php
}


