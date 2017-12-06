<?php echo $this->Flash->render('positive'); ?>
<style type="text/css">
	
    .ms2side__options p{  
    margin: 2px 0;
    padding: 0;
    text-align: center;
    background-color: white;
    color: black;
    border: 2px solid #e7e7e7;
    width: 20px;
	}
	.ms2side__options p:hover{
    	background-color: #f0f0ff;
    	border-color: black;
    	
	}
	.select_asset,.select_asset1 {
	float: left;
    width: 220px;
	}


</style>
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
if(!empty($totalTicket_count))
{
	?>
	<div class="totalTicket_count" style="display: none;"><?php echo $totalTicket_count;?></div>
	<?php
}
?>
<div class="warper container-fluid">
	<div class="row">
	<div class="col-md-8">
	<h2>New Ticket for <?php echo $name=$user['User']['first_name'].' '.$user['User']['last_name'].'-'.$user['User']['business_name'];?>
	</h2><?php $user_id=$user['User']['id']; ?>
	</div>
	<div class="col-md-4">
	<h2>
		<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Tickets', 'action' => 'ticketlist'),array('escape'=>false,'class'=>'btn btn-default'));?>
		
		<?php echo $this->Html->link('Manage Custom Fields',array('controller' => 'Tickets', 'action' => 'customfields'),array('escape'=>false,'class'=>'btn btn-default', 'target'=>'_blank'));?>
	</h2>	
	</div>
	</div>
		
		


	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-body">
						
					<?php echo $this->Form->create('Ticket',array('controller'=>'Tickets','action'=>'addnew', 'id'=>"wizardForm")); ?>
				<div class="panel-body">
					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
							<?php echo $this->Form->input('Ticket.name', array('type'=>'hidden','class'=>'form-control','value'=>$name)); ?>
							<?php echo $this->Form->input('Ticket.status', array('type'=>'hidden','class'=>'form-control','value'=>'New')); ?>
								<?php echo $this->Form->input('Ticket.title', array('div'=>false,'class'=>'form-control','label'=>'Ticket Title (short description)','placeholder' => 'eg. Dell with bad DC jack','required'=>'required' )); ?>


							<?php echo $this->Form->input('Ticket.creator', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$this->Session->read('Auth.User.first_name'))); ?>
							<?php echo $this->Form->input('Ticket.login_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$this->Session->read('Auth.User.id'))); ?>
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
												
								<?php echo $this->Form->input('Email.additional_email', array('div'=>false,'class'=>'form-control','data-role'=>"tagsinput", 'label'=>"Additional Emails to notify for comments")); ?>

								
							</div>  
                    	</div>





					
					
					</div>

					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<?php if(!empty($Category))
								{
									?>
									<label>Issue Type</label><br>
									<select name="Ticket[type]" class="form-control">
										<?php
										foreach ($Category as $key => $value) {
											?><option value="<?php echo $value;?>"><?php echo $value;?></option><?php
										}
										?>
									</select>
									<?php
								}
								else{
									echo $this->Form->input('Ticket.type', array('options' => array('' => '', 'virus' => 'Virus','tuneup' => 'TuneUp','software' => 'Software','other'=>'Other'),'class'=>'form-control','label'=>'Issue Type','required'=>'required'));
								}
								?>
							<!--<?php echo $this->Form->input('Ticket.type', array('options' => array('' => '', 'virus' => 'Virus','tuneup' => 'TuneUp','software' => 'Software','other'=>'Other'),'class'=>'form-control','label'=>'Issue Type','required'=>'required')); ?>-->
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<input type="checkbox" name="Ticket[approved]"><label>             Is work approved to proceed?</label>	<br>		
								<input type="checkbox" name="Ticket[diagnosed]"><label>             Is work pre-diagnosed?</label>			
								
							
							</div>  
                    	</div>
					
					
					</div>
				
					
					<div class="row">  
						<div class="col-xs-5 col-sm-5">
							<div class="form-group">
								<?php echo $this->Form->input('Ticket.description', array('div'=>false,'type'=>'textarea','class'=>'form-control','label'=>"Complete Issue Description ",'placeholder' => 'Description..','required'=>'required','id'=>'TicketDescription')); ?>
							
							</div>
                    	</div>
                    	<div class="col-xs-1 col-sm-1">
							<a class="btn btn-xs" data-toggle="modal" role="button" href="#myModalcanned">
							<i class="fa fa-file-text"></i>
							</a>
						</div>


						<!-- Canned Response Modal -->   
						<div class="modal fade" id="myModalcanned" role="dialog">
						<div class="modal-dialog">
						<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
								    <button type="button" class="close" data-dismiss="modal">&times;</button>
								    <h4 class="modal-title">Insert Canned Response</h4>
								</div><hr>	
								<div class="modal-body">
								
									<div class="row">  
										<div class="col-xs-12 col-sm-12">
											<div class="form-group">
												<?php echo $this->Html->link('Modify',array('controller' => 'Tickets', 'action' => 'cannedresponses'),array('escape'=>false,'class'=>'','target'=>"_blank"));?>
											</div>
						            	</div>
									</div>

									<div class="row">
								    
							        <div class="col-md-12">
							            
					            		<div class="table-responsive">
					            		<table id="example1" class="display table">
					                	
						                
						                <tbody>
						                	<?php $counter=0; ?>
						                    <?php foreach($CannedResponse as $canned) { ?>
						                    <?php $row_id =  ++$counter; ?>
						                    <?php $canned_id = $canned['CannedResponse']['id'];?>
						                    <tr>

												<td>
													<div class="title_<?php echo $row_id; ?>">
													<?php echo $canned['CannedResponse']['title'];?>
													</div>
												</td>

												<td>
													<div class="body_<?php echo $row_id; ?>">
													<?php echo $canned['CannedResponse']['body'];?>
													</div>
					                            </td>

						                        <td>
						                        	<div class="btn btn-default insert" id="<?php echo $row_id;?>">Insert</div>
						                        	
						                        </td>
						                    </tr>  
						                    <?php }?>      
						                </tbody>
					            		</table>  
					           			</div>
							        </div>
							       	</div>					
								</div>
								<div class="modal-footer">
								<hr>
								    <button class="btn btn-default pull-right close_asset" type="button" class="close" data-dismiss="modal">Close</button>
								</div>

							</div>
							      
						</div>
						</div> 
						<!-- Canned Responsen Modal -->


					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
							
								<label>Assigned Contract</label>		
								<?php  echo $this->Form->select('Ticket.contract_id',$Contract,array("escape"=>false,"type"=>"select",	"id"=>"Contract",'class'=>'form-control')); ?>
							</div>	
							<div class="form-group">
								<label>Assigned SLA</label>		
								<?php  echo $this->Form->select('Ticket.sla_id',$Sla,array("escape"=>false,"type"=>"select",	"id"=>"Contract",'class'=>'form-control')); ?>
							
							</div>  
                    	</div>
					
					
					</div>


					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<input type="checkbox" name="Ticket[email]"><label>Don't Email</label>	<br>		

							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group" style="margin-top:-20px;">
								
								<label>Custom Field Type  </label>		
								<?php  echo $this->Form->select('Ticket.custom_field_id',$CustomFieldName,array("escape"=>false,"type"=>"select",	"id"=>"CustomFieldName"," "=>" " ,'class'=>'form-control')); ?>
								<?php echo $this->Form->input('CustomFieldValue.custom_field_id',array("escape"=>false,"type"=>"hidden","id"=>"CustomFieldId",'class'=>'form-control'))?>
								<br>
								<div id="CustomFieldType_Data">
									<span id='loading' style="margin-left: 30px; display: none;">
										<?php echo $this->Html->image('../images/reload.gif', array('width' => '20px'));?><br>
									</span>
								</div>
								<br><br>
								
							
				
								
							
							</div>  
                    	</div>
					
					
					</div>


					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label>Assigned Address</label><br>					
								<select name='Ticket[address]' class='form-control'>
									<option value="" ></option>
										<?php foreach($address as $add){ $name=$add['Address']['name'].' '.$add['Address']['type'].' '.$add['Address']['address'].' '.$add['Address']['city'];?>
									<option value='<?php echo $name;?>'><?php echo $name;?> </option> <?php }?>
								</select>
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
												
								<?php echo $this->Form->button('<i class="fa fa-plus"></i> Create New Ticket', array('class' => 'btn btn-success pull-left')); ?>
							
							</div>  
                    	</div>
					
					
					</div>

					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<a class="btn btn-default btn-sm mt5"  data-toggle="modal" href="#myModalassets">Assets &nbsp;&nbsp;<i class="fa fa-expand"></i></a>

								<a id="add_appointment_link" class="btn btn-primary btn-sm" >Create Ticket Appointment</a>
								<a id="remove_appointment_link" class="btn btn-primary btn-sm" style="display:none;" >Remove Ticket Appointment</a>

								<input type="hidden" id='ticketappointment' name="Ticket[appointment]">
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
											
								 
								<div id="assetvalue"></div> 
								<input type="hidden" id='ticketasset' value="no" name="Ticket[asset]">
							</div>  
                    	</div>
					
					
					</div>

					<!-- Assets Modal -->   
					<div class="modal fade" id="myModalassets" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal">&times;</button>
							    <h4 class="modal-title">Assets</h4>
							</div><hr>	
							<div class="modal-body">
							
								<div class="row">  
									<div class="col-xs-12 col-sm-12">
										<div class="form-group">
											Here you can create new assets, view existing assets, and attach them to the ticket.<br><br>
											<?php echo $this->Html->link('Create Asset (new window)',array('controller' => 'Assets', 'action' => 'add','?' => array('user_id' => $user_id)),array('escape'=>false,'class'=>'btn btn-success m-b-sm pull-right','target'=>"_blank"));?>
										</div>
					            	</div>
								</div>

								<div class="row">  
									<div class="col-xs-12 col-sm-12">
										<div class="form-group">
											<div class="col-xs-5 col-sm-5">
												<label>Existing Assets</label>
												<select class="select_asset" id="select_asset" multiple="multiple" size="undefined" name="" title="Available">
												<?php
												if(!empty($AssetValue))
												{
													foreach ($AssetValue as $asset) {
													$name = $asset['AssetFieldValue']['name'];
													$serial_number = $asset['AssetFieldValue']['serial_number'];
													$assetvalue_id =  $asset['AssetFieldValue']['id'];
													?>
													
													<option id="<?php echo $assetvalue_id;?>" class="option_asset"><?php echo $name.' - '.$serial_number; ?></option>
													
													<?php 
													}
												}
												?>
												</select>	
											</div>
											<div class="col-xs-1 col-sm-1 ms2side__options">
											
												<p class="AddOne btn btn-default" title="Add Selected">›</p> 								
												<p class="AddAll btn btn-default" title="Add All">»</p>
												<p class="RemoveOne btn btn-default" title="Remove Selected">‹</p>
												<p class="RemoveAll btn btn-default" title="Remove All">«</p>

											</div>
											<div class="col-xs-6 col-sm-6">
											<label>Selected</label>
											<select class="select_asset1" id="select_asset1" multiple="multiple" size="undefined" name="" title="Selected">
												
											</select>
											</div>



										</div>
					            	</div>
								</div>					
							</div>
							<div class="modal-footer">
							<hr>
							    <button class="btn btn-default pull-right close_asset" type="button" class="close" data-dismiss="modal">Close</button>
							</div>

						</div>
						      
					</div>
					</div> 

					<div id="appointment" style="display:none;">
						<div class="row">  
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">


									<label class="control-label">Ticket Appointment Starting Time</label>
                                    <br>
                                            <input type='text' class="" name="Appointment[start_at]" id="datetimepicker1" style="width: 100%;" />
                                           
                                    
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
								<label class="control-label">Ticket Appointment Ending Time</label>
                                    <br>
                                            <input type='text' class="" name="Appointment[end_at]" id="datetimepicker2" style="width: 100%;" />
                                           
								</div>
	                    	</div>
						
						
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<div class="form-group">
                                    
                                   
                                 	</div>		
									
								
								</div>  
	                    	</div>
						
						
						</div>
						<div class="row">  
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
																
								<label>Appointment Owner</label><br>	
									<input type='hidden' name="Appointment[owner]" id="owner" value="
									<?php echo $this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.email')?>"/>

									<select  class="select optional form-control" >
										<option selected="selected">
											<?php echo $this->Session->read('Auth.User.first_name').' '.$this->Session->read('Auth.User.email')?>
										</option>
									</select>
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
								<label>Attendees</label>					
								<input type='hidden' name="Appointment[attendees]" id="attendees" value="<?php echo  $this->Session->read('Auth.User.first_name'); ?>"/>
								<select class="select optional form-control">
									<option selected="selected">
										<?php echo $this->Session->read('Auth.User.first_name'); ?>
									</option>
								</select>			


	                    		</div>
	                    	</div>
						
						
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
													
									
								
								</div>  
	                    	</div>
						
						</div>
						
						<div class="row">  
							<div class="col-xs-12 col-sm-6">
								<div class="form-group" style="margin-top:15px;">
									
									<?php echo $this->Html->link('View Calendar (new window)',array('controller'=>'Calendars','action'=>'add'),array('escape'=>false,'class'=>'btn btn-primary btn-sm','target'=>'_blank'));?>

								</div>
	                    	</div>
						
						
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
													
									
								
								</div>  
	                    	</div>
						
						
						</div>

					</div>
				
				
					<div class="form-group">
						<label class="col-md-12 text-left"></label>
						<div class="col-md-13">
				
				
						<div class="input-group col-md-12" style="text-align: right;">

						<?php	echo $this->Form->input('Ticket.user_id', array('div'=>false,'class'=>'form-control', 'type'=>'hidden','value'=>$user_id)); ?>

						</div>
				
						</div>	
                	</div>
                </div>
                </div>
				
				<?php echo $this->Form->end(); ?>
			</div>
				
		</div>
	</div>
</div>


<script type="text/javascript">
	
$( "#add_appointment_link" ).click(function() {
  $( "#appointment" ).show();
  $("#remove_appointment_link").show();
  $("#add_appointment_link").hide();
  $('#ticketappointment').val('yes');
});

$( "#remove_appointment_link" ).click(function() {
  $( "#appointment" ).hide();
  $("#add_appointment_link").show();
  $("#remove_appointment_link").hide();
  $('#ticketappointment').val('no');
});


</script>


<!-- Date Time Picker -->

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.material.min.css" />
    <script src="https://kendo.cdn.telerik.com/2017.1.118/js/kendo.all.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
    // create DateTimePicker from input HTML element
    $("#datetimepicker1").kendoDateTimePicker({
    value:new Date()
    });

    $("#datetimepicker2").kendoDateTimePicker({
    value:new Date()
    });
});
</script>


<!-- CustomFieldName -->
<!-- scripts -->

<script type="text/javascript">
$(document).ready(function(){
	$('#CustomFieldName').change(function(){
	 	var CustomFieldId = $(this).val();
	 	$('#CustomFieldId').val(CustomFieldId);
	 		$('#loading').show();
			$.ajax({
       			type: 'POST',
      			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Tickets/customfieldtype/",

     	   
       			data: { CustomFieldId: CustomFieldId },
     			success: function(data) {
     				 $("#datetimepicker3").kendoDateTimePicker({
   						 value:new Date()
    					});
					 $('#CustomFieldType_Data').html(jQuery(data).find('.result').html()); 
     				//   alert("Success: " + data);
				//	  $('#newDiv').html(data);    
					 

					
 		       }
   		});
	});
});
</script>



<!-- Assets -->
<!-- scripts -->

<script type="text/javascript">
$(document).ready(function(){
	///$(".RemoveAll")
	 $('.RemoveAll').attr("disabled", true);
	 $('.RemoveOne').attr("disabled", true);
	 $('.AddOne').attr("disabled", true);
});


///////////////////// option asset

$(document).ready(function(){
	$(".select_asset").click(function() {
 	 $('.RemoveAll').attr("disabled", true);
	 $('.RemoveOne').attr("disabled", true);
	 $('.AddOne').attr("disabled", false);
	 $('.AddAll').attr("disabled", false); 
	});
	
});


///////////////////// option asset1

$(document).ready(function(){
	$(".select_asset1").click(function() {
 	 $('.RemoveAll').attr("disabled", false);
	 $('.RemoveOne').attr("disabled", false);
	 $('.AddOne').attr("disabled", true);
	 $('.AddAll').attr("disabled", true); 
	});
	
});


///////////////// <!-- Add One -->

$(document).ready(function(){
	$(".AddOne").click(function() {
 	
      var x = document.getElementById("select_asset");
      //alert(x);
      for (var i = 0; i < x.options.length; i++) {
         if(x.options[i].selected == true){
              var data = x.options[i].value;
              var id = x.options[i].id;
              $('.select_asset1').append($('<option>', {
    				value: data,
    				text: data,
    				id: id,
    				class: "option_asset1"
				}));
              $("select.select_asset option:selected").remove();
              $('.RemoveAll').attr("disabled", false);
	 		  $('.RemoveOne').attr("disabled", false);
			  $('.AddOne').attr("disabled", true);
              $('.AddAll').attr("disabled", false);
          }
      }
    
	});
});
   


//////////////////////// <!-- Add All-->

$(document).ready(function(){
	$(".AddAll").click(function() {
 	
      var x = document.getElementById("select_asset");
      //alert(x);die();
      for (var i = 0; i < x.options.length; i++) {
         if(x.options[i]){
              var data = x.options[i].value;
              var id = x.options[i].id;
              $('.select_asset1').append($('<option>', {
    				value: data,
    				text: data,
    				id: id,
    				class: "option_asset1"
				}));
              
          }
      }
      $("select.select_asset option").remove();

     $('.RemoveAll').attr("disabled", false);
	 $('.RemoveOne').attr("disabled", true);
	 $('.AddOne').attr("disabled", true);
     $('.AddAll').attr("disabled", true); 

	});

});



/////////////////  <!-- Remove One -->

$(document).ready(function(){
	$(".RemoveOne").click(function() {
 	
      var x = document.getElementById("select_asset1");
      //alert(x);
      for (var i = 0; i < x.options.length; i++) {
         if(x.options[i].selected == true){
              var data = x.options[i].value;
              var id = x.options[i].id;
              $('.select_asset').append($('<option>', {
    				value: data,
    				text: data,
    				id: id,
    				class: "option_asset"
				}));
              $("select.select_asset1 option:selected").remove();
              $('.RemoveAll').attr("disabled", true);
	 		  $('.RemoveOne').attr("disabled", true);
	 		  $('.AddOne').attr("disabled", true);
	 		  $('.AddAll').attr("disabled", false);
          }
      }
    
	});
});
   



//////////////////// <!-- Remove All  -->

$(document).ready(function(){
	$(".RemoveAll").click(function() {
 	
      var x = document.getElementById("select_asset1");
      //alert(x);die();
      for (var i = 0; i < x.options.length; i++) {
         if(x.options[i]){
              var data = x.options[i].value;
              var id = x.options[i].id;
              $('.select_asset').append($('<option>', {
    				value: data,
    				text: data,
    				id: id,
    				class: "option_asset"
				}));
              
          }
      }
      $("select.select_asset1 option").remove();

     $('.RemoveAll').attr("disabled", true);
	 $('.RemoveOne').attr("disabled", true);
	 $('.AddOne').attr("disabled", true);
     $('.AddAll').attr("disabled", false); 
	
	});

});

//////////////////// <!-- close assets -->

$(document).ready(function(){
	$(".close_asset").click(function() {
 	
	var x = document.getElementById("select_asset1");
      //alert(x);die();

      for (var i = 0; i < x.options.length; i++) {
         if(x.options[i]){
              var id = x.options[i].id;
              $('#ticketasset').val('yes');
              $("#assetvalue").append($("<input type='hidden' name='AssetValue[id][]' value='"+id+"'/><br>"));   
                         
        }
      }


	});

});



</script>

<!-- Insert Canned Response -->
<script type="text/javascript">

$(document).ready(function(){
	$(".insert").click(function() {
		var row_id = $(this).attr('id');
		var body = $(".body_"+row_id).text(); 
		var value = $.trim(body);
		$("#TicketDescription").val($("#TicketDescription").val() + value);
		//$("#TicketDescription").append(value);
		$("#myModalcanned .close").click();
	});

});

</script>
<script type="text/javascript">
  $(document).ready(function() {
  		var datediff = $(".package_info").text();
  		var totalTicket_count = $(".totalTicket_count").text();
  		//alert(totalTicket_count);
  		if(datediff > 0)
  		{
  			
  		}
  		else{

  			if(totalTicket_count < 10)
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
	        if(totalTicket_count < 10)
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
