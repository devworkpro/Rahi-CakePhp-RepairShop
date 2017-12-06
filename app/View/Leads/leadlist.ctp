<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;">
<span class="text-right" ><h4><?php echo $this->Html->link('Add New Lead',array('controller'=>'Leads','action'=>'add'),array('escape'=>false,'class'=>'btn btn-success m-b-sm'));?> 
        </h4>
    </span>  
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title"><i class="fa fa-money"></i>   Leads</h4>
            
          
        </div>

                               <div class="panel-body">
                                   <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>   
                          <th>Created</th>
                          <th>Lead Details</th>
                          <th>Email</th>
                          <th>Issue</th>
                          <th>Status</th>
                          <th>Assignee</th>
                          <th>Actions</th>
                                              
                        </tr>
                                        </thead>
                                        <tfoot>
                                          <tr>   
                          <th>Created</th>
                          <th>Lead Details</th>
                          <th>Email</th>
                          <th>Issue</th>
                          <th>Status</th>
                          <th>Assignee</th>
                          <th>Actions</th>
                                              
                        </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php $counter=0;?>
                          <?php foreach($Leads as $Lead) {
                            $row_id =  ++$counter; ?>
                          <tr>
                          <?php $Lead_id= $Lead['Lead']['id'];?>
                          <?php $user_id= $Lead['Lead']['user_id'];?>


                          <div class="modal fade" id="Modal_<?php echo $Lead_id; ?>" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Lead Details</h4>
                              </div>
                              <div class="modal-body">
                                <p>Some text in the modal.</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                            
                          </div>
                          </div>



                              <td><?php echo  $created = date('d-m-Y',strtotime($Lead['Lead']['created'])); ?>
                              </td>

                              <td><div class="lead_<?php echo $Lead_id; ?>">
                                  <?php $customer_name= $Lead['Lead']['first_name'].' '.$Lead['Lead']['last_name'].' ';?>
                                 <?php echo $this->Html->link(ucfirst($customer_name),array('controller'=>'Leads','action'=>'convertlead',$Lead['Lead']['id']),array('escape'=>false));?>
                              

                                <span style="cursor:pointer;color:#43B4F4;font-size:15px;" id="<?php echo $Lead_id; ?>" class="lead  <?php echo $row_id; ?>"><i class='fa fa-search'></i></span>
                              </div>
                              </td>
                              



                              <td><?php echo $Lead['Lead']['email'];?></td> 
                              <td><?php echo $Lead['Lead']['subject'];?></td>

                              <td>
                                <div class="Status status_<?php echo $row_id; ?>">
                                  <span data-bip-skip-blur="true" id="<?php echo $row_id; ?>" class="best_in_place status rec_<?php echo $row_id; ?>"> <?php echo $status = $Lead['Lead']['status'];?>
                                        </span>                                      
                                </div>
                                <div style="display:none;" class="statusedit qty_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                                  <form class="place" action="javascript:void(0);">
                                    <select  id="<?php echo $row_id; ?>" class="select_ form-control" >
                                      <option> New </option>
                                      <option>Lead</option>
                                      <option>First Contact</option>
                                      <option>Opportunity</option>
                                      <option>Prospect</option>
                                      <option>Waiting on Client</option>
                                      <option>In Negotiation</option>
                                      <option>In Pending</option>
                                      <option>Won</option>
                                      <option>Lost</option>
                                    </select>
                                    <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Lead['Lead']['id'];?>">

                                        
                                  </form>
                                </div>

                             </td>

                                                     
                              <td><?php echo $Lead['Lead']['assignee'];?></td>
                              <td>
                                <?php echo $this->Html->link('<p class="btn btn-success btn-sm">Process</p>',array('controller'=>'Leads','action'=>'convertlead',$Lead['Lead']['id']),array('escape'=>false));?>
                                <?php if($user_id==''){}else{ ?> 
                                
                                <?php echo $this->Html->link('<p class="btn btn-info btn-sm"><i class="fa fa-user"></i></p>',array('controller'=>'users','action'=>'userview',$user_id),array('escape'=>false));?>

                                <?php }?>
                                <?php echo $this->Html->link('<i class="btn btn-danger btn-sm fa fa-times"></i>',array('controller' => 'Leads', 'action' => 'deleteLead',$Lead['Lead']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Lead?'));?>

                              </td>
                          </tr>    
                          <?php } ?>  
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>

       

<script>
$(document).ready(function() {
  
$(".status").click(function(){
  id = $(this).attr('id');
$(".qty_edit_"+id).show();
$(".status_"+id).hide();


});

    
$('.statusedit').focusout(function(){
  $(".statusedit").hide();
  $(".Status").show();
});


$('.select_').change(function() {
var status=$(this).val();
id = $(this).attr('id');
    var lead_id = $('#id_'+id).val();
          
    if(status!='')
    {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Leads/statusupdate/",

        // url: "search.php",
         data: { status : status , lead_id:lead_id},
      
         success: function(data)
         {
            $(".qty_edit_"+id).hide();
            $(".rec_"+id).empty();
            $(".rec_"+id).append(status);
            $(".rec_"+id).show();
            $(".status_"+id).show();
           //window.location.reload();
          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          }
          });
    }return false;    

  });


});
</script>


<script>
$(document).ready(function() {
  
$(".lead").click(function(){
  id = $(this).attr('id');
 
  if(id!='')
    {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Leads/loadmodel1/",

        // url: "search.php",
         data: { lead_id:id},
      
         success: function(data)
         {
           //window.location.reload();
            $("#Modal_"+id).modal("toggle");
            $('.modal-body').html(jQuery(data).find('.result').html()); 
          }
          });
    }return false;

});

 

});
</script>


<style type="text/css">
.best_in_place {
    background-color: white;
    border: 1px solid #ddd9d9;
    color: black;
    display: inline-block;
    line-height: 1.8;
    padding: 2px 3px;
}
</style>     