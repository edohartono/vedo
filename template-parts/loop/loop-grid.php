<?php global $product; ?>

<?= wc_get_product_category_list($product->get_id()) ?>
<div class="product-img">
	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'thumbnail' );
	}
	
	else {
		echo '<img src="'.get_template_directory_uri().'/assets/img/no-product.png"/>';
	} ?>
</div>
<a href="<?= the_permalink(); ?>"><?php the_title('<h2>', '</h2>'); ?></a>

<div class="product-rating">
	<?php do_action( 'vedo_get_product_rating_html' ); ?>
</div>	

<div class="product-price">
	<?= $product->get_price_html(); ?>
	
	<a href="" class="atc-circle"></a>
	
</div>