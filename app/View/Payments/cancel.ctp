<?php echo $this->Flash->render('positive'); ?>

<div class="row well " role="alert" style="text-align: center;margin-top: 80px;">
<hr>

  <h1><strong>Oh snap!</strong> Your PayPal transaction has been canceled.</h1>
  <br><br>

<?php echo $this->Html->link('Try Again..!!',array('controller' => 'Payments', 'action' => 'plans'),array('escape'=>false,'class'=>'btn btn-warning'));?>
</div>

