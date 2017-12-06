<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:100px;">
        	
    <div class="page-header"><h1>New contract
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'contracts', 'action' => 'contractlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
            
            
        <div class="row">
            <div class="col-md-1">
            <?php 
            	if(isset($_GET['user_id']))
				{
				?> 
					<div class="user_id" style="display:none;"><?php echo $_GET['user_id'];?></div>
				<?php
				}
            ?>
            </div>
            <div class="col-md-10">
            <?php echo $this->Form->create('Contract',array('controller'=>'Contracts','action'=>'add','class'=>"validator-form",'id'=>"wizardForm")); ?>
            	<?php $a=$this->Session->read('Auth.User.email');?>

				<?php echo $this->Form->input('Contract.created_by', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$a)); ?>	
                <?php echo $this->Form->input('Contract.status', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>'Opportunity')); ?>	

                <div class="row">
                <div class="form-group">
					<?php echo $this->Form->input('Contract.name', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the customer's name",'id'=>'get_data','required'=>'required','label'=>'Customer name')); ?>
	                <div id="result"></div>
	            </div>
	            </div>

	            <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Contract.contract_name', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Contract Name')); ?>
	            </div>    
	            </div>

	            <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Contract.estimated_value', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Estimated Value','style'=>"width: 100px;")); ?>
			    </div>   
	            </div>

	            <div class="row">
	            <div class="form-group">
					
					<?php echo $this->Form->input('Contract.likelihood', array('options' => array('0' => '0', '25' => '25','50' => '50','75' => '75','100' => '100'),'class'=>'form-control','label'=>'Estimated Likelihood of Closing','style'=>"width: 100px;")); ?>
				</div>	
	            </div>

	            <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Contract.start_date', array('div'=>false,'class'=>'form-control date-picker','required'=>'required','label'=>'Start Date','style'=>"width: 100px;")); ?>
	            </div>    
	            </div>

	            <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Contract.end_date', array('div'=>false,'class'=>'form-control date-picker','required'=>'required','label'=>'End Date','style'=>"width: 100px;")); ?>
	            </div>  
	            </div>

	            <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Contract.primary_contact', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Primary Contact')); ?>
	            </div>   
	            </div>

	            <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Contract.description', array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'Description','style'=>"width: 400px;")); ?>
	            </div>    
	            </div>

	            <div class="row">
	            <div class="form-group">
					
					<label>Service Level Agreement (SLA)</label>
            		<?php echo $this->Form->select('Contract.sla_id',$slaname, array('class'=>'form-control')); ?>
				</div>	
	            </div>

	            <div class="row">
	            <div class="form-group">
					<?php echo $this->Form->input('Contract.applies_to_all_tickets', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp; Contract Applies to All Tickets')); ?>
				</div>	
			    </div>

			    <div class="row">
			    <div class="form-group">
	                <?php echo $this->Form->button('Create Contract', array('class' => 'btn btn-success pull-left')); ?>
	            </div>
				</div>

            <?php echo $this->Form->end(); ?>
			</div>
			<div class="col-md-1">
		    </div>
		</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
	$("#result").click(function(){
		$(this).hide();
	});

	$('#get_data').keyup(function(){

		var searchid = $(this).val();
		var dataString = searchid;
		//alert(dataString);
		$("#result").show();
		if(searchid!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Invoices/invoice/",
 			  // url: "search.php",
 			   data: { search : dataString },
			
 			   success: function(data)
 			   {
  				  $("#result").html(jQuery(data).find('.result').html()); 
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});
});
</script>


<script type="text/javascript">
$(document).ready(function(){
	

		var user_id = $('.user_id').text();
		//alert(user_id);die();
		if(user_id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/contracts/usernamebyid/",

 			  // url: "search.php",
 			   data: { user_id : user_id },
			
 			   success: function(data)
 			   {
  				  //$("#result").html(jQuery(data).find('.result').html()); 
  				  $('#get_data').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	
});
</script>