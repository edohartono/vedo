<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vedo
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container-fluid p-2">
			<div class="row">
			
				<div class="col-md-3 footer-1">
					<?php dynamic_sidebar( 'footer-1'); ?>
				</div>

				<div class="col-md-3 footer-2">
					<?php dynamic_sidebar( 'footer-2'); ?>
				</div>

				<div class="col-md-3 footer-3">
					<?php dynamic_sidebar( 'footer-3'); ?>
				</div>

				<div class="col-md-3 footer-4">
					<?php dynamic_sidebar( 'footer-4'); ?>
				</div>
			</div>
		

			<div class="row">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'vedo' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'vedo' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( __( 'Theme: <a href="https://github.com/edohartono/vedo">Vedo Electro</a> by %2$s.', 'vedo' ), 'vedo', '<a href="https://profiles.wordpress.org/edoha/">edoha</a>' );
						?>
					<?php
						printf( esc_html__('&copy; 2019'));
					?>
				</div><!-- .site-info -->
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
