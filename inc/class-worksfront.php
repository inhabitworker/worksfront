<?php
/**
 * Worksfront Class
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main worksfront class.
 */
class Worksfront {

	/**
	 * WooCommerce class instance.
	 *
	 * @var Worksfront_WooCommerce
	 */
	public $woocommerce;

	/**
	 * Class constructor
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

		if ( class_exists( 'WooCommerce' ) ) {
			$this->woocommerce = require 'woocommerce/class-worksfront-woocommerce.php';
		}

		$this->activate();
	}

	public function activate() {
		add_action( 'wp_enqueue_scripts', array( $this, 'vital' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'vital' ) );
	}

	public function vital() {
		global $worksfront_vite;
		$worksfront_vite->use_vite_asset( 'src/main.ts' );
	}

	/**
	 * Set up the theme through WordPress, registering support for various feautres.
	 */
	public function setup() {

		add_theme_support( 'title-tag' );
		add_theme_support( ' post-thumbnails' );

		add_theme_support(
			'html5',
			array(
				'comment-list',
				'comment-form',
				'search-form',
				'gallery',
				'caption',
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
			* Other common functions you might add here:
			* Post formats (a la Tumblr style)
			* Content width
			* Custom Theme background (color or image)
			* Custom Header
			* Custom Logo
			* Additional image sizes
		*/

		add_theme_support( 'menus' );

		register_nav_menus(
			array(
				'main'       => 'Main Navigation',
				'additional' => 'Additional Navigation',
			)
		);

		add_theme_support( 'custom-logo' );
	}

	/**
	 * Register widget areas (sidebars - not necessarily a "sidebar").
	 *
	 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
	 */
	public function widgets_init() {
		$sidebar_args['footer'] = array(
			'name'        => __( 'Footer', 'worksfront' ),
			'id'          => 'footer-widgets',
			'description' => __( 'Widgets for the footer area.', 'worksfront' ),
		);

		$sidebar_args = apply_filters( 'worksfront_sidebar_args', $sidebar_args );

		/**
		 * Determining wrappers for widgets. In original storefront theme, I think this is providing dynamically defined hooks per widget, for later/user access.
		 */
		foreach ( $sidebar_args as $sidebar => $args ) {
			$widget_tags = array(
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
			);

			$filter_hook = sprintf( 'storefront_%s_widget_tags', $sidebar );
			$widget_tags = apply_filters( $filter_hook, $widget_tags );

			if ( is_array( $widget_tags ) ) {
				register_sidebar( $args + $widget_tags );
			}
		}
	}

	/**
	 * Enqueue scripts and styles (stylesheets, icons, fonts, etc).
	 */
	public function enqueue() {
		wp_register_style( 'stylesheet', get_template_directory_uri() . '/style.css', null, 1, 'all' );
		wp_enqueue_style( 'stylesheet' );

		wp_enqueue_script( 'wc-cart-fragments' );
	}

	/**
	 * Code elected not to thieve from original storefront theme:
	 *
	 * - Debug conditional enqueueing of minified Js.
	 * - Accommodation for WooCommerce homepage (template-homepage), a page that diverges most significantly from the simple WordPress process.
	 * - Body class variation for different potential layouts.
	 * - Child theme scripts loading.
	 * - Loading of google fonts.
	 */
}

return new worksfront();
