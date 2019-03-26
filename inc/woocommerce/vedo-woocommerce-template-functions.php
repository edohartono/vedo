

<?php

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

