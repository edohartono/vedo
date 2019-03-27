<?php

/**
 * Functions which enhance the theme by hooking into Woocommerce
 *
 * @package vedo
 */

//add_action('vedo_loop', 'vedo_product_wrapper', 10 );
add_action( 'vedo_loop', 'vedo_before_product_thumbnail', 20);
add_action( 'vedo_loop', 'vedo_product_thumbnail', 30);
//add_action( 'vedo_loop', 'vedo_after_product_thumbnail', 40);
add_action( 'vedo_loop', 'vedo_item_title', 50 );
//add_action( 'vedo_loop', 'vedo_after_item_title', 60 );
add_action( 'vedo_loop', 'vedo_item_price', 70);
add_action( 'vedo_loop', 'vedo_item_buttons', 80);
add_action( 'vedo_loop', 'vedo_after_item_buttons', 90);
//add_action( 'vedo_loop', 'vedo_product_wrapper_end', 100);

add_filter( 'woocommerce_get_price_html', 'vedo_woocommerce_price_filter');

//Ajax Action
add_action( 'wp_ajax_nopriv_homepage_featured_ajax', 'homepage_featured_ajax' );
add_action( 'wp_ajax_homepage_featured_ajax' , 'homepage_featured_ajax' );

add_action( 'wp_ajax_nopriv_homepage_category_ajax', 'homepage_category_ajax' );
add_action( 'wp_ajax_homepage_category_ajax' , 'homepage_category_ajax' );
