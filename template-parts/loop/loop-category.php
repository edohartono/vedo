<?php
global $vedo_opt, $product;

$column = $vedo_opt['homepage-loop-category-column'];
$row = $vedo_opt['homepage-loop-category-row'];
$col = 12 / $column;
$posts_per_page = $column * $row;
?>

<li class="col-md-<?= $col; ?>">
	<div class="row">
		<div class="cat-img col-md-4">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('thumbnail');
			} else {
				echo '<img src="'.get_template_directory_uri().'/assets/img/no-product.png"/>';
			}

			if ( $product->is_on_sale() ) {
				echo '<span class="cat-sale">SALE</span>';
			}

			?>
		</div>

		<div class="cat-right-side col-md-8">
			<h2><?= the_title(); ?></h2>

	

			<div class="cat-price">
				<div class="product-rating">
				<?php do_action( 'vedo_get_product_rating_html' ); ?>
			</div>
			
				<?= $product->get_price_html(); ?>
				<a href="" class="atc-circle">
				</a>


			</div>
			
		</div>
	</div>


</li>
