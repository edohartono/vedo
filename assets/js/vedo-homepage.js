jQuery(document).ready(function($) {
	$('#vedo-slider').carousel({
		interval: 7000
	});


	$('.owl-carousel-homepage-slider').owlCarousel({
		items: 6,
		loop: true,
		//stagePadding: 50,
		navigation: true,
		dots: true,
		autoPlay: 5000,
		navigationText: ["", ""],
		touchDrag: true,
		mouseDrag: true,
		stopOnHover: true,
		//autoplaySpeed: 1000,
		//autoplayTimeout: 1000,
		//autoplayHoverPause: true,
		responsive: {
			0: {
				items: 2
			},

			480: {
				items: 3
			},

			768: {
				items: 4
			},
		}

	});

	$('.homepage-loop-featured-heading h1').click(function() {
		$('.homepage-loop-featured-heading h1').removeClass('active');
		$(this).addClass('active');
		var meta = $(this).attr('id');

		$.ajax({
			url: homepage_featured.ajax_url,
			type: 'post',
			data: {
				action: 'homepage_featured_ajax',
				meta: meta,
			},

			success: function( response ) {
				$('.homepage-loop-featured-content').html(response);
			},

			error: function( xhr, textStatus, err) {
	            console.log("readyState: " + xhr.readyState);
	            console.log("responseText: "+ xhr.responseText);
	            console.log("status: " + xhr.status);
	            console.log("text status: " + textStatus);
	            console.log("error: " + err);
			},
		});
	});

	$('.homepage-loop-category-heading h1').click(function() {
		var cat = $(this).attr('id');
		$('.homepage-loop-category-heading h1').removeClass('active');
		$(this).addClass('active');

		$.ajax({
			url: homepage_category.ajax_url,
			type: 'post',
			data: {
				action: 'homepage_category_ajax',
				cat: cat,
			},

			success: function ( response ) {
				$('.homepage-loop-category-content').html(response);
			},

			error: function( xhr, textStatus, err) {
	            console.log("readyState: " + xhr.readyState);
	            console.log("responseText: "+ xhr.responseText);
	            console.log("status: " + xhr.status);
	            console.log("text status: " + textStatus);
	            console.log("error: " + err);
			},
		});
	});

});