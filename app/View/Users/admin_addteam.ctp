<section>
     <div class="signup_main">
    <div class="signup_main_right">
      <div class="signup_main_form add_email_form"> 
        <h2 class="pull-left">Add Your Team</h2>
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

        <span class="pull-right">
            <div class="form-group">
            <?php echo $this->Html->link('SKIP',array('controller'=>'users','action'=>'getstarted'),array('escape'=>false,'class'=>'vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-grey'));?>

            <button class="vc_btn3-style-modern vc_general vc_btn3 vc_btn3-size-md ">NEXT</button>
            </div>
        </span><br><br><br>
        <?php echo $this->Form->end(); ?> 
      

         
      </div><!-- signup_main_form -->
    </div><!-- signup_main_right -->
  </div><!-- signup_main -->
</section>
<style type="text/css">
  .adt{
    margin-bottom: 38px;
  }
  .form-control.ic.name {
    float: left;
    margin-right: 10px;
    width: 73%;
}
</style>
<script>
  $.validate({
   
   
  });
</script>