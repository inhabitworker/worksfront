<?php
/**
 * Vite Class
 */

namespace Includes;

/**
 * The Vite class that handles assets processed with vite.
 */
class Vite {
	/**
	 * Vite dev server host.
	 *
	 * @var string
	 */
	public $vite_host = 'http://localhost:4510/dist/';
	/**
	 * Development environment indicator.
	 *
	 * @var bool
	 */
	public $development;
	/**
	 * Theme name.
	 *
	 * @var string
	 */
	public $theme;
	/**
	 * The path to operate from, different depending on environment.
	 *
	 * @var string
	 */
	public $base_path;

	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->development = ( isset( $_ENV['mode'] ) && 'dev' === $_ENV['mode'] );

		$uri         = get_theme_file_uri();
		$offset      = strripos( $uri, '/' );
		$this->theme = substr( $uri, $offset + 1 );

		$this->base_path = '/wp-content/themes/' . $this->theme . '/dist/';
	}

	/**
	 * Hook to use/register vite assets.
	 *
	 * @throws \Exception Not implemented.
	 */
	public function use_vite() {
		throw new \Exception( 'Vite asset handling not implemented.' );
	}
}
