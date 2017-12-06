<?php echo $this->Flash->render('positive'); ?>

  <div class="warper container-fluid">
  <div class="page-header"><h1>Edit Appointment<span class="pull-right"><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i>Back',array('controller'=>'Appointments','action'=>'appointmentlist'),array('escape'=>false,'class'=>'btn btn-default m-b-sm'));?>
      </span> </h1></div>
        <div class="row">
          
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Appointment</div>
                <div class="panel-body"><br>
        
                <?php echo $this->Form->create('Appointment',array('controller'=>'Appointments','action'=>'appointmentedit')); ?>
              
                  <div class="row">  
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php $customer= $User['User']['first_name'].' '.$User['User']['last_name'];?>
                      <?php echo $this->Form->input('Appointment.customer', array('type'=>'text','class'=>'form-control','label'=>"Customer", 'value'=>$customer ,'disabled'=>'disabled')); ?>
                    
                    </div>
                    </div>
            
            
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                          
                      <?php echo $this->Form->input('Appointment.address', array('class'=>'form-control','label'=>"Location")); ?>
                  
                    </div>  
                    </div>
                  </div>


                  <div class="row">  
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php echo $this->Form->input('Appointment.summary', array('type'=>'text','class'=>'form-control','label'=>"Summary")); ?>
                     
                    </div>
                    </div>
            
            
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                    <label>Start At</label>
                      <div class='input-group date' id="datetimepicker1" >
                          <?php echo $this->Form->input('Appointment.start_at', array('class'=>'form-control','div'=>false, 'label'=>false)); ?>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                      </div>
                           
                  
                    </div>  
                    </div>
                  </div>


                  <div class="row">  
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <?php echo $this->Form->input('Appointment.description', array('type'=>'textarea','class'=>'form-control','label'=>"Description")); ?>
                     
                    </div>
                    </div>
            
            
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label>End At</label>
                      <div class='input-group date' id="datetimepicker2" >  
                        <?php echo $this->Form->input('Appointment.end_at', array('class'=>'form-control','label'=>"Location",'label'=>false, 'div'=>false)); ?>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                          
                    </div>  
                    </div>
                  </div>


                  <div class="row">  
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                    
                     
                    </div>
                    </div>
            
            
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                          
                          <?php echo $this->Form->input('Appointment.attendees', array('class'=>'form-control select','label'=>"Attendees" ,'disabled'=>'disabled')); ?>
                                            
                    </div>  
                    </div>
                  </div>


                  <div class="row">  
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                     
                     
                    </div>
                    </div>
            
            
                    <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                          
                           <?php echo $this->Form->input('Appointment.owner', array('class'=>'form-control','label'=>"Owner" ,'disabled'=>'disabled')); ?>
                  
                    </div>  
                    </div>
                  </div>

                  <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                      <div class="btn-group">
                        <?php echo $this->Form->button('Update Appointment', array('class' => 'btn btn-success pull-left')); ?>
                      </div>
                    </div>
                  </div>
                       
         
                  <div class="row">                 
                    <div class="col-xs-12 col-sm-12">
                      <hr class="dotted">
                      <div class="btn-group">
                        <?php echo $this->Html->link('Show',array('controller' => 'Appointments', 'action' => 'appointmentdetails',$Appointment['Appointment']['id']),array('escape'=>false));?>   |   
                        <?php echo $this->Html->link('Back',array('controller' => 'Appointments', 'action' => 'appointmentlist'),array('escape'=>false));?>
                      </div>
                    </div>
                  </div>
                      
                </div>   
                <?php echo $this->Form->end(); ?>

                </div>
        
            </div>
        </div>
</div>

<script src="<?php echo $this->webroot.'js/jquery/jquery-1.9.1.min.js'?>"></script>      
<script type="text/javascript">

$(function() {
    $("#datetimepicker1").datetimepicker();
    $("#datetimepicker2").datetimepicker();
});


</script>