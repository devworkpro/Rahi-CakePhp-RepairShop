<?php
App::uses('AppController', 'Controller');
class InventoriesController extends AppController {

public $uses = array('Inventory','Product','User');


public function admin_add() 
{
   $this->set('title','Add Inventory');
     
    if($this->request->is('post'))
    {
        $Inventorys=$this->request->data;
        $name=$Inventorys['Inventory']['name'];
        $user = explode(" ", $name);
  //  $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[2]%'  or email like '%$user[3]%'");
    
 // pr($user);die();

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' or last_name='$user[1]' or business_name='$user[2]'  or email='$user[3]' ");
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
                $save = $this->Inventory->addInventoryAdmin($Inventorys);
                $Inventory_id = $this->Inventory->getInsertID();
                $this->Inventory->query("Update Inventorys set  user_id = $user_id  where id = $Inventory_id");
                $this->Flash->success('Inventory added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Inventorys","action" => "Inventorydetails",$user_id,$Inventory_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[2]%'  or email like '%$user[2]%'");
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
                $save = $this->Inventory->addInventoryAdmin($Inventorys);
                $Inventory_id = $this->Inventory->getInsertID();
                $this->Inventory->query("Update Inventorys set  user_id = $user_id  where id = $Inventory_id");
                $this->Flash->success('Inventory added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Inventorys","action" => "Inventorydetails",$user_id,$Inventory_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[1]%'  or email like '%$user[1]%'");
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

                $save = $this->Inventory->addInventoryAdmin($Inventorys);
                $Inventory_id = $this->Inventory->getInsertID();
                $this->Inventory->query("Update Inventorys set  user_id = $user_id  where id = $Inventory_id");
                $this->Flash->success('Inventory added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Inventorys","action" => "Inventorydetails",$user_id,$Inventory_id));
                
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
                $save = $this->Inventory->addInventoryAdmin($Inventorys);
                $Inventory_id = $this->Inventory->getInsertID();
                $this->Inventory->query("Update Inventorys set  user_id = $user_id  where id = $Inventory_id");
                $this->Flash->success('Inventory added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Inventorys","action" => "Inventorydetails",$user_id,$Inventory_id));
               
            }  

        }
    }
}


////////////////////////////////////////////////////////////////////
public function admin_Inventoryedit($id){
    $this->set('title','Edit Inventory');

    $Inventory= $this->Inventory->findInventorybyId($id); // Get Inventory Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->Inventory->editInventorybyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Inventory', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Inventorys','action'=>'Inventorylist'));

        

    }
    $this->data = $Inventory ;
    $this->set(compact('Inventory'));
    $this->set(compact('product'));
}

///////////////////////////////////////////////////////////////////////////////////

public function admin_editingInventory($id){
    $this->set('title','Edit Inventory');

    $Inventory= $this->Inventory->findInventorybyId($id); // Get Inventory Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Inventory->editInventorybyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Inventory', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Inventorys','action'=>'Inventorylist'));

        

    }
    $this->data = $Inventory ;
    $this->set(compact('Inventory'));
    $this->set(compact('product'));
}





////////////////////////////////////////////////////////////////////////////////

public function admin_deleteInventory($id){
    $Inventorys = $this->Inventory->findInventorybyId($id);  
    $estimate_id=$Inventorys['Inventory']['estimate_id'];
    $user_id=$Inventorys['Inventory']['user_id'];
   //  print_r($Inventorys);die();
    $this->Inventory->deleteInventory($id);
    $this->Flash->success('Item Deleted Successfully', array('key' => 'positive'));

  //  return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));
    return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
}


// /////////////////////////////////////////////////////////

public function admin_Inventorylist()
{
    $this->set('title','Inventory List');
    

    $Inventorys = $this->Inventory->allInventorys();
    $this->set('Inventorys', $Inventorys);
    //print_r('products');



}
////////////////////////////////////////////////////////    

public function admin_Inventorydetails($user_id,$inv_id) {
    $this->set('title','Inventory List');
    

    $Inventorys = $this->Inventory->findInventorybyId($inv_id);
    $user = $this->User->findUserbyId($user_id);
    $this->set('Inventorys', $Inventorys);
    $this->set('user', $user);
        
}

///////////////////////////////////////////////////
public function admin_Inventoryview($id){
$this->set('title','Profile');
    $Inventory = $this->Inventory->findInventorybyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Inventory->editInventorybyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Inventorys','action'=>'Inventoryview'));
    }
  //  $this->data = $Inventory ; 
    $this->set('Inventory', $Inventory);
}
/////////////////////////////////////////////////


public function admin_Inventory()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}


public function admin_addinventory()
{

   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
      //  print_r($inventory);
        $item = $inventory['Inventory']['item'];
        $estimate_id = $inventory['Inventory']['estimate_id'];
        $user_id = $inventory['Inventory']['user_id'];
        $Inventory = $this->Product->findProductbyIdName($item);
     //   $user = explode(",", $item);
        if(empty($Inventory))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

            return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
            
        }
        else
        {
            $pro_id=$Inventory['Product']['id'];
            $description=$Inventory['Product']['description'];
            $upc_code=$Inventory['Product']['upc_code'];
            $rate=$Inventory['Product']['price_retail'];
            $cost=$Inventory['Product']['price_cost'];
      //  echo $pro_id;
      //  echo $description;
      //  echo $rate;
     //  print_r($Inventory);die();
      //  echo $item;
            $this->Inventory->addInventoryAdmin($inventory);
            $inv_id = $this->Inventory->getInsertID();
       // echo $user_id; die();
       
        
            $this->Inventory->updateAll(array('product_id' => "'$pro_id'",'description' => "'$description'",'rate' => "'$rate'",'cost' => "'$cost'",'upc_code' => "'$upc_code'"),array('id' => $inv_id));
        //$this->Inventory->query("Update inventories set  product_id = $pro_id  where id = $inv_id");

            return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
        }

    }
        
  

}
                      

public function admin_addinventorybyupc()
{

   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
        //print_r($inventory);die();
        $item = $inventory['Inventory']['upc_code'];
        $estimate_id = $inventory['Inventory']['estimate_id'];
        $user_id = $inventory['Inventory']['user_id'];
        $Inventory = $this->Product->findProductbyIdUpccode($item);
        //echo "<pre>";print_r($Inventory);die();
     //   $user = explode(",", $item);
        if(empty($Inventory))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

            return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
            
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
                //  echo $pro_id;
                //  echo $description;
                //  echo $rate;
                //  print_r($Inventory);die();
                //  echo $item;
                $this->Inventory->addInventoryAdmin($inventory);
                $inv_id = $this->Inventory->getInsertID();
                // echo $user_id; die();
       
        
                $this->Inventory->updateAll(array('product_id' => "'$pro_id'",'description' => "'$description'",'rate' => "'$rate'",'cost' => "'$cost'",'item' => "'$name'"),array('id' => $inv_id));
                //$this->Inventory->query("Update inventories set  product_id = $pro_id  where id = $inv_id");


            return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));

            }
        }
        
    }
        
  

}


public function admin_addinventorymanualy()
{

   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
        //print_r($inventory);die();

        $estimate_id = $inventory['Inventory']['estimate_id'];
        $user_id = $inventory['Inventory']['user_id'];
        
          $this->Inventory->addInventoryAdmin($inventory);
   
    
          return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));

        
       
        
    }
        
  

}



public function admin_addinventoryitem()
{
   if($this->request->is('post'))
    {
        $inventory = $this->request->data;
       
        $item = $inventory['Inventory']['item'];
        $schedule_id = $inventory['Inventory']['schedule_id'];
        $Inventory = $this->Product->findProductbyIdName($item);
     //   $user = explode(",", $item);
        if(empty($Inventory))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

            return $this->redirect(array('controller'=>'Schedules','action'=>'scheduleedit',$schedule_id));
            
        }
        else
        {
            $this->Inventory->addInventoryAdmin($inventory);
            return $this->redirect(array('controller'=>'Schedules','action'=>'scheduleedit',$schedule_id)); 
        }     
        
    }
}
/////////////////////////////////////////////////////////////////////////////////////

/**********************************************************************************/
/*********************************User Section*************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/



public function add() 
{
    $this->layout="frontenduser";
   $this->set('title','Add Inventory');
     
    if($this->request->is('post'))
    {
        $Inventorys=$this->request->data;
        $name=$Inventorys['Inventory']['name'];
        $user = explode(" ", $name);
  //  $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[2]%'  or email like '%$user[3]%'");
    
 // pr($user);die();

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' or last_name='$user[1]' or business_name='$user[2]'  or email='$user[3]' ");
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
                $save = $this->Inventory->addInventoryAdmin($Inventorys);
                $Inventory_id = $this->Inventory->getInsertID();
                $this->Inventory->query("Update Inventorys set  user_id = $user_id  where id = $Inventory_id");
                $this->Flash->success('Inventory added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Inventorys","action" => "Inventorydetails",$user_id,$Inventory_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[2]%'  or email like '%$user[2]%'");
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
                $save = $this->Inventory->addInventoryAdmin($Inventorys);
                $Inventory_id = $this->Inventory->getInsertID();
                $this->Inventory->query("Update Inventorys set  user_id = $user_id  where id = $Inventory_id");
                $this->Flash->success('Inventory added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Inventorys","action" => "Inventorydetails",$user_id,$Inventory_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[1]%'  or email like '%$user[1]%'");
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

                $save = $this->Inventory->addInventoryAdmin($Inventorys);
                $Inventory_id = $this->Inventory->getInsertID();
                $this->Inventory->query("Update Inventorys set  user_id = $user_id  where id = $Inventory_id");
                $this->Flash->success('Inventory added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Inventorys","action" => "Inventorydetails",$user_id,$Inventory_id));
                
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
                $save = $this->Inventory->addInventoryAdmin($Inventorys);
                $Inventory_id = $this->Inventory->getInsertID();
                $this->Inventory->query("Update Inventorys set  user_id = $user_id  where id = $Inventory_id");
                $this->Flash->success('Inventory added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Inventorys","action" => "Inventorydetails",$user_id,$Inventory_id));
               
            }  

        }
    }
}


////////////////////////////////////////////////////////////////////
public function Inventoryedit($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Inventory');

    $Inventory= $this->Inventory->findInventorybyId($id); // Get Inventory Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->Inventory->editInventorybyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Inventory', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Inventorys','action'=>'Inventorylist'));

        

    }
    $this->data = $Inventory ;
    $this->set(compact('Inventory'));
    $this->set(compact('product'));
}

///////////////////////////////////////////////////////////////////////////////////

public function editingInventory($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Inventory');

    $Inventory= $this->Inventory->findInventorybyId($id); // Get Inventory Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Inventory->editInventorybyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Inventory', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Inventorys','action'=>'Inventorylist'));

        

    }
    $this->data = $Inventory ;
    $this->set(compact('Inventory'));
    $this->set(compact('product'));
}





////////////////////////////////////////////////////////////////////////////////

public function deleteInventory($id){
    $this->layout="frontenduser";
    $Inventorys = $this->Inventory->findInventorybyId($id);  
    $estimate_id=$Inventorys['Inventory']['estimate_id'];
    $user_id=$Inventorys['Inventory']['user_id'];
   //  print_r($Inventorys);die();
    $this->Inventory->deleteInventory($id);
    $this->Flash->success('Item Deleted Successfully', array('key' => 'positive'));

  //  return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));
    return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
}


// /////////////////////////////////////////////////////////

public function Inventorylist()
{
    $this->layout="frontenduser";
    $this->set('title','Inventory List');
    

    $Inventorys = $this->Inventory->allInventorys();
    $this->set('Inventorys', $Inventorys);
    //print_r('products');



}
////////////////////////////////////////////////////////    

public function Inventorydetails($user_id,$inv_id) {
    $this->layout="frontenduser";
    $this->set('title','Inventory List');
    

    $Inventorys = $this->Inventory->findInventorybyId($inv_id);
    $user = $this->User->findUserbyId($user_id);
    $this->set('Inventorys', $Inventorys);
    $this->set('user', $user);
        
}

///////////////////////////////////////////////////
public function Inventoryview($id){
    $this->layout="frontenduser";
$this->set('title','Profile');
    $Inventory = $this->Inventory->findInventorybyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Inventory->editInventorybyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Inventorys','action'=>'Inventoryview'));
    }
  //  $this->data = $Inventory ; 
    $this->set('Inventory', $Inventory);
}
/////////////////////////////////////////////////


public function Inventory()
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


public function addinventory()
{
    $this->layout="frontenduser";
   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
      //  print_r($inventory);
        $item = $inventory['Inventory']['item'];
        $estimate_id = $inventory['Inventory']['estimate_id'];
        $user_id = $inventory['Inventory']['user_id'];
        $session_id = $this->Auth->user('id');
        $Inventory = $this->Product->findProductbyNameAndLoginId($item,$session_id);
     //   $user = explode(",", $item);
        if(empty($Inventory))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

            return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
            
        }
        else
        {
            $pro_id=$Inventory['Product']['id'];
            $description=$Inventory['Product']['description'];
            $upc_code=$Inventory['Product']['upc_code'];
            $rate=$Inventory['Product']['price_retail'];
            $cost=$Inventory['Product']['price_cost'];
      //  echo $pro_id;
      //  echo $description;
      //  echo $rate;
     //  print_r($Inventory);die();
      //  echo $item;
            $this->Inventory->addInventoryAdmin($inventory);
            $inv_id = $this->Inventory->getInsertID();
       // echo $user_id; die();
       
        
            $this->Inventory->updateAll(array('product_id' => "'$pro_id'",'description' => "'$description'",'rate' => "'$rate'",'cost' => "'$cost'",'upc_code' => "'$upc_code'"),array('id' => $inv_id));
        //$this->Inventory->query("Update inventories set  product_id = $pro_id  where id = $inv_id");

            return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
        }

    }
        
  

}
                      

public function addinventorybyupc()
{
    $this->layout="frontenduser";
   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
        //print_r($inventory);die();
        $item = $inventory['Inventory']['upc_code'];
        $estimate_id = $inventory['Inventory']['estimate_id'];
        $user_id = $inventory['Inventory']['user_id'];
        $session_id = $this->Auth->user('id');
        $Inventory = $this->Product->findProductbyUpccodeAndLoginId($item,$session_id);
        //echo "<pre>";print_r($Inventory);die();
     //   $user = explode(",", $item);
        if(empty($Inventory))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

            return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
            
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
                //  echo $pro_id;
                //  echo $description;
                //  echo $rate;
                //  print_r($Inventory);die();
                //  echo $item;
                $this->Inventory->addInventoryAdmin($inventory);
                $inv_id = $this->Inventory->getInsertID();
                // echo $user_id; die();
       
        
                $this->Inventory->updateAll(array('product_id' => "'$pro_id'",'description' => "'$description'",'rate' => "'$rate'",'cost' => "'$cost'",'item' => "'$name'"),array('id' => $inv_id));
                //$this->Inventory->query("Update inventories set  product_id = $pro_id  where id = $inv_id");


            return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));

            }
        }
        
    }
        
  

}


public function addinventorymanualy()
{
    $this->layout="frontenduser";
   if($this->request->is('post'))
    {
        $inventory=$this->request->data;
        //print_r($inventory);die();

        $estimate_id = $inventory['Inventory']['estimate_id'];
        $user_id = $inventory['Inventory']['user_id'];
        
          $this->Inventory->addInventoryAdmin($inventory);
   
    
          return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));

        
       
        
    }
        
  

}



public function addinventoryitem()
{
    $this->layout="frontenduser";
   if($this->request->is('post'))
    {
        $inventory = $this->request->data;
       
        $item = $inventory['Inventory']['item'];
        $schedule_id = $inventory['Inventory']['schedule_id'];
        $session_id = $this->Auth->user('id');
        $Inventory = $this->Product->findProductbyNameAndLoginId($item,$session_id);
       
     //   $user = explode(",", $item);
        if(empty($Inventory))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));

            return $this->redirect(array('controller'=>'Schedules','action'=>'scheduleedit',$schedule_id));
            
        }
        else
        {
            $this->Inventory->addInventoryAdmin($inventory);
            return $this->redirect(array('controller'=>'Schedules','action'=>'scheduleedit',$schedule_id)); 
        }     
        
    }
}


/////////////////////////////////////////////////////////////////////////////////////




}
