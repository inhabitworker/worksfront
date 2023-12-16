<?php
/**
 * Admin features/configuration.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class for theme administration.
 */
class Worksfront_Admin {
	/**
	 * Theme features.
	 *
	 * @var object $features Theme features class instances.
	 */
	public $features = array();

	/**
	 * Class constructor.
	 */
	public function __construct() {
		// Add discrete features and initialize.
		add_action( 'admin_menu', array( $this, 'init' ) );
		// $this->features[] = require 'class-worksfront-colours.php';
		// $this->features[] = require 'class-worksfront-3d.php';
	}

	/**
	 * Initialize theme, register features and settings.
	 */
	public function init() {
		add_theme_page(
			'Worksfront Settings',
			'Worksfront',
			'manage_options',
			'worksfront-settings',
			array( $this, 'display_settings_page' )
		);

		foreach ( $this->features as $feature ) {
			$feature->init();
		}
	}

	/**
	 * Rendering the settings page.
	 */
	public function display_settings_page() {
		if ( isset( $_GET['settings-updated'] ) ) {
			add_settings_error(
				'worksfront_messages',
				'worksfront_message',
				__( 'Settings saved.', 'worksfront' ),
				'updated'
			);
		}

		settings_errors( 'worksfront_messages' );
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php
				settings_fields( 'worksfront-settings' );
				do_settings_sections( 'worksfront-settings' );
				submit_button( 'Save' );
				?>
			</form>
		</div>
		<?php
	}
}

return new Worksfront_Admin();
