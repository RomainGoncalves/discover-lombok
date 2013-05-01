/*-------------------------------------------------*/
/*	Pretty Photo
/*-------------------------------------------------*/
jQuery.noConflict()(function($){
	"use strict";
	$(document).ready(function() {

		$('a[data-rel]').each(function() {
			$(this).attr('rel', $(this).data('rel'));
		});		

		$("a[rel^='prettyPhoto']").prettyPhoto({
			animationSpeed: 'normal', /* fast/slow/normal */
			opacity: 0.80, /* Value between 0 and 1 */
			showTitle: true, /* true/false */
			theme:'light_square',
			deeplinking: false
		});
		
	});
});


/*-------------------------------------------------*/
/*	DropDown menu for responsive mode
/*-------------------------------------------------*/
jQuery.noConflict()(function($){
	"use strict";
	$(document).ready(function() {

		// Create the dropdown bases
		$("<select />").appendTo("#header .navigation");

		// Create default option "MENU"
		$("<option />", {
			"selected": "selected",
			"value"   : "",
			"text"    : "MENU"
		}).appendTo("#header .navigation select");

		// Populate dropdowns with the first menu items
		$("#header .navigation li a").each(function() {
			var el = $(this);
			$("<option />", {
				"value"   : el.attr("href"),
				"text"    : el.text()
			}).appendTo("#header .navigation select");
		});

		//make responsive dropdown menu actually work
		$("#header .navigation select").change(function() {
			window.location = $(this).find("option:selected").val();
		});

	});
});


/*-------------------------------------------------*/
/*	SuperFish Menu
/*-------------------------------------------------*/	
jQuery.noConflict()(function(){
	"use strict";
	jQuery('ul.sf-menu').superfish({
		delay:400,
		//pathClass:  'current-menu-item',
		//speed: 'fast',
		autoArrows:  true,	// disable generation of arrow mark-up 
		dropShadows: false
		//animation:   {opacity:'show'}
	});
});


/*-------------------------------------------------*/
/*	FitVids
/*-------------------------------------------------*/
jQuery.noConflict()(function($){
	"use strict";
	$(document).ready(function(){
	
		// Target your .container, .wrapper, .post, etc.
		$(".single-video-post, .single-media-thumb, .embed-youtube, .embed-vimeo, .video-frame").fitVids({ customSelector: "iframe[src^='http://www.dailymotion.com']"});
	});
});


/*-------------------------------------------------*/
/*	Google Pretty Code
/*-------------------------------------------------*/
jQuery.noConflict()(function($){
	"use strict";
	$(window).load(function() {
	
	var $window = $(window);
	// make code pretty
	window.prettyPrint && prettyPrint();

	});
});



/*-------------------------------------------------*/
/*	CUSTOM BACKGROUND
/*-------------------------------------------------*/
jQuery(window).load(function() {    
	"use strict";
	var theWindow		= jQuery(window),
		$bg				= jQuery("#bg-stretch"),
		aspectRatio		= $bg.width() / $bg.height();

	function resizeBg() {
			
		if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
			$bg
				.removeClass()
				.addClass('bg-height');
		} else {
			$bg
				.removeClass()
				.addClass('bg-width');
		}

            var pW = (theWindow.width() - $bg.width())/2;
                        $bg.css("left", pW);
            var pH = (theWindow.height() - $bg.height())/2;
                        $bg.css("top", pH);

	}

	theWindow	.resize(function() {
		resizeBg();
	}).trigger("resize");

});


/*-------------------------------------------------*/
/*	REMOVE PRELOAD CLASS
/*-------------------------------------------------*/
jQuery(window).load(function() {
	"use strict";
	jQuery('.ct-preload').removeClass('ct-preload');
});