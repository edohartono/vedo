<?php
/**
 * vedo Theme Customizer
 *
 * @package vedo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

add_action ('after_setup_theme', 'vedo_custom_header_setup');


function vedo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->add_setting('header_background_color', array(
		'default'	=> '#FFD94E',
		'transport' => 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'header_background_color_control', array(
			'label'	=> __('Header Background Color', 'vedo'),
			'section'	=> 'colors',
			'settings'	=> 'header_background_color'
	)));

	$wp_customize->add_setting('top_navigation_background_color', array(
		'default'	=> '#292929',
		'transport'	=> 'refresh',

	));

	$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'top_navigation_background_color_control', array(
			'label'		=> __('Top Navigation Background Color', 'vedo' ),
			'section'	=> 'colors',
			'settings'	=> 'top_navigation_background_color',
	)));

	$wp_customize->add_setting('top_navigation_text_color', array(
			'default'	=> '#FFFFFF',
			'transport'	=> 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'top_navigation_text_color_control', array(
			'label'		=> __('Top Navigation Text Color', 'vedo'),
			'section'	=> 'colors',
			'settings'	=> 'top_navigation_text_color'
	)));

	$wp_customize->add_setting('button_color', array(
			'default'	=> '#FFD94E',
			'transport'	=> 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'button_color_control', array(
			'label'		=> __('Button Color', 'vedo' ),
			'section'	=> 'colors',
			'settings'	=> 'button_color',
	) ) );

	$wp_customize->add_setting('button_text_color', array(
			'default'	=> '#FFFFFF',
			'transport'	=> 'refresh',
	));

	$wp_customize->add_control( new WP_Customize_color_Control( $wp_customize, 'button_text_color_control', array(
			'label'		=> __('Button Text Color', 'vedo' ),
			'section'	=> 'colors',
			'settings'	=> 'button_text_color',
	) ) );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'vedo_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'vedo_customize_partial_blogdescription',
		) );
		
	}
}
add_action( 'customize_register', 'vedo_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function vedo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function vedo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vedo_customize_preview_js() {
	wp_enqueue_script( 'vedo-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'vedo_customize_preview_js' );
