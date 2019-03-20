<?php
/**
 * vedo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vedo
 */

$theme 			= wp_get_theme( 'vedo' );
$vedo_version 	= $theme['Version'];

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vedo_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'vedo_content_width', 640 );
}
add_action( 'after_setup_theme', 'vedo_content_width', 0 );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/vedo-template-functions.php';

/**
 * Hooks of template functions
 */
require get_template_directory() . '/inc/vedo-template-hooks.php';


/** Load Vedo Class
 *
 */
require get_template_directory() . '/inc/class-vedo.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

if ( ! class_exists( 'ReduxFramework' ) && file_exists( dirname(__FILE__) . '/inc/admin/redux/ReduxCore/framework.php' ) ) {
	require ( dirname(__FILE__) . '/inc/admin/redux/ReduxCore/framework.php' );
}

if ( ! isset($vedo_opt) && file_exists( dirname(__FILE__) . '/inc/admin/redux/config.php' ) ) {
	require ( dirname(__FILE__) . '/inc/admin/redux/config.php' );
} 
