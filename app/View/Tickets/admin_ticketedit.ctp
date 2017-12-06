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
  <div class="warper container-fluid" style="margin-bottom: 50px;">
  <div class="page-header"><h1>Edit Ticket<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller'=>'Tickets','action'=>'ticketlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
        <div class="row">
          
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    
                <div class="panel-body">
        
          <?php echo $this->Form->create('Ticket',array('controller'=>'Tickets','action'=>'ticketedit','id'=>"wizardForm")); ?>
          
          
          			<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
							
								<?php echo $this->Form->input('Ticket.title', array('div'=>false,'class'=>'form-control','label'=>'Subject','placeholder' => 'eg. Dell with bad DC jack','required'=>'required' )); ?>
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
												
								<?php echo $this->Form->input('Ticket.additional_email', array('class'=>'form-control','label'=>"Additional Emails to notify for comments",'id'=>'email','data-role'=>"tagsinput",'name'=>'Email[additional_email]')); ?>

							</div>  
                    	</div>							
					</div>

					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<?php echo $this->Form->input('Ticket.id', array('div'=>false,'type'=>'text','class'=>'form-control','label'=>"Number",'disabled' => 'disabled')); ?>
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<input type="checkbox" name="Ticket[approved]" ><label>         Is work approved to proceed?</label>	<br>		
								<input type="checkbox" name="Ticket[diagnosed]"><label>         Is work pre-diagnosed?</label>			
								
							
								
							</div>  
                    	</div>
					
					
					</div>
				
					
					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<?php echo $this->Form->input('Ticket.status', array('options' => array('' => '','New' => 'New','In Progress' => 'In Progress','Resolved' => 'Resolved','Invoiced'=>'Invoiced','Waiting for Parts'=>'Waiting for Parts','Waiting on Customer'=>'Waiting on Customer','Scheduled'=>'Scheduled','Customer Reply'=>'Customer Reply'),'class'=>'form-control','label'=>'Status','required'=>'required')); ?>
							</div>
						</div>
					

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
								<?php echo $this->Form->input('Ticket.created', array('div'=>false,'type'=>'text','class'=>'form-control','label'=>"Created At",'disabled' => 'disabled')); ?>

							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label>Custom Field Type  </label>	

								<?php  echo $this->Form->select('Ticket.custom_field_id',$CustomFieldName,array("escape"=>false,"type"=>"select",	"id"=>"CustomFieldName"," "=>" " ,'class'=>'form-control')); ?>

								<?php echo $this->Form->input('CustomFieldValue.custom_field_id',array("escape"=>false,"type"=>"hidden","id"=>"CustomFieldId",'class'=>'form-control'))?>

								<br>
								<span id="CustomFieldType_Data"></span>
								<span id="CustomFieldTypeWithValue"><?php
									
				 $count=1; foreach($CustomFieldValue as $customfield) {
		if(!empty($customfield)){
		//pr($customfield);
			$custom_field_id = $customfield['custom_field_values']['custom_field_id'];
			$custom_field_type_id = $customfield['custom_field_values']['custom_field_type_id'];
			$name = $customfield['custom_field_values']['name'];
			$field_type = $customfield['custom_field_values']['field_type'];
			$value = $customfield['custom_field_values']['value'];
			$id = $customfield['custom_field_values']['id'];

			echo $this->Form->input('CustomFieldValue.tickettext', array('type'=>'hidden','class'=>'form-control','value'=>2,'name'=>'CustomFieldValue[tickettext]'));

			if($field_type=='text')
			{
			echo $this->Form->input('CustomFieldValue.value', array('type'=>$field_type,'class'=>'form-control','id'=>'get_data','label'=>$name,'name'=>'CustomFieldValue[value]['.$count.']','value'=>$value));

			echo $this->Form->input('CustomFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'CustomFieldValue[name]['.$count.']','value'=>$name));

			echo $this->Form->input('CustomFieldValue.custom_field_type_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_type_id,'name'=>'CustomFieldValue[custom_field_type_id]['.$count.']'));

			echo $this->Form->input('CustomFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'CustomFieldValue[field_type]['.$count.']'));

			echo $this->Form->input('CustomFieldValue.custom_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_id ,'name'=>'CustomFieldValue[custom_field_id]['.$count.']'));
			echo $this->Form->input('CustomFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'CustomFieldValue[id]['.$count.']'));
				
			
			$count++;
			}
			elseif($field_type=="date")
			{
				?>

				<label><?php echo $name?></label>
                   	
                  	<input type="text" name="CustomFieldValue[value][<?php echo $count;?>]" value=<?php echo $value;?> class="form-control date-picker" >

                   
                <?php
                echo $this->Form->input('CustomFieldValue.custom_field_type_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_type_id,'name'=>'CustomFieldValue[custom_field_type_id]['.$count.']'));

                echo $this->Form->input('CustomFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'CustomFieldValue[name]['.$count.']','value'=>$name));

				echo $this->Form->input('CustomFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'CustomFieldValue[field_type]['.$count.']'));
			
				echo $this->Form->input('CustomFieldValue.custom_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_id ,'name'=>'CustomFieldValue[custom_field_id]['.$count.']'));
				echo $this->Form->input('CustomFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'CustomFieldValue[id]['.$count.']'));
				
				
				
				$count++;
			}
			elseif($field_type=="checkbox")
			{
				?><input type="checkbox" name="CustomFieldValue[value][<?php echo $count;?>]"><label>&nbsp;<?php echo $name;?></label>
                <?php
                echo $this->Form->input('CustomFieldValue.custom_field_type_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_type_id,'name'=>'CustomFieldValue[custom_field_type_id]['.$count.']'));

                echo $this->Form->input('CustomFieldValue.name', array('type'=>'hidden','class'=>'form-control','id'=>'get_data','name'=>'CustomFieldValue[name]['.$count.']','value'=>$name));

				echo $this->Form->input('CustomFieldValue.field_type', array('type'=>'hidden','class'=>'form-control','value'=>$field_type,'name'=>'CustomFieldValue[field_type]['.$count.']'));
			
				echo $this->Form->input('CustomFieldValue.custom_field_id', array('type'=>'hidden','class'=>'form-control','value'=>$custom_field_id ,'name'=>'CustomFieldValue[custom_field_id]['.$count.']'));

				echo $this->Form->input('CustomFieldValue.id', array('type'=>'hidden','class'=>'form-control','value'=>$id ,'name'=>'CustomFieldValue[id]['.$count.']'));
				
				$count++;
			}
		}
	}




									?></span>
								<br><br>



								<?php echo $this->Form->button('Update Ticket', array('class' => 'btn btn-success pull-left')); ?>
							
							</div> 
                    	</div>
					
					
					</div>


					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<?php echo $this->Form->input('Ticket.type', array('options' => array('' => '', 'virus' => 'Virus','tuneup' => 'TuneUp','software' => 'Software','other'=>'Other'),'class'=>'form-control','label'=>'Issue Type')); ?>
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
								<a class="btn btn-default btn-sm mt5" data-toggle="modal" href="#myModalassets">Assets &nbsp;&nbsp;<i class="fa fa-expand"></i></a>
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
											Here you can create new assets, view existing assets, and attach them to the ticket.
											<?php echo $this->Html->link('Create Asset (new window)',array('controller' => 'Assets', 'action' => 'add'),array('escape'=>false,'class'=>'btn btn-success m-b-sm pull-right','target'=>"_blank"));?>
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
												if(!empty($AssetfieldValue))
												{
													foreach ($AssetfieldValue as $asset) {
													$name = $asset['asset_field_values']['name'];
													$serial_number = $asset['asset_field_values']['serial_number'];
													$assetvalue_id = $asset['asset_field_values']['id'];
													?>
													<option id="<?php echo $assetvalue_id;?>" class="option_asset" ><?php echo $name.' - '.$serial_number; ?></option>

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
												<?php
												if(!empty($AssetValue))
												{
													foreach ($AssetValue as $asset) {
													$name = $asset['AssetFieldValue']['name'];
													$serial_number = $asset['AssetFieldValue']['serial_number'];
													$asset_id = $asset['AssetFieldValue']['id'];
													?>
													<option id="<?php echo $asset_id;?>" class="option_asset"><?php echo $name.' - '.$serial_number; ?></option>
													<?php 
													}
												}
												?>
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
       
              
         </div>   
        <?php echo $this->Form->end(); ?>

      
          
        
               
      </div>
        
    </div>
</div>
</div>




<!-- CustomFieldName -->
<!-- scripts -->

<script type="text/javascript">
$(document).ready(function(){
	$('#CustomFieldName').change(function(){
	 	var CustomFieldId = $(this).val();
	 	$('#CustomFieldId').val(CustomFieldId);
	 		$('#CustomFieldType_Data').text("Loading....");
			$.ajax({
       			type: 'POST',
      			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Tickets/customfieldtype/",

     	   
       			data: { CustomFieldId: CustomFieldId },
     			success: function(data) {
     				 $("#datetimepicker3").datetimepicker();
     				 $("#CustomFieldTypeWithValue").hide();
     				 $("#CustomFieldTypeWithValue :input").attr("disabled", true);
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