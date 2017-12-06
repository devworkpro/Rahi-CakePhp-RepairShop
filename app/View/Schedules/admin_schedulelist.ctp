<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 

<div class="page-header">
    <h1> Scheduled Invoices 
        <?php echo $this->Html->link('New Recurring Invoice',array('controller'=>'Schedules','action'=>'add'),array('escape'=>false, 'class'=>'btn btn-success pull-right'));?>    
    </h1>
</div>



    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title"></h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example" class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                <tr>    
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Frequency </th>
                    <th>Customer </th>
                    <th>Next Billing </th>
                    <th></th>    
                    <th></th>
                </tr>
                </thead>
                
                <tbody>
                    <?php $counter=0;?>
                        <?php foreach($Schedules as $schedule) {
                            $row_id =  ++$counter;
                            $run = $schedule['schedules']['run_next_at'];
                            $current_date = date('m/d/Y', time());
                            $date1=date_create($current_date);
                            $date2=date_create($run);
                            $diff=date_diff($date1,$date2);
                            $days = $diff->format("%R%a days");

                            if($days<0){




                        ?>

                        <tr class="alert alert-danger" style="background-color:#F2DEDE;">
                            <td><?php echo $counter;?></td>
                            <td>
                                <?php echo $schedule['schedules']['name']; ?>
                            </td>
                            <td>
                                <?php echo $schedule['schedules']['type']; ?>
                            </td>
                            <td>
                                <?php echo $schedule['schedules']['status']; ?>
                            </td>
                            <td>
                                <?php echo $schedule['schedules']['frequency']; ?>
                            </td>
                            <td>
                                <?php  
                                    $user_id = $schedule['schedules']['user_id'];
                                    $customer_name = $schedule['users']['first_name'].' '.$schedule['users']['last_name'];
                                    echo $this->Html->link(ucfirst($customer_name),array('controller'=>'users','action'=>'userdetail',$user_id),array('escape'=>false));
                                ?>
                            </td>
                            
                            <td>
                                <?php ?>
                            </td>
                            <td>
                                <?php echo $this->Html->link('<i class="btn btn-sm btn-warning fa fa-pencil"></i>',array('controller' => 'Schedules', 'action' => 'scheduleedit',$schedule['schedules']['id']),array('escape'=>false));?>
                            </td>
                                                        
                            <td>                            
                                <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Schedules', 'action' => 'deleteschedule',$schedule['schedules']['id']),array('escape'=>false,'confirm' => 'Are you sure?'));?>
                            </td>
                        </tr>

                        <?php }else{ ?>
                        <tr>
                            <td><?php echo $counter;?></td>
                            <td>
                                <?php echo $schedule['schedules']['name']; ?>
                            </td>
                            <td>
                                <?php echo $schedule['schedules']['type']; ?>
                            </td>
                            <td>
                                <?php echo $schedule['schedules']['status']; ?>
                            </td>
                            <td>
                                <?php echo $schedule['schedules']['frequency']; ?>
                            </td>
                            <td>
                                <?php  
                                    $user_id = $schedule['schedules']['user_id'];
                                    $customer_name = $schedule['users']['first_name'].' '.$schedule['users']['last_name'];
                                    echo $this->Html->link(ucfirst($customer_name),array('controller'=>'users','action'=>'userdetail',$user_id),array('escape'=>false));
                                ?>
                            </td>
                            
                            <td><?php echo $run;?></td>
                            <td>
                                <?php echo $this->Html->link('<i class="btn btn-sm btn-warning fa fa-pencil"></i>',array('controller' => 'Schedules', 'action' => 'scheduleedit',$schedule['schedules']['id']),array('escape'=>false));?>
                            </td>
                                                        
                            <td>                            
                                <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-remove"></i>',array('controller' => 'Schedules', 'action' => 'deleteschedule',$schedule['schedules']['id']),array('escape'=>false,'confirm' => 'Are you sure?'));?>
                            </td>
                        </tr> 

                        <?php }  } ?>  
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
               url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/estimatedvalueupdate/",

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
        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/statusupdate/",

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
        url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Contracts/likelihoodupdate/",

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