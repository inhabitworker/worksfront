<?php
/**
 * Class for the main header navigation menu.
 */

/**
 * Ditto
 */
class Worksfront_Walker_Nav_Menu extends Walker_Nav_Menu {
	/**
	 * Output.
	 *
	 * @param string   $output      Used to append additional content (passed by reference).
	 * @param WP_Post  $item        Menu item data object.
	 * @param int      $depth       Depth of page. Not Used.
	 * @param stdClass $args        An object of wp_nav_menu() arguments.
	 * @param int      $id          Something.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$output .= sprintf(
			'<a href="%s">%s</a>',
			$item->url,
			$item->title
		);
	}
}
