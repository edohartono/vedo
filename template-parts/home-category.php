<?php
global $vedo_opt;

$column = $vedo_opt['homepage-loop-category-column'];
$row = $vedo_opt['homepage-loop-category-row'];
$col = 12 / $column;
$posts_per_page = $column * $row;
$i = 0;

$args = array(
	'post_type'	=> 'product',
	'post_status' => 'publish',
	'posts_per_page' => $posts_per_page,
);

$loop = new WP_Query( $args );

echo "<ul><div class='row'>";

if ( $loop->have_posts() ):
	while( $loop->have_posts() ):
		$loop->the_post();
		get_template_part('template-parts/loop/loop', 'category' );

		$i++;
		if ( $i % $column == 0 ) {
			echo '</div><div class="row">';
		}
		
	endwhile;
endif;

echo "</div></ul>";

?>