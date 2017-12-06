<section>
     <div class="signup_main">
    <?php if($data == 0){
      ?>
    <div class="signup_main_right">
      <div class="signup_main_form add_email_form"> 
        <h2 class="pull-left">How would you like to get started?</h2>
        <div class="btn_div">
     
          <button class="vc_btn3-style-modern vc_general vc_btn3 btn_demo btn_request_demo">Request a Demo</button>
          
          <?php echo $this->Html->link('Watch a Demo Now',array('controller'=>'users','action'=>'watchdemo'),array('escape'=>false,'class'=>'vc_btn3-style-modern vc_general vc_btn3 btn_demo btn_watch_demo','target'=>'_blank'));?>

          <button class="vc_btn3-style-modern vc_general vc_btn3 btn_demo btn_dive"  onClick="javascipt:window.location.href='<?php echo $this->Html->url('/admin/') ?>'">Dive in and Explore</button>
               
        </div>
      </div><!-- signup_main_form -->
        

        <div class="demo_form" style="display: none;">
        <h2>Request a Demo</h2> 
        <?php echo $this->Form->create('users',array('controller'=>'Users','action'=>'getstarted')); ?> 


        <div class="row">                 
        <div class="col-xs-12 col-sm-12">
        <div class="form-group">
            <?php echo $this->Form->input('DemoRequest.full_name', array('class'=>'form-control','placeholder' => "Full Name",'label'=>'Full Name', 'value'=>$admin_name)); ?>
            
        </div>
        </div>
        </div>
        <div class="row">                 
        <div class="col-xs-12 col-sm-12">
        <div class="form-group">
            <?php echo $this->Form->input('DemoRequest.business_name', array('div'=>false,'class'=>'form-control','placeholder' => "Business Name",'label'=>' Business Name','value'=>$business_name)); ?>
        </div>
        </div>
        </div>
        <div class="row">                 
        <div class="col-xs-12 col-sm-12">
        <div class="form-group">
            <?php echo $this->Form->input('DemoRequest.business_website', array('class'=>'form-control','label'=>'Business Website','value'=>$business_website)); ?>
        </div>
        </div>
        </div>
        <div class="row">                 
        <div class="col-xs-12 col-sm-12">
        <div class="form-group">
            <?php echo $this->Form->input('DemoRequest.contact_number', array('class'=>'form-control','label'=>'Contact Number','value'=>$phone_number)); ?>
        </div>
        </div>  
        </div>
        <div class="row">                 
        <div class="col-xs-12 col-sm-12">
        <div class="form-group">
            <?php echo $this->Form->input('DemoRequest.contact_email', array('class'=>'form-control','label'=>'Contact Email Address','value'=>$email)); ?>
        </div>
        </div>
        </div>
            
        
        <div class="row">  
          <div class="col-xs-6 col-sm-6">
            <div class="form-group">
            
            <?php echo $this->Form->input('DemoRequest.locations', array('options' => array(' ' =>' ',"1"=>"1","2-5"=>"2-5","6-10"=>"6-10","10-50"=>"110-50","50-100"=>"50-100","100+"=>'100+'),'class'=>'form-control','label'=>'Locations')); ?>
            
            
            </div>
          </div>
          <div class="col-xs-6 col-sm-6">
            <div class="form-group">
            
            <?php echo $this->Form->input('DemoRequest.employees', array('options' => array(' ' =>' ',"1"=>"1","2-5"=>"2-5","6-10"=>"6-10","10-50"=>"110-50","50-100"=>"50-100","100+"=>'100+'),'class'=>'form-control','label'=>'Number of Employees')); ?>
            
            
            </div>
          </div>
        </div>

        <div class="row">  
          <div class="col-xs-6 col-sm-6">
            <div class="form-group">
            
            <?php echo $this->Form->input('DemoRequest.number_of_year', array('options' => array(' ' =>' ',"Brand New"=>"Brand New","Less then 1"=>"less then 1","1-3"=>"1-3","3-10"=>"3-10","10+"=>"10+"),'class'=>'form-control','label'=>'Number of Employees')); ?>

            
            
            </div>
          </div>
          <div class="col-xs-6 col-sm-6">
            <div class="form-group">
           
            
            </div>
          </div>
        </div>
        

        <div class="row">  
        <hr class="dotted"> 
          <div class="col-xs-12 col-sm-4">
            <div class="form-group">
            
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="form-group">
              
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
          
          <div class="btn-group">
            <?php echo $this->Form->button("Next", array('class' => 'btn btn-success pull-left')); ?>
          </div>
          </div>
        </div>

                            
        <?php echo $this->Form->end(); ?>
        </div>
         

        <div class="Watch_form" style="display: none;">
          <div class="row">
          <div class="col-md-12">
            <h2>Watch a Demo now</h2>
            <p>We opened this link in a new tab: (here again in case you need it) 
            <?php echo $this->Html->link('Click here to open our recorded demo',array('controller'=>'users','action'=>'watchdemo'),array('escape'=>false,'target'=>'_blank'));?></p>
            <p>Click Next when ready to continue on...</p>
            <button class="btn btn-success pull-right"  onClick="javascipt:window.location.href='<?php echo $this->Html->url('/admin/') ?>'">Next</button>
          </div>
          </div>
        </div>

      
    </div><!-- signup_main_right -->
    <?php } 
    else
    {?>
    <div class="signup_main_right">
    <div class="got_it">
        <div class="row">
        <div class="col-md-12">
          <div style="" class="bhv-requestDemoForm">

          <h2>Got it!</h2>

          <p>
            Click Next when ready to continue on...
          </p>

            <button class="btn btn-success pull-right"  onClick="javascipt:window.location.href='<?php echo $this->Html->url('/admin/') ?>'">Next</button>
          
          </div>
        </div>
        </div>


    </div>
    </div>
     <?php }?>
  </div><!-- signup_main -->
</section>
<script type="text/javascript">
  
  $(document).ready(function() {
  
  $(".btn_request_demo").click(function(){
      
    $(".demo_form").show();
    $(".signup_main_form").hide();
  });


  $(".btn_watch_demo").click(function(){
      
    $(".Watch_form").show();
    $(".signup_main_form").hide();
  });



  });
</script>
<style type="text/css">
  .vc_btn3-style-modern.vc_general.vc_btn3.btn_demo.btn_watch_demo {
    background-color: #8ec549 !important;
    border-radius: 5px;
    color: white;
    padding:  33px 0px 0px 0px;
}
</style>