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
				<?= $product->get_price_html(); ?>
				<a href="" class="atc-circle">
				</a>


			</div>
			
		</div>
	</div>


</li>
