
<style type="text/css">
  .status {
    display: inline-block;
    float: left;
    margin: 0px 10px 0px 0px !important;
}
</style>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:40px;">
  <?php echo $this->element('frontenduser/sidebar2'); ?>
  <div class="col-xs-9">
  <?php echo $this->Flash->render('positive');?>
    <div class="panel panel-white">
      
      <div class="panel-body">
        <div class="row">  
          <div class="col-md-9" style="margin-top: -20px;">
              <b><h2>Template Customization</h2></b>
          </div>
        </div><br>
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <p class="widget-content">Here you are able to select pre-made templates and even edit the raw HTML for 100% control over how your brand is presented via RepairShopr.</p>
          </div>
        </div>
      
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <div class="list-group">
              <?php echo $this->Html->link('<h3 class="list-group-item-heading">Invoice Template</h3>',array('controller'=>'Administrations','action'=>'invoicetemplate'),array('escape'=>false,'class'=>'list-group-item'));?><br>
              <?php echo $this->Html->link('<h3 class="list-group-item-heading">Ticket Template</h3>',array('controller'=>'Administrations','action'=>'tickettemplate'),array('escape'=>false,'class'=>'list-group-item'));?><br>
              <?php echo $this->Html->link('<h3 class="list-group-item-heading">Estimate Template</h3>',array('controller'=>'Administrations','action'=>'estimatetemplate'),array('escape'=>false,'class'=>'list-group-item'));?><br>

            
            </div>
          </div>
          
        </div>
      </div>
    
    </div>
  </div>
</div>
