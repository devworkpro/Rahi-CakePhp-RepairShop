<?php
App::uses('AppController', 'Controller');
class OrdersController extends AppController {

public $uses = array('Order','Product','User','Purchase','Comment');

public function admin_add() 
{
  $this->set('title','Add Order');
     
    if($this->request->is('post'))
    {
        $Orders=$this->request->data;
        //pr($Orders);die();
        $name=$Orders['Order']['name'];
        $user = explode(" ", $name);
  //  $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[2]%'  or email like '%$user[3]%'");
    
 // pr($user);die();

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  and email='$user[3]' ");
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
    
            if(empty($user))
            {
                $this->Flash->success("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[3]);
       
            }
            else
            {
                $save = $this->Order->addOrderAdmin($Orders);
                $Order_id = $this->Order->getInsertID();
                $this->Order->query("Update orders set  user_id = $user_id  where id = $Order_id");
                $this->Flash->success('Order added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Orders","action" => "orderdetails",$Order_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[2]'  or email = '$user[2]'");
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
            if(empty($user))
            {
                $this->Flash->success("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[2]);
               
            }
            else{
                $save = $this->Order->addOrderAdmin($Orders);
                $Order_id = $this->Order->getInsertID();
                $this->Order->query("Update orders set  user_id = $user_id  where id = $Order_id");
                $this->Flash->success('Order added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Orders","action" => "orderdetails",$Order_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
            if(empty($user))
            {
                $this->Flash->success("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[1]);
                
            }
            else{

                $save = $this->Order->addOrderAdmin($Orders);
                $Order_id = $this->Order->getInsertID();
                $this->Order->query("Update orders set  user_id = $user_id  where id = $Order_id");
                $this->Flash->success('Order added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Orders","action" => "orderdetails",$Order_id));
                
            }  

        }
        else
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
          foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
            if(empty($user))
            {
                $this->Flash->success("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));

                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[0]);
                
            }
            else{
                $save = $this->Order->addOrderAdmin($Orders);
                $Order_id = $this->Order->getInsertID();
                $this->Order->query("Update orders set  user_id = $user_id  where id = $Order_id");
                $this->Flash->success('Order added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Orders","action" => "orderdetails",$Order_id));
               
            }  

        }
    }

}

////////////////////////////////////////////////////////////////////

public function admin_orderedit($id){
    $this->set('title','Edit Order');

    $order= $this->Order->findOrderbyId($id); // Get order Detail from id
    $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    {        
        //pr($this->request->data); die();
        $this->Order->editOrderbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Order Successfully Updated', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'orders','action'=>'orderlist'));   
    }
    $this->data = $order ;
    $this->set(compact('order'));
    $this->set(compact('product'));
}

////////////////////////////////////////////////////////////////////

public function admin_deleteorder($id){
    $this->Order->deleteOrder($id);
    $this->Flash->success('Order Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Orders","action"=>"orderlist"));
    
}


// /////////////////////////////////////////////////////////////////

public function admin_orderlist()
{
    $this->set('title','Order List');
    //$orders = $this->Order->allOrders();
    $orders = $this->Order->query("SELECT orders.*, users.first_name ,users.last_name FROM orders  INNER JOIN users ON orders.user_id = users.id");
    //pr($orders);die();
    $this->set('orders', $orders);
}

////////////////////////////////////////////////////////////////////    

public function admin_orderview($id){
$this->set('title','Profile');
    $order = $this->Order->findOrderbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Order->editOrderbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'orders','action'=>'orderview'));
    }
    $this->data = $order ; 
    $this->set(compact('order'));
}


////////////////////////////////////////////////////////////////////    

public function admin_pay($id){
    $this->set('title','Pay');
   
    if($this->request->is('post'))
    {  
        //pr($this->request->data); die();
        $this->Flash->success('Payment Successfully', array('key' => 'positive'));
        $this->Order->editOrderbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'orders','action'=>'orderdetails',$id));
    }
    $order = $this->Order->findOrderbyId($id);
    $this->data = $order ; 
    $this->set(compact('order'));
}

////////////////////////////////////////////////////////////////////    

public function admin_undopayment($order_id){
    $this->Order->updateAll(array('payment_method' => "''",'ref_num' => "''",'message' => "''",'pay_date' => "''",'paid' => "'0'"),array('id' => $order_id));
    $this->Flash->success('Payment Clear Successfully', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
    
}

////////////////////////////////////////////////////////////////////

public function admin_order()
{

    $id =$this->request->data('id');
 
    if ($this->request->is('ajax'))
    {
        $data= $this->Product->findProductbyId($id);
        $this->set('data', $data);
    }
}

////////////////////////////////////////////////////////////////////

public function admin_orderdetails($id)
{
	$order = $this->Order->findOrderbyId($id);
    //pr($order);
    $purchase = $this->Purchase->findPurchasebyOrderId($id);
    $comment = $this->Comment->findCommentbyOrderId($id);
    //pr($comment);die();
    $user_id=$order['Order']['user_id'];
    $user = $this->User->findUserbyId($user_id);
    //pr($user);die();
    $this->set(compact('order','user','purchase','comment'));
}

////////////////////////////////////////////////////////////////////
public function admin_product()
{
    $data =$this->request->data('search');
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where product_name like '%$data%'");
        $this->set('user', $user);
    }
}

//////////////////////////////////////////////////////////////////////
public function admin_deletecomment($comment_id,$order_id){
    
    $this->Comment->deleteCommant($comment_id);
    $this->Flash->success('Comment Deleted Successfully', array('key' => 'positive'));
  //  return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));
    return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
}

/////////////////////////////////////////////////////////////////////


public function admin_updatepurchaseitem()
{
    $item =$this->request->data('item');
    $order_id =$this->request->data('order_id');
    if ($this->request->is('ajax'))
    {
        $this->Order->updateAll(array('item' => "'$item'"),array('id' => $order_id));
    }
    exit();
}



//////////////////////////////////////////////////////////////////////


public function admin_updatepurchasetotal()
{
    $total =$this->request->data('total');
    $order_id =$this->request->data('order_id');
    if ($this->request->is('ajax'))
    {
        $this->Order->updateAll(array('total' => "'$total'"),array('id' => $order_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////

public function admin_statusupdate()
{
    $status =$this->request->data('status');
    $order_id =$this->request->data('order_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Order->updateAll(array('status' => "'$status'"),array('id' => $order_id));
       // $this->set('user', $user);
        

   }
   exit();
}

///////////////////////////////////////////////////////////////////////

public function admin_identificationupdate()
{
    $identification =$this->request->data('identification');
    $order_id =$this->request->data('order_id');
   
    if ($this->request->is('ajax'))
    {
        $this->Order->updateAll(array('identification' => "'$identification'"),array('id' => $order_id));
    }
   exit();
}

////////////////////////////////////////////////////////////////////////

public function admin_generalnotesupdate()
{
    $general_notes =$this->request->data('general_notes');
    $order_id =$this->request->data('order_id');
    if ($this->request->is('ajax'))
    {
        $this->Order->updateAll(array('general_notes' => "'$general_notes'"),array('id' => $order_id));
    }
    exit();
}


/////////////////////////////////////////////////////////////////////////

public function admin_addsignature(){
   
    if($this->request->is('post'))
    {        
        $Order=$this->request->data;
        //pr($Order);die();
        $order_id=$Order['order']['order_id'];
        $signature=$Order['order']['signature'];
        $this->Order->updateAll(array('signature' => "'$signature'"),array('id' => $order_id));
        $this->Flash->success('Add Signature Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function admin_clearsignature($order_id){
   
        $this->Order->updateAll(array('signature' => "''"),array('id' => $order_id));
        $this->Flash->success('Signature Clear Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
    
}



///////////////////////////////////////////////////////////////////////

public function admin_usernamebyid()
{
    $user_id =$this->request->data('user_id');
    if ($this->request->is('ajax'))
    {
        $user = $this->User->findUserbyId($user_id);
        //pr($user);
        $this->set('user', $user);
    }
    //exit();
}






/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

 
                      /* USER SECTION */


/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////



public function add() 
{
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Add Order');
     
    if($this->request->is('post'))
    {
        $Orders=$this->request->data;
        //pr($Orders);die();
        $name=$Orders['Order']['name'];
        $user = explode(" ", $name);
  //  $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[2]%'  or email like '%$user[3]%'");
    
 // pr($user);die();

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  and email='$user[3]' ");
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
    
            if(empty($user))
            {
                $this->Flash->success("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[3]);
       
            }
            else
            {
                $save = $this->Order->addOrderAdmin($Orders);
                $Order_id = $this->Order->getInsertID();
                $this->Order->query("Update orders set  user_id = $user_id  where id = $Order_id");
                $this->Flash->success('Order added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Orders","action" => "orderdetails",$Order_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[2]'  or email = '$user[2]'");
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
            if(empty($user))
            {
                $this->Flash->success("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[2]);
               
            }
            else{
                $save = $this->Order->addOrderAdmin($Orders);
                $Order_id = $this->Order->getInsertID();
                $this->Order->query("Update orders set  user_id = $user_id  where id = $Order_id");
                $this->Flash->success('Order added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Orders","action" => "orderdetails",$Order_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
            if(empty($user))
            {
                $this->Flash->success("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[1]);
                
            }
            else{

                $save = $this->Order->addOrderAdmin($Orders);
                $Order_id = $this->Order->getInsertID();
                $this->Order->query("Update orders set  user_id = $user_id  where id = $Order_id");
                $this->Flash->success('Order added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Orders","action" => "orderdetails",$Order_id));
                
            }  

        }
        else
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
          foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
            if(empty($user))
            {
                $this->Flash->success("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));

                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[0]);
                
            }
            else{
                $save = $this->Order->addOrderAdmin($Orders);
                $Order_id = $this->Order->getInsertID();
                $this->Order->query("Update orders set  user_id = $user_id  where id = $Order_id");
                $this->Flash->success('Order added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Orders","action" => "orderdetails",$Order_id));
               
            }  

        }
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

////////////////////////////////////////////////////////////////////

public function orderedit($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Edit Order');

    $order= $this->Order->findOrderbyId($id); // Get order Detail from id
    $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    {        
        //pr($this->request->data); die();
        $this->Order->editOrderbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Order Successfully Updated', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'orders','action'=>'orderlist'));   
    }
    $this->data = $order ;
    $this->set(compact('order'));
    $this->set(compact('product'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

////////////////////////////////////////////////////////////////////

public function deleteorder($id){
    $this->layout = "frontenduser";
    $this->Order->deleteOrder($id);
    $this->Flash->success('Order Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Orders","action"=>"orderlist"));
    
}


// /////////////////////////////////////////////////////////////////

public function orderlist()
{
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $session_id = $this->Session->read('Auth.User.id');
    $this->set('title','Order List');
    //$orders = $this->Order->allOrders();
    $orders = $this->Order->query("SELECT orders.*, users.first_name ,users.last_name FROM orders  INNER JOIN users ON orders.user_id = users.id where orders.login_id = $session_id");
    //pr($orders);die();
    $this->set('orders', $orders);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

////////////////////////////////////////////////////////////////////    

public function orderview($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Profile');
    $order = $this->Order->findOrderbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Order->editOrderbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'orders','action'=>'orderview'));
    }
    $this->data = $order ; 
    $this->set(compact('order'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


////////////////////////////////////////////////////////////////////    

public function pay($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Pay');
   
    if($this->request->is('post'))
    {  
        //pr($this->request->data); die();
        $this->Flash->success('Payment Successfully', array('key' => 'positive'));
        $this->Order->editOrderbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'orders','action'=>'orderdetails',$id));
    }
    $order = $this->Order->findOrderbyId($id);
    $this->data = $order ; 
    $this->set(compact('order'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

////////////////////////////////////////////////////////////////////    

public function undopayment($order_id){
    $this->layout = "frontenduser";
    $this->Order->updateAll(array('payment_method' => "''",'ref_num' => "''",'message' => "''",'pay_date' => "''",'paid' => "'0'"),array('id' => $order_id));
    $this->Flash->success('Payment Clear Successfully', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
    
}

////////////////////////////////////////////////////////////////////

public function order()
{
    $this->layout = "frontenduser";
    $id =$this->request->data('id');
 
    if ($this->request->is('ajax'))
    {
        $data= $this->Product->findProductbyId($id);
        $this->set('data', $data);
    }
}

////////////////////////////////////////////////////////////////////

public function orderdetails($id)
{
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $order = $this->Order->findOrderbyId($id);
    //pr($order);
    $purchase = $this->Purchase->findPurchasebyOrderId($id);
    $comment = $this->Comment->findCommentbyOrderId($id);
    //pr($comment);die();
    $user_id=$order['Order']['user_id'];
    $user = $this->User->findUserbyId($user_id);
    //pr($user);die();
    $this->set(compact('order','user','purchase','comment'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

////////////////////////////////////////////////////////////////////
public function product()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Session->read('Auth.User.id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where login_id = $session_id AND product_name like '%$data%'");
        $this->set('user', $user);
    }
}

//////////////////////////////////////////////////////////////////////
public function deletecomment($comment_id,$order_id){
    $this->layout = "frontenduser";
    $this->Comment->deleteCommant($comment_id);
    $this->Flash->success('Comment Deleted Successfully', array('key' => 'positive'));
  //  return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));
    return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
}

/////////////////////////////////////////////////////////////////////


public function updatepurchaseitem()
{
    $this->layout = "frontenduser";
    $item =$this->request->data('item');
    $order_id =$this->request->data('order_id');
    if ($this->request->is('ajax'))
    {
        $this->Order->updateAll(array('item' => "'$item'"),array('id' => $order_id));
    }
    exit();
}



//////////////////////////////////////////////////////////////////////


public function updatepurchasetotal()
{
    $this->layout = "frontenduser";
    $total =$this->request->data('total');
    $order_id =$this->request->data('order_id');
    if ($this->request->is('ajax'))
    {
        $this->Order->updateAll(array('total' => "'$total'"),array('id' => $order_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////

public function statusupdate()
{
    $this->layout = "frontenduser";
    $status =$this->request->data('status');
    $order_id =$this->request->data('order_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Order->updateAll(array('status' => "'$status'"),array('id' => $order_id));
       // $this->set('user', $user);
        

   }
   exit();
}

///////////////////////////////////////////////////////////////////////

public function identificationupdate()
{
    $this->layout = "frontenduser";
    $identification =$this->request->data('identification');
    $order_id =$this->request->data('order_id');
   
    if ($this->request->is('ajax'))
    {
        $this->Order->updateAll(array('identification' => "'$identification'"),array('id' => $order_id));
    }
   exit();
}

////////////////////////////////////////////////////////////////////////

public function generalnotesupdate()
{
    $this->layout = "frontenduser";
    $general_notes =$this->request->data('general_notes');
    $order_id =$this->request->data('order_id');
    if ($this->request->is('ajax'))
    {
        $this->Order->updateAll(array('general_notes' => "'$general_notes'"),array('id' => $order_id));
    }
    exit();
}


/////////////////////////////////////////////////////////////////////////

public function addsignature(){
   
    $this->layout = "frontenduser";
    if($this->request->is('post'))
    {        
        $Order=$this->request->data;
        //pr($Order);die();
        $order_id=$Order['order']['order_id'];
        $signature=$Order['order']['signature'];
        $this->Order->updateAll(array('signature' => "'$signature'"),array('id' => $order_id));
        $this->Flash->success('Add Signature Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function clearsignature($order_id){
   
   $this->layout = "frontenduser";
        $this->Order->updateAll(array('signature' => "''"),array('id' => $order_id));
        $this->Flash->success('Signature Clear Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Orders','action'=>'orderdetails',$order_id));
    
}



///////////////////////////////////////////////////////////////////////

public function usernamebyid()
{
    $this->layout = "frontenduser";
    $user_id =$this->request->data('user_id');
    if ($this->request->is('ajax'))
    {
        $user = $this->User->findUserbyId($user_id);
        //pr($user);
        $this->set('user', $user);
    }
    //exit();
}



















//////////////////////////////////////////////////////////////////////////





}