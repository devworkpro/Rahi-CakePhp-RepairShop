<title>Repair shoppe | Register</title>
<?php echo $this->element('latestfrontend/login-head'); ?>
<main class="page-content">
  <?php echo $this->Flash->render('positive'); ?> 
  <div class="page-inner">
    <div id="main-wrapper" >
      <div class="row">
        <div class="col-md-4 center" style="margin-top: 90px !important;"> 
        <div class="login-box">
          <a href="http://112.196.42.180/projects/repairshopsaas/repairshopsaas/" class="logo-name text-lg text-center">Repair Shoppe</a>
          <h3 class="text-center m-t-md"><span>Complete </span>Your Registration</h3>

          <?php echo $this->Form->create('User', array('action' => 'complete_register' , 'id'=>"wizardForm")); ?>

            <?php echo $this->Form->hidden('User.email',array('class'=>'form-control status','value'=>$_GET['email'],'label'=>false,'div'=>false)); ?> 
            <?php echo $this->Form->hidden('User.password',array('class'=>'form-control status','value'=>$_GET['password'],'label'=>false,'div'=>false)); ?>
            <?php echo $this->Form->hidden('User.status',array('class'=>'form-control status','value'=>1,'label'=>false,'div'=>false)); ?>   
            <?php echo $this->Form->hidden('User.role',array('class'=>'form-control status','value'=>'user','label'=>false,'div'=>false)); ?> 

          <div class="form-group">
            <?php echo $this->Form->input('User.admin_name', array('div' => false, 'class' => "form-control name ic", 'placeholder' => 'Admin Full Name', 'label' => false)); ?>
          </div>
          <div class="form-group">
            <?php echo $this->Form->input('User.business_name', array('div' => false, 'class' => "form-control name ic", 'placeholder' => 'Business Name', 'label' => false)); ?>
          </div>
          <div class="form-group">
            <?php echo $this->Form->input('User.business_email', array('div' => false, 'class' => "form-control name ic", 'placeholder' => 'Business Email', 'label' => false)); ?>
          </div>
          <div class="form-group">
  
            <div class="input-group">
              <div class="input-group-addon">http://</div>
              <?php echo $this->Form->input('User.domain_name', array('div' => false, 'class' => "form-control name ic",'id'=>'domain', 'placeholder' => 'Subdomain', 'label' => false,"data-validation"=>"length alphanumeric", "data-validation-length"=>"min3","data-validation-error-msg"=>"Domain name has to be an alphanumeric value (min 3 chars)")); ?>
             
              <div class="input-group-addon">.whizna.com</div>

            </div>
             <span class="domain_error" style="display: none;"></span>
          </div>
          <br>
          
          <div class="form-group">
            <button class="btn btn-success btn-block" id="submit_btn">Next</button>
          </div>
          <div class="form-group clearfix login_text">
            <p class="pull-right">Already have an account? <?php echo $this->Html->link('Login',array('action'=>'portal'),array('escape'=>false));?>
            </p>
          </div>
          <p class="text-center m-t-xs text-sm"> 2017 &copy;  Repair Shoppe.</p>
        <?php echo $this->Form->end(); ?> 
      </div><!-- signup_main_form -->
    </div><!-- signup_main_right -->
  </div><!-- signup_main -->
  </div>
  </div>
  </main>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script>
  jQuery(function ($) {
    $('#wizardForm').validate({
      rules: {
            'data[User][admin_name]': {
                required: true,
                minlength: 2,
                maxlength: 20
            },
            'data[User][business_name]': {
                required: true,
                minlength: 2,
                maxlength: 20
            },
            'data[User][business_email]': {
                required: true,
                email : true
            },
            'data[User][domain_name]': {
                required: true,
                minlength: 3,
                maxlength: 12
            }
            
        },
        messages: {
            'data[User][admin_name]': {
                required: "Please enter admin name",
                minlength: "Admin name should be more than 2 characters",
                maxlength: "Admin Name should be less than 20 characters"
            },
            'data[User][business_name]': {
                required: "Please enter your business name",
                minlength: "Business name should be more than 2 characters",
                maxlength: "Business name should be less than 20 characters",
            },
            'data[User][business_email]': {
                required: "Please enter your business email",
                email: "Please enter a valid email address"
            },
            'data[User][domain_name]': {
                required: "Please enter domain name",
                minlength: "Domain name should be more than 3 characters",
                maxlength: "Domain name should be less than 12 characters",
            }
            
        },
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {

  $('#domain').keyup(function() {
   
    var domain =$(this).val();
    if (domain.length > 2 && domain!='') {
      $('.domain_error').hide();
          $.ajax({
          type: "POST",
          url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/users/chackDomain/",

        // url: "search.php",
          data: { domain:domain },
      
          success: function(data)
          {
            if(data=="invalid")
            {
                $('#domain').attr('style','border:1px solid #a94442 !important');
                $('.domain_error').html("has already been taken");
                $('.domain_error').show();
                $("#submit_btn").attr('disabled','disabled');
            }
            if(data=="success")
            {
                $('#domain').attr('style','border:1px solid #1db198 !important');
                $("#submit_btn").removeAttr('disabled');
               //'searchtestr.php?key=' + data
            }
            //$("#save_phone_btn").text("Done");
            //window.location.reload();
           
          }
      });


    }
    else
    {
      $('#domain').attr('style','border:1px solid #a94442 !important');
      $('.domain_error').html("Domain name has to be an alphanumeric value (3-12 chars)");
      $('.domain_error').show();
      $("#submit_btn").attr('disabled','disabled');
    }

  })

});
</script>
<?php echo $this->element('latestfrontend/login-footer'); ?>
