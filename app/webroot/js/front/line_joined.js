 var placemarker;
 var final;
 var baseurl = document.getElementById('baseurl').value;
 var startImage = baseurl + 'img/s.png';
 var finishImage = baseurl + 'img/finish.png';
 var startFinishImage = baseurl + 'img/start-finish.png';
 var start_finish;
 var jsonlocations;
 var poly, path;
 var map;
 var LatLngList = [];

 function initMap() {
     var previousLocations = document.getElementById('CoursePositions').value;
     jsonlocations = $.parseJSON(previousLocations);
     setTimeout(polylines, 500);
     var startposition = new google.maps.LatLng(jsonlocations[0].lat, jsonlocations[0].lon);
     var endposition = new google.maps.LatLng(jsonlocations[jsonlocations.length - 1].lat, jsonlocations[jsonlocations.length - 1].lon);
     map = new google.maps.Map(document.getElementById('map'), {
         zoom: 16,
         center: startposition,
         scaleControl:true

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
         var controlid = obj.controlid;
         LatLngList.push(new google.maps.LatLng(lat, lon));
         latlng = new google.maps.LatLng(lat, lon);
         if (type == 'f') {
             final = 'yes';
             placeMarker(latlng, map, type);
         }
         if (type == 'c') {
             placeMarker(latlng, map, type,controlid);
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

 placeMarker = function(location, map, type,controlId) {

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

     if(type == 'c'){
         var stringMarker = String(controlId);
         var marker = new MarkerWithLabel({
             position: location,
             map: map,
             labelInBackground: false,
             labelContent: stringMarker,
             labelClass: 'labels',
             labelAnchor: new google.maps.Point(10, 30),
             icon: {
                     path: google.maps.SymbolPath.CIRCLE,
                     scale: 10,
                     strokeColor: 'red',
                     strokeWeight: 2

                 }
         });

     }

 }

    polylines = function(){

     var sortingLocation = jsonlocations;
     var coordinates = [];
     sortingLocation.sort(function(a, b) {
         var a1 = a.controlid,
             b1 = b.controlid;
         if (a1 == b1) return 0;
         return a1 > b1 ? 1 : -1;
     });
     $.each(sortingLocation, function(index, val) {
             coordinates.push({
                 lat: parseFloat(val.lat),
                 lng: parseFloat(val.lon),
             });
         });

         if (sortingLocation[sortingLocation.length - 1].type != 'f') {  // Connect with start point

                     coordinates.push({
                         lat: parseFloat(sortingLocation[0].lat),
                         lng: parseFloat(sortingLocation[0].lon),
                     });
         }

         poly = new google.maps.Polyline({
             strokeColor: '#FF0000',
             strokeOpacity: 1.0,
             strokeWeight: 3,
             geodesic: true,
             path: coordinates
         });

         poly.setMap(map);
         path = poly.getPath();
    } 
 google.maps.event.addDomListener(window, 'load', initMap);