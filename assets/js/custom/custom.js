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

	if( $(".custom-search-container select.search-selector").length > 0 ) {
		$(document).on('change','select.search-selector',function(){
			var dform = $(this).parents(".custom-search-container form");
			var selected = $(this).find('option:selected').val();
			if(selected=='community_name') {
				dform.find("input.search-field").attr('placeholder','name...');
			} else {
				dform.find("input.search-field").attr('placeholder','zip, address, or city');
			}
		});
	}

	if( $(".vendorInfoPopUp").length > 0 ) {
		$(document).on("click",".vendorInfoPopUp",function(e){
			e.preventDefault();
			var id = $(this).attr("data-id");
			$.ajax({
				url : frontajax.ajaxurl,
				type : 'post',
				dataType : "json",
				data : {
					action : 'vendor_details',
					post_id : id
				},
				beforeSend:function(){
					$("#spinner").addClass("show");
				},
				success : function( response ) {
					if(response.content) {
						var htmlContent = response.content;
						var pagetitle = response.title;
						$.dialog({
						    title: pagetitle,
						    theme: "material",
						    content: htmlContent,
						    draggable: false,
						    backgroundDismiss: true,
						    columnClass: 'col-md-6',
						    onOpenBefore: function () {
						    	$(".jconfirm").addClass('vendor');
						    },
						    onOpen:function(){
						    	$("#spinner").removeClass("show");
						    }
						});
					}
				},
				complete:function(){

				}
			});

		});
	}


	$("#expandable .xtitle").on('click',function(e){
		e.preventDefault();
		$(this).parents('.panels').toggleClass('open');
		$(this).next('.xtext').slideToggle();
	});


});// END #####################################    END