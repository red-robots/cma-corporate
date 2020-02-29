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

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();	

	/* Stop Hash from showing on the browser URL */
	$("ul.mobilemain a").on("click",function(e){
		var link = $(this).attr("href");
		if(link=='#') {
			e.preventDefault();
		}
	});

	/* Pagination without reloading the page */
	$(document).on("click",".pagination-search a",function(e){
		e.preventDefault();
		var link = $(this).attr('href');
		var pg = link.split("?")[1];
		var pageURL = $(".pagination-search").attr("data-pageurl");
		var newURL = pageURL + '?' + pg;
		$("#search-results-div").load(newURL + " .searchInner",function(){
			window.history.pushState("",document.title,newURL);
		});
	});

});// END #####################################    END