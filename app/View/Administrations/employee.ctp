
<style type="text/css">
  .status {
    display: inline-block;
    float: left;
    margin: 0px 10px 0px 0px !important;
}
</style>
<style type="text/css">
.bootstrap-tagsinput {
    width: 100%;
    min-height: 50px;
    height: 100%;
}
</style>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
  <?php echo $this->element('frontenduser/sidebar1'); ?>
  <div class="col-xs-9">
  <?php echo $this->Flash->render('positive');?>
    <div class="panel panel-white">
      
      <div class="panel-body">
        <div class="row">  
          <div class="col-md-9" style="margin-top: -20px;">
              <b><h2><i class="fa fa-gear"></i>    Employee Settings</h2></b>
          </div>
          <div class="col-md-3">
              <?php echo $this->Html->link('<p class="btn btn-default right">Back to Admin</p>',array('controller'=>'Administrations','action'=>'index'),array('escape'=>false));?> 
          </div>
        </div><br>
        

        <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'employee','id'=>"wizardForm")); ?>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <div class="col-xs-6 col-sm-6" style="margin-top: 15px;">
              <div class="form-group">
                <label>List of Allowed IPs for Technicians to use the site</label>
                <?php echo $this->Form->input('User.allow_ip', array('class'=>'form-control rohit','data-role'=>"tagsinput",'label'=>false,'style'=>"min-height: 50px; height:100%;",'id'=>'IPs')); ?>
                
              </div>
              
              <div class="form-group">
                <label class="string optional" for="settings_timeout_in_minutes">Timeout users after inactive minutes</label>
                <?php echo $this->Form->input('User.timeout_in_minute', array('class'=>'form-control ','label'=>false,'placeholder'=>"45")); ?>
              </div>

              <div class="form-group">
                <?php echo $this->Form->input('User.login_pin', array('type'=>'checkbox', 'format' => array('before', 'input', 'between', 'label', 'after', 'error'), 'label'=>'&nbsp;&nbsp;&nbsp;Disable login pin','style'=> "margin-left:0px;")); ?>
              </div>
              <div class="form-group">
              <label class="alert alert-danger col-md-12" id="IpMessage" style="display: none;">
              <?php                
              if(isset($error))
                {
                  foreach ($error as $key => $value) {
                    echo $value.'<br>';

                  }
                }
                ?></label>


              </div>
            </div>
            
            <div class="col-xs-6 col-sm-6">
            </div>
            
          </div>
          
        </div>
      </div>
      <div class="row">                 
        <div class="col-xs-12 col-sm-12">
          <div class="col-xs-6 col-sm-6">
          </div>
          <div class="col-xs-2 col-sm-2">
              <button type="submit" class="btn btn-success submit pull-right">Save</button><br>
          </div>
          <div class="col-xs-4 col-sm-4">
          </div>
        </div>
      </div><br>
      <?php echo $this->Form->end(); ?>
      <div class="panel-footer">
        <div class="row">
          <div class="col-md-11">
            <?php echo $this->Html->link('Previous',array('controller'=>'Administrations','action'=>'leads'),array('escape'=>false));?>
          </div>
          <div class="col-md-1">
            <?php echo $this->Html->link('Next',array('controller'=>'Administrations','action'=>'general'),array('escape'=>false));?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo $this->webroot.'js/front/jquery.validate.min.js';?>"></script>
<script>

  
    
   $(document).ready(function(){
    
    <?php if(isset($error))
                {
                  ?>$("#IpMessage").show();
                  <?php
                }else
                {
                  ?>$("#IpMessage").hide();
                  <?php
                }
                ?>
  });
  </script>
