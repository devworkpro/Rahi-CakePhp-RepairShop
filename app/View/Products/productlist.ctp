<?php echo $this->Flash->render('positive'); ?>
<div class="warper container-fluid" style="margin-bottom:50px; margin-top:10px;"> 
<div class="page-header">
    <h2>Product List 
    <span class="pull-right">
    <?php echo $this->Html->link('<p class="btn btn-success btn-sm">Add New Product</p>',array('controller'=>'Products','action'=>'add'),array('escape'=>false,));?>
        <div class="btn-group">
            <a class="btn btn-default btn-sm dropdown-toggle" href="#" data-toggle="dropdown">Inventory Modules <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><?php echo $this->Html->link('<p class="menu-default">Purchase Orders</p>',array('controller'=>'PurchaseOrders','action'=>'purchaseorderlist'),array('escape'=>false));?></li>
                <li><?php echo $this->Html->link('<p class="menu-default">Vendors</p>',array('controller'=>'Vendors','action'=>'vendorlist'),array('escape'=>false));?></li>
            </ul>
        </div>
    </span> 

    
    </h2>
</div>
    
    <div class="panel panel-white" >
        <div class="panel-heading clearfix">
            <h4 class="panel-title">All Products</h4>
            
          
        </div>

        <div class="panel-body">
            
            <div class="table-responsive">
            <table id="example"  class="display table" style="width: 100%; cellspacing: 0; ">
                <thead>
                  <tr>    
                    <th>#</th>              
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Cost</th>
                    <th>Retail</th>   
                    <th>Maintain Stock</th> 
                    <th>Quantity</th>
                    <th>UPC Code</th>
                   
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>    
                    <th>#</th>              
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Cost</th>
                    <th>Retail</th>   
                    <th>Maintain Stock</th> 
                    <th>Quantity</th>
                    <th>UPC Code</th>
                   
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php $counter=0;?>
                  <?php foreach($products as $product) {
                  $row_id =  ++$counter; ?>
                    <?php $product_id = $product['Product']['id']?>                
                  <tr class="odd">
                    <td><?php echo $row_id;?> </td>
                    <td><?php $product_name = $product['Product']['product_name'];?>
                        <?php echo $this->Html->link(ucfirst($product_name),array('controller'=>'products','action'=>'productview',$product['Product']['id']),array('escape'=>false));?>
                    </td>
                    <td><?php echo $product['Product']['description'];?></td>
                    <td>
                        <div class="price_cost price_cost_<?php echo $row_id; ?>">
                            <?php $cost = $product['Product']['price_cost'];?>
                            <span id="<?php echo $row_id; ?>" class="cost price_cost_data_<?php echo $row_id; ?> best_in_place"><?php echo '$'.$cost.'.00';?>
                            </span>
                            
                        </div>
                        <div style="display:none;" class="price_cost_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                            <form class="place" action="javascript:void(0);">
                            <input type="text" name="price" id="cost_<?php echo $row_id;?>" value="<?php echo $cost;?>" class="form-control" onkeypress='return isNumber(event)' required>
                            <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $product_id;?>">
                            <input class="submitcost btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                            <input class="canclecost btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="price_retail price_retail_<?php echo $row_id; ?>">
                            <?php $retail = $product['Product']['price_retail'];?>
                            <span id="<?php echo $row_id; ?>" class="retail price_retail_data_<?php echo $row_id; ?> best_in_place"><?php echo '$'.$retail.'.00';?>
                            </span>
                            
                        </div>
                        <div style="display:none;" class="price_retail_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                            <form class="place" action="javascript:void(0);">
                            <input type="text" name="price" id="retail_<?php echo $row_id;?>" value="<?php echo $retail;?>" class="form-control" onkeypress='return isNumber(event)' required>
                            <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $product_id;?>">
                            <input class="submitretail btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                            <input class="cancleretail btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                            </form>
                        </div>
                    </td>


                    <td><?php  $stock=$product['Product']['maintain_stock'];
                        if($stock=='1'){echo "true";}else{echo "false";}?></td>
                    
                    <td>
                        <div class="quantity_<?php echo $row_id; ?>">
                            <?php $qty= $product['Product']['quantity'];?>
                            <span id="<?php echo $row_id; ?>" class="qty qty_data_<?php echo $row_id; ?> best_in_place"><?php echo $qty;?>
                            </span>
                            
                        </div>
                        <div style="display:none;" class="qty_edit_<?php echo $row_id;?>" id="<?php echo $row_id; ?>" >
                            <form class="place" action="javascript:void(0);">
                            <input type="text" class="form-control" name="price" id="qty_<?php echo $row_id;?>" value="<?php echo $qty;?>" onkeypress='return isNumber(event)' required>
                            <input type="hidden"  id="id_<?php echo $row_id;?>" value="<?php echo $product_id;?>">
                            <input class="submitqty submitqty_<?php echo $row_id; ?> btn btn-success" type="button" value="Save" id="<?php echo $row_id; ?>">
                            <input class="cancle btn btn-default" type="button" value="Cancel" id="<?php echo $row_id; ?>">
                            </form>
                        </div>
                    </td>




                    <td><?php echo $product['Product']['upc_code'];?></td>
                    
                    <td>
                        <?php echo $this->Html->link('<i class="btn btn-primary fa fa-edit"></i>',array('controller'=>'products','action'=>'productedit',$product['Product']['id']),array('escape'=>false));?>
                                  
                        <?php echo $this->Html->link('<i class="btn btn-danger fa fa-remove"></i>',array('controller' => 'products', 'action' => 'deleteproduct',$product['Product']['id']),array('escape'=>false,'confirm' => 'Are you sure you wish to delete this Product?'));?>

                        <?php echo $this->Html->link('<i class="btn btn-success fa fa-eye"></i>',array('controller'=>'products','action'=>'productview',$product['Product']['id']),array('escape'=>false));?>
                    
                    </td>
                  </tr>    
                  <?php } ?>    
        
                </tbody>
            </table>  
            </div>
        </div>
    </div>
</div>  


<!-- IS Number -->

<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;

    }
    return true;
}
</script>


<!-- Update Quantity -->

<script>
$(document).ready(function() {
  
    $(document).on('click', '.qty', function() {
        id = $(this).attr('id');
        $(".qty_edit_"+id).show();
        $(".quantity_"+id).hide();
    });
    
    $(document).on('click', '.cancle', function() {
        id = $(this).attr('id');
        $(".qty_edit_"+id).hide();
        $(".quantity_"+id).show();
    });   
   
    $(document).on('click', '.submitqty', function() {
        id = $(this).attr('id');
        var qty = $('#qty_'+id).val();
        var product_id = $('#id_'+id).val();
        //alert(qty);
        //alert(product_id);die();
        
        if(qty!='')
        {
            $.ajax({
            type: "POST",
            url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Products/updateproductquantity/",
            data: { qty : qty , product_id:product_id},
            success: function(data)
                    {
                        $(".qty_edit_"+id).hide();
                        $(".qty_data_"+id).empty();
                        $(".qty_data_"+id).append(qty);
                        $(".quantity_"+id).show();
                    }
            });
        }return false;  
    });
    
});
</script>


<!-- Update Cost -->

<script>
$(document).ready(function() {
  
    $(document).on('click', '.cost', function() {
        id = $(this).attr('id');
        $(".price_cost_edit_"+id).show();
        $(".price_cost_"+id).hide();
    });

    $(document).on('click', '.canclecost', function() {
        id = $(this).attr('id');
        $(".price_cost_edit_"+id).hide();
        $(".price_cost_"+id).show();
    }); 

    $(document).on('click', '.submitcost', function() {
         id = $(this).attr('id');
        var cost = $('#cost_'+id).val();
        var product_id = $('#id_'+id).val();
        
        if(cost!='')
        {
            $.ajax({
            type: "POST",
            url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Products/updateproductcost/",
            data: { cost : cost , product_id:product_id},
        
            success: function(data)
                {
                    $(".price_cost_edit_"+id).hide();
                    $(".price_cost_data_"+id).empty();
                    $(".price_cost_data_"+id).append('$'+cost+'.00');
                    $(".price_cost_"+id).show(); 
                }
            });
        }return false;   
    });

});
</script>


<!-- Update Retail -->

<script>
$(document).ready(function() {
  
    $(document).on('click', '.retail', function() {
        id = $(this).attr('id');
        $(".price_retail_edit_"+id).show();
        $(".price_retail_"+id).hide();
    });

    
    $(document).on('click', '.cancleretail', function() {
        id = $(this).attr('id');
        $(".price_retail_edit_"+id).hide();
        $(".price_retail_"+id).show(); 
    });   

    $(document).on('click', '.submitretail', function() {
        id = $(this).attr('id');
        var retail = $('#retail_'+id).val();
        var product_id = $('#id_'+id).val();
         
        if(retail!='')
        {
            $.ajax({
            type: "POST",
            url: "http://112.196.42.180/projects/repairshopsaas/repairshopsaas/Products/updateproductretail/",
            data: { retail : retail , product_id:product_id},
        
            success: function(data)
                {
                    $(".price_retail_edit_"+id).hide();
                    $(".price_retail_data_"+id).empty();
                    $(".price_retail_data_"+id).append('$'+retail+'.00');
                    $(".price_retail_"+id).show(); 
                
                }
            });
        }return false;    
    });
});
</script>
