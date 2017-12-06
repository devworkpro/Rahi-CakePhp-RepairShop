<link href="<?php echo $this->webroot.'Plugins/summernote-master/summernote.css'?>" rel="stylesheet" type="text/css"/>
<script src="<?php echo $this->webroot.'Plugins/summernote-master/summernote.min.js'?>"></script>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
<div class="signature_value_div" style="display: none;">
<?php if(!empty($Estimate)){
echo $signature = $Estimate['Estimate']['signature'];
}?>
</div>
<?php echo $this->element('frontenduser/sidebar2'); ?>
<?php
$result = '';
$Line_Items = '<div class="panel panel-default">
          <div class="panel-body">
          <div class="row">  
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
            <table class="table table-striped table-bordered ticket-table">
            <thead>
                    <tr>    
                      <th>Item</th>
                      <th>Description</th>
                      <th>Unit Cost</th>
                      <th>Quantity</th>
                      <th>Line Total</th>
                    </tr>
                    </thead>
            <tbody>
          ';


$Line_Items .= '</tbody>
                      </table>
                      </div>
                      </div>
                  </div></div></div>';


$User_Signature = '';
                if(!empty($Estimate)){
                if($Estimate['Estimate']['signature']!=''){
$User_Signature .='<div class="pdfsigPadValue" style="width:400px;">  
                   <canvas height="110" width="398"></canvas>
                </div>' ;                     
                }
                }
$User_Signature .='<label for=""> Signed : </label>';                  
if(!empty($estimatetemplate))
{
  //pr($estimatetemplate);die();
  $template_data = $estimatetemplate['Template']['estimate_template'];
  $result        = '';
  $find          = array('{{account_address}}','{{account_city}}', '{{account_state}}',' {{account_zip}}','{{account_phone}}','{{account_email}}','{{account_fullname}}','{{account_logo}}','{{customer_fullname}}','{{customer_billing_address}}','{{customer_billing_city}}','{{customer_billing_state}}','{{customer_billing_zip}}','{{estimate_number}}','{{estimate_date}}','{{estimate_total}}','{{estimate_subtotal}}','{{estimate_tax}}','{{estimate_stamp}}','{{every_estimate_line_items}}','{{estimate_disclaimer}}','{{signature}}');

  //pr($Disclaimer);die();
  
  if(!empty($Login_user) AND !empty($Estimate) AND !empty($Estimate_user) AND !empty($Disclaimer))
  {
    $first_name       = $Login_user['User']['first_name'];
    $last_name        = $Login_user['User']['last_name'];
    $account_fullname = $first_name.' '.$last_name;

    $logo_name        = $Login_user['User']['logo'];
    $logo_full_path   = $this->webroot.'img/logo/'.$logo_name;
    $account_logo     = '<img src="'.$logo_full_path.'" alt="Cover"  width="100" height="100">';

    $account_address  = $Login_user['User']['address'];
    $account_city     = $Login_user['User']['city'];
    $account_state    = $Login_user['User']['state_country'];
    $account_zip      = $Login_user['User']['zip'];
    $account_phone    = $Login_user['User']['phone_number'];
    $account_email    = $Login_user['User']['email'];

    $customer_fullname= $Estimate_user['User']['first_name'].' '.$Estimate_user['User']['last_name'];
    $customer_billing_address   = $Estimate_user['User']['address'];
    $customer_billing_city      = $Estimate_user['User']['city'];
    $customer_billing_state     = $Estimate_user['User']['state_country'];
    $customer_billing_zip       = $Estimate_user['User']['zip'];

    $estimate_number    = $Estimate['Estimate']['est_number'];
    $estimate_date      = date('D d-m-Y g:i A',strtotime($Estimate['Estimate']['created']));
    

    $estimate_subtotal = $Estimate['Estimate']['total'];

    $estimate_tax = $Estimate['Estimate']['tax_rate'];
    
    $estimate_total = $estimate_subtotal + $estimate_tax;

    $paid_stamp_full_path   = $this->webroot.'img/approved.png';
    $estimate_stamp = '<img src="'.$paid_stamp_full_path.'" alt="Cover"  width="250" height="50">';

    $every_estimate_line_items = $Line_Items;
    $estimate_disclaimer_template = $Disclaimer['Disclaimer']['estimate_disclaimer'];


    $signature = $User_Signature;
    //$replace        = array($first_name,$logo,'state','zip');
    $replace          = array($account_address,$account_city,$account_state,$account_zip,$account_phone,$account_email,$account_fullname,$account_logo,$customer_fullname,$customer_billing_address,$customer_billing_city,$customer_billing_state,$customer_billing_zip,$estimate_number,$estimate_date,'$'.$estimate_total,'$'.$estimate_subtotal,'$'.$estimate_tax,$estimate_stamp,$every_estimate_line_items,$estimate_disclaimer_template,$signature);
    //pr($replace);die();
    $result         = str_replace($find,$replace,$template_data);
  }
}    
  ?>
  <div class="col-xs-9">
  <?php echo $this->Flash->render('positive');?>
    <div class="panel panel-white">
      
      <div class="panel-body">
        <div class="row">  
          <div class="col-md-9" style="margin-top: -20px;">
              <b><h2>Estimate Template</h2></b>
          </div>
        </div>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
             #<?php echo $this->Html->link('Templates >',array('controller'=>'Administrations','action'=>'templates'),array('escape'=>false));?>
                Estimate Templates 
          </div>
          
        </div>
        <br>
        
      
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
             <ul class="nav nav-tabs">
                <li class="active"><a href="#Preview" data-toggle="tab" class="select-tab">Preview Estimate Template</a></li>
                <li><a href="#Disclaimer" data-toggle="tab" class="select-tab">Estimate Disclaimer</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="Preview">
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                      <?php echo $this->Html->link('Reset Estimate Template',array('controller'=>'Administrations','action'=>'resetestimatetemplate'),array('escape'=>false,'class'=>'btn btn-success'));?>
                      <?php echo $this->Html->link('Edit Estimate Template',array('controller'=>'Administrations','action'=>'estimatetemplateedit'),array('escape'=>false,'class'=>'btn btn-warning'));?>
                      <!-- <?php echo $this->Html->link('version History',array('controller'=>'Administrations','action'=>'#'),array('escape'=>false,'class'=>'btn btn-default'));?> -->
                    </div>
                  </div><br>
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                     
                      <?php echo $result;?>
                      
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="Disclaimer">
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                      
                      <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'updateestimatedisclaimerTemplate','class'=>"validator-form",'id'=>"wizardForm")); ?>   

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
            </div>
          </div>
          
        </div>
      </div>
    
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#summernote').summernote({
      height: 350,
    });
});
</script>

<!-- Signature Pad -->

<link href="<?php echo $this->webroot.'signature_pad/jquery.signaturepad.css'?>" rel="stylesheet"/>
<script src="<?php echo $this->webroot.'signature_pad/numeric-1.2.6.min.js'?>"></script>

<script src="<?php echo $this->webroot.'signature_pad/bezier.js'?>"></script>

<script src="<?php echo $this->webroot.'signature_pad/jquery.signaturepad.js'?>"></script>

<script src="<?php echo $this->webroot.'signature_pad/json2.min.js'?>"></script>
<script>
    $(document).ready(function() {
      $('#linear').signaturePad({drawOnly:true, lineTop:200});
      $('#smoothed').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:200});
      $('#smoothed-variableStrokeWidth').signaturePad({drawOnly:true, drawBezierCurves:true, variableStrokeWidth:true, lineTop:200});
    });

    var sig = $('.signature_value_div').text();
    
    $(document).ready(function () {
      if(sig!='')
      {
        $('.pdfsigPadValue').signaturePad({displayOnly:true}).regenerate(sig);
      }
  });
</script> 