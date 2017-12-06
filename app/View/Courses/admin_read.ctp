
    <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Read Messages</h3> 
          </div> 
          <?php 
          foreach($data as $courses){
//          $data .= $courses['RequestCourse']['email'].',';
          //die(debug($data));
  ?>

                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h5>From: <b><?php echo $courses['RequestCourse']['email']; ?></b> </h5>
                  </div><!-- /.mailbox-read-info -->
                <br />
                  <div class="mailbox-read-message">
                    <?php echo $courses['RequestCourse']['message']; ?>
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->

          <?php
            } 
          ?>    

                <div class="box-footer">
                  <div class="pull-left">
                    <button class="btn btn-default reply-btn"><i class="fa fa-reply"></i> Reply</button>
                    
                  </div>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->

           <div class="box reply-box">
                <div class="box-body">

<?php          
            
            echo $this->Form->create('courses', array('method' => 'post', 'action' => 'read/'.$rid));
            echo $this->Form->hidden('RequestCourse.user_id', array('value' => $this->Session->read('User_id')));
            echo $this->Form->hidden('RequestCourse.parent_id', array('value' => $rid ));

 ?>           <div class="form-group">
<?php
            echo $this->Form->input('RequestCourse.message',array('type'=>'textarea','label'=>'Reply:', 'class' =>'form-control'));
?>
            <div class="box-footer">
              <div class="pull-right">
                <?php echo $this->Form->Submit("Send",array('class'=>'btn btn-default')); ?>
              </div>                
            </div>
            </div>
<?php
            $this->Form->end();

?>


                  
              </div>
              </div>

<!-- ************************************************************************** -->


</section>
