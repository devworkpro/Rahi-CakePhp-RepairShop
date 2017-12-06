
<style type="text/css">
  .status {
    display: inline-block;
    float: left;
    margin: 0px 10px 0px 0px !important;
}
</style>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
  <?php echo $this->element('frontenduser/sidebar1'); ?>
  <div class="col-xs-9">
  <?php echo $this->Flash->render('positive');?>
    <div class="panel panel-white">
      
      <div class="panel-body">
        <div class="row">  
          <div class="col-md-9" style="margin-top: -20px;">
              <b><h2><i class="fa fa-user"></i>    Users</h2></b>
          </div>
        </div><br>
      
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                
                  <tr>
                    <td><?php echo $users['User']['email'];?></td>

                    <td><?php echo $users['User']['first_name'];?></td>

                    <td style="background-color: <?php echo $users['User']['calendar_entry_color'];?>;"> </td>
                    <td>

                      <span><?php echo $this->Html->link('<i class="fa fa-check"></i>        Password ',array('controller' => 'users', 'action' => 'change_password'),array('escape'=>false,'class'=>'btn btn-warning'));?></span>

                      <?php echo $this->Html->link('<i class="fa fa-cog"></i>    Details ',array('controller' => 'users', 'action' => 'edituseraccount'),array('escape'=>false,'class'=>'btn btn-default'));?>

                    </td>
                  </tr>

                </tbody>
            </table>
            </div>
          </div>
          
        </div>
      </div>
    
    </div>
  </div>
</div>
