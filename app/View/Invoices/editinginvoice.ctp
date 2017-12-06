<?php echo $this->Flash->render('positive'); ?>
  
<div class="warper container-fluid" style="margin-bottom:50px;">
  <div class="page-header"><h1 style="text-align: center;">Edit Invoice</h1></div>
    <div class="row">
        <div class="col-md-2">
        </div>  
        <div class="col-md-8">
                
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Invoice</div>
                <div class="panel-body"><br>
        
          <?php echo $this->Form->create('Invoice',array('controller'=>'Invoices','action'=>'editinginvoice' , 'method' => 'post')); ?>
          
          

          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
             
            <?php echo $this->Form->input('Invoice.inv_number', array('div'=>false,'class'=>'form-control','label'=>'Number','readonly' => 'readonly')); ?>
                   
            </div>
            </div>
          </div>

          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
                <?php echo $this->Form->input('Invoice.status', array('div'=>false,
                  'type'=>'checkbox','label'=>'Took Payment')); ?>
                   
            </div>
            </div>
          </div>
                  
           <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
                    
              
                  <?php echo $this->Form->input('Invoice.tax_rate', array('div'=>false,
                  'type'=>'checkbox','label'=>' Do Not Tax this invoice')); ?>
                  
            </div>
            </div>
          </div>
               

          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
                    
            <?php echo $this->Form->input('Invoice.created', array('type' => 'text','div'=>false,'class'=>'form-control','label'=>'Date','id'=>'invoice_date_label','data-altfield'=>'#invoice_date', 'readonly' => 'readonly')); ?>

            </div>
            </div>
          </div>

          <div class="row">                 
              <div class="col-xs-12 col-sm-12">
              <div class="form-group">
               
              <label class="control-label">Date Paid</label>
                                                  
                <div class='input-group date' id="datetimepicker1" >
                    <input type='text' class="form-control" name="Invoice[paid_date]" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

              </div>
              </div>
          </div>



          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
            <label>Related Ticket</label> 
            <?php echo $this->Form->select('Invoice.ticket_id',$Tickets,array('type' => 'select','div'=>false,'class'=>'form-control','label'=>'Related Ticket')); ?>
            
            </div>
            </div>
          </div>

          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
            <label>Related Estimate</label> 
            <?php echo $this->Form->select('Invoice.estimate_id',$Estimates,array('type' => 'select','div'=>false,'class'=>'form-control','label'=>'Related Estimate')); ?>
            
            </div>
            </div>
          </div>

          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
             
            <?php echo $this->Form->input('Invoice.tech_notes', array('type' => 'textarea','div'=>false,'class'=>'form-control','label'=>'Tech Notes (only if no ticket)')); ?>

            </div>
            </div>
          </div>

          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
             
            <?php echo $this->Form->input('Invoice.payment_method',array('type' => 'select','div'=>false,'class'=>'form-control', 'options' => array('cash' => 'Cash','credit card' => 'Credit Card','check' => 'Check','ofline cc' => 'Offline CC','quick' => 'Quick','store credit' => 'Store Credit')));?>
           
            </div>
            </div>
          </div>

        
        <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <?php echo $this->Form->input('Invoice.ref_number', array('div'=>false,'class'=>'form-control','label'=>'Ref Number/Check Number')); ?>
            </div>
            </div>
       </div>

       <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
      
                    <?php echo $this->Form->input('Invoice.payer_name', array('div'=>false,'class'=>'form-control','label'=>'Payer Name')); ?>
            </div>
            </div>
       </div>
        
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">        
          <hr class="dotted">
            
           <div class="btn-group">
              <?php echo $this->Form->button('Update Invoice', array('class' => 'btn btn-success pull-left')); ?>

            </div>
            <div class="btn-group">
              <?php echo $this->Html->link('Back',array('controller' => 'Invoices', 'action' => 'invoicelist'),array('class' => 'btn btn-default','escape'=>false));?>
            </div>
          </div>
        </div>
              
                       
    </div>    
        <?php echo $this->Form->end(); ?>

      
          
        
               
      </div>
        
    </div>


  </div>
</div>


        <!-- Page Plugins --> 

<script src="<?php echo $this->webroot.'js/jquery/jquery-1.9.1.min.js'?>"></script>
<script type="text/javascript">

$(function() {
    $("#datetimepicker1").datetimepicker();
    $("#datetimepicker2").datetimepicker();
});


</script>