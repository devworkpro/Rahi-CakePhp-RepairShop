 var map;
 var placeMarker;
 var locations = [];
 var totalscore = 0;
 var markersArray = {};
 var baseurl = document.getElementById('baseurl').value;
 var exist = 0;
 var icon;
 var strokeWeight;
 var scale;
 var point;
 var type = 's';
 var control_name;
 var marker;
 var startImage = baseurl + 'img/s.png';
 var finishImage = baseurl + 'img/finish.png';
 var startFinishImage = baseurl + 'img/start-finish.png';
 var start_finish;
 var start, finish;
 var numberControl = 0;
 var s = "s";
 var c = "c";
 var f = "f";


 function initMap() {
     var myLatlng = {
         lat: -25.363,
         lng: 131.044
     };


     map = new google.maps.Map(document.getElementById('map'), {
         zoom: 16,
         center: myLatlng

     });
     start = {
         url: startImage,
         origin: new google.maps.Point(0, -28)
     };
     finish = {
         url: finishImage,
         origin: new google.maps.Point(0, -28)
     };
     start_finish = {
         url: startFinishImage,
         origin: new google.maps.Point(0, -28)
     };
     var geocoder = new google.maps.Geocoder();

     var autocomplete = new google.maps.places.Autocomplete(document.getElementById('pac-input'));
     autocomplete.bindTo('bounds', map);

     var infowindow = new google.maps.InfoWindow();
     var marker = new google.maps.Marker({
         map: map,
         anchorPoint: new google.maps.Point(0, -29)
     });

     autocomplete.addListener('place_changed', function() {
         infowindow.close();
         marker.setVisible(false);
         var place = autocomplete.getPlace();
         if (!place.geometry) {
             window.alert("Autocomplete's returned place contains no geometry");
             return;


         }

         // If the place has a geometry, then present it on a map.
         if (place.geometry.viewport) {
             map.fitBounds(place.geometry.viewport);
         } else {
             map.setCenter(place.geometry.location);
             map.setZoom(17);
         }

         marker.setIcon({
             url: place.icon,
             size: new google.maps.Size(71, 71),
             origin: new google.maps.Point(0, 0),
             anchor: new google.maps.Point(17, 34),
             scaledSize: new google.maps.Size(35, 35)
         });

     });



     //marker.....


     map.addListener('click', function(event) {

         placeMarker(event.latLng, map);

     });

     placeMarker = function(location, map) {
         var checkControl = document.getElementById('check_control').value;
         if (location != undefined) {
             localStorage.setItem("location", JSON.stringify(location));
             localStorage.setItem("map", map);
         }

         if (checkControl == 'startButton') {
             geocoder.geocode({
                     'latLng': location
                 },
                 function(results, status) {
                     if (status == google.maps.GeocoderStatus.OK) {
                         if (results[0]) {
                             var add = results[0].formatted_address;
                             var value = add.split(",");
                             count = value.length;
                             country = value[count - 1];
                             state = value[count - 2];
                             city = value[count - 3];
                             document.getElementById('pac-input').value = city + state;

                         }
                     } else {
                         alert("Geocoder failed due to: " + status);
                     }
                 }
             );
             document.getElementById('CourseLongitude').value = location.lng();
         document.getElementById('CourseLatitude').value = location.lat();
             submitScore(110);
         } else if (checkControl == 'finishButton') {
             submitScore(111);
         } else {
             $('#myModal').modal('show');
         }




     }


     function deleteOverlays() {
         if (markersArray) {
             for (i in markersArray) {
                 markersArray[i].setMap(null);
             }
             markersArray.length = 0;
         }
     }
 }

 function submitScore(controlId) {

     if (controlId != 110 && controlId != 111) {
         $.each(locations, function(index, val) {
             if (val.controlid == controlId) {
                 exist = 1;
             }

         });
     } else {
         exist = 0;
     }

     if (exist == 1) {
         $('.control_error').text('Control Id already exist');
         exist = 0;
     } else {

         switch (true) {

             case (controlId >= 10 && controlId < 20):
                 score = 10;
                 break;
             case (controlId >= 20 && controlId < 30):
                 score = 20;
                 break;
             case (controlId >= 30 && controlId < 40):
                 score = 30;
                 break;
             case (controlId >= 40 && controlId < 50):
                 score = 40;
                 break;
             case (controlId >= 50 && controlId < 60):
                 score = 50;
                 break;
             case (controlId >= 60 && controlId < 70):
                 score = 60;
                 break;
             case (controlId >= 70 && controlId < 80):
                 score = 70;
                 break;
             case (controlId >= 80 && controlId < 90):
                 score = 80;
                 break;
             case (controlId >= 90 && controlId < 100):
                 score = 90;
                 break;
             case (controlId >= 100 && controlId < 109):
                 score = 100;
                 break;
             default:
                 score = 0;
                 break;
         }
         var checkControl = document.getElementById('check_control').value;
         var scorelocation = JSON.parse(localStorage.location);
         if (checkControl == 'startButton') {
             type = 's';

             $.each(locations, function(index, val) { // Remove Previous starting point
                 if (val != undefined) {
                     if (val.type == 's') {
                         locations.splice(index, 1);
                         var marker = markersArray[val.controlid]; // find the marker by given id
                         console.log(markersArray[val.controlid]);
                         marker.setMap(null);
                         $('#c-' + val.controlid).parent('tr').remove();
                     }
                 }

             });

             control_name = 'Start';
             var classs = 'start';
             var marker = new MarkerWithLabel({
                 position: scorelocation,
                 map: map,
                 labelClass: classs, // the CSS class for the label
                 labelInBackground: false,
                 draggable: true,
                 icon: start
             });

         } else if (checkControl == 'controlButton') {
             icon = google.maps.SymbolPath.CIRCLE;
             strokeWeight = 2;
             scale = 10;
             point = 30;
             type = 'c';
             control_name = controlId;
             var stringMarker = String(controlId) + '<span class="score">(' + score + ')</span>';
             $('#control-' + controlId).css('background', 'red');
             var classs = 'labels';
             var marker = new MarkerWithLabel({
                 position: scorelocation,
                 map: map,
                 labelContent: stringMarker,
                 labelAnchor: new google.maps.Point(10, point),
                 labelClass: classs, // the CSS class for the label
                 labelInBackground: false,
                 draggable: true,
                 icon: {
                     path: icon,
                     scale: scale,
                     strokeColor: 'red',
                     strokeWeight: strokeWeight

                 }
             });
             numberControl++;
             $('#totalControls').text(numberControl);

         } else if (checkControl == 'finishButton') {
             type = 'f';
             control_name = 'Finish';
             var stringMarker = 'Finish';
             var classs = 'finish';
             $.each(locations, function(index, val) { // Remove Previous starting point

                 if (val.type == 'f') {
                     locations.splice(index, 1);
                     var marker = markersArray[val.controlid]; // find the marker by given id
                     marker.setMap(null);
                     $('#c-' + val.controlid).parent('tr').remove();
                 }

             });
             var marker = new MarkerWithLabel({
                 position: scorelocation,
                 map: map,
                 labelClass: classs, // the CSS class for the label
                 labelInBackground: false,
                 draggable: true,
                 icon: finish
             });
         }







         markersArray[controlId] = marker;
         google.maps.event.addListener(markersArray[controlId], 'dragend', function(event) {
             var latdrag = this.getPosition().lat();
             var londrag = this.getPosition().lng();

             $.each(locations, function(index, val) {
                 if (val.controlid == controlId) {
                     locations[index].lat = latdrag;
                     locations[index].lon = londrag;
                 }
             });
             var jsonlocations = JSON.stringify(locations);
             document.getElementById('CoursePositions').value = jsonlocations;

         });



         // set marker on table
         /* Add New Row */
         var newrow = '<tr>';
         newrow += '<td id="c-' + controlId + '">' + control_name + '</td>';
         newrow += '<td id="s-' + controlId + '">' + score + '</td>';
         if (checkControl == 'controlButton') {
             newrow += '<td><i class="fa fa-edit" onclick="editScore(' + controlId + ')"></i>';
             newrow += '<i class="fa fa-remove" onclick="removeScore(' + controlId + ',' + type + ')"></i></td>';
         } else {
             newrow += '<td><i class="fa fa-remove" onclick="removeScore(' + controlId + ',' + type + ')"></i></td>';
         }

         newrow += '</tr>';
         $('#info-score tr:last-child').after(newrow);
         /* Calculate Score */
         var prevScore = parseInt($('#totalScore').text());
         var totalscore = prevScore + score;
         $('#totalScore').text(totalscore);
         $('#CourseMaxScore').val(totalscore);

         /* Add New Row */

         locations.push({
             lat: scorelocation.lat,
             lon: scorelocation.lng,
             score: score,
             controlid: controlId,
             type: type
         });

         var jsonlocations = JSON.stringify(locations);
         document.getElementById('CoursePositions').value = jsonlocations;
         $('#closeScore').click();
         $('.control_error').text('');
         // empty error text

     }
 }


 function editScore(controlId) {

     $('#controlval').val(controlId);
     $('#prevScore').val($('#s-' + controlId).text());
     $('#myModalScore').modal('show');
 }

 function editScoreVal(score) {
     var controlId = $('#controlval').val();
     $.each(locations, function(index, val) {
         if (val.controlid == controlId) {
             locations[index].score = score;
         }

     });


     var prevScore = parseInt($('#totalScore').text());
     var prevScoreItem = parseInt($('#prevScore').val());
     var totalscore = prevScore + parseInt(score) - prevScoreItem;
     $('#totalScore').text(totalscore);
     $('#CourseMaxScore').val(totalscore);
     var newLabel = String(controlId) + '<span class="score">(' + score + ')</span>';
     var marker = markersArray[controlId]; // find the marker by given id
     marker.set('labelContent', newLabel);
     $('#s-' + controlId).text(score);
     $('#closeScoreVal').click();
     var jsonlocations = JSON.stringify(locations);
     document.getElementById('CoursePositions').value = jsonlocations;


 }

 function removeScore(controlId,type) {
     $.each(locations, function(index, val) {
         if (val.controlid == controlId) {
             locations.splice(index, 1)
         }

     });
     var updatelocations = JSON.stringify(locations);
     var prevScore = parseInt($('#totalScore').text());
     var prevScoreItem = parseInt($('#s-' + controlId).text());
     var totalscore = prevScore - prevScoreItem;
     $('#totalScore').text(totalscore);
     $('#CourseMaxScore').val(totalscore);
     document.getElementById('CoursePositions').value = updatelocations;
     $('#c-' + controlId).parent('tr').remove(); // remove row
     $('#control-' + controlId).css('background', 'none'); // remove color
     var marker = markersArray[controlId]; // find the marker by given id
     marker.setMap(null);
     if (type == 'c') {
         numberControl--;
         $('#totalControls').text(numberControl);
     }

 }

 google.maps.event.addDomListener(window, 'load', initMap);

 $().ready(function() {

     $("#controlform").validate({

        submitHandler: function() {

             var controlid = $('#controlid').val();
             submitScore(controlid, 'c');
             $('#controlid').val('');
             return false;

         },
         rules: {
             "controlid": {
                 required: true,
                 number: true,
                 min:1,
                 max: 109
             }
         },
         messages: {
             "controlid": "Please enter valid control id"
         }
     });

     $("#CourseCreateForm").validate({
         rules: {
             "data[Course][time_limit]": {
                 number: true,
                 min: 1,
                 required:true
             }
         },
         messages: {
             "data[Course][time_limit]": "Please enter valid time limit"
         }
     });

     $('.score-control').click(function(event) {
         var id = $(this).attr('id');
         $('#check_control').val(id);
         $('.score-control').removeClass('active');
         $(this).addClass('active');

         if (id == 'finishButton') {
             if (confirm('Is Start Location and Finish location are same?')) {
                 var marker = markersArray[110]; // find the marker by given id
                 marker.setIcon(start_finish);
                 $('#check_control').val('controlButton');
                 $('.score-control').removeClass('active');
                 $('#controlButton').addClass('active');

             } else {
                 $('#check_control').val(id);
                 $('.score-control').removeClass('active');
                 $('#finishButton').addClass('active');
                 var marker = markersArray[110]; // find the marker by given id
                 marker.setIcon(start);
             }
         }
     });

 });