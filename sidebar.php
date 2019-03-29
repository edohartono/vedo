<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vedo
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}


if ( is_single() ) {
	dynamic_sidebar( 'single' );
}

elseif ( is_shop() ) {
	dynamic_sidebar( 'shop' ); ?>
	<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
	<?php
}

else {
	echo "you're not in single and shop";
}
?>


