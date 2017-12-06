  
  <script src="<?php echo $this->webroot.'Plugins/input-mask/jquery.inputmask.js';?>"></script>
  <script src="<?php echo $this->webroot.'Plugins/input-mask/jquery.inputmask.date.extensions.js';?>"></script>

<?php $user = $user['User']; ?>
<?php

$temp = $this->Session->read();
if($temp['Auth']['User']['role'] != 'user'){
  ?>

<section>

  <div class="container">
    <div class="banner_image">
      <img src="<?php echo $this->webroot . 'img/user_image/userbanners/'.$user['banner_image']; ?>" alt="banner image" />
    </div><!--banner_image-->
    
    <div class="trainer_sec">
      <div class="col-xs-12 col-sm-12 col-md-9">
        <div class="left_side_bar">
          <div class="triner_info">
            <div class="profile_image">
              <img src="<?php echo $this->webroot . 'img/user_image/small/'.$user['profile_pic']; ?>" alt="profile image" />
            </div><!-- profile_image -->
            <div class="trainer_info_right">
              <div class="user_name">
                <span><?php echo $user['first_name'].' '.$user['surname']; ?></span>
              </div>
              <div class="user_tag">
                <span>(Health Trainer)</span>
              </div>
              <div class="user_address">
                <span><?php echo $user['address']; ?></span>
              </div>
              <div class="button user_profile_edit_btn">

   <?php echo $this->Html->link('Back to Profile', array('controller' => 'users', 'action' => 'profile', 'user'=>true), array('class' => 'btn btn-primary edit_btn')); ?> 
     

         <?php $this->Html->link('Blog', array('controller' => 'blogs', 'action' => 'index')); ?>       
                <button class="btn btn-primary">blog</button>
              </div>
              <div class="triner_box_part">
                <a href="javascript:void(0)">
                  <span>
                    Events<br/>
                    <?php  echo $eventCount; ?>
                  </span>
                </a>
                <a href="javascript:void(0)">
                  <span>
                    Friends<br/>
                    15
                  </span>
                </a>
                <a class="blue" href="javascript:void(0)">
                  <span>
                    <img src="<?php echo $this->webroot?>images/send_msg_icon.png" alt="message icon" /><br/>
                    Email
                  </span>
                </a>
                <a class="blue" href="javascript:void(0)">
                  <span>
                    <img src="<?php echo $this->webroot?>images/notification_icon.png" alt="message icon" /><br/>
                    Notification
                  </span>
                </a>
                <div class="clearfix"></div>
              </div><!-- triner_box_part  -->
              <div class="trainer_des">
                <span>Lorem ipsum dolor sit amet, eos at labores accusam torquatos, te odio vocibus</span> 
                <span class="toggle_image"><a href="javascript:viod(0)"><img src="<?php echo $this->webroot?>images/toggle_icon.png" alt="toggle image" /></a></span>
              </div>
            </div><!-- trainer_info_right -->
          </div><!-- triner_info -->  
          
         <div class="event_calender">
          

<div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('User', array('method' => 'post','action'=>'editprofile')); ?>
                  <div class="box-body">  
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php echo $this->Form->input('User.first_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Enter Your First Name')); ?>
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php echo $this->Form->input('User.middle_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Enter Your Middle Name')); ?>
                    </div>
                    </div>
                  </div>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php echo $this->Form->input('User.surname', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Enter Your Surname')); ?>
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php echo $this->Form->input('User.username', array('div'=>false,'class'=>'form-control', 'autocomplete' => 'off', 'placeholder' => 'Username')); ?>
                    </div>
                    </div>
                  </div>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                    <?php echo $this->Form->input('User.dob', array('div'=>false,'class'=>'form-control dob','data-mask'=>"",'data-inputmask'=>'alias:dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy')); ?>
                  </div>
                  </div>
                   <!--div class="form-group">
                    <?php //echo $this->Form->input('User.created', array('type'=>'text','div'=>false,'class'=>'form-control create','data-mask'=>"",'data-inputmask'=>'alias:dd/mm/yyyy')); ?>
                  </div-->
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                    <?php echo $this->Form->input('User.G+', array('div'=>false,'class'=>'form-control','placeholder'=>'Enter Your Google+')); ?>                       
                    </div>
                    </div>
                  </div>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                   <div class="form-group">
                    <?php echo $this->Form->input('User.fb', array('div'=>false,'class'=>'form-control','placeholder'=>'Enter Your Facebook Address')); ?>                       
                    </div>
                    </div>  
                    <div class="col-xs-12 col-sm-6">
                   <div class="form-group">
                    <?php echo $this->Form->input('User.twitter', array('div'=>false,'class'=>'form-control','placeholder'=>'Enter Your Twitter')); ?>                       
                    </div>
                    </div>
                  </div>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                     <div class="form-group">
                    <?php echo $this->Form->input('User.email', array('div'=>false,'class'=>'form-control','placeholder'=>'Enter Your Email','autocomplete' => 'off')); ?>                       
                    </div>
                    </div>  
                    <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
                     <?php echo $this->Form->input('User.role', array('options' => array('user' => 'User', 'professional' => 'Professional Trainer'),'class'=>'form-control')); ?>
                    </div>
                    </div>
                  </div>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                     <div class="form-group">
                    <?php echo $this->Form->input('User.expiration_date', array('div'=>false,'class'=>'form-control expdate','data-mask'=>"",'data-inputmask'=>'alias:dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy')); ?></div>
                    </div> 
                    <div class="col-xs-12 col-sm-6">

                    <div class="form-group">
                    <?php echo $this->Form->input('User.status', array('options' => array('1' => 'Enable', '0' =>'Disable'),'class'=>'form-control')); ?>
                   </div>

                   </div>
                   </div>

                  <div class="row">                 
                    <div class="col-xs-12">
                    
                    <div class="form-group">
                   <?php echo $this->Form->input('User.address', array('type'=> 'textarea','div'=>false,'class'=>'form-control', 'placeholder' => 'Enter Your Address')); ?>
                   </div>
                   
                   </div>

                   </div>
                  </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                  <?php echo $this->form->Submit("Submit",array('class'=>'btn btn-primary')); ?>                
                  </div>
               <?php echo $this->Form->end(); ?>
              </div><!-- /.box -->
        </div>




         </div>
          <!-- COMMENT SECTION -->
          <div class="comment">
            <strong>Comments: </strong>
            <div class="cmnt_list">
            <p class="blog5_img"><strong>30. Mike</strong>Lorem Ipsum is simply dummy text </p>
            <p class="blog6_img"><strong>27. John</strong>Lorem Ipsum is simply dummy text</p>
            <p class="blog7_img"><strong>01. Anon</strong>Lorem Ipsum is simply dummy text </p>
            </div>
            <strong>Your Comments: </strong>
            <textarea rows="7" class="form-control" placeholder="Write your Comment here..."></textarea>
            
            <div class="blg_btn">
            <!--<a href="#" class="btn_lft">Return To Blog Page</a><a href="#" class="btn_ryt">SEND</a>-->
            <button type="button" class="btn btn-primary btn_ryt">POST</button>
            <div class="clearfix"></div>
            </div>
            
            
          </div>
          <!-- COMMENT SECTION ENDS HERE -->
          
        </div><!-- left_side_bar -->
      </div>
      
      <div class="col-xs-12 col-sm-12 col-md-3 pull-right">
        <div class="right_side_bar">
          <div class="frind_list">
            <h3>Social Media</h3>
            <!--    SOCIAL MEDIA ICONS   -->
            <div class="social_links">
              <a href="javascript:void(0)"><i class="icon-facebook"></i></a>
              <a href="javascript:void(0)"><i class="icon-twitter"></i></a>
              <a href="javascript:void(0)"><i class="icon-google-plus"></i></a>
            </div><!--social_links-->
            <div class="clearfix"></div>
          </div>
          
          <div class="frind_list">
            <h3>Friend list</h3>
            <div class="frind_list_img">
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img1.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img2.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img3.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img4.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img5.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img6.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img7.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img8.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img9.png" alt="user image" /></a></span>
            </div>
            <a class="view_all_link" href="javascript:void(0)">View all friends</a>
            <div class="clearfix"></div>
            
            <div class="invite_btn">
            <a class="btn" href="javascript:void(0)">Invite friends</a>
            </div>
          </div><!-- frind_list -->
          
          <div class="frind_list blog_list">
            <h3>Recent Blog Posts</h3>
            <ul>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
              <li><a href="javascript:void(0)">Lorem ipsum dummy text</a></li>
            </ul>
          </div><!-- frind_list -->
          
          
        </div><!-- right_side_bar -->
      </div>
      
    </div><!-- user_profile_sec -->
  </div><!-- container -->
  
  
</section>
<?php
}else{
  ?>
  <section>

  <div class="container">
    <div class="banner_image">
      <img src="<?php echo $this->webroot . 'img/user_image/userbanners/'.$user['banner_image']; ?>" alt="banner image" />
    </div><!--banner_image-->
    
    <div class="user_profile_sec">
      <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="left_side_bar">
          <div class="profile_image">
            <img src="<?php echo $this->webroot . 'img/user_image/small/'.$user['profile_pic']; ?>" alt="profile image" />
          </div><!-- profile_image -->
          <div class="user_name">
            <span><?php echo $user['first_name'].' '.$user['surname']; ?></span>
          </div>
          <div class="user_address">
            <span><?php echo $user['address']; ?></span>
          </div>
          <div class="button user_profile_edit_btn">
            
         <?php echo $this->Html->link('Back to Profile', array('controller' => 'users', 'action' => 'profile', 'user'=>true), array('class' => 'btn btn-primary edit_btn')); ?> 
          </div>
          
          <div class="frind_list">
            <h3>Friend list</h3>
            <div class="frind_list_img">
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img1.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img2.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img3.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img4.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img5.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img6.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img7.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img8.png" alt="user image" /></a></span>
              <span><a href="javascript:void(0)"><img src="<?php echo $this->webroot?>images/frnd_img9.png" alt="user image" /></a></span>
            </div>
            <a class="view_all_link" href="javascript:void(0)">View all friends</a>
            <div class="clearfix"></div>
          </div><!-- frind_list -->
          
          <div class="invite_btn">
            <a class="btn" href="javascript:void(0)">Invite friends</a>
          </div>
          
        </div><!-- left_side_bar -->
      </div>
      
      <div class="col-xs-12 col-sm-12 col-md-9">
        <div class="right_side_bar">
          <div class="triner_box_part user_box_part">
            <a href="javascript:void(0)">
              <span>Events<br/><?php  echo $eventCount; ?></span>
            </a>
            <a href="javascript:void(0)">
              <span>Friends<br/>15</span>
            </a>
            <a class="blue" href="javascript:void(0)">
              <span><img src="<?php echo $this->webroot?>images/send_msg_icon.png" alt="message icon" /><br/>Email</span>
            </a>
            <a class="blue" href="javascript:void(0)">
              <span><img src="<?php echo $this->webroot?>images/notification_icon.png" alt="message icon" /><br/>Notification</span>
            </a>
            <div class="clearfix"></div>
          </div><!-- triner_box_part  -->
          <div class="event_calender" id="k_event_calender">

<div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create('User', array('method' => 'post','action'=>'editprofile')); ?>
                  <div class="box-body">  
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php echo $this->Form->input('User.first_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Enter Your First Name')); ?>
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php echo $this->Form->input('User.middle_name', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Enter Your Middle Name')); ?>
                    </div>
                    </div>
                  </div>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php echo $this->Form->input('User.surname', array('div'=>false,'class'=>'form-control', 'placeholder' => 'Enter Your Surname')); ?>
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php echo $this->Form->input('User.username', array('div'=>false,'class'=>'form-control', 'autocomplete' => 'off', 'placeholder' => 'Username')); ?>
                    </div>
                    </div>
                  </div>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                    <?php echo $this->Form->input('User.dob', array('div'=>false,'class'=>'form-control dob','data-mask'=>"",'data-inputmask'=>'alias:dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy')); ?>
                  </div>
                  </div>
                   <!--div class="form-group">
                    <?php //echo $this->Form->input('User.created', array('type'=>'text','div'=>false,'class'=>'form-control create','data-mask'=>"",'data-inputmask'=>'alias:dd/mm/yyyy')); ?>
                  </div-->
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                    <?php echo $this->Form->input('User.G+', array('div'=>false,'class'=>'form-control','placeholder'=>'Enter Your Google+')); ?>                       
                    </div>
                    </div>
                  </div>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                   <div class="form-group">
                    <?php echo $this->Form->input('User.fb', array('div'=>false,'class'=>'form-control','placeholder'=>'Enter Your Facebook Address')); ?>                       
                    </div>
                    </div>  
                    <div class="col-xs-12 col-sm-6">
                   <div class="form-group">
                    <?php echo $this->Form->input('User.twitter', array('div'=>false,'class'=>'form-control','placeholder'=>'Enter Your Twitter')); ?>                       
                    </div>
                    </div>
                  </div>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                     <div class="form-group">
                    <?php echo $this->Form->input('User.email', array('div'=>false,'class'=>'form-control','placeholder'=>'Enter Your Email','autocomplete' => 'off')); ?>                       
                    </div>
                    </div>  
                    <div class="col-xs-12 col-sm-6">
                  <div class="form-group">
                     <?php echo $this->Form->input('User.role', array('options' => array('user' => 'User', 'professional' => 'Professional Trainer'),'class'=>'form-control')); ?>
                    </div>
                    </div>
                  </div>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-6">
                     <div class="form-group">
                    <?php echo $this->Form->input('User.expiration_date', array('div'=>false,'class'=>'form-control expdate','data-mask'=>"",'data-inputmask'=>'alias:dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy')); ?></div>
                    </div> 
                    <div class="col-xs-12 col-sm-6">

                    <div class="form-group">
                    <?php echo $this->Form->input('User.status', array('options' => array('1' => 'Enable', '0' =>'Disable'),'class'=>'form-control')); ?>
                   </div>

                   </div>
                   </div>

                  <div class="row">                 
                    <div class="col-xs-12">
                    
                    <div class="form-group">
                   <?php echo $this->Form->input('User.address', array('type'=> 'textarea','div'=>false,'class'=>'form-control', 'placeholder' => 'Enter Your Address')); ?>
                   </div>
                   
                   </div>

                   </div>
                  </div>
<div class="box-footer">
                  <?php echo $this->form->Submit("Submit",array('class'=>'btn btn-primary')); ?>                
                  </div>
               <?php echo $this->Form->end(); ?>

                  </div><!-- /.box-body -->

                  
              </div><!-- /.box -->
        </div>
        </div>

          </div><!-- event_calender -->
        </div><!-- right_side_bar -->
      </div>
      
  </div><!-- container -->
  
  
</section>

<?php

}

?>

<script>
      $(function () {
        //Datemask dd/mm/yyyy
    $(".create").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $(".expdate").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $(".dob").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("[data-mask]").inputmask();
    });
    </script>