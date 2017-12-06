<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; ">
	
	<div class="row">
		<div class="col-md-2">
            
		</div>
        <div class="col-md-8">
            <div class="panel panel-default">
                
                <div class="panel-body">
                	<div class="widget-content">
						<h3>Almost done...</h3>
						<p>Now just tell us a little bit more about how we can help you.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2">
            
		</div>
	</div>


	<div class="row">
        <div class="col-md-2">
            
		</div>
	

        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-body">
					<p>Please review the problems below:</p>
					<?php echo $this->Form->create('Lead',array('controller'=>'Leads','action'=>'add')); ?>
					
					<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
                   		<?php echo $this->Form->input('Lead.first_name', array('type'=>'hidden','div'=>false,'class'=>'form-control','placeholder' => "First Name",'label'=>'First Name')); ?>

                   		<?php echo $this->Form->input('Lead.issue_type', array('options' => array('NULL' => '', 'virus' => 'Virus','tuneup' => 'TuneUp','software' => 'Software','other'=>'Other'),'class'=>'form-control','label'=>'Issue Type')); ?>

                   		<?php echo $this->Form->input('Lead.login_id', array('type'=>'hidden','class'=>'form-control','value'=>$this->Session->read('User_id'))); ?>
						</div>
                    </div>
                	</div>
					          
				
					<div class="row">                 
	                    <div class="col-xs-12 col-sm-12">
							<div class="form-group">
	                 		<?php echo $this->Form->input('Lead.last_name', array('type'=>'hidden','div'=>false,'class'=>'form-control','placeholder' => "Last Name",'required'=>'required','label'=>'Last Name')); ?>
	                 		<?php echo $this->Form->input('Lead.subject', array('div'=>false,'class'=>'form-control','placeholder' => "Subject of the issue",'required'=>'required','label'=>'Subject')); ?>
							</div>
	                    </div>
	                </div>

	                <div class="row">                 
	                    <div class="col-xs-12 col-sm-12">
							<div class="form-group">
	                 		<?php echo $this->Form->input('Lead.phone', array('type'=>'hidden','div'=>false,'class'=>'form-control','placeholder' => "Phone",'required'=>'required','label'=>'Phone')); ?>
	                 		<?php echo $this->Form->input('Lead.description', array('type'=>'textarea','div'=>false,'class'=>'form-control','placeholder' => "Description of the issue",'required'=>'required','label'=>'Detailed Description')); ?>
							</div>
	                    </div>
	                </div>

	                <div class="row">                 
	                    <div class="col-xs-12 col-sm-12">
							<div class="form-group">
	                 		<?php echo $this->Form->input('Lead.email', array('type'=>'hidden','div'=>false,'class'=>'form-control','placeholder' => "Email",'required'=>'required','label'=>'Email')); ?>
	                 		<?php echo $this->Form->input('Lead.status', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>'new')); ?>


	                 		<div id="session_id" style="display:none;"><?php echo $session_id = $this->Session->read('User_id');?>
							</div>

							<input type='hidden' name="Lead[assignee]" id="assignee" value=""/>
							</div>
	                    </div>
	                </div>
	                <hr class="dotted">	
				
					<div class="row">                 
						<div class="col-xs-12 col-sm-12 ">
							
							<?php echo $this->Form->button('Submit', array('class' => 'btn btn-success')); ?>
							<div class="btn-group">
								
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
<script>
$(document).ready(function() {
var id=$('#session_id').text();

//alert(id);
		if(id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Leads/email/",

 			  // url: "search.php",
 			   data: { id : id },
			
 			   success: function(data)
 			   {
  						
  						var owner = jQuery(data).find('.get_result1').html(); 
  						$('#assignee').val(owner.trim()); 

  						 
  						
  					
  			   }
  			  });
		}return false; 
		
});
</script>