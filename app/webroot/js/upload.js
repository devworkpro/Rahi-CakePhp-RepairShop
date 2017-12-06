$(document).ready(function () {


	$('#banner_file').change(function () {	
		$.ajax({ 
           type: "POST",
           url: "http://112.196.42.180:4098/timmurigu/user/users/uploadimage",
           
           data:new FormData($('form')[0]),
 		   

           contentType: false,
		   cache: false,
		   processData:false,
		   enctype: 'multipart/form-data',
       
		    success: function(result){
		    	console.log(result);
		    	var parts = result.split("@");
				if(parts[0] == 'Success'){
					$('.update_banner_ajax').removeAttr("src");
					$('.update_banner_ajax').attr('src', parts[1]);
					//alert('Banner Uploaded Successfully.');
				}else if(parts[0] == 'ext'){
					alert("Only Jpg, Jpeg and Png Extensions allowed.");
				}
           }
         });
	});

	$('#profile_file').change(function () {	
		$.ajax({ 
           type: "POST",
           url: "http://112.196.42.180:4098/timmurigu/user/users/uploadpimage",
           
           data:new FormData($('form')[1]),
 		   

           contentType: false,
		   cache: false,
		   processData:false,
		   enctype: 'multipart/form-data',
       
		    success: function(result){
		    	console.log(result);
		    	var parts = result.split("@");
				if(parts[0] == 'Success'){
					$('.update_profile_ajax').removeAttr("src");
					$('.update_profile_ajax').attr('src', parts[1]);
					//alert('Profile Picture Uploaded Successfully.');
				}else if(parts[0] == 'ext'){
					alert("Only Jpg, Jpeg and Png Extensions allowed.");
				}
           }
         });
	});




});