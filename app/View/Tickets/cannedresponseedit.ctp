<div class="warper container-fluid">

    <div class="row">
    <div class="col-xs-12 col-sm-12">
    <h2>Editing Canned Response 
    <?php echo $this->Html->link('Back',array('controller' => 'Tickets', 'action' => 'cannedresponses'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?>
    
    </h2>   
    </div>
    </div>    	
    <hr>

<div class="row">
	
	<div class="col-xs-12 col-sm-12">
		<?php echo $this->Form->create('Tickets',array('controller'=>'Tickets','action'=>'cannedresponseedit')); ?>
					
					
		<div class="row">  
			<div class="col-xs-12 col-sm-2">  
			</div>             
        	<div class="col-xs-12 col-sm-8">
				<div class="form-group">
			 		<?php echo $this->Form->input('CannedResponse.title', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Title')); ?>
                    <?php echo $this->Form->input('CannedResponse.id', array('type'=>'hidden','class'=>'form-control')); ?>
					
				</div>
        	</div>
        	<div class="col-xs-12 col-sm-2">  
			</div>
    	</div>

    	<div class="row">  
			<div class="col-xs-12 col-sm-2">  
			</div>             
        	<div class="col-xs-12 col-sm-8">
				<div class="form-group">
			 		<?php echo $this->Form->input('CannedResponse.body', array('class'=>'form-control','label'=>'Body')); ?>
				
				</div>
        	</div>
        	<div class="col-xs-12 col-sm-2">  
			</div>
    	</div>

    	
				
		<div class="row"> 
			<div class="col-xs-12 col-sm-2"> 
			</div>               
			<div class="col-xs-12 col-sm-8">
				<div class="btn-group">
					<?php echo $this->Form->button('Update Canned Response', array('class' => 'btn btn-success')); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-2">  
			</div>
		</div>		
		<?php echo $this->Form->end(); ?>
            
	</div>
	 

</div>

<br><br>
<div class="row"> 
    <div class="col-xs-12 col-sm-2"> 
    </div>               
    <div class="col-xs-12 col-sm-8">
        <div class="btn-group">
           <?php echo $this->Html->link('Show',array('controller' => 'Tickets', 'action' => 'cannedresponseview',$CannedResponse['CannedResponse']['id']),array('escape'=>false));?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-2">  
    </div>
</div>  



</div>