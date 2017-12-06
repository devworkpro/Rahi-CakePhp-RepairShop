$().ready(function() {
		
	$.validator.setDefaults({
		submitHandler: function() {
			login($('#UserLoginForm').serialize());
		}
	});
		// validate signup form on keyup and submit
		$("#UserLoginForm").validate({
			rules: {
				"data[User][email]": "required",
				"data[User][password]": {
					required: true,
					minlength: 8
				},
				"agree":"required"
			},
			messages: {
				"data[User][email]": "Please enter your email",
				"data[User][password]": "Please enter valid Password"
			}
		});

function login(data){
	var siteurl = $('#siteurl').val();
	//var user_id=$('.info').attr('attr-uid');	
	//console.log(user_id);
			$.ajax({
			url: siteurl+'login',
			type: 'POST',
			data: data,
			})
			.done(function(e) {			
				if(e == 'error'){
					$('.error').html('Please Check email/password combination');
				}else if(e == 'success'){
					window.location = siteurl+'dashboard';
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		

	}
		
		

		
	});


/*$().ready(function() {
		
	$.validator.setDefaults({
		submitHandler: function() {
			login($('#LoginForm').serialize());
		}
	});
		// validate signup form on keyup and submit
		$("#UserLoginForm").validate({
			rules: {
				"data[User][email]": "required",
				"data[User][password]": {
					required: true,
					minlength: 8
				},
				"agree":"required"
			},
			messages: {
				"data[User][email]": "Please enter your email",
				"data[User][password]": "Please enter valid Password"
			}
		});

function login(data){
	var siteurl = $('#siteurl').val();
	//var user_id=$('.info').attr('attr-uid');	
	//console.log(user_id);
			$.ajax({
			url: siteurl+'login',
			type: 'POST',
			data: data,
			})
			.done(function(e) {			
				if(e == 'error'){
					$('.error').html('Please Check email/password combination');
				}else if(e == 'success'){
					window.location = siteurl+'dashboard';
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		

	}
		
		

		
	});
*/