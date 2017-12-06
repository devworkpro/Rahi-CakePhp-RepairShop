<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px;">
  <div class="page-header"><h1>Customer Details<span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'users', 'action' => 'index'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h1></div>
  <div class="panel panel-default">
    <div class="panel-heading">Customer Profile View</div>
    <div class="panel-body">
<!-- /.box-header -->
      <div class="tab-pane active" id="user">
        <div class="box-body">

          <?php //pr($user); ?>
          <table class="table table-bordered table-striped dataTable no-footer">      
            <tr><th>First Name</th>
            <td><?php echo $userDetail['User']['first_name']; ?></td></tr>
               <!--  <tr><th>Middle Name</th>
                <td><?php echo $userDetail['User']['middle_name']; ?></td></tr> -->
                <tr><th>Last Name</th>
                <td><?php echo $userDetail['User']['last_name']; ?></td></tr>
                <tr><th>Username</th>
                <td><?php echo $userDetail['User']['username']; ?></td></tr>
                
                <tr><th>Business Name</th>
                <td><?php echo $userDetail['User']['business_name']; ?></td></tr>

                <tr><th>Phone Number</th>
                <td><?php echo $userDetail['User']['phone_number']; ?></td></tr>

                <tr><th>Email</th>
                <td><?php echo $userDetail['User']['email']; ?></td></tr>
               
                <tr><th>Address</th>
                <td><?php echo $userDetail['User']['address']; ?></td></tr>

                <tr><th>SMS Service</th>
                <td><?php if($userDetail['User']['sms_service'] == '1'){echo 'Activated';}else if($userDetail['User']['sms_service'] == '0'){echo 'Deactivated';}else{echo '';} ?></td></tr>
               
                <tr><th>Account Creating Date</th>
                <td><?php
                $date=date_create($userDetail['User']['created']);
            echo date_format($date,"d-M-Y"); ?></td></tr>
                
                <?php if($userDetail['UserPlan']){ ?>
                <tr><th>Membership Type</th>
                <td><?php if($userDetail['UserPlan']['type'] == 1){echo 'Course Passes';}else{ echo 'Subscribed'; } ?></td></tr>
                <?php if($userDetail['UserPlan']['type'] == 1){ ?>
                <tr><th>Courses Passes</th>
                <td><?php echo $userDetail['UserPlan']['credits']; ?></td></tr>
                <?php }else{ ?>
                <tr><th>Subscription Date</th>
                <td><?php $date=date_create($userDetail['UserPlan']['created_at']);
                echo date_format($date,"d-M-Y");?></td></tr>


                  <?php }}?>
                <tr><td colspan="2">

                      <?php echo $this->Html->link('Back',array('controller' => 'users', 'action' => 'index'),array('class'=>'btn btn-default','escape'=>false));?>&nbsp;&nbsp;
                      <?php echo $this->Html->link('Edit',array('controller'=>'users','action'=>'useredit',$userDetail['User']['id']),array('class'=>'btn btn-primary','escape'=>false));?>
                     
                     &nbsp;&nbsp;
                     <?php echo $this->Html->link('Delete',array('controller' => 'users', 'action' => 'deleteuser',$userDetail['User']['id']),array('class'=>'btn btn-danger','confirm' => 'Are you sure you wish to delete this user?'));?> 
                </td> 
                </tr>    
          </table>


        </div><!-- /.box-body -->

      </div>
    </div>
  </div>
</div>