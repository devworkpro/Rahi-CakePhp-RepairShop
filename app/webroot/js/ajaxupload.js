(function($){
	function fireEvent(obj, evt) {
		  var fireOnThis = obj;
		  if (document.createEvent) {
		    var evObj = document.createEvent("MouseEvents");
		    evObj.initEvent(evt, true, false);
		    fireOnThis.dispatchEvent(evObj);
		  }else if (document.createEventObject) {
		    fireOnThis.fireEvent("on" + evt);
		  }
		}
	var ajaxUploadIframe;
    $.fn.ajaxUpload = function(options) {
    	var settings = $.extend({
    		accept : ['*'],
    		name: 'file',
    		method: 'POST',
    		data: [],
    		onSubmit: function(){ return true;},
    		onComplete: function(){}
    	},options);
    	
        //Iterate over the current set of matched elements
        return this.each(function() {
        	//create form
        	var button = $(this);
        	var methods = {
        		setData: function(data) {
        			settings.data = data;
        		}
        	};

        	var form = $('<form method="' + settings.method + '" enctype="multipart/form-data" action="' + settings.action +'"><input name="' + settings.name + '" type="file" /></form>');
        	var input = form.find('input[name=' + settings.name + ']');
        	input.css('display','block');
        	input.css('overflow','hidden');
        	input.css('position', 'absolute');
        	input.css('width',$(this).width() + 20);
        	input.css('height',$(this).height() + 10);
        	input.css('text-align','right');
        	input.css('opacity','0');

        	
        	input.change(function(e){
        		form.find('input[type=hidden]').remove();
        		settings.onSubmit.call(methods, $(this));
        		
        		if (settings.data) {
	        		$.each(settings.data, function(n,v){
	        			form.append($('<input type="hidden" name="' + n +'" value="' + v +'">'));
	        		});
        		}
        		
    			form.submit();
        		
        	});
        	
        	$(document.body).append(form);
        	var offset = $(this).position();

        	input.offset(offset);
        	//check if iframe exists
        	if (!ajaxUploadIframe) {
	    		ajaxUploadIframe = $('<iframe id="__ajaxUploadIFRAME" name="__ajaxUploadIFRAME"></iframe>').attr('style','style="width:0px;height:0px;border:0px solid #fff;"').hide();
	    		ajaxUploadIframe.attr('src', '');
	    		$(document.body).append(ajaxUploadIframe);
        	}
        		
        	ajaxUploadIframe.load(function(){
    			var response = $.parseJSON($(this).contents().find('html body').html());
    			settings.onComplete(response);
    		});
        	
        	//on file submit
        	form.submit(function(e){
        		form.attr('target','__ajaxUploadIFRAME');
        	});
         
        });
    }
     
})(jQuery);