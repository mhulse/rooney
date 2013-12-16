<?php

/**
 * The Picard theme build version.
 *
 * Called like so: <?=rooney_build()?>
 *
 * @see http://stackoverflow.com/questions/12638734/how-do-i-declare-a-global-variable-in-php-i-can-use-across-templates
 */

function rooney_build() {
	
	return '/picard/prod/0.1.0/20131216/1'; // Edit this string to update theme across site.
	
}

//----------------------------------------------------------------------

/**
 * @see https://github.com/WordPress/WordPress/blob/master/wp-content/themes/twentyfourteen/functions.php
 * @see http://justintadlock.com/archives/2010/12/30/wordpress-theme-function-files
 */

if ( ! function_exists('rooney_theme_setup')) {
	
	/**
	 * Note that this function is hooked into the `after_setup_theme` hook,
	 * which runs before the `init` hook. The `init` hook is too late for some
	 * features, such as indicating support post thumbnails.
	 *
	 * To override `rooney_setup()` in a child theme, add your own
	 * `rooney_setup` to your child theme's functions.php file.
	 */
	
	function rooney_theme_setup() {
		
		// Add theme support for post thumbnails (featured images):
		add_theme_support('post-thumbnails');
		
		// Valid HTML5 markup:
		//add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list',));
		
		// Add your nav menus function to the 'init' action hook:
		add_action('init', 'rooney_register_menus');
		
	}
	
}

add_action('after_setup_theme', 'rooney_theme_setup');

function rooney_register_menus() {
	
	// Custom navigation:
	register_nav_menu('primary', 'Custom links in main navigation.');
	
}

//----------------------------------------------------------------------

/**
 * @see http://codex.wordpress.org/Function_Reference/wp_get_nav_menu_items
 */

function rooney_get_nav_menu($slug) {
	
	$return = '';
	
	if (($locations = get_nav_menu_locations()) && isset($locations[$slug])) {
		
		$menu = wp_get_nav_menu_object($locations[$slug]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		
		foreach ((array) $menu_items as $key => $menu_item) {
			
			$return .= sprintf('><li><a href="%s">%s</a></li', $menu_item->url, $menu_item->title);
			
		}
		
	}
	
	return $return;
	
}

/**
 *
 */

function rooney_get_category_menu($args = array('orderby' => 'name', 'parent' => 0,)) {
	
	$return = '';
	
	foreach (get_categories($args) as $category) {
		
		$return .= sprintf('><li><a href="%s">%s</a></li', get_category_link($category->term_id), $category->name);
		
	}
	
	return $return;
	
}
