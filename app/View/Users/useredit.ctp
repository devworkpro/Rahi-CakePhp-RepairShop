<?php error_reporting(0);?>
<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 20px;">
<div class="page-header">
<h1>Edit Customer<small></small>
<span class="pull-right"><?php echo $this->Html->link('<p class="btn btn-primary btn-sm">Manage Custom Fields</p>',array('controller'=>'users','action'=>'customerfields'),array('escape'=>false));?> 
<?php echo $this->Html->link('<p class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</p>',array('controller' => 'users', 'action' => 'index'),array('escape'=>false));?>
            
        </span>
</h1>

</div>
<?php echo $this->Form->create('User',array('controller'=>'users','action'=>'useredit','class'=>'validator-form','id'=>"wizardForm"));?>


	<div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#main" role="tab" data-toggle="tab">Main</a></li>
        <li><a href="#additional" role="tab" data-toggle="tab">Additional Fields</a></li>
        <li><a href="#address" role="tab" data-toggle="tab">Address</a></li>
        <li><a href="#phone" role="tab" data-toggle="tab">Phone</a></li>
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
						<?php echo $this->Form->input('User.business_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Business Name','required'=>'required','onkeypress'=>'return isSpace(event)')); ?>
						<?php echo $this->Form->input('User.text', array('div'=>false,'class'=>'form-control','type'=>'hidden', 'placeholder' => 'First Name' ,'id'=>'text','autofocus','value'=>'text1')); ?>
					</div>
				</div>
            </div>
			
			
			<div class="row">    
				<div class="col-xs-12 col-sm-6">
					<?php echo $this->Form->input('User.email', array('div'=>false,'class'=>'form-control','placeholder'=>'Email','autocomplete' => 'on')); ?>                       
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
						<?php echo $this->Form->input('User.referred_by', array('options' => array('Customer' => 'Customer', 'Google' => 'Google','Sign' => 'Sign','Friend' => 'Friend','Other' => 'Other'),'class'=>'form-control')); ?>
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
					
						<?php echo $this->Form->input('User.sms_service', array('div'=>false,'type'=>'checkbox','label'=>'  Sms Service Enable')); ?><br/>
						<?php echo $this->Form->input('User.Opt_Out', array('div'=>false,'type'=>'checkbox','label'=>'  Opt Out - Email Marketing')); ?>
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
                				
            </div>
			 
			<div class="row">    
				
				<div class="col-xs-12 col-sm-6">
				
					<div class="form-group">
                    

                    </div>
              
				</div>				
                <div class="col-xs-6 col-sm-6">
					<div class="form-group">
						<div id="map" style="width:510px;height:470px;margin-top: 10px;"></div>

						<?php echo $this->Form->input('User.latitude', array('type'=>'hidden','class'=>'form-control lat', 'id' => 'lat')); ?> 
						<?php echo $this->Form->input('User.longitude', array('type'=>'hidden','class'=>'form-control lng','id' => 'lng')); ?>
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
					<div class="btn-group">
						<?php $this->Form->hidden('User.status',array('value'=>1));?>
						<?php echo $this->form->Submit("Update Customer",array('class'=>'btn btn-success pull-left')); ?>
					</div>
					<div class="btn-group">
						<?php echo $this->Html->link('Delete',array('controller' => 'users', 'action' => 'deleteuser',$userid),array('class'=>'btn btn-danger','confirm' => 'Are you sure you wish to delete this user?'));?>

					 </div>              
                 	<div class="btn-group">
                   
                   		<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i>Back',array('controller' => 'users', 'action' => 'index'),array('escape'=>false,'class'=>'btn btn-primary'));?>
                   	</div>


					</div>
                           
				  </div>

				  	 
            </div>
			</div>
            </div><!-- main Tab Ends -->
                        
            <div class="panel panel-default padd-t-sm tab-pane tabs-up" id="address">
                <div class="panel-body">

                  	<div class="row">  
                  	<?php $result = count($address);
                  	if($result=='0')
                  	{?>
                  		

                  	<?php }
              		else { 
						foreach($address as $add)	
		                { ?>
                  		
                  	<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<?php echo $this->Form->create('Address',array('class'=>'validator-form','id'=>'my_form1'));?>
					

						<div class="col-xs-12 col-sm-3">
							<div class="form-group"><div>
							Type<select style="margin-top:5px;" id="type_<?php echo $add['Address']['id']; ?>" name="Address[type]" class="addressinput form-control col_<?php echo $add['Address']['id']; ?>" value="<?php echo $add['Address']['type'];?>"><option>Bill to</option><option>Ship to</option><option>Physical</option></select></div>
						</div>
						</div>
						

						<div class="col-xs-12 col-sm-9"><div class="form-group">
						<input type="hidden" id="userid_<?php echo $add['Address']['id']; ?>" class="addressinput form-control col_<?php echo $add['Address']['id']; ?>" name="address['user_id']" value="<?php echo $add['Address']['user_id'];?>">

						<input type="hidden" id="addressid_<?php echo $add['Address']['id']; ?>" class="addressinput form-control col_<?php echo $add['Address']['id']; ?>" name="address['user_id']" value="<?php echo $add['Address']['id'];?>">
						
						<label for="pac-input">Name</label><input type="text" id="name_<?php echo $add['Address']['id']; ?>" class="form-control addressinput col_<?php echo $add['Address']['id']; ?>"  placeholder="Name/Description" name="address['+x+'][name]" value="<?php echo $add['Address']['name'];?>"></div></div>
						<div class="row">
						<div class="col-xs-12 col-sm-12">
						<div class="col-xs-12 col-sm-6">
						<div class="form-group">
						<label for="pac-input">Street Address</label><input id="street_address_<?php echo $add['Address']['id']; ?>" class="form-control addressinput col_<?php echo $add['Address']['id']; ?>" type="text" placeholder="123 any street" name="add['Address'][street]" value="<?php echo $add['Address']['street'];?>"></div></div>
						<div class="col-xs-12 col-sm-6"><div class="form-group"><label for="pac-input">Address</label><input id="useraddress_<?php echo $add['Address']['id']; ?>" class="form-control addressinput col_<?php echo $add['Address']['id']; ?>" type="text" maxlength="255" placeholder="Address" name="address['+x+'][address]" value="<?php echo $add['Address']['address'];?>"></div></div>
						</div>
						</div>

						<div class="row">
						<div class="col-xs-12 col-sm-12">
						<div class="col-xs-12 col-sm-4">
						<div class="form-group">
						<label for="pac-input">City</label><input id="city_<?php echo $add['Address']['id']; ?>" class="form-control addressinput col_<?php echo $add['Address']['id']; ?>" type="text" required="required" maxlength="255" placeholder="city" name="address['+x+'][city]" value="<?php echo $add['Address']['city'];?>">
						</div>
						</div>
						<div class="col-xs-12 col-sm-4"><div class="form-group"><label for="pac-input">State Country</label><input id="country_<?php echo $add['Address']['id']; ?>" class="form-control addressinput col_<?php echo $add['Address']['id']; ?>" type="text" required="required" maxlength="255" placeholder="state/country" name="address['+x+'][country]" value="<?php echo $add['Address']['country'];?>"></div></div>
						<div class="col-xs-12 col-sm-4"><div class="form-group"><div class="form-group"><label for="pac-input">Zip</label><input id="zip_<?php echo $add['Address']['id']; ?>" class="form-control addressinput col_<?php echo $add['Address']['id']; ?>" type="number" required="required" placeholder="Postal Code" name="address['+x+'][zip]" value="<?php echo $add['Address']['zip'];?>"></div></div></div>
						</div>
						</div>

						<div class="btn-group">
						<button style="margin-left: 13px;" type="button" class="btn btn-success pull-right addressupdate adressbutton_<?php echo $add['Address']['id']; ?>" id="<?php echo $add['Address']['id'];?>">Update Address</button>
						</div>
						<div class="btn-group" style="margin-left: 13px;">
						<input type="button" value="Edit" class='btn btn-primary pull-right addressedit' id=<?php echo $add['Address']['id'];?>>
						</div>
						<div class="btn-group">
						<button type="button" style="margin-left: 13px;" class="btn btn-danger delete_address delete_address_button_<?php echo $add['Address']['id'];?> pull-right" id="<?php echo $add['Address']['id'];?>" onclick="return confirm('Are you sure you wish to delete this Address?');">Delete</button>
						</div>
						<?php echo $this->Form->end(); ?>	
					</div>
					</div>
					
					<?php } }?>
					<div class="col-xs-12 col-sm-6">
						<div class="form-group" style="margin-left: 14px;">
							<div class="input_fields_wrap1"></div>
							<input type='button' value='Add New Address' class='btn btn-info pull-left add_new_address'>
                  		

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
									
							</div>
						</div>
					</div>
				</div>	
        	</div><!-- Address Tab Ends -->

        	<div class="panel panel-default padd-t-sm tab-pane tabs-up" id="phone">
                <div class="panel-body">

                  	<div class="row">  


                  	<?php foreach($phone as $ph){ ?>
                  		
					<div class="col-xs-12 col-sm-6">
					<div class="form-group">
						<?php echo $this->Form->create('Phone',array('class'=>'validator-form','id'=>"my_form2"));?>

						

						<div class="row">
							<div class="col-xs-12 col-sm-12">
							<div class="row">
							<div class="col-xs-12 col-sm-3">
							<div class="form-group">
							<input type="hidden" id="userid_<?php echo $ph['Phone']['id'];?>" class="addressinput form-control col_<?php echo $ph['Phone']['id']; ?>" value="<?php echo $ph['Phone']['user_id'];?>">

							<input type="hidden" id="phoneid_<?php echo $ph['Phone']['id'];?>" class="addressinput form-control col_<?php echo $ph['Phone']['id']; ?>" name="address['user_id']" value="<?php echo $ph['Phone']['id'];?>">


							<div>Phone Type<select style="margin-top:5px;" name="phone['+x+'][type]" class="form-control phoneinput col_<?php echo $ph['Phone']['id']; ?>" value="<?php echo $ph['Phone']['phone_type'];?>" id="phone_type_<?php echo $ph['Phone']['id'];?>"><option>Phone</option><option>Mobile</option><option>Office</option><option>Home</option><option>Fax</option><option>Other</option></select></div>
							</div>
							</div>



							<div class="col-xs-12 col-sm-6">
							<div class="form-group">
							<label for="UserPhoneNumber">Phone Number</label><input type="number" required="required" id="UserPhoneNumber_<?php echo $ph['Phone']['id'];?>" placeholder="Number, Mobile required for SMS" class="form-control phoneinput col_<?php echo $ph['Phone']['id']; ?>" name="data[phone]['+x+'][number]" value="<?php echo $ph['Phone']['phone_number'];?>">
							</div>
							</div>
							<div class="col-xs-12 col-sm-3">
							<div class="form-group">
							<label for="UserExtension">Extension</label><input id="UserExtension_<?php echo $ph['Phone']['id'];?>" class="form-control phoneinput col_<?php echo $ph['Phone']['id']; ?>" type="text" placeholder="1000" name="data[phone]['+x+'][extension]" value="<?php echo $ph['Phone']['extension'];?>">
							</div>
							</div>
							</div>
							</div>
						</div>

						<div class="btn-group">
						
							<button type="button" class="btn btn-success pull-right phoneupdate phonebutton_<?php echo $ph['Phone']['id'];?>" id="<?php echo $ph['Phone']['id'];?>">Update Phone</button>
						</div>
						<div class="btn-group">
							<input type="button" value="Edit" class='btn btn-primary pull-right phoneedit' id=<?php echo $ph['Phone']['id'];?>>
						</div>
						<div class="btn-group">
						<button type="button" style="" class="btn btn-danger delete_phone delete_phone_button_<?php echo $ph['Phone']['id'];?> pull-right" id="<?php echo $ph['Phone']['id'];?>" onclick="return confirm('Are you sure you wish to delete this Phone?');">Delete</button>
						</div>
						
						

						<?php echo $this->Form->end(); ?>
						
					</div>
					</div>
					
					<?php }?>
					<div class="col-xs-12 col-sm-6">
						<div class="form-group" style="margin-left:0px;">
							<div class="input_fields_wrap"></div>
							<input type='button' value='Add New Phone' class='btn btn-info pull-left add_new_phone'>
                  		

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
									
							</div>
						</div>
					</div>
				</div>	
        	</div><!-- Phone Tab Ends -->






            <div class="panel panel-default padd-t-sm tab-pane tabs-up" id="additional">
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
							
							<?php
							echo $this->Form->input('User.customerfieldvalue', array('type'=>'hidden','class'=>'form-control','value'=>'no','name'=>'User[customerfieldvalue]'));
							echo $this->Form->input('User.customerfield', array('type'=>'hidden','class'=>'form-control','value'=>'no','name'=>'User[customerfield]'));
							if(!empty($CustomerFieldValue))	
							{
								echo $this->Form->input('User.customerfieldvalue', array('type'=>'hidden','class'=>'form-control','value'=>'yes','name'=>'User[customerfieldvalue]'));

				 				$count=1; foreach($CustomerFieldValue as $Customerfieldvalue) {
								if(!empty($Customerfieldvalue)){
									//pr($CustomerFieldValue);
									$customer_field_id = $Customerfieldvalue['CustomerFieldValue']['customer_field_id'];
									$name = $Customerfieldvalue['CustomerFieldValue']['name'];
									$field_type = $Customerfieldvalue['CustomerFieldValue']['field_type'];
									$value = $Customerfieldvalue['CustomerFieldValue']['value'];
									$id = $Customerfieldvalue['CustomerFieldValue']['id'];

									

									if($field_type=='text')
									{
									echo $this->Form->input('CustomerFieldValue.value', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'customerfieldValue[value]['.$count.']','value'=>$value)).'<br>';

									echo $this->Form->input('CustomerFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'customerfieldValue[name]['.$count.']','value'=>$name));

									echo $this->Form->input('CustomerFieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$customer_field_id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

									echo $this->Form->input('CustomerFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'customerfieldValue[id]['.$count.']'));

									echo $this->Form->input('CustomerFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
										
									
									$count++;
									}
									elseif($field_type=='textarea')
									{
									echo $this->Form->input('CustomerFieldValue.value', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'customerfieldValue[value]['.$count.']','value'=>$value)).'<br>';

									echo $this->Form->input('CustomerFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'customerfieldValue[name]['.$count.']','value'=>$name));

									echo $this->Form->input('CustomerFieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$customer_field_id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

									echo $this->Form->input('CustomerFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'customerfieldValue[id]['.$count.']'));

									echo $this->Form->input('CustomerFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
										
									
									$count++;
									}
									elseif($field_type=="date")
									{
										?>

										<label><?php echo $name;?></label>
						                   	
						                  	<input type="text" name="customerfieldValue[value][<?php echo $count;?>]" value="<?php echo $value;?>" class="form-control date-picker" ><br>

						                   
						                <?php
						                

						                echo $this->Form->input('CustomerFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'customerfieldValue[name]['.$count.']','value'=>$name));
									
										echo $this->Form->input('CustomerFieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$customer_field_id ,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));
										echo $this->Form->input('CustomerFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'customerfieldValue[id]['.$count.']'));
										echo $this->Form->input('CustomerFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
										
										
										
										$count++;
									}
									elseif($field_type=="checkbox")
									{
										if($value=='on'){
											?><input type="checkbox" name="customerfieldValue[value][<?php echo $count;?>]" checked><label>&nbsp;<?php echo $name;?></label><br>
						                <?php
										}
										else{
											?><input type="checkbox" name="customerfieldValue[value][<?php echo $count;?>]"><label>&nbsp;<?php echo $name;?></label><br><?php
										}
						                						               
						                echo $this->Form->input('CustomerFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'customerfieldValue[name]['.$count.']','value'=>$name));
										
									
										echo $this->Form->input('CustomerFieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$customer_field_id ,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

										echo $this->Form->input('CustomerFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'customerfieldValue[id]['.$count.']'));

										echo $this->Form->input('CustomerFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
										
										$count++;
									}
									elseif($field_type=='weblink')
									{
									echo $this->Form->input('CustomerFieldValue.value', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'customerfieldValue[value]['.$count.']','value'=>$value)).'<br>';

									echo $this->Form->input('CustomerFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'customerfieldValue[name]['.$count.']','value'=>$name));

									echo $this->Form->input('CustomerFieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$customer_field_id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

									echo $this->Form->input('CustomerFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'customerfieldValue[id]['.$count.']'));
										
									echo $this->Form->input('CustomerFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
									
									$count++;
									}
									}
								}

							}
							elseif(!empty($CustomerField))
							{  
								echo $this->Form->input('User.customerfield', array('type'=>'hidden','class'=>'form-control','value'=>'yes','name'=>'User[customerfield]'));
								$count=1;
								foreach($CustomerField as $customerfield) {
								
									$id = $customerfield['CustomerField']['id'];
									$name = $customerfield['CustomerField']['name'];
									$field_type = $customerfield['CustomerField']['field_type'];

									

									if($field_type=='text')
									{
									echo $this->Form->input('customerfieldValue.name', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'customerfieldValue[value]['.$count.']')).'<br>';
									echo $this->Form->input('customerfieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

									echo $this->Form->input('customerfieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
									echo $this->Form->input('customerfieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'customerfieldValue[name]['.$count.']'));

									
									$count++;
									}
									elseif($field_type=='textarea')
									{
									echo $this->Form->input('customerfieldValue.name', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'customerfieldValue[value]['.$count.']')).'<br>';
									echo $this->Form->input('customerfieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

									echo $this->Form->input('customerfieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
									echo $this->Form->input('customerfieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'customerfieldValue[name]['.$count.']'));

									
									$count++;
									}
									elseif($field_type=="date")
									{
										?>

										<label><?php echo $name?></label>
						                <?php echo $this->Form->input('customerfieldValue.name', array('class'=>'form-control date-picker','div'=>false, 'label'=>false,'name'=>"customerfieldValue[value][$count]",'id'=>'date')).'<br>'; ?>
						                				                   
						                <?php


										echo $this->Form->input('customerfieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

										echo $this->Form->input('customerfieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
										echo $this->Form->input('customerfieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'customerfieldValue[name]['.$count.']'));

										
										$count++;
									}
									elseif($field_type=="checkbox")
									{
										?>
										<input type="checkbox" name="customerfieldValue[value][<?php echo $count;?>]"><label>&nbsp;<?php echo $name;?></label><br>
						                <?php


										echo $this->Form->input('customerfieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id , 'name'=>'customerfieldValue[customer_field_id]['.$count.']'));
										echo $this->Form->input('customerfieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
										echo $this->Form->input('customerfieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'customerfieldValue[name]['.$count.']'));
										
										$count++;
									}
									elseif($field_type=='weblink')
									{
									echo $this->Form->input('customerfieldValue.name', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'customerfieldValue[value]['.$count.']')).'<br>';
									echo $this->Form->input('customerfieldValue.customer_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$id,'name'=>'customerfieldValue[customer_field_id]['.$count.']'));

									echo $this->Form->input('customerfieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'customerfieldValue[field_type]['.$count.']'));
									echo $this->Form->input('customerfieldValue.name', array('type'=>'hidden','class'=>'form-control','value'=>$name,'name'=>'customerfieldValue[name]['.$count.']'));

									
									$count++;
									}
								}
							}

							?>
							
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
						<div class="btn-group">
							<?php $this->Form->hidden('User.status',array('value'=>1));?>
							<?php echo $this->form->Submit("Update Customer",array('class'=>'btn btn-success pull-left')); ?>
						</div>
						<div class="btn-group">
							<?php echo $this->Html->link('Delete',array('controller' => 'users', 'action' => 'deleteuser',$this->data['User']['id']),array('class'=>'btn btn-danger','confirm' => 'Are you sure you wish to delete this user?'));?>

						 </div>              
	                 	<div class="btn-group">
	                   
	                   		<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i>Back',array('controller' => 'users', 'action' => 'index'),array('escape'=>false,'class'=>'btn btn-primary'));?>
	                   	</div>


						</div>
				 	</div>
               		<?php echo $this->Form->end(); ?>
               		
              	</div><!-- /.box -->
        	</div>
        </div>
    </div>
</div>


<!-- Add Additional Phone Numbers -->

<script>
	$(document).ready(function() {
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_new_phone"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
	//alert("aaya");
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
           
            $(wrapper).append('<div class="col-xs-12 col-sm-12"><div class="row"><div class="col-xs-12 col-sm-3"><div class="form-group"><div>Phone Type<select style="margin-top:5px;"  class="form-control" id="phone_type"><option>Phone</option><option>Mobile</option><option>Office</option><option>Home</option><option>Fax</option><option>Other</option></select></div></div></div><div class="col-xs-12 col-sm-6"><div class="form-group"><label for="UserPhoneNumber">Phone Number</label><input type="hidden" id="phone_user_id" class="form-control phone_user_id" value="<?php echo $userid; ?>"><input type="number" required="required" id="phone_number" placeholder="Number, Mobile required for SMS" class="form-control"></div></div><div class="col-xs-12 col-sm-3"><div class="form-group"><label for="UserExtension">Extension</label><input id="extension" class="form-control" type="text" placeholder="1000"></div></div></div><div class="btn-group" style="margin-left: 200px"><button type="button" class="btn btn-success pull-right" id="save_phone_btn">Save Phone</button></div><a href="#" class="remove_field btn btn-sm btn-danger remove_nested_fields pull-right"><i class="fa fa-remove"></i>Remove</a></div>');
		//$(".phone").show();//add input box
		 x++; //text box increment
			
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });

    $(wrapper).on("click","#save_phone_btn", function(e){ //user click on remove text
    	$("#save_phone_btn").text("Working....");

        //alert("The paragraph was clicked.");die();
        
        var phone_user_id = $("#phone_user_id").val();
        var phone_type = $("#phone_type").val();
        var phone_number = $("#phone_number").val();
        var extension = $("#extension").val();
       
        $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/users/addnewuserphone/",

 			  // url: "search.php",
 			   data: { phone_user_id:phone_user_id, phone_type:phone_type, phone_number:phone_number , extension:extension},
			
 			   success: function(data)
 			   {
					$("#save_phone_btn").text("Done");
					window.location.reload();
 					 
  			  }
  		});


    });
});
</script>



<!-- Add Additional Address -->


<script>
	  $(document).ready(function() {
    var max_fields      = 3; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap1"); //Fields wrapper
    var add_button      = $(".add_new_address"); //Add button ID
   
    var x = 0; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
	//alert("aaya gaya");
	

	
	
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
           		$('#yes').val(x);
            $(wrapper).append('<div class="row"><div class="col-xs-12 col-sm-12"><div class="col-xs-12 col-sm-3"><div class="form-group"><div>Type<select required style="margin-top:5px;" class="form-control address_type_id" id=""><option>Bill to</option><option>Ship to</option><option>Physical</option></select></div></div></div><div class="col-xs-12 col-sm-9"><div class="form-group"><label for="pac-input">Name</label><input type="hidden" id="" class="form-control address_user_id" value="<?php echo $userid; ?>"><input type="text" id="" class="form-control address_name_id"  placeholder="Name/Description" required></div></div></div><div class="col-xs-12 col-sm-12"><div class="col-xs-12 col-sm-6"><div class="form-group"><label for="pac-input">Street Address</label><input id="" class="form-control address_street_id" type="text" placeholder="123 any street" required></div></div><div class="col-xs-12 col-sm-6"><div class="form-group"><label for="pac-input">Address</label><input id="" class="form-control address_address_id" type="text" maxlength="255" placeholder="Address" required></div></div></div><div class="col-xs-12 col-sm-12"><div class="col-xs-12 col-sm-4"><div class="form-group"><label for="pac-input">City</label><input id="" class="form-control address_city_id" type="text" required maxlength="255" placeholder="city"></div></div><div class="col-xs-12 col-sm-4"><div class="form-group"><label for="pac-input">State Country</label><input id="" class="form-control address_country_id" type="text" required maxlength="255" placeholder="state/country"></div></div><div class="col-xs-12 col-sm-4"><div class="form-group"><div class="form-group"><label for="pac-input">Zip</label><input id="" minlength="6" maxlength="6" class="form-control address_zip_id" type="number" required placeholder="Postal Code"></div></div></div></div><div class="btn-group" style="margin-left: 200px"><button type="button" class="btn btn-success pull-right" id="save_address_btn">Save Address</button></div><a style="margin-right:30px;" href="#" class="remove_field btn btn-sm btn-danger remove_nested_fields pull-right"><i class="fa fa-remove"></i>Remove</a></div>');
			//$(".phone").show();//add input box
			
        }
    
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
        $('#yes').val(x);
    })


    $(wrapper).on("click","#save_address_btn", function(e){ //user click on remove text
    	$("#save_address_btn").text("Working....");

        //alert("The paragraph was clicked.");
        
        var name = $(".address_name_id").val();
        var type = $(".address_type_id").val();
        var street = $(".address_street_id").val();
        var address = $(".address_address_id").val();
        var city = $(".address_city_id").val();
        var country = $(".address_country_id").val();
        var zip = $(".address_zip_id").val();
        var userid = $(".address_user_id").val();
        $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/users/addnewuseraddress/",

 			  // url: "search.php",
 			   data: { type:type, name:name, street:street , address:address, city:city, country:country, zip:zip, userid:userid},
			
 			   success: function(data)
 			   {
					$("#save_address_btn").text("Done");
					window.location.reload();
 					 
  			  }
  		});


    })

    
});
</script>



<!-- Input Address Disabled -->

<script>

$(document).ready(function() {
    
   	$('.addressinput').attr('disabled',true);
   	$('.addressupdate').hide();
   	
    $(".addressedit").click(function() {
        var id = $(this).attr('id');
        $("#"+id).show();
        $(".col_"+id).removeAttr("disabled");
           
    });
});
  
</script>


<!-- Update Address -->

<script>
$(document).ready(function(){
    $(".addressupdate").click(function(){
        var id = $(this).attr('id');
        $(".adressbutton_"+id).text("Working....");

        //alert("The paragraph was clicked.");
        var street_address = $("#street_address_"+id).val();
        var type = $("#type_"+id).val();
        var name = $("#name_"+id).val();
        var address = $("#useraddress_"+id).val();
        var city = $("#city_"+id).val();
        var country = $("#country_"+id).val();
        var zip = $("#zip_"+id).val();
        var userid = $("#userid_"+id).val();
        var addressid = $("#addressid_"+id).val();
  	
  		$.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/users/useraddressedit/",

 			  // url: "search.php",
 			   data: { type:type, name:name, street_address:street_address , address:address, city:city, country:country, zip:zip, userid:userid, addressid:addressid },
			
 			   success: function(data)
 			   {

					$(".adressbutton_"+id).text("Done");
					$('#type_'+id).val(type);
 					$('#name_'+id).val(name);
 					$('#address_'+id).val(address);
 					$('#city_'+id).val(city);
 					$('#country_'+id).val(country);
 					$('#zip_'+id).val(zip);
 					$('#street_address_'+id).val(street_address);
 					$('.addressinput').attr('disabled',true);
 					$(".adressbutton_"+id).hide();
 					//alert(data);
     				//alert(data);
  				  	//$("#result").html(jQuery(data).find('.result').html()); 
  					//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  		});
    });

    
});
</script>


<!-- Delete Address -->

<script>
$(document).ready(function(){
    $(".delete_address").click(function(){
        var addressid = $(this).attr('id');
        //alert(id);
        $(".delete_address_button_"+addressid).text("Working....");

        //alert("The paragraph was clicked.");die();
        
  	
  		$.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/users/userdeleteaddress/",

 			  // url: "search.php",
 			   data: { addressid:addressid },
			
 			   success: function(data)
 			   {

					$(".delete_address_button_"+addressid).text("Done");
					window.location.reload();
  			  }
  		});
    });

    
});
</script>



<!-- Delete Phone Number -->

<script>
$(document).ready(function(){
    $(".delete_phone").click(function(){
        var phoneid = $(this).attr('id');
        //alert(id);
        $(".delete_phone_button_"+phoneid).text("Working....");

        //alert("The paragraph was clicked.");die();
        
  	
  		$.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/users/userdeletephone/",

 			  // url: "search.php",
 			   data: { phoneid:phoneid },
			
 			   success: function(data)
 			   {

					$(".delete_phone_button_"+phoneid).text("Done");
					window.location.reload();
  			  }
  		});
    });

    
});
</script>



<!-- Input Phone Fields Disabled -->

<script>

$(document).ready(function() {
    
   	$('.phoneinput').attr('disabled',true);
   	$('.phoneupdate').hide();
   	
    $(".phoneedit").click(function() {
        var id = $(this).attr('id');
        $(".phonebutton_"+id).show();
        $(".col_"+id).removeAttr("disabled");
           
    });
});
  
</script>



<!-- Update Phone Numbers -->

<script>
$(document).ready(function(){
    $(".phoneupdate").click(function(){
        var id = $(this).attr('id');
        $(".phonebutton_"+id).text("Working....");

        //alert("The paragraph was clicked.");
        var phone_type = $("#phone_type_"+id).val();
        var UserPhoneNumber = $("#UserPhoneNumber_"+id).val();
        var UserExtension = $("#UserExtension_"+id).val();
        var userid = $("#userid_"+id).val();
        var phoneid = $("#phoneid_"+id).val();
  	
  		$.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/users/userphoneedit/",

 			  // url: "search.php",
 			   data: { phone_type:phone_type, UserPhoneNumber:UserPhoneNumber, UserExtension:UserExtension, userid:userid, phoneid:phoneid},
			
 			   success: function(data)
 			   {

					$(".phonebutton_"+id).text("Done");
					$('#phone_type_'+id).val(phone_type);
 					$('#UserPhoneNumber_'+id).val(UserPhoneNumber);
 					$('#UserExtension_'+id).val(UserExtension);
 					$('.phoneinput').attr('disabled',true);
 					$(".phonebutton_"+id).hide();
  			  }
  		});
    });

    
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