

<section class="content">
	
	<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Inbox</h3>
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
                        <th>Name</th>
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
                $sender = $message['Sender']['first_name'].' '.$message['Sender']['surname'];

              echo '<tr id="group_'.$message['Group']['id'].'" class="m-no-link '.(($message['Group']['isread'] == 0)?"m-bold":'').'">';
?>
                          <td><input type="checkbox" class="delete_chkbox" group_id="<?php echo $message['Group']['id']; ?>"></td>
                          <td class="mailbox-name">
<?php echo $this->Html->link($sender , array('controller' => 'messages', 'action' => 'read',$message['Group']['id']) );

 ?>
                          </td>

                          
                          <td class="mailbox-subject">
  <?php echo $this->Html->link($message['Message']['message'] , array('controller' => 'messages', 'action' => 'read',$message['Group']['id']) ); ?>

                          </td>
                          <td>
<?php echo $this->Html->link(date('d M Y h:i A', intval($message['Message']['timestamp'])) , array('controller' => 'messages', 'action' => 'read',$message['Group']['id']) ); ?>
                          </td>
                          <td>
<?php echo $this->Html->link( '<i class="fa fa-trash-o"></i>' , array('controller' => 'messages', 'action' => 'delete',$message['Group']['id']),array('escape'=>false, 'confirm' => 'Are you sure you want to delete this Conversation?') ); ?>            
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