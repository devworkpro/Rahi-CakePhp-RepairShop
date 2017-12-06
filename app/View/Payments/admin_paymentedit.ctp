<?php echo $this->Flash->render('positive'); ?>
<div class="row">
            
            	<div class="col-md-12">
                 	<div class="panel panel-default">
                        <div class="panel-heading">Edit Products</div>
                        <div class="panel-body">
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
                <?php echo $this->Form->create('Product',array('controller'=>'products','action'=>'productedit')); ?>
					<div id="dialog" style="display: none" align = "center">
    This is a jQuery Dialog.
</div>
			
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
							<?php echo $this->Form->input('Product.quantity', array('div'=>false,'class'=>'form-control','disabled'=>'disabled','id'=>'qty')); ?>
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
								<p><b>Scan a serial number or type it and hit enter</b></p>
								<div class="form-group string optional product_tags_product_serials">
								<input id="product_tags_product_serials" class="string optional form-control settingTags" type="text" name="product[tags_product_serials]" value="" style="display: none;">
								<div id="product_tags_product_serials_tagsinput" class="tagsinput" style="min-height: 50px; height: 100%;">
								<div id="product_tags_product_serials_addTag">
									<input id="product_tags_product_serials_tag" data-default="Add item" value="" style="color: rgb(102, 102, 102); width: 68px;">
								</div>
								<div class="tags_clear"></div>
								</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
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
							<?php echo $this->Form->input('Product.description', array('div'=>false,'type'=>'textarea','class'=>'form-control')); ?>
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
							<?php echo $this->Form->input('Product.category', array('options' => array('Default' => 'Default', 'Hardware' => 'Hardware','iphone' => 'iphone','Labor' => 'Labor'),'class'=>'form-control')); ?>
						</div>
                    </div>

				</div>
				
				<div class="row">  
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">

							<input type="radio" name="discount" value="Retail Product or Service" id="servic" >  Retail Product or Service<br/>
							<input type="radio" name="discount" value="Retail Product or Service" id="amount">  Discount - Amount <br/>
							<input type="radio" name="discount" value="Retail Product or Service" id="percent">  Discount - Percent<br/>
						
							
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
							<?php echo $this->Form->input('Product.price_retail', array('div'=>false,'class'=>'form-control','placeholder' => '0.0','id'=>'retail','disabled'=>'disabled')); ?>
						</div>
                    </div>
					
					<div class="col-xs-12 col-sm-3">
						<div class="form-group">
							<?php echo $this->Form->input('Product.price_cost', array('div'=>false,'class'=>'form-control','placeholder' => '0.0','id'=>'cost','disabled'=>'disabled')); ?>
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
						<div class="form-group" >
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
							<?php echo $this->Form->input('Product.vendors', array('options' => array('None selected' => 'None selected'),'class'=>'form-control')); ?>
						</div>
						</div>
						<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<?php echo $this->Form->input('Product.notes', array('div'=>false,'type'=>'textarea','class'=>'form-control')); ?>
						</div>
                    </div>
					</div>
					
				
				
				
<div class="form-group">
				<label class="col-md-12 text-left"></label>
				<div class="col-md-13">
					<?php $id = $this->Session->read('User_id');?>
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
					
					<?php echo $this->Form->input('Product.taxable', array('div'=>false,'type'=>'checkbox','checked'=>'checked')); ?>
					</div>
					</div>
				
				<div class="input-group col-md-12" style="text-align: right;">
					<?php	echo $this->Form->input('Product.user_id', array('div'=>false,'class'=>'form-control', 'type'=>'hidden','value'=>$id)); ?>




					<div class="btn-group">
						<?php echo $this->Form->button('<i class="fa fa-plus"></i> Update Product', array('class' => 'btn btn-success pull-left')); ?>
					</div>
					<div class="btn-group">

                   

					 <?php echo $this->Html->link('Delete',array('controller' => 'products', 'action' => 'deleteproduct',$this->data['Product']['id']),array('class'=>'btn btn-primary','confirm' => 'Are you sure you wish to delete this user?'));?>              
                 
                   <?php echo $this->Html->link('Back',array('controller' => 'products', 'action' => 'productlist'),array('escape'=>false));?>
                   </div>


				</div>
				<div class="row">  
						
					
									
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
						
						</div>
                    </div>
					<div class="col-xs-12 col-sm-2">
						<div class="form-group">
							
						</div>
						</div>
					</div>
					
				</div>
		
                </div>
                </div>
                </div>
				
                
				<?php echo $this->Form->end(); ?>
			
              </div><!-- /.box -->
        </div>
        </div>
   </section>
    </script>
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



