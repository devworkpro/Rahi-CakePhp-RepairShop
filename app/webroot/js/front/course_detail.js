$('#commentadd').submit(function(event) {
    var siteurl = $('#siteurl').val();
    var comment = $('#comment-text').val();
    var courseID = $(this).attr('attr-id');
    var currentDate = $(this).attr('date');

    $.ajax({
        url: siteurl + 'messages/addComment',
        type: 'POST',
        data: {
            comment: comment,
            course_id: courseID,

        },
    })
        .done(function(e) {
            var user = jQuery.parseJSON(e);

            var date = new Date();
            var html = "<li class='commennt_li cmt_" + user.comment_id + "'><div class='user_img'><img src=" + siteurl + "img/user_image/" + user.User.profile_pic + "></div>";
            html += "<div class='comnt_info'><h3>" + user.User.first_name + " " + user.User.surname + "<span>" + currentDate + " " + date.getHours() + ":" + date.getMinutes() + "</span></h3><h3><p>" + comment + "</p><i id=" + user.comment_id + " class='fa fa-trash-o'></i></h3>"
            $('.re_view .commentclass').hide().prepend(html).fadeIn('slow');
            $('#comment-text').val('');
        });

});

$(document).on('click', '.load_more', function(event) {
    var siteurl = $('#siteurl').val();
    var id = $("ul.commentclass li:last").attr("attr-id");
    var courseID = $("ul.commentclass li:last").attr("attr-cid");
    var userID = $('#user').attr("attr-user");
    $.ajax({
        url: siteurl + 'messages/loadmore',
        type: 'POST',
        data: {
            lid: id,
            course_id: courseID,
            user_id: userID
        },
    })
        .done(function(e) {

            if (e == '') {
                $('.load_more').text('No More Comments');
            }

            var comment = jQuery.parseJSON(e);
            var html = '';
            $.each(comment, function(key, value) {
                if (value.Comment.user_id == $('#user').attr("attr-user")) {

                    var dlt = "<i id='" + value.Comment.id + "' class='fa fa-trash-o'></i>";
                } else {

                    var dlt = "";
                }


                html += `<li attr-id="` + value.Comment.id + `" attr-cid="` + value.Comment.course_id + `"  class="commennt_li cmt_` + value.Comment.id + `">
											<div class="user_img">
												<img alt="" src="` + siteurl + `/img/user_image/` + value.User.profile_pic + `"></div>
											<div class="comnt_info">
												<h3>` + value.User.first_name + ` ` + value.User.surname + `<span>` + moment(value.Comment.created_at).format('DD-MMMM-YYYY H:m') + `</span></h3><h3>
												<p>` + value.Comment.comment + `</p>` + dlt + `
											 
											</h3></div>
											</li>`

            });

            $("ul.commentclass li:last").after(html);


        });


});


$(document).on('click', '.fa-trash-o', function(event) {

    var id = $(this).attr('id');
    //console.log(id);

    $.ajax({
        type: "POST",
        data: {
            lid: id
        },
        url: siteurl + "/messages/deleteComment",
        success: function(result) {
            // console.log(result);

            var success = parseInt(result);

            if (success == 1) {
                $(".cmt_" + id).remove();
            }


        }
    });

});

$('#UploadGPX').change(function(event) {

    var fileName = $(this).val();
    var extension = fileName.split('.');
    if (extension[extension.length - 1] != 'gpx') {
        sweetAlert("Oops...", "Please Upload Valid gpx file !!", "error");
    } else {
        var filename = fileName.replace(/^.*\\/, "");
        $('#uploadText').text(filename);
    }

});

$('#uploadG').click(function(event) {
    event.preventDefault();
    var fileName = $('#UploadGPX').val();
    var extension = fileName.split('.');
    if (fileName == '' || extension[extension.length - 1] != 'gpx') {
        sweetAlert("Oops...", "Please Upload Valid gpx file !!", "error");

    } else {
        $('#uploadfile').submit();
    }

});

$('#unlockCourse').click(function(event) {
    var href = $(this).attr('href');
    var rulesHref = $('.rules_page').attr('href');
    var checkFree = $('.checkFree').text();
    var checkExpired = $('.checkExpired').text();
    var text1 = "";
    if (checkFree == "0") {
        var text = 'I agree to unlock this free course.';
    } else {
        var text = 'I agree to unlock this course by using a course pass or subscription.';
    }
    if (checkExpired == "2") {
        var text1 = "<div class='form'><input class='terms' id='exp' type='checkbox'>I Acknowledge I am unlocking an expired course</div>";
        var expiredCondition = true;
    } else {
        var expiredCondition = false;
    }


    event.preventDefault();
    swal({
            title: "",
            text: "<div class='form'><input class='terms' id='terms' type='checkbox'> I agree to the <a target='_blank' href='" + rulesHref + "'>terms and rules</a> of this course</div><div class='form'><input class='terms' id='agree' type='checkbox'>" + text + "</div>" + text1 + "<span class='error_unlock'></span>",
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
                if (expiredCondition == true) {
                    if ($('#agree').prop("checked") && $('#terms').prop("checked") && $('#exp').prop("checked")) {
                        window.location = href;
                    } else {
                        $('.error_unlock').text('Please Confirm to Unlock');
                    }
                } else {

                    if ($('#agree').prop("checked") && $('#terms').prop("checked")) {
                        window.location = href;
                    } else {
                        $('.error_unlock').text('Please Confirm to Unlock');
                    }

                }
            }
        });
});



$(document).on('click', '.plotMap', function(event) {
    var ids = $(this).attr('id');
    var siteurl = $('#siteurl').val();
    $.ajax({
        url: siteurl + 'courses/plotMap',
        type: 'POST',
        data: {
            ids: ids
        },
    })
        .done(function(data) {
            var locations = jQuery.parseJSON(data);
            var map = new google.maps.Map(document.getElementById('load_map_div'), {
                zoom: 10,
                center: new google.maps.LatLng(-33.92, 151.25),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                navigationControl: false,
                mapTypeControl: false,
                scaleControl: false,
                draggable: false,
                zoomControl: false,
            });
            var points = [];
            var bounds = new google.maps.LatLngBounds();
            locations = jQuery.parseJSON(locations);
            $.each(locations, function(key, value) {
                 var lat = value.lat;
                 var lon = value.lon;
                 var p = new google.maps.LatLng(lat, lon);
                 points.push(p);
                 bounds.extend(p)
            });

             var poly = new google.maps.Polyline({
         // use your own style here
         path: points,
         strokeColor: "green",
         strokeOpacity: .7,
         strokeWeight: 4
       });

       var marker = new google.maps.Marker({
        position: points[points.length - 1],
        map: map,
        icon: 'flag.png'
      });
       
       poly.setMap(map);
       
       // fit bounds to track
       map.fitBounds(bounds);
            $("#load_map_div").show();
        });

});

var siteurl = $('#baseurl').val();
var timeDelay = 1000;
$('.leadFilter').change(function(event) {
    $('.loading_leaderboard').show();
    $('.table').css('opacity', '0.1');
    // MAKE THE AJAX CALL AFTER FEW SECONDS DELAY.
    setTimeout(filterLeaderboard, timeDelay);


});

function filterLeaderboard() {

    /* Act on the event */
    var gender = $('#gender_filter').val();
    var age = $('#age_filter').val();
    // var ActivityWith = $('#activityWith_filter').val();
    //var ActivityType = $('#activityType_filter').val();
    var cid = $('#cid').val();

    $.ajax({
        url: siteurl + 'courses/leaderboardSearch',
        type: 'GET',
        data: {
            gender: gender,
            age: age,
            cid: cid
        },
    })
        .done(function(data) {

            $('.loading_leaderboard').hide();
            $('.table').css('opacity', '1');
            var leaders = $.parseJSON(data);
            console.log(leaders);

            var html = "";

            $.each(leaders, function(index, val) {
                /*  var time = String(Math.round(val.Leaderboard.time*100)/100);
            time = time.replace(".", ":");*/
                if (val.User.username != '') {
                    var name = val.User.username;
                } else {
                    var name = val.User.first_name + ' ' + val.User.surname;
                }

                html += `<tr class="plotMap" id=` + val.Leaderboard.user_id + `-` + val.Leaderboard.gpx_id + `> 
                      <td>` + val[0].rank + `</td>             
                      <td class="plotMap" id=` + val.Leaderboard.user_id + `-` + val.Leaderboard.gpx_id + `><p class="borad_img">
                        <span class="l_user_name">` + name + `</span></p></td> 
                        <td>` + moment.unix(val.Leaderboard.run_date).format('DD-MMM-YYYY HH:MM') + `</td>
                        <td>` + val.Leaderboard.attempts + `</td>
                      <td>` + val.Leaderboard.time + `</td>
                      <td>` + val.Leaderboard.score + `</td>              
                                          
                  </tr>`;

            });

            $('.leader-filter').html(html);

        });



}

function show_error() {
    var error_message = $('.error_message').text();
    if (error_message != '') {
        sweetAlert(error_message);
    }
}

setTimeout(show_error, 500);



/*// loadmore courses //

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
                        <a data-toggle="modal" data-target="#uploadModal">    <input title="Upload Activity" id="`+val.Course.id+`" class="UploadGPX upload" type="file" name="UploadGPX" value="Upload GPX"></a>
                            <input type="hidden" id="cid" name="cid" value="`+val.Course.id+`">
                            </form>

                            `;
                } else {
                    unlockHtml = `<p class="text-left red"><a href="`+siteurl+`join/`+val.Course.id+`" attr-id="`+val.Course.type1+`" title="Locked" rule-key="`+val.Page.key+`"><i aria-hidden="true" type="`+classs+`" class="fa fa-lock red_lock unlockCourse" ></i></a></p>`;
                }



                if (val[0] != undefined) {
                    distance = '<p class="distance"> Distance from you : ' + Math.round((val[0].distance),3) + ' km</p>';
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
              </div>  `;

                html += '</div></div></div>';

                if (i % 4 == 3) {
                    html += '</div></div>';
                }
                i++;

              });


           // console.log(html);
             $(".location_map").after(html);
      
         });

    });*/