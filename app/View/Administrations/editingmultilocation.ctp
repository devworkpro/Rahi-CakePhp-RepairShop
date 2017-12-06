<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
  <?php echo $this->element('frontenduser/sidebar1'); ?>
  <div class="col-xs-9">
    <?php echo $this->Flash->render('positive'); ?>
    <div class="panel panel-white">
      <div class="panel-body">
        <!-- Edit Location -->
        <div id="EditMultilocation" > 
          <h2>Edit Location</h2>
          
          <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'editingmultilocation/'.$Multilocation["Multilocation"]["id"],'id'=>"wizardForm")); ?> 

            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->input('Multilocation.name', array('div'=>false,'class'=>'form-control','placeholder' => "Name",'label'=>'Name','required'=>'required')); ?>
                  <?php echo $this->Form->input('Multilocation.user_id', array('type'=>'hidden','class'=>'form-control', 'value'=>$this->Session->read('User_id'))); ?>
                </div>
              </div>
            </div>

            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->input('Multilocation.email', array('div'=>false,'class'=>'form-control','placeholder' => "Email",'label'=>'Email')); ?>
                </div>
              </div>
            </div>                            
                   
            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->input('Multilocation.address', array('div'=>false,'class'=>'form-control address','placeholder'=>"Address",'label'=>'Address','id'=>'autocomplete','required'=>'required','onFocus'=>"geolocate()")); ?>
                   
                            
                </div>
              </div>
            </div>

            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->input('Multilocation.city', array('div'=>false,'class'=>'form-control','placeholder'=>"City",'label'=>'City','required'=>'required','id'=>'locality')); ?>
                  <?php echo $this->Form->input('Multilocation.state_country', array('type'=>'hidden','autocomplete' => 'on','div'=>false,'class'=>'form-control','placeholder'=>'state/country','id'=>'administrative_area_level_1')); ?>     
                  <?php echo $this->Form->input('Multilocation.zip', array('type'=>'hidden','autocomplete' => 'off','div'=>false,'class'=>'form-control','placeholder' => 'Postal Code','id'=>'postal_code')); ?>  
                  <input class="field" id="country" disabled="true" type="hidden"></input>
                            
                </div>
              </div>
            </div>
            
            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->input('Multilocation.phone_number', array('div'=>false,'class'=>'form-control','placeholder'=>"Phone",'label'=>'Phone')); ?>
                            
                </div>
              </div>
            </div>

            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->input('Multilocation.website', array('div'=>false,'class'=>'form-control','placeholder'=>"Website",'label'=>'Website(optional)')); ?>
                  <?php echo $this->Form->input('Multilocation.latitude', array('type'=>'hidden','class'=>'form-control lat', 'id' => 'lat')); ?> 
                  <?php echo $this->Form->input('Multilocation.longitude', array('type'=>'hidden','class'=>'form-control lng','id' => 'lng')); ?>          
                </div>
              </div>
            </div>
                      
            <div class="row">  
            <hr class="dotted"> 
              <div class="col-xs-12 col-sm-4">
              <div class="btn-group">
                <?php echo $this->Form->button("Update Location", array('class' => 'btn btn-success pull-left')); ?>
              </div>
              </div>
            </div>

          <?php echo $this->Form->end(); ?>
        </div>
      </div>
    </div>
  </div>
</div>       

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
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete')),
            
            {types: ['geocode']});
        

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
        
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
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
