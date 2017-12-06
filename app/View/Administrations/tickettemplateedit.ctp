<?php echo $this->Flash->render('positive'); ?>
<script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>

<div class="warper container-fluid" style="margin-bottom:100px;">
          
    <div class="page-header"><h1>Editing template</h1></div>
    <div class="row">
      <div class="col-md-8">
        <div class="row">
        <div class="col-xs-12 col-sm-12">
             #<?php echo $this->Html->link('Templates >',array('controller'=>'Administrations','action'=>'templates'),array('escape'=>false));?>
             <?php echo $this->Html->link('Ticket Templates >',array('controller'=>'Administrations','action'=>'tickettemplate'),array('escape'=>false));?>
              Simple Editor
        </div>
        </div><br>
        
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            
            <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'updatetickettemplate','class'=>"validator-form",'id'=>"wizardForm")); ?>   

              <div class="col-xs-12 col-sm-12">
                <div class="form-group">            
                  <?php echo $this->Form->input('Template.ticket_template', array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>false,'name'=>'ticket_template','value'=>$tickettemplate['Template']['ticket_template'])); ?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <?php echo $this->Form->button('Update Template', array('class' => 'btn btn-success pull-left')); ?>
                </div>
              </div>

            <?php echo $this->Form->end(); ?>
                
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-white">
              <div class="panel-heading">Available tags:</div>
              <div class="panel-body">
                <div class="list-group">
                  
                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{account_logo}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{account_address}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>
                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{account_city}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>
                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{account_state}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>
                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{account_zip}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>
                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{account_email}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>
                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{account_fullname}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>
                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{account_phone}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>
                  
                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{customer_fullname}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{ticket_address}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{ticket_city}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{ticket_state}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{ticket_zip}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{ticket_number}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{ticket_date}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{ticket_subject}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{ticket_disclaimer_template}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{every_comment_history}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{every_assets}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{every_custom_fields}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                </div>  
              </div>
        </div>
      </div>

        
    </div>
</div>

<script>
    CKEDITOR.replace( 'ticket_template' ,{
        
        height: 800,
        width: 750
    });
</script>