<?php
/**
 * Betheme Child Theme
 *
 * @package Betheme Child Theme
 * @author Muffin group
 * @link https://muffingroup.com
 */

/**
 * Theme constants
 * Please do NOT change this
 */

define('CHILD_THEME_URI', get_stylesheet_directory_uri());

/**
 * Child Theme constants
 * You can change below constants
 */

// white label

define('WHITE_LABEL', true);

// static CSS is placed in Child Theme directory

define('STATIC_IN_CHILD', false);

/**
 * Enqueue Styles
 */

function mfnch_enqueue_styles()
{
	// enqueue the parent stylesheet
	// however we do not need this if it is empty

	// wp_enqueue_style( 'parent-style', get_template_directory_uri() .'/style.css' );

	// enqueue the parent rtl stylesheet

	if (is_rtl()) {
		wp_enqueue_style('mfn-rtl', get_template_directory_uri() . '/rtl.css');
	}

	// enqueue the child stylesheet

	wp_dequeue_style('style');
	wp_enqueue_style('style', CHILD_THEME_URI .'/style.css');
}
add_action('wp_enqueue_scripts', 'mfnch_enqueue_styles', 101);

/**
 * Load Textdomain
 */
 
function mfnch_textdomain()
{
	load_child_theme_textdomain('betheme', get_stylesheet_directory() . '/languages');
	load_child_theme_textdomain('mfn-opts', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'mfnch_textdomain');

add_action( 'woocommerce_before_shop_loop', 'bbloomer_custom_action', 15 );
 
function bbloomer_custom_action() {
echo '<h2>Kaas</h2>';
}
