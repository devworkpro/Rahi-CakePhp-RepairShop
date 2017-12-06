<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom: 30px;">
    <div class="row">
        <div class="col-md-2">
            
        </div>
    

        <div class="col-md-8">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">  
                        <div class="col-md-9">
                            <h2>Editing item</h2>
                        </div>
                        <div class="col-md-3">
                            <?php echo $this->Html->link('<p class="btn btn-warning right">New RMA</p>',array('controller'=>'Rmas','action'=>'add'),array('escape'=>false));?> 
                        </div>
                        
                    </div><br>

                    <?php echo $this->Form->create('Part',array('controller'=>'Parts','action'=>'partedit','id'=>"wizardForm")); ?>
                        
            

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Part.part_url', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Part URL')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Part.quantity', array('type'=>'number','div'=>false,'class'=>'form-control','required'=>'required','label'=>'Quantity')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Part.cost', array('type'=>'number','div'=>false,'class'=>'form-control','required'=>'required','label'=>'Our Cost')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Part.retail', array('type'=>'number','div'=>false,'class'=>'form-control','required'=>'required','label'=>'Retail for our Customer')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <input type="checkbox" name="Part[tax]"><label>&nbsp;  Taxable</label>  <br>        
                            
                            </div>
                        </div>
                    </div>



                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Part.description', array('div'=>false,'class'=>'form-control','required'=>'required','label'=>'Description')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Part.shipping', array('div'=>false,'class'=>'form-control','label'=>'Shipping')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Part.store', array('div'=>false,'class'=>'form-control','id'=>'get_data','label'=>'Destination Store')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Part.tracking_number', array('div'=>false,'class'=>'form-control','label'=>'Tracking Number')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group">
                        
                            <?php echo $this->Form->input('Part.notes', array('type'=>'textarea','div'=>false,'class'=>'form-control','label'=>'Notes')); ?>
                            
                            </div>
                        </div>
                    </div>

                    <div class="row"> 

                        <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                        <label>Ordered:</label>
                          <div class='input-group date' id="datetimepicker1" >
                              <?php echo $this->Form->input('Part.orderd', array('class'=>'form-control','div'=>false,'required'=>'required', 'label'=>false)); ?>
                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                          </div>
                               
                      
                        </div>  
                        </div>  
                                  
                    </div>

                    <div class="row"> 
                        
                        <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                        <label>Received:</label>
                          <div class='input-group date' id="datetimepicker2" >
                              <?php echo $this->Form->input('Part.received', array('class'=>'form-control','div'=>false,'required'=>'required', 'label'=>false)); ?>
                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                          </div>
                               
                      
                        </div>  
                        </div>
                    </div>


                    <div class="row">                 
                        <div class="col-xs-12 col-sm-12">
                        <hr class="dotted"> 
                            <div class="btn-group">
                                <?php echo $this->Form->button('Update Item', array('class' => 'btn btn-success pull-left')); ?>
                            </div><br><br>

                            <?php echo $this->Html->link('Back',array('controller' => 'Parts', 'action' => 'partlist'),array('escape'=>false));?>
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

<script src="<?php echo $this->webroot.'js/jquery/jquery-1.9.1.min.js'?>"></script>
<script type="text/javascript">

$(function() {
    $("#datetimepicker1").datetimepicker();
    $("#datetimepicker2").datetimepicker();
});


</script>