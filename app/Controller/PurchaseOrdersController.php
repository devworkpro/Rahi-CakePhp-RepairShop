<?php
App::uses('AppController', 'Controller');
class PurchaseOrdersController extends AppController {

public $uses = array('PurchaseOrder','Product','User','Purchase','Comment','Vendor','Purchase');

public function admin_add() 
{
    $this->set('title','Add PurchaseOrder');
    $Vendor = $this->Vendor->findallVendorName();
    if($this->request->is('post'))
    {
        $PurchaseOrders=$this->request->data;
        //pr($PurchaseOrders);die();
        $save = $this->PurchaseOrder->addPurchaseOrderAdmin($PurchaseOrders);
        $po_id = $this->PurchaseOrder->getInsertID(); 
        $this->Flash->success('Purchase Order Successfully Added', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));

    }
    $this->set(compact('Vendor'));
}

////////////////////////////////////////////////////////////////////

public function admin_PurchaseOrderedit($id){
    $this->set('title','Edit PurchaseOrder');

    $PurchaseOrder= $this->PurchaseOrder->findPurchaseOrderbyId($id); // Get PurchaseOrder Detail from id
    $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    {        
        //pr($this->request->data); die();
        $this->PurchaseOrder->editPurchaseOrderbyId($this->request->data,$id); // Edit User
        $this->Flash->success('PurchaseOrder Successfully Updated', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'PurchaseOrderlist'));   
    }
    $this->data = $PurchaseOrder ;
    $this->set(compact('PurchaseOrder'));
    $this->set(compact('product'));
}

////////////////////////////////////////////////////////////////////

public function admin_deletePurchaseOrder($id){
    $this->PurchaseOrder->deletePurchaseOrder($id);
    $this->Flash->success('Purchase Order Deleted!',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"PurchaseOrders","action"=>"purchaseorderlist"));
    
}


// /////////////////////////////////////////////////////////////////

public function admin_purchaseorderlist()
{
    $this->set('title','PurchaseOrder List');
    $PurchaseOrders = $this->PurchaseOrder->allPurchaseOrders();
    foreach ($PurchaseOrders as $key => $po) {
        $vendor_id = $po['PurchaseOrder']['vendor_id'];
        $vendor = $this->Vendor->findallVendorNameById($vendor_id);
        $PurchaseOrders[$key]['vendor'] = $vendor;
    }
    
    //pr($PurchaseOrders);die();

    $this->set('PurchaseOrders', $PurchaseOrders);
}


////////////////////////////////////////////////////////////////////

public function admin_purchaseorderdetails($id)
{
	$PurchaseOrder = $this->PurchaseOrder->findPurchaseOrderbyId($id);
    $vendor_id = $PurchaseOrder['PurchaseOrder']['vendor_id'];
    $Vendor = $this->Vendor->findVendorbyId($vendor_id);
    $Purchase = $this->Purchase->findPurchasebyPurchaseOrderId($id);
    //pr($Purchase);die();
    $vendorname = $this->Vendor->findallVendorName();
    $this->set(compact('PurchaseOrder','Vendor','vendorname','Purchase'));
}

/////////////////////////////////////////////////////////////////////


public function admin_vendorupdate()
{
    $vendor =$this->request->data('vendor');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('vendor_id' => "'$vendor'"),array('id' => $po_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////


public function admin_updateorderdate()
{
    $order_date =$this->request->data('order_date');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('order_date' => "'$order_date'"),array('id' => $po_id));
    }
    exit();
}



//////////////////////////////////////////////////////////////////////


public function admin_updateduedate()
{
    $due_date =$this->request->data('due_date');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('due_date' => "'$due_date'"),array('id' => $po_id));
    }
    exit();
}

//////////////////////////////////////////////////////////////////////


public function admin_updatepaiddate()
{
    $paid_date =$this->request->data('paid_date');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('paid_date' => "'$paid_date'"),array('id' => $po_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////


public function admin_updatenumber()
{
    $number =$this->request->data('number');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('number' => "'$number'"),array('id' => $po_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////


public function admin_updatedeliverytracking()
{
    $tracking =$this->request->data('tracking');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('delivery_tracking' => "'$tracking'"),array('id' => $po_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////

public function admin_statusupdate()
{
    $status =$this->request->data('status');
    $po_id =$this->request->data('po_id');
  
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('status' => "'$status'"),array('id' => $po_id));
    }
    exit();
}

////////////////////////////////////////////////////////////////////////

public function admin_shippingnotesupdate()
{
    $shipping_notes =$this->request->data('shipping_notes');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('shipping_notes' => "'$shipping_notes'"),array('id' => $po_id));
    }
    exit();
}

////////////////////////////////////////////////////////////////////////

public function admin_generalnotesupdate()
{
    $general_notes =$this->request->data('general_notes');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('general_notes' => "'$general_notes'"),array('id' => $po_id));
    }
    exit();
}

////////////////////////////////////////////////////////////////////////

public function admin_updateshippingprice()
{
    $shipping_price =$this->request->data('shipping_price');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('shipping_price' => "'$shipping_price'"),array('id' => $po_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function admin_updateothercharges()
{
    $other_charges =$this->request->data('other_charges');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('other_charges' => "'$other_charges'"),array('id' => $po_id));
    }
    exit();
}

////////////////////////////////////////////////////////////////////////

public function admin_updatediscountpercent()
{
    $discount_percent =$this->request->data('discount_percent');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('discount_percent' => "'$discount_percent'"),array('id' => $po_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function admin_userupdate()
{
    $user =$this->request->data('user');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('user' => "'$user'"),array('id' => $po_id));
    }
    exit();
}
//////////////////////////////////////////////////////////////////////////

public function admin_addpurchaseitem()
{

   if($this->request->is('post'))
    {
        $Purchase=$this->request->data;
        //pr($Purchase);die();
        $item = $Purchase['Purchase']['item'];
        $po_id = $Purchase['Purchase']['purchaseorder_id'];
        
        $product = $this->Product->findProductbyIdName($item);
        
        if(empty($product))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));
        }
        else
        {
            $pro_id=$product['Product']['id'];
            $description=$product['Product']['description'];
            $upc_code=$product['Product']['upc_code'];
            $rate=$product['Product']['price_retail'];
            $cost=$product['Product']['price_cost'];
        
            $this->Purchase->addPurchaseAdmin($Purchase);
            $purchase_id = $this->Purchase->getInsertID();
       // echo $user_id; die();
       
        
            $this->Purchase->updateAll(array('product_id' => "'$pro_id'",'description' => "'$description'",'rate' => "'$rate'",'cost' => "'$cost'",'upc_code' => "'$upc_code'"),array('id' => $purchase_id));
        //$this->Purchase->query("Update Purchases set  product_id = $pro_id  where id = $inv_id");
            $this->Flash->success("Item Added!", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));
        }

    }
    exit();    
  

}

////////////////////////////////////////////////////////////////////////



public function admin_addpurchaseitembyupc()
{

   if($this->request->is('post'))
    {
        $Purchase=$this->request->data;
        //pr($Purchase);die();
        $upc_code = $Purchase['Purchase']['upc_code'];
        $po_id = $Purchase['Purchase']['purchaseorder_id'];
        $product = $this->Product->findProductbyIdUpccode($upc_code);
        //print_r($Inventory);die();
     //   $user = explode(",", $item);
        
        if(empty($product))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));
        }
        else
        {
            $pro_id=$product['Product']['id'];
            $description=$product['Product']['description'];
            $product_name=$product['Product']['product_name'];
            $rate=$product['Product']['price_retail'];
            $cost=$product['Product']['price_cost'];
        
            $this->Purchase->addPurchaseAdmin($Purchase);
            $purchase_id = $this->Purchase->getInsertID();
       // echo $user_id; die();
       
        
            $this->Purchase->updateAll(array('product_id' => "'$pro_id'",'description' => "'$description'",'rate' => "'$rate'",'cost' => "'$cost'",'item' => "'$product_name'"),array('id' => $purchase_id));
        //$this->Purchase->query("Update Purchases set  product_id = $pro_id  where id = $inv_id");
            $this->Flash->success("Item Added!", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));
        }
        
    }
        
  

}


////////////////////////////////////////////////////////////////////////////////


public function admin_deletePurchaseitem($purchase_id,$po_id){
    
    $this->Purchase->deletePurchase($purchase_id);
    $this->Flash->success('Item Deleted Successfully!', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));
}


////////////////////////////////////////////////////////////////////////

public function admin_updatepurchaseitemcost()
{
    $cost =$this->request->data('cost');
    $purchase_id =$this->request->data('purchase_id');
    if ($this->request->is('ajax'))
    {
        $this->Purchase->updateAll(array('cost' => "'$cost'"),array('id' => $purchase_id));
    }
    exit();
}

////////////////////////////////////////////////////////////////////////

public function admin_updatepurchasetotal()
{
    $total =$this->request->data('total');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('order_total' => "'$total'"),array('id' => $po_id));
    }
    exit();
}

//////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

 
                      /* USER SECTION */


/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////


public function add() 
{
    $this->layout = "frontenduser";
    $this->set('title','Add PurchaseOrder');
    $session_id = $this->Auth->User('id');
    $Vendor = $this->Vendor->findallVendorNameByLoginId($session_id);
    if($this->request->is('post'))
    {
        $PurchaseOrders=$this->request->data;
        //pr($PurchaseOrders);die();
        $save = $this->PurchaseOrder->addPurchaseOrderAdmin($PurchaseOrders);
        $po_id = $this->PurchaseOrder->getInsertID(); 
        $this->Flash->success('Purchase Order Successfully Added', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));

    }
    $this->set(compact('Vendor'));
}

////////////////////////////////////////////////////////////////////

public function PurchaseOrderedit($id){
    $this->layout = "frontenduser";
    $this->set('title','Edit PurchaseOrder');

    $PurchaseOrder= $this->PurchaseOrder->findPurchaseOrderbyId($id); // Get PurchaseOrder Detail from id
    $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    {        
        //pr($this->request->data); die();
        $this->PurchaseOrder->editPurchaseOrderbyId($this->request->data,$id); // Edit User
        $this->Flash->success('PurchaseOrder Successfully Updated', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'PurchaseOrderlist'));   
    }
    $this->data = $PurchaseOrder ;
    $this->set(compact('PurchaseOrder'));
    $this->set(compact('product'));
}

////////////////////////////////////////////////////////////////////

public function deletePurchaseOrder($id){
    $this->layout = "frontenduser";
    $this->PurchaseOrder->deletePurchaseOrder($id);
    $this->Flash->success('Purchase Order Deleted!',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"PurchaseOrders","action"=>"purchaseorderlist"));
    
}


// /////////////////////////////////////////////////////////////////

public function purchaseorderlist()
{
    $this->layout = "frontenduser";
    $this->set('title','PurchaseOrder List');
    $session_id = $this->Auth->User('id');
    $PurchaseOrders = $this->PurchaseOrder->findallPurchaseOrdersByLoginId($session_id);
    foreach ($PurchaseOrders as $key => $po) {
        $vendor_id = $po['PurchaseOrder']['vendor_id'];
        $vendor = $this->Vendor->findallVendorNameById($vendor_id);
        $PurchaseOrders[$key]['vendor'] = $vendor;
    }
    
    //pr($PurchaseOrders);die();

    $this->set('PurchaseOrders', $PurchaseOrders);
}


////////////////////////////////////////////////////////////////////

public function purchaseorderdetails($id)
{
    $this->layout = "frontenduser";
    $PurchaseOrder = $this->PurchaseOrder->findPurchaseOrderbyId($id);
    $vendor_id = $PurchaseOrder['PurchaseOrder']['vendor_id'];
    $Vendor = $this->Vendor->findVendorbyId($vendor_id);
    $Purchase = $this->Purchase->findPurchasebyPurchaseOrderId($id);
    //pr($Purchase);die();
    //$vendorname = $this->Vendor->findallVendorName();
    $session_id = $this->Auth->User('id');
    $vendorname = $this->Vendor->findallVendorNameByLoginId($session_id);
    $this->set(compact('PurchaseOrder','Vendor','vendorname','Purchase'));
}

/////////////////////////////////////////////////////////////////////


public function vendorupdate()
{
    $this->layout = "frontenduser";
    $vendor =$this->request->data('vendor');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('vendor_id' => "'$vendor'"),array('id' => $po_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////


public function updateorderdate()
{
    $this->layout = "frontenduser";
    $order_date =$this->request->data('order_date');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('order_date' => "'$order_date'"),array('id' => $po_id));
    }
    exit();
}



//////////////////////////////////////////////////////////////////////


public function updateduedate()
{
    $this->layout = "frontenduser";
    $due_date =$this->request->data('due_date');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('due_date' => "'$due_date'"),array('id' => $po_id));
    }
    exit();
}

//////////////////////////////////////////////////////////////////////


public function updatepaiddate()
{
    $this->layout = "frontenduser";
    $paid_date =$this->request->data('paid_date');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('paid_date' => "'$paid_date'"),array('id' => $po_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////


public function updatenumber()
{
    $this->layout = "frontenduser";
    $number =$this->request->data('number');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('number' => "'$number'"),array('id' => $po_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////


public function updatedeliverytracking()
{
    $this->layout = "frontenduser";
    $tracking =$this->request->data('tracking');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('delivery_tracking' => "'$tracking'"),array('id' => $po_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////

public function statusupdate()
{
    $this->layout = "frontenduser";
    $status =$this->request->data('status');
    $po_id =$this->request->data('po_id');
  
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('status' => "'$status'"),array('id' => $po_id));
    }
    exit();
}

////////////////////////////////////////////////////////////////////////

public function shippingnotesupdate()
{
    $this->layout = "frontenduser";
    $shipping_notes =$this->request->data('shipping_notes');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('shipping_notes' => "'$shipping_notes'"),array('id' => $po_id));
    }
    exit();
}

////////////////////////////////////////////////////////////////////////

public function generalnotesupdate()
{
    $this->layout = "frontenduser";
    $general_notes =$this->request->data('general_notes');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('general_notes' => "'$general_notes'"),array('id' => $po_id));
    }
    exit();
}

////////////////////////////////////////////////////////////////////////

public function updateshippingprice()
{
    $this->layout = "frontenduser";
    $shipping_price =$this->request->data('shipping_price');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('shipping_price' => "'$shipping_price'"),array('id' => $po_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function updateothercharges()
{
    $this->layout = "frontenduser";
    $other_charges =$this->request->data('other_charges');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('other_charges' => "'$other_charges'"),array('id' => $po_id));
    }
    exit();
}

////////////////////////////////////////////////////////////////////////

public function updatediscountpercent()
{
    $this->layout = "frontenduser";
    $discount_percent =$this->request->data('discount_percent');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('discount_percent' => "'$discount_percent'"),array('id' => $po_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function userupdate()
{
    $this->layout = "frontenduser";
    $user =$this->request->data('user');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('user' => "'$user'"),array('id' => $po_id));
    }
    exit();
}
//////////////////////////////////////////////////////////////////////////

public function addpurchaseitem()
{
    $this->layout = "frontenduser";

   if($this->request->is('post'))
    {
        $Purchase=$this->request->data;
        //pr($Purchase);die();
        $item = $Purchase['Purchase']['item'];
        $po_id = $Purchase['Purchase']['purchaseorder_id'];
        $session_id = $this->Session->read('Auth.User.id');
        $product = $this->Product->findProductbyNameAndLoginId($item,$session_id);
        //pr($product);die();
        if(empty($product))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));
        }
        else
        {
            $pro_id=$product['Product']['id'];
            $description=$product['Product']['description'];
            $upc_code=$product['Product']['upc_code'];
            $rate=$product['Product']['price_retail'];
            $cost=$product['Product']['price_cost'];
        
            $this->Purchase->addPurchaseAdmin($Purchase);
            $purchase_id = $this->Purchase->getInsertID();
       // echo $user_id; die();
       
        
            $this->Purchase->updateAll(array('product_id' => "'$pro_id'",'description' => "'$description'",'rate' => "'$rate'",'cost' => "'$cost'",'upc_code' => "'$upc_code'"),array('id' => $purchase_id));
        //$this->Purchase->query("Update Purchases set  product_id = $pro_id  where id = $inv_id");
            $this->Flash->success("Item Added!", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));
        }

    }
    exit();    
  

}

////////////////////////////////////////////////////////////////////////



public function addpurchaseitembyupc()
{
    $this->layout = "frontenduser";
   if($this->request->is('post'))
    {
        $Purchase=$this->request->data;
        //pr($Purchase);die();
        $upc_code = $Purchase['Purchase']['upc_code'];
        $po_id = $Purchase['Purchase']['purchaseorder_id'];
        $session_id = $this->Session->read('Auth.User.id');
        $product = $this->Product->findProductbyUpccodeAndLoginId($upc_code,$session_id);
        //pr($product);die();
     //   $user = explode(",", $item);
        
        if(empty($product))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));
        }
        else
        {
            $pro_id=$product['Product']['id'];
            $description=$product['Product']['description'];
            $product_name=$product['Product']['product_name'];
            $rate=$product['Product']['price_retail'];
            $cost=$product['Product']['price_cost'];
        
            $this->Purchase->addPurchaseAdmin($Purchase);
            $purchase_id = $this->Purchase->getInsertID();
       // echo $user_id; die();
       
        
            $this->Purchase->updateAll(array('product_id' => "'$pro_id'",'description' => "'$description'",'rate' => "'$rate'",'cost' => "'$cost'",'item' => "'$product_name'"),array('id' => $purchase_id));
        //$this->Purchase->query("Update Purchases set  product_id = $pro_id  where id = $inv_id");
            $this->Flash->success("Item Added!", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));
        }
        
    }
        
  

}


////////////////////////////////////////////////////////////////////////////////


public function deletePurchaseitem($purchase_id,$po_id){
    $this->layout = "frontenduser";
    $this->Purchase->deletePurchase($purchase_id);
    $this->Flash->success('Item Deleted Successfully!', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'PurchaseOrders','action'=>'purchaseorderdetails',$po_id));
}


////////////////////////////////////////////////////////////////////////

public function updatepurchaseitemcost()
{
    $this->layout = "frontenduser";
    $cost =$this->request->data('cost');
    $purchase_id =$this->request->data('purchase_id');
    if ($this->request->is('ajax'))
    {
        $this->Purchase->updateAll(array('cost' => "'$cost'"),array('id' => $purchase_id));
    }
    exit();
}

////////////////////////////////////////////////////////////////////////

public function updatepurchasetotal()
{
    $this->layout = "frontenduser";
    $total =$this->request->data('total');
    $po_id =$this->request->data('po_id');
    if ($this->request->is('ajax'))
    {
        $this->PurchaseOrder->updateAll(array('order_total' => "'$total'"),array('id' => $po_id));
    }
    exit();
}



/**********************************************************************************/




}