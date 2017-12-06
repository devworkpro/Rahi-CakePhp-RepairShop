<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 50px;">
          
<div class="row">       
  <div class="col-xs-12 col-sm-1">
  </div>
  <div class="col-xs-12 col-sm-10">
    <div class="form-group">
      <h3><?php echo $this->Html->link('Assets',array('controller' => 'Assets', 'action' => 'customerassets'));?> > 
        <?php foreach($name as $nm){
          $asset_id = $nm['Asset']['id'];
          $name = ucfirst($nm['Asset']['name']);?>
          <?php echo $this->Html->link($name,array('controller' => 'Assets', 'action' => 'assetfielview',$asset_id));
        }?> >  Asset Custom Fields
      </h3>
    </div>
  </div>
  <div class="col-xs-12 col-sm-1">
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-9">
  </div>
  <div class="col-xs-12 col-sm-3">
    <div class="form-group">
      <?php echo $this->Html->link('New Field',array('controller' => 'Assets', 'action' => 'newfield',$asset_id),array('escape'=>false,'class'=>'btn btn-default'));?>
      </div> 
    </div>


</div>



            
    <div class="row">
      <div class="col-md-1">
      </div>
        <div class="col-md-10">
          
      <div class="panel panel-default" >
            <div class="panel-heading clearfix">
                <h4 class="panel-title"><i class="fa fa-gear"></i>          Fields</h4>            
          
            </div>

            <div class="panel-body">
            
                <div class="table-responsive">
                <table id="example1" class="display table table-hover" style="width: 100%; cellspacing: 0; ">
                  <thead>
                    <tr>    
                            <th>Name</th>
                            <th>Type</th>
                            <th>Required</th>
                            
                            <th></th>
                            <th></th>
                            <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                      <tr>    
                            <th>Name</th>
                            <th>Type</th>
                            <th>Required</th>
                            
                            <th></th>
                            <th></th>
                            <th></th>
                      </tr>
                  </tfoot>
                  <tbody >
                      <tr>
                          <td>
                            <?php echo "Asset Name";?>
                            
                          </td>                 
                          <td>
                              <?php echo 'Text (system field)';?>
                          </td>
                          <td>
                            
                          </td>
                          
                          <td>
                          
                          </td>
                          <td>
                          </td>
                          <td>

                          </td>
                      </tr>
                      <tr>
                          <td>
                            <?php echo "Asset Serial";?>
                            
                          </td>                 
                          <td>
                              <?php echo 'Text (system field)';?>
                          </td>
                          <td>
                            
                          </td>
                          
                          <td>
                          
                          </td>
                          <td>
                          </td>
                          <td>

                          </td>
                      </tr>
                      <?php $counter=0; ?>
                          <?php foreach($asset_field as $ass_field) { ?>
                          <?php $row_id =  ++$counter; ?>
                        <?php $AssetField_id = $ass_field['AssetField']['id'];
                            $asset_id = $ass_field['AssetField']['asset_id'];
                            $name = $ass_field['AssetField']['name'];
                        ?>
                               
                      <tr>
                          <td>
                            <div class="name_<?php echo $row_id; ?>">
                                            <?php $name = $ass_field['AssetField']['name'];?>
                                            <span id="<?php echo $row_id; ?>" class="name rec_<?php echo $row_id; ?> best_in_place"><?php echo $name;?>
                                            </span>
                                                    
                                          </div>
                                          <div style="display:none;" class="name_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                                            <form class="place" action="javascript:void(0);">
                                <input type="text" name="name" id="name_<?php echo $row_id;?>" value="<?php echo $name;?>" class="form-control" required>
                                <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $ass_field['AssetField']['id'];?>">
                                <input class="submitname btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                                <input class="canclename btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                              </form>
                            </div>
                          </td>                 
                          <td>
                              <?php echo $ass_field['AssetField']['field_type']?>
                          </td>
                          <td>
                            <?php $required = $ass_field['AssetField']['required'];
                            if($required =='')
                            {
                              echo "false";
                            }else{
                              echo "true";
                            }

                            ?>
                          </td>
                          
                          <td>
                          
                            <?php echo $this->Html->link('Edit',array('controller'=>'Assets','action'=>'assetfieldedit',$AssetField_id),array('escape'=>false));?>
                          </td>
                          <td>
                          
                            <?php echo $this->Html->link('Delete',array('controller'=>'Assets','action'=>'assetfieldsdelete',$AssetField_id,$asset_id),array('escape'=>false,'confirm' => 'Are you sure you want to delete this Asset Field ?'));?>
                          </td>
                          <td>
                            <span class="handle">
                              <i class="fa fa-reorder"></i>
                            </span>
                          </td>
                      </tr>  
                      
                        <?php
                      }

                      ?>                      
                           
                              
                  </tbody>
                </table>  
                </div>
            </div>
        </div>
    </div>
        <div class="col-md-1">
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
    //alert(name);
    // alert(id);die();
    
    if(name!='')
    {
         $.ajax({
         type: "POST",
         url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Assets/updateassetfieldname/",

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