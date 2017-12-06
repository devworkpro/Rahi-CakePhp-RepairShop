
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
    <?php echo $this->element('frontenduser/sidebar2'); ?>
    <div class="col-xs-9">
    <?php echo $this->Flash->render('positive'); ?>
    
    <div class="panel panel-white">
      
      <div class="panel-body">
        <br><?php //pr($user);?>
        <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'edituseraccount','class'=>'validator-form','id'=>"wizardForm"));?>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <?php echo $this->Form->input('User.first_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'FullName','label'=>'Full Name','required'=>'required')); ?>
              </div>
              </div>
            </div>
         
            <div class="row">    
              <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <?php echo $this->Form->input('User.email', array('div'=>false,'class'=>'form-control','placeholder'=>'Email','label'=>'Email','required'=>'required')); ?>
              </div>
              </div>
            </div>
            <div class="row">  
              <div class="col-xs-12 col-sm-12"> 
              <div class="form-group"> 
                <?php echo $this->Form->input('User.calendar_entry_color', array('type'=>'color','class'=>'form-control','placeholder'=>'Address','label'=>'Calendar Entry Color','required'=>'required')); ?>
              </div>
              </div>
            </div>
             
            
            <div class="row">                 
              <div class="col-xs-6 col-sm-12">
                <div class="form-group"> 
                <?php echo $this->form->Submit("Update Account",array('class'=>'btn btn-success pull-left')); ?>
                </div>
              </div>
            </div><br>
          </div>
          
      </div>
      <?php echo $this->Form->end(); ?>
      
    </div>
  </div>

  <!-- Location Allocation -->
  <!-- <div class="panel panel-white">
    <div class="panel-body">
      <div class="row">  
        <div class="col-md-9" style="margin-top: -20px;">
            <b><h2><i class="fa fa-user"></i>    Users</h2></b>
        </div>
      </div><br>
    
      <div class="row">                 
        <div class="col-xs-12 col-sm-12">
        </div>
      </div>
    </div>
  </div> -->
  
</div>

