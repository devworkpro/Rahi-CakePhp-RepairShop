<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 50px;">
<div class="page-header">
	<h1>Edit Staff<small></small>
	<span class="pull-right">
	<?php echo $this->Html->link('<p class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</p>',array('controller' => 'staffs', 'action' => 'index'),array('escape'=>false));?>
	</span>
	</h1>
</div>
<?php echo $this->Form->create('Staff',array('controller'=>'Staffs','action'=>'staffedit/'.$user["User"]["id"],'class'=>'validator-form','id'=>"wizardForm")); ?>
	
	<div class="col-lg-12">
    <div class="panel-body">
      <div class="row">                 
        <div class="col-xs-12 col-sm-3">
          <div class="form-group">
          <?php
            echo $this->Form->input('User.first_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'First Name' ,'id'=>'first_name','autofocus')); 
          ?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-3">
          <div class="form-group">
            <?php echo $this->Form->input('User.last_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Lastname','required'=>'required')); ?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <?php echo $this->Form->input('User.business_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Business Name','required'=>'required','id'=>'business_name','onkeypress'=>'return isSpace(event)')); ?>
          </div>
        </div>
      </div>
      
      
      <div class="row">    
        <div class="col-xs-12 col-sm-6">
          
          <div class="form-group">
            <?php echo $this->Form->input('User.phone_number', array('div'=>false,'type'=>'text','class'=>'form-control', 'placeholder' => 'Number, Mobile required for SMS','onkeypress'=>'return isNumber(event)'));?>
          </div>
          
        </div>
          
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <?php echo $this->Form->input('User.address', array('div'=>false,'class'=>'form-control address','placeholder'=>'Street address' ,'id'=>'autocomplete','required'=>'required','onFocus'=>"geolocate()")); ?> 
          </div>
        </div>
      </div>
    
      
      <div class="row">                 
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <?php echo $this->Form->input('User.email', array('div'=>false,'class'=>'form-control Email','placeholder'=>'Email','autocomplete' => 'off','id'=>'email')); ?>
              <label class="error email_error" style="display: none;"></label>                       
            </div>
        </div>  
          
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <?php echo $this->Form->input('User.address2', array('div'=>false,'class'=>'form-control','id'=>"autocomplete1",'placeholder'=>'Address 2','onFocus'=>"geolocate()")); ?> 
          </div>
        </div>
      </div>


      <div class="row">     
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <?php echo $this->Form->input('User.pass', array('type'=>'password','class'=>'form-control','name'=>'User[password]','label'=>'Password')); ?>
          </div>
          <h3>Permissions</h3>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.customers', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-user"></i>&nbsp;&nbsp;Customer Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.contracts', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-file-text-o "></i>&nbsp;&nbsp;Contract Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.customer_purchases', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-mobile"></i>&nbsp;&nbsp;Customer Purchase Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.invoices', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-shopping-cart "></i>&nbsp;&nbsp;Invoice Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.assets', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-desktop"></i>&nbsp;&nbsp;Assets Module')); ?>
            </div>

            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.refurbs', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-wrench "></i>&nbsp;&nbsp;Refurb Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.estimates', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class=" fa fa-clock-o "></i>&nbsp;&nbsp;Estimate Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.tickets', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class=" fa fa-check-square-o "></i>&nbsp;&nbsp;Ticket Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.parts', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-plane "></i>&nbsp;&nbsp;Part Module')); ?>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.inventory', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-barcode"></i>&nbsp;&nbsp;Inventory Module')); ?>
            </div>

            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.purchase_orders', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class=" fa fa-truck "></i>&nbsp;&nbsp;Purchase Order Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.calendar', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;Calendar Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.pos', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-money"></i>&nbsp;&nbsp;POS Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.leads', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class=" fa fa-user "></i>&nbsp;&nbsp;Leads Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.domo', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-line-chart"></i>&nbsp;&nbsp;Domo Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.market', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class=" fa fa-rocket "></i>&nbsp;&nbsp;Market Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.reports', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-bar-chart "></i>&nbsp;&nbsp;Report Module')); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('StaffMenu.wiki', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp;&nbsp;<i class="fa fa-pencil-square-o "></i>&nbsp;&nbsp;Wiki Module')); ?>
            </div>
          </div>
              
        </div>            
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <?php echo $this->Form->input('User.city', array('autocomplete' => 'off','div'=>false,'class'=>'form-control', 'placeholder' => 'city','id'=>'locality')); ?>
          </div><br>
          <div class="form-group">
            <?php echo $this->Form->input('User.state_country', array('autocomplete' => 'on','div'=>false,'class'=>'form-control','placeholder'=>'state/country','id'=>'administrative_area_level_1')); ?> 
          </div><br>
          <div class="form-group">
            <?php echo $this->Form->input('User.zip', array('type'=>'text','autocomplete' => 'off','div'=>false,'class'=>'form-control','placeholder' => 'Postal Code','id'=>'postal_code')); ?> 
            <input class="field" id="country" disabled="true" type="hidden">
          </div>

          
        </div>
      </div>

          
      <div class="row">        
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
          </div>
        </div>         
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <div id="map" style="width:630px;height:470px;margin-top: -290px"></div>
            <?php echo $this->Form->input('User.latitude', array('type'=>'hidden','class'=>'form-control lat', 'id' => 'lat')); ?> 
            <?php echo $this->Form->input('User.longitude', array('type'=>'hidden','class'=>'form-control lng','id' => 'lng')); ?> 

          </div>
          <div class="form-group">
            <?php echo $this->Form->input('User.role', array('type'=>'hidden','value'=>'staff')); ?>
            <?php echo $this->Form->input('User.status',array('type'=>'hidden','value'=>1));?>
            <?php echo $this->form->Submit("Update Staff",array('class'=>'btn btn-success pull-right create_staff_btn')); ?>
          </div>
        </div>  
          
        <div class="col-xs-12 col-sm-6">
        </div>
      </div>

                   
    </div>
  </div>
  <?php echo $this->Form->end(); ?>
</div>



<!-- Email check -->
<script type="text/javascript">
$('.Email').bind('focusout', function() {
    var email = $(this).val();
    if(email!="")
    {
      $.ajax({
          type: "POST",
          url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/staffs/emailcheck/",

        // url: "search.php",
          data: { email:email},
      
          success: function(data)
          {
            if(data=="invalid")
            {
                $('.email_error').html("Email has already been taken");
                $('.email_error').show();    
                $(".create_staff_btn").attr("disabled", "disabled");         
            }
            if(data=="success")
            {
                $('.email_error').hide();  
                $(".create_staff_btn").removeAttr("disabled");
            }           
          }
      });
    }
  });
</script>

<!-- No Space Jquery -->

<script>
function isSpace(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode == 32 && (charCode < 65 || charCode < 90)) {
        return false;

    }
    return true;
}
</script>


<!-- Autocomplete Address -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJDYJ4asKNDhR0xamrDfYUfLyUlzZuUTI&libraries=places&callback=initAutocomplete" async defer></script>
<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        autocomplete1 = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete1')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
        autocomplete1.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        var place1 = autocomplete1.getPlace();
        /*for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }*/

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
             //alert(val);
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
</script>

<!-- Address Map -->

<script>
  var timer, value;
  $('.address').bind('focusout', function() {
  
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
    $('#postal_code').bind('focusout', function() {
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

<script type="text/javascript">
$(document).ready(function(){
	var lat = $('#lat').val();
	var lng = $('#lng').val();
	if(lat!="" && lng!="")
	{
		addressintail(lat,lng);
	}
	else
	{
		//initialize();

		  function initialize(lat,lng) {
      var myLocation = new google.maps.LatLng(36.084621,-96.921387);
      var mapOptions = {
        zoom : 7,
        center : myLocation,
        mapTypeId : google.maps.MapTypeId.ROADMAP
      };
     
      map = new google.maps.Map(document.getElementById('map'), mapOptions);
      // add marker

    }

    google.maps.event.addDomListener(window, 'load', initialize);

	}
});
</script>