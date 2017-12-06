
<style type="text/css">
  .status {
    display: inline-block;
    float: left;
    margin: 0px 10px 0px 0px !important;
}
</style>
<link href="<?php echo $this->webroot.'Plugins/summernote-master/summernote.css'?>" rel="stylesheet" type="text/css"/>
<script src="<?php echo $this->webroot.'Plugins/summernote-master/summernote.min.js'?>"></script>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
  <?php echo $this->element('frontenduser/sidebar1'); ?>
  <div class="col-xs-9">
  <?php echo $this->Flash->render('positive');?>
    <div class="panel panel-white">
      
      <div class="panel-body">
        <div class="row">  
          <div class="col-md-9" style="margin-top: -20px;">
              <b><h2><i class="fa fa-gear"></i>    Estimates Settings</h2></b>
          </div>
          <div class="col-md-3">
              <?php echo $this->Html->link('<p class="btn btn-default right">Back to Admin</p>',array('controller'=>'Administrations','action'=>'index'),array('escape'=>false));?> 
          </div>
        </div><br>
        <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'estimates')); ?>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <div class="col-xs-6 col-sm-6" style="margin-top: 15px;">
              <?php
              $metch = 0;
              $not_metch = 0;
              if(!empty($User_menu)){
              foreach ( $User_menu as $menu ) { 
                        $menu_id = $menu['UserMenu']['menu_id'];
                        if($menu_id == '7')
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
                        <label>Enable Estimates Module</label>
                        <?php
                      }
                      else
                      {
                        ?>
                        <input type="checkbox" name="customer_status" id="customer_status" class="status" checked="checked">
                        <label>Enable Estimates Module</label>
                        <?php
                      }
              }
              else{
              ?>
              <input type="checkbox" name="customer_status" id="customer_status" class="status" checked="checked">
              <label>Enable Estimates Module</label>
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

      <?php if(!empty($Disclaimer)){?>
      <div class="panel-body">

        <div class="row">  
            <div class="col-md-12" style="margin-top: -20px;">
                <b><h2>  Estimate Disclaimer </h2></b>
                <hr>
            </div>

        </div><br>

        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            
            <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'updateestimatedisclaimer','class'=>"validator-form",'id'=>"wizardForm")); ?>   

              <div class="col-xs-12 col-sm-12">
                <div class="form-group">            
                  <?php echo $this->Form->input('Disclaimer.estimate_disclaimer', array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>false,'id'=>'summernote','value'=>$Disclaimer['Disclaimer']['estimate_disclaimer'])); ?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->button('Update Disclaimer', array('class' => 'btn btn-success pull-left')); ?>
                </div>
              </div>

            <?php echo $this->Form->end(); ?>
            
          </div>
        </div>
      </div>
      <?php }?>



      <?php 
      if(!empty($Package))
      {
        $package_name    = $Package['UserPackage']['item_name'];
        $multilocation   = $Package['UserPackage']['multilocation'];
       
        if($multilocation == 1)
        {
          if($package_name != "")
          {
          ?>

          <div class="panel-body">
            <div class="row">  
              <div class="col-md-12" style="margin-top: -20px;">
                  <b><h2>   Transfer All Estimates </h2></b>
                  <hr>
              </div>
            </div><br>
            <div class="row">                 
              <div class="col-xs-12 col-sm-12">
              <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'estimatelocationtransfer')); ?>
                <?php echo $this->Form->input('TransferLocation.user_id', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$this->Session->read('Auth.User.id'))); ?>
                
                <?php if(empty($TransferLocation))
                {
                  ?>
                  <label>From Location (Estimates Only)</label>
                  <?php echo $this->Form->input('TransferLocation.from_estimate', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>'default')); ?>
                  <select name="TransferLocation[from_estimate]" class="form-control" disabled="disabled">
                    <option value="default">default</option>
                  </select>              
                  <br>
                  <label>To Location </label>
                  <select name="TransferLocation[to_estimate]" class="form-control">
                    <option value="default">default</option>
                    <?php
                    foreach ($Multilocation as $key => $value) {
                       ?><option value="<?php echo $value;?>"><?php echo $value;?></option><?php
                    } 
                    ?>
                  </select>
                  <?php 
                }
                else
                {
                  ?>
                  <label>From Location (Estimates Only)</label>
                  <?php echo $this->Form->input('TransferLocation.from_estimate', array('type'=>'hidden','div'=>false,'class'=>'form-control','value'=>$TransferLocation['TransferLocation']['to_estimate'])); ?>
                  <select name="TransferLocation[from_estimate]" class="form-control" disabled="disabled">
                    <option value="<?php echo $TransferLocation['TransferLocation']['to_estimate'];?>"><?php 
                    echo $TransferLocation['TransferLocation']['to_estimate'];?></option>
                  </select>
                  
                  <br>
                  <label>To Location </label>
                  <select name="TransferLocation[to_estimate]" class="form-control">
                    <option value="default">default</option>
                    <?php
                    foreach ($Multilocation as $key => $value) {
                       ?><option value="<?php echo $value;?>"><?php echo $value;?></option><?php
                     } 
                    ?>
                  </select>
                  <?php 
                }
                ?>
                <br>
                <button type="submit" class="btn btn-success">Submit</button><br>
                <?php echo $this->Form->end(); ?>
              </div>
            </div><br>
          </div>

          <?php   
          }
            
        }
      }
      ?>


      <div class="panel-footer">
        <div class="row">
          <div class="col-md-11">
            <?php echo $this->Html->link('Previous',array('controller'=>'Administrations','action'=>'invoice'),array('escape'=>false));?>
          </div>
          <div class="col-md-1">
            <?php echo $this->Html->link('Next',array('controller'=>'Administrations','action'=>'tickets'),array('escape'=>false));?>
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
                data: { menu_id : 7 },
            
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
                data: { menu_id : 7 },
            
                success: function(data)
                {
                      // location.reload();          
                }
            });
        }
    });
    
  });

</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#summernote').summernote({
      height: 350,
    });
});
</script>