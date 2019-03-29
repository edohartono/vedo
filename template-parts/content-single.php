<?php

/**
 * Display single content
*/

if ( is_single() ) {

	// Display function before single item loop
	do_action( 'vedo_before_single_item' );

	// Display product description
	do_action( 'vedo_single' );

	// Display poduct tabs
	do_action( 'vedo_after_single_item' );
}

?>

