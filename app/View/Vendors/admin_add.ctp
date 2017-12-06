<?php echo $this->Flash->render('positive'); ?>

<div class="warper container-fluid" style="margin-bottom:100px;">
        	
    <div class="page-header"><h1>New Vendor
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Vendors', 'action' => 'vendorlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
            
            
        <div class="row">
            <div class="col-md-1">
            
            </div>
            <div class="col-md-6">
            	<div class="panel panel-default">
                    <div class="panel-heading">New Vendor</div>
                    <div class="panel-body"><br>
        			<?php echo $this->Form->create('Vendor',array('controller'=>'Vendors','action'=>'add','class'=>"validator-form",'id'=>"wizardForm")); ?>
        	
            		<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.name', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Name')); ?>
               
							</div>
						</div>
					</div>
					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.rep_first_name', array('class'=>'form-control','required'=>'required','label'=>'Rep First Name')); ?>
               
							</div>
						</div>
					</div>


					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.rep_last_name', array('class'=>'form-control','required'=>'required','label'=>'Rep Last Name')); ?>
               
							</div>
						</div>
					</div>


					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.email', array('type'=>'email','class'=>'form-control','required'=>'required','label'=>'Email')); ?>
               
							</div>
						</div>
					</div>

					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.account_number', array('class'=>'form-control','required'=>'required','label'=>'Account number')); ?>
               
							</div>
						</div>
					</div>

					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.phone', array('class'=>'form-control','required'=>'required','label'=>'Phone')); ?>
               
							</div>
						</div>
					</div>

					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.address', array('class'=>'form-control','required'=>'required','label'=>'Address')); ?>
               
							</div>
						</div>
					</div>

					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.city', array('class'=>'form-control','required'=>'required','label'=>'City')); ?>
               
							</div>
						</div>
					</div>

					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.state_country', array('class'=>'form-control','required'=>'required','label'=>'State/County')); ?>
               
							</div>
						</div>
					</div>

					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.zip', array('class'=>'form-control','required'=>'required','label'=>'Zip/Postal Code')); ?>
               
							</div>
						</div>
					</div>

					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.website', array('class'=>'form-control','required'=>'required','label'=>'Website')); ?>
               
							</div>
						</div>
					</div>

					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.notes', array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>'Notes','style'=>'height: 70px;')); ?>
               
							</div>
						</div>
					</div>
					
					<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Vendor.invoice_terms', array('options' => array(""=>""),'class'=>'form-control','label'=>'Default Invoice Terms')); ?>
							</div>
						</div>
					</div>

					<div class="row">
				    	<div class="col-xs-12 col-sm-12">
				    	<div class="form-group">
		                	<?php echo $this->Form->button('Create Vendor', array('class' => 'btn btn-success pull-left')); ?>
		            	</div>
		            	</div>
					</div>

        			<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>

			<div class="col-md-5">
		    </div>
		</div>
</div>

