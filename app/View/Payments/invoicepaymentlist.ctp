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
                      <th>Date</th>
                      <th>Customer</th>
                      <th>Invoice(s)</th>
                      <th>Payment method</th>
                      <th>Amount cents</th>
                      <th>Cust Name</th>  
                      <th></th>
                      <th></th>
                   </tr>
                </thead>
               <!--  <tfoot>
                  <tr>    
                      <th>Payer Id</th>
                      <th>Item Name</th>
                      <th>Payer Email</th>
                      <th>Payment Date</th>
                      <th>Payment Gross</th>
                      <th>Payment Status</th> 
                  </tr>
                </tfoot> -->
                <tbody>
                   <?php foreach($payments as $Pay) {
                  
                   $customer_name = $Pay['users']['first_name'].' '.ucfirst($Pay['users']['last_name']);
                    ?>
                              <tr class="odd gradeX">
                              <td> <?php echo $Pay['invoice_payments']['payment_date'] ?></td>

                              <td> <?php echo $this-> Html->link (ucfirst($customer_name),array('controller' => 'users', 'action' => 'userdetail',$Pay['invoice_payments']['user_id'])); ?></td>

                              <td> <?php echo ucfirst($Pay['invoice_payments']['invoices']) ?></td>
                              <td> <?php echo $Pay['invoice_payments']['payment_method'] ?></td>
                              <td> <?php echo '$'.$Pay ['invoice_payments']['payment_amount'] ?></td>
                              <td> <?php echo ucfirst($customer_name)?></td>

                              <td> <?php echo $this->Html->link('View',array('controller' => 'Invoices', 'action' => 'payments',$Pay ['invoice_payments']['id']),array('escape'=>false));?> </td>

                              <td> <?php echo $this->Html->link('Delete!',array('controller' => 'Payments', 'action' => 'deleteinvoicelist',$Pay ['invoice_payments']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete ?'));?> </td>


                                 <!--  $json=json_decode($data);
                                        //pr($json);
                                  $payment_id=$Pay['id'];
                                   // $yummy = json_decode($json);
                                  ?>
                                 
                                  <td><?php echo $json->payer_id;?></td>

                                  <td><?php echo $json->item_name; ?></td>
                                  <td><?php echo $json->payer_email; ?></td>

                                  <td><?php echo $json->payment_date; ?></td>
                                  <td><?php echo '$'.$json->payment_gross; ?></td>
                                  <td><?php echo $json->payment_status; ?></td> -->
                        
                                </tr>
            
                   <?php } ?> 
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>  