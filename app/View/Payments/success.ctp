<?php echo $this->Flash->render('positive'); ?>

<div class="row well " role="alert" style="text-align: center;margin-top: 80px; margin-bottom: 50px;">
<hr>
  <h1><strong>Thank You!</strong></h1>
  <h2><strong>Thank You,</strong> Your Payment Was Successful.</h2>
  <strong>Transaction Id:</strong><p><?php echo $_REQUEST['txn_id'];?></p>
  <strong>Package:</strong><p><?php echo $_REQUEST['item_name'];?></p>
  <strong>Payment Status:</strong><p><?php echo $_REQUEST['payment_status'];?></p>
  <strong>Payer Email:</strong><p><?php echo $_REQUEST['payer_email'];?></p>
  <strong>Amount:</strong><p><?php echo $_REQUEST['payment_gross'];?></p>
  <strong>Date:</strong><p><?php echo $_REQUEST['payment_date'];?></p>
  <br><br>

<?php echo $this->Html->link('Welcome!!',array('controller' => 'Payments', 'action' => 'plans'),array('escape'=>false,'class'=>'btn btn-success'));?>
</div>

