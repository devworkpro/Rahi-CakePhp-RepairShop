
<style type="text/css">
  .status {
    display: inline-block;
    float: left;
    margin: 0px 10px 0px 0px !important;
}
</style>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
  <?php echo $this->element('frontenduser/sidebar1'); ?>
  <div class="col-xs-9">
  <?php echo $this->Flash->render('positive');?>
    <div class="panel panel-white">
      
      <div class="panel-body">
        <div class="row">  
          <div class="col-md-9" style="margin-top: -20px;">
              <b><h2><i class="fa fa-gear"></i>    Inventory Settings</h2></b>
          </div>
          <div class="col-md-3">
              <?php echo $this->Html->link('<p class="btn btn-default right">Back to Admin</p>',array('controller'=>'Administrations','action'=>'index'),array('escape'=>false));?> 
          </div>
        </div><br>
        <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'inventory')); ?>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <div class="col-xs-6 col-sm-6" style="margin-top: 15px;">
              <?php
              $metch = 0;
              $not_metch = 0;
              if(!empty($User_menu)){
              foreach ( $User_menu as $menu ) { 
                        $menu_id = $menu['UserMenu']['menu_id'];
                        if($menu_id == '10')
                        {
                          $metch++;
                        }
                        else
                        {                        
                          $not_metch++;
                        }
                      }
                      if($metch!='')
                      {
                        ?>
                        <input type="checkbox" name="customer_status" id="customer_status" class="status">
                        <label>Enable Inventory Module</label>
                        <?php
                      }
                      else
                      {
                        ?>
                        <input type="checkbox" name="customer_status" id="customer_status" class="status" checked="checked">
                        <label>Enable Inventory Module</label>
                        <?php
                      }
              }
              else{
              ?>
              <input type="checkbox" name="customer_status" id="customer_status" class="status" checked="checked">
              <label>Enable Inventory Module</label>
              <?php } ?>
              <hr>
              
              <br>
              
            </div>
            
            <div class="col-xs-6 col-sm-6">
            </div>
            
          </div>
          
        </div>
      </div>
      <div class="row">                 
        <div class="col-xs-12 col-sm-12">
          <div class="col-xs-6 col-sm-6">
          </div>
          <div class="col-xs-2 col-sm-2">
              <button type="submit" class="btn btn-success submit pull-right">Save</button><br>
          </div>
          <div class="col-xs-4 col-sm-4">
          </div>
        </div>
      </div><br>
      <?php echo $this->Form->end(); ?>
      <div class="panel-body">
      <div class="row">  
          <div class="col-md-12" style="margin-top: -20px;">
              <b><h2>   Category Editor</h2></b>
              <hr>
          </div>

      </div><br>
      <div class="row">                 
        <div class="col-xs-12 col-sm-12">
           <?php echo $this->Html->link('Add New Category',array('controller'=>'Administrations','action'=>'newproductcategory'),array('escape'=>false,'class'=>'btn btn-success'));?>
        </div>
      </div><br><br>
      <div class="row">                 
        <div class="col-xs-6 col-sm-6">
          <?php $i=0; 
          if(!empty($productcategory))
          {
                foreach($productcategory as $value)
                {
                  echo ' '.++$i.'. ';?>
                        <span class="categoryedit categoryedit_<?php echo $i; ?>">
                            <?php $category = $value['ProductCategory']['category'];?>
                            <span id="<?php echo $i; ?>" class="cat category_data_<?php echo $i; ?> best_in_place"><?php echo $category;?>
                            </span><span><?php echo $this->Html->link('<i class="fa fa-times"></i>',array('controller'=>'Administrations','action'=>'deleteproductcategory',$value['ProductCategory']['id']),array('escape'=>false));?></span>
                            
                        </span>
                        <span style="display:none;" class="categoryedit_form_<?php echo $i;?>" id="<?php echo $i; ?>" >
                            <form class="place" action="javascript:void(0);">
                            <input type="text" name="category" id="category_<?php echo $i;?>" value="<?php echo $category;?>" class="form-control"  required>
                            <input type="hidden"  id="id_<?php echo $i;?>" value="<?php echo $value['ProductCategory']['id'];?>">
                            <input class="submitcategory btn btn-success" type="button" value="Save" id="<?php echo $i; ?>">
                            <input class="canclecategory btn btn-default" type="button" value="Cancel" id="<?php echo $i; ?>">
                            </form>
                        </span>
                  <br><br>
                <?php 
                }
          }
          ?>
        </div>
      </div><br>
      </div>
      <div class="panel-footer">
        <div class="row">
          <div class="col-md-11">
            <?php echo $this->Html->link('Previous',array('controller'=>'Administrations','action'=>'parts'),array('escape'=>false));?>
          </div>
          <div class="col-md-1">
            <?php echo $this->Html->link('Next',array('controller'=>'Administrations','action'=>'pos'),array('escape'=>false));?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
  $( document ).ready(function() {
    $(".status").on('change', function() {
      if ($(this).is(':checked')) {
        $(this).attr('value', 'true');
      } else {
        $(this).attr('value', 'false');
      }
      var id = $(this).attr('id');
      var value = $(this).val();
      //alert(value);die();
      if(value=="true")
        {
          $.ajax({
                type: "POST",
                url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Administrations/deleteusermenu/",
                data: { menu_id : 10 },
            
                success: function(data)
                {
                      // location.reload();          
                }
            });
        }
        else 
        {
          $.ajax({
                type: "POST",
                url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Administrations/updateusermenu/",
                data: { menu_id : 10 },
            
                success: function(data)
                {
                      // location.reload();          
                }
            });
        }
    });
    
  });

</script>


<!-- Update Category -->

<script>
$(document).ready(function() {
  
    $(document).on('click', '.cat', function() {
        id = $(this).attr('id');
        $(".categoryedit_form_"+id).show();
        $(".categoryedit_"+id).hide();
    });

    $(document).on('click', '.canclecategory', function() {
        id = $(this).attr('id');
        $(".categoryedit_form_"+id).hide();
        $(".categoryedit_"+id).show();
    }); 

    $(document).on('click', '.submitcategory', function() {
         id = $(this).attr('id');
        var category = $('#category_'+id).val();
        var productcat_id = $('#id_'+id).val();
        //alert(category);alert(productcat_id);die();
        if(category!='')
        {
            $.ajax({
            type: "POST",
            url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Administrations/updateproductcategory/",
            data: { category : category , productcat_id:productcat_id},
        
            success: function(data)
                {
                    $(".categoryedit_form_"+id).hide();
                    $(".category_data_"+id).empty();
                    $(".category_data_"+id).append(category);
                    $(".categoryedit_"+id).show(); 
                }
            });
        }return false;   
    });

});
</script>