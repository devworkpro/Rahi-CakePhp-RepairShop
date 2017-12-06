<?php echo $this->Flash->render('positive'); ?>

<div class="warper container-fluid" style="margin-bottom:50px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                
                <div class="panel-body">
                	<div class="widget-content">
							<h3>Welcome!</h3>
							<p>You may begin a check-in to get started with a new request, or check the status of an existing request.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
      
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
 					<h3>Start a New Service Ticket</h3>
					<p>We just need a couple things to get started:</p>
					<?php echo $this->Form->create('Lead',array('controller'=>'Leads','action'=>'ticketinfo')); ?>
					
					<div class="row">                 
                    <div class="col-xs-12 col-sm-12">
						<div class="form-group">
                   		<?php echo $this->Form->input('Lead.first_name', array('div'=>false,'class'=>'form-control','placeholder' => "First Name",'label'=>'First Name','required'=>'required')); ?>
                   		
						</div>
                    </div>
                	</div>
					          
				
					<div class="row">                 
	                    <div class="col-xs-12 col-sm-12">
							<div class="form-group">
	                 		<?php echo $this->Form->input('Lead.last_name', array('div'=>false,'class'=>'form-control','placeholder' => "Last Name",'required'=>'required','label'=>'Last Name')); ?>
							</div>
	                    </div>
	                </div>

	                <div class="row">                 
	                    <div class="col-xs-12 col-sm-12">
							<div class="form-group">
	                 		<?php echo $this->Form->input('Lead.phone', array('div'=>false,'class'=>'form-control','placeholder' => "Phone",'required'=>'required','label'=>'Phone','required'=>'required')); ?>
							</div>
	                    </div>
	                </div>

	                <div class="row">                 
	                    <div class="col-xs-12 col-sm-12">
							<div class="form-group">
	                 		<?php echo $this->Form->input('Lead.email', array('div'=>false,'class'=>'form-control','placeholder' => "Email",'required'=>'required','label'=>'Email')); ?>
							</div>
	                    </div>
	                </div>

				
					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
						<hr class="dotted">	
							<div class="btn-group">
								<?php echo $this->Form->button('Get Started', array('class' => 'btn btn-success pull-left')); ?>
							</div>
						</div>
					</div>		
				    <?php echo $this->Form->end(); ?>	
				</div>
			</div>
		</div>


		<div class="col-md-6">
            <div class="panel panel-default">
                
                   	<div class="panel-body">
 					
 					<h3>Existing Ticket Lookup</h3>
 					  	<h4 style="display:none" id="error">Sorry, we couldn't find a match, Please try the search again</h4>
						<p>Just enter your info to do a search.</p>

					
						<div class="row">                 
	                    <div class="col-xs-12 col-sm-12">
							<div class="form-group">
							<label>Ticket Number</label>
							<input type="text" name="ticket_number" class='form-control' placeholder = "eg. 1234">
						
							</div>
	                    </div>
	                	</div>
					          
				
						<div class="row">                 
		                    <div class="col-xs-12 col-sm-12">
								<div class="form-group">
								<label>Last Name</label>
								<input type="text" name="last_name" class='form-control' placeholder = "Last Name">
						
		                 		</div>
		                    </div>
		               	</div>

				
						<div class="row">                 
							<div class="col-xs-12 col-sm-12">
							<hr class="dotted">	
								<div class="btn-group">
								<input type="button" name="lookup" id="lookup" class='btn btn-success pull-left' value="Lookup">
								</div>
							</div>
						</div>		
				    	<?php echo $this->Form->end(); ?>	
					</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
    
$('#lookup').click(function() {
	$('#error').show();
		});		
});
</script>