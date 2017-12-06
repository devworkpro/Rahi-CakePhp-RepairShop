var baseurl = document.getElementById('baseurl').value;
function initialize() {
    var map = new google.maps.Map(document.getElementById("map"), {
      mapTypeId: google.maps.MapTypeId.TERRAIN,
      zoom:16
    });
    
    $.ajax({
     type: "GET",
     url: baseurl+'gpx/mygpx.gpx',
     dataType: "xml",
     success: function(xml) {
       var points = [];
       var bounds = new google.maps.LatLngBounds ();
       $(xml).find("trkpt").each(function() {
         var lat = $(this).attr("lat");
         var lon = $(this).attr("lon");
         var p = new google.maps.LatLng(lat, lon);
         points.push(p);
         bounds.extend(p);
       });

       var poly = new google.maps.Polyline({
         // use your own style here
         path: points,
         strokeColor: "#FF00AA",
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
  
     }
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);