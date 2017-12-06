<link href="<?php echo $this->webroot.'Plugins/summernote-master/summernote.css'?>" rel="stylesheet" type="text/css"/>
<script src="<?php echo $this->webroot.'Plugins/summernote-master/summernote.min.js'?>"></script>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
<?php echo $this->element('frontenduser/sidebar2'); ?>
<?php  
$result = ""; 
$comment_history = '<div class="panel panel-default">
          <div class="panel-heading">Comment History</div>
          <div class="panel-body">
          <div class="row">  
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
            <table class="table table-striped table-bordered ticket-table">
            <thead>
                    <tr>    
                      <th>Date</th>
                      <th>Comment</th>
                    </tr>
                    </thead>
            <tbody>
          ';
$comment_history .= '</tbody>
                      </table>
                      </div>
                      </div>
                  </div></div></div>';
$every_ticket_assets =  '<div class="panel panel-default">
            <div class="panel-heading">Assets</div>
            <div class="panel-body">
            <div class="row">  
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
            <table class="table table-striped table-bordered ticket-table">
            <thead>
                    <tr>    
                      <th>Asset Name</th>
                      <th>Asset Serial Number</th>
                      <th>Type</th>
                      <th>Properties</th>
                    </tr>
                    </thead>
                    <tbody>'; 
           
$every_ticket_assets .= '</tbody></table></div></div></div></div></div>'; 


$every_ticket_custom_fields = '<div class="panel panel-default">
            <div class="panel-heading">Custom Fields</div>
            <div class="panel-body">
            <div class="row">  
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
            <table class="table table-striped table-bordered ticket-table">
                    <tbody>';
                    
$every_ticket_custom_fields .=  '</tbody></table></div></div></div></div></div>'; 

?>
<?php

if(!empty($tickettemplate))
{
  $template_data = $tickettemplate['Template']['ticket_template'];
  
  $find          = array('{{account_address}}','{{account_city}}', '{{account_state}}',' {{account_zip}}','{{account_phone}}','{{account_email}}','{{account_fullname}}','{{account_logo}}','{{customer_fullname}}','{{ticket_address}}','{{ticket_city}}','{{ticket_state}}','{{ticket_zip}}','{{ticket_number}}','{{ticket_date}}','{{ticket_subject}}','{{every_comment_history}}','{{every_assets}}','{{every_custom_fields}}','{{ticket_disclaimer_template}}');
  //pr($Disclaimer);die();
  
  if(!empty($Login_user) AND !empty($Ticket) AND !empty($Ticket_user) AND !empty($Disclaimer))
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

    $customer_fullname= $Ticket_user['User']['first_name'].' '.$Ticket_user['User']['last_name'];
    $ticket_address   = $Ticket_user['User']['address'];
    $ticket_city      = $Ticket_user['User']['city'];
    $ticket_state     = $Ticket_user['User']['state_country'];
    $ticket_zip       = $Ticket_user['User']['zip'];

    $ticket_number    = $Ticket['Ticket']['id'];
    $ticket_date      = date('D d-m-Y g:i A',strtotime($Ticket['Ticket']['created']));
    $ticket_subject   = $Ticket['Ticket']['title'];

    $ticket_disclaimer_template = $Disclaimer['Disclaimer']['ticket_disclaimer'];
    $every_comment_history      = $comment_history;
    $every_assets               = $every_ticket_assets;
    $every_custom_fields        = $every_ticket_custom_fields;
    //$replace        = array($first_name,$logo,'state','zip');
    
    $replace          = array($account_address,$account_city,$account_state,$account_zip,$account_phone,$account_email,$account_fullname,$account_logo,$customer_fullname,$ticket_address,$ticket_city,$ticket_state,$ticket_zip,$ticket_number,$ticket_date,$ticket_subject,$every_comment_history,$every_assets,$every_custom_fields,$ticket_disclaimer_template);
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
              <b><h2>Ticket Template</h2></b>
          </div>
        </div>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
             #<?php echo $this->Html->link('Templates >',array('controller'=>'Administrations','action'=>'templates'),array('escape'=>false));?>
                Ticket Templates 
          </div>
          
        </div>
        <br>
        
      
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
             <ul class="nav nav-tabs">
                <li class="active"><a href="#Preview" data-toggle="tab" class="select-tab">Preview Tickets Template</a></li>
                <li><a href="#Disclaimer" data-toggle="tab" class="select-tab">Ticket Disclaimer</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="Preview">
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                      <?php echo $this->Html->link('Reset Ticket Template',array('controller'=>'Administrations','action'=>'resettickettemplate'),array('escape'=>false,'class'=>'btn btn-success'));?>
                      <?php echo $this->Html->link('Edit Ticket Template',array('controller'=>'Administrations','action'=>'tickettemplateedit'),array('escape'=>false,'class'=>'btn btn-warning'));?>
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
                      
                      <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'updateticketdisclaimer','class'=>"validator-form",'id'=>"wizardForm")); ?>   

                        <div class="col-xs-12 col-sm-12">
                          <div class="form-group">            
                            <?php echo $this->Form->input('Disclaimer.ticket_disclaimer', array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>false,'id'=>'summernote','value'=>$Disclaimer['Disclaimer']['ticket_disclaimer'])); ?>
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