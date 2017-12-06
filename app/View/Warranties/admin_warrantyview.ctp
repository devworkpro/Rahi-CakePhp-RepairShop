<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px;">
	<div class="page-header"><h1>Warranty Details <span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Warranties', 'action' => 'warrantylist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h1></div>
				
	<div class="row">
      	<div class="col-md-1">
      	</div>
		<div class="col-md-9">  
			<?php $warranty_id = $Warranty['Warranty']['id'];?>
		    <p><b>Name:</b><?php echo $Warranty['Warranty']['name'];?></p>
		    <p><b>Warranty information:</b></p>
		    <pre><?php echo $Warranty['Warranty']['warranty_information'];?></pre>
		    <p><b>Expiration date:</b><?php echo $Warranty['Warranty']['expiration_date'];?></p>
			<p><b>Certificate num:</b><?php echo $Warranty['Warranty']['certificate_num'];?></p>
		    <p><b>Invoice:</b><?php echo $Warranty['Warranty']['invoice_id'];?></p>
		    <?php echo $this->Html->link('Edit',array('controller' => 'Warranties', 'action' => 'warrantyedit',$warranty_id),array('escape'=>false));?> |
		    <?php echo $this->Html->link('Back',array('controller' => 'Warranties', 'action' => 'warrantylist'),array('escape'=>false));?>
		</div>
        <div class="col-md-2">
        	<?php echo $this->Html->link('Certificate PDF',array('controller' => 'Warranties', 'action' => 'warrantycertificate',$warranty_id),array('escape'=>false,'target'=>"_blank",'class'=>'btn btn-success pull-right'));?>
        	
      	</div>
    </div>

   

</div>
 
  