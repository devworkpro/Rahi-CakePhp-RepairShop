<?php echo $this->Flash->render('positive'); ?>

	<div class="result">
	
	<!--form start-->
		
      <?php echo $this->Form->create('Order',array('controller'=>'orders','action'=>'add','class'=>"validator-form")); ?>
                <div class="box-body">

					<table class="table table-bordered table-striped dataTable no-footer">


						<?php $pid= $data['Product']['id']; ?>
						<tr><th>Product Name</th>
							<?php $name= $data['Product']['product_name']; ?>
							<td><?php echo $name;  ?></td>
						</tr>
						<tr><th>Description</th>
							<td><?php echo $data['Product']['description']; ?></td>
						</tr>
						<tr><th>Upc Code</th>
							<td><?php echo $data['Product']['upc_code']; ?></td>
						</tr>
						<tr><th>Category</th>
							<td><?php echo $data['Product']['category']; ?></td>
						</tr>
     					<tr><th>Price</th>
    						<?php $price= $data['Product']['price_retail']; ?>
    						<td><?php echo '$',$price; ?></td>
    					</tr>
    					<tr><th>Total Quantity</th>
    						<?php  $qty=$data['Product']['quantity']; ?>
    						<td><?php echo $qty; ?></td>
    					</tr>
						
    
					</table>
				</div><!-- /.box-body -->
		
			

				<div class="row">                 
                    <div class="col-xs-12 col-sm-6">
						<div class="form-group">
							
							<?php echo $this->Form->input('Order.product_name', array('div'=>false,'type'=>'hidden','class'=>'form-control', 'id'=>'pname','value' => $name)); ?>

							<?php echo $this->Form->input('Order.product_id', array('div'=>false,'type'=>'hidden','class'=>'form-control', 'id'=>'pid','value' => $pid)); ?>
					

							<?php echo $this->Form->input('Order.amount', array('div'=>false,'type'=>'hidden','class'=>'form-control', 'id'=>'price','value' => $price)); ?>
							<?php echo $this->Form->input('Order.quantity', array('div'=>false,'type'=>'hidden','class'=>'form-control', 'id'=>'qty','value' =>$qty)); ?>
							<?php echo $this->Form->input('Product.id', array('div'=>false,'type'=>'hidden','class'=>'form-control', 'id'=>'qty','value' =>$pid)); ?>
							<?php echo $this->Form->input('Product.quantity', array('div'=>false,'type'=>'hidden','class'=>'form-control', 'id'=>'qty','value' =>$qty)); ?>


							<div id="q">

							<?php echo $this->Form->input('Order.quantity', array('type'=>'number','id'=>'newqty','class'=>'form-control','min'=>1,'max'=>$qty,'required'=>'required')); ?>
							</div>
						</div>
                    </div>
                </div>



                <div class="form-group">
					<label class="col-md-2 text-left"></label>
					<div class="col-md-12"><hr class="dotted">
				
						<div class="input-group col-md-6" style="text-align: left;">

							<div class="btn-group">
								<?php echo $this->Form->button('<i class="fa fa-times"></i> Reset', array('class' => 'btn btn-danger pull-left','type'=>'reset','id'=>'reset')); ?>
							</div>

							<div class="btn-group"  >
								
								
							<?php echo $this->Form->button('<i class="fa fa-plus"></i> Order', array('class' => 'btn btn-success pull-left','id'=>'submit')); ?>
							<div id="s" style="color:red;"><b>Product Out of Stock</b></div>
							
						
							</div>
		
						</div>
					</div>
                </div>	
              



                <?php echo $this->Form->end(); ?>

	




<script type="text/javascript">
         
        var x = document.getElementById('qty').value;
        if(x == "0"){
            $("#q").hide();
            $("#submit").hide();
            $("#reset").hide();
            $("#s").show();
            $("#ms").hide();
        }
        else
        {
        	$("#s").hide();
        	$("#ms").hide();
        }
</script>


<script type="text/javascript">
	
 $(document).ready(function() {
  $('#new').keyup(

          function() {
          //	alert("ss");
            var totalqty = document.getElementById('qty').value;


            var newqty= $('#newqty').val();
           

});
</script>
          



                 

</div>                          