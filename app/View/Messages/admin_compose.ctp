        <!-- Main content -->
        
   <link rel="stylesheet" href="<?php echo $this->webroot.'Plugins/iCheck/all.css';?>">
    <script src="<?php echo $this->webroot.'Plugins/iCheck/icheck.min.js';?>"></script>
       <style>
          .h-300{
            height: 300px !Important;
          }
          #k_max_height{
          	max-height: 450px;
          	overflow: auto;
          }
       </style>

        <section class="content">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Compose New Message</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
<?php
    echo $this->Form->create('Message');
?>
    <div class="input-group">
    
      <?php echo $this->Form->input('Message.receiver',array('div'=>false, 'label'=> false, 'autocomplete' => 'off', 'class' => 'form-control k_ajaxfetch', 'placeholder' => 'To:')); ?>
        <span class="input-group-addon" id="add_recipient"><span class="fa fa-plus"></span> </span>
           
    </div>


          <div id="k_emails">
          </div>

                  </div>
                 
                  <div class="form-group">
                  <?php
                  
                  echo $this->Form->input('Message.message',array('div'=>false, 'label'=> false, 'type' => 'textarea','class' => 'form-control h-300'));

                  ?>
                  </div>
                 
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                  </div>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
        </section><!-- /.content -->



        <!-- Modal -->

<div class="modal fade" id="listusrModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog select_name_modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Contacts.</h4>
      </div>
      <div class="modal-body" id="k_max_height">
        <div class="box box-primary">

          <div class="box-body">
            <table class="select_name_table">
              <tr>
                <!-- <th></th> -->
                <th> <span><input class="search_recipient form-control" placeholder="search name" type="text" />  </span></th>
              </tr>
<?php
            foreach($users as $user){
              $em = $user['User']['email'];
              $nam = $user['User']['first_name'].' '.$user['User']['surname'];
              $idd = $user['User']['id'];
?>
              <tr class="row-tr" id="usr_<?php echo $idd; ?>" >
                <td>                
                   <input type="checkbox" class="row-td minimal"  value="<?php echo $em; ?>" style="position: absolute; opacity: 0;"/>
                </td>
                <td class="row-td2" usr="<?php echo $idd; ?>" ><?php echo $nam; ?></td>
              </tr>
   <?php         }
?>

            </table>         
          </div>

        </div>

      </div>
      <span class="error k_error">No Contact is Selected.</span>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="k_add">Add</button>
    </div>
  </div>
</div>

<script>
  
   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

</script>