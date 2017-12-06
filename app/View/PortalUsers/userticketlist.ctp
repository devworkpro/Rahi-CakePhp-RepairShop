<div class="row" style="margin-top: 60px;"><?php echo $this->Flash->render('positive'); ?></div>


<div class="row">           
  <div class="col-lg-1 col-md-1">
  </div>
  <div class="col-lg-10 col-md-10">
  <div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <div class="page-header">
    <h2>Your Tickets</h2>
    </div>

    <!-- Customer panel -->
        <div class="panel panel-white">
          <div class="panel-body">
            <div class="row">
              
                <div class="col-lg-6 col-md-6">
                <?php $user_id = $userDetail['User']['id'];?>
                    <p> Welcome <?php echo ucfirst($userDetail['User']['first_name'])." ".ucfirst($userDetail['User']['last_name']); ?>! </p><br>
                    <?php echo $this->Html->link('Back to Main Page',array('controller' => 'PortalUsers', 'action' => 'myprofile',$user_id),array('escape'=>false,'class'=>'btn btn-default pull-left'));?>
                  </div>
                <div class="col-lg-6 col-md-6"> 
                  
                  <?php echo $this->Html->link('Sign Out',array('controller' => 'PortalUsers', 'action' => 'userlogout'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?>
              </div>
              </div>
        </div><!-- /.box-body -->
      </div>
    
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title"><i class="fa fa-tags"></i>  Tickets</h4><span class="pull-right"></span>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width:100%;cellspacing:0;">
                <thead>
                <tr>    
                  <th>#</th>
                  <th>Subject</th>
                  <th>Created</th>
                  <th>Last Update</th>
                   <th>Issue Type</th>
                  <th>Status</th>
                       
                </tr>
                </thead>
               
                <tbody>
                  <?php $counter=0;$total=0;$tax=0;$string=''; ?>
                  <?php foreach($ticket as $tic) {
                    $row_id =  ++$counter; ?>
                    <tr>
                      <?php $Ticket_id= $tic['Ticket']['id'];?>
                      <?php $user_id= $tic['Ticket']['user_id'];?>

                      <td> 
                        <?php echo $this->Html->link( $Ticket_id,array('controller'=>'PortalUsers','action'=>'userticketdetail',$Ticket_id),array('escape'=>false));?>
                      </td>
                      <?php $title= $tic['Ticket']['title'];?>
                      <td>
                        <?php echo $title;?>
                      </td> 
                      <td>
                        <?php echo  $date = date('d-m-Y',strtotime($tic['Ticket']['created']));?>
                      </td> 
                      <td>
                        <?php echo  $date = date('d-m-Y',strtotime($tic['Ticket']['modified']));?>
                      </td> 
                      <td>
                        <?php echo $tic['Ticket']['type'];?></td>
                      <td>
                        <?php echo $status = $tic['Ticket']['status'];?>
                      </td>
                    </tr>    
                   <?php } ?> 
                </tbody>
            </table>  
            </div>
        </div>
    </div>
  </div>
  </div>
  <div class="col-lg-1 col-md-1">
  </div>
</div>



