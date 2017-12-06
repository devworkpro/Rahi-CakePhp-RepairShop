  <section class="content">
	<div class="row">
	<div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Slider Image</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Front', array('enctype' => 'multipart/form-data','method' => 'post','action'=>'addslider')); ?>
                  <div class="box-body">
                    <div class="form-group">
                    <?php echo $this->Form->input('Slider.title', array('div'=>false,'class'=>'form-control')); ?>                       
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Slider Image</label>
                     <?php echo $this->Form->file('Slider.slider_image'); ?>
                    </div>
                    <div class="form-group">
                      <!--?php echo $this->Form->input('Slider.link', array('div'=>false,'class'=>'form-control')); ?-->
                    </div>
                     <div class="form-group">
                      <?php echo $this->Form->input('Slider.order', array('options' => array('0','1','2','3'),'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                      <!--?php echo $this->Form->input('Slider.status', array('options' => array('1' => 'Enable', '0' => 'Disable'),'class'=>'form-control')); ?-->
                    </div>
                   <div class="form-group">
                      <?php echo $this->Form->input('Slider.description', array('div'=>false,'class'=>'form-control' ,'type'=>'textarea')); ?>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                  <?php echo $this->form->Submit("Submit",array('class'=>'btn btn-primary')); ?>               	
                  </div>
               <?php echo $this->Form->end(); ?>
              </div><!-- /.box -->
    </div>
    </div>
   </section>