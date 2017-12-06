<?php echo $this->Flash->render('positive'); ?>
  <div class="warper container-fluid" style="margin-bottom: 50px;">
  <div class="page-header"><h1>Edit Ticket</h1></div>
        <div class="row">
          
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    
                <div class="panel-body">
        
          <?php echo $this->Form->create('Ticket',array('controller'=>'Tickets','action'=>'ticketedit')); ?>
          
          
          <div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
							
								<?php echo $this->Form->input('Ticket.title', array('div'=>false,'class'=>'form-control','label'=>'Subject','placeholder' => 'eg. Dell with bad DC jack','required'=>'required' )); ?>
							</div>
                    	</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
												
								<?php echo $this->Form->input('Ticket.additional_email', array('class'=>'form-control tagsinput','label'=>"Additional Emails to notify for comments",'id'=>'email','name'=>'Email[additional_email]')); ?>

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
								<input type="checkbox" name="Ticket[approved]" ><label>Is work approved to proceed?</label>	<br>		
								<input type="checkbox" name="Ticket[diagnosed]"><label>Is work pre-diagnosed?</label>			
								
							
							</div>  
                    	</div>
					
					
					</div>
				
					
					<div class="row">  
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<?php echo $this->Form->input('Ticket.status', array('options' => array('' => '','new' => 'New','in progress' => 'In Progress','resolved' => 'Resolved','invoiced'=>'Invoiced','waiting for parts'=>'Waiting for Parts','waiting on customer'=>'Waiting on Customer','scheduled'=>'Scheduled','customer reply'=>'Customer Reply'),'class'=>'form-control','label'=>'Status')); ?>
							</div>
						</div>
					
					
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">												
							<div class="btn-group">
							<?php echo $this->Form->button('Update Ticket', array('class' => 'btn btn-success pull-left')); ?>
							</div>
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

       
              
         </div>   
        <?php echo $this->Form->end(); ?>

      
          
        
               
      </div>
        
    </div>
</div>
</div>
