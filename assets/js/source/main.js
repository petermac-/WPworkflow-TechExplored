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

	/*function progressBar(percent, $element) {
		jQuery.easing.def = "easeInOutExpo";
		var progressBarWidth = percent * $element.width() / 100;
		//$element.find('span').animate({ width: progressBarWidth }, 500).html(percent + "%&nbsp;");
		//$element.find('span').animate({ width: progressBarWidth }, 500);

		$element.find('span').animate(
	    {
	      width: progressBarWidth
	    }, 2000, "swing"
	  );
	}
		progressBar(100, $('.progressBar'));*/


		//var twitterCSS = document.createElement("style");
		//twitterCSS.text = "padding: 0 6px;";
		//document.getElementsByClassName("header-twitter-follow")[0].getElementsByTagName("iframe")[0].document.body.appendChild(twitterCSS);
		//frames['frame1'].document.body.appendChild(cssLink);

	/*var hoverElem = ''; // global variable
	$(".excerpt .entry p, .excerpt .meta, .excerpt img, .excerpt .excerpt-title").hover(
	  function() {
	  	hoverElem = '#' + $(this).closest('.excerpt')[0].id;
	    $(hoverElem + ' .excerpt-thumb img').closest('.excerpt-thumb img').css('border-color', '#000');
	    $(hoverElem + ' h2').css('text-decoration', 'underline');
	  },
	  function() {
	    $(hoverElem + ' .excerpt-thumb img').css('border-color', '#ddd');
	    $(hoverElem + ' h2').css('text-decoration', 'none');
	  }
	);*/

	/*$('.popup-link').magnificPopup(function() {
	  disableOn: function() {
	    // Detect IE 7 or lower with your preferred method
	    // and return false if you want to trigger the default action
	    //return isIE7 ? false: true;

	    // Detect here whether you want to show the popup
      // return true if you want
      if($(window).width() < 500) {
        return false;
      }
      return true;
	  }
	});
	var getIphoneWindowHeight = function() {
	  // Get zoom level of mobile Safari
	  // Such zoom detection might not work correctly on other platforms
	  // 
	  var zoomLevel = document.documentElement.clientWidth / window.innerWidth;

	  // window.innerHeight returns height of the visible area. 
	  // We multiply it by zoom and get our real height.
	  return window.innerHeight * zoomLevel;
	};
	var interval,
		hasSize,
		onHasSize = function() {
			if(hasSize) return;

			// we ignore browsers that don't support naturalWidth
			var naturalWidth = img[0].naturalWidth;

			if(window.devicePixelRatio > 1 && naturalWidth > 0) {
				img.css('max-width', naturalWidth / window.devicePixelRatio);
			}

			clearInterval(interval);
			hasSize = true;
		},
		onLoaded = function() {
			onHasSize();
		},
		onError = function() {
			onHasSize();
		},
		checkSize = function() {
			if(img[0].naturalWidth > 0) {
				onHasSize();
			}
		},
		img = $('<img />')
			.on('load', onLoaded)
			.on('error', onError)
			// hd-image.jpg is optimized for the current pixel density
			.attr('src', 'hd-image.jpg') 
			.appendTo(someContainer);

	interval = setInterval(checkSize, 100);
	checkSize();

	// Save current focused element
	var lastFocusedElement = document.activeElement;

	// Set focus on some element in lightbox
	$('#input').focus();

	// After lightbox is closed, put it back
	if(lastFocusedElement)
	  $(lastFocusedElement).focus();*/

})(jQuery);
