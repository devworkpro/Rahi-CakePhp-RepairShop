
<style type="text/css">
  .customer{
    text-align: center;
    background: #F1F1F1;
  }
</style>
<div class="row" style="margin-top: 60px;"><?php echo $this->Flash->render('positive'); ?></div>
<div class="row">       		
	<div class="col-lg-1 col-md-1">
	</div>
	<div class="col-lg-10 col-md-10">

		<div class="warper container-fluid" style="margin-bottom:50px;margin-top: -10;">

			<div class="page-header">
		  		<h1>Your Profile</h1>
		  	</div>
		  	
			<!-- Customer panel -->
		  	<div class="panel panel-white">
	    		<div class="panel-body">
		    		<div class="row">
	        		
		        		<div class="col-lg-6 col-md-6">
		         		    <p> Welcome <?php echo ucfirst($userDetail['User']['first_name'])." ".ucfirst($userDetail['User']['last_name']); ?>! </p>
		            	</div>
		        		<div class="col-lg-6 col-md-6"> 
		        			<?php $user_id = $userDetail['User']['id'];?>
							<?php echo $this->Html->link('Sign Out',array('controller' => 'PortalUsers', 'action' => 'userlogout'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?>
						</div>
	        		</div>
				</div><!-- /.box-body -->
			</div>
		    





		  	<!-- My Ticket Modal -->   
			
			<div class="modal fade" id="myTicketModal" role="dialog">
				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
					<div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal">&times;</button>
					    <h4 class="modal-title">New Ticket</h4>
					</div>
					<div class="modal-body">
					
					<?php echo $this->Form->create('PortalUsers',array('controller'=>'PortalUsers','action'=>'addnewticket')); ?> 


					    <div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php $customer_name = $userDetail['User']['first_name']." ".$userDetail['User']['last_name']; ?>

								<?php echo $this->Form->input('Ticket.name', array('type'=>'hide','class'=>'form-control','placeholder' => "Customer Name",'label'=>'Customer Name', 'value'=>$customer_name)); ?>

								<?php echo $this->Form->input('Ticket.user_id', array('type'=>'hidden','class'=>'form-control', 'value'=>$user_id)); ?>
							</div>
						</div>
						</div>
						<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Ticket.title', array('div'=>false,'class'=>'form-control','placeholder' => "Subject",'label'=>'Subject','value'=>'New Support Request from '.$customer_name)); ?>
								<?php echo $this->Form->input('Ticket.status', array('type'=>'hidden','class'=>'form-control','value'=>'New')); ?>
							</div>
						</div>
						</div>
						<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<input type="checkbox" name="Ticket[approved]" >
								<label>Billing is Pre-Approved</label>
							</div>
						</div>
						</div>
						<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<?php echo $this->Form->input('Ticket.description', array('type'=>'textarea','class'=>'form-control','label'=>'Complete Issue Description','value'=>'Can you help me out with...')); ?>
							</div>
						</div>  
						</div>
						<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<input type="checkbox" name="Ticket[email]" >
								<label>Do not email me a copy</label>
							</div>
						</div>
						</div>
						<div class="row">                 
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<p>
									<em>If you wish to attach a file, you can do that on the next screen.</em>
								</p>
							</div>
						</div>
						</div>
						
						

						<div class="row">  
						<hr class="dotted">	
							
			               	<div class="col-xs-6 col-sm-6">
							
							<div class="btn-group">
								<?php echo $this->Form->button("Create Ticket", array('class' => 'btn btn-success pull-left')); ?>
							</div>
							</div>
							<div class="col-xs-6 col-sm-6">
							<div class="btn-group pull-right">
								<?php echo $this->Form->button("Close", array('class' => 'btn btn-default ','data-dismiss'=>"modal")); ?>
							</div>
							</div>
						</div>

						                		
						<?php echo $this->Form->end(); ?>
					
					</div>
					</div>
					      
				</div>
			</div> 

			<!-- Tickets -->
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default  ticket">
				    <div class="panel-heading">
				        
				        <i class="fa fa-tags"></i>     Tickets &nbsp;&nbsp;  <?php echo $this->Html->link("View All",array('controller' => 'PortalUsers', 'action' => 'userticketlist',$user_id),array('escape'=>false));?>
				        <a class="btn btn-default btn-sm" data-target="#myTicketModal" data-toggle="modal" role="button">
				        	<span class="hidden-xs">New Ticket</span>
							<i class="fa fa-plus"></i>
						</a> 
						
				    </div>
				    <div class="panel-body">
				    	<div class="table-responsive">
				        <table class="table table-hover table-bordered">
				            <thead>
				                <tr>
				                    <th>Number</th>
				                    <th>Subject</th>
									<th>Created</th>
									<th>Last Update</th>
									<th>Issue type</th>
									<th>Status</th>
									
				                </tr>
				            </thead>
				            <tbody>
				            <?php $count=0; foreach ($ticket as $tic) {
								$count++;
								if($count<=5)
								{
							?>
							<tr>
								<td><?php $tic_id = $tic['Ticket']['id'];?>
									<?php echo $this->Html->link($tic_id,array('controller' => 'PortalUsers', 'action' => 'userticketdetail',$tic_id),array('escape'=>false));?>

								</td>
								<td><?php echo $tic['Ticket']['title'];?></td>
								<td><?php echo date('D d-m-Y g:i A',strtotime($tic['Ticket']['created']));?></td>
								<td><?php echo date('D d-m-Y g:i A',strtotime($tic['Ticket']['modified']));?></td>
								<td><?php echo $tic['Ticket']['type'];?></td>
								<td><?php echo $tic['Ticket']['status'];?></td>

								
							</tr>

							<?php }else{

								} }?>
				            </tbody>
				        </table>
				        </div>
				    </div>
				</div>
			</div>
			</div>
			
			
			<!-- Invoice -->
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default invoice">
				    <div class="panel-heading clearfix">
				        <i class="fa fa-money"></i>     Invoices &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link("View All",array('controller' => 'PortalUsers', 'action' => 'userinvoicelist'),array('escape'=>false,'class'=>"btn btn-default btn-sm"));?>
				    </div>
				    <div class="panel-body">
				    	<div class="table-responsive">
				        <table class="table table-hover table-bordered">
				            <thead>
				                <tr>
				                    <th>Number</th>
				                    <th>Name</th>
									<th>Paid</th>
									<th>Date</th>
									<th>Items</th>
									<th>Total</th>
									
				                </tr>
				            </thead>
				            <tbody>
				            <?php $counter=0; foreach ($invoice as $inv) {
				            	$counter++;
				            	if($counter<=10){
							?>
							<tr>
								<td>
									<?php $number = $inv['Invoice']['inv_number'];
										  $inv_id = $inv['Invoice']['id'];?>
									<?php echo $this->Html->link($number,array('controller' => 'PortalUsers', 'action' => 'userinvoicedetail',$inv_id),array('escape'=>false));?>
								</td>
								<td>
									<?php $name = $inv['Invoice']['name'];?>
									<?php echo $this->Html->link($name,array('controller' => 'PortalUsers', 'action' => 'userinvoicedetail',$inv_id),array('escape'=>false));?>
								</td>

								<td><?php $status= $inv['Invoice']['status'];
								if($status=='1')
								{
									?><i class="fa fa-check-circle"></i><?php
								}
								else
								{
									echo " 	No ";
								}

								?></td>
								<td>
									<?php echo date('D d-m-Y g:i A',strtotime($inv['Invoice']['created']));?>
								</td>

								<td>
									<?php echo $inv['Invoice']['item'];?>
								</td>

								<td><?php echo '$'.$inv['Invoice']['total'];?></td>
							</tr>

							<?php }else{

							}
							}?>
							
				            </tbody>
				        </table>

				       	</div>
				    </div>
				</div>
			</div>
			</div>
			


			
			<div class="row">
				<!-- Payments -->
				<div class="col-md-6">
				<div class="panel panel-default  payment">
				    <div class="panel-heading clearfix">
				        <h4 class="panel-title"><i class="fa fa-credit-card"></i>     Payments</h4>

				    </div>
				    <div class="panel-body">
				    	<div class="table-responsive">
				        <table class="table table-hover table-bordered">
				            <thead>
				                <tr>
				                    <th>Date</th>
									<th>Amount</th>
									
				                </tr>
				            </thead>
				            <tbody>
				            <?php //foreach ($invoice as $inv) {
							?>
							<tr>
								<td></td>
								<td></td>
								
							</tr>

				            </tbody>
				        </table>

				       	</div>
				    </div>
				</div>
				</div>
			
			
				<!-- Estimates -->
				<div class="col-md-6">
				<div class="panel panel-default">
				    <div class="panel-heading clearfix">
				        
				        <h4 class="panel-title"><i class="fa fa-money"></i>     Estimates &nbsp;&nbsp;   </h4>
				       	       
						
				    </div>

				    

				    <div class="panel-body">
				    	<div class="table-responsive">
				        <table class="table table-hover table-bordered">
				            <thead>
				                <tr>
				                    <th>Estimate Number</th>
									<th>Status</th>
									<th>Date</th>
									<th>Total</th>
									
				                </tr>
				            </thead>
				            <tbody>
				            <?php $counter=0; foreach ($estimate as $est) {
				            	$decline = $est['Estimate']['decline'];
							$row_id =  ++$counter;
							if($decline!='1')
                         	{
                           
							?>
							<tr>
								<td><?php $est_id = $est['Estimate']['id'];
									$est_number = $est['Estimate']['est_number'];
									$ticket_id = $est['Estimate']['ticket_id'];
									$invoice_id = $est['Estimate']['invoice_id'];
									$status = $est['Estimate']['status'];
								?>
									<?php echo $this->Html->link('Estimate '.$est_number,array('controller' => 'PortalUsers', 'action' => 'userestimatedetail',$est_id),array('escape'=>false));?>

								</td>

								<div class="modal fade" id="EstimatePdfModal_<?php echo $est_id; ?>" role="dialog">
			                        <div class="modal-dialog">
			                            <!-- Modal content-->
			                            <div class="modal-content">

			                              	<div class="modal-header">
			                                	<button type="button" class="close" data-dismiss="modal">&times;</button>
			                                	<h4 class="modal-title"></h4><div class="btn btn-default btn-sm create_pdf" id="<?php echo $est_id; ?>">Save PDF</div>
			                              	</div>

			                              	<div class="estimate_model modal-body EstimateModalBody_<?php echo $est_id; ?>">
			                                	
			                              	</div>
			                              	<div class="modal-footer">
			                                	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                              	</div>
			                            </div>
			                            
			                        </div>
			                    </div>


								<td><?php 

								if($status=='1')
								{
									echo $this->Html->image('check_mark_green.gif', array('alt' => 'Image','width'=>'15', 'height'=>'15','title'=>'Approved'));
									
								}
								else{ ?>
									<span class="btn btn-success approve  approve_<?php echo $row_id;?>" id="<?php echo $row_id; ?>">Approved</span>
									<input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $est_id;?>">
									<span class="btn btn-warning decline" id="<?php echo $row_id; ?>">Decline</span>
								<?php
								}
								if($ticket_id!='0')
								{									
									echo $this->Html->image('lock_icon.png', array('alt' => 'Image','width'=>'15', 'height'=>'15','title'=>'Ticket is OPEN'));
								}
								else{

								}

								if($invoice_id!='0')
								{
									echo $this->Html->image('check_mark_grey.png', array('alt' => 'Image','width'=>'15', 'height'=>'15','title'=>'Invoiced'));
								}
								else
								{
									
								}

								
								?>
								</td>
								<td><?php echo date('D d-m-Y g:i A',strtotime($est['Estimate']['created']));?></td>
								<td><?php echo '$'.$est['Estimate']['total'];?></td>
								

								
							</tr>

							<?php } }
							?>
							
				            </tbody>
				        </table>
				        </div>
				    </div>
				</div>
				</div>

			</div>


			<!-- Attachments  -->
			<div class="row">
				<div class="col-md-6 ">
					<div class="panel panel-default attachment">
					    <div class="panel-heading clearfix">
					        <h4 class="panel-title"><i class="fa fa-paperclip"></i>     Attachments</h4>  

					    </div>
					    <div class="panel-body">
					    	<div class="table-responsive">
					        <table class="table table-hover table-bordered">
					            <thead>
					                <tr>
					                    <th>Created</th>
										<th>File</th>
										<th>Private/Public</th>
										
					                </tr>
					            </thead>
					            <tbody>
									<?php $path = "attachment/";	?> 
									<?php foreach($attachment as $att) {
										$file_name= $att['Attachment']['file'];
										$img = "$path"."$file_name";
									?>
									<tr>
										<td>
										<?php $att_id= $att['Attachment']['id'];?>
										<?php echo $start_at= date('D d-m-Y g:i A',strtotime($att['Attachment']['created']));?>
										</td>
										<td>
											<?php echo $this->Html->image($img, array('alt' => 'Image','width'=>'80px','height'=>'60px',"style"=>"border:2px solid #CCCCCC")); ?>
										
											<a target="_blank" href="http://112.196.42.180/projects/repairshopsaas/repairshopsaas/img/attachment/<?php echo $file_name;?>"><?php echo $file_name= $att['Attachment']['file'];?></a>
													
													
										</td>
										<td><?php echo $att['Attachment']['status'];?></td>
										
									</tr>
									<?php } ?> 			
								</tbody>
					            
					        </table>

					       	</div>
					    </div>
					</div>
				</div>

				<!-- myAttachment Modal -->   
				<div class="modal fade" id="myAttachmentModal" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
						<div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal">&times;</button>
						    <h4 class="modal-title">Upload File</h4>
						</div>
						<div class="modal-body">
						
						<div id="main-wrapper" class="container">
						

			            <?php echo $this->Form->create('users',array('controller'=>'users','action'=>'attachment','class'=>'validator-form','enctype' => 'multipart/form-data')); ?>

			            
			                
			            <div class="row">  
			                   
			            <div class="col-xs-12 col-sm-12">
							<div class="input-group">
									
									<span class="col-xs-5 col-sm-5">
							
									<label>Select one file:</label>&nbsp;&nbsp;&nbsp;
									</span>
									<span class="col-xs-1 col-sm-1"></span>

									<span class="btn btn-primary col-xs-6 col-sm-6">
			                   		
			                   		
			                    		<?php echo $this->Form->input('attachment.file', array('type'=>'file','class'=>'form-control','label'=>'Choose File','required'=>'required','style'=>"display: none;")); ?> 

			                    		<?php echo $this->Form->input('attachment.user_id', array('type'=>'hidden','class'=>'form-control','value'=>$user_id)); ?>


										<?php echo $this->Form->input('attachment.status', array('type'=>'hidden','class'=>'form-control','value'=>'Private')); ?>	
			                    		
			                    	</span>&nbsp;&nbsp;&nbsp;

			                    	<span class="col-xs-12 col-sm-12"></span>
			                    	<span class="col-xs-12 col-sm-12" style="padding-right: 0;">
			                    	<?php echo $this->Form->submit('Upload', array('class' => 'btn btn-success pull-right')); ?>
			                    	</span>
			                </div>
			            	
						</div>
						  
						
						<?php echo $this->Form->end(); ?> 



			            </div>      
						</div>

							                		
						
						
						</div>
						</div>
												      
					</div>
				</div>
			

				<!-- Assets  -->
				<div class="col-md-6">
					<div class="panel panel-default assets">
					    <div class="panel-heading clearfix">
					        
					            Assets &nbsp;&nbsp;   
					       	<?php echo $this->Html->link("View All",array('controller' => 'PortalUsers', 'action' => 'userassetslist',$user_id),array('escape'=>false,'class'=>'btn btn-default'));?>
					    </div>
					    <div class="panel-body">
					    	<div class="table-responsive">
					        <table class="table table-hover table-bordered">
					            <thead>
					                <tr>
					                    <th>Name</th>
										<th>Asset Serial Number</th>
										<th>Type</th>
										
					                </tr>
					            </thead>
					            <tbody>
					            <?php foreach ($assets as $asset) {
					            	$asset_id = $asset['AssetFieldValue']['id']
								?>
								<tr>
									<td><?php echo $name = $asset['AssetFieldValue']['name'];
									?></td>
									<td><?php echo $asset['AssetFieldValue']['serial_number'];?></td>
									<td><?php echo $asset['AssetFieldValue']['type'];?></td>
									
									
								</tr>

								<?php }?>
								
					            </tbody>
					        </table>
					        </div>
					    </div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="col-lg-1 col-md-1">
	</div>
</div>



<!-- Date Time Picker -->


    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.1.118/styles/kendo.material.min.css" />
    <script src="https://kendo.cdn.telerik.com/2017.1.118/js/kendo.all.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
    // create DateTimePicker from input HTML element
    $("#datetimepicker1").kendoDateTimePicker({
    value:new Date()
    });

    $("#datetimepicker2").kendoDateTimePicker({
    value:new Date()
    });

    $("#datetimepicker3").kendoDateTimePicker({
    value:new Date()
    });
});
</script>


<!-- PDF -->
<!-- scripts -->
    <script type="text/javascript" src="//cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js"></script> 

    <script type="text/javascript" src="//cdn.rawgit.com/niklasvh/html2canvas/0.5.0-alpha2/dist/html2canvas.min.js"></script>




     <script type="text/javascript" >    (function(){
    
    $('.create_pdf').on('click',function(){

    	 $('estimate_model').scrollTop(0);
     var id = $(this).attr('id');
     alert(id);

    var form = $('.EstimateModalBody_'+id),
     cache_width = form.width(),
     a4  =[ 595.28,  841.89];  // for a4 size paper width and height
     
    
     createPDF();
     $('#EstimatePdfModal_'+id).hide();


    });
    //create pdf
    function createPDF(){
     getCanvas().then(function(canvas){
      var 
      img = canvas.toDataURL("image/png"),
      doc = new jsPDF({
              unit:'px', 
              format:'a4'
            });     
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save('Invoice details pdf.pdf');
            form.width(cache_width);
            location.reload();
     });
    }
     
    // create canvas object
    function getCanvas(){
     form.width((a4[0]*1.33333) -80).css('max-width','none');
     return html2canvas(form,{
         imageTimeout:2000,
         removeContainer:true
        }); 
    }
     
    }());</script>

<!-- Notes Update -->

<script>
$(document).ready(function() {
  
$(".notes_edit").click(function(){
$(".notes_form").show();
$(".notes").hide();
});

    
$(".notes_cancle").click(function(){

$(".notes").show();
$(".notes_form").hide();
});   

$('.notes_submit').click(function(){
		var notes = $('#notes').val();
		var user_id = $('#id').val();
		//alert(notes);alert(user_id);die();		
		if(notes!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Users/notesupdate/",

 			  // url: "search.php",
 			   data: { notes : notes , user_id:user_id},
			
 			   success: function(data)
 			   {
  				 //window.location.reload();
  				 $(".notes_form").hide();
            	 $(".notes_edit").empty();
            	 $(".notes_edit").append(notes);
            	 $(".notes_edit").removeAttr("style");
            	 $(".notes").show();
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});


});
</script>


<script type="text/javascript">
$(document).ready(function(){
	$('.approve').click(function(){
		row_id = $(this).attr('id');
		//alert(row_id);
		var id =$('#id_'+row_id).val();
		//alert(id);die();
		if(id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/approve/",

 			  // url: "search.php",
 			   data: { id : id },
			
 			   success: function(data)
 			   {
 			   	location.reload();
  				  //$("#result").html(jQuery(data).find('.result').html()); 
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$('.decline').click(function(){
		row_id = $(this).attr('id');
		var id =$('#id_'+row_id).val();
		if(id!='')
		{
 			   $.ajax({
 			   type: "POST",
 			   url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Estimates/decline/",

 			  // url: "search.php",
 			   data: { id : id },
			
 			   success: function(data)
 			   {
 			   	location.reload();
  				  //$("#result").html(jQuery(data).find('.result').html()); 
  				//  $('#newDiv').html(jQuery(data).find('.result').html()); 
  			  }
  			  });
		}return false;    

	});
});
</script>

<script>
$(document).ready(function() {
  
$(".estimate").click(function(){
  id = $(this).attr('id');
 	//$("#EstimatePdfModal_"+id).modal("toggle");
  if(id!='')
    {
        $.ajax({
        type: "POST",
        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/PortalUsers/estimatepdfmodal/",
		// url: "search.php",
        data: { id:id},
      
        success: function(data)
        {
        	//window.location.reload();
            $("#EstimatePdfModal_"+id).modal("toggle");
            $('.EstimateModalBody_'+id).html(jQuery(data).find('.result').html()); 
        }
        });
    }return false;
});
});
</script>