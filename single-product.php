<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vedo
 */

get_header();

global $post;

$post_view = get_post_meta( $post->ID, '_product_views_count', true);

if ( !isset($post_view) ) {
	$count = 1;
} else {
	$count = $post_view;
	$count++;
}

update_post_meta( $post->ID, '_product_views_count', $count );


?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="row">
				<div class="col-md-8">
			
					<?php
					while ( have_posts() ) :
						the_post();

						//get_template_part( 'template-parts/content', get_post_type() );

						get_template_part( 'template-parts/content', 'single' );

						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>	
				</div>

				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
