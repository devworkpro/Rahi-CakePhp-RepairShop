<?php
App::uses('AppController', 'Controller');
class InvoicesController extends AppController {

public $uses = array('Invoice','Product','User','Sale','Ticket','Estimate','Phone','Comment','Log','Warranty','Disclaimer','InvoicePayment','SaleProduct','Template','TransferLocation','Multilocation');


public function admin_add() 
{
   $this->set('title','Add invoice');
     
    if($this->request->is('post'))
    {
        $invoices=$this->request->data;
        $changes = json_encode($invoices);
        $name=$invoices['Invoice']['name'];
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
                $this->Flash->failure("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[3]);
       
            }
            else
            {
                $save = $this->Invoice->addInvoiceAdmin($invoices);
                $invoice_id = $this->Invoice->getInsertID();
                $logs['changes']=$changes;
                $logs['invoice_id']=$invoice_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);

                $this->Invoice->query("Update invoices set  user_id = $user_id  where id = $invoice_id");
                $this->Flash->success('Invoice added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));   

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
                $this->Flash->failure("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[2]);
               
            }
            else{
                $save = $this->Invoice->addInvoiceAdmin($invoices);
                $invoice_id = $this->Invoice->getInsertID();
                $logs['changes']=$changes;
                $logs['invoice_id']=$invoice_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Invoice->query("Update invoices set  user_id = $user_id  where id = $invoice_id");
                $this->Flash->success('Invoice added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));
                
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
                $this->Flash->failure("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[1]);
                
            }
            else{

                $save = $this->Invoice->addInvoiceAdmin($invoices);
                $invoice_id = $this->Invoice->getInsertID();
                $logs['changes']=$changes;
                $logs['invoice_id']=$invoice_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Invoice->query("Update invoices set  user_id = $user_id  where id = $invoice_id");
                $this->Flash->success('Invoice added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));
                
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
                $this->Flash->failure("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));

                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[0]);
                
            }
            else{
                $save = $this->Invoice->addInvoiceAdmin($invoices);
                $invoice_id = $this->Invoice->getInsertID();
                $logs['changes']=$changes;
                $logs['invoice_id']=$invoice_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Invoice->query("Update invoices set  user_id = $user_id  where id = $invoice_id");
                $this->Flash->success('Invoice added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));
               
            }  

        }
    }
}



////////////////////////////////////////////////////////////////////



public function admin_addtender() 
{
   $this->set('title','Add invoice');
     
    if($this->request->is('post'))
    {
        $invoices=$this->request->data;
       // print_r($invoices);
        $method=$invoices['Invoice']['payment_method'];
        $user_id=$invoices['Invoice']['user_id'];
        $amount_provided=$invoices['Invoice']['amount_provided'];
        $total=$invoices['Invoice']['total'];
        $amount= $amount_provided-$total;

        if ($amount < 0)
        {
            $this->Flash->failure("You entered a 'Tendered' amount that is less than the desired payment amount, please correct that.", array('key' => 'positive'));
            $this->redirect(array("controller" => "sales","action" => "transaction",$user_id,$method));
                        
               
        }
        $user = $this->User->query("SELECT * FROM users where id='$user_id'");
        foreach($user as $users) {
            $first_name = $users['users']['first_name'];
            $last_name = $users['users']['last_name'];
            $business_name = $users['users']['business_name'];
            $email = $users['users']['email'];

        }
        $name= $first_name.' '.$last_name.' '.$business_name.' '.$email;
        $save = $this->Invoice->addInvoiceAdmin($invoices);
        $invoice_id = $this->Invoice->getInsertID();
              //  echo $invoice_id;die();
        $this->Invoice->updateAll(array('name' => "'$name'"),array('id' => $invoice_id));
        // $this->Invoice->query("Update invoices set  name = $name  where id = $invoice_id");
        $this->Flash->success('Payment Successfull', array('key' => 'positive'));
        $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));   
    }
        

}



///////////////////////////////////////////////////////////////////////////////////

public function admin_editinginvoice($id){
    $this->set('title','Edit invoice');

    $invoice= $this->Invoice->findinvoicebyId($id); // Get invoice Detail from id
    //pr($invoice);
    $user_id = $invoice['Invoice']['user_id'];
    $Tickets= $this->Ticket->findTicketNameIdbyUserId($user_id);
    $Estimates= $this->Estimate->findEstimateIdbyUserId($user_id);
    //pr($Tickets);  die();
    $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        $changes = json_encode($this->request->data,$id);
                        
        $this->Invoice->editinvoicebyId($this->request->data,$id); // Edit User
        $logs['changes']=$changes;
        $logs['edit']="edit";
        $logs['invoice_id']=$id;
        $logs['employee']=$this->Session->read('Auth.User.email');
        $saveLog = $this->Log->addLog($logs);
        $this->Flash->success('Successfully Edited Invoice', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoicelist'));

        

    }
    $this->data = $invoice ;
    $this->set(compact('invoice'));
    $this->set(compact('product'));
    $this->set(compact('Tickets'));
    $this->set(compact('Estimates'));
}





////////////////////////////////////////////////////////////////////////////////

public function admin_deleteinvoice($id){
    $this->Invoice->deleteinvoice($id);
    $this->Flash->success('Invoice Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Invoices','action'=>'invoicelist'));
}


// /////////////////////////////////////////////////////////

public function admin_invoicelist()
{
    $this->set('title','invoice List');
    

    $Invoices = $this->Invoice->allInvoices();
    $this->set('Invoices', $Invoices);
    //print_r('products');



}
////////////////////////////////////////////////////////    

public function admin_invoicedetails($inv_id) {
    $this->set('title','invoice List');
    

    $Invoices = $this->Invoice->findInvoicebyId($inv_id);
    //pr($Invoices);die();
    $ticket_id = $Invoices["Invoice"]["ticket_id"];
    $user_id = $Invoices["Invoice"]["user_id"];
    $user = $this->User->findUserbyId($user_id);
    $sale = $this->Sale-> findSalebyInvoiceId($inv_id);
    $phone = $this->Phone->findbyUserid($user_id);
    //pr($Invoices);die();
    $Ticket = $this->Ticket->findTicketbyId($ticket_id);
    $comment = $this->Comment->findCommentbyTicketId($ticket_id);
    $logs = $this->Log->findLogByInvoiceId($inv_id);
    $Warranty = $this->Warranty->findWarrantybyInvoiceId($inv_id);

    //pr($Warranty);die();
    $this->set(compact('sale','Invoices','user','phone','Ticket','comment','logs','Warranty'));
   
   // $this->set('Inventory', $Inventory);
        
}

///////////////////////////////////////////////////
public function admin_invoiceview($id){
$this->set('title','Profile');
    $Invoice = $this->Invoice->findinvoicebyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Invoice->editinvoicebyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoiceview'));
    }
  //  $this->data = $invoice ; 
    $this->set('Invoice', $Invoice);
}
/////////////////////////////////////////////////


public function admin_invoice()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////



public function admin_invoiceupdate()
{

    $po_number =$this->request->data('po_number');
    $inv_id =$this->request->data('inv_id');
   
    if ($this->request->is('ajax'))
    {
       $this->Invoice->updateAll(array('po_number' => "'$po_number'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

    }
    exit();
        
  

}

/////////////////////////////////////////////////////////////


public function admin_updateinvoiceitem()
{

    $item =$this->request->data('item');
    $invoice_id =$this->request->data('invoice_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Invoice->updateAll(array('item' => "'$item'"),array('id' => $invoice_id));
       // $this->set('user', $user);
        

    }
    exit();
}

///////////////////////////////////////////////////////////////////


public function admin_updateinvoice()
{

    $total =$this->request->data('total');
    $invoice_id =$this->request->data('invoice_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Invoice->updateAll(array('total' => "'$total'"),array('id' => $invoice_id));
       // $this->set('user', $user);
        

    }
    exit();
        
  

}

//////////////////////////////////////////////////////////////////





public function admin_saleinvoiceupdateqty()
{

    $qty =$this->request->data('qty');
    $sale_id =$this->request->data('sale_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('quantity' => "'$qty'"),array('id' => $sale_id));
       // $this->set('user', $user);
        

    }
    exit();
}

//////////////////////////////////////////////////////////////////



public function admin_saleinvoiceupdatedes()
{

    $des =$this->request->data('des');
    $sale_id =$this->request->data('sale_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('description' => "'$des'"),array('id' => $sale_id));
       // $this->set('user', $user);
        

   }
   exit();
}


//////////////////////////////////////////////////////////////////



public function admin_saleinvoiceupdateitem()
{

    $item =$this->request->data('item');
    $sale_id =$this->request->data('sale_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('item' => "'$item'"),array('id' => $sale_id));
       // $this->set('user', $user);
        

   }
   exit();
}

//////////////////////////////////////////////////////////////////



public function admin_saleinvoiceupdaterate()
{

    $rt =$this->request->data('rt');
    $sale_id =$this->request->data('sale_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('rate' => "'$rt'"),array('id' => $sale_id));
       // $this->set('user', $user);
        

   }
   exit();
}

//////////////////////////////////////////////////////////////////


public function admin_inventory()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where product_name  like '%$data%'");
    
        $this->set('user', $user);
        

   }
        
  

}


/////////////////////////////////////////////////////////////////////////

public function admin_addsignature(){
   
    if($this->request->is('post'))
    {        
        $invoice=$this->request->data;
        //pr($invoice);die();
        $invoice_id=$invoice['invoice']['invoice_id'];
        $user_id=$invoice['invoice']['user_id'];
        $signature=$invoice['invoice']['signature'];
        $this->Invoice->updateAll(array('signature' => "'$signature'"),array('id' => $invoice_id));
        $this->Flash->success('Add Signature Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function admin_clearsignature($invoice_id){
   
        $this->Invoice->updateAll(array('signature' => "''"),array('id' => $invoice_id));
        $this->Flash->success('Signature Clear Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id));
    
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
    $this->layout="frontenduser";
    $this->set('title','Add invoice');
     
    if($this->request->is('post'))
    {
        $invoices=$this->request->data;
        $changes = json_encode($invoices);
        $name=$invoices['Invoice']['name'];
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
                $this->Flash->failure("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[3]);
       
            }
            else
            {
                $save = $this->Invoice->addInvoiceAdmin($invoices);
                $invoice_id = $this->Invoice->getInsertID();
                $logs['changes']=$changes;
                $logs['invoice_id']=$invoice_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);

                $this->Invoice->query("Update invoices set  user_id = $user_id  where id = $invoice_id");
                $this->Flash->success('Invoice added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));   

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
                $this->Flash->failure("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[2]);
               
            }
            else{
                $save = $this->Invoice->addInvoiceAdmin($invoices);
                $invoice_id = $this->Invoice->getInsertID();
                $logs['changes']=$changes;
                $logs['invoice_id']=$invoice_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Invoice->query("Update invoices set  user_id = $user_id  where id = $invoice_id");
                $this->Flash->success('Invoice added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));
                
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
                $this->Flash->failure("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[1]);
                
            }
            else{

                $save = $this->Invoice->addInvoiceAdmin($invoices);
                $invoice_id = $this->Invoice->getInsertID();
                $logs['changes']=$changes;
                $logs['invoice_id']=$invoice_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Invoice->query("Update invoices set  user_id = $user_id  where id = $invoice_id");
                $this->Flash->success('Invoice added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));
                
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
                $this->Flash->failure("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));

                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[0]);
                
            }
            else{
                $save = $this->Invoice->addInvoiceAdmin($invoices);
                $invoice_id = $this->Invoice->getInsertID();
                $logs['changes']=$changes;
                $logs['invoice_id']=$invoice_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Invoice->query("Update invoices set  user_id = $user_id  where id = $invoice_id");
                $this->Flash->success('Invoice added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));
               
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



public function addtender() 
{
    $this->layout="frontenduser";
   $this->set('title','Add invoice');
     
    if($this->request->is('post'))
    {
        $invoices=$this->request->data;
        //pr($invoices);die();
        $method=$invoices['Invoice']['payment_method'];
        $user_id=$invoices['Invoice']['user_id'];
        $amount_provided=$invoices['Invoice']['amount_provided'];
        $total=$invoices['Invoice']['total'];
        $amount= $amount_provided-$total;
        $invoices['Invoice']['login_id'] = $this->Auth->user('id');
        if ($amount < 0)
        {
            $this->Flash->failure("You entered a 'Tendered' amount that is less than the desired payment amount, please correct that.", array('key' => 'positive'));
            $this->redirect(array("controller" => "sales","action" => "transaction",$user_id,$method));
                        
               
        }
        $user = $this->User->query("SELECT * FROM users where id='$user_id'");
        foreach($user as $users) {
            $first_name = $users['users']['first_name'];
            $last_name = $users['users']['last_name'];
            $business_name = $users['users']['business_name'];
            $email = $users['users']['email'];

        }
        $name= $first_name.' '.$last_name.' '.$business_name.' '.$email;
        $save = $this->Invoice->addInvoiceAdmin($invoices);
        $invoice_id = $this->Invoice->getInsertID();
        //echo $invoice_id;die();
        $this->Invoice->updateAll(array('name' => "'$name'",'status' => 1),array('id' => $invoice_id));
        $saleproduct = $this->SaleProduct->findSaleProductbyUserId($user_id);
        //pr($sale);die();
        foreach($saleproduct as $saleproducts) {
           // pr($saleproducts);die();
            $user_id = $saleproducts['SaleProduct']['user_id'];
            $product_id = $saleproducts['SaleProduct']['product_id'];
            $item = $saleproducts['SaleProduct']['item'];
            $description = $saleproducts['SaleProduct']['description'];
            $upc_code = $saleproducts['SaleProduct']['upc_code'];
            $rate = $saleproducts['SaleProduct']['rate'];
            $cost = $saleproducts['SaleProduct']['cost'];
            $tax = $saleproducts['SaleProduct']['tax'];
            $tax_rate = $saleproducts['SaleProduct']['tax_rate'];
            $quantity = $saleproducts['SaleProduct']['quantity'];
            $user = $this->Sale->query("INSERT INTO sales (user_id,product_id,item,description,upc_code,rate,cost,tax,tax_rate,quantity,invoice_id) VALUES ('$user_id','$product_id','$item','$description','$upc_code','$rate','$cost','$tax','$tax_rate','$quantity','$invoice_id')");
        }
           $saleproduct = $this->SaleProduct->deleteSaleProductbyUserId($user_id);
        
        // $this->Invoice->query("Update invoices set  name = $name  where id = $invoice_id");
        $this->Flash->success('Payment Successfull', array('key' => 'positive'));
        $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));   
    }
        

}



///////////////////////////////////////////////////////////////////////////////////

public function editinginvoice($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Edit invoice');

    $invoice= $this->Invoice->findinvoicebyId($id); // Get invoice Detail from id
    //pr($invoice);
    $user_id = $invoice['Invoice']['user_id'];
    $Tickets= $this->Ticket->findTicketNameIdbyUserId($user_id);
    $Estimates= $this->Estimate->findEstimateIdbyUserId($user_id);
    //pr($Tickets);  die();
    $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        $invoice = $this->request->data;
        //pr($invoice);die();
        $ticket_id = $invoice['Invoice']['ticket_id'];   
        if($ticket_id!='')
        {
            $this->Ticket->updateAll(array('invoice_id' => "'$id'"),array('id' => $ticket_id));
        }
        $changes = json_encode($this->request->data,$id);
                        
        $this->Invoice->editinvoicebyId($this->request->data,$id); // Edit User
        $logs['changes']=$changes;
        $logs['edit']="edit";
        $logs['invoice_id']=$id;
        $logs['employee']=$this->Session->read('Auth.User.email');
        $saveLog = $this->Log->addLog($logs);
        $this->Flash->success('Successfully Edited Invoice', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoicelist'));

        

    }
    $this->data = $invoice ;
    $this->set(compact('invoice'));
    $this->set(compact('product'));
    $this->set(compact('Tickets'));
    $this->set(compact('Estimates'));

    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}





////////////////////////////////////////////////////////////////////////////////

public function deleteinvoice($id){
    $this->layout="frontenduser";
    $this->Invoice->deleteinvoice($id);
    $this->Flash->success('Invoice Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Invoices','action'=>'invoicelist'));
}


// /////////////////////////////////////////////////////////

public function invoicelist()
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','invoice List');

    $Invoices = $this->Invoice->findInvoicebyLoginId($this->Auth->user('id'));
    $this->set('Invoices', $Invoices);
    //print_r('products');

    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }

}
////////////////////////////////////////////////////////    

public function invoicedetails($inv_id) {
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','invoice List');
    
    $session_id = $this->Auth->user('id');
    $Invoices = $this->Invoice->findInvoicebyId($inv_id);
    //pr($Invoices);die();
    $ticket_id = $Invoices["Invoice"]["ticket_id"];
    $user_id = $Invoices["Invoice"]["user_id"];
    $user = $this->User->findUserbyId($user_id);
    $sale = $this->Sale-> findSalebyInvoiceId($inv_id);
    $phone = $this->Phone->findbyUserid($user_id);
    //pr($Invoices);die();
    $Ticket = $this->Ticket->findTicketbyId($ticket_id);
    $comment = $this->Comment->findCommentbyTicketId($ticket_id);
    $logs = $this->Log->findLogByInvoiceId($inv_id);
    $Warranty = $this->Warranty->findWarrantybyInvoiceId($inv_id);
    $Disclaimer = $this->Disclaimer->findInvoiceDisclaimerByUserId($session_id);
    $Login_user = $this->User->findUserbyId($session_id);
    $Invoice_Template = $this->Template->findInvoiceTemplateByUserId($session_id);

    $TransferLocation = $this->TransferLocation->findTransferLocationByUserId($session_id);
    $Location = array();
    if(!empty($TransferLocation))
    {
        $TransferLocationName = $TransferLocation['TransferLocation']['to_invoice'];
        $Location = $this->Multilocation->findMultilocationByUserIdAndName($session_id,$TransferLocationName);
        //pr($Location);die();
    }
    
    $this->set(compact('sale','Invoices','user','phone','Ticket','comment','logs','Warranty','Disclaimer','Login_user','Invoice_Template','Location'));
   
   // $this->set('Inventory', $Inventory);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
        
}

///////////////////////////////////////////////////
public function invoiceview($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Profile');
    $Invoice = $this->Invoice->findinvoicebyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Invoice->editinvoicebyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoiceview'));
    }
  //  $this->data = $invoice ; 
    $this->set('Invoice', $Invoice);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}
/////////////////////////////////////////////////


public function invoice()
{
    $this->layout="frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Auth->user('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where login_id = $session_id AND (first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%') AND role != 'staff'");
        //pr($user);die();
        $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////



public function invoiceupdate()
{
    $this->layout="frontenduser";
    $po_number =$this->request->data('po_number');
    $inv_id =$this->request->data('inv_id');
   
    if ($this->request->is('ajax'))
    {
       $this->Invoice->updateAll(array('po_number' => "'$po_number'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

    }
    exit();
        
  

}

/////////////////////////////////////////////////////////////


public function updateinvoiceitem()
{
    $this->layout="frontenduser";
    $item =$this->request->data('item');
    $invoice_id =$this->request->data('invoice_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Invoice->updateAll(array('item' => "'$item'"),array('id' => $invoice_id));
       // $this->set('user', $user);
        

    }
    exit();
}

///////////////////////////////////////////////////////////////////


public function updateinvoice()
{
    $this->layout="frontenduser";
    $total =$this->request->data('total');
    $invoice_id =$this->request->data('invoice_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Invoice->updateAll(array('total' => "'$total'"),array('id' => $invoice_id));
       // $this->set('user', $user);
        

    }
    exit();
        
  

}

//////////////////////////////////////////////////////////////////





public function saleinvoiceupdateqty()
{
    $this->layout="frontenduser";
    $qty =$this->request->data('qty');
    $sale_id =$this->request->data('sale_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('quantity' => "'$qty'"),array('id' => $sale_id));
       // $this->set('user', $user);
        

    }
    exit();
}

//////////////////////////////////////////////////////////////////



public function saleinvoiceupdatedes()
{
    $this->layout="frontenduser";
    $des =$this->request->data('des');
    $sale_id =$this->request->data('sale_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('description' => "'$des'"),array('id' => $sale_id));
       // $this->set('user', $user);
        

   }
   exit();
}


//////////////////////////////////////////////////////////////////



public function saleinvoiceupdateitem()
{
    $this->layout="frontenduser";
    $item =$this->request->data('item');
    $sale_id =$this->request->data('sale_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('item' => "'$item'"),array('id' => $sale_id));
       // $this->set('user', $user);
        

   }
   exit();
}

//////////////////////////////////////////////////////////////////



public function saleinvoiceupdaterate()
{
    $this->layout="frontenduser";
    $rt =$this->request->data('rt');
    $sale_id =$this->request->data('sale_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('rate' => "'$rt'"),array('id' => $sale_id));
       // $this->set('user', $user);
        

   }
   exit();
}

//////////////////////////////////////////////////////////////////


public function inventory()
{
    $this->layout="frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Auth->user('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where login_id = $session_id AND product_name  like '%$data%'");
    
        $this->set('user', $user);
        

   }
        
  

}


/////////////////////////////////////////////////////////////////////////

public function addsignature(){
    $this->layout="frontenduser";
    if($this->request->is('post'))
    {        
        $invoice=$this->request->data;
        //pr($invoice);die();
        $invoice_id=$invoice['invoice']['invoice_id'];
        $user_id=$invoice['invoice']['user_id'];
        $signature=$invoice['invoice']['signature'];
        $this->Invoice->updateAll(array('signature' => "'$signature'"),array('id' => $invoice_id));
        $this->Flash->success('Add Signature Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function clearsignature($invoice_id){
    $this->layout="frontenduser";
        $this->Invoice->updateAll(array('signature' => "''"),array('id' => $invoice_id));
        $this->Flash->success('Signature Clear Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id));
    
}



//////////////////////////////////////////////////////////////////////////

public function payment_form($user_id,$inv_id){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $Invoices = $this->Invoice->findUnpaidInvoicebyUserId($user_id);
    $User     = $this->User->findUserbyId($user_id);
    //pr($Invoices);die();
        
    $this->set(compact('Invoices','inv_id','User'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

public function addpayment(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    if($this->request->is('post'))
    {        
        $invoice=$this->request->data;
        $user_session_id = $this->Auth->user('id');
        $invoice['InvoicePayment']['login_id'] = $user_session_id;
        //pr($invoice);die();

        $data = $this->InvoicePayment->addInvoicePaymentAdmin($invoice);
        $InvPayment_id = $this->InvoicePayment->getInsertID();
        $this->Flash->success('Payment Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Invoices','action'=>'payments',$InvPayment_id));
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


//////////////////////////////////////////////////////////////////


public function payments($InvPayment_id)
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $InvoicePayment = $this->InvoicePayment->findInvoicePaymentbyId($InvPayment_id);
    $user_id = $InvoicePayment['InvoicePayment']['user_id'];
    $User     = $this->User->findUserbyId($user_id);
    $this->set(compact('InvoicePayment','User'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }

}

//////////////////////////////////////////////////////////////////


public function updateinvoicebypayment()
{
    $this->layout="frontenduser";
    $amount_to_pay =$this->request->data('amount_to_pay');
    $invoiceid =$this->request->data('invoiceid');
    if ($this->request->is('ajax'))
    {
        $invoice= $this->Invoice->findinvoicebyId($invoiceid);
        //echo $amount_to_pay;pr($invoice);die();
        if(!empty($invoice))
        {
            $total = $invoice['Invoice']['total'];
            $today = date('Y-m-d');
            if($total <= $amount_to_pay)
            {
                $this->Invoice->updateAll(array('status' => '1','paid_date' => "'$today'"),array('id' => $invoiceid));
            }
        }
    
    
        $this->Invoice->updateAll(array('paid_amount' => $amount_to_pay),array('id' => $invoiceid));
    }
        
    exit();

}


/////////////////////////////////////////////////////////////////////////

public function addinvoicepaymentsignature(){
    $this->layout="frontenduser";
    if($this->request->is('post'))
    {        
        $invoice=$this->request->data;
       // pr($invoice);die();
        $payment_invoice_id = $invoice['InvoicePayment']['payment_invoice_id'];
        $signature          = $invoice['InvoicePayment']['signature'];
        $invoice_id         = $invoice['InvoicePayment']['invoice_id'];
        $invoice_new_id     = '';
        //pr($invoice_id);
        $myinvoice_id = explode(',', $invoice_id);
        for($i=0;$i<count($myinvoice_id);$i++)
        {
           $last_invoice_id = $myinvoice_id[$i];
        }
        $this->InvoicePayment->updateAll(array('signature' => "'$signature'"),array('id' => $payment_invoice_id));
        //$this->Flash->success('Add Signature Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoicedetails',$last_invoice_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function clearinvoicepaymentsignature($invoice_id){
    $this->layout="frontenduser";
        $this->InvoicePayment->updateAll(array('signature' => "''"),array('id' => $invoice_id));
        $this->Flash->success('Signature Clear Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id));
    
}



}