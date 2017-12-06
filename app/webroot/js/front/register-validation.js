$().ready(function() {
		$.validator.setDefaults({
		submitHandler: function() {
			register($('#UserRegisterForm').serialize());
		}
	});

		// validate signup form on keyup and submit
		$("#UserRegisterForm").validate({
			rules: {
				"data[User][first_name]": "required",
				"data[User][surname]": "required",
				"data[User][email]": "required",
				"data[User][password]": {
					required: true,
					minlength: 8
				},
				"agree":"required"
			},
			messages: {
				"data[User][first_name]": "Please enter your first name",
				"data[User][surname]": "Please enter your last name",
				"agree": "Please Accept Terms and Policy."
			}
		});

		function register(data){
	var siteurl = $('#siteurl').val();
	var checkerror  = $('.email_error').text();
		if(checkerror == ''){
					$.ajax({
					url: siteurl+'register',
					type: 'POST',
					data: data,
					})
					.done(function(e) {			
							window.location = siteurl+'courses';
					})
					.fail(function() {
						console.log("error");
					})
					.always(function() {
						console.log("complete");
					});
		}
		
	}



     //email validation..
		$('#UserEmail').blur(function(event){
			var email = $(this).val();
			var baseurl = $('#baseurl').val();
	        $.ajax({
	           type: "POST",
	           url: baseurl+"users/checkemail",
	           data: {email:email},
	           success: function(data){
	           //result = jQuery.parseJSON(data);
				$('.email_error').text(data);	
				         
			}
	     });

	    });
	});