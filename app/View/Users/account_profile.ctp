

<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
    <?php echo $this->element('frontenduser/sidebar2'); ?>
    <div class="col-xs-9">
    <?php echo $this->Flash->render('positive'); ?>
    <h2>Editing account</h2>
    <?php echo $this->Html->link('<p class="btn btn-default right">Choose a plan</p>',array('controller'=>'Payments','action'=>'plans'),array('escape'=>false));?> 
     <br><br>
    <div class="panel panel-white">
      
      <div class="panel-body">
        <br><?php //pr($user);?>
        <?php echo $this->Form->create('User',array('controller'=>'users','action'=>'account_profile','class'=>'validator-form','id'=>"wizardForm"));?>
        <div class="row">                 
          <div class="col-xs-6 col-sm-6">
            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <?php echo $this->Form->input('User.admin_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Name','label'=>'Name','required'=>'required')); ?>
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
                <?php echo $this->Form->input('User.business_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Business Name','label'=>'Business Name','required'=>'required')); ?>
              </div>
              </div>
            </div>

            <div class="row">  
              <div class="col-xs-12 col-sm-12"> 
              <div class="form-group"> 
                <?php echo $this->Form->input('User.address', array('div'=>false,'class'=>'form-control','placeholder'=>'Address','label'=>'Street','required'=>'required')); ?>
              </div>
              </div>
            </div>
            <div class="row">   
              <div class="col-xs-12 col-sm-12">
              <div class="form-group"> 
                <?php echo $this->Form->input('User.city', array('div'=>false,'class'=>'form-control','placeholder'=>'City','label'=>'City','required'=>'required')); ?>
              </div>
              </div>
            </div>
            <div class="row"> 
              <div class="col-xs-12 col-sm-12">  
              <div class="form-group"> 
                <?php echo $this->Form->input('User.zip', array('div'=>false,'class'=>'form-control','placeholder'=>'Zip','label'=>'Zip','required'=>'required')); ?>
              </div>
              </div>
            </div>
            <div class="row">   
              <div class="col-xs-12 col-sm-12">
              <div class="form-group"> 
                <?php echo $this->Form->input('User.state_country', array('div'=>false,'class'=>'form-control','placeholder'=>'State/Country','label'=>'State/Country','required'=>'required')); ?>
              </div>
              </div>
            </div>
            <div class="row">   
              <div class="col-xs-12 col-sm-12">
              <div class="form-group"> 
                <?php echo $this->Form->input('User.phone_number', array('div'=>false,'class'=>'form-control','placeholder'=>'Phone','label'=>'Phone','required'=>'required')); ?>
              </div>
              </div>
            </div>
            <div class="row">   
              <div class="col-xs-12 col-sm-12">
              <div class="form-group"> 
                <?php echo $this->Form->input('User.business_website', array('div'=>false,'class'=>'form-control','placeholder'=>'Website','label'=>'Website','required'=>'required')); ?>
              </div>
              </div>
            </div>
            <div class="row">   
              <div class="col-xs-12 col-sm-12">
              <div class="form-group"> 
                <?php echo $this->Form->input('User.domain_name', array('div'=>false,'class'=>'form-control','placeholder'=>'Subdomain','label'=>'Subdomain','required'=>'required')); ?>
              </div>
              </div>
            </div><br>
            <div class="row">                 
              <div class="col-xs-6 col-sm-12">
                <div class="form-group"> 
                <?php echo $this->form->Submit("Update Account",array('class'=>'btn btn-success pull-left')); ?>
                </div>
              </div>
            </div><br>
          </div>
          <div class="col-xs-6 col-sm-6">
          <?php //pr($user);?>
            <div class="pull-right" style="float:right;margin-right: 100px;">
              <?php  if($user['User']['profile_pic']!=''){
                $pic = $user['User']['profile_pic'];
                ?>
              <div class="row">
              Current Picture<br>
              <img src="<?php echo $this->webroot.'img/user_image/'.$pic?>" width="100" height="100" alt="">
              <br>
              </div>
              <?php }
              ?>
              <br>
              <div class="row">
                <?php echo $this->Html->link('Add New Profile <br> Picture',array('controller'=>'users','action'=>'profile_pic'),array('escape'=>false));?> 
              </div>
            </div>
            <div class="right" style="float:right;margin-right: 40px;">
              <?php  if($user['User']['logo']!=''){
                $logo = $user['User']['logo'];
                ?>
              <div class="row">
              Current Logo<br>
              <img src="<?php echo $this->webroot.'img/logo/'.$logo?>" width="100" height="100" alt="">
              <br>
              </div>
              <?php }
              ?>
              <br>
              <div class="row">
                <?php echo $this->Html->link('Add New Logo',array('controller'=>'users','action'=>'logo'),array('escape'=>false));?> 
              </div>
            </div>
          </div>
      </div>
      <?php echo $this->Form->end(); ?>
      
    </div>
  </div>
</div>

