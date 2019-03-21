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
		?>
		<style type="text/css">
			.site-header,
			.header-icons .mini-cart,
			.category h3,
			.category-navigation li:hover
			{
				background-color: <?php echo get_theme_mod('header_background_color');?>;
			}

			.vedo-before-header
			 {
				background-color: <?= get_theme_mod('top_navigation_background_color'); ?>;
			}

			.category {
				border: 1px solid <?= get_theme_mod('header_background_color'); ?>;
			}

			.vedo-before-header a,
			.top-contact  {
				color: <?= get_theme_mod('top_navigation_text_color' );?>;
			}
			
			.featured-content-homepage section  {
				background: <?= $vedo_opt['homepage-featured-color']['from'];?>;
				background: linear-gradient(<?= $vedo_opt['homepage-featured-deg'];?>deg, <?= $vedo_opt['homepage-featured-color']['from'];?> 0%, <?= $vedo_opt['homepage-featured-color']['to'];?> 100%); 
			}
		</style>
		<?php
	}
endif;



