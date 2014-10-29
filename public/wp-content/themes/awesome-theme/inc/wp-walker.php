<?php

namespace Theme;

class Walker_Nav_Menu extends \Walker_Nav_Menu {

	public static $INDENT_CHAR = "\t";

	protected $elCount = 0;

	public static function generateMenu($locationId, $depth = 1, $walker = null, $params = array()) {
		if (null === $walker) {
			$walker = get_called_class();
		}

		if (!has_nav_menu( $locationId)) {

			echo sprintf('<a href="%2$s">Click to define menu "%1$s"</a>', $locationId, get_admin_url() . 'nav-menus.php?action=locations');
			return false;
		}

		return wp_nav_menu(array_merge(
			array(
					'theme_location'=> $locationId,
					'container'		=> false,
					'menu_class'	=> 'nav-list nav-list-l1',
					'depth'         => (int) $depth,
					'walker'        => new $walker()
			),
			$params
		));
	}

	/**
	 * @param string $output
	 * @param int $depth
	 * @param array $args
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$this->elCount = 0;
		$output .= sprintf("\n%s<ul class=\"nav-list nav-list-l%d\">\n", self::indent($depth, 2), $depth+2);
	}

	/**
	 * @param string $output
	 * @param int $depth
	 * @param array $args
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= sprintf("%s</ul><!-- /l%d -->\n", self::indent($depth, 2), $depth+2);
	}

	/**
	 * @param string $output
	 * @param object $item
	 * @param int $depth
	 * @param array $args
	 * @param int $id
	 */
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		// Attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		// Classes
		$classes = array();
		$classes[] = 'nav-item nav-item-l' . ($depth+1);
		if ($item->current_item_ancestor || $item->current) {
			$classes[] = 'active'; // if child OR page is active
		}
		if ($item->current) {
			$classes[] = 'current'; // if page is active
		}
		// Icon classes: retrieve from additional field in category
		if ($item->object == 'category') {
			$category   = get_category($item->object_id);
			if (!is_wp_error($category)) {
				$catClass = \Theme\Helper::getCategoryClass($category);
				if (!empty($catClass)) {
					$classes[] = $catClass;
				}
			}
		}
		if ($item->nx_isFirst) {
			$classes[] = 'first';
		}
		if ($item->nx_isLast) {
			$classes[] = 'last';
		}
		if ($item->nx_hasChildren) {
			$classes[] = 'hasChildren';
		}
		if (!empty($item->classes)) {
			foreach ($item->classes as $class) {

				// Don't get empty and default WP classes
				if (0 === strlen($class) || 0 === strpos($class, 'menu-')) {
					break;
				}
				// Add others
				else {
					$classes[] = $class;
				}
			}
		}

		// Output
		$output .= self::indent($depth, 1) . '<li' . sprintf(" class=\"%s\"", implode(' ', array_unique($classes))) .'>' . PHP_EOL;

		// Elem: Before
		$item_output = $this->start_el_before($output, $item, $depth, $args);

		// Item
		$item_output .= self::indent($depth, 2);
//		if ($item->current) $item_output .= '<strong>';
		$item_output .= '<a class="nav-item-link" '. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;

		// Item: Description
		if (!empty($item->description)) {
			$item_output .= '<span class="description">' . $item->description . '</span>';
		}

		// Item: Close link, incl. icon markup
		$item_output .= '</a>';
//		if ($item->current) $item_output .= '</strong>';
		$item_output .= PHP_EOL;

		// Elem: After
		$item_output .= $this->start_el_after($output, $item, $depth, $args);

		$output .= $item_output;
	}

	protected function start_el_before(&$output, $item, $depth, $args) {
		return $args->before;
	}

	protected function start_el_after(&$output, $item, $depth, $args) {
		return $args->after;
	}

	/**
	 * @param string $output
	 * @param object $item
	 * @param int $depth
	 * @param array $args
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$this->elCount++;
		$output .= self::indent($depth, 1) . "</li>\n";
	}

	public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		// check, whether there are children for the given ID and append it to the element with a (new) ID
		$element->nx_hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);

		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}

	protected static function indent($depth, $indent = 0) {
		$indentCount = $depth < 1 ? 0 : $depth + 1;
		return str_repeat(self::$INDENT_CHAR, (int) $indentCount + $indent);
	}

}
