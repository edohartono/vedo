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
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * @hook vedo_before_header, action vedo_top_wrapper_start
 */

if ( ! function_exists( 'vedo_top_wrapper_start' ) ) {
	function vedo_top_wrapper_start() { ?>
		<div class="container-fluid vedo-before-header">
			<div class="row">
	<?php
	}
}

/**
 * @hook vedo_before_header, action vedo_top_contact_homepage
 */

if ( ! function_exists( 'vedo_top_contact_homepage' ) ) {
	function vedo_top_contact_homepage() { ?>

		<div class="col-md-6 top-contact">
			<div class="row">
				<i class="fa fa-phone" aria-hidden="true"></i><span>021-234567</span>
				<i class="fa fa-clock-o" aria-hidden="true"></i><span>Working hours: Monday - Friday (8 a.m - 5 p.m)</span>
			</div>
		</div>

	<?php
	}
}

/**
 * @hook vedo_before_header, action vedo_secondary_navigation
 *
 */

if ( ! function_exists( 'vedo_secondary_navigation' ) ) {
	function vedo_secondary_navigation() { ?>

	<!-- <nav id="site-navigation" class="col-md-7 secondary-navigation"> -->
		<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php esc_html_e( 'Top Menu', 'vedo' ); ?></button>
	<?php
		wp_nav_menu( array(
			'theme_location' => 'top-menu',
			'menu_id'        => 'top-menu',
			'menu_class'	 => 'secondary-navigation',
			'container'		 => 'nav',
			'container_class'=> 'col-md-6 top-menu-container',

		) );
	?>
	<!-- </nav> --><!-- #site-navigation -->

	<?php
	}
}

/**
 * @hook vedo_before_header, action vedo_top_wrapper_end
 */

if ( ! function_exists( 'vedo_top_wrapper_end' ) ) {
	function vedo_top_wrapper_end() { ?>
			</div><!-- ROW -->
		</div><!-- CONTAINER -->
	<?php
	}
}

/**
 * @hook vedo_header start
 */

if ( ! function_exists( 'vedo_header_wrapper_start' ) ) {
	function vedo_header_wrapper_start() {
		echo '<div class="vedo-header">';
	}
}

if ( ! function_exists( 'vedo_site_branding' ) ) {
	function vedo_site_branding() { ?>
		
		<div class="row">
			<div class="site-branding col-md-3">
				
				<?php the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$vedo_description = get_bloginfo( 'description', 'display' );
				if ( $vedo_description || is_customize_preview() ) :
					?>
					<!-- <p class="site-description"><?php echo $vedo_description; /* WPCS: xss ok. */ ?></p> -->
				<?php endif; ?>
			</div><!-- .site-branding -->

			
			
		
	<?php
	}
}

if ( ! function_exists( 'vedo_homepage_search' ) ) {
	function vedo_homepage_search() { ?>
		<div class="col-md-5 vedo-search">
			<form action="">
				<input type="text" placeholder="Search . . .">
				<select name="" id="">
					<option value="">All Categories</option>
						<?php
						$categories = get_categories( array('post_type' => 'product', 'hide_empty' => 0));
						foreach ($categories as $category) {
							echo "<option value='".$category->term_id."'>". $category->name ."</option>";
						}
						?>
				</select>
				<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
		</div>
	<?php


	}
}

if ( ! function_exists( 'vedo_homepage_icons' ) ) { 
	function vedo_homepage_icons() { ?>
		<div class="col-md-4">icon</div>
	<?php	
	}	
}

if ( ! function_exists( 'vedo_primary_navigation' ) ) {
	function vedo_primary_navigation() { ?>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'vedo' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu_class'	 => 'primary-navigation',

			) );
			?>
		</nav><!-- #site-navigation -->
	<?php
	}
}

if ( ! function_exists( 'vedo_header_wrapper_end' ) ) {
	function vedo_header_wrapper_end() {
		echo '</div></div>'; //vedo-header
	}
}

/**
 * @hook vedo_header end
 */


/**
 * @hook vedo_homepage start
 * @hook See vedo-template-functions.php
 */

add_action( 'vedo_homepage', 'vedo_body_wrapper_start', 10 );
add_action( 'vedo_homepage', 'vedo_homepage_category', 20 );
add_action( 'vedo_homepage', 'vedo_featured_content_homepage', 30 );
add_action( 'vedo_homepage', 'vedo_loop_homepage_slide', 40 );
add_action( 'vedo_homepage', 'vedo_homepage_sidebar', 45 );
add_action( 'vedo_homepage', 'vedo_loop_homepage_featured', 50);
add_action( 'vedo_homepage', 'vedo_loop_homepage_category', 60 );
add_action( 'vedo_homepage', 'vedo_loop_featured_product', 65 );
add_action( 'vedo_homepage', 'vedo_body_wrapper_end', 70 );
add_action( 'vedo_homepage', 'vedo_marketplace_icon', 80 );

if ( ! function_exists( 'vedo_body_wrapper_start' ) ) {
	function vedo_body_wrapper_start() { ?>

		<div class="homepage container">
	<?php
	}
}

if ( ! function_exists( 'vedo_homepage_category' ) ) {
	function vedo_homepage_category() {?>
		<div class="row">
		<div class="col-md-3 category">Category</div>
	<?php	
	}
}

if ( ! function_exists( 'vedo_featured_content_homepage' ) ) {
	function vedo_featured_content_homepage() { ?>

		<div class="col-md-9 featured-homepage">
			<div class="row">
				<div class="slider">slider</div>
			</div>

			<div class="row">
				<div class="col-md-4">1</div>
				<div class="col-md-4">2</div>
				<div class="col-md-4">3</div>
			</div>
		</div>

		</div>
		<?php

	}
}

if ( ! function_exists( 'vedo_loop_homepage_slide' ) ) {
	function vedo_loop_homepage_slide() { ?>

		<div class="row">
			<div class="loop-slider">
				loop slider
			</div>
		</div>

		<?php

	}
}

if ( ! function_exists( 'vedo_homepage_sidebar' ) ) {
	function vedo_homepage_sidebar() { ?>

		<div class="row">


			<div class="col-md-4 sidebar-home">
				sidebar
			</div>
			<div class="col-md-8 loop-featured">

	<?php
	}
}

if ( ! function_exists( 'vedo_loop_homepage_featured' ) ) {
	function vedo_loop_homepage_featured() { ?>

			<div class="col-md-4">loop homepage featured</div>

	<?php
	}
}

if ( ! function_exists( 'vedo_loop_homepage_category' ) ) {
	function vedo_loop_homepage_category() { ?>

			<div class="col-md-8 vedo-homepage-category">homepage category</div>
			</div>

	</div>

	<?php 

	}
}

if ( ! function_exists( 'vedo_loop_featured_product' ) ) {
	function vedo_loop_featured_product() { ?>
	
	<div class="row">
		<div class="featured-product-widget">
			featured product widget
		</div>
	</div>
	<?php
	}
}

if ( ! function_exists( 'vedo_body_wrapper_end' ) ) {
	function vedo_body_wrapper_end() { ?>

	</div>

	<?php

	}
}

if ( ! function_exists( 'vedo_marketplace_icon' ) ) {
	function vedo_marketplace_icon() { ?>

	<div class="row">
		<div class="container-fluid homepage-marketplace-wrapper">
			social media icon
		</div>
	</div>

	<?php
	}
}


/**
 * @hook vedo_homepage end
 * @hook See vedo-template-functins.php
 */

function vedo_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'vedo_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function vedo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'vedo_pingback_header' );
