<?php echo $this->Flash->render('positive'); ?>

<div class="warper container-fluid">
        	
    <div class="page-header"><h1><?php echo $this->Html->link('New Estimate', array('controller' => 'Estimates', 'action' => 'add', 'admin' => true),array('escape' => FALSE)); ?></h1></div>
            
            
        <div class="row">
            
            <div class="col-md-9">
                
               <div class="panel panel-default">
                   <div class="panel-heading">New Estimate</div>
                   <div class="panel-body">
 
					<?php echo $this->Form->create('Estimate',array('controller'=>'Estimates','action'=>'add')); ?>
					<?php $a=$this->Session->read('Auth.User.email');?>
					
					<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						<label>Enter the customer name (or enter a new customer to quickly create one)<label> 
						<?php echo $this->Form->input('Estimate.est_number', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>rand(10,10000))); ?>
                   		<?php echo $this->Form->input('Estimate.created_by', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$a)); ?>
						</div>
                    </div>
                	</div>
					          
				
				<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
						<label>Customer</label>
                 		<?php echo $this->Form->input('Estimate.name', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the customer's name",'id'=>'get_data','required'=>'required')); ?>
                 		<div id="result"></div>
						</div>
                    </div>
               </div>

				
				<div class="row">                 
					<div class="col-xs-12 col-sm-12">
					<hr class="dotted">	
						<div class="btn-group">
							<?php echo $this->Form->button('<i class="fa fa-plus"></i>Create Estimate', array('class' => 'btn btn-success pull-left')); ?>
						</div>
					</div>
				</div>		
				<?php echo $this->Form->end(); ?>	
			</div>
				
		</div>


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
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/estimate/",

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





