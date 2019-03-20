<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package vedo
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

/**
 * Header Content
 * @action See vedo-template-functions.php
 */


add_action( 'vedo_before_header', 'vedo_top_wrapper_start', 10 );
add_action( 'vedo_before_header', 'vedo_top_contact_homepage', 15 );
add_action( 'vedo_before_header', 'vedo_secondary_navigation', 20 );
add_action( 'vedo_before_header', 'vedo_top_wrapper_end', 30 );


add_action( 'vedo_header', 'vedo_header_wrapper_start', 5);
remove_action( 'vedo_header', 'vedo_primary_navigation', 5 );
add_action( 'vedo_header', 'vedo_site_branding', 10 );
add_action( 'vedo_header', 'vedo_homepage_search', 20 );
add_action( 'vedo_header', 'vedo_homepage_icons', 30);
add_action( 'vedo_header', 'vedo_header_wrapper_end', 60);

/**
 * Homepage Content
 * @action See vedo-template-functions.php
 */

add_action( 'vedo_homepage', 'vedo_body_wrapper_start', 10 );
add_action( 'vedo_homepage', 'vedo_homepage_category', 20 );
add_action( 'vedo_homepage', 'vedo_featured_content_homepage', 30 );
add_action( 'vedo_homepage', 'vedo_loop_homepage_slide', 40 );
add_action( 'vedo_homepage', 'vedo_loop_homepage_featured', 50);
add_action( 'vedo_homepage', 'vedo_loop_homepage_category', 60 );
add_action( 'vedo_homepage', 'vedo_body_wrapper_end', 70 );



