<div class="row" style="margin-top: 60px;"><?php echo $this->Flash->render('positive'); ?></div>


<div class="row">           
  <div class="col-lg-1 col-md-1">
  </div>
  <div class="col-lg-10 col-md-10">
  <div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <div class="page-header">
    <h2>Your Invoices</h2>
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
            <h4 class="panel-title"><i class="fa fa-money"></i>  All Invoices</h4><span class="pull-right"></span>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width:100%;cellspacing:0;">
                <thead>
                  <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Paid</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th>Total</th>
                  </tr>
                </thead>
               
                <tbody>
                    <?php foreach ($invoice as $inv) {
                    ?>
                    <tr>
                      <td>
                        <?php $number = $inv['Invoice']['inv_number'];
                              $inv_id = $inv['Invoice']['id'];?>
                        <?php echo $this->Html->link($number,array('controller' => 'PortalUsers', 'action' => 'userinvoicedetail',$inv_id),array('escape'=>false));?>
                      </td>
                      <td>
                        <?php echo $inv['Invoice']['name'];?>
                      </td>

                      <td><?php $status= $inv['Invoice']['status'];
                      if($status=='1')
                      {
                        ?><i class="fa fa-check-circle"></i><?php
                      }
                      else
                      {
                        echo "  No ";
                      }

                      ?></td>
                      <td>
                        <?php echo date('D d-m-Y g:i A',strtotime($inv['Invoice']['created']));?>
                      </td>

                      <td>
                        <?php echo $inv['Invoice']['item'];?>
                      </td>

                      <td><?php echo '$'.$inv['Invoice']['total'];?></td>
                    </tr>

                    <?php }?>
              
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



