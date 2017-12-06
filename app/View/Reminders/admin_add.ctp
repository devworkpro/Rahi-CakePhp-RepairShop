<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid">
        	
    <div class="page-header"><h1>New Reminder<span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Reminders', 'action' => 'reminderlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h1></div>
            
            
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                
               <div class="panel panel-default">
                   <div class="panel-heading">New Reminder</div>
                   <div class="panel-body">
 
					<?php echo $this->Form->create('Reminder',array('controller'=>'Reminders','action'=>'add','class'=>'validator-form')); ?>
					<?php $a=$this->Session->read('Auth.User.email');?>
					
					<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						<label>Enter the customer name (or enter a new customer to quickly create one)<label> 
						
						</div>
                    </div>
                	</div>
					          
				
					<div class="row">                 
	                    <div class="col-xs-12 col-sm-12">
							<div class="form-group">
							<label>Customer</label>
	                 		<?php echo $this->Form->input('Reminder.name', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the customer's name",'id'=>'get_data','required'=>'required')); ?>
	                 		<div id="result"></div>
							</div>
	                    </div>
	               </div>

				
					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
						<hr class="dotted">	
							<div class="btn-group">
								<?php echo $this->Form->button('Create Reminder', array('class' => 'btn btn-success pull-left')); ?>
							</div>
						</div>
					</div>		
					<?php echo $this->Form->end(); ?>	
					</div>
				
				</div>


			</div>
			<div class="col-md-2">
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
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Reminders/reminder/",

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





