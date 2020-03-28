jQuery(document).ready(function ($) {

	// $(window).off('beforeunload');

	// $("body.toplevel_page_acf-options form#post").on("submit",function(e){
	// 	e.preventDefault();
	// 	var adminURL = wpAdminURL + 'admin.php?page=acf-options';
	// 	var successURL = adminURL + '&message=1';
	// 	var data = $(this).serializeArray();
	// 	$.post(adminURL, data, function(response){
 //            if(response) {
 //            	window.location.href = successURL;
 //            	//window.history.pushState( null, document.title, successURL );
 //            }
 //        });
 //        return false;

	// });


	/* SEND EMAIL TO TEAM */
	$(document).on("keyup blur","#emailteamform .form-control",function(){
		var val = $(this).val().replace(/\s/g,'');
		if(val) {
			$(this).removeClass("error");
		}
	});

	$("#emailteamform").on("submit",function(e){
		e.preventDefault();
		var form = $(this);
		var formdata = $(this).serialize();
		var errors = [];
		form.find('.form-control.required').each(function(){
			var inputName = $(this).attr("name");
			var val = $(this).val().replace(/\s/g,'');
			if(val=='') {
				errors.push(inputName);
				$(this).addClass("error");
			} else {
				$(this).removeClass("error");
			}
		});

		if( $(errors).length > 0 ) {
			var errorMessage = '<div class="alert alert-danger">Fill-in the required field(s).</div>';
			$("#response").html(errorMessage);
		} else {
			var captchaVal = $("#captchagen").attr("data-source");
			$.ajax({
				type: "POST",
				url : myAjax.ajaxurl,
				data: formdata + '&captchashown='+captchaVal,
				dataType: "json",
				beforeSend:function(){
					$("#waiting").addClass('show');
					$("#response").html("");
					$(".form-control").removeClass("error");
				},
				success: function(obj) {
					var success = obj.success;
					var errorType = obj.error;
					var message = obj.message;

					if(success) {
						form.find('.form-control.required').each(function(){
							$(this).val("");
							$(this).removeClass("error");
						});
						form[0].reset();
						$("#response").html(message);
						$("#response").focus();
						$(".teamform").remove();
						//$(".captcha-field").load(currentURL+'?contact=yes'+ " .captchaInner",function(){ });
					} else {
						$("#response").html(message);
						if(errorType=='captcha') {
							$("input#strcaptcha").addClass("error").select();
						}
					}
				},
				complete:function(){
					setTimeout(function(){
						$("#waiting").removeClass('show');
					},500);
				},
				error: function (xhr, desc, err) {
					console.log(xhr);
					console.log(desc);
					console.log(err);
	            },
	        });
		}
	});

});
