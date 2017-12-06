<div class="row">
  <div class="col-lg-12">
    <div class="tab-content">
      <div class="panel panel-default tab-pane tabs-up active" id="0">
        <div class="panel-body contact_form_main">
          <form method="post" action="" enctype="multipart/form-data" id="signupForm" onsubmit="return Validate(this);">
               
            <div class="form-group">
            <div class="row">
              <div class="col-lg-6">
                <label>Address</label>
                <input type="text" name="address" class="form-control address" placeholder="">
              </div>
              <div class="col-lg-6">
                <label>Postcode</label>
                <input type="text" name="zipcode" class="form-control zipcode" placeholder="">
              </div>
            </div>
            </div>

            <div id="map" style="width:900px;height:500px;"></div>
            <?php echo $this->Form->input('latitude', array('type' =>'', 'id' => 'lat','class'=>'lat' )); ?>
                 
            <?php echo $this->Form->input('longitude', array('type' =>'', 'id' => 'lng' ,'class'=>'lng')); ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

 
            

           
<script>
  var timer, value;
  $('.address').bind('keyup', function() {
  
    clearTimeout(timer);
    var str = $(this).val();
    
    if (str.length > 2 && value != str) {
      
      timer = setTimeout(function() {
      var strs = str.replace(/\s+/g, '+');

      var replaced = strs.split(',').join('');
      url= 'https://maps.googleapis.com/maps/api/geocode/json';
           
     
      $.ajax({
        url: url,
        data: {'address':replaced,'key':'AIzaSyBrdjhQpaHqUysn-0lI89u7M9kokeKS7lQ'},
        type: "GET",
        success: function(data){
                  console.log(data);

          var lat =data.results[0].geometry.location.lat;
          var lng =data.results[0].geometry.location.lng;

          $('.lat').val(lat);
          $('.lng').val(lng);
          addressintail(lat,lng);
        }
      });

      }, 2000);
    }
  });
</script>


<script>
    var timer, value;
    $('.zipcode').bind('keyup', function() {
        clearTimeout(timer);
        var str = $(this).val();
        if (str.length > 2 && value != str) {
            timer = setTimeout(function() {
            value = str;
            url= 'https://maps.googleapis.com/maps/api/geocode/json';
           
     
            $.ajax({
              url: url,
              data: {'address':value,'key':'AIzaSyBrdjhQpaHqUysn-0lI89u7M9kokeKS7lQ'},
              type: "GET",
              success: function(data){
               
              if(data.status=="OK"){
                var lat =data.results[0].geometry.location.lat;
                var lng =data.results[0].geometry.location.lng;

                $('.lat').val(lat);
                $('.lng').val(lng);
                addressintail(lat,lng);
              }
              else{
                $('#myModal').modal('show');
              }
              }
            });
          
            }, 2000);
        }
    });
</script>


<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8IoJixg0r5ifMOSJNYdVAVzq-z_D-x8M&sensor=false">
</script>
   


<script type="text/javascript">
  var map;
  var myInfoWindow = new google.maps.InfoWindow();
  function popup(lat,lng) {
    var myLocation = new google.maps.LatLng(lat, lng);
    var mapOptions = {
        zoom : 15,
        center : myLocation,
        draggable: true,
        mapTypeId : google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
    // add marker
    var marker = createMarkerAndInfoWindow(myLocation, "myMarkerName",
        "You can drag marker and pin your <br>property location in this area");
      marker.setMap(map);
    }


  function addressintail(lat,lng) {
      var myLocation = new google.maps.LatLng(lat, lng);
      var mapOptions = {
        zoom : 18,
        center : myLocation,
        draggable: true,
        mapTypeId : google.maps.MapTypeId.ROADMAP
      };

      map = new google.maps.Map(document.getElementById('map'), mapOptions);

      // add marker
     
      var marker = createMarkerAndInfoWindow(myLocation, "myMarkerName",
        "You can drag marker and pin your property location");
      marker.setMap(map);
    }



  function initialize1(lat,lng) {
      var myLocation = new google.maps.LatLng(lat, lng);
      var mapOptions = {
        zoom : 11,
        center : myLocation,
        draggable: true,
        mapTypeId : google.maps.MapTypeId.ROADMAP
      };
 
      map = new google.maps.Map(document.getElementById('map'), mapOptions);

      // add marker
     
      /*     var marker = createMarkerAndInfoWindow(myLocation, "myMarkerName",
        "You can add all sorts of <br/> <b>formattted</b> content to the <br/>InfoWindow!");
      marker.setMap(map); */
    }

  function initialization(lat,lng) {
      var myLocation = new google.maps.LatLng(lat, lng);
      var mapOptions = {
        zoom : 14,
        center : myLocation,
        draggable: true,
        mapTypeId : google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map(document.getElementById('map'), mapOptions);
      // add marker
     
      /*     var marker = createMarkerAndInfoWindow(myLocation, "myMarkerName",
        "You can add all sorts of <br/> <b>formattted</b> content to the <br/>InfoWindow!");
      marker.setMap(map); */
    }

  function initialize(lat,lng) {
      var myLocation = new google.maps.LatLng(53.184203,-8.096924);
      var mapOptions = {
        zoom : 7,
        center : myLocation,
        mapTypeId : google.maps.MapTypeId.ROADMAP
      };
     
      map = new google.maps.Map(document.getElementById('map'), mapOptions);
      // add marker

    }

    google.maps.event.addDomListener(window, 'load', initialize);


   
    function createMarkerAndInfoWindow(location, name, html) {
      var marker = new google.maps.Marker({
      position : location,
      map: map,
      title: 'This is the default tooltip!',
      draggable: true
      });

      google.maps.event.addListener(marker, "click", function() {
        myInfoWindow.setContent(html);
        myInfoWindow.open(marker.getMap(), marker);
      });
     
      google.maps.event.addListener(marker, 'dragend', function(evt){
        var textToInsert = ''; 
        textToInsert = '<tr><td>' + evt.latLng.lat().toFixed(5) + '</td><td>' + evt.latLng.lng().toFixed(5) + '</td></tr>';    
        $("#myTable tbody").prepend(textToInsert);
        var lat = evt.latLng.lat().toFixed(5);
        var lng = evt.latLng.lng().toFixed(5);
        $('#lat').val(lat);
        $('#lng').val(lng);

      });

      // listener on drag event
      google.maps.event.addListener(marker, 'dragstart', function(evt){
  
      });
     
      return marker;
    }
</script>
       