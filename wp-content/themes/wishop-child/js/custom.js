(function($) {
    "use strict";
    $('a[href*=#]').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
      && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target || $('[id=' + this.hash.slice(1) +']');
      if ($target.length) {
      var targetOffset = $target.offset().top;
      $('html,body').animate({scrollTop: targetOffset}, 1000);
      return false;}
      }
     });

    /*
     * Replace all SVG images with inline SVG
     */
    $('img.svg').each(function(){
	var $img = jQuery(this);
	var imgID = $img.attr('id');
	var imgClass = $img.attr('class');
	var imgURL = $img.attr('src');

	$.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
		$svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
		$svg = $svg.attr('class', imgClass+' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
            if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
		$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }

            // Replace image with new SVG
            $img.replaceWith($svg);

	}, 'xml');
    });

    /*
     * Dropdown menu at hover
     */
    $('ul.navbar-nav li.dropdown').hover(function() {
	$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
    }, function() {
	$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
    });

    $('.dropdown-toggle.nav-link').on('click', function(e) {
	var that = this;
	e.preventDefault();

	console.log(that.href);
	window.location.href = that.href;
    });
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 50) {
            $(".navbar ").addClass("active");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
           $(".navbar ").removeClass("active");
        }
    });
})(jQuery);
