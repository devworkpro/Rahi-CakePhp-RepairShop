<?php
App::uses('AppController', 'Controller');
class SalesController extends AppController { 

public $uses = array('Sale','Vehicle','Customer','Draft','Product','User','Invoice','Warranty','SaleProduct');



public function admin_add() 
{
   
    $this->set('title','Add Sale');


    if($this->request->is('post'))
    {
        
        $customer = $this->request->data;
        $name= $customer['Sales']['name'];
        $userid= $customer['Sales']['user_id'];
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
                $this->Flash->failure("Sorry $name hasn't been set as a customer yet!", array('key' => 'positive'));
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$userid,0));
       
            }
            else
            {
                
                $user = $this->Sale->query("Update sales set  user_id = $user_id  where user_id = $userid");
                $this->Flash->success('We attached the transaction to that customer!', array('key' => 'positive'));
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0)); 

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  and email='$user[2]' ");
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
           if(empty($user))
            {
                $this->Flash->failure("Sorry $name hasn't been set as a customer yet!", array('key' => 'positive'));
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$userid,0));
       
            }
            else
            {
                $this->Flash->success('We attached the transaction to that customer!', array('key' => 'positive'));
                $user = $this->Sale->query("Update sales set  user_id = $user_id  where user_id = $userid");
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0)); 

            }  

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[1]'  and email='$user[1]' ");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
            if(empty($user))
            {
                $this->Flash->failure("Sorry $name hasn't been set as a customer yet!", array('key' => 'positive'));
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$userid,0));
       
            }
            else
            {
                $this->Flash->success('We attached the transaction to that customer!', array('key' => 'positive'));
                $user = $this->Sale->query("Update sales set  user_id = $user_id  where user_id = $userid");
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0)); 

            }  

        }
        else
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$name' and last_name='$name' and business_name='$name'  and email='$name' ");
          foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
           if(empty($user))
            {
                $this->Flash->failure("Sorry $name hasn't been set as a customer yet!", array('key' => 'positive'));
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$userid,0));
       
            }
            else
            {
                $this->Flash->success('We attached the transaction to that customer!', array('key' => 'positive'));
                $user = $this->Sale->query("Update sales set  user_id = $user_id  where user_id = $userid");
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0)); 

            }  

        }
    }
}



////////////////////////////////////////////////////////////////////


public function admin_addsale()
{

   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
 
        $item = $inventory['Sale']['item'];
        $sales_id = $inventory['Sale']['sales_id'];
        $user_id = $inventory['Sale']['user_id'];
        $quantity = $inventory['Sale']['quantity'];

        $Inventory = $this->Product->findProductbyIdName($item);
     
        
       
        

        if (empty($Inventory)) {
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

             return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,$sales_id));

            
        }
        else
        {
            $product_name=$Inventory['Product']['product_name'];
            $pro_id=$Inventory['Product']['id'];
            $description=$Inventory['Product']['description'];
            $rate=$Inventory['Product']['price_retail'];
            $cost=$Inventory['Product']['price_cost'];
            $upc_code=$Inventory['Product']['upc_code'];

       
         $user = $this->Sale->query("INSERT INTO sales (user_id,product_id,item,description,upc_code,rate,cost,quantity) VALUES ('$user_id','$pro_id','$product_name','$description','$upc_code','$rate','$cost','$quantity')");
         return $this->redirect(array('controller'=>'Sales','action'=>'saleview',$user_id,$sales_id));

        }
          
    }
        
  

}


////////////////////////////////////////////////////////////////////




public function admin_addsaleinvoice()
{

   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
 
        $item = $inventory['Sale']['item'];
        $invoice_id = $inventory['Sale']['invoice_id'];
        $user_id = $inventory['Sale']['user_id'];
        $quantity = $inventory['Sale']['quantity'];

        $Inventory = $this->Product->findProductbyIdName($item);

        if (empty($Inventory)) 
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

            return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));
            
        
        }
        else{

            $pro_id=$Inventory['Product']['id'];
            $description=$Inventory['Product']['description'];
            $rate=$Inventory['Product']['price_retail'];
            $cost=$Inventory['Product']['price_cost'];
            $upc_code=$Inventory['Product']['upc_code'];
            $product_name=$Inventory['Product']['product_name'];
            $warranty =$Inventory['Product']['warranty_template'];
            
            $user = $this->Sale->query("INSERT INTO sales (user_id,product_id,invoice_id,item,description,upc_code,rate,cost,quantity) VALUES ('$user_id','$pro_id','$invoice_id','$product_name','$description','$upc_code','$rate','$cost','$quantity')");

            $warranty_information = "We warrant the Product against defects in materials and workmanship under ordinary consumer use for one year from the date of original retail purchase. During this warranty period, if a defect/problem arises in the Product, and you report the problem to us about the Product, we will, at your option, to the extent permitted by law, either repair the Product using either new or refurbished parts that you pay for, or offer some value of store credit that we deem reasonable based on the circumstances.

This limited warranty applies, to the extent permitted by law, to any repair, replacement part or replacement device for the remainder of the original warranty period or for ninety days, whichever period is longer. All replaced parts and Product for which a refund is given shall become our property. This limited warranty applies only to hardware components of the Product that are not subject to accident, misuse, neglect, fire or other external causes, alterations, repair, or commercial use.";

            $expiration_date = date('m/d/Y', strtotime('+1 years'));
            $created = date('m/d/Y');
            $number = rand(10,1000);
            $session_id = $this->Auth->user('id');
            if($warranty!="")
            {
                $this->Warranty->query("INSERT INTO warranties (login_id,user_id,invoice_id,certificate_num,name,warranty_information,expiration_date,created) VALUES ('$session_id','$user_id','$invoice_id','$number','$warranty','$warranty_information','$expiration_date','$created')");
            }

         return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));

        }
        
          
    }
        
  

}



    
////////////////////////////////////////////////////////////////////






public function admin_addsalesbyupc()
{

   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
        //print_r($inventory);die();
        $item = $inventory['Sales']['upc_code'];
        $user_id = $inventory['Sales']['user_id'];
        $sale_id = $inventory['Sales']['sale_id'];
        $quantity = $inventory['Sales']['quantity'];
        $Inventory = $this->Product->findProductbyIdUpccode($item);
        //print_r($Inventory);die();
     //   $user = explode(",", $item);
        
        if (empty($Inventory)) {

            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

            return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,$sale_id));

           
        }
        else
        {
            $upc_code=$Inventory['Product']['upc_code'];
            $pro_id=$Inventory['Product']['id'];
            $name=$Inventory['Product']['product_name'];
            $description=$Inventory['Product']['description'];
            $rate=$Inventory['Product']['price_retail'];
            $cost=$Inventory['Product']['price_cost'];
      //  echo $pro_id;
      //  echo $description;
      //  echo $rate;
     //  print_r($Inventory);die();
      //  echo $item;
       // echo $user_id; die();
       
         $user = $this->Sale->query("INSERT INTO sales (user_id,product_id,item,description,upc_code,rate,cost,quantity) VALUES ('$user_id','$pro_id','$name','$description','$upc_code','$rate','$cost','$quantity')");
         return $this->redirect(array('controller'=>'Sales','action'=>'saleview',$user_id,$sale_id));

        }
        
    }
        
  

}





/////////////////////////////////////////////////




public function admin_addsalesinvoicebyupc()
{

   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
        
        $item = $inventory['Sales']['upc_code'];
        $user_id = $inventory['Sales']['user_id'];
        $invoice_id = $inventory['Sales']['invoice_id'];
        $quantity = $inventory['Sales']['quantity'];
        $Inventory = $this->Product->findProductbyIdUpccode($item);
        
        
        if (empty($Inventory)) {
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));

            

        }
        else
        {
            $upc_code=$Inventory['Product']['upc_code'];
            
            if ($item==$upc_code) {

                $pro_id=$Inventory['Product']['id'];
                $description=$Inventory['Product']['description'];
                $name=$Inventory['Product']['product_name'];
                $rate=$Inventory['Product']['price_retail'];
                $cost=$Inventory['Product']['price_cost'];
                $warranty =$Inventory['Product']['warranty_template'];
                
                $user = $this->Sale->query("INSERT INTO sales (user_id,product_id,invoice_id,item,description,upc_code,rate,cost,quantity) VALUES ('$user_id','$pro_id','$invoice_id','$name','$description','$upc_code','$rate','$cost','$quantity')");

                $warranty_information = "We warrant the Product against defects in materials and workmanship under ordinary consumer use for one year from the date of original retail purchase. During this warranty period, if a defect/problem arises in the Product, and you report the problem to us about the Product, we will, at your option, to the extent permitted by law, either repair the Product using either new or refurbished parts that you pay for, or offer some value of store credit that we deem reasonable based on the circumstances.

This limited warranty applies, to the extent permitted by law, to any repair, replacement part or replacement device for the remainder of the original warranty period or for ninety days, whichever period is longer. All replaced parts and Product for which a refund is given shall become our property. This limited warranty applies only to hardware components of the Product that are not subject to accident, misuse, neglect, fire or other external causes, alterations, repair, or commercial use.";
                $session_id = $this->Auth->user('id');
                $expiration_date = date('m/d/Y', strtotime('+1 years'));
                $number = rand(10,1000);
                $created = date('m/d/Y');
                if($warranty!="")
                {
                    $this->Warranty->query("INSERT INTO warranties (login_id,user_id,invoice_id,certificate_num,name,warranty_information,expiration_date,created) VALUES ('$session_id',$user_id','$invoice_id','$number','$warranty','$warranty_information','$expiration_date','$created')");
                }
                return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));

            }

           
     
        
        }
        
    }
        
  

}





/////////////////////////////////////////////////




public function admin_addsalemanualy()
{

   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
        $text = $inventory['Sale']['text'];
        $item = $inventory['Sale']['item'];
        //$sales_id = $inventory['Sale']['sales_id'];
        $user_id = $inventory['Sale']['user_id'];
        $quantity = $inventory['Sale']['quantity'];
        $description = $inventory['Sale']['description'];
        $cost = $inventory['Sale']['cost'];
        $rate = $inventory['Sale']['rate'];
       
         $tax = $inventory['Sale']['tax'];

         if($text=='invoice')
         {

            $invoice_id = $inventory['Sale']['invoice_id'];
            $user = $this->Sale->query("INSERT INTO sales (user_id,invoice_id,item,description,rate,cost,quantity,tax) VALUES ('$user_id','$invoice_id','$item','$description','$rate','$cost','$quantity','$tax')");

            return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));}
         else
         {

            $sales_id = $inventory['Sale']['sales_id'];
            $user = $this->Sale->query("INSERT INTO sales (user_id,sales_id,item,description,rate,cost,quantity,tax) VALUES ('$user_id','$sales_id','$item','$description','$rate','$cost','$quantity','$tax')");

            return $this->redirect(array('controller'=>'Sales','action'=>'saleview',$user_id,$sales_id));      

         }
    //    print_r($inventory);die();
        
       


    }
        
  

}

////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////
public function admin_saleedit($id){
	$this->set('title','Edit Sale');

	$Sale= $this->Sale->findSalebyId($id); // Get Sale Detail from id
	$prevProfilePic = $Sale['Sale']['image'];
	
	if($this->request->is('post'))
	{ 
			$serial =  $this->request->data['serial'];
 			$pro =  $this->request->data['Sale'];

		//echo "<pre>"; print_r($this->request->data); die();
		$this->Sale->editSalebyId($this->request->data,$id); // Edit Sale
		$this->Sale->editSalebyId($this->request->data['serial'],$id); // Edit Sale
		$this->Flash->success('Sale Edited Successfully', array('key' => 'positive'));		
		return $this->redirect(array('controller'=>'Sales','action'=>'Salelist'));

		

	}
	$this->data = $Sale ;
	$this->set(compact('Sale'));
}


public function admin_deletesale($id,$user_id,$sales_id){
	$this->Sale->deleteSale($id);
	$this->Flash->success('Item Deleted Successfully', array('key' => 'positive'));	
  return $this->redirect(array('controller'=>'Sales','action'=>'saleview',$user_id,$sales_id));



}

public function admin_deletesaleitem($id,$invoice_id){
    $this->Sale->deleteSale($id);
    $this->Flash->success('Item Deleted Successfully', array('key' => 'positive')); 
  return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));



}

public function admin_salelist()
{
	$this->set('title','Sale List');
    

	$Sales = $this->Sale->allSales();
	$this->set('Sales', $Sales);

}
////////////////////////////////////////////////////////
public function admin_wpshow()
	 {
	 	
	 	if($this->request->is('post'))
	 	{
		
		$cust=$this->request->data['Sale']['cust_id'];
		$vech=$this->request->data['Sale']['vech_id'];
		$Sale= $this->Customer->findCustomerbyId($vech);
		$Sale1= $this->Vehicle->findVehiclebyId($cust);
		//$save=new array();

         $save['vehicle_id']=$this->request->data['Sale']['cust_id'];
         $save['Customer_id']=$this->request->data['Sale']['vech_id'];

         if(isset($this->request->data['Sale1'])){
         $save['Sale1']=$this->request->data['Sale1'];
         $Sale = $this->Sale->findSalebyId($save['Sale1']);
         $quantity=$Sale['Sale']['quantity']-1;
         $this->Sale->id = $save['Sale1'];
         $this->Sale->saveField('quantity',$quantity);



         }
         if(isset($this->request->data['Sale2'])){
         $save['Sale2']=$this->request->data['Sale2'];
         $Sale = $this->Sale->findSalebyId($save['Sale2']);
         $quantity=$Sale['Sale']['quantity']-1;
         $this->Sale->id = $save['Sale2'];
         $this->Sale->saveField('quantity',$quantity);
         }  
         if(isset($this->request->data['Sale3'])){
         $save['Sale3']=$this->request->data['Sale3'];
         $Sale = $this->Sale->findSalebyId($save['Sale3']);
         $quantity=$Sale['Sale']['quantity']-1;
         $this->Sale->id = $save['Sale3'];
         $this->Sale->saveField('quantity',$quantity);
         }  
          if(isset($this->request->data['Sale4'])){
         $save['Sale4']=$this->request->data['Sale4'];
         $Sale = $this->Sale->findSalebyId($save['Sale4']);
         $quantity=$Sale['Sale']['quantity']-1;
          $this->Sale->id = $save['Sale4'];
          $this->Sale->saveField('quantity',$quantity);
         }  
         if(isset($this->request->data['Sale5'])){
         $save['Sale5']=$this->request->data['Sale5'];
         $Sale = $this->Sale->findSalebyId($save['Sale5']);
         $quantity=$Sale['Sale']['quantity']-1;
         $this->Sale->id = $save['Sale5'];
         $this->Sale->saveField('quantity',$quantity);

         }  
		 $save['name']="W".$cust."RJ".$vech;
         $new['Draft']=$save;
		//print_r($new);
		if($this->Draft->save($new))
		{
         $draft_id=$this->Draft->getLastInsertID();
		return $this->redirect(array('controller'=>'warranty','action'=>'warrantydraft',$draft_id));
		}
	
	}
	}

public function admin_Salefetch(){

	if($this->request->is('post')){
		//echo '<pre>';print_r($this->request->data);
		$data = $this->request->data['search'];
		$this->paginate = array(
	    'limit' => 1,
		'order' => array('id' => 'asc'),
		'conditions' => array(
									'OR' => array(
												array('Sale.Sale_name LIKE' => '%'.$data.'%'),
												array('Sale.description LIKE' => '%'.$data.'%'),
												array('Sale.category LIKE' => '%'.$data.'%'),
												array('Sale.price LIKE' => '%'.$data.'%'),
												//array('User.email LIKE' => '%'.$data.'%')
											)
										)
	);		
		$Sales = $this->paginate('Sale'); 

		echo json_encode($Sales);



	}
	$this->autoRender = false;


}

///////////////////////////////////////////////////



public function admin_saleview($userid,$salesid){
	$this->set('title','Profile');
	
	$products = $this->Product->allProducts();

	//print_r($products);die();
	$this->set('products', $products);

	$this->set('userid', $userid);$this->set('salesid', $salesid);

 //$sale = $this->Sale-> allSales();
//  print_r($sale);
   $sale = $this->Sale-> findSalebyUserId($userid);
   $this->set('sale', $sale);

  $username = $this->User-> findUserNamebyUserId($userid);
   $this->set('username', $username);
 // print_r($username);

}

/////////////////////////////////////////////////////////





public function serial()
{
	 $serial= $this->Serial->set($this->request->data);

	  	pr($serial);die();
	  	 if($this->request->is('post')){
        

      
      
}


}

//////////////////////////////////////////////////






public function admin_lineitem()
{
	$pro_id =$this->request->data('pro_id');
  $user_id =$this->request->data('userid');
//echo $userid;die();
	$product = $this->Product->findProductbyId($pro_id);

  $product_name=$product['Product']['product_name'];
  $upc_code=$product['Product']['upc_code'];
  $description=$product['Product']['description'];
  $rate=$product['Product']['price_retail'];
  $cost=$product['Product']['price_cost'];
  
  $user = $this->Sale->query("INSERT INTO sales (product_id,user_id,item,description,upc_code,rate,cost,quantity) VALUES ('$pro_id','$user_id','$product_name','$description','$upc_code','$rate','$cost','1')");


	// print_r($product) ;  die();
	//	$this->set('product', $product);



}





///////////////////////////////////////////////////




public function admin_customer()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}

///////////////////////////////////////////////////




public function admin_customer1()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  = '$data'");
    
        $this->set('user', $user);
        

   }
        
  

}



///////////////////////////////////////////////////

public function admin_inventory()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where product_name  like '%$data%'");
    
        $this->set('user', $user);
        

   }
        
  

}




///////////////////////////////////////////////////


public function admin_inventoryupdate()
{

    $qty =$this->request->data('qty');
    $inv_id =$this->request->data('inv_id');
   echo $qty;
   echo $inv_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('quantity' => "'$qty'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
        
  

}


///////////////////////////////////////////////////

public function admin_deleteinventory()
{

    $userid =$this->request->data('userid');
    
   echo $userid;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->deleteAll(array('user_id' => $userid));
    
       // $this->set('user', $user);
        

   }
        
  

}



///////////////////////////////////////////////////



public function admin_transaction($userid,$method)
{

    $sale = $this->Sale-> findSalebyUserId($userid);
    //print_r($sale);die();
    $this->set('sale', $sale);
    $this->set('userid', $userid);
    $this->set('method', $method);
  

}




///////////////////////////////////////////////////




public function admin_payment($userid,$method)
{

    $sale = $this->Sale-> findSalebyUserId($userid);

    $user = $this->User->query("SELECT * FROM users where id  = '$userid'");
    //print_r($user);die();
    $this->set('user', $user);
    //print_r($sale);die();
    $this->set('sale', $sale);
    $this->set('userid', $userid);
    $this->set('method', $method);
  
}

/**********************************************************************************/
/*********************************User Section*************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/




public function add() 
{
    $this->layout="frontenduser";
    $this->set('title','Add Sale');


    if($this->request->is('post'))
    {
        
        $customer = $this->request->data;
        $name= $customer['Sales']['name'];
        $userid= $customer['Sales']['user_id'];
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
                $this->Flash->failure("Sorry $name hasn't been set as a customer yet!", array('key' => 'positive'));
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$userid,0));
       
            }
            else
            {
                
                $user = $this->Sale->query("Update sales set  user_id = $user_id  where user_id = $userid");
                $this->Flash->success('We attached the transaction to that customer!', array('key' => 'positive'));
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0)); 

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  and email='$user[2]' ");
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
           if(empty($user))
            {
                $this->Flash->failure("Sorry $name hasn't been set as a customer yet!", array('key' => 'positive'));
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$userid,0));
       
            }
            else
            {
                $this->Flash->success('We attached the transaction to that customer!', array('key' => 'positive'));
                $user = $this->Sale->query("Update sales set  user_id = $user_id  where user_id = $userid");
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0)); 

            }  

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[1]'  and email='$user[1]' ");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
            if(empty($user))
            {
                $this->Flash->failure("Sorry $name hasn't been set as a customer yet!", array('key' => 'positive'));
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$userid,0));
       
            }
            else
            {
                $this->Flash->success('We attached the transaction to that customer!', array('key' => 'positive'));
                $user = $this->Sale->query("Update sales set  user_id = $user_id  where user_id = $userid");
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0)); 

            }  

        }
        else
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$name' and last_name='$name' and business_name='$name'  and email='$name' ");
          foreach($user as $users) {
            $user_id = $users['users']['id'];
            
           }
           if(empty($user))
            {
                $this->Flash->failure("Sorry $name hasn't been set as a customer yet!", array('key' => 'positive'));
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$userid,0));
       
            }
            else
            {
                $this->Flash->success('We attached the transaction to that customer!', array('key' => 'positive'));
                $user = $this->Sale->query("Update sales set  user_id = $user_id  where user_id = $userid");
                return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0)); 

            }  

        }
    }
}



////////////////////////////////////////////////////////////////////


public function addsale()
{
    $this->layout="frontenduser";
   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
 
        $item = $inventory['Sale']['item'];
        $sales_id = $inventory['Sale']['sales_id'];
        $user_id = $inventory['Sale']['user_id'];
        $quantity = $inventory['Sale']['quantity'];

        $session_id = $this->Session->read('Auth.User.id');
        $Inventory = $this->Product->findProductbyNameAndLoginId($item,$session_id);
        
       
        

        if (empty($Inventory)) {
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

             return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,$sales_id));

            
        }
        else
        {
            $product_name=$Inventory['Product']['product_name'];
            $pro_id=$Inventory['Product']['id'];
            $description=$Inventory['Product']['description'];
            $rate=$Inventory['Product']['price_retail'];
            $cost=$Inventory['Product']['price_cost'];
            $upc_code=$Inventory['Product']['upc_code'];

       
         $user = $this->SaleProduct->query("INSERT INTO sale_products (user_id,product_id,item,description,upc_code,rate,cost,quantity) VALUES ('$user_id','$pro_id','$product_name','$description','$upc_code','$rate','$cost','$quantity')");
         return $this->redirect(array('controller'=>'Sales','action'=>'saleview',$user_id,$sales_id));

        }
          
    }
        
  

}


////////////////////////////////////////////////////////////////////




public function addsaleinvoice()
{
    $this->layout="frontenduser";
   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
 
        $item = $inventory['Sale']['item'];
        $invoice_id = $inventory['Sale']['invoice_id'];
        $user_id = $inventory['Sale']['user_id'];
        $quantity = $inventory['Sale']['quantity'];

        $session_id = $this->Session->read('Auth.User.id');
        $Inventory = $this->Product->findProductbyNameAndLoginId($item,$session_id);
        

        if (empty($Inventory)) 
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

            return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));
            
        
        }
        else{

            $pro_id=$Inventory['Product']['id'];
            $description=$Inventory['Product']['description'];
            $rate=$Inventory['Product']['price_retail'];
            $cost=$Inventory['Product']['price_cost'];
            $upc_code=$Inventory['Product']['upc_code'];
            $product_name=$Inventory['Product']['product_name'];
            $warranty =$Inventory['Product']['warranty_template'];
            
            $user = $this->Sale->query("INSERT INTO sales (user_id,product_id,invoice_id,item,description,upc_code,rate,cost,quantity) VALUES ('$user_id','$pro_id','$invoice_id','$product_name','$description','$upc_code','$rate','$cost','$quantity')");

            $warranty_information = "We warrant the Product against defects in materials and workmanship under ordinary consumer use for one year from the date of original retail purchase. During this warranty period, if a defect/problem arises in the Product, and you report the problem to us about the Product, we will, at your option, to the extent permitted by law, either repair the Product using either new or refurbished parts that you pay for, or offer some value of store credit that we deem reasonable based on the circumstances.

This limited warranty applies, to the extent permitted by law, to any repair, replacement part or replacement device for the remainder of the original warranty period or for ninety days, whichever period is longer. All replaced parts and Product for which a refund is given shall become our property. This limited warranty applies only to hardware components of the Product that are not subject to accident, misuse, neglect, fire or other external causes, alterations, repair, or commercial use.";
            $session_id = $this->Auth->user('id');
            $expiration_date = date('m/d/Y', strtotime('+1 years'));
            $created = date('m/d/Y');
            $number = rand(10,1000);
            
            if($warranty!="")
            {
                $this->Warranty->query("INSERT INTO warranties (login_id,user_id,invoice_id,certificate_num,name,warranty_information,expiration_date,created) VALUES ('$session_id','$user_id','$invoice_id','$number','$warranty','$warranty_information','$expiration_date','$created')");
            }

         return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));

        }
        
          
    }
        
  

}



    
////////////////////////////////////////////////////////////////////






public function addsalesbyupc()
{
    $this->layout="frontenduser";
   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
        //print_r($inventory);die();
        $item = $inventory['Sales']['upc_code'];
        $user_id = $inventory['Sales']['user_id'];
        $sale_id = $inventory['Sales']['sale_id'];
        $quantity = $inventory['Sales']['quantity'];

        $session_id = $this->Session->read('Auth.User.id');
        $Inventory = $this->Product->findProductbyUpccodeAndLoginId($item,$session_id);
        
        //$Inventory = $this->Product->findProductbyIdUpccode($item);
        //print_r($Inventory);die();
     //   $user = explode(",", $item);
        
        if (empty($Inventory)) {

            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

            return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,$sale_id));

           
        }
        else
        {
            $upc_code=$Inventory['Product']['upc_code'];
            $pro_id=$Inventory['Product']['id'];
            $name=$Inventory['Product']['product_name'];
            $description=$Inventory['Product']['description'];
            $rate=$Inventory['Product']['price_retail'];
            $cost=$Inventory['Product']['price_cost'];
      //  echo $pro_id;
      //  echo $description;
      //  echo $rate;
     //  print_r($Inventory);die();
      //  echo $item;
       // echo $user_id; die();
       
         $user = $this->SaleProduct->query("INSERT INTO sale_products (user_id,product_id,item,description,upc_code,rate,cost,quantity) VALUES ('$user_id','$pro_id','$name','$description','$upc_code','$rate','$cost','$quantity')");
         return $this->redirect(array('controller'=>'Sales','action'=>'saleview',$user_id,$sale_id));

        }
        
    }
        
  

}





/////////////////////////////////////////////////




public function addsalesinvoicebyupc()
{
    $this->layout="frontenduser";
   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
        
        $item = $inventory['Sales']['upc_code'];
        $user_id = $inventory['Sales']['user_id'];
        $invoice_id = $inventory['Sales']['invoice_id'];
        $quantity = $inventory['Sales']['quantity'];
        //$Inventory = $this->Product->findProductbyIdUpccode($item);
        $session_id = $this->Session->read('Auth.User.id');
        $Inventory = $this->Product->findProductbyUpccodeAndLoginId($item,$session_id);
        
        
        if (empty($Inventory)) {
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));

            

        }
        else
        {
            $upc_code=$Inventory['Product']['upc_code'];
            
            if ($item==$upc_code) {

                $pro_id=$Inventory['Product']['id'];
                $description=$Inventory['Product']['description'];
                $name=$Inventory['Product']['product_name'];
                $rate=$Inventory['Product']['price_retail'];
                $cost=$Inventory['Product']['price_cost'];
                $warranty =$Inventory['Product']['warranty_template'];
                
                $user = $this->Sale->query("INSERT INTO sales (user_id,product_id,invoice_id,item,description,upc_code,rate,cost,quantity) VALUES ('$user_id','$pro_id','$invoice_id','$name','$description','$upc_code','$rate','$cost','$quantity')");

                $warranty_information = "We warrant the Product against defects in materials and workmanship under ordinary consumer use for one year from the date of original retail purchase. During this warranty period, if a defect/problem arises in the Product, and you report the problem to us about the Product, we will, at your option, to the extent permitted by law, either repair the Product using either new or refurbished parts that you pay for, or offer some value of store credit that we deem reasonable based on the circumstances.

This limited warranty applies, to the extent permitted by law, to any repair, replacement part or replacement device for the remainder of the original warranty period or for ninety days, whichever period is longer. All replaced parts and Product for which a refund is given shall become our property. This limited warranty applies only to hardware components of the Product that are not subject to accident, misuse, neglect, fire or other external causes, alterations, repair, or commercial use.";
                $session_id = $this->Auth->user('id');
                $expiration_date = date('m/d/Y', strtotime('+1 years'));
                $number = rand(10,1000);
                $created = date('m/d/Y');
                if($warranty!="")
                {
                    $this->Warranty->query("INSERT INTO warranties (login_id,user_id,invoice_id,certificate_num,name,warranty_information,expiration_date,created) VALUES ('$session_id','$user_id','$invoice_id','$number','$warranty','$warranty_information','$expiration_date','$created')");
                }
                return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));

            }

           
     
        
        }
        
    }
        
  

}





/////////////////////////////////////////////////




public function addsalemanualy()
{
    $this->layout="frontenduser";
   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
        $text = $inventory['Sale']['text'];
        $item = $inventory['Sale']['item'];
        //$sales_id = $inventory['Sale']['sales_id'];
        $user_id = $inventory['Sale']['user_id'];
        $quantity = $inventory['Sale']['quantity'];
        $description = $inventory['Sale']['description'];
        $cost = $inventory['Sale']['cost'];
        $rate = $inventory['Sale']['rate'];
       
         $tax = $inventory['Sale']['tax'];

         if($text=='invoice')
         {

            $invoice_id = $inventory['Sale']['invoice_id'];
            $user = $this->Sale->query("INSERT INTO sales (user_id,invoice_id,item,description,rate,cost,quantity,tax) VALUES ('$user_id','$invoice_id','$item','$description','$rate','$cost','$quantity','$tax')");

            return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));}
         else
         {

            $sales_id = $inventory['Sale']['sales_id'];
            $user = $this->SaleProduct->query("INSERT INTO sale_products(user_id,item,description,rate,cost,quantity,tax) VALUES ('$user_id','$item','$description','$rate','$cost','$quantity','$tax')");

            return $this->redirect(array('controller'=>'Sales','action'=>'saleview',$user_id,$sales_id));      

         }
    //    print_r($inventory);die();
        
       


    }
        
  

}

////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////
public function saleedit($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Sale');

    $Sale= $this->Sale->findSalebyId($id); // Get Sale Detail from id
    $prevProfilePic = $Sale['Sale']['image'];
    
    if($this->request->is('post'))
    { 
            $serial =  $this->request->data['serial'];
            $pro =  $this->request->data['Sale'];

        //echo "<pre>"; print_r($this->request->data); die();
        $this->Sale->editSalebyId($this->request->data,$id); // Edit Sale
        $this->Sale->editSalebyId($this->request->data['serial'],$id); // Edit Sale
        $this->Flash->success('Sale Edited Successfully', array('key' => 'positive'));      
        return $this->redirect(array('controller'=>'Sales','action'=>'Salelist'));

        

    }
    $this->data = $Sale ;
    $this->set(compact('Sale'));
}


public function deletesale($id,$user_id){
    $this->layout="frontenduser";
    $this->SaleProduct->deleteSaleProduct($id);
    $this->Flash->success('Item Deleted Successfully', array('key' => 'positive')); 
  return $this->redirect(array('controller'=>'Sales','action'=>'saleview',$user_id));



}

public function deletesaleitem($id,$invoice_id){
    $this->layout="frontenduser";
    $this->Sale->deleteSale($id);
    $this->Flash->success('Item Deleted Successfully', array('key' => 'positive')); 
  return $this->redirect(array('controller'=>'invoices','action'=>'invoicedetails',$invoice_id));



}

public function salelist()
{
    $this->layout="frontenduser";
    $this->set('title','Sale List');
    

    $Sales = $this->Sale->allSales();
    $this->set('Sales', $Sales);

}
////////////////////////////////////////////////////////
public function wpshow()
     {
        $this->layout="frontenduser";
        if($this->request->is('post'))
        {
        
        $cust=$this->request->data['Sale']['cust_id'];
        $vech=$this->request->data['Sale']['vech_id'];
        $Sale= $this->Customer->findCustomerbyId($vech);
        $Sale1= $this->Vehicle->findVehiclebyId($cust);
        //$save=new array();

         $save['vehicle_id']=$this->request->data['Sale']['cust_id'];
         $save['Customer_id']=$this->request->data['Sale']['vech_id'];

         if(isset($this->request->data['Sale1'])){
         $save['Sale1']=$this->request->data['Sale1'];
         $Sale = $this->Sale->findSalebyId($save['Sale1']);
         $quantity=$Sale['Sale']['quantity']-1;
         $this->Sale->id = $save['Sale1'];
         $this->Sale->saveField('quantity',$quantity);



         }
         if(isset($this->request->data['Sale2'])){
         $save['Sale2']=$this->request->data['Sale2'];
         $Sale = $this->Sale->findSalebyId($save['Sale2']);
         $quantity=$Sale['Sale']['quantity']-1;
         $this->Sale->id = $save['Sale2'];
         $this->Sale->saveField('quantity',$quantity);
         }  
         if(isset($this->request->data['Sale3'])){
         $save['Sale3']=$this->request->data['Sale3'];
         $Sale = $this->Sale->findSalebyId($save['Sale3']);
         $quantity=$Sale['Sale']['quantity']-1;
         $this->Sale->id = $save['Sale3'];
         $this->Sale->saveField('quantity',$quantity);
         }  
          if(isset($this->request->data['Sale4'])){
         $save['Sale4']=$this->request->data['Sale4'];
         $Sale = $this->Sale->findSalebyId($save['Sale4']);
         $quantity=$Sale['Sale']['quantity']-1;
          $this->Sale->id = $save['Sale4'];
          $this->Sale->saveField('quantity',$quantity);
         }  
         if(isset($this->request->data['Sale5'])){
         $save['Sale5']=$this->request->data['Sale5'];
         $Sale = $this->Sale->findSalebyId($save['Sale5']);
         $quantity=$Sale['Sale']['quantity']-1;
         $this->Sale->id = $save['Sale5'];
         $this->Sale->saveField('quantity',$quantity);

         }  
         $save['name']="W".$cust."RJ".$vech;
         $new['Draft']=$save;
        //print_r($new);
        if($this->Draft->save($new))
        {
         $draft_id=$this->Draft->getLastInsertID();
        return $this->redirect(array('controller'=>'warranty','action'=>'warrantydraft',$draft_id));
        }
    
    }
    }

public function Salefetch(){
    $this->layout="frontenduser";
    if($this->request->is('post')){
        //echo '<pre>';print_r($this->request->data);
        $data = $this->request->data['search'];
        $this->paginate = array(
        'limit' => 1,
        'order' => array('id' => 'asc'),
        'conditions' => array(
                                    'OR' => array(
                                                array('Sale.Sale_name LIKE' => '%'.$data.'%'),
                                                array('Sale.description LIKE' => '%'.$data.'%'),
                                                array('Sale.category LIKE' => '%'.$data.'%'),
                                                array('Sale.price LIKE' => '%'.$data.'%'),
                                                //array('User.email LIKE' => '%'.$data.'%')
                                            )
                                        )
    );      
        $Sales = $this->paginate('Sale'); 

        echo json_encode($Sales);



    }
    $this->autoRender = false;


}

///////////////////////////////////////////////////



public function saleview($userid){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Profile');
    $session_id = $this->Auth->user('id');
    $products = $this->Product->findallProductbyLoginId($session_id);

    //print_r($products);die();
    $this->set('products', $products);

    $this->set('userid', $userid);

 //$sale = $this->Sale-> allSales();
//  print_r($sale);
   $sale = $this->SaleProduct-> findSaleProductbyUserId($userid);
   // pr($sale);die();
   $this->set('sale', $sale);

  $username = $this->User-> findUserNamebyUserId($userid);
   $this->set('username', $username);
 // print_r($username);
   }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }

}

/////////////////////////////////////////////////////////

//////////////////////////////////////////////////






public function lineitem()
{
    $this->layout="frontenduser";
    $pro_id =$this->request->data('pro_id');
  $user_id =$this->request->data('userid');
//echo $userid;die();
 $product = $this->Product->findProductbyId($pro_id);

  $product_name=$product['Product']['product_name'];
  $upc_code=$product['Product']['upc_code'];
  $description=$product['Product']['description'];
  $rate=$product['Product']['price_retail'];
  $cost=$product['Product']['price_cost'];
  
  $user = $this->SaleProduct->query("INSERT INTO sale_products (product_id,user_id,item,description,upc_code,rate,cost,quantity) VALUES ('$pro_id','$user_id','$product_name','$description','$upc_code','$rate','$cost','1')");


    // print_r($product) ;  die();
    //  $this->set('product', $product);



}





///////////////////////////////////////////////////




public function customer()
{
    $this->layout="frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Auth->user('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where login_id = $session_id AND (first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%') AND role != 'staff'");

        $this->set('user', $user);
    }
        
  

}

///////////////////////////////////////////////////




public function customer1()
{
    $this->layout="frontenduser";
    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  = '$data'");
    
        $this->set('user', $user);
        

   }
        
  

}



///////////////////////////////////////////////////

public function inventory()
{
    $this->layout="frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Session->read('Auth.User.id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where login_id = $session_id AND product_name like '%$data%'");
    
        $this->set('user', $user);
        

   }
        
  

}




///////////////////////////////////////////////////


public function inventoryupdate()
{
    $this->layout="frontenduser";
    $qty =$this->request->data('qty');
    $inv_id =$this->request->data('inv_id');
   echo $qty;
   echo $inv_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->SaleProduct->updateAll(array('quantity' => "'$qty'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
        
  

}


///////////////////////////////////////////////////

public function deleteinventory()
{
    $this->layout="frontenduser";
    $userid =$this->request->data('userid');
    
   echo $userid;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->deleteAll(array('user_id' => $userid));
    
       // $this->set('user', $user);
        

   }
        
  

}



///////////////////////////////////////////////////



public function transaction($userid,$method)
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $sale = $this->SaleProduct->findSaleProductbyUserId($userid);
   // print_r($sale);die();
    $this->set('sale', $sale);
    $this->set('userid', $userid);
    $this->set('method', $method);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }

}




///////////////////////////////////////////////////




public function payment($userid,$method)
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $sale = $this->Sale-> findSalebyUserId($userid);

    $user = $this->User->query("SELECT * FROM users where id  = '$userid'");
    //print_r($user);die();
    $this->set('user', $user);
    //print_r($sale);die();
    $this->set('sale', $sale);
    $this->set('userid', $userid);
    $this->set('method', $method);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


/////////////////////////////////////////////////////

}