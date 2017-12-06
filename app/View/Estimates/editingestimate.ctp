<?php echo $this->Flash->render('positive'); ?>
  
<div class="warper container-fluid" style="margin-bottom:50px;">
  <div class="page-header"><h1 style="text-align: center;">Edit Estimate</h1></div>
    <div class="row">
         <div class="col-md-2">
         </div> 
        <div class="col-md-8">
                
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Estimate</div>
                <div class="panel-body"><br>
        
          <?php echo $this->Form->create('Estimate',array('controller'=>'Estimates','action'=>'editingestimate' , 'method' => 'post')); ?>
          
           <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
                    
            <?php echo $this->Form->input('Estimate.created', array('type' => 'text','div'=>false,'class'=>'form-control string optional form-control datepicker hasDatepicker','label'=>'Estimate Date','id'=>'Estimate_date_label','data-altfield'=>'#Estimate_date','disabled' => 'disabled')); ?>

            </div>
            </div>
          </div>

          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
             
            <?php echo $this->Form->input('Estimate.est_number', array('div'=>false,'class'=>'form-control','label'=>'Number')); ?>
                   
            </div>
            </div>
          </div>
                  
           <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
                    
              
                  <?php echo $this->Form->input('Estimate.tax_rate', array('div'=>false,
                  'type'=>'checkbox','label'=>' Do Not Tax this Estimate')); ?>
                  
            </div>
            </div>
          </div>
             

          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
            <label>Related Ticket</label>
            <?php echo $this->Form->select('Estimate.ticket_id',$Tickets, array('type' => 'select','div'=>false,'class'=>'form-control','label'=>'Related Ticket')); ?>
             
            </div>
            </div>
          </div>

          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
            <label>Related Invoice</label>
            <?php echo $this->Form->select('Estimate.invoice_id',$Invoices, array('type' => 'select','div'=>false,'class'=>'form-control','label'=>'Related Invoice')); ?>
             
            </div>
            </div>
          </div>

          <div class="row">                 
            <div class="col-xs-12 col-sm-12">
            <div class="form-group">
             
            <?php echo $this->Form->input('Estimate.tech_notes', array('type' => 'textarea','div'=>false,'class'=>'form-control','label'=>'Tech Notes (only if no ticket)')); ?>

            </div>
            </div>
          </div>

                 
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">        
          <hr class="dotted">
            
           <div class="btn-group">
              <?php echo $this->Form->button('Update Estimate', array('class' => 'btn btn-success pull-left')); ?>

            </div>
            <div class="btn-group">
              <?php echo $this->Html->link('Back',array('controller' => 'Estimates', 'action' => 'estimatelist'),array('class' => 'btn btn-default','escape'=>false));?>
            </div>
          </div>
        </div>
              
                       
    </div>    
        <?php echo $this->Form->end(); ?>

      
          
        
               
      </div>
        
    </div>


  </div>
</div>




<script type="text/javascript">
$(document).ready(function() {
        $('.datepicker').datepicker({
        format: "dd-mm-yyyy",
        todayBtn: "linked",
        orientation: "bottom right",
        autoclose: true,
        todayHighlight: true
    });
});
</script>


<script type="text/javascript">


    $(function() {
        $('.timepicker').each(function(i,obj) {
            $(obj).datetimepicker({
                hour: 8,
                stepMinute: 15,
                timeFormat: 'hh:mm tt',
                dateFormat: 'mm-dd-yy',
                // timezoneList: { label: 'foobar', value: -700 },
                // parse: 'loose', // unnecessary risk ( m/d vs d/m and 'loose' process before 'strict'
                altField: $(obj).data('altfield'),
                altFieldTimeOnly: false,
                altFormat: 'mm/dd/yy',
                altTimeFormat: "hh:mm tt"
            });
        });

        $('.timepickerPrecise').each(function(i,obj) {
            $(obj).datetimepicker({
                hour: 8,
                stepMinute: 1,
                timeFormat: 'hh:mm tt',
                dateFormat: 'mm-dd-yy',
                altField: $(obj).data('altfield'),
                altFieldTimeOnly: false,
                altFormat: 'mm/dd/yy',
                altTimeFormat: "hh:mm tt"
            });
        });

        $('.datepicker').each(function(i,obj) {
            $(obj).datepicker({
                dateFormat: 'mm-dd-yy',
                altField: $(obj).data('altfield'),
                altFormat: 'yy/mm/dd'
            });
        });

        $('.datetimepicker-standard').each(function(i,obj) {
            $(obj).datetimepicker({
                hour: 8,
                stepMinute: 15,
                timeFormat: 'hh:mm tt',
                dateFormat: 'mm-dd-yy',
                altField: $(obj).data('altfield'),
                altFieldTimeOnly: false,
                altFormat: 'yy/mm/dd',
                altTimeFormat: "hh:mm tt"
            });
        });
    });
</script>