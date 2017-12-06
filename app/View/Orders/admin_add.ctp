<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px;">
        	
    <div class="page-header"><h1>New Purchase
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'orders', 'action' => 'orderlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
            
            
        <div class="row">
            <div class="col-md-1">

            <?php 
            		if(isset($_GET['user_id']))
						{
						 ?> 
						 <div class="user_id" style="display: none;"><?php echo $_GET['user_id']; ?> </div>	
						 <?php
						}
            ?>
            </div>
            <div class="col-md-10">
            <?php echo $this->Form->create('Order',array('controller'=>'orders','action'=>'add','class'=>"validator-form",'id'=>"wizardForm")); ?>
            <?php $a=$this->Session->read('Auth.User.email');?>

				<?php echo $this->Form->input('Order.created_by', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$a)); ?>	
                <?php echo $this->Form->input('Order.status', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>'Estimate')); ?>	

                <div class="col-md-6">
                	<div class="form-group">
					<?php echo $this->Form->input('Order.name', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the customer's name",'id'=>'get_data','required'=>'required','label'=>'Customer name')); ?>
	                <div id="result"></div>
	                </div>
	                <div class="form-group">
	                <?php echo $this->Form->input('Order.identification', array('div'=>false,'class'=>'form-control','label'=>"Customer Identification (Driver's License No., for example)")); ?>
	                </div>
	                <div class="form-group">
	                <?php echo $this->Form->button('Create Customer purchase', array('class' => 'btn btn-success pull-left')); ?>
	                </div>
				</div>

				<div class="col-md-1">or</div>

            	<div class="col-md-5">
            		
            		<?php echo $this->Html->link('New Customer (new window)',array('controller' => 'Users', 'action' => 'add'),array('escape'=>false,'class'=>'btn btn-success btn-sm','target'=>"_blank"));?>
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
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/orders/usernamebyid/",

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