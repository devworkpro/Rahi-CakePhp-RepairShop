<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:100px;">
        	
    <div class="page-header"><h1>New Purchase Order
    <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'PurchaseOrders', 'action' => 'purchaseorderlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
            
            
    <div class="row">
        
        <div class="col-md-1">
        </div>

        <div class="col-md-10">
        <?php echo $this->Form->create('PurchaseOrder',array('controller'=>'PurchaseOrders','action'=>'add','class'=>"validator-form",'id'=>"wizardForm")); ?>

            <?php echo $this->Html->link('Manage Vendors',array('controller' => 'Vendors', 'action' => 'vendorlist'),array('escape'=>false));?>

			<?php echo $this->Form->input('PurchaseOrder.status', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>'Open')); ?>	

			<?php echo $this->Form->input('PurchaseOrder.number', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>date('Ymd-s')));?>	

			<?php echo $this->Form->input('PurchaseOrder.order_date', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>date('m/d/Y')));?>	

            <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group"><br>
            	<label>Vendor</label>
                <?php echo $this->Form->select('PurchaseOrder.vendor_id',$Vendor,array("escape"=>false,'class'=>'form-control','label'=>'Vendor')); ?>
            </div>
            </div>
            </div>

            <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
                <?php echo $this->Form->input('PurchaseOrder.user', array('options' => array($this->Session->read('Auth.User.first_name') => $this->Session->read('Auth.User.first_name')),'class'=>'form-control','label'=>'User')); ?>
            </div>
            </div>
            </div>

            <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
                <?php echo $this->Form->input('PurchaseOrder.expected_date', array('div'=>false,'class'=>'form-control date-picker','label'=>"Expected Date")); ?>
            </div>
            </div>
            </div>

            <div class="row">                 
            <div class="col-xs-12 col-sm-12">
        	<div class="form-group">
                <?php echo $this->Form->input('PurchaseOrder.delivery_tracking', array('div'=>false,'class'=>'form-control','label'=>"Delivery Tracking")); ?>
            </div>
            </div>
            </div>

            <div class="row">                 
            <div class="col-xs-6 col-sm-6">
            <div class="form-group">
                <?php echo $this->Form->input('PurchaseOrder.shipping_notes', array('type'=>'textarea','class'=>'form-control','label'=>"Shipping notes","style"=>"height: 70px;")); ?>
            </div>
            </div>
            <div class="col-xs-6 col-sm-6"></div>
            </div>
            
            <div class="row">                 
            <div class="col-xs-6 col-sm-6">
            <div class="form-group">
                <?php echo $this->Form->input('PurchaseOrder.general_notes', array('type'=>'textarea','class'=>'form-control','label'=>"General notes","style"=>"height: 70px;")); ?>
            </div>
            </div>
            <div class="col-xs-6 col-sm-6"></div>
            </div>
            
            <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
                <?php echo $this->Form->button('Create Purchase Order', array('class' => 'btn btn-success pull-left')); ?>
            </div>
            </div>
            </div>
			          		
        	<?php echo $this->Form->end(); ?>
		
		</div>

		<div class="col-md-1">
	    </div>
	
	</div>
</div>