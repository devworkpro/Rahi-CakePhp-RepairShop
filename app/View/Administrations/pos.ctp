
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
              <b><h2><i class="fa fa-gear"></i>    POS Settings</h2></b>
          </div>
          <div class="col-md-3">
              <?php echo $this->Html->link('<p class="btn btn-default right">Back to Admin</p>',array('controller'=>'Administrations','action'=>'index'),array('escape'=>false));?> 
          </div>
        </div><br>
        <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'pos')); ?>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <div class="col-xs-6 col-sm-6" style="margin-top: 15px;">
              <?php
              $metch = 0;
              $not_metch = 0;
              if(!empty($User_menu)){
              foreach ( $User_menu as $menu ) { 
                        $menu_id = $menu['UserMenu']['menu_id'];
                        if($menu_id == '13')
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
                        <label>Enable POS Module</label>
                        <?php
                      }
                      else
                      {
                        ?>
                        <input type="checkbox" name="customer_status" id="customer_status" class="status" checked="checked">
                        <label>Enable POS Module</label>
                        <?php
                      }
              }
              else{
              ?>
              <input type="checkbox" name="customer_status" id="customer_status" class="status" checked="checked">
              <label>Enable POS Module</label>
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
      <div class="panel-footer">
        <div class="row">
          <div class="col-md-11">
            <?php echo $this->Html->link('Previous',array('controller'=>'Administrations','action'=>'inventory'),array('escape'=>false));?>
          </div>
          <div class="col-md-1">
            <?php echo $this->Html->link('Next',array('controller'=>'Administrations','action'=>'leads'),array('escape'=>false));?>
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
                data: { menu_id : 13 },
            
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
                data: { menu_id : 13 },
            
                success: function(data)
                {
                      // location.reload();          
                }
            });
        }
    });
    
  });

</script>
