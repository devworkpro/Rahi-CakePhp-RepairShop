
    <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Read Mail</h3>
                  <h4 class="pull-right">Delete All Messages 
  <?php echo $this->Html->link( '<i class="fa fa-trash-o"></i>' , array('controller' => 'messages', 'action' => 'delete',$messages[0]['Message']['group_id']),array('escape'=>false, 'confirm' => 'Are you sure you want to delete this Conversation?') ); ?>
                  </h4>
             <h5><b>Members:</b>
          <?php
            foreach($receivers as $receiver){
              echo '<span>'.$receiver['User']['first_name'].' '.$receiver['User']['surname'].'</span>, ';
            }
          ?>      </h5>  
                  
  
                </div><!-- /.box-header -->
<?php  
        $data = "";
        foreach($messages as $message){
          $data .= $message['Sender']['email'].',';
  ?>

                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    <h5>From: <b><?php echo $message['Sender']['email']; ?></b> <span class="mailbox-read-time pull-right">
                    <?php echo date('d M Y h:i A', intval($message['Message']['timestamp'])); ?></span></h5>
                  </div><!-- /.mailbox-read-info -->
                <br />
                  <div class="mailbox-read-message">
                    <?php echo $message['Message']['message']; ?>
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->

          <?php
            } 
            $receiver_ids = chop($data, ",");

          ?>    

                <div class="box-footer">
                  <div class="pull-right">
                    <button class="btn btn-default reply-btn"><i class="fa fa-reply"></i> Reply</button>
                    
                  </div>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->

           <div class="box reply-box">
                <div class="box-body">

<?php

            echo $this->Form->create('Message', array('method' => 'post', 'action' => 'read/'.$message['Message']['group_id'] ));
            echo $this->Form->hidden('Message.user_id', array('value' => $sender_id));
            echo $this->Form->hidden('Message.ids_email', array('value' => $pass_it));
            echo $this->Form->hidden('Message.group_id', array('value' => $message['Message']['group_id']));

 ?>           <div class="form-group">
<?php
            echo $this->Form->input('Message.message',array('type'=>'textarea','label'=>'Reply:', 'class' =>'form-control'));
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
