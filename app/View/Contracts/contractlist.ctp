<?php echo $this->Flash->render('positive'); ?>
<style type="text/css">
  .contract{
    text-align: center;
    background: #F1F1F1;
  }
</style>

<?php $counter=0;$completed=0;$pending=0;$Projected_Value=0;$l=0; $estimated_total=0;$completed_total=0;?>

<?php foreach($Contracts as $contract) {
    ++$counter;
    $estimated_value = $contract['contracts']['estimated_value'];
    $estimated_total = $estimated_total + $estimated_value;
} 

foreach($Contracts as $contract) {
    
    $status = $contract['contracts']['status'];
    if($status=='Won')
    {
        $completed = $completed+1;
        $estimated_value = $contract['contracts']['estimated_value'];
        $completed_total = $completed_total + $estimated_value;
    }
    else
    {
        $pending = $pending+1;
    }
    
}

$pending_total_value = $estimated_total - $completed_total;


foreach($Contracts as $contract) {
    
    $estimated_value = $contract['contracts']['estimated_value'];
    $likelihood = $contract['contracts']['likelihood'];
    $percentage = ($likelihood / 100) * $estimated_value;
    $Projected_Value = $Projected_Value + $percentage;
}

?>


<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 

<div class="page-header">
    <h2>Contract Manager 
        <span class="pull-right"><?php echo $this->Html->link('New Contract',array('controller'=>'Contracts','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success'));?> 

        <?php echo $this->Html->link('Service Level Agreements (SLAs)',array('controller'=>'Slas','action'=>'slalist'),array('escape'=>false, 'class'=>'btn btn-default'));?> 
            
        </span>
    </h2>
</div>
<br>

<div class="row">
<div class="col-xs-12 col-sm-12">


  <div class="col-md-3">
    <div class="panel panel-white">
      <div class="panel-body contract">
        <h4>Pending Sales</h4>
        <span style="font-size: 50px; bold;"><?php echo $pending;?></span>
      </div>
    </div>
  </div>
  <div class="col-md-3">
  <div class="panel panel-white">
    <div class="panel-body contract">
      <h4>Completed Sales</h4>
      <span style="font-size: 50px; bold;"><?php echo $completed;?></span>
    </div>
  </div>  
  </div>
  <div class="col-md-3">
    <div class="panel panel-white">
      <div class="panel-body contract">
        <h4>Pending Total Value</h4>
        <span style="font-size: 50px; bold;"><?php echo '$'.$pending_total_value;?></span>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="panel panel-white">
      <div class="panel-body contract">
        <h4>Projected Value</h4>
        <span style="font-size: 50px; bold;"><?php echo '$'.round($Projected_Value);?></span>
      </div>
    </div>  
  </div>
  

</div>
</div><br/>



    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">   Contracts</h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                <tr>    
                          <th>Name</th>
                          <th>Customer</th>
                          <th>Estimated value</th>
                          <th>Dates Start / End</th>
                          <th>Primary contact</th>
                          <th>Status</th>
                          <th>Likelihood</th>    
                          <td></td>
                </tr>
                </thead>
                
                <tbody>
                    <?php $counter=0;?>
                        <?php foreach($Contracts as $contract) {
                            $row_id =  ++$counter;

                            ?>
                        <tr>
                            <td>
                                <?php
                                   $contract_id = $contract['contracts']['id'];
                                   $contract_name = $contract['contracts']['contract_name']; 
                                
                                echo $this->Html->link($contract_name,array('controller'=>'Contracts','action'=>'contractdetails',$contract_id),array('escape'=>false));?>
                            </td>
                            <td>
                                <?php 
                                    $user_id = $contract['contracts']['user_id'];
                                    $customer_name = $contract['users']['first_name'].' '.$contract['users']['last_name'];
                                echo $this->Html->link(ucfirst($customer_name),array('controller'=>'users','action'=>'userdetail',$user_id),array('escape'=>false));?>
                            </td>
                            
                            <td>
                                <div class="estimated_value_<?php echo $row_id; ?>">
                                    <?php $estimated_value = $contract['contracts']['estimated_value']; ?>
                                    <span id="<?php echo $row_id; ?>" class="estimated_value rec_<?php echo $estimated_value; ?> best_in_place"><?php echo '$'.$estimated_value;?>
                                    </span>
                                </div>
                                <div style="display:none;" class="estimated_value_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                                    <form class="place" action="javascript:void(0);">
                                    <input type="text" class="form-control" name="price" id="estimated_value_<?php echo $row_id;?>" value="<?php echo $estimated_value;?>" onkeypress='return isNumber(event)' required>
                                    <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $contract_id;?>">
                                    <input class="submit_estimated_value submit_estimated_value_<?php echo $row_id; ?> btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                                    <input class="cancle_estimated_value btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                                    </form>
                                </div>
                            </td>


                            <td>
                                <?php $start_date = $contract['contracts']['start_date'];
                                    $end_date = $contract['contracts']['end_date'];
                                    echo $start_date.' / '.$end_date; ?>
                            </td>
                            <td>
                                <?php echo $primary_contact = $contract['contracts']['primary_contact']; ?>
                            </td>
                            
                            <td>
                            <div class="statuss status_<?php echo $row_id; ?>">
                             
                                <span data-bip-skip-blur="true" id="<?php echo $row_id; ?>" class="best_in_place status rec_<?php echo $row_id; ?>"> <?php echo $status = $contract['contracts']['status'];?>
                                </span>                                      
                            </div>
                            <div style="display:none;" class="statusedit status_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                                <form action="javascript:void(0);">
                                    <select  id="<?php echo $row_id; ?>" class="select_ form-control">
                                        <option>New</option>
                                        <option>Lead</option>
                                        <option>First Contact</option>
                                        <option>Opportunity</option>
                                        <option>Prospect</option>
                                        <option>Waiting on Client</option>
                                        <option>In Negotiation</option>
                                        <option>Pending</option>
                                        <option>Won</option>
                                        <option>Lost</option>
                                    </select>
                                    <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $contract_id;?>">
                                </form>
                            </div>
                            </td>


                            <td>
                            <div class="likelihood likelihood_<?php echo $row_id; ?>">
                             
                                <span data-bip-skip-blur="true" id="<?php echo $row_id; ?>" class="best_in_place likelihood likelihood_rec_<?php echo $row_id; ?>"> <?php echo $likelihood = $contract['contracts']['likelihood']; ?>
                                </span>                                      
                            </div>
                            <div style="display:none;" class="likelihoodedit likelihood_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                                <form action="javascript:void(0);">
                                    <select  id="<?php echo $row_id; ?>" class="likelihood_select form-control">
                                        <option>0</option>
                                        <option>25</option>
                                        <option>50</option>
                                        <option>75</option>
                                        <option>100</option>
                                        
                                    </select>
                                    <input type="hidden"  id="likelihood_id_<?php echo $row_id;?>" value="<?php echo $contract_id;?>">
                                </form>
                            </div>
                            </td>




                            <td>
                            <?php echo $this->Html->link('View',array('controller'=>'Contracts','action'=>'contractdetails',$contract['contracts']['id']),array('escape'=>false));?>
                            &nbsp;&nbsp;
                            <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Contracts', 'action' => 'deletecontract',$contract['contracts']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Contract?'));?>

                            </td>
                        </tr> 

                        <?php } ?>  
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>            


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


<!-- Update estimated value -->

<script>
$(document).ready(function() {
  
$(".estimated_value").click(function(){
  id = $(this).attr('id');
$(".estimated_value_edit_"+id).show();
$(".estimated_value_"+id).hide();
});

    
$(".cancle_estimated_value").click(function(){
//var id = $(".cancle").closest("div").prop("id");
id = $(this).attr('id');
        //alert(id);
$(".estimated_value_edit_"+id).hide();
$(".estimated_value_"+id).show(); 
});   

$('.submit_estimated_value').click(function(){
        id = $(this).attr('id');
        $(".submit_estimated_value_"+id).val("Working....");
    
        var estimated_value = $('#estimated_value_'+id).val();
        var contract_id = $('#id_'+id).val();
        //alert(contract_id);die();
        
        if(estimated_value!='')
        {
               $.ajax({
               type: "POST",
               url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Contracts/estimatedvalueupdate/",

              // url: "search.php",
               data: { estimated_value : estimated_value , contract_id:contract_id},
            
               success: function(data)
               {
                 window.location.reload();
                //  $('#newDiv').html(jQuery(data).find('.result').html()); 
                //$(".des_edit_"+id).hide();
                //$(".description_"+id).empty();
                //$(".description_"+id).append(des);
                //$(".description_"+id).show();
              }
              });
        }return false;    

    });


});
</script>



<!-- Update Status -->

<script>
$(document).ready(function() {
  
$(".status").click(function(){
  id = $(this).attr('id');
  //alert(id);
$(".status_edit_"+id).show();
$(".status_"+id).hide();


});

$('.statusedit').focusout(function(){
	$(".statusedit").hide();
	$(".statuss").show();
});

    
$('.select_').change(function() {

	var status=$(this).val();
	var id = $(this).attr('id');
    var contract_id = $('#id_'+id).val();
    //alert(id);alert(status);alert(contract_id);die();
      
    if(status!='')
    {
        $.ajax({
        type: "POST",
        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Contracts/statusupdate/",

        // url: "search.php",
        data: { status : status , contract_id:contract_id},
      
        success: function(data)
        {
            $(".status_edit_"+id).hide();
            $(".rec_"+id).empty();
            $(".rec_"+id).append(status);
            $(".rec_"+id).show();
            $(".status_"+id).show();
           
            window.location.reload();
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