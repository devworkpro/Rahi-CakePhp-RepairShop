

<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
    <?php echo $this->element('frontenduser/sidebar2'); ?>
    <div class="col-xs-2">
    </div>
    <div class="col-xs-4">
    <?php echo $this->Flash->render('positive'); ?>
    <br>
    <div class="panel panel-white">
      
      <div class="panel-body">
       
        <div class="row">                 
         
          <div class="col-xs-12 col-sm-12" style="text-align: center;">
            <h3>Add your Profile Picture</h3>
            <div>
              <?php  if($user['User']['profile_pic']!=''){
                $profile_pic = $user['User']['profile_pic'];
                ?>
              <div class="row">
              Current Picture<br>
              <img src="<?php echo $this->webroot.'img/user_image/'.$profile_pic?>" width="100" height="100" alt="">
              <br>
              </div>
              <?php }
              ?>
              <br>
              <div class="row">
                <a href="#myAttachmentModal" data-toggle="modal" class='btn btn-primary btn-lg' > Add New Profile Picture</a>
              </div>
            </div>
          </div>
          
        </div>
          
      </div>
      
      
    </div>
  </div>
<div class="col-xs-2">
</div>
</div>


<!-- myAttachment Modal -->   
<div class="modal fade" id="myAttachmentModal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Picture</h4>
    </div>
    <div class="modal-body">
    
    <div id="main-wrapper" class="container">
      <?php echo $this->Form->create('users',array('controller'=>'users','action'=>'profile_pic','class'=>'validator-form','enctype' => 'multipart/form-data','id'=>"wizardForm")); ?>

      <div class="row">  
                 
          <div class="col-xs-12 col-sm-12">
          <div class="input-group">
          
            <span class="col-xs-5 col-sm-5">
        
            <label>Select one file:</label>&nbsp;&nbsp;&nbsp;
            </span>
            <span class="col-xs-1 col-sm-1"></span>

            <span class="btn btn-primary col-xs-6 col-sm-6">
                <?php echo $this->Form->input('User.file', array('type'=>'file','class'=>'form-control','label'=>'Choose File','required'=>'required','style'=>"display: none;")); ?> 

                <?php echo $this->Form->input('User.user_id', array('type'=>'hidden','class'=>'form-control','value'=>$this->Session->read('Auth.User.id'))); ?>
            </span>&nbsp;&nbsp;&nbsp;

            <span class="col-xs-12 col-sm-12"></span>
            <span class="col-xs-12 col-sm-12" style="padding-right: 0;">
            <?php echo $this->Form->submit('Upload', array('class' => 'btn btn-success pull-right')); ?>
            </span>
          </div>
          </div>
      
    
        <?php echo $this->Form->end(); ?> 
      </div>      
    </div>

                          
    
    
    </div>
    </div>
                      
  </div>
</div>