<div id="abc" style="height:300px;width:100%;" ></div>
<script type="text/javascript">

var fileName = '<?php echo $gpxFileName; ?>';


var map= new google.maps.Map(document.getElementById('abc'), {
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



 $.ajax({
     type: "GET",
     url: "http://112.196.42.180:4134/repairshopsaas/gpx/"+fileName,
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
         
         

     
     }
    });
 

</script>