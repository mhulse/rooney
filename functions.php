<?php

/**
 * The Picard theme build version.
 *
 * Called like so: <?=rooney_build()?>
 *
 * @see http://stackoverflow.com/questions/12638734/how-do-i-declare-a-global-variable-in-php-i-can-use-across-templates
 */

function rooney_build() {
	
	return '/picard/prod/0.1.0/20131217/1'; // Edit this string to update theme across site.
	
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
		
		// Clean up the head:
		remove_action('wp_head','wp_generator');
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link'); // http://wordpress.org/support/topic/wlwmanifestxml-what-is-it
		remove_action('begin_fetch_post_thumbnail_html', '_wp_post_thumbnail_class_filter_add'); // http://stackoverflow.com/a/12266439/922323
		
		// Add theme support for post thumbnails (featured images):
		add_theme_support('post-thumbnails');
		
		// Valid HTML5 markup:
		//add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list',));
		
		// Add your nav menus function to the 'init' action hook:
		add_action('init', 'rooney_register_menus');
		
		add_filter('user_can_richedit', 'octavo_user_can_richedit');
		
		remove_filter('the_content','wpautop');
		add_filter('the_content', 'octavo_autop_fix');
		
		remove_all_filters('the_excerpt');
		remove_all_filters('get_the_excerpt');
		add_filter('get_the_excerpt', 'octavo_trim_excerpt');
		
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

/**
 * Disable WYSIWYG for pages.
 *
 * @param $wp_rich_edit { boolean } Default value.
 */

function octavo_user_can_richedit($wp_rich_edit) {
	
	global $post_type;
	
	if ($post_type == 'page') $wp_rich_edit = FALSE;
	
	return $wp_rich_edit;
	
}

/**
 * Disable `wpautop` from affecting page content.
 */

function octavo_autop_fix($content){
	
	return (get_post_type() == 'page') ? $content : wpautop($content);
	
}

/**
 * Removes and replaces the excerpt function.
 *
 * Excerpt length set to 80 instead of 55, which matches the main site.
 *
 * @todo Make as class.
 * @todo Remove empty HTML tags (http://codesnap.blogspot.com/2011/04/recursively-remove-empty-html-tags.html).
 * @see http://core.trac.wordpress.org/browser/tags/3.5.1/wp-includes/formatting.php#L2128
 * @see http://bacsoftwareconsulting.com/blog/index.php/wordpress-cat/how-to-preserve-html-tags-in-wordpress-excerpt-without-a-plugin/
 * @see http://bacsoftwareconsulting.com/blog/index.php/wordpress-cat/how-to-create-a-variable-length-excerpt-in-wordpress-without-a-plugin/
 * @see http://www.wpquestions.com/question/show/id/3683
 * @see http://wordpress.org/extend/plugins/advanced-excerpt/
 */

function octavo_trim_excerpt($return = '') {
	
	# Use `1` to finish sentence, otherwise use `0`.
	$finish_sentence = 1;
	# Tags to allow in the excerpt:
	$allowed_tags = '<a><strong><b><em><i>';
	
	if ($return == '') {
		
		# Setup text:
		$text = $return;
		# Get the full content:
		$text = get_the_content('');
		# Delete all shortcode tags from the content:
		$text = strip_shortcodes($text);
		# Filter it:
		$text = apply_filters('the_content', $text);
		# From the default wp_trim_excerpt():
		$text = str_replace(']]>', ']]&gt;', $text); // Some kind of precaution against malformed CDATA in RSS feeds I suppose.
		# Remove script tags:
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		# Allowed tags?
		$text = strip_tags($text, $allowed_tags);
		
		# Word length (depends on setting above).
		$excerpt_length = apply_filters('excerpt_length', 55); // Defaults to `55` words.
		
		# Divide the string into tokens; HTML tags, or words, followed by any whitespace:
		$tokens = array();
		preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $text, $tokens);
		
		# Itterate over word tokens:
		$word = 0;
		foreach ($tokens[0] as $token) {
			
			# Parse each token:
			if (($word >= $excerpt_length) && ( ! $finish_sentence)) {
				
				# Limit reached:
				break; // Quit the loop.
				
			}
			
			# Is token a tag?
			if ($token[0] != '<') {
				
				# Check for the end of the sentence: '.', '?' or '!':
				if (($word >= $excerpt_length) && $finish_sentence && (preg_match('/[\?\.\!]\s*$/uS', $token) == 1)) {
					
					# Limit reached!
					$return .= trim($token); // Continue until '?' '.' or '!' occur to reach the end of the sentence.
					
					break;
					
				}
				
				# Add `1` to $word:
				$word++;
				
			}
			
			# Append what's left of the token:
			$return .= $token;
			
		}
		
		# Add the excerpt suffix:
		$return .= apply_filters('excerpt_more', ' &hellip;');
		
		# Balances tags:
		$return = force_balance_tags($return);
		
		# Trim:
		$return = trim($return);
		
	}
	
	# Return the excerpt:
	return $return;
	
}
