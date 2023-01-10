(function($) {
  "use strict";
  
	$('#save').on('click', function () {
		var names = $("#names").val();
		var emails = $("#emails").val();
		var subject = $("#subject").val();
		var message = $("#message").val();
		var site = "Newtech";
		var contact = {
			names: names,
			emails: emails,
			subject: subject,
			message: message,
			site: site
		};
		
		if (emails) {
			$.ajax({
				type: 'POST',
				url: "contactform/contactform.php",
				contentType: 'application/json',
				data: JSON.stringify(contact),
				success: function (response) {
					if (response['success'] == 'success') {
					  $("#sendmessage").addClass("show");
					  $("#errormessage").removeClass("show");
					  $('.contactForm').find("input, textarea").val("");
					} else {
					  $("#sendmessage").removeClass("show");
					  $("#errormessage").addClass("show");
					  $('#errormessage').html(msg);
					}
				},
				failure: function (response) {
				}
			}).then(function () {
				// ...
			});
		}
	});
})(jQuery);
