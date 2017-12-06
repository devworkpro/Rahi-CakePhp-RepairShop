<link href="<?php echo $this->webroot.'Plugins/nestable/nestable.css'?>" rel="stylesheet" type="text/css"/>
<script src="<?php echo $this->webroot.'Plugins/nestable/jquery.nestable.js'?>"></script>
<style type="text/css">
  .status {
    display: inline-block;
    float: left;
    margin: 9px 10px !important;
}
</style>



<?php echo $this->Flash->render('positive');?>

<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
  <?php echo $this->element('frontenduser/sidebar1'); ?>
  <div class="col-xs-9">
    <div class="panel panel-white">
      
      <div class="panel-body">
        <div class="row">  
          <div class="col-md-9" style="margin-top: -20px;">
              <b><h2><i class="fa fa-gear"></i>    Tabs Settings</h2></b>
          </div>
          <div class="col-md-3">
              <?php echo $this->Html->link('<p class="btn btn-default right">Back to Admin</p>',array('controller'=>'Administrations','action'=>'index'),array('escape'=>false));?> 
          </div>
        </div><br>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <p> </p>
            <p>Drag to re-order the tabs</p>
          </div>
          <div class="col-xs-12 col-sm-12">
          <?php
            if(!empty($Menu_order['User']['menu_order']))
            {
              //pr($Menu_order);
            ?>
              <div class="col-xs-6 col-sm-6">
                <div class="dd" id="nestable">

                <ol class="dd-list">
                 <?php 
                      $counter = 0;
                      
                      $Menu_order = $Menu_order['User']['menu_order'];
                      $json = json_decode($Menu_order);
                      foreach ( $json as $output ) { 
                      $metch = 0;
                      $not_metch = 0;
                      $id = $output->id;
                      
                      foreach ( $User_menu as $menu ) { 
                        // pr($menu);
                        $menu_id = $menu['UserMenu']['menu_id'];
                        if($menu_id == $id)
                        {
                          $metch++;
                        }
                        else
                        {                        
                          $not_metch++;
                        }
                      }
                      //echo $metch."<br>";echo $not_metch."<br>";
                      $row_id = $counter++;
                      if($metch == '1')
                      {
                        ?>
                      
                        <li class="dd-item" id="UI_<?php echo $row_id;?>" data-id="<?php echo $output->id;?>" data-name="<?php echo $output->name;?>" data-icon-name="<?php echo $output->iconName;?>" data-link="<?php echo $output->link;?>" data-status="1">
                        <input type="checkbox" name="status" id="<?php echo $row_id;?>" class="status">
                            <div class="dd-handle">
                            
                              <i class="<?php echo $output->iconName.'   ';?>"></i>
                              <?php echo $output->name.'<span class="pull-right" style="cursor: move;"><i class="fa fa-bars"></i></span>';?>
                              
                              
                            </div>
                        </li>

                      <?php
                      }
                      else
                      {
                        ?>
                      
                        <li class="dd-item" id="UI_<?php echo $row_id;?>" data-id="<?php echo $output->id;?>" data-name="<?php echo $output->name;?>" data-icon-name="<?php echo $output->iconName;?>" data-link="<?php echo $output->link;?>" data-status="1">
                        <input type="checkbox" name="status" id="<?php echo $row_id;?>" class="status" checked="checked">
                            <div class="dd-handle">
                            
                              <i class="<?php echo $output->iconName.'   ';?>"></i>
                              <?php echo $output->name.'<span class="pull-right" style="cursor: move;"><i class="fa fa-bars"></i></span>';?>
                              
                              
                            </div>
                        </li>

                      <?php
                      }
                      ?>
                      
                      <?php
                      }
                  ?>
                </ol>
                </div>
              </div>
            <?php 
            }
            else{
            ?>

              <div class="col-xs-6 col-sm-6">
                <div class="dd" id="nestable">
                  <ol class="dd-list">
                  <?php $counter=0;
                    foreach ($Menu as $menu) {
                      $row_id = $counter++;
                        ?>
                        <li class="dd-item" id="UI_<?php echo $row_id;?>" data-id="<?php echo $menu['Menu']['menu_order'];?>" data-name="<?php echo $menu['Menu']['name'];?>" data-icon-name="<?php echo $menu['Menu']['icon']?>" data-link="<?php echo $menu['Menu']['link']?>" data-status="1">
                        <input type="checkbox" name="status" id="<?php echo $row_id;?>" class="status" checked="checked">
                            <div class="dd-handle">
                              <i class="<?php echo $menu['Menu']['icon'].'   ';?>"></i>
                              <?php echo $menu['Menu']['name'].'<span class="pull-right" style="cursor: move;"><i class="fa fa-bars"></i></span>';?>
                              
                              
                            </div>
                        </li>
                        <?php
                      }
                  ?>
                  </ol>
                </div>
                
              </div>
            
              
            <?php
            }
            ?>
          </div>
          <input type="hidden" id="Menu_data" class="form-control">
        </div>
      </div>
      <div class="row">                 
          <div class="col-xs-12 col-sm-12">
              <div class="col-xs-6 col-sm-6">
               
              </div>
              <div class="col-xs-4 col-sm-6">
                  <button class="btn btn-default reset_to_defaults">Reset to defaults</button> 
                  <button class="btn btn-success submit">Submit</button><br>

              </div>
          </div>
        
      </div><br>
      <div class="panel-footer">
        <div class="row">
          <div class="col-md-11">
            <?php echo $this->Html->link('Previous',array('controller'=>'Administrations','action'=>'general'),array('escape'=>false));?>
          </div>
          <div class="col-md-1">
            <?php echo $this->Html->link('Next',array('controller'=>'Administrations','action'=>'customer'),array('escape'=>false));?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  
  $( document ).ready(function() {
    // Nestable
    var updateOutput = function(e) {
      //console.log(e);
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
            //alert(window.JSON.stringify(list.nestable('serialize')));
            $("#Menu_data").empty();
            $("#Menu_data").val(window.JSON.stringify(list.nestable('serialize')));
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    
    $('#nestable').nestable({group: 1}).on('change', updateOutput);
    
    $('#nestable2').nestable({group: 1}).on('change', updateOutput);
    
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    updateOutput($('#nestable2').data('output', $('#nestable2-output')));

    $('#nestable-menu').on('click', function(e)  {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    $('#nestable3').nestable();
});

</script>

<script type="text/javascript">
  $( document ).ready(function() {
    $('.reset_to_defaults').click(function(){
        $("#Menu_data").empty();
        $.ajax({
                type: "POST",
                url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Administrations/menuupdatenull/",
                data: { },
            
                success: function(data)
                {
                       location.reload();          
                }
            });
    });

    $('.submit').click(function(){
        var menu_data = $("#Menu_data").val();
        //alert(menu_data);
        if(menu_data=='{}')
        {
          location.reload(); 
        }
        else
        {
          
            $.ajax({
                type: "POST",
                url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Administrations/menuupdate/",
                data: { menu_data : menu_data },
            
                success: function(data)
                {
                       location.reload();          
                }
            });
        }
        return false; 
        //alert(menu_data);
    });

    $(".status").on('change', function() {
      if ($(this).is(':checked')) {
        $(this).attr('value', 'true');
      } else {
        $(this).attr('value', 'false');
      }
      var id = $(this).attr('id');
      var value = $(this).val();
      menu_id = $("#UI_"+id).attr('data-id');
      //alert(menu_id);
      if(value=="true")
        {
          $("#UI_"+id).attr('data-status','1');
          $.ajax({
                type: "POST",
                url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Administrations/deleteusermenu/",
                data: { menu_id : menu_id },
            
                success: function(data)
                {
                      // location.reload();          
                }
            });
        }
        else 
        {
          $("#UI_"+id).attr('data-status','0');
          $.ajax({
                type: "POST",
                url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Administrations/updateusermenu/",
                data: { menu_id : menu_id },
            
                success: function(data)
                {
                      // location.reload();          
                }
            });
        }
    });
  });
</script>