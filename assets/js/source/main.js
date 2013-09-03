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

	var hoverElem = ''; // global variable
	$(".excerpt .entry p, .excerpt .meta, .excerpt img, .excerpt h2").hover(
	  function() {
	  	hoverElem = '#' + $(this).closest('.excerpt')[0].id;
	    $(hoverElem + ' .excerpt-thumb img').closest('.excerpt-thumb img').css('border-color', '#000');
	    $(hoverElem + ' h2').css('text-decoration', 'underline');
	  },
	  function() {
	    $(hoverElem + ' .excerpt-thumb img').css('border-color', '#ddd');
	    $(hoverElem + ' h2').css('text-decoration', 'none');
	  }
	);
})(jQuery);
