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
	<?php
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
	?>
</div>	

<div class="product-price">
	<?= $product->get_price_html(); ?>
	
	<a href="" class="atc-circle"></a>
	
</div>