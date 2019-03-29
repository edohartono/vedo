

<?php

/** Main function
 */

if ( ! function_exists( 'vedo_woocommerce_price_filter' ) ) {
	function vedo_woocommerce_price_filter() {
		global $product;

		if ( $product->is_type( 'simple' ) ) {
			if ( $product->is_on_sale() ) {
				$html = '<span class="reg-price">'. wc_price($product->get_regular_price()).'</span>';
				$html .= '<span class="sale-price">'. wc_price($product->get_sale_price()).'</span>';
				return $html;
			}

			else {
				return '<span class="sale-price">'. wc_price($product->get_regular_price()).'</span>';
			}			
		}

		elseif ( $product->is_type('variable') ) {
			$html = '<p>From</p>';
			$html .= '<span class="sale-price">'.wc_price($product->get_variation_price('min')).'</span>';
			return $html;
		}

		else {
			return;
		}
	}
}

if ( ! function_exists( 'vedo_get_product_rating_html' ) ) {
	function vedo_get_product_rating_html() {
		global $product;
		$average = $product->get_average_rating();
		$star = '<span class="star-fill"></span>';


		if ( (int) $average != $average ) {
			$rating = floor( $average * 100 / 100 );
			echo str_repeat($star, $rating);
			echo '<span class="star-half"></span>';
			$rating ++;
		}

		else {
			$rating = $average;
			echo str_repeat($star, $rating);
		}

		for ($i=$rating; $i < 5; $i++) { 
			echo '<span class="star-null"></span>';
		}
	}
}




/** Homepage Function

*/
if ( ! function_exists( 'vedo_before_product_thumbnail' ) ) {
	function vedo_before_product_thumbnail() { 
		global $product;
		?>
		<a href=""><?= wc_get_product_category_list($product->get_id()) ?></a>
		<a href="<?= the_permalink(); ?>">
	<?php
	}
}

if ( ! function_exists( 'vedo_product_thumbnail' ) ) {
	function vedo_product_thumbnail() {
		if ( has_post_thumbnail() ) {
			echo '<div class="product-img">';
			the_post_thumbnail('thumbnail');
			echo '</div>';
		}

		else {
			echo '<div class="product-img">';
			echo '<img src="'.get_template_directory_uri().'/assets/img/no-product.png"/>';
			echo '</div>';
		}
		
	}
}

if ( ! function_exists( 'vedo_item_title') ) {
	function vedo_item_title() {
		the_title('<h2>', '</h2>');
		echo '</a>';
	}
}

if ( ! function_exists( 'vedo_item_price' ) ) {
	function vedo_item_price() {
		global $product;
		echo '<div class="product-price">';
		echo $product->get_price_html();
		echo '</div>';
	}
}

if ( ! function_exists( 'vedo_item_buttons' ) ) {
	function vedo_item_buttons() {
		echo '<div class="product-buttons">';
		echo '<div class="favorite">';

		echo '</div>';
		echo '<div class="atc">';
		woocommerce_template_loop_add_to_cart();
		echo '</div>';

		echo '<div class="detail">';
		echo '</div>';
	}
}

if ( ! function_exists( 'vedo_after_item_buttons' ) ) {
	function vedo_after_item_buttons() {

	}
}

/** SINGLE FUNCTIONS */

if ( ! function_exists( 'vedo_before_single_item' ) ) {
	function vedo_before_single_item() {

	}
}

if ( ! function_exists( 'vedo_single_item' ) ) {
	function vedo_single_item() { ?>
		<div class="container">
		<div class="row">
	<?php
	}
}

if ( ! function_exists( 'vedo_single_post_thumbnail' ) ) {
	function vedo_single_post_thumbnail() { ?>
			<div class="col-md-6">
			<div class="img">
				<?php get_the_post_thumbnail('medium'); ?> 
			</div>

	<?php
	}
}

if ( ! function_exists( 'vedo_single_post_attachment' ) ) {
	function vedo_single_post_attachment() { ?>
			<div class="img-child">
				image attachment
			</div>
	<?php
	}
}

if ( ! function_exists( 'vedo_single_before_item_title' ) ) {
	function vedo_single_before_item_title() {?>
			<div class="col-md-6"></div>
	<?php
	}
}

if ( ! function_exists( 'vedo_single_item_title' ) ) {
	function vedo_single_item_title() {
		the_title( '<h1>', '</h1>' );
	}
}

if ( ! function_exists( 'vedo_single_after_item_title') ) {
	function vedo_single_after_item_title() { ?>
		<div class="rating">
				
		</div>
	<?php
	}
}

if ( ! function_exists( 'vedo_single_price' ) ) {
	function vedo_single_price() {
		global $product; ?>
		<div class="price">
			<?= $product->get_price_html(); ?>
		</div>
	</div><!-- END ROW -->
	<?php
	}
}

if ( ! function_exists( 'vedo_single_before_add_to_cart' ) ) {
	function vedo_single_before_add_to_cart() {
		echo 'product variation here';
	}
}

if ( ! function_exists( 'vedo_single_add_to_cart' ) ) {
	function vedo_single_add_to_cart() {
		echo 'single buttons here';
	}
}

if ( ! function_exists( 'vedo_single_after_add_to_cart' ) ) {
	function vedo_single_after_add_to_cart() { ?>
		</div><!-- END ROW -->
	<?php
	}
}

if ( ! function_exists( 'vedo_single_description' ) ) {
	function vedo_single_description() { ?>
		<div class="row">
			<section class="tabs"></section>
		</div>
	<?php
	}
}

if ( ! function_exists( 'vedo_single_specification' ) ) {
	function vedo_single_specification() {

	}
}

if ( ! function_exists( 'vedo_single_review' ) ) {

}
