    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Create CMS Page</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('Page', array('method' => 'post','action'=>'addcmspage')); ?>
                  <div class="box-body">                   
                    <div class="form-group">
                      <?php echo $this->Form->input('Page.title', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
                    <div class="form-group">
                      <?php echo $this->Form->input('Page.key', array('div'=>false,'class'=>'form-control')); ?>
                    <div class="form-group">
                    <label for="PageTitle">Content</label>
                      <?php echo $this->Form->textarea('Page.content', array('div'=>false,'class'=>'form-control')); ?>
                    </div>
                     
                    <div class="form-group">
                    <label>Is Rule Page: </label>
                      <?php echo $this->Form->checkbox('Page.is_rule'); ?>
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

   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea',
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image', });</script>
