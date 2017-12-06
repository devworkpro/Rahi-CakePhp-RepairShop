<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
    <span class="text-right" ><h4>
        </h4>
    </span>  
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">All Payments</h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                  <tr>    
                      <th>Customer</th>
                      <th>Customer Email</th>
                      <th>Payer Id</th>
                      <th>Package Name</th>
                      <th>Receiver Email</th>
                      <th>Payer Email</th>
                      <th>Payment Date</th>
                      <th>Payment Gross</th>
                      <th>Payment Status</th> 
                      <th></th> 
                  </tr>
                </thead>
                <tfoot>
                  <tr>    
                      <th>Customer</th>
                      <th>Customer Email</th>
                      <th>Payer Id</th>
                      <th>Package Name</th>
                      <th>Receiver Email</th>
                      <th>Payer Email</th>
                      <th>Payment Date</th>
                      <th>Payment Gross</th>
                      <th>Payment Status</th> 
                      <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach($payments as $Pay) {
                    //pr($Pay);
                    ?>  
                    <tr class="odd gradeX">
                      <?php  
                            $data=$Pay['Payment']['data'];
                            $json=json_decode($data);
                            $payment_id=$Pay['Payment']['id'];
                      ?>
                      <td><?php echo $this->Html->link($Pay['User']['User']['first_name'].' '.$Pay['User']['User']['last_name'],array('controller' => 'Users', 'action' => 'userdetail', $Pay['Payment']['user_id']),array('escape'=>false));?></td>  
                      <td><?php echo $this->Html->link($Pay['User']['User']['email'],array('controller' => 'Users', 'action' => 'userdetail', $Pay['Payment']['user_id']),array('escape'=>false));?></td>  
                      <?php 
                      if( isset( $json->payer_id )){?>
                      <td><?php echo $this->Html->link($json->payer_id,array('controller' => 'payments', 'action' => 'paymentview', $payment_id),array('escape'=>false));?></td>
                      <td><?php echo $json->item_name; ?></td>
                      <td><?php echo $json->business; ?></td>
                      <td><?php echo $json->payer_email; ?></td>
                      <td><?php echo $json->payment_date; ?></td>
                      <td><?php echo '$'.$json->payment_gross; ?></td>
                      <td><?php echo $json->payment_status; ?></td>
                      <td><?php echo $this->Html->link('<i class="fa fa-remove"></i>',array('controller'=>'Payments','action'=>'deletepayment',$payment_id),array('escape'=>false,'class'=>'btn btn-danger','confirm' => 'Are you sure?'));?>  </td>
                    </tr>
                  <?php }else{
                    ?>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><?php echo $this->Html->link('<i class="fa fa-remove"></i>',array('controller'=>'Payments','action'=>'deletepayment',$payment_id),array('escape'=>false,'class'=>'btn btn-danger','confirm' => 'Are you sure?'));?></td>
                    <?php

                  }
                  } ?> 
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>  