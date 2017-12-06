<div class="result">
	<div class="row">                 
        <div class="col-xs-12 col-sm-12">
			<div class="form-group">
			 <?php foreach($Product as $pro) { //pr($pro);?>
			<div class="get_description">
				<?php echo $description = $pro['Product']['description'];?>
			</div>
			<div class="get_cost">
				<?php echo $pro['Product']['price_cost'];?>
			</div>
			<div class="get_retail">
			<?php echo $pro['Product']['price_retail'];?>
			</div>
			<div class="get_upc_code">
			<?php echo $pro['Product']['upc_code'];?>
			</div>
			<div class="get_id">
			<?php echo $pro['Product']['id'];?>
			</div>
			<?php } ?>  
			</div>
		</div>
    </div>  

</div>