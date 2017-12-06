<?php echo $this->Html->css(array('bootstrap.min','AdminLTE.min.css')); ?>
    
<style type="text/css">
  
#username , #password{
  
  background: #eae7e7;
  border: 1px solid #c8c8c8;
  color: #777;  
  padding: 15px 10px 15px 40px;
  width: 100%;
  height: 40px;
}

</style>
<div class="row" style="margin-top: 60px;"><?php echo $this->Flash->render('positive'); ?></div>
<div class="warper container-fluid">
  <div class="row">
    
    <div class="col-md-3">
    </div>
  
    <div class="col-md-6">
     <div class="login-logo" style="margin-top: 50px">
      <b>Repair Shoppe </b>
      </div>
      <div class="panel panel-default" style="margin:50px">
          <div class="panel-heading">Sign In</div>
          <div class="panel-body">
                      <?php echo $this->Form->create('PortalUser',array('controller'=>'PortalUser','action'=>'userlogin')); ?>
             
              
              <div class="row">                 
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group">
                    <br><p>Sign in using username and password</p>
                  </div>
                </div>
              </div>

              <div class="row">                 
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group">
                  
                    <input id="username" class="form-control" type="text" placeholder="Username" name="PortalUser[username]" required="required">
                     

                  </div>
                </div>
              </div>

              <div class="row">                 
                <div class="col-xs-12 col-sm-12">
                  <div class="form-group">
                  
                    <input id="password" class="form-control login password-field" type="password" placeholder="Password" name="PortalUser[password]" required="required">
                    
                  </div>
                </div>
              </div>

              <div class="row">                 
                <div class="col-xs-12 col-sm-12">
                  <div class="btn-group">
                    <?php echo $this->Form->button('Sign in', array('class' => 'sign_in btn btn-success btn-lg')); ?>
                  </div><br>

                </div>
              </div>    
            <?php echo $this->Form->end(); ?> 
          </div>
      </div>
    </div>
    <div class="col-md-3">
    </div>
  </div>
</div>