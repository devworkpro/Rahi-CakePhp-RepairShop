<?php error_reporting(0);?>
<?php echo $this->Flash->render('positive'); ?>
<div class="yolobar-container yolobar-slide-down">
  <div class="yolobar">
    <span class="btn" style="font-size: 18px; cursor: default;">Upgrade your account to unlock this feature!</span>
     <?php echo $this->Html->link('<i class="fa fa-bolt"></i> Upgrade Account!',array('controller'=>'Payments','action'=>'plans'),array('escape'=>false,'class'=>'btn btn-success btn-sm'));?>
      <span class="btn btn-link yolobar-close pull-right">
        <i class="fa fa-times"></i>
      </span>
  </div>
</div>
<?php
if(!empty($Package))
{
	if(!empty($PackageDateDiffernce))
	{
		?><div class="package_info" style="display: none;"><?php echo $PackageDateDiffernce;?></div>
		<?php
	}
}
?>
<?php
if(!empty($totalUser_count))
{
	?>
	<div class="totalUser_count" style="display: none;"><?php echo $totalUser_count;?></div>
	<?php
}
?>
<div class="warper container-fluid" style="margin-bottom: 50px;">
<div class="page-header">
<h1>New Customer<small></small>

<span class="pull-right"><?php echo $this->Html->link('<p class="btn btn-primary btn-sm">Manage Custom Fields</p>',array('controller'=>'users','action'=>'customerfields'),array('escape'=>false));?> 
<?php echo $this->Html->link('<p class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</p>',array('controller' => 'users', 'action' => 'index'),array('escape'=>false));?>
            
        </span>
</h1>

</div>
<?php echo $this->Form->create('User',array('controller'=>'users','action'=>'add','id'=>'user','class'=>'validator-form','id'=>"wizardForm")); ?>

	<?php echo $this->Form->input('User.login_id', array('type'=>'hidden','class'=>'form-control', 'value'=>$this->Session->read('Auth.User.id')));
	?>

	<div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#main" role="tab" data-toggle="tab">Main</a></li>
        <li><a href="#Additional" role="tab" data-toggle="tab">Additional Fields</a></li>
        </ul>
        <div class="tab-content">
            <div class="panel panel-default tab-pane tabs-up active" id="main">
            <div class="panel-body">
            <div class="row">                 
				<div class="col-xs-12 col-sm-3">
					<div class="form-group">
					<?php
						if(isset($_GET['name']))
						{
						 	echo $this->Form->input('User.first_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'First Name' , 'value'=>$_GET['name'] ,'id'=>'first_name' ,'autofocus'));
						} 
						else
						{
						 	echo $this->Form->input('User.first_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'First Name' ,'id'=>'first_name','autofocus')); 
						}
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
						<?php echo $this->Form->input('User.text', array('div'=>false,'class'=>'form-control','type'=>'hidden', 'placeholder' => 'First Name' ,'id'=>'text','autofocus','value'=>'text1')); ?>
					</div>
				</div>
            </div>
			
			
			<div class="row">    
				<div class="col-xs-12 col-sm-6">
					<div class="row input_fields_wrap">
						<div class="phone">
							<div class="col-xs-12 col-sm-3">
								<div class="form-group" >
									<?php echo $this->Form->input('User.phone_type',array('options' => array('Phone' => 'Phone', 	'Mobile' => 'Mobile','Office' => 'Office','Home' => 'Home','Fax' => 'Fax','Other' => 'Other'),'class'=>'form-control','name'=>'data[phone][0][type]')); ?>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<?php echo $this->Form->input('User.phone_number', array('div'=>false,'type'=>'number','class'=>'form-control', 'placeholder' => 'Number, Mobile required for SMS','name'=>'data[phone][0][number]'));?>
								</div>
							</div>
							<div class="col-xs-12 col-sm-3">
								<div class="form-group">
									<?php echo $this->Form->input('User.extension', array('div'=>false,'class'=>'form-control', 'placeholder' => '1000','name'=>'data[phone][0][extension]')); ?>
								</div>
							</div>
						
							</div>
						</div>
				</div>
					
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<?php echo $this->Form->input('User.address', array('div'=>false,'class'=>'form-control address','placeholder'=>'Street address' ,'id'=>'autocomplete','required'=>'required','onFocus'=>"geolocate()")); ?> 
					</div>
				</div>
			</div>

			<div class="row">                 
				<div class="col-xs-12 col-sm-3">
					<div class="form-group">
						 
                    </div>
               	</div>  
			   	<div class="col-xs-12 col-sm-3">
					<div class="form-group">
						<?php echo $this->Form->Button('Add Another Phone Number', array('div'=>false,'class'=>'fa fa-plus btn btn-default add_field_button','type'=>'button')); ?>   
                    </div> 
               	</div>  
					
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
			
					</div>
				</div>
					
            </div>
			
			
			<div class="row">                 
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<?php echo $this->Form->input('User.email', array('div'=>false,'class'=>'form-control','placeholder'=>'Email','autocomplete' => 'off')); ?>                       
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
					
						<?php echo $this->Form->input('User.referred_by', array('options' => array('Customer' => 'Customer', 'Google' => 'Google','Sign' => 'Sign','Friend' => 'Friend','Other' => 'Other'),'class'=>'form-control')); ?>
					</div>
				</div>            
                <div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<?php echo $this->Form->input('User.city', array('autocomplete' => 'off','div'=>false,'class'=>'form-control', 'placeholder' => 'city','id'=>'locality')); ?>
					</div>
                </div>
			</div>

				  
			<div class="row">                 
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
                                <?php echo $this->Form->input('User.sms_service', array('div'=>false,'type'=>'checkbox','label'=>'  Sms Service Enable')); ?><br/>
								<?php echo $this->Form->input('User.Opt_Out', array('div'=>false,'type'=>'checkbox','label'=>'  Opt Out - Email Marketing')); ?>
								
                    </div>
                </div>  
					
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
					<?php echo $this->Form->input('User.state_country', array('autocomplete' => 'on','div'=>false,'class'=>'form-control','placeholder'=>'state/country','id'=>'administrative_area_level_1')); ?> 

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
						<?php echo $this->Form->input('User.zip', array('type'=>'text','autocomplete' => 'off','div'=>false,'class'=>'form-control','placeholder' => 'Postal Code','id'=>'postal_code')); ?> 
						<input class="field" id="country" disabled="true" type="hidden"></input>
						
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
					<div class="input_fields_wrap1"></div>
					<?php echo $this->Form->Button('Add Another Address', array('div'=>false,'class'=>'fa fa-plus btn btn-default add_field_button1 pull-right','type'=>'button')); ?>
								
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
												
						<div id="map" style="width:510px;height:470px;margin-top: 10px;"></div>

						<?php echo $this->Form->input('User.latitude', array('type'=>'hidden','class'=>'form-control lat', 'id' => 'lat')); ?> 
						<?php echo $this->Form->input('User.longitude', array('type'=>'hidden','class'=>'form-control lng','id' => 'lng')); ?> 

                    </div>
                </div>
				
            </div>

			 
			<div class="row">    
				
				<div class="col-xs-12 col-sm-6">
				
					<div class="form-group">
                    

                    </div>
              
				</div>				
                <div class="col-xs-12 col-sm-4">
					<div class="form-group">
						
                    </div>
                </div>
				<div class="col-xs-12 col-sm-2">
					<div class="form-group">
						   
                    </div>
                </div>
				
            </div>
			 
			 
			 
			 
			<div class="row">  
				<hr class="dotted">			 
				<div class="col-xs-12 col-sm-6">
					<div class="form-group">
                    	
						<?php echo $this->Form->input('User.yes', array('type'=>'hidden','class'=>'form-control', 'value'=>'0','id'=>'yes')); ?> 
                    </div>
                </div>  
			 
	              <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
				  
                  <?php $this->Form->hidden('User.status',array('value'=>1));?>
                  <?php echo $this->form->Submit("Create Customer",array('class'=>'btn btn-success pull-right')); ?>    
                  </div>
				</div>
                            
            </div>
			</div>
            </div><!-- main Tab Ends -->
                        

            <div class="panel panel-default padd-t-sm tab-pane tabs-up" id="Additional">
                <div class="panel-body">
                  	<div class="row">                 
					<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<lable>Notification Email Addresses (comma separated)</lable>
						<?php echo $this->Form->input('User.additional_email', array('div'=>false,'class'=>'form-control', 'placeholder' => 'someone@foo.com, someoneelse@foo.com' )); ?>
						
							
					</div>
					<div class="form-group">
						<lable>Additional Invoice (comma separated)</lable>
						<?php echo $this->Form->input('User.cc_emails', array('div'=>false,'class'=>'form-control', 'placeholder' => 'someone@foo.com, someoneelse@foo.com')); ?> 
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('User.tax_rate', array('options' => array('' => '','Tax' => 'Tax'),'class'=>'form-control')); ?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('User.default_invoice_terms', array('options' => array('' => ''),'class'=>'form-control')); ?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('User.tax_free', array('div'=>false,'type'=>'checkbox')); ?>
						<lable> (will not tax this customer)</lable>
						<br/>
						<?php echo $this->Form->input('User.default', array('div'=>false,'type'=>'checkbox')); ?>
						<lable> Invoice Terms</lable>
					</div>


					</div>
						
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<h4>Custom Fields</h4>
							<?php  //pr($CustomerField);

							echo $this->Form->input('User.customerfield', array('type'=>'hidden','class'=>'form-control','value'=>'0'));

							?>
							<?php $count=1; 
							if(!empty($CustomerField))
							{
								echo $this->Form->input('User.customerfield', array('type'=>'hidden','class'=>'form-control','value'=>'1'));
							foreach($CustomerField as $customerfield) {
							
								$id = $customerfield['CustomerField']['id'];
								$name = $customerfield['CustomerField']['name'];
								$field_type = $customerfield['CustomerField']['field_type'];

								

								if($field_type=='text')
								{
								echo $this->Form->input('customerfieldValue.name', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'customerfieldValue[value]['.$count.']','value'=>'')).'<br>';
								echo $this->Form->input('customerfieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

								echo $this->Form->input('customerfieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
								echo $this->Form->input('customerfieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'customerfieldValue[name]['.$count.']'));

								
								$count++;
								}
								elseif($field_type=='textarea')
								{
								echo $this->Form->input('customerfieldValue.name', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'customerfieldValue[value]['.$count.']','value'=>'')).'<br>';
								echo $this->Form->input('customerfieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

								echo $this->Form->input('customerfieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
								echo $this->Form->input('customerfieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'customerfieldValue[name]['.$count.']'));

								
								$count++;
								}
								elseif($field_type=="date")
								{
									?>

									<label><?php echo $name?></label>
					                <?php echo $this->Form->input('customerfieldValue.name', array('class'=>'form-control date-picker','div'=>false, 'label'=>false,'name'=>"customerfieldValue[value][$count]",'id'=>'date','value'=>'')).'<br>'; ?>
					                				                   
					                <?php


									echo $this->Form->input('customerfieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

									echo $this->Form->input('customerfieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
									echo $this->Form->input('customerfieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'customerfieldValue[name]['.$count.']'));

									
									$count++;
								}
								elseif($field_type=="checkbox")
								{
									?>
									<input type="checkbox" value='' name="customerfieldValue[value][<?php echo $count;?>]"><label>&nbsp;<?php echo $name;?></label><br>
					                <?php


									echo $this->Form->input('customerfieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id , 'name'=>'customerfieldValue[customer_field_id]['.$count.']'));
									echo $this->Form->input('customerfieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
									echo $this->Form->input('customerfieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'customerfieldValue[name]['.$count.']'));
									
									$count++;
								}
								elseif($field_type=='weblink')
								{
								echo $this->Form->input('customerfieldValue.name', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'customerfieldValue[value]['.$count.']','value'=>'')).'<br>';
								echo $this->Form->input('customerfieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

								echo $this->Form->input('customerfieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
								echo $this->Form->input('customerfieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'customerfieldValue[name]['.$count.']'));

								
								$count++;
								}
							}
							
							}?>
						

						</div>
					</div>
            		
            		</div>
					
				  
					
					
				</div>
	
				  
 
		 		<div class="row">     
		 		<hr class="dotted">  
              		<div class="col-xs-12 col-sm-6">
				   
				     	<div class="form-group">
				  		</div>
                    </div>  
					<div class="col-xs-12 col-sm-6">
                  		<div class="form-group">
				
                  			<?php $this->Form->hidden('User.status',array('value'=>1));?>
                  			<?php echo $this->form->Submit('Create Customer',array('class'=>'btn btn-success pull-right','style'=>'margin-bottom:15px;')); ?>    
				  
                  		</div>
				 	</div>
               		
              	</div><!-- /.box -->
        	</div>
        	<?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>




<!-- Add Additional Phone Numbers -->
<script>
	$(document).ready(function() {
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
	//alert("aaya");
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
           
            $(wrapper).append('<div class="row"><div class="col-xs-12 col-sm-12"><div class="col-xs-12 col-sm-3"><div class="form-group"><div>Phone Type<select name="phone['+x+'][type]" class="form-control"><option>Phone</option><option>Mobile</option><option>Office</option><option>Home</option><option>Fax</option><option>Other</option></select></div></div></div><div class="col-xs-12 col-sm-6"><div class="form-group"><label for="UserPhoneNumber">Phone Number</label><input type="number" required="required" id="UserPhoneNumber" placeholder="Number, Mobile required for SMS" class="form-control" name="data[phone]['+x+'][number]"></div></div><div class="col-xs-12 col-sm-3"><div class="form-group"><label for="UserExtension">Extension</label><input id="UserExtension" class="form-control" type="text" placeholder="1000" name="data[phone]['+x+'][extension]"></div></div><a href="#" class="remove_field btn btn-sm btn-danger pull-right remove_nested_fields">Remove</a></div></div>');
		//$(".phone").show();//add input box
		 x++; //text box increment
			
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>



<!-- Add Additional Address -->


<script>
	  $(document).ready(function() {
    var max_fields      = 3; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap1"); //Fields wrapper
    var add_button      = $(".add_field_button1"); //Add button ID
   
    var x = 0; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
	//alert("aaya gaya");
	

	
	
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
           		$('#yes').val(x);
            $(wrapper).append('<div class="row"><div class="col-xs-12 col-sm-12"><div class="col-xs-12 col-sm-3"><div class="form-group"><div>Type<select name="address['+x+'][type]" class="form-control"><option>Bill to</option><option>Ship to</option><option>Physical</option></select></div></div></div><div class="col-xs-12 col-sm-9"><div class="form-group"><label for="pac-input">Name</label><input type="text" id="pac-input" class="form-control"  placeholder="Name/Description" name="address['+x+'][name]"></div></div></div><div class="col-xs-12 col-sm-12"><div class="col-xs-12 col-sm-6"><div class="form-group"><label for="pac-input">Street Address</label><input id="pac-input" class="form-control" type="text" placeholder="123 any street" name="address['+x+'][street]"></div></div><div class="col-xs-12 col-sm-6"><div class="form-group"><label for="pac-input">Address</label><input id="pac-input" class="form-control" type="text" maxlength="255" placeholder="Address" name="address['+x+'][address]"></div></div></div><div class="col-xs-12 col-sm-12"><div class="col-xs-12 col-sm-4"><div class="form-group"><label for="pac-input">City</label><input id="pac-input" class="form-control" type="text" required="required" maxlength="255" placeholder="city" name="address['+x+'][city]"></div></div><div class="col-xs-12 col-sm-4"><div class="form-group"><label for="pac-input">State Country</label><input id="pac-input" class="form-control" type="text" required="required" maxlength="255" placeholder="state/country" name="address['+x+'][country]"></div></div><div class="col-xs-12 col-sm-4"><div class="form-group"><div class="form-group"><label for="pac-input">Zip</label><input id="pac-input" class="form-control" type="number" required="required" placeholder="Postal Code" name="address['+x+'][zip]"></div></div></div></div><a href="#" class="remove_field btn btn-sm btn-danger pull-right remove_nested_fields">Remove</a></div>');
			//$(".phone").show();//add input box
			
        }
    
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
        $('#yes').val(x);
    })
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
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete')),
            
            {types: ['geocode']});
        autocomplete1 = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */
            (document.getElementById('autocomplete1')),
            
            {types: ['geocode']})

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
            autocomplete1.setBounds(circle.getBounds());
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
  $(document).ready(function() {
  		var datediff = $(".package_info").text();
  		var totalUser_count = $(".totalUser_count").text();
  		//alert(totalUser_count);
  		if(datediff > 0)
  		{
  			
  		}
  		else{

  			if(totalUser_count < 10)
  			{

  			}
  			else{
  				$('.yolobar-container').slideDown(1000);
		 		$('.warper').fadeOut(1700,function(){
	            	$('.warper').remove();
	        	}); 
  			}     
  		}
  		if(datediff == '')
	    {
	        if(totalUser_count < 10)
	        {

	        }
	        else{ 
	          $('.yolobar-container').slideDown(1000);
	          $('.warper').fadeOut(1700,function(){
	                $('.warper').remove();
	            }); 

	        }
	    }

        $(".yolobar-close").click(function(){
          $('.yolobar-container').slideUp(1000);
        });

     });
</script>