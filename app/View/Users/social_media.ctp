<title>Repair shoppe | Social Media</title>
<?php echo $this->element('latestfrontend/login-head'); ?>
<main class="page-content">
  <?php echo $this->Flash->render('positive'); ?> 
  <div class="page-inner">
    <div id="main-wrapper" >
      <div class="row">
        <div class="col-md-4 center" style="margin-top: 90px !important;"> 
        <div class="login-box">
          <a href="http://112.196.42.180/projects/repairshopsaas/repairshopsaas/" class="logo-name text-lg text-center">Repair Shoppe</a> 
          <h3 class="text-center m-t-md">Social Media and Branding</h3>
        
            <?php echo $this->Form->create('User',array('action' => 'social_media' , 'id'=>"wizardForm" , 'class'=>'form-inline','enctype' => 'multipart/form-data')); ?>
            <div class="form-group url optional marketr_settings_social_facebook_url col-md-12">
              <div class="controls">
              <div class="input-group" style="width: 100%">
                  <label class="url optional input-group-addon" for="marketr_settings_social_facebook_url">Facebook Page</label>
                    <?php echo $this->Form->input('User.facebook_url', array("data-validation"=>"url",'div' => false, 'class' => "string url required form-control  ic", 'placeholder' => 'http://facebook.com/YourShop', 'label' => false, 'id'=>'marketr_settings_social_facebook_url')); ?>
              </div>
              </div>
            </div>
            <div class="form-group url optional marketr_settings_social_google_url col-md-12">
            <div class="controls">
              <div class="input-group" style="width: 100%"><br>
                <label class="url optional input-group-addon" for="marketr_settings_social_google_url">Google Plus URL</label>
                    <?php echo $this->Form->input('User.googleplus_url', array("data-validation"=>"url",'div' => false, 'class' => "string url required form-control  ic", 'placeholder' => 'https://plus.google.com/113346743898241834994/', 'label' => false, 'id'=>'marketr_settings_social_google_url')); ?>
              </div>
            </div>
            </div>
            <div class="form-group string optional marketr_settings_social_twitter_username col-md-12">
            <div class="controls">
              <div class="input-group" style="width: 100%"><br>
                  <label class="string optional input-group-addon" for="marketr_settings_social_twitter_username">Twitter Username</label>
                    <?php echo $this->Form->input('User.twitter_username', array('type'=>'text','div' => false, 'class' => "string required form-control ic", 'placeholder' => 'bigtweeter', 'label' => false, 'id'=>'marketr_settings_social_twitter_username')); ?>
              </div>
            </div>
            </div>
            <br>
            <div class="form-group col-md-12">
            <h3 class="text-center m-t-md">Add your Logo</h3>
            <div class="fileUpload filepicker btn btn-lg btn-success big-button" style="width: 100%">
              <span class="">Upload Logo</span>
              <!-- <input type="file" class="upload" /> -->
              <?php echo $this->Form->input('User.file', array('type'=>'file' ,'div' => false,'label' => false, 'class' => "upload ic",'accept'=>"image/*")); ?>
            </div>  
            </div>
            
            <br>
            
            <div class="form-group col-md-12">
              <?php echo $this->Html->link('SKIP',array('controller'=>'users','action'=>'business_setting'),array('escape'=>false,'class'=>'btn btn-default btn-block'));?>
            </div>
            <div class="form-group col-md-12">
              <button class="btn btn-success btn-block">NEXT</button><br>
            </div>
            <?php echo $this->Form->end(); ?>
         
             
            <p class="text-center m-t-xs text-sm"> 2017 &copy;  Repair Shoppe.</p>
        </div><!-- signup_main_form --> 
        </div><!-- signup_main_right -->
      </div><!-- signup_main -->
    </div>
  </div>
</main>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>  
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
    border: 1px solid #1db198;
    color: #1db198;
    font-size: 17px;
    font-weight: 600;
    margin-top: 0px;
    margin-left: 0px;
    text-transform: uppercase!important;
}
.fileUpload.filepicker.btn.btn-lg.btn-success.big-button:hover {
    color:#b8b8b8;
    border: 1px solid #b8b8b8;
    background-color: rgba(29, 177, 152);

}

</style>

<script>
  $.validate({
    
  });
</script>
<?php echo $this->element('latestfrontend/login-footer'); ?>