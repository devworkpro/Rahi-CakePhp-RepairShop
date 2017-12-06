 var placemarker;
 var final;
 var baseurl = document.getElementById('baseurl').value;
 var startImage = baseurl + 'img/s.png';
 var finishImage = baseurl + 'img/finish.png';
 var startFinishImage = baseurl + 'img/start-finish.png';
 var start_finish;

 function initMap() {
     var previousLocations = document.getElementById('CoursePositions').value;
     var jsonlocations = $.parseJSON(previousLocations);
     var startposition = new google.maps.LatLng(jsonlocations[0].lat, jsonlocations[0].lon);
     var endposition = new google.maps.LatLng(jsonlocations[jsonlocations.length - 1].lat, jsonlocations[jsonlocations.length - 1].lon);
     map = new google.maps.Map(document.getElementById('map'), {
         zoom: 18,
         center: startposition,
         scrollwheel: false,
    	 navigationControl: false,
    	 mapTypeControl: false,
    	 scaleControl: false,
    	 draggable: false,
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

     $.each(jsonlocations, function(i, obj) {
         var lat = parseFloat(obj.lat);
         var lon = parseFloat(obj.lon);
         var type = obj.type;
         latlng = new google.maps.LatLng(lat, lon);
         if (type == 'f') {
             final = 'yes';
             placeMarker(latlng, map, type);
         }

     });

     $.each(jsonlocations, function(i, obj) {
         var lat = parseFloat(obj.lat);
         var lon = parseFloat(obj.lon);
         var type = obj.type;
         latlng = new google.maps.LatLng(lat, lon);
         if (type == 's' && final == 'yes') {
             placeMarker(latlng, map, type);
         } else if (type == 's' && final != 'yes') {
             type = 'start_final';
             placeMarker(latlng, map, type);
         }

     });


 }

 placeMarker = function(location, map, type) {

     if (type == 'start_final') {
         var marker = new MarkerWithLabel({
             position: location,
             map: map,
             labelInBackground: false,
             icon: start_finish
         });
     }
     if (type == 'f') {
         var marker = new MarkerWithLabel({
             position: location,
             map: map,
             labelInBackground: false,
             icon: finish
         });
     }

     if (type == 's') {
         var marker = new MarkerWithLabel({
             position: location,
             map: map,
             labelInBackground: false,
             icon: start
         });
     }

 }

 google.maps.event.addDomListener(window, 'load', initMap);