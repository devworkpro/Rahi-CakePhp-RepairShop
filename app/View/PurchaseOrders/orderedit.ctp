<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid">
  <div class="page-header"><h1>Edit Order<?php echo $this->Html->link('<i class="fa fa-arrow-left"></i>Back',array('controller' => 'orders', 'action' => 'orderlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></h1>
          
        
  </div>
        <div class="row">
          
            <div class="col-md-12">
                
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Order</div>
                <div class="panel-body">
        
          
          <table class="table table-bordered table-striped dataTable no-footer">      
            <tr><th>product Name</th>
              <td><?php echo $order['Order']['product_name']; ?></td>
            </tr>
            <tr><th>Amount</th>
              <td><?php echo '$',$amount = $order['Order']['amount']; ?></td>
            </tr>
            <tr><th>Quantity</th>
              <td><?php echo $quantity = $order['Order']['quantity']; ?></td>
            </tr>
            <tr><th>Total Amount</th>
              <td><?php echo  '$',$quantity*$amount; ?></td>
            </tr>
       
            <tr><td colspan="2">
             <?php echo $this->Html->link('Show',array('controller' => 'orders', 'action' => 'orderview',$order['Order']['id']),array('escape'=>false,'class'=>'btn btn-success pull-left'));?>
             </td>
             </tr>
          </table>
                  
                   
        
        <div class="row">                 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <div id="newDiv"></div>
            </div>
          </div>
        </div>
        <br>
        
      
          
        
               
      </div>
        
    </div>


  </div>
</div>
</div>
        <!-- Page Plugins --> 

<script type="text/javascript">
$(document).ready(function(){
  $('#get_data').change(function(){
    var prd_id = $(this).val();
      //alert(prd_id);
      $.ajax({
            type: 'POST',
            url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/admin/Orders/order/",

         
            data: { id: prd_id },
          success: function(data) {
           $('#newDiv').html(jQuery(data).find('.result').html()); 
            //   alert("Success: " + data);
        //    $('#newDiv').html(data);    
           

          
           }
      });
  });
});



</script>


