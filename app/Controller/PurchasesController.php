<?php
App::uses('AppController', 'Controller');
class PurchasesController extends AppController {

public $uses = array('Purchase','Product','User');



public function admin_addpurchaseitem()
{

   if($this->request->is('post'))
    {
        $Purchase=$this->request->data;
        //pr($Purchase);die();
        $item = $Purchase['Purchase']['item'];
        $order_id = $Purchase['Purchase']['order_id'];
        
        $product = $this->Product->findProductbyIdName($item);
     //   $user = explode(",", $item);
        
        if(empty($product))
        {    
            $this->Flash->success("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
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

            return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
        }

    }
    exit();    
  

}

public function admin_addPurchasemanualy()
{

    if($this->request->is('post'))
    {
        $Purchase=$this->request->data;
        //pr($Purchase);die();
        $order_id = $Purchase['Purchase']['order_id'];
        $this->Purchase->addPurchaseAdmin($Purchase);
        return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
    }
    exit();
}


public function admin_deletePurchaseitem($purchase_id,$order_id){
    
    $this->Purchase->deletePurchase($purchase_id);
    $this->Flash->success('Item Deleted Successfully', array('key' => 'positive'));

  //  return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));
    return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
}

public function admin_addcomment()
{
    if($this->request->is('post'))
    {
        $Purchase=$this->request->data;
        pr($Purchase);die();
        $order_id = $Purchase['Purchase']['order_id'];
        $this->Purchase->addPurchaseAdmin($Purchase);
        return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
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



public function addpurchaseitem()
{
    $this->layout = "frontenduser";
   if($this->request->is('post'))
    {
        $Purchase=$this->request->data;
        //pr($Purchase);die();
        $item = $Purchase['Purchase']['item'];
        $order_id = $Purchase['Purchase']['order_id'];
        
        $product = $this->Product->findProductbyIdName($item);
     //   $user = explode(",", $item);
        
        if(empty($product))
        {    
            $this->Flash->success("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
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

            return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
        }

    }
    exit();    
  

}

public function addPurchasemanualy()
{
    $this->layout = "frontenduser";
    if($this->request->is('post'))
    {
        $Purchase=$this->request->data;
        //pr($Purchase);die();
        $order_id = $Purchase['Purchase']['order_id'];
        $this->Purchase->addPurchaseAdmin($Purchase);
        return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
    }
    exit();
}


public function deletePurchaseitem($purchase_id,$order_id){
     $this->layout = "frontenduser";
    $this->Purchase->deletePurchase($purchase_id);
    $this->Flash->success('Item Deleted Successfully', array('key' => 'positive'));

  //  return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));
    return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
}

public function addcomment()
{
    $this->layout = "frontenduser";
    if($this->request->is('post'))
    {
        $Purchase=$this->request->data;
        pr($Purchase);die();
        $order_id = $Purchase['Purchase']['order_id'];
        $this->Purchase->addPurchaseAdmin($Purchase);
        return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
    }
    exit();
}



}