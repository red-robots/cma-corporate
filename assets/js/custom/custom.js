/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	$(window).scroll(function() {    // this will work when your window scrolled.
		var height = $(window).scrollTop();  //getting the scrolling height of window
		if(height  > 100) {
			$("body").addClass('scrolled');
		} else{
			$("body").removeClass('scrolled');
		}
	});

	$('.gfield_html_formatted').css('padding-top', '20px');
	$('.ginput_container_email').css('margin-top', '-22px');
	if (window.matchMedia('(max-width: 767px)').matches) {
        $('.gform_button').css('width', '39%').css('margin', '0');
    }

    //var header_height = $('.n2-section-smartslider').height();
    //console.log(header_height);

    // if(header_height){
    // 	$('.mobilemenu').height(header_height);
    // } else {
    // 	$('.mobilemenu').height(562);
    // }

    
    $('h1.n2-ss-item-content').css('text-shadow', '2px 2px #333');

	$('.burger').on('click', function(){
		$(this).toggleClass('clicked');
		$('.mobilemenu').fadeToggle(500).toggleClass('show');
		$('body').toggleClass("openMenu");		
	});


	/* Navigation Height */
	navigation_dropdown();
	window.addEventListener("resize", function() {
	    navigation_dropdown();
	}, false);
	function navigation_dropdown() {
		
		if( $(".hero-wrapper").length > 0 ) {
			var sliderHeight = $(".hero-wrapper").outerHeight();
			var headerHeight = $("#masthead").outerHeight();
			var navHeight = sliderHeight-headerHeight;
			$(".mobilemenu").css("height",navHeight+"px");
		} else {
			var sliderHeight = $(".n2-section-smartslider").outerHeight();
			$(".mobilemenu").css("height",sliderHeight+"px");
		}
	}
	
	// $.fn.isInViewport = function() {
	//   var elementTop = $(this).offset().top;
	//   var elementBottom = elementTop + $(this).outerHeight();

	//   var viewportTop = $(window).scrollTop();
	//   var viewportBottom = viewportTop + $(window).height();

	//   return elementBottom > viewportTop && elementTop < viewportBottom;
	// };

	// var isPlaying = false;
	// $(window).on('resize scroll', function() {
	//     var iframeID = $("#video-placeholder");
	//     var autoPlay = $('.videoSection').attr("data-autoplay");
	//     if ( $('.videoSection').isInViewport() ) {
	//         //player.playVideo();
	//         isPlaying = true;
	//     } else {
	//         //player.pauseVideo();
	//         isPlaying = false;
	//     }

	//     console.log(isPlaying);
	// });


	// $(window).on('resize scroll', function() {
	//   $('.videoSection').each(function() {
	// 		var autoPlay = $(this).attr("data-autoplay");
	// 		var iframeID = $("#video-placeholder");
	// 		var iframeSrc = iframeID.attr("src");
	// 		var hasParam = '';
	// 		if (iframeSrc.indexOf("?") > -1) {
	// 			hasParam = '&';
	// 		}

			
			 

	//     if ($(this).isInViewport()) {
	//     	if(autoPlay) {
	// 			var newURL = iframeSrc + hasParam + 'autoplay=1';
	// 			iframeID.attr("src",newURL);
	// 		}

	//       //$('#fixed-' + activeColor).addClass(activeColor + '-active');
	//       //console.log("IN VIEWPORT");
	      	
	//     } else {
	//     	//iframeID.attr("src",iframeSrc);
	//     	//console.log("PASSED!");
	//       //$('#fixed-' + activeColor).removeClass(activeColor + '-active');
	//     }
	//   });
	// });


	

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();	

});// END #####################################    END