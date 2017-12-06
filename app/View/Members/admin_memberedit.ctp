<div class="warper container-fluid">
	<div class="page-header"><h1><?php echo $this->Html->link('Edit Mamber', array('controller' => 'mambers', 'action' => 'add', 'admin' => true),array('escape' => FALSE)); ?></h1></div>
		<div class="row">
          
			<div class="col-md-9">
                
				<div class="panel panel-default">
					<div class="panel-heading">Edit Mamber</div>
                <div class="panel-body">
                <!-- form start -->
                <?php echo $this->Form->create('Mamber', array('enctype' => 'multipart/form-data','method' => 'post','action'=>'mamberlist')); ?>
                  <div class="box-body">                   
                    <div class="form-group">
                     
                    </div>
                   
                    
                   <div class="form-group">
                                     
                    </div>
                     
                  

                   <div class="form-group">
                                  
                    </div>
                   
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                        
<div class="form-group">
        <label class="col-md-2 text-left"></label>
        <div class="col-md-10">
        
        <div class="input-group col-md-6" style="text-align: left;">

        <div class="btn-group">
        <?php echo $this->Form->button('<i class="fa fa-times"></i> Reset', array('class' => 'btn btn-primary pull-left','type'=>'reset')); ?>
        </div>

        <div class="btn-group">
        <?php echo $this->Form->button('<i class="fa fa-plus"></i> Save', array('class' => 'btn btn-primary pull-left')); ?>
        </div>
        <div class="btn-group">
                     <?php echo $this->Html->link('Back',array('controller' => 'mambers', 'action' => 'mamberlist'),array('escape'=>false));?>
        </div>
    
                </div>
                </div>
                </div>
    
                  </div>
               <?php echo $this->Form->end(); ?>
              </div><!-- /.box -->
        </div>
        </div>
      </div>
      </div>


