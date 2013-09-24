(function($) {
	$(".excerpt p").on("click", function(e) {
		e.stopPropagation();
		if(e.target.nodeName != 'A') {
			var url = $(this).closest('.excerpt').attr('data-url');
			window.location = url;
		}
	});

	$(".excerpt-gallery-container").on("click", function(e) {
		e.stopPropagation();
		var url = $(this).attr('data-url');
		window.location = url;
	});

	FastClick.attach(document.body);

	//https://www.mobify.com/blog/beginners-guide-to-perceived-performance/
	document.addEventListener("touchstart", function(){}, true);

})(jQuery);
