<section>
  <div class="signup_main">
    <div class="signup_main_right">
      <div class="signup_main_form">  
        <h2 class="pull-left"><span>Enter your </span>Company Info </h2>
          <?php echo $this->Form->create('User', array('action' => 'company_info' , 'id'=>"wizardForm")); ?>

          <div class="form-group">
            <?php echo $this->Form->input('User.address', array('div' => false, 'class' => "form-control  ic", 'placeholder' => 'Street Address', 'label' => false)); ?>
          </div>
          <div class="form-group">

            <?php echo $this->Form->input('User.city', array('div' => false, 'class' => "form-control  ic", 'placeholder' => 'City*', 'label' => false ,
                 "data-validation"=>"required","data-validation-error-msg"=>"City is required")); ?>
          </div>
          <div class="form-group">
            
            <?php echo $this->Form->input('User.state_country', array('div' => false, 'class' => "form-control  ic", 'placeholder' => 'State/Country*', 'label' => false ,"data-validation"=>"required","data-validation-error-msg"=>"Country is required")); ?>
          </div>
          <div class="form-group">
            <?php echo $this->Form->input('User.zip', array('type'=>'text','div' => false, 'class' => "form-control  ic", 'placeholder' => 'Zip/Postal Code*', 'label' => false, "data-validation"=>"required","data-validation-error-msg"=>"Zip is required")); ?>
          </div>
          <div class="form-group">
            
            <?php echo $this->Form->input('User.phone_number', array('div' => false, 'class' => "form-control  ic", 'placeholder' => 'Business phone*', 'label' => false , "data-validation"=>"required","data-validation-error-msg"=>"Business phone is required")); ?>
          </div>
          <div class="form-group">
            
            <?php echo $this->Form->input('User.business_website', array('div' => false, 'class' => "form-control  ic", 'placeholder' => 'Business website', 'label' => false)); ?>
          </div>
          
        
          <div class="form-group">
            <button type="submit" class="vc_btn3-style-modern vc_general vc_btn3 vc_btn3-size-md pull-right">Next</button>
          </div><br><br>
          
        <?php echo $this->Form->end(); ?> 
      </div><!-- signup_main_form -->
    </div><!-- signup_main_right -->
  </div><!-- signup_main -->
</section>
      
<script>
  $.validate({
   
   
  });
</script>