<section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Badges</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Badge', array('enctype' => 'multipart/form-data','method' => 'post','action'=>'edit')); ?>
                  <div class="box-body">                   
                    <div class="form-group">
                      <?php echo $this->Form->input('Badge.name', array('div'=>false,'class'=>'form-control')); ?>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">Image</label>
                     <?php echo $this->Form->file('Badge.image'); ?>
                     <?php echo $this->Html->image('badge_images/'.$image,array('alt' => 'CakePHP','class'=>'user-image'));?>
                      
                    </div>

                    <div class="form-group">
                    <?php echo $this->Form->input('Badge.status', array('options' => array('1'=>'Activate','0'=>'Deactivate'),'div'=>false, 'class'=>'form-control')); ?> 
                    </div>


                    <div class="form-group">
                    <?php echo $this->Form->input('Badge.position', array('options' => array('1'=>'First','2'=>'Second','3'=>'Third','4'=>'5km','5'=>'10km','6'=>'15km','7'=>'20km','8'=>'5 courses','9'=>'10 courses','11'=>'20 controls','12'=>'40 controls'),'div'=>false, 'class'=>'form-control')); ?> 
                    </div>
                    
                    <div class="form-group">
                      <?php echo $this->Form->input('Badge.description', array('div'=>false,'class'=>'form-control' ,'type'=>'textarea')); ?>
                    </div>

                    <div class="box-footer">
                  <?php echo $this->form->Submit("Submit",array('class'=>'btn btn-primary')); ?>                
                  </div>
                  </div>
          </div>
        </div>
      </div>
    </section>
