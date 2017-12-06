<section class="subscription">
<div class="container">
<?php echo $this->Form->create('Plan',array('controller'=>'plans','action'=>'subscribe')); ?>
<div class="sub_table">

<div class="col-xs-12 col-sm-6">
<div class="sub_table_credit  text-center">  
<h4>Purchase Course Passes </h4>
<ul>
<p> Course Passes <span class="pull-right">Total Cost </span></p>
<?php foreach($creditPlans as $credits){ ?>
<li><label><input value="<?php echo $credits['Plan']['id'];?>" type="radio" name="optradio" required> <?php echo $credits['Plan']['courses'];?> <span class="pull-right"><?php echo $credits['Plan']['price'];?></span></label></li>
<?php } ?>
</ul>

<button class="btn" type="submit"> PURCHASE</button>

</div><!-- sub_table_credit st -->
</div>
<div class="col-xs-12 col-sm-6">
<div class="sub_table_credit  sub_table_subscribe text-center">  
<h4>Purchase Subscription </h4>
<ul>
<p> Subscription Length <span class="pull-right">Total Cost</span></p>
<?php foreach($subsPlans as $subs){ ?>
<li> <label><input value="<?php echo $subs['Plan']['id'];?>" type="radio" name="optradio"><?php echo $subs['Plan']['title'];?><span class="pull-right"><?php echo $subs['Plan']['price'];?></span></label></li>
<?php } ?>
</ul>
<button class="btn" type="submit"> SUBSCRIBE</button>
</div><!-- sub_table_credit st -->
</div>
<div class="col-xs-12 col-sm-12"><span class="cost"><strong>all costs are stated in AUD inclusive of GST</strong><span></div>

</div>
<?php echo $this->Form->end(); ?>
</div> 
</section>
