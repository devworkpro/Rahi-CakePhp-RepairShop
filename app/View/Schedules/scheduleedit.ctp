<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:100px;">
   
  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
      <div class="page-header">
        <h1>Editing Invoice
          <?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'Schedules', 'action' => 'schedulelist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?>
        </h1>
      </div>
    </div>
    <div class="col-md-1">
    </div>
  </div>          
 

  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">            
    <div class="panel panel-white">
      <div class="panel-body">
        <div class="row" style="margin: 20px 0px 20px 20px" >
          <div class="col-md-6">
            <?php echo $this->Form->create('Schedule',array('controller'=>'Schedules','action'=>'scheduleedit','class'=>"validator-form",'id'=>"wizardForm")); ?>
            

              <div class="row">
              <div class="form-group">
                  <?php echo $this->Form->input('Schedule.name', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Name')); ?>
                
              </div>
              </div>

              <div class="row">
              <div class="form-group">

                  <?php echo $this->Form->input('Schedule.employee', array('options' => array('' => '',$this->Session->read('Auth.User.first_name')=>$this->Session->read('Auth.User.first_name')),'class'=>'form-control','label'=>'Employee (for commission)','required'=>'required')); ?>

              </div>    
              </div>

              <div class="row">
              <div class="form-group">
          
                  <?php echo $this->Form->input('Schedule.frequency', array('options' => array('' => '','Monthly'=>'Monthly','Weekly'=>'Weekly','Biweekly'=>'Biweekly','Quarterly'=>'Quarterly','Semi-Annually'=>'Semi-Annually','Annually'=>'Annually','Biannually'=>'Biannually','Triannually'=>'Triannually'),'class'=>'form-control','label'=>'Frequency','required'=>'required')); ?>

              </div>  
              </div>

              <div class="row">
              <div class="form-group">
          
                  <?php echo $this->Form->input('Schedule.period_mode', array('options' => array('' => '','In Arrears'=>'In Arrears','In Advance'=>'In Advance'),'class'=>'form-control','label'=>'Period Mode','required'=>'required')); ?>

              </div>  
              </div>

              <div class="row">
              <div class="form-group">
        
                  <?php echo $this->Form->input('Schedule.recurring_type', array('options' => array('' => '','Recurring Invoice'=>'Recurring Invoice','General Subscription'=>'General Subscription','Asset/RMM Subscription'=>'Asset/RMM Subscription'),'class'=>'form-control','label'=>'Recurring Type','required'=>'required')); ?>

              </div>  
              </div>
              <?php
                $id = $Schedule['Schedule']['id'];
                $run = $Schedule['Schedule']['run_next_at'];
                $current_date = date('m/d/Y', time());
                $date1=date_create($current_date);
                $date2=date_create($run);
                $diff=date_diff($date1,$date2);
                $days = $diff->format("%R%a days");

                if($days<0){
              ?>
              <div class="row">
              <div class="alert alert-danger">
                <p>
                  <strong>Error:</strong>
                    This template is scheduled to run in the past, or today and the invoices have already run for today. This will not run unless you adjust the next run date.
                </p>
                <p> The time where the invoices are processed is <?php echo date('m/d/y h:i A', time());?>.</p>
              </div>
              </div>
              <?php } ?>

              <div class="row">
              <div class="form-group">
                  <?php echo $this->Form->input('Schedule.run_next_at', array('div'=>false,'class'=>'form-control date-picker','required'=>'required','label'=>'Run Next At')); ?>
              </div>    
              </div>

              <div class="row">
              <div class="form-group">
                  <?php echo $this->Form->input('Schedule.email_customer', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp; Email customer the PDF')); ?>
              </div>  
              </div>

              <div class="row">
              <div class="form-group">
                  <?php echo $this->Form->input('Schedule.physical_invoice', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp; Mail Physical Invoice (costs money)')); ?>
              </div>  
              </div>

              <div class="row">
              <div class="form-group">
                  <?php echo $this->Form->input('Schedule.pending_ticket', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp; Add any pending Ticket charges (from shopping cart)')); ?>
              </div>  
              </div>

              <div class="row">
              <div class="form-group">
                  <?php echo $this->Form->input('Schedule.recurring_invoice', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp; Pause this recurring Invoice')); ?>
              </div>  
              </div>

              <div class="row">
              <div class="form-group">
                      <?php echo $this->Form->button('Update Schedule', array('class' => 'btn btn-success pull-left')); ?>
              </div>
              </div>

              <?php echo $this->Form->end(); ?>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="col-md-1">
    </div>
  </div>


  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10"> 
      <div class="panel panel-white">
        <div class="panel-heading">
          <h3 class="panel-title">Add Line Item</h3>
        </div>
        <div class="panel-body">
          <div class="row" style="margin: 0px 0px 0px 0px" >
            <div class="col-md-6">
              <div class="panel-body">
 
                <?php echo $this->Form->create('Inventory',array('controller'=>'Inventories','action'=>'addinventoryitem', 'id'=>"wizardForm")); ?>
        
                <div class="row">                 
                  <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
          
                    <?php echo $this->Form->input('Inventory.item', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the product's name",'id'=>'get_data','required'=>'required','label'=>'Name')); ?>

                    <?php echo $this->Form->input('Inventory.schedule_id', array('type'=>'hidden', 'class'=>'form-control','value'=> $id )); ?>
                    <?php echo $this->Form->input('Inventory.product_id', array('type'=>'hidden', 'class'=>'form-control','id'=>'product_id' )); ?>
                    <?php echo $this->Form->input('Inventory.upc_code', array('type'=>'hidden', 'class'=>'form-control','id'=>'upc_code')); ?>
                    <div id="result"></div>
                    </div>
                  </div>
                </div>

                <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                  
                    <?php echo $this->Form->input('Inventory.description', array('type'=>'textarea','class'=>'form-control','label'=>'Description','required'=>'required','id'=>'description', 'style'=>"height: 35px;" )); ?>

                    </div>
                    </div>
                </div>

                <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                  
                    <?php echo $this->Form->input('Inventory.quantity', array('type'=>'number','class'=>'form-control','label'=>'Quantity','required'=>'required','onkeypress'=>'return isNumber(event)','value'=>'1')); ?>

                    </div>
                    </div>
                </div>

                <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                  
                    <?php echo $this->Form->input('Inventory.cost', array('type'=>'text','class'=>'form-control','label'=>'Cost','required'=>'required','onkeypress'=>'return isNumber(event)','id'=>'cost')); ?>

                    </div>
                    </div>
                </div>
        

                <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                  
                    <?php echo $this->Form->input('Inventory.rate', array('type'=>'text','class'=>'form-control','label'=>'Price','required'=>'required','onkeypress'=>'return isNumber(event)','id'=>'rate')); ?>

                    </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                    <div class="form-group">

                      <?php echo $this->Form->input('Inventory.tax', array('div'=>false,'type'=>'checkbox','label'=>'&nbsp; Taxable')); ?>

                    </div>  
                    </div>
                </div>

        
                <div class="row">                 
                  <div class="col-xs-12 col-sm-12">
                  <hr class="dotted"> 
                    <div class="btn-group">

                      <?php echo $this->Form->button('Add Item to Template', array('class' => 'btn btn-success pull-right')); ?>

                    </div>
                  </div>
                </div>    
                <?php echo $this->Form->end(); ?> 
              </div>
            </div>
            <div class="col-md-6">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-1">
    </div>
  </div>



  <div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10"> 
      <div class="panel panel-white">
        <div class="panel-heading">
          <h3 class="panel-title">Line Items</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                
                <table class="table table-responsive">
                  <thead>
                    
                  </thead>
                  <tbody>
                  <?php $counter=0; $total=0;$tax=0; ?>
                  <?php foreach($Inventory as $Inv) {
                    $row_id =  ++$counter;  
                    $inv_id = $Inv['Inventory']['id'];?>
                  <tr>
                    <td><?php echo ucfirst($Inv['Inventory']['item']);?></td>

                    <td>
                      <div class="description_<?php echo $row_id; ?>">
                        <?php $description = $Inv['Inventory']['description'];?>
                        <span id="<?php echo $row_id; ?>" class="description des_<?php echo $row_id; ?> best_in_place"><?php echo $description;?>
                        </span>
                      </div>
                      <div style="display:none;" class="description_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                        <form class="place" action="javascript:void(0);">
                          
                          <textarea id="description_<?php echo $row_id;?>" class="form-control" required style="height: 74px; width: 200px;"><?php echo $description;?></textarea>

                          <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Inventory']['id'];?>">
                          <input class="submitdescription btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                          <input class="cancledescription btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                        </form>
                      </div>
                    </td>


                    <td>Taxable:
                      <span class="tax tax_<?php echo $row_id; ?>">
                          <?php $tax = $Inv['Inventory']['tax'];?>
                          <?php 
                            if($tax=='1')
                            {
                              ?>
                              <span class="tax_edit tax_edit_<?php echo $row_id;?> best_in_place" id="<?php echo $row_id; ?>" >
                              <?php echo 'yes';?>
                              </span>
                              <?php
                            }
                            else
                            {
                              ?>
                              <span class="tax_edit tax_edit_<?php echo $row_id;?> best_in_place" id="<?php echo $row_id; ?>" >
                              <?php echo 'No';?>
                              </span>
                              <?php
                            }
                          ?>
                      </span>

                      <div style="display:none;" class="taxform tax_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                        <form action="javascript:void(0);">
                          <select id="<?php echo $row_id; ?>" class="tax_select tax_select_<?php echo $row_id;?> form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                          <input type="hidden" id="id_<?php echo $row_id;?>" value="<?php echo $inv_id;?>">
                        </form>
                      </div>
                    </td>
                    
                           

                    <td>
                      <span class="quantity_<?php echo $row_id; ?>">
                        <?php $quantity = $Inv['Inventory']['quantity'];?>
                        <span id="<?php echo $row_id; ?>" class="quantity quantity_edit_<?php echo $row_id; ?> best_in_place"><?php echo $quantity;?>
                        </span>
                      </span>
                      <span style="display:none;" class="quantity_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                        <form class="place" action="javascript:void(0);">
                          
                          <input type="text" onkeypress="return isNumber(event)" id="quantity_<?php echo $row_id;?>" class="form-control" value="<?php echo $quantity;?>" required>
                          <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Inventory']['id'];?>">
                          <input class="submitquantity submitqty_<?php echo $row_id; ?> btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                          <input class="canclequantity btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                        </form>
                      </span>
                      @
                      <span class="rate_<?php echo $row_id; ?>">
                        <?php $rate = $Inv['Inventory']['rate'];?>
                        <span id="<?php echo $row_id; ?>" class="rate rate_edit_<?php echo $row_id; ?> best_in_place"><?php echo '$'.$rate.'.00';?>
                        </span>
                      </span>
                      <span style="display:none;" class="rate_form_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                        <form class="place" action="javascript:void(0);">
                          
                          <input type="text" onkeypress="return isNumber(event)" id="rate_<?php echo $row_id;?>" class="form-control" value="<?php echo $rate;?>" required>
                          
                          <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Inv['Inventory']['id'];?>">
                          <input class="submitrate submitrate_<?php echo $row_id; ?> btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                          <input class="canclerate btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                        </form>
                      </span>

                    </td>
                    <?php $price=$quantity*$rate;  
                          $total=$price+$total;
                          //$tax=$tax_rate+$tax;
                    ?>

                    <td><?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Schedules', 'action' => 'deleteinventoryitem',$inv_id,$id),array('escape'=>false,'confirm' => 'Are you sure?'));?> </td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td> </td>
                    <td style="text-align: right;">Estimated Total</td>
                    <td><?php echo '$'.$total.'.00'; ?></td>
                    <td colspan="2"> </td>
                  </tr>


                  </tbody>
                            
                </table> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-1">
    </div>
  </div>



</div>



<!-- Generate Product Name -->

<script type="text/javascript">
$(document).ready(function(){
  $("#result").click(function(){
    $(this).hide();
  });
  $('#get_data').keyup(function(){

    var searchid = $(this).val();
    var dataString = searchid;
    //alert(dataString);
    $("#result").show();
    if(searchid!='')
    {
        $.ajax({
          type: "POST",
          url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Schedules/inventory/",

          data: { search : dataString },
      
          success: function(data)
          {
              $("#result").html(jQuery(data).find('.result').html()); 
          }
        });
    }return false;    

  });
});
</script>

<!-- IS Number -->

<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;

    }
    return true;
}
</script>


<!-- Update Description -->

<script>
$(document).ready(function() {
  
$(".description").click(function(){
  id = $(this).attr('id');
$(".description_form_"+id).show();
$(".description_"+id).hide();
});

    
$(".cancledescription").click(function(){
  id = $(this).attr('id');
  $(".description_form_"+id).hide();
  $(".description_"+id).show(); 
});   

$('.submitdescription').click(function(){
    id = $(this).attr('id');
    var description = $('#description_'+id).val();
    var inv_id = $('#id_'+id).val();
    //alert(description);    alert(inv_id);die();
    
    if(description!='')
    {
        $.ajax({
          type: "POST",
          url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Schedules/updatedescription/",

          data: { description : description , inv_id:inv_id},
        
          success: function(data)
          {
              $(".description_form_"+id).hide();
              $(".des_"+id).empty();
              $(".des_"+id).append(description);
              $(".description_"+id).show(); 
          }
        });
    }return false;    

  });


});
</script>




<!-- Update Tax -->

<script>

$(document).ready(function() {
  
  $(".tax_edit").click(function(){
    id = $(this).attr('id');
    $(".tax_form_"+id).show();
    $(".tax_"+id).hide();
  });


  $('.taxform').focusout(function(){
    $(".taxform").hide();
    $(".tax").show();
  });
    
  $('.tax_select').change(function() {
      var tax = $(this).val();
      var id = $(this).attr('id');
      var inv_id = $('#id_'+id).val();
      //alert(tax);alert(inv_id);die();
      if(tax!='')
      {
          $.ajax({
          type: "POST",
          url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Schedules/updatetax/",
          // url: "search.php",
          data: { tax : tax , inv_id:inv_id},
        
          success: function(data)
          {
              $(".tax_form_"+id).hide();
              $(".tax_edit_"+id).empty();
              if(tax=='1')
              {
                $(".tax_edit_"+id).append('Yes');
                $(".tax_edit_"+id).show();
                $(".tax").show();
              }
              else
              {
                $(".tax_edit_"+id).append('No');
                $(".tax_edit_"+id).show();
                $(".tax").show();
              }    
            // window.location.reload();
            //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          }
          });
      }return false;    
  });
});
</script>


<!-- Update Likelihood -->

<script>
$(document).ready(function() {
  
$(".likelihood").click(function(){
  id = $(this).attr('id');
  //alert(id);
$(".likelihood_edit_"+id).show();
$(".likelihood_"+id).hide();


});

$('.likelihoodedit').focusout(function(){
    $(".likelihoodedit").hide();
    $(".likelihood").show();
});

    
$('.likelihood_select').change(function() {

    var likelihood =$(this).val();
    var id = $(this).attr('id');
    var contract_id = $('#likelihood_id_'+id).val();
    //alert(id);alert(likelihood);alert(contract_id);die();
      
    if(likelihood!='')
    {
        $.ajax({
        type: "POST",
        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Contracts/likelihoodupdate/",

        // url: "search.php",
        data: { likelihood : likelihood , contract_id:contract_id},
      
        success: function(data)
        {
            $(".likelihood_edit_"+id).hide();
            $(".likelihood_rec_"+id).empty();
            $(".likelihood_rec_"+id).append(likelihood);
            $(".likelihood_rec_"+id).show();
            $(".likelihood_"+id).show();
           
           window.location.reload();
          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
        }
        });
    }return false;    

});


});
</script>






<!-- Update Quantity -->

<script>
$(document).ready(function() {
  
$(".quantity").click(function(){
  id = $(this).attr('id');
$(".quantity_form_"+id).show();
$(".quantity_"+id).hide();
});

    
$(".canclequantity").click(function(){
  id = $(this).attr('id');
  $(".quantity_form_"+id).hide();
  $(".quantity_"+id).show(); 
});   

$('.submitquantity').click(function(){
    id = $(this).attr('id');
    var quantity = $('#quantity_'+id).val();
    var inv_id = $('#id_'+id).val();
    $(".submitqty_"+id).val("Working...");
    //alert(quantity);    alert(inv_id);die();
    
    if(quantity!='')
    {
        $.ajax({
          type: "POST",
          url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Schedules/updatequantity/",
          data: { quantity : quantity , inv_id:inv_id},
        
          success: function(data)
          {
              window.location.reload(); 
          }
        });
    }return false;    

  });
});
</script>


<!-- Update rate -->

<script>
$(document).ready(function() {
  
$(".rate").click(function(){
  id = $(this).attr('id');
  $(".rate_form_"+id).show();
  $(".rate_"+id).hide();
});

    
$(".canclerate").click(function(){
  id = $(this).attr('id');
  $(".rate_form_"+id).hide();
  $(".rate_"+id).show(); 
});   

$('.submitrate').click(function(){
    id = $(this).attr('id');
    var rate = $('#rate_'+id).val();
    var inv_id = $('#id_'+id).val();
    $(".submitrate_"+id).val("Working...");
    //alert(rate);    alert(inv_id);die();
    
    if(rate!='')
    {
        $.ajax({
          type: "POST",
          url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Schedules/updaterate/",

          // url: "search.php",
          data: { rate : rate , inv_id:inv_id},
        
          success: function(data)
          {
              window.location.reload(); 
          }
        });
    }return false;    
  });
});
</script>
