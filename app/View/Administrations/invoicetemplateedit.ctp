<?php echo $this->Flash->render('positive'); ?>
<script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>

<div class="warper container-fluid" style="margin-bottom:100px;">
          
    <div class="page-header"><h1>Editing Template</h1></div>
    <div class="row">
      <div class="col-md-8">
        <div class="row">
        <div class="col-xs-12 col-sm-12">
             #<?php echo $this->Html->link('Templates >',array('controller'=>'Administrations','action'=>'templates'),array('escape'=>false));?>
             <?php echo $this->Html->link('Invoice Templates >',array('controller'=>'Administrations','action'=>'invoicetemplate'),array('escape'=>false));?>
              Simple Editor
        </div>
        </div><br>
        
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            
            <?php echo $this->Form->create('Administrations',array('controller'=>'Administrations','action'=>'updateinvoicetemplate','class'=>"validator-form",'id'=>"wizardForm")); ?>   

              <div class="col-xs-12 col-sm-12">
                <div class="form-group">            
                  <?php echo $this->Form->input('Template.invoice_template', array('type'=>'textarea','class'=>'form-control','required'=>'required','label'=>false,'name'=>'invoice_template','value'=>$invoicetemplate['Template']['invoice_template'])); ?>
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
                    <input class="form-control" value="{{customer_billing_address}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{customer_billing_city}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{customer_billing_state}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{customer_billing_zip}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{invoice_number}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{invoice_date}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{invoice_balance_due}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{invoice_subtotal}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{invoice_tax}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{invoice_total}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{invoice_payments_amount}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{invoice_disclaimer}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{every_invoice_line_items}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{signature}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>

                  <a class="list-group-item list-group-item-action">
                    <input class="form-control" value="{{invoice_paid_stamp}}" onClick="this.select();" readonly="readonly" style="cursor: copy; border: 1px transparent solid;box-shadow: none; background-color: transparent;" type="text">
                  </a>
                  
                </div>  
              </div>
        </div>
      </div>

        
    </div>
</div>

<script>
    CKEDITOR.replace( 'invoice_template' ,{
        
        height: 800,
        width: 750
    });
</script>