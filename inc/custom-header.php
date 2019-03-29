<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package vedo
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses vedo_header_style()
 */
add_action( 'wp_head', 'vedo_header_style' );

if ( ! function_exists( 'vedo_header_style' ) ) :
	

	function vedo_header_style() {

		global $vedo_opt;
		$header_text_color = get_header_textcolor();
		$header_bg_color = get_theme_mod('header_background_color');
		$top_nav_bg_color = get_theme_mod('top_navigation_background_color');
		$top_nav_text_color = get_theme_mod('top_navigation_text_color' );
		$button_bg_color = get_theme_mod('button_color');
		$button_text_color = get_theme_mod('button_text_color');
		$title_color = get_theme_mod('title_color');
		?>
		<style type="text/css">
			.site-header,
			.header-icons .mini-cart,
			.category h3,
			.category-navigation li:hover,
			.homepage-loop-featured-content li:hover .atc-circle,
			.homepage-loop-category-content ul li .cat-sale,
			.homepage-loop-category-content ul li:hover .atc-circle
			{
				background-color: <?= $header_bg_color; ?>;
			}

			.vedo-before-header
			 {
				background-color: <?= $top_nav_bg_color; ?>;
			}

			.category {
				border: 1px solid <?= $header_bg_color; ?>;
			}

			.loop-slider ul,
			.featured-product-widget {
				border: 2px solid <?= $header_bg_color; ?>;
			}

			.vedo-before-header a,
			.top-contact  {
				color: <?= $top_nav_text_color; ?>;
			}
			
			.featured-content-homepage section  {
				background: <?= $vedo_opt['homepage-featured-color']['from'];?>;
				background: linear-gradient(<?= $vedo_opt['homepage-featured-deg'];?>deg, <?= $vedo_opt['homepage-featured-color']['from'];?> 0%, <?= $vedo_opt['homepage-featured-color']['to'];?> 100%); 
			}

			.loop-slider ul li .product-buttons .atc,
			.loop-slider ul li .product-buttons .atc a,
			.loop-slider ul li .product-buttons .favorite,
			.loop-slider ul li .product-buttons .detail
			{
				background: <?= $button_bg_color; ?>;
				color: <?= $button_text_color; ?>;
			}

			.homepage-loop-featured-content li .product-price .atc-circle:before,
			.homepage-loop-category-content ul li .cat-price .atc-circle:before {
				color: <?= $button_text_color; ?>;
			}

			.homepage-loop-category-heading,
			.homepage-loop-featured .homepage-loop-featured-heading {
				border-bottom: 2px solid <?= $header_bg_color; ?>;
			}

			.homepage-loop-featured .homepage-loop-featured-heading h1.active,
			.homepage-loop-category-heading h1.active,
			.featured-content-homepage section .title a {
				background: <?= $header_bg_color;?>;
				color: #<?= $header_text_color; ?>;
			}

			.homepage-loop-featured .homepage-loop-featured-heading h1,
			.homepage-loop-category-heading h1 {
				color: <?= $header_bg_color; ?>;
			}

			.loop-slider ul li a h2,
			.homepage-loop-featured-content li h2,
			.homepage-loop-category-content ul li h2,
			.featured-product-widget h2 {
				color: <?= $title_color; ?>;
			}
		</style>
		<?php
	}
endif;



