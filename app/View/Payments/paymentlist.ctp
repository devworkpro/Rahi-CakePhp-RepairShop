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
                      <th>Payer Id</th>
                      <th>Receiver Email</th>
                      <th>Payer Email</th>
                      <th>Payment Date</th>
                      <th>Payment Gross</th>
                      <th>Payment Status</th>  
                  </tr>
                </thead>
                <tfoot>
                  <tr>    
                      <th>Payer Id</th>
                      <th>Item Name</th>
                      <th>Payer Email</th>
                      <th>Payment Date</th>
                      <th>Payment Gross</th>
                      <th>Payment Status</th> 
                  </tr>
                </tfoot>
                <tbody>
                   <?php foreach($payments as $Pay) {
                    //pr($Pay);
                    ?>
                                <tr class="odd gradeX">
                                 <?php  $data=$Pay['Payment']['data'];
                                  
                                        $json=json_decode($data);
                                        //pr($json);
                                        $payment_id=$Pay['Payment']['id'];
                                   //     $yummy = json_decode($json);
                                  ?>
                                 
                                  <td><?php echo $json->payer_id;?></td>

                                  <td><?php echo $json->item_name; ?></td>
                                  <td><?php echo $json->payer_email; ?></td>

                                  <td><?php echo $json->payment_date; ?></td>
                                  <td><?php echo '$'.$json->payment_gross; ?></td>
                                  <td><?php echo $json->payment_status; ?></td>
                        
                                </tr>
            
                   <?php } ?> 
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>  