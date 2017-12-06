var siteurl = $('#baseurl').val();
var siteurl1 = $('#siteurl').val();
var timeDelay = 1000;
$('#typesearch , #statussearch , #freepaid , #keyword').change(function(event) {
    $('.loading_img').show();
    $('.location_map').css('opacity', '0.1');
    // MAKE THE AJAX CALL AFTER FEW SECONDS DELAY.
    setTimeout(searchCourse, timeDelay);
});

jQuery(document).on('keydown', '#searchKM, #searchLocation', function(ev) {
    if (ev.which === 13) {
        $('.loading_img').show();
        $('.location_map').css('opacity', '0.1');

        setTimeout(searchCourse, timeDelay);
    }
});

var newDate = '';
$('#daterange').datepicker({

    multidate: 2,
    multidateSeparator: ' - ',
    format: "dd/mm/yyyy"


}).on('changeDate', function(e) {
    if (e.dates.length == 2) {
        if (e.dates[0] > e.dates[1]) {
            var preDate = $('#daterange').val().split('-')
            newDate = preDate[1] + ' - ' + preDate[0];
            $('#daterange').val(newDate);
        }
    }
}).on('hide', function(e) {
    if (newDate != '') {
        $('#daterange').val(newDate);
      
    }
      $('.loading_img').show();
        $('.location_map').css('opacity', '0.1');
        setTimeout(searchCourse, timeDelay);
});

function searchCourse() {

    /* Act on the event */
    var typeVal = $('#typesearch').val(); // Type Search Val
    var statusVal = $('#statussearch').val(); // Type Search Val
    var searchText = $('#keyword').val();
    var freePaid = $('#freepaid').val();
    var inKM = $('#searchKM').val();
    var searchLocation = $('#searchLocation').val();
    var userid = $('#userid').val();
    var date = $('#daterange').val();

    $.ajax({
        url: siteurl + 'ajaxSearch',
        type: 'GET',
        data: {
            type: typeVal,
            status: statusVal,
            'searchText': searchText,
            'freepaid': freePaid,
            'inKM': inKM,
            'location': searchLocation,
            'date': date
        },
        success: function(e) {
            $('.location_map').css('opacity', '1.0');
            $('.loading_img').hide();
            var obj = jQuery.parseJSON(e);
            var html = '';
            var i = 0;
            var courseType;
            var distance = '';
            var minutes, seconds, hours, days, unlock, unlockHtml;
            var label = '';
            var current_date = moment().format("DD/MM/YYYY");
            var classs;
            if (obj.length == 0) {
                $('.empty_r').remove();
                $('.filter_list').after('<div class="empty_r">No Course Found</div>');
            } else {
                $('.empty_r').remove();
            }
            $.each(obj, function(index, val) {

                current_date = moment(current_date, 'DD/MM/YYYY');
                var a = moment(val.Course.start_time, 'DD/MM/YYYY');
                var b = moment(val.Course.end_time, 'DD/MM/YYYY');
                var days = a.diff(current_date, 'days'); // Upcoming
                label = 'Start in '+days + ' days';
                classs='upcoming';
                if (days < 0) {
                    days = b.diff(current_date, 'days'); // Current
                    label = days + ' days remaining';
                    classs='current';
                    if (days < 0) {
                        label = 'Expired'; // Expired
                        classs = 'expired';
                    }
                }


                $.each(val.CourseUnlocked, function(index, val) {
				//if(){
					
					//var url
				//}
				// For locck-unlock icon
                    if (val.user_id == userid) {
                        unlock = true;
                    }
                });

                if (unlock == true) {
                    unlock = false;
                    unlockHtml = `<p class="text-left red"><a><i aria-hidden="true" class="fa fa-check-circle green_lock"></i></a>
                            <span class="course_download_btn">
                            <a title="Download Course" href="`+siteurl+`courses/downloadImage/`+$('#pdfname').text()+'-'+val.Course.id+`"><i class="fa fa-download" aria-hidden="true"></i></a></span>
                            </p>
                            <form id="uploadfile-`+val.Course.id+`" class="fileUpload btn btn-default" method="post" enctype="multipart/form-data" action="`+siteurl1+`courses/UploadGPX">
                            <span class="upload_btn"><i class="fa fa-upload" aria-hidden="true"></i></span>
                        <a data-toggle="modal" data-target="#uploadModal" class="uploadG" data-id="`+val.Course.id+`">    <input title="Upload Activity" id="`+val.Course.id+`" class="UploadGPX upload" type="file" name="UploadGPX" value="Upload GPX"></a>
                            </form>

                            `;
                } else {
                    unlockHtml = `<p class="text-left red"><a href="`+siteurl+`courses/join/`+val.Course.id+`" attr-id="`+val.Course.type1+`" title="Locked" rule-key="`+val.Page.key+`" type="`+classs+`" class="fa fa-lock red_lock unlockCourse" ></a></p>`;
                }



                if (val[0].distance != undefined) {
                    distance = '<p class="distance"> Distance from you : ' + Math.round(val[0].distance) + ' km</p>';
                }

                if (val.Course.type2 == 0) {
                    courseType = 'Line';
                } else if (val.Course.type2 == 1) {
                    courseType = 'Score';
                } else if (val.Course.type2 == 2) {
                    courseType = 'Scatter';
                }
                if (i % 4 == 0) {
                    html += '<div class="location_map"><div class="row">';
                }
                html += `<div class="col-xs-12 col-sm-6 col-md-3 `+classs+`">
            				<div class="map1">
              				<div class="map_lc">`;
					var url = siteurl1 + `img/map_image1/` + val.Course.id +  `-` + val.Course.Name + `.png`;
				//console.log(val);	
				//var img = $('img');
var image = new Image(); 
image.src = siteurl1 + `img/map_image1/` + val.Course.id +  `-` + val.Course.Name + `.png`;
if (image.width == 0) {
   html += '<img src="https://maps.googleapis.com/maps/api/staticmap?center=' + val.Course.latitude + ',' + val.Course.longitude + '&size=461x272&zoom=16&maptype=roadmap&markers=icon:'+siteurl1+'img/s.png|color:red|' + val.Course.latitude + ',' + val.Course.longitude + '">';
}else{
     html += `<img src="`+ url +`">`;
}

                html += '</div>';

                html += ` <div class="cours_info yellow">
			   			  <h4 class="text-left">` + courseType + `</h4>
			   			  <h2>` + val.Course.Name + `</h2>`;
                html += `<div class="attempts">
				  		  ` + distance + `
                          <p class="distance"> ` + label + `</p>
				  		  </div>
				  		  <a href="` + siteurl + `course/` + val.Course.id + `-` + val.Course.slug + `-` + statusVal + `" class="btn btn-default work_btn hvr-sweep-to-right">SEE MORE</a>
				  		  <div class="btm_info">
                 			 <span class="ryt_info">
                   				<font>Participant</font>: ` + val.CourseUnlocked.length + `
                  			 </span>
                 		  </div>
                 		  <div class="lock-unlock">
  								` + unlockHtml + `
						  </div>	
				  `;

                html += '</div></div></div>';

                if (i % 4 == 3) {
                    html += '</div></div>';
                }
                i++;
            });
            $('.location_map').remove();
            $('.filter_list').after(html);
        }
    });

}

$(document).on('click', '.unlockCourse', function(event) { 
    var href = $(this).attr('href');
    var rulesHref = $('.rules_page').attr('href');
     var checkFree = $(this).attr('attr-id');
     var type = $(this).attr('type');
     var rule = siteurl+'pages/page/'+$(this).attr('rule-key');
     var expiredTick = "";
    if(checkFree == "0"){
        var text = 'I agree to unlock this free course.';
    }else{
         var text = 'I agree to unlock this course by using a course pass or subscription.';
    }

    if(type == 'expired'){
       expiredTick = "<div class='form'><input class='terms' id='exp' type='checkbox'>I Acknowledge I am unlocking an expired course</div>";
       var expiredCondition = true;
    }else{
       var expiredCondition = false;
    }
    event.preventDefault();
    swal({
            title: "",
           text: "<div class='form'><input class='terms' id='terms' type='checkbox'> I agree to the <a target='_blank' href='" + rule + "'>terms and rules</a> of this course</div><div class='form'><input class='terms' id='agree' type='checkbox'>"+text+"</div>"+expiredTick+"<span class='error_unlock'></span>",
            html: true,
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Unlock",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {

            if(expiredCondition == true){
                     if ($('#agree').prop("checked") && $('#terms').prop("checked") && $('#exp').prop("checked")) {
                    window.location = href;
                } else {
                    $('.error_unlock').text('Please Confirm to Unlock');
                }
            }else{

                 if ($('#agree').prop("checked") && $('#terms').prop("checked")) {
                   window.location = href;
                   //console.log(href);
                } else {
                    $('.error_unlock').text('Please Confirm to Unlock');
                }

            }
               
            }
        });
});

$(document).on('change', '#UploadGPX', function(event) { 
    var fileName = $(this).val();
    var extension = fileName.split('.');
    var formid = $(this).attr('id');
    if (extension[extension.length - 1 ] != 'gpx') {
       sweetAlert('Please Upload Valid file');
    }else{
       var filename = fileName.replace(/^.*\\/, "");
         $('#uploadText').text(filename);
    }

});

$(document).on('click', '.uploadG', function(event) { 
    console.log('s');
   $('#cid').val($(this).attr('data-id'));

});

$(document).on('click', '#uploadG', function(event) {
 event.preventDefault();
  var fileName = $('#UploadGPX').val();
  var extension = fileName.split('.');
    if(fileName == '' ||  extension[extension.length - 1 ] != 'gpx'){
     sweetAlert('Please Upload Valid file');

 }else{
  $('#uploadfile').submit();
 }
  
});


function show_error(){
  var error_message = $('.error_message').text();
  if(error_message != ''){
    sweetAlert(error_message);
  }
}

setTimeout(show_error,500);

// loadmore courses //

$(document).on('click', '.load_more', function(event) { 
              var siteurl = $('#siteurl').val();
              var distance= $(".col-md-3:last").attr("attr-cid");
              
              $.ajax({
              url: siteurl + 'messages/loadmore_courses',
              type: 'POST',
              data: {
                  distance:distance
              },
            })
              .done(function(e) {
                if(e == ''){
        $('.load_more').text('No More Courses');
      }
                var load_courses = jQuery.parseJSON(e);
                var html= '';
                var i = 0;
                var classs;
                  
            var courseType;
            var distance = '';
            var minutes, seconds, hours, days, unlock, unlockHtml;
            var label = '';
            var current_date = moment().format("DD/MM/YYYY");
             
                
                $.each(load_courses, function(index, val) {

                     current_date = moment(current_date, 'DD/MM/YYYY');
                var a = moment(val.Course.start_time, 'DD/MM/YYYY');
                var b = moment(val.Course.end_time, 'DD/MM/YYYY');
                var days = a.diff(current_date, 'days'); // Upcoming
                label = 'Start in '+days + ' days';
                classs='upcoming'; 
                if (days < 0) {
                    days = b.diff(current_date, 'days'); // Current
                    label = days + ' days remaining';
                    classs='current';
                    if (days < 0) {
                        label = 'Expired'; // Expired
                        classs = 'expired';
                    }
                }


                $.each(val.CourseUnlocked, function(index, val) { // For locck-unlock icon
                    if (val.user_id == userid) {
                        unlock = true;
                    }
                });

                if (unlock == true) {
                    unlock = false;
                    unlockHtml = `<p class="text-left red"><a><i aria-hidden="true" class="fa fa-check-circle green_lock"></i></a>
                            <span class="course_download_btn">
                            <a title="Download Course" href="`+siteurl+`courses/downloadImage/`+$('#pdfname').text()+'-'+val.Course.id+`"><i class="fa fa-download" aria-hidden="true"></i></a></span>
                            </p>
                            <form id="uploadfile-`+val.Course.id+`" class="fileUpload btn btn-default" method="post" enctype="multipart/form-data" action="`+siteurl1+`courses/UploadGPX">
                            <span class="upload_btn"><i class="fa fa-upload" aria-hidden="true"></i></span>
                        <a data-toggle="modal" data-target="#uploadModal">    <input title="Upload Activity" id="`+val.Course.id+`" class="UploadGPX uploadG upload" type="file" name="UploadGPX" value="Upload GPX"></a>
                           
                            </form>

                            `;
                } else {
                    unlockHtml = `<p class="text-left red"><a href="`+siteurl+`join/`+val.Course.id+`" attr-id="`+val.Course.type1+`" title="Locked" rule-key="`+val.Page.key+`"><i aria-hidden="true" type="`+classs+`" class="fa fa-lock red_lock unlockCourse" ></i></a></p>`;
                }



                if (val[0] != undefined) {
                    distance = '<p class="distance"> Distance from you: ' + Math.round((val[0].distance),3) + ' km</p>';
                }

                if (val.Course.type2 == 0) {
                    courseType = 'Line';
                } else if (val.Course.type2 == 1) {
                    courseType = 'Score';
                } else if (val.Course.type2 == 2) {
                    courseType = 'Scatter';
                }
                if (i % 4 == 0) {
                    html += '<div class="location_map"><div class="row">';
                }
                html += `<div class="col-xs-12 col-sm-6 col-md-3 `+classs+`" attr-cid="`+Math.round(val[0].distance)+`">
                    <div class="map1">
                      <div class="map_lc">`;
                html += '<img src="https://maps.googleapis.com/maps/api/staticmap?center=' + val.Course.latitude + ',' + val.Course.longitude + '&size=461x272&zoom=16&maptype=roadmap&markers=icon:'+siteurl1+'img/s.png|color:red|' + val.Course.latitude + ',' + val.Course.longitude + '">';
                html += '</div>';

                html += ` <div class="cours_info yellow">
                <h4 class="text-left">` + courseType + `</h4>
                <h2>` + val.Course.Name + `</h2>`;
                html += `<div class="attempts">
                ` + distance + `
                          <p class="distance"> ` + label + `</p>
                </div>
                <a href="` + siteurl + `course/` + val.Course.id + `-` + val.Course.slug + `-` + val.Course.type2 + `" class="btn btn-default work_btn hvr-sweep-to-right">SEE MORE</a>
                <div class="btm_info">
                       <span class="ryt_info">
                          <font>Participant</font>: ` + val.CourseUnlocked.length + `
                         </span>
                      </div>
                      <div class="lock-unlock">
                  ` + unlockHtml + `
              </div>  
          `;

                html += '</div></div></div>';

                if (i % 4 == 3) {
                    html += '</div></div>';
                }
                i++;

              });


            console.log(html);
             $(".location_map:last-child").after(html);
      
         });

    });