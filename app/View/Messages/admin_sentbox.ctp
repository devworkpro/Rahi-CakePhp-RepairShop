

<section class="content">
	
	<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Sent Messages</h3>
                  <div class="box-tools pull-right">
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
<?php if(count($messages) != 0){ ?>                 
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                     <input type="checkbox" class="btn btn-default btn-sm bulk_select" />
                    
                    <div class="btn-group">
                    
                     <button class="btn btn-default btn-sm  delete_bulk"><i class="fa fa-trash-o"></i></button>
                    </div><!-- /.btn-group -->
            
                  </div>

<?php }?>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>

                      <tr>
                        <th></th>
                        <th></th>
                        <th>Message</th>
                        <th>Time</th>
                        <th>Delete</th>
                      </tr>


        <?php  //pr($messages); die;
          if(count($messages) == 0){
            ?>
              <tr>
                  <td class="mailbox-subject"><b>No Messages...</b></td>
              </tr>
            <?php
          }


        			foreach($messages as $message){ 
                $sender = '';

              echo '<tr id="group_'.$message['Message']['group_id'].'" >';
?>
                          <td><input type="checkbox" class="delete_chkbox" group_id="<?php echo $message['Message']['group_id']; ?>"></td>
                          <td class="mailbox-name">
<?php echo $this->Html->link($sender , array('controller' => 'messages', 'action' => 'read',$message['Message']['group_id']) );

 ?>
                          </td>

                          
                          <td class="mailbox-subject">
  <?php echo $this->Html->link($message['Message']['message'] , array('controller' => 'messages', 'action' => 'read',$message['Message']['group_id']) ); ?>

                          </td>
                          <td>
<?php echo $this->Html->link(date('d M Y h:i A', intval($message['Message']['timestamp'])) , array('controller' => 'messages', 'action' => 'read',$message['Message']['group_id']) ); ?>
                          </td>
                          <td>
<?php echo $this->Html->link( '<i class="fa fa-trash-o"></i>' , array('controller' => 'messages', 'action' => 'delete',$message['Message']['group_id']),array('escape'=>false, 'confirm' => 'Are you sure you want to delete this Conversation?') ); ?>            
                          </td>
                        </tr>
<?php					}
?>
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->

              </div><!-- /. box -->

</section>