<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 30px;">
    

    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Editing RMA</h2>
                    <?php echo $this->Form->create('Rma',array('controller'=>'Rmas','action'=>'rmaedit')); ?>
                        
                    
                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <?php echo $this->Form->input('Rma.customer_name', array('div'=>false,'class'=>'form-control','placeholder' => "Start typing the customer's name",'id'=>'get_data','label'=>'Customer Name','required'=>'required')); ?>
                                <div id="result"></div>
                                
                            </div>
                        </div>
                    </div>  

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <label>Vendor</label>
                                <?php echo $this->Form->select('Rma.vendor_id',$Vendor,array("escape"=>false,'class'=>'form-control','label'=>'Vendor')); ?>
                            
                            
                            </div>
                        </div>
                    </div> 

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Rma.vendor_name', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Quantity','label'=>'or - Vendor Name')); ?>
                            
                            </div>
                        </div>
                    </div>
                
                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Rma.item_description', array('type'=>'textarea','div'=>false,'class'=>'form-control','required'=>'required','label'=>'Item/Description')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Rma.status', array('options' => array('new' => 'New','waiting for RMA' => 'Waiting for RMA','return shipped' => 'Return Shipped','waiting for refund' => 'Waiting for Refund','resolved' => 'Resolved'),'class'=>'form-control','label'=>'Status')); ?>
                            </div>
                        </div>
                    </div>

                 

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Rma.reason', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Reason')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Rma.notes', array('type'=>'textarea','div'=>false,'class'=>'form-control','required'=>'required','label'=>'Notes')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Rma.tracking_number', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Tracking Number')); ?>     
                            
                            </div>
                        </div>
                    </div>

                   
                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <?php echo $this->Form->input('Rma.submitted', array('div'=>false,'class'=>'form-control date-picker','required'=>'required','label'=>'Submitted On')); ?>
                            
                            </div>
                        </div>
                    </div>


                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                                <?php echo $this->Form->input('Rma.returned', array('div'=>false,'class'=>'form-control date-picker','required'=>'required','label'=>'Returned On')); ?>


                            </div>
                        </div>
                    </div>


                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                            
                                <input type="checkbox" name="Rma[breakage]"><label>&nbsp;  Breakage (just report as loss) </label>  <br>

                            </div>
                        </div>
                    </div>

                


                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                        <hr class="dotted"> 
                            <div class="btn-group">
                                <?php echo $this->Form->button('Update RMA', array('class' => 'btn btn-success pull-left')); ?>
                            </div><br><br>

                            <?php echo $this->Html->link('Show',array('controller' => 'Rmas', 'action' => 'rmadetails',$Rma['Rma']['id']),array('escape'=>false));?>
                           
                            |  
                            <?php echo $this->Html->link('Back',array('controller' => 'Rmas', 'action' => 'rmalist'),array('escape'=>false));?>
                        </div>
                    </div>      
                    <?php echo $this->Form->end(); ?>   
                </div>
            </div>
        </div>


        <div class="col-md-2">
            
        </div>


    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#get_data').keyup(function(){

        var searchid = $(this).val();
        var dataString = searchid;
        //alert(dataString); die();
        if(searchid!='')
        {
               $.ajax({
               type: "POST",
               url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Rmas/rma/",

              // url: "search.php",
               data: { search : dataString },
            
               success: function(data)
               {
                  $("#result").html(jQuery(data).find('.result').html()); 
                //  $('#newDiv').html(jQuery(data).find('.result').html()); 
              }
              });
        }return false;    

    });
});
</script>