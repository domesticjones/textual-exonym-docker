<?php
/*
==============================
  [[[ Define all the Menus ]]]
==============================
*/

// Enable menus in WP
add_theme_support('menus');

// Define the nav bars
register_nav_menus(
  array(
    'header-menu' => __('Header', 'exonym'),
    'footer-menu' => __('Footer', 'exonym'),
    'legal-menu' => __('Legal', 'exonym'),
    'responsive-menu' => __('Responsinve', 'exonym')
  )
);

// Output icon field if it's found
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects($items, $args) {
	foreach($items as &$item) {
		$icon = get_field('icon', $item);
		if($icon) {
			$item->title .= ' <img src="' . $icon['url'] . '">';
		}
	}
	return $items;
}
