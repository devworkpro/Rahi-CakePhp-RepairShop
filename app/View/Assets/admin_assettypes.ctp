<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
  <h3><?php echo $this->Html->link('Assets',array('controller' => 'Assets', 'action' => 'customerassets'),array('escape'=>false));?>> Asset Types  
  <?php echo $this->Html->link('New Asset Type',array('controller' => 'Assets', 'action' => 'new'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?>
  </h3>
  <div class="panel-body">
    <div class="col-md-12">
      <div class="panel panel-default" >
          <div class="panel-heading clearfix">
            <h4 class="panel-title"><i class="fa fa-gear"></i>      Asset Types

            </h4>
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table id="example1" class="display table  table-hover table-bordered">
                <thead>
                <tr>    
                  <th>Name</th>
                  <th>Manage</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php $counter=0;?>
                    <?php foreach($Assets as $Asset) { ?>
                    <?php $row_id = ++$counter; ?>
                    <?php $asset_id = $Asset['Asset']['id'];?>
                    <tr>
                      <td>
                        <div class="name_<?php echo $row_id; ?> ">
                          <?php $name = $Asset['Asset']['name'];?>
                          <span id="<?php echo $row_id; ?>" class="name best_in_place rec_<?php echo $row_id; ?> "><?php echo $name;?>
                          </span>
                        </div>
                        <div style="display:none;" class="name_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                          <form class="place" action="javascript:void(0);">
                            <input type="text" name="name" id="name_<?php echo $row_id;?>" value="<?php echo $name;?>" class="form-control" required>
                            <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $Asset['Asset']['id'];?>">
                            <input class="submitname btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                            <input class="canclename btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                          </form>
                        </div>
                      </td>
                      <td>
                        <?php echo $this->Html->link('Manage Fields',array('controller'=>'Assets','action'=>'assetfields',$asset_id),array('escape'=>false));?>
                      </td>
                      <td>
                        <?php echo $this->Html->link('Delete',array('controller'=>'Assets','action'=>'deleteassetstype',$asset_id),array('escape'=>false,'confirm' => 'Are you sure you want to Delete this Asset Types?'));?>
                      </td>
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

<script>
$(document).ready(function() {
  
$(".name").click(function(){
  id = $(this).attr('id');
$(".name_edit_"+id).show();
$(".name_"+id).hide();
});

    
$(".canclename").click(function(){
//var id = $(".cancle").closest("div").prop("id");
id = $(this).attr('id');
    //alert(id);
$(".name_edit_"+id).hide();
$(".name_"+id).show(); 
});   

$('.submitname').click(function(){
    row_id = $(this).attr('id');
    var name = $('#name_'+row_id).val();
    var id = $('#id_'+row_id).val();
    //alert(id);
    //alert(name);die();
    
    if(name!='')
    {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Assets/updatetypename/",

         // url: "search.php",
         data: { name : name , id:id},
      
         success: function(data)
         {
           //window.location.reload();
          //  $('#newDiv').html(jQuery(data).find('.result').html()); 
          $(".name_edit_"+row_id).hide();
              $(".name_"+row_id).empty();
              $(".name_"+row_id).append(name);
              $(".name_"+row_id).show();
          }
          });
    }return false;    

  });


});
</script>