<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid"  style="margin-bottom: 50px;">
<div class="page-header"><h1>Edit Product<span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Products', 'action' => 'productlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h1>
</div>


<div class="row">
    <div class="col-md-12">
      	<div class="panel panel-default">
            <div class="panel-heading">Edit Product</div>
                        
            <?php /*            	
                <!-- form start-->
                <?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data','method' => 'post','action'=>'useredit','class'=>'form-horizontal')); ?>                   
                    <div class="form-group">
					<label class="col-sm-2 control-label"><!--Date Mask <small>dd/mm/yy</small> --></label>
					<div class="col-sm-7">
                      <?php echo $this->Form->input('User.first_name', array('div'=>false,'class'=>'form-control')); ?>
                   
				    </div>
					 </div>
					 <hr class="dotted">  <?php */?>

			<!-- /.box-header -->
            

            <!-- form start -->
            <?php echo $this->Form->create('Product',array('controller'=>'products','action'=>'productedit','class'=>"validator-form",'id'=>"wizardForm")); ?>
								
			<div class="panel-body">
				<div class="row">  
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<?php echo $this->Form->input('Product.product_name', array('div'=>false,'class'=>'form-control')); ?>
						</div>
                    </div>
					
					
					<div class="col-xs-12 col-sm-3">
						<div class="form-group">
												
							<?php echo $this->Form->input('Product.maintain_stock', array('div'=>false,
									'type'=>'checkbox','id'=>'mstock')); ?>
							<br/>
							<?php echo $this->Form->input('Product.serialized', array('div'=>false,
									'type'=>'checkbox','id'=>'serialized')); ?>
							
							</div>  
                    </div>
					
					<div class="col-xs-12 col-sm-3">
						<div class="form-group">
							
							<div id="quantity">
							<?php echo $this->Form->input('Product.quantity', array('div'=>false,'class'=>'form-control','disabled'=>'disabled','id'=>'qty','required'=>'required')); ?>
							</div>
								<div id="serial" style="display:none" >
							<lable ><b>Quantity</b></lable>
							<a class="btn btn-primary btn-block" data-toggle="modal" role="button" id="btnShow" value="Simple Dialog" data-toggle="modal" data-target="#myModal" > Add serial numbers </a>

					 <div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">
    
						<!-- Modal content-->
						   <div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title"><b>Manage Serials</b></h4>
							</div>
							<div class="modal-body">
							
								<?php echo $this->Form->input('Product.serial_number', array('div'=>false,'class'=>'form-control','data-role'=>"tagsinput",'name'=>'serial[serial_number]','label'=>'Scan a serial number or type it and hit enter')); ?>
                                                     
                                    	                    	
                        	</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" id="close_btn" data-dismiss="modal">Close</button>
							</div>
							</div>
      
						</div>
					</div>
  
							</div>
						</div>
					</div>
				</div>
			
				
				
				<div class="row">  
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<?php echo $this->Form->input('Product.description', array('div'=>false,'type'=>'textarea','class'=>'form-control','required'=>'required')); ?>
						</div>
                    </div>
					
					
					<div class="col-xs-12 col-sm-3">
						<div class="form-group">
							<?php echo $this->Form->input('Product.reorder_at', array('div'=>false,'class'=>'form-control','type'=>'number','disabled'=>'disabled','id'=>'order')); ?>
						</div>
                    </div>
					
					<div class="col-xs-12 col-sm-3">
						<div class="form-group">
							<?php echo $this->Form->input('Product.desired_stock_level', array('div'=>false,'type'=>'number','class'=>'form-control','disabled'=>'disabled','id'=>'stock')); ?>
						</div>
					</div>
				</div>
				
				<div class="row">  
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<?php echo $this->Form->input('Product.upc_code', array('div'=>false,'class'=>'form-control')); ?>
						</div>
                    </div>
					
					
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<?php 
							     //pr($product);
								$categorys = $product['Product']['category'];
								?>
							<?php if(!empty($Category))
								{
									?>
									<label>Category</label><br>
									<select name="Product[category]" class="form-control">
										<?php
										foreach ($Category as $key => $value) {
											if($value ==$categorys){

											?><option value="<?php echo $value;?>" selected><?php echo $value;?></option><?php }
											else{?>
											<option value="<?php echo $value;?>"><?php echo $value;?></option><?php

											
										  }
									   }
										?>
									</select>
									<?php
								}
								else{
									echo $this->Form->input('Product.category', array('options' => array('NULL' => 'Default', 'Hardware' => 'Hardware','iphone' => 'iphone','Labor' => 'Labor'),'class'=>'form-control'));
								}
							?>
						</div>
                    </div>

				</div>
				
				<div class="row">  
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">

							<label><input type="radio" name="discount" value="Retail Product or Service" id="servic" >  Retail Product or Service</label><br/>
							<label><input type="radio" name="discount" value="Retail Product or Service" id="amount">  Discount - Amount </label><br/>
							<label><input type="radio" name="discount" value="Retail Product or Service" id="percent">  Discount - Percent </label><br/>
						
							
						</div>
                    </div>
					
					
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
						<?php echo $this->Form->input('Product.sort_order', array('div'=>false,'type'=>'number','class'=>'form-control')); ?>
						</div>
                    </div>
					
				</div>
				
				
				<div class="row">  
					
					<div class="col-xs-12 col-sm-3">
						<div class="form-group">
							<?php echo $this->Form->input('Product.price_retail', array('div'=>false,'class'=>'form-control','placeholder' => '0.0','id'=>'retail','disabled'=>'disabled','required'=>'required')); ?>
						</div>
                    </div>
					
					<div class="col-xs-12 col-sm-3">
						<div class="form-group">
							<?php echo $this->Form->input('Product.price_cost', array('div'=>false,'class'=>'form-control','placeholder' => '0.0','id'=>'cost','disabled'=>'disabled','required'=>'required')); ?>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
						<?php echo $this->Form->input('Product.physical_location', array('div'=>false,'class'=>'form-control')); ?>
						</div>
                    </div>
					
				</div>  
								
				<div class="row">  
						<div class="col-xs-12 col-sm-3">
						<div class="form-group">
							
							<?php echo $this->Form->input('Product.percent_discount', array('div'=>false,'class'=>'form-control','type'=>'number','disabled'=>'disabled','id'=>'discount')); ?>
						</div>
						</div>
					<div class="col-xs-12 col-sm-3">
						<div class="form-group" style="display: none;" id="mp">
							<b>Markup Percent:</b>
							<div class="alert alert-success">
								<span class="margin-result" id="calculator"></span>
							</div>
						</div>
					</div>
					
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
						<?php echo $this->Form->input('Product.condition', array('div'=>false,'class'=>'form-control')); ?>
						</div>
                    </div>
					
				</div>
							
				<div class="row">  
						
              		<div class="col-xs-12 col-sm-4">
						<div class="form-group">
						<?php echo $this->Form->input('Product.warranty_template', array('options' => array('' => '', '1 Year Labor' => '1 Year Labor'),'class'=>'form-control')); ?>
						</div>
                    </div>
					<div class="col-xs-12 col-sm-2">
						<div class="form-group">
							<label>Vendors</label>
	                 		<?php echo $this->Form->select('Product.vendor_id',$Vendor,array("escape"=>false,'class'=>'form-control','label'=>'Vendor')); ?>
						</div>
						</div>
						<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<?php echo $this->Form->input('Product.notes', array('div'=>false,'type'=>'textarea','class'=>'form-control')); ?>
						</div>
                    </div>
				</div>
					
				
				
				<div class="row"> 
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
						<?php echo $this->Form->input('Product.taxable', array('div'=>false,'type'=>'checkbox','checked'=>'checked')); ?>

						<?php $id = $this->Session->read('User_id');?>

						<?php	echo $this->Form->input('Product.user_id', array('div'=>false,'class'=>'form-control', 'type'=>'hidden','value'=>$id)); ?>
						</div>
                    </div>
					<div class="col-xs-12 col-sm-8">
						<div class="form-group">
							
						</div>
					</div> 
				</div>

				<div class="input-group col-md-12" style="text-align: right;">
					<hr class="dotted">
					<div class="btn-group">
						<?php echo $this->Form->button('Update Product', array('class' => 'btn btn-success pull-left')); ?>
					</div>
					<div class="btn-group">
         				<?php echo $this->Html->link('Delete',array('controller' => 'products', 'action' => 'deleteproduct',$this->data['Product']['id']),array('class'=>'btn btn-danger','confirm' => 'Are you sure you wish to delete this Product?'));?>
					 </div>              
                 	<div class="btn-group">
                   		<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i>Back',array('controller' => 'products', 'action' => 'productlist'),array('class'=>'btn btn-primary','escape'=>false));?>
                   	</div>
				</div>
				
            </div>
               
                
			<?php echo $this->Form->end(); ?>
			
        </div><!-- /.box -->
    </div>
</div>
</div>



<script type="text/javascript">
	
 $(document ).ready(function() {
	 	
  $("#mstock").click(function(){
	  if($("#mstock").prop('checked') == true){
		
        $("#qty").prop('disabled', false);
		$("#order").prop('disabled', false);
		$("#stock").prop('disabled', false);
		
    } else {
		
        $("#qty").prop('disabled', true);
		$("#order").prop('disabled', true);
		$("#stock").prop('disabled', true);
    }
	});
	
});
</script>

<script type="text/javascript">
	
 $(document).ready(function() {
  $("#serialized").click(function(){
	  if($("#serialized").prop('checked') == true){		
        $("#qty").prop('disabled', false);
		 $("#quantity").hide();
		  $("#serial").show();
		 
	//	<a class="btn btn-primary btn-block" data-toggle="modal" role="button" href="#manage-serials"> Add serial numbers </a>
	//	$("#order").prop('disabled', false);
	//	$("#stock").prop('disabled', false);	
    } else {
		
        //$("#qty").prop('disabled', true);
		//$("#order").prop('disabled', true);
		//$("#stock").prop('disabled', true);
		$("#serial").hide();
		$("#quantity").show();
    }
	});
});
</script>
   

<script type="text/javascript">
	
 $(document).ready(function() {
  $('#cost').keyup(

          function() {
            var retail = document.getElementById('retail').value;
			var cost = document.getElementById('cost').value;
			cost=cost++;
			var c=(retail-cost)/cost;
			var calculator=c*100;
			console.log(calculator);
			c=0;
			calculator=(calculator.toFixed(2));			
			$('#calculator').html(calculator).append("%");
			$('#markup').val(calculator);
			calculator=0;
            //alert(calculator);		
          });
});
</script>

<script type="text/javascript">
	
 $(document).ready(function() {
  $('#retail').keyup(

          function() {
            var retail = document.getElementById('retail').value;
			var cost = document.getElementById('cost').value;
			cost=cost++;
			var c=(retail-cost)/cost;
			var calculator=c*100;
			console.log(calculator);
			c=0;
			calculator=(calculator.toFixed(2));			
			$('#calculator').html(calculator).append("%");
			$('#markup').val(calculator);
			calculator=0;
            //alert(calculator);		
          });
});
</script>
    
<script type="text/javascript">
	
 $(document).ready(function() {
  $("#servic").click(function(){
	  if($("#servic").prop('checked') == true){		
        $("#retail").prop('disabled', false);
		$("#cost").prop('disabled', false);
		$("#discount").prop('disabled', true);
		$("#mp").show();
    } 
	

	}

	);
});

</script>

<script type="text/javascript">
	
 $(document).ready(function() {
	 
  $("#amount").click(function(){
	  if($("#amount").prop('checked') == true){		
        $("#retail").prop('disabled', false);
		$("#cost").prop('disabled', true);
	$("#discount").prop('disabled', true);	
    } 
	});
});
</script>

<script type="text/javascript">
	
 $(document).ready(function() {
  $("#percent").click(function(){
	  if($("#percent").prop('checked') == true){		
       $("#retail").prop('disabled', true);
		$("#cost").prop('disabled', true);
		$("#discount").prop('disabled', false);	
    } 
	});
});
</script>


<script type="text/javascript">
	
 $(document).ready(function() {
  $("#close_btn").click(function(){
		 
  		

            var l = document.getElementById('serial_num').value;
            $("#srl_nmbrs").val(l);
			//alert(l);			
         

    });
});
</script>