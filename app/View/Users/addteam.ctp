<title>Repair shoppe | Add Team</title>
<?php echo $this->element('latestfrontend/login-head'); ?>
<main class="page-content">
  <?php echo $this->Flash->render('positive'); ?> 
  <div class="page-inner">
    <div id="main-wrapper" >
      <div class="row">
        <div class="col-md-4 center" style="margin-top: 90px !important;"> 
        <div class="login-box">
          <a href="http://112.196.42.180/projects/repairshopsaas/repairshopsaas/" class="logo-name text-lg text-center">Repair Shoppe</a> 
          <h3 class="text-center m-t-md">Add Your Team</h3>
        
            <p>Add your team's email below</p>
            
            <?php echo $this->Form->create('User',array('action' => 'addteam' , 'id'=>"wizardForm")); ?>

            <div class="form-group adt">
              
              <?php echo $this->Form->input('Team.first', array('div' => false, 'class' => "form-control ic name", 'placeholder' => 'First Team Member Email', 'label' => false,"data-validation"=>"email")); ?>
              <span class="form_check"><input type="checkbox" name="Team[first_user]" value="1" /> Admin User?</span>
            </div>

            <div class="form-group adt">
              
              <?php echo $this->Form->input('Team.Second', array('div' => false, 'class' => "form-control ic name",'name'=>'Team[second]' ,'placeholder' => 'Second Team Member Email', 'label' => false,"data-validation"=>"email")); ?>
              <span class="form_check"><input type="checkbox" name="Team[second_user]" value="1" /> Admin User?</span>
            </div>

            
            <div class="form-group adt">

              <?php echo $this->Form->input('Team.third', array('div' => false, 'class' => "form-control ic name", 'placeholder' => 'Third Team Member Email', 'label' => false,"data-validation"=>"email")); ?>

              <span class="form_check"><input type="checkbox" name="Team[third_user]" value="1"/> Admin User?</span>
            </div>
            <div class="form-group adt">
              
              <?php echo $this->Form->input('Team.fourth', array('div' => false, 'class' => "form-control ic name", 'placeholder' => 'Fourth Team Member Email', 'label' => false,"data-validation"=>"email")); ?>

              <span class="form_check"><input type="checkbox" name="Team[fourth_user]" value="1"/> Admin User?</span>
            </div>
            <div class="form-group adt">
              
              <?php echo $this->Form->input('Team.fifth', array('div' => false, 'class' => "form-control ic name", 'placeholder' => 'Fifth Team Member Email', 'label' => false,"data-validation"=>"email")); ?>

              <span class="form_check"><input type="checkbox" name="Team[fifth_user]" value="1" /> Admin User?</span>
            </div>

                <div class="form-group">
                <?php echo $this->Html->link('SKIP',array('controller'=>'users','action'=>'getstarted'),array('escape'=>false,'class'=>'btn btn-default btn-block'));?>

                <button class="btn btn-success btn-block">NEXT</button>
                </div><br>
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
  .adt{
    margin-bottom: 30px;
  }
  .form-control.ic.name {
    float: left;
    margin-right: 5px;
    width: 73%;
}
</style>
<script>
  $.validate({
   
   
  });
</script>
<?php echo $this->element('latestfrontend/login-footer'); ?>