<section>
  <div class="signup_main">
    <div class="signup_main_right">
      <div class="signup_main_form">  
        <h2 class="pull-left">Social Media and Branding</h2>
        
        <?php echo $this->Form->create('User',array('action' => 'social_media' , 'id'=>"wizardForm" , 'class'=>'form-inline','enctype' => 'multipart/form-data')); ?>
        <div class="form-group url optional marketr_settings_social_facebook_url">
          <div class="controls">
          <div class="input-group">
              <label class="url optional input-group-addon" for="marketr_settings_social_facebook_url">Facebook Page</label>
                <?php echo $this->Form->input('User.facebook_url', array("data-validation"=>"url",'div' => false, 'class' => "string url required form-control  ic", 'placeholder' => 'http://facebook.com/YourShop', 'label' => false, 'id'=>'marketr_settings_social_facebook_url' , 'style'=>"width: 200px")); ?>
          </div>
          </div>
        </div>
        <div class="form-group url optional marketr_settings_social_google_url">
        <div class="controls">
          <div class="input-group">
            <label class="url optional input-group-addon" for="marketr_settings_social_google_url">Google Plus URL</label>
                <?php echo $this->Form->input('User.googleplus_url', array("data-validation"=>"url",'div' => false, 'class' => "string url required form-control  ic", 'placeholder' => 'https://plus.google.com/113346743898241834994/', 'label' => false, 'id'=>'marketr_settings_social_google_url' , 'style'=>"width: 200px")); ?>
          </div>
        </div>
        </div>
        <div class="form-group string optional marketr_settings_social_twitter_username">
        <div class="controls">
          <div class="input-group">
              <label class="string optional input-group-addon" for="marketr_settings_social_twitter_username">Twitter Username</label>
                <?php echo $this->Form->input('User.twitter_username', array('type'=>'text','div' => false, 'class' => "string required form-control ic", 'placeholder' => 'bigtweeter', 'label' => false, 'id'=>'marketr_settings_social_twitter_username' , 'style'=>"width: 200px")); ?>
          </div>
        </div>
        </div>

        <br><br>
        <h2 class="pull-left">Add your Logo</h2>
        <div class="fileUpload filepicker btn btn-lg btn-success big-button ">
          <span class="">Upload Logo</span>
          <!-- <input type="file" class="upload" /> -->
          <?php echo $this->Form->input('User.file', array('type'=>'file' ,'div' => false,'label' => false, 'class' => "upload ic",'accept'=>"image/*")); ?>
          
        </div>
        <br>
        
        <span class="pull-right">
            <div class="form-group">
            <?php echo $this->Html->link('SKIP',array('controller'=>'users','action'=>'business_setting'),array('escape'=>false,'class'=>'vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey'));?>

            <button class="vc_btn3-style-modern vc_general vc_btn3 vc_btn3-size-md ">NEXT</button>
            </div>
        </span>
        <br><br><br>
        <?php echo $this->Form->end(); ?> 
         
      </div><!-- signup_main_form -->
      
    </div><!-- signup_main_right -->
  </div><!-- signup_main -->
</section>
<style type="text/css">
  
  .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.fileUpload.filepicker.btn.btn-lg.btn-success.big-button {
    background-color: #fff;
    border: 1px solid #8ec549;
    color: #8ec549;
    font-size: 17px;
    font-weight: 600;
    margin-top: 0px;
    text-transform: uppercase!important;
}
.fileUpload.filepicker.btn.btn-lg.btn-success.big-button:hover {
     color:#fff;
    background-color: rgba(142, 197, 73, 1);

}

</style>

<script>
  $.validate({
    
  });
</script>