<title>Repair shoppe | Company Information</title>
<?php echo $this->element('latestfrontend/login-head'); ?>
<main class="page-content">
  <?php echo $this->Flash->render('positive'); ?> 
  <div class="page-inner">
    <div id="main-wrapper" >
      <div class="row">
        <div class="col-md-4 center" style="margin-top: 90px !important;"> 
        <div class="login-box">
          <a href="http://112.196.42.180/projects/repairshopsaas/repairshopsaas/" class="logo-name text-lg text-center">Repair Shoppe</a>
          <h3 class="text-center m-t-md"><span>Enter your </span>Company Info </h3>
          <?php echo $this->Form->create('User', array('action' => 'company_info' , 'id'=>"wizardForm")); ?>

          <div class="form-group">
            <?php echo $this->Form->input('User.address', array('div' => false, 'class' => "form-control  ic", 'placeholder' => 'Street Address', 'label' => false)); ?>
          </div>
          <div class="form-group">

            <?php echo $this->Form->input('User.city', array('div' => false, 'class' => "form-control  ic", 'placeholder' => 'City', 'label' => false ,"data-validation"=>"required","data-validation-error-msg"=>"City is required")); ?>
          </div>
          <div class="form-group">
            
            <?php echo $this->Form->input('User.state_country', array('div' => false, 'class' => "form-control  ic", 'placeholder' => 'State/Country', 'label' => false ,"data-validation"=>"required","data-validation-error-msg"=>"Country is required")); ?>
          </div>
          <div class="form-group">
            <?php echo $this->Form->input('User.zip', array('type'=>'text','div' => false, 'class' => "form-control  ic", 'placeholder' => 'Zip/Postal Code', 'label' => false, "data-validation"=>"required","data-validation-error-msg"=>"Zip is required")); ?>
          </div>
          <div class="form-group">
            
            <?php echo $this->Form->input('User.phone_number', array('div' => false, 'class' => "form-control  ic", 'placeholder' => 'Business phone', 'label' => false , "data-validation"=>"required","data-validation-error-msg"=>"Business phone is required")); ?>
          </div>
          <div class="form-group">              
            <?php echo $this->Form->input('User.business_website', array('div' => false, 'class' => "form-control  ic", 'placeholder' => 'Business website', 'label' => false)); ?>
          </div><br>
          
        
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">Next</button>
          </div><br>
          
          <?php echo $this->Form->end(); ?> 
          <p class="text-center m-t-xs text-sm"> 2017 &copy;  Repair Shoppe.</p>
        </div><!-- signup_main_form -->
        </div><!-- signup_main_right -->
      </div><!-- signup_main -->
    </div>
  </div>
</main>
<script src="<?php echo $this->webroot.'Plugins/jQuery/jQuery-2.1.4.min.js';?>"></script>
<?php echo $this->element('latestfrontend/login-footer'); ?>
<script>
  $.validate({
   
   
  });
</script>