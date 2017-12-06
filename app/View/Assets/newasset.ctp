<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;">
<div class="row">
	
	<div class="col-xs-12 col-sm-12">
		<div class="row">  
			<div class="col-xs-2 col-sm-2">  
			</div>             
        	<div class="col-xs-6 col-sm-6">
				<h2>New Asset</h2>
				
        	</div>
        	<div class="col-xs-2 col-sm-2" style="margin-top:25px;"> 
        	<?php echo $this->Html->link('Back',array('controller' => 'Assets', 'action' => 'customerassets'),array('escape'=>false,'class'=>'pull-right'));?>
				 
			</div>
			<div class="col-xs-2 col-sm-2"></div>
    	</div>

		<?php echo $this->Form->create('Assets',array('controller'=>'Assets','action'=>'assetcustomfieldvalue','id'=>"wizardForm")); ?>
					
		<div class="row">  
			<div class="col-xs-12 col-sm-2">  
			</div>             
        	<div class="col-xs-5 col-sm-8">
				<div class="form-group">
				<div class="col-xs-5 col-sm-6">
				<label> Asset Type </label> 
			 		<?php  echo $this->Form->select('Assets.asset_id',$AssetCustomfieldName,array("escape"=>false,"type"=>"select",	"id"=>"AssetCustomfieldName"," "=>" " ,'class'=>'form-control','name'=>'AssetFieldValue[asset_id]')); ?>
					<?php echo $this->Form->input('Assets.type', array('div'=>false,'type'=>'hidden','class'=>'form-control', 'id'=>'type','value' => '','name'=>'AssetFieldValue[type]')); ?>
					<?php echo $this->Form->input('Assets.text', array('type'=>'hidden','class'=>'form-control','value'=>1,'name'=>'AssetFieldValue[text]')); ?>
					<?php echo $this->Form->input('Assets.asset', array('type'=>'hidden','class'=>'form-control','value'=>"asset",'name'=>'AssetFieldValue[asset]')); ?>
					<?php  echo $this->Form->input('AssetFieldValue.login_id',array("type"=>"hidden",'class'=>'form-control','name'=>'AssetFieldValue[login_id]','value'=>$this->Session->read('Auth.User.id'))); ?>
				</div>

				</div>
				<div class="col-sm-6"><?php echo $this->Html->link('Modify Types',array('controller' => 'Assets', 'action' => 'assettypes'),array('escape'=>false,'class'=>'pull-left'));?></div> 
				<br><br><br><div id="AssetCustomField_Data">
					<span id='loading' style="margin-left: 30px; display: none;">
					<?php echo $this->Html->image('../images/reload.gif', array('width' => '20px'));?><br>
					</span>

				</div>
        	</div>
        	<div class="col-xs-12 col-sm-2">  
        	<?php
				if(isset($_GET['user_id']))
				{
					echo $this->Form->input('Assets.user_id', array('type'=>'hidden','class'=>'form-control','value'=>$_GET['user_id'],'name'=>'AssetFieldValue[user_id]'));
				} 
				else
				{
					echo $this->Form->input('Assets.user_id', array('type'=>'hidden','class'=>'form-control','name'=>'AssetFieldValue[user_id]')); 
				}
			?>
        		
			</div> 
        	
    	</div>
				
		<div class="row"> 
			<div class="col-xs-12 col-sm-2"> 
			</div>               
			<div class="col-xs-12 col-sm-8">
				<div class="btn-group">
					<?php echo $this->Form->button('Update Asset Field', array('class' => 'btn btn-success')); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-2">  
			</div>
		</div>		
		<?php echo $this->Form->end(); ?>
            
	</div>
	 

</div>


</div>


<!-- scripts -->

<script type="text/javascript">
$(document).ready(function(){
	$('#AssetCustomfieldName').change(function(){
	 	var AssetField_id = $(this).val();
	 	var type = $('#AssetCustomfieldName option:selected').text();
  		//alert(type); die();
 		$('#type').val(type);

	 		$('#loading').show();
			$.ajax({
       			type: 'POST',
      			url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Assets/customfields/",
  	   
       			data: { AssetField_id : AssetField_id },
     			success: function(data) {
     				$('#loading').hide();
     				//$("#datetimepicker1").datetimepicker();
     				//$("#CustomFieldTypeWithValue").hide();
     				//$("#CustomFieldTypeWithValue :input").attr("disabled", true);
					$('#AssetCustomField_Data').html(jQuery(data).find('.result').html()); 
     				//   alert("Success: " + data);
				//	  $('#newDiv').html(data);    
					 

					
 		       }
   		});
	});
});
</script>


<script src="<?php echo $this->webroot.'js/jquery/jquery-1.9.1.min.js'?>"></script>
<script type="text/javascript">

$(function() {
    $("#datetimepicker1").datetimepicker();
    $("#datetimepicker2").datetimepicker();
});


</script>