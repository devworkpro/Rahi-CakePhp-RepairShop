<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px;">
        	
            <div class="page-header"><h1>Add New category<span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'categories', 'action' => 'categorylist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h1></div>
            
            
            <div class="row">
            	<div class="col-md-2">
          		</div>
            	<div class="col-md-8">
                
                	<div class="panel panel-default">
                        <div class="panel-heading">Add New Category</div>
                        <div class="panel-body">
				
					<?php echo $this->Form->create('Category',array('controller'=>'categories','action'=>'add','id'=>"wizardForm",'class'=>"validator-form",'novalidate'=>true,'inputDefaults'=>array())); ?>

	
					<div class="panel-body">
						
						<div class="row">                 
							<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									<?php echo $this->Form->input('Category.category', array('div'=>false,'class'=>'form-control','placeholder' => 'Enter Your category','required'=>'required')); ?>
                   
								</div>
							</div>
						</div>
					<div class="row">
							
							<div class="col-xs-12 col-sm-12"> 
								<div class="form-group">
									<label>Sub Category </label>
									<?php  echo "<br/>".$this->Form->select('Category.parent_id',$cat,array("escape"=>false,"empty"=>"select",'id'=>'get_data','class'=>'form-control')); ?>
								
									<?php echo $this->Form->input('Category.category_type', array('div'=>false,'type'=>'hidden','class'=>'form-control', 'id'=>'get','value' => '')); ?>
								</div>
							</div>                                                                                                                 
						</div>						
						
						<div class="row">                 
							<div class="col-xs-12 col-sm-12">
								<div class="form-group">
									<?php echo $this->Form->input('Category.description', array('div'=>false,'class'=>'form-control','placeholder' => 'Enter Your category description')); ?>
                   
								</div>
							</div>
								<hr class="dotted">
									<div class="btn-group">
										<?php echo $this->Form->button('<i class="fa fa-times"></i> Reset', array('class' => 'btn btn-danger pull-left','type'=>'reset','required' => 'true')); ?>
									</div>

									<div class="btn-group">
										<?php echo $this->Form->button('<i class="fa fa-plus"></i> Save', array('class' => 'btn btn-success pull-left')); ?>
									</div>
				
		
								</div>
							</div>
						</div>
                
						<?php echo $this->Form->end(); ?>
					</div>
				
				</div>
				<div class="col-md-2">
          		</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready( function (){

$('select#get_data').on('change', function() {

var content = $('#get_data option:selected').text();
  //alert(content); 
 $('#get').val(content);
}); 
});
</script>