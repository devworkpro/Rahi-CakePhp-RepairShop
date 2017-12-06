 var placemarker;
 var final;
 var baseurl = document.getElementById('baseurl').value;
 var startImage = baseurl + 'img/s.png';
 var finishImage = baseurl + 'img/finish.png';
 var startFinishImage = baseurl + 'img/start-finish.png';
 var start_finish;
 var LatLngList = [];

 function initMapi() {
     var previousLocations = document.getElementById('CoursePositions').value;
     var jsonlocations = $.parseJSON(previousLocations);
     var startposition = new google.maps.LatLng(jsonlocations[0].lat, jsonlocations[0].lon);
     var endposition = new google.maps.LatLng(jsonlocations[jsonlocations.length - 1].lat, jsonlocations[jsonlocations.length - 1].lon);
     map = new google.maps.Map(document.getElementById('map'), {
         zoom: 16,
         center: startposition,
         zoomControl: false,
         streetViewControl: false
     });
      map1 = new google.maps.Map(document.getElementById('map1'), {
         zoom: 16,
         center: startposition,
          zoomControl: false,
         streetViewControl: false
     });
     
    

     start = {
         url: startImage,
         origin: new google.maps.Point(0, -28)
     };
      var marker = new MarkerWithLabel({
             position: startposition,
             map: map1,
             labelInBackground: false,
             icon: start
         });
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

     latlngbounds = new google.maps.LatLngBounds();

     LatLngList.forEach(function(latLng) {
         latlngbounds.extend(latLng);
     });

     // or with ES6:
     // for( var latLng of LatLngList)
     //    latlngbounds.extend(latLng);

     map.setCenter(latlngbounds.getCenter());
     map.fitBounds(latlngbounds);
     zoomChangeBoundsListener =
         google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
             if (this.getZoom()) {
                 //  this.setZoom(16);
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
         
         var marker = new MarkerWithLabel({
             position: location,
             map: map1,
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

 google.maps.event.addDomListener(window, 'load', initMapi);
