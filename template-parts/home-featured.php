<?php

global $vedo_opt, $product, $post;

$column = $vedo_opt['homepage-loop-featured-column'];
$row = $vedo_opt['homepage-loop-featured-row'];
$posts_per_page = $column * $row;
$col = 12 / $column;

$args = array(
	'post_type'	=> 'product',
	'post_status' => 'publish',	'posts_per_page' => $posts_per_page,
);

$loop = new WP_Query($args);

echo '<ul><div class="row">';
$i = 1;

if ( $loop->have_posts() ):
	while( $loop->have_posts() ):
		$loop->the_post();
		?>

		<li class="col-md-<?= $col; ?>">
			<?php get_template_part( 'template-parts/loop/loop', 'grid' ); ?>
		</li>

	<?php

	if ( $i % $column == 0 ) {
			echo '</div><div class="row">';
		}
	$i++;
	endwhile;
endif;

echo '</div></ul>';