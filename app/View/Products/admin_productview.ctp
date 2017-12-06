<?php echo $this->Flash->render('positive'); ?>
<?php //pr($user);die();
//die($user['User']['id']);
?>
<div class="warper container-fluid" style="margin-bottom:50px;">
<div class="page-header"><h1>Product Details <span><?php echo $this->Html->link('<i class="fa fa-arrow-left"></i> Back',array('controller' => 'products', 'action' => 'productlist'),array('escape'=>false,'class'=>'btn btn-default pull-right'));?></span></h1></div>
<div class="panel panel-default">
                    <div class="panel-heading">Product View</div>
                    <div class="panel-body">
  
<table class="table table-bordered table-striped dataTable no-footer">      
    <tr><th>Name</th>
    <td><?php echo $product['Product']['product_name']; ?></td></tr>
    
    <tr><th>Category</th>
    <td><?php echo $product['Product']['category']; ?></td></tr>
    <tr><th>Description</th>
    <td><?php echo $product['Product']['description']; ?></td></tr>
    <tr><th>Cost Price</th>
    <td><?php echo '$',$product['Product']['price_cost']; ?></td></tr>
     <tr><th>Retail Price</th>
    <td><?php echo '$',$product['Product']['price_retail']; ?></td></tr>
     <tr><th>Quantity</th>
    <td><?php echo $product['Product']['quantity']; ?></td></tr>
   
	 <tr><th>UPC Code</th>
    <td><?php echo $product['Product']['upc_code']; ?></td></tr>
   <tr><th>Warranty</th>
    <td><?php echo $product['Product']['warranty_template']; ?></td></tr>
<tr><th>Notes</th>
    <td><?php echo $product['Product']['notes']; ?></td></tr>
   



   
    <tr><td colspan="2"><?php echo $this->Html->link('Edit',array('controller'=>'products','action'=>'productedit',$product['Product']['id']),array('class'=>'btn btn-primary','escape'=>false));?>&nbsp;&nbsp;
         <?php echo $this->Html->link('Back',array('controller' => 'products', 'action' => 'productlist'),array('class'=>'btn btn-default','escape'=>false));?>
    </td> 
    </tr>   
    
 </table>
 </div><!-- /.box-body -->
  </div><!-- /.box -->
  </div>
 

  