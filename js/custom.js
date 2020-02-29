jQuery(document).ready(function($) {
	$(".owl-carousel").owlCarousel({
		nav: true,
		items: 1,
		loop: true,
		margin: 20,
		responsiveClass: true,
		responsive: {
			0: {
				items: 1
			},
			1000: {
				items: 2
			}
		},
		autoplay: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true
	});
});
