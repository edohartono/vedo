<?php
/**
 * Vedo Class
 *
 * @package  vedo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Vedo' ) ) {
	class Vedo {

		/**
		 * Setup class
		 */

		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
			add_action( 'widgets_init', array ( $this, 'widgets_init' ) );
		}

		public function setup() {
			/**
			 * Load localisation files
			 */
			load_theme_textdomain( 'vedo', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support( 'title-tag' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support( 'post-thumbnails' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus( array(
				'category-menu' => esc_html__( 'Category Menu', 'vedo' ),
				'top-menu'		=> esc_html__('Top Menu', 'vedo' ),
			) );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'vedo_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support( 'custom-logo', array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			) );


			function vedo_custom_header_setup() {
			add_theme_support( 'custom-header', apply_filters( 'vedo_custom_header_args', array(
						'default-image'          => '',
						'default-text-color'     => '000000',
						'width'                  => 1000,
						'height'                 => 250,
						'flex-height'            => true,
						'wp-head-callback'       => 'vedo_header_style',
					) ) );	
			}


		}

		public function widgets_init() {

			register_sidebar(
				array(
					'name'          => esc_html__( 'Sidebar', 'vedo' ),
					'id'            => 'sidebar-1',
					'description'   => esc_html__( 'Add widgets here.', 'vedo' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				));

			register_sidebar( 
				array(
					'name'			=> __('Sidebar Home', 'vedo'),
					'id'			=> 'home-sidebar',
					'description'	=> __('Add widgets here', 'vedo'),
					'before-widget'	=> '<section class="sidebar-home-wrapper">',
					'after-widget'	=> '</section>',
				));
		
		}

		public function scripts() {
			/**
			 * Styles
			 */
			wp_enqueue_style( 'style', get_stylesheet_uri() );
			wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
			wp_enqueue_style( 'vedo-style', get_template_directory_uri() . '/assets/css/vedo-styles.css' );
			wp_enqueue_style( 'font-awesome',  'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
			wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css' );



			/**
			 * Scripts
			 */
			wp_enqueue_script( 'vedo-js', get_template_directory_uri() . '/assets/js/vedo-script.js', array('jquery'), '', true );
			wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '', true);
			wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true );
			wp_enqueue_script( 'vedo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

			wp_enqueue_script( 'vedo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

			/**
			 * Homepage Script & Styles
			 */

			if ( is_home() || is_front_page()) {
				wp_enqueue_script( 'owlcarousel-js', get_template_directory_uri(). '/assets/js/owl.carousel.min.js', array( 'jquery' ), '', true );
				wp_enqueue_style( 'owlcarousel-css', get_template_directory_uri(). '/assets/css/owl.carousel.min.css' );
				wp_enqueue_script( 'vedo-homepage', get_template_directory_uri(). '/assets/js/vedo-homepage.js', array( 'jquery' ), '', true );
				wp_localize_script( 'vedo-homepage', 'homepage_featured', array( 'ajax_url' => admin_url('admin-ajax.php') ));
			}
		}
	}
}

return new Vedo();