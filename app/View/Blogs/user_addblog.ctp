
<body>
<div id="wrapper">
<div class="container">
</div>
<section class="blog_detail">
<div class="container">
<div class="blg_content">

<h3>Blog Title: </h3>
</div>
        <?php echo $this->Form->create('Blog', array('action'=>'addblog','enctype' => 'multipart/form-data')); ?>
   <div class="form-group">
                      <?php echo $this->Form->input('Blog.title', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Enter Your Blog Title')); ?>
                    </div>



                         <div class="form-group">
                       <?php  $temp = $this->Session->read(); ?>
     <?php echo $this->Form->hidden( 'Blog.user_id', array('value'=>$temp['Auth']['User']['id'] )); ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Blog Picture</label>
                    <?php echo $this->Form->file('Blog.image'); ?>
                    <p class="help-block">Blog  Picture</p>
                    </div>
                  
       <div class="form-group">
                      <?php echo $this->Form->input('Blog.description', array('div'=>false,'class'=>'form-control', 'type' => 'textarea', 'placeholder' => 'Add Description: ')); ?>

                       </div>
                       

             

          
<!--<a href="#" class="btn_lft">Return To Blog Page</a><a href="#" class="btn_ryt">SEND</a>-->
 <div class="blg_btn">
                  <?php echo $this->Form->Submit("Submit",array('class'=>'btn btn-primary')); ?>                
                  </div>
                     <?php echo $this->Form->end(); ?>

</div>
</div> 
</section>
</div><!--wrapper-->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
  
</body>
</html