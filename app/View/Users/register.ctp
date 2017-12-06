  <title>Repair Shoppe Login-Signup</title>
  <?php echo $this->element('latestfrontend/login-head'); ?>
  <main class="page-content">
  <?php echo $this->Flash->render('positive'); ?> 
    <div class="page-inner">
      <div id="main-wrapper" >
        <div class="row">
          <div class="col-md-3 center" style="margin-top: 90px !important;">
            <div class="login-box"> 
              <a href="http://112.196.42.180/projects/repairshopsaas/repairshopsaas/" class="logo-name text-lg text-center">Repair Shoppe</a>
              <p class="text-center m-t-md">Create a Shoppe's Account</p>
        
              <div class="form-group">
                <?php echo $this->Form->hidden('User.status',array('class'=>'form-control status','value'=>1,'label'=>false,'div'=>false)); ?>   
                <?php echo $this->Form->hidden('User.role',array('class'=>'form-control status','value'=>'admin','label'=>false,'div'=>false)); ?>
                <?php echo $this->Form->input('User.em',array("type"=>'hidden','class'=>'form-control','value'=>'','label'=>false,'id'=>'em')); ?> 
                <?php echo $this->Form->input('User.pass',array("type"=>'hidden','class'=>'form-control','value'=>'','label'=>false,'id'=>'pass'));?>  
              </div>
              
              <div class="form-group has-feedback">
                <?php echo $this->Form->input('User.email', array('div' => false, 'class' => "form-control email ic",'id'=>'email', 'placeholder' => 'Email', 'label' => false,'required'=>'required')); ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span class="email_error" style="display: none;">can't be blank</span>
              </div>
              <div class="form-group mb10 has-feedback">
                <?php echo $this->Form->input('User.password', array('div' => false, 'class' => "form-control pwd ic",'id'=>'password', 'placeholder' => 'Password', 'label' => false ,'required'=>'required')); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="password_error" style="display: none;">can't be blank</span>
              </div>
              <div class="form-group">
                <button class="btn-block m-t-xs vc_btn3-style-modern vc_general vc_btn3 vc_btn3-size-md btn btn-success" id="submit_btn" >Get me started!</button>
              </div> 
              <p class="text-center m-t-xs text-sm">Already have an account?</p>
              <a href="login" class="btn btn-default btn-block m-t-xs">Login</a>
               <p class="text-center m-t-xs text-sm"> 2017 &copy;  Repair Shoppe.</p>
            </div>
          </div>
        </div><!-- Row -->
      </div><!-- Main Wrapper -->
    </div><!-- Page Inner -->
  </main><!-- Page Content -->
      
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(e) {



  $('#email').keyup(function() {
   
    $('.email_error').html(validateEmail($('#email').val()));

  })

  $('#password').keyup(function() {
   
    $('.password_error').html(validatePassword($('#password').val()));

  })


  $('#submit_btn').click(function(e) {

   var email = document.getElementById("email").value;
   var password = document.getElementById("password").value;
    //alert(email);alert(password);
    // Checking Empty Fields
    if ($.trim(email).length == 0 || $(password)=="") {
       $('#email').attr('style','border:2px solid #a94442 !important');
       $('#password').attr('style','border:2px solid #a94442 !important');
       $('.email_error').html("can't be blank");
       $('.email_error').show();
       $('.password_error').html("can't be blank");
       $('.password_error').show();
        e.preventDefault();
    }
    if (!validateEmail(email)) {
        document.getElementById("email").style.borderColor = "#1db198 !important";
        //alert("valid")
        //$('#em').val("yes");
    }
    else {
        $('#email').attr('style','border:2px solid #a94442 !important');
        $('.email_error').html("is invalid");
        $('.email_error').show();
       // $('#em').val("yes");
        e.preventDefault();
    }

    if (!validatePassword(password)) {
        document.getElementById("password").style.borderColor = "#1db198 !important";
        $('.email_password').hide();
        //$('#pass').val("yes");
    }
    else {
        $('#password').attr('style','border:2px solid #a94442 !important');
        $('.email_password').html("is invalid");
        $('.email_password').show();
        e.preventDefault();
    }


    var em = document.getElementById("em").value;
    var pass = document.getElementById("pass").value;
    //  alert(em);alert(pass);
    if(em=="yes" && pass=="yes")
    {
      $.ajax({
          type: "POST",
          url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/users/register/",

        // url: "search.php",
          data: { email:email, password:password },
      
          success: function(data)
          {
            if(data=="invalid")
            {
                $('#email').attr('style','border:2px solid #a94442 !important');
                $('.email_error').html("has already been taken");
                $('.email_error').show();
                
            }
            if(data=="success")
            {
                window.location.href = "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/users/complete_register?email=" + email+"&password="+password;
               //'searchtestr.php?key=' + data
            }
            //$("#save_phone_btn").text("Done");
            //window.location.reload();
           
          }
      });
    }

  });
  function validateEmail(Email) {
    var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (filter.test(Email)) {
        $('#email').attr('style','border:2px solid #1db198 !important');
        $('.email_error').hide();
        $('#em').val("yes"); 
    }
    else {
      $('#email').attr('style','border:2px solid #a94442 !important');
      $('.email_error').show();
      $('#em').val("no"); 
      return 'is invalid';
      
    }
  }
 
  function validatePassword(password) {
    if (password.length > 6) {
      $('#password').attr('style','border:2px solid #1db198 !important');
      $(".password_error").hide();   
      $('#pass').val("yes");    
    }
    else
    {
      $('#password').attr('style','border:2px solid #a94442 !important');
      $('.password_error').show();
      $('#pass').val("no");
      return 'is too short (minimum is 6 characters)';

    }
  }



  

});
</script>
<?php echo $this->element('latestfrontend/login-footer'); ?>