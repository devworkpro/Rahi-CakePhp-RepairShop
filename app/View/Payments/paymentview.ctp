<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid"  style="margin-bottom:50px;">
<div class="page-header"><h1>Payment Details <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'payments', 'action' => 'paymentlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1></div>
<div class="panel panel-default">
                    <div class="panel-heading">Payment View</div>
                    <div class="panel-body">
  
<table class="table table-bordered table-striped dataTable no-footer">  
    <?php  $data=$payment['Transaction']['data'];
           $json=json_decode($data);
          
                                   //     $yummy = json_decode($json);
    ?>    
    <tr><th>Payer Id</th>
    <td><?php echo $json->payer_id; ?></td></tr>
    
    <tr><th>Receiver Email</th>
    <td><?php echo $json->receiver_email; ?></td></tr>
    <tr><th>Payer Email</th>
    <td><?php echo $json->payer_email; ?></td></tr>
    <tr><th>Payment Date</th>
    <td><?php echo $json->payment_date; ?></td></tr>
     <tr><th>Payment Gross</th>
    <td><?php echo '$'.$json->payment_gross; ?></td></tr>
     <tr><th>Payment Status</th>
    <td><?php echo $json->payment_status; ?></td></tr>
   
   
    <tr><td colspan="2">
         <?php echo $this->Html->link('Back',array('controller' => 'payments', 'action' => 'paymentlist'),array('escape'=>false,'class'=>'btn btn-default'));?>
    </td> 
    </tr>   
    
 </table>
 </div><!-- /.box-body -->
  </div><!-- /.box -->
  </div>
  </div>
  </section>


  