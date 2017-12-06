<?php
App::uses('AppController', 'Controller');

class PartsController extends AppController {

public $uses = array('Part','Product','User','Invoice','Inventory','Ticket');


public function admin_add() 
{
    $this->set('title','Add Part');
    $ticket=$this->Ticket->find('list',array('fields'=>array('Ticket.name')));
    $ticket_id=$this->Ticket->find('list',array('fields'=>array('Ticket.id')));
    
  
    foreach ($ticket as $k=>$subArray) {
        $new_ticket[$k] = $subArray.'-'.$k;
       
    }


  //echo'<pre>';print_r($new_ticket);die();

    if($this->request->is('post'))
    {
        $Parts=$this->request->data;
    
        $ticket_id = $Parts['Part']['ticket_id'];
      
        $Ticket= $this->Ticket->findTicketbyId($ticket_id); 
        $user_id = $Ticket['Ticket']['user_id'];
   
        $save = $this->Part->addPartAdmin($Parts);
        $Part_id = $this->Part->getInsertID();
        
        $this->Part->updateAll(array('user_id' => "'$user_id'"),array('id' => $Part_id));
        $this->Flash->success('Part added Successfully', array('key' => 'positive'));
        $this->redirect(array("controller" => "Parts","action" => "partlist"));
               
          
    }


    $this->set(compact('new_ticket'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_partedit($id){
    $this->set('title','Edit Part');

    $Part= $this->Part->findPartbyId($id); // Get Part Detail from id
    
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->Part->editPartbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Part', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Parts','action'=>'partlist'));

        

    }
    $this->data = $Part ;
    $this->set(compact('Part'));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_editingPart($id){
    $this->set('title','Edit Part');

    $Part= $this->Part->findPartbyId($id); // Get Part Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Part->editPartbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Part', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Parts','action'=>'partlist'));

        

    }
    $this->data = $Part ;
    $this->set(compact('Part'));
    $this->set(compact('product'));
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deletePart($id){
    $this->Part->deletePart($id);
    $this->Flash->success('Part Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Parts','action'=>'partlist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_partlist()
{


    $Part = $this->Part->query("SELECT parts.*, users.first_name ,users.last_name FROM parts  INNER JOIN users ON parts.user_id = users.id");

    
    $this->set(compact('Part'));

   //echo "<pre>";print_r($Part); die();

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Partdetails($user_id,$inv_id) {
    $this->set('title','Part List');
    

    $Parts = $this->Part->findPartbyId($inv_id);
    $user = $this->User->findUserbyId($user_id);
    $Inventory = $this->Inventory->findInventorybyPartId($inv_id);
    //$Inventory = $this->Inventory->findInventorybyProductId($inv_id);
    //Product
    //print_r($Inventory);die();
    $this->set('Parts', $Parts);
    $this->set('user', $user);
    $this->set('Inventory', $Inventory);
    

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Partview($id){
$this->set('title','Profile');
    $Part = $this->Part->findPartbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Part->editPartbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Parts','action'=>'Partview'));
    }
  //  $this->data = $Part ; 
    $this->set('Part', $Part);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Part()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
     
                
public function admin_approve()
{
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Part->query("Update Parts set  status = '1'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_unapprove()
{
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Part->query("Update Parts set  status = '0'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_decline()
{
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Part->query("Update Parts set  decline = '1'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_undodecline()
{
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Part->query("Update Parts set  decline = '0'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_inventory()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where product_name  like '%$data%'");
    
        $this->set('user', $user);
        

   }
        
  

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_inventoryupc_code()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where upc_code  like '%$data%'");
    
        $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_inventoryupdate()
{

    $qty =$this->request->data('qty');
    $inv_id =$this->request->data('inv_id');
   echo $qty;
   echo $inv_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Inventory->updateAll(array('quantity' => "'$qty'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_updatePart()
{

    $total =$this->request->data('total');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Part->updateAll(array('total' => "'$total'"),array('id' => $est_id));
       // $this->set('user', $user);
        

   }
        
  

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_updatePartitem()
{

    $item =$this->request->data('item');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Part->updateAll(array('item' => "'$item'"),array('id' => $est_id));
       // $this->set('user', $user);
        

   }
        
  

}


/**********************************************************************************/
/*********************************User Section*************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/


public function add() 
{
    if($this->Auth->user('id')!='')
    {
    $session_id = $this->Auth->user('id');
    $this->layout = "frontenduser";
    $this->set('title','Add Part');
    $ticket=$this->Ticket->find('list',array('fields'=>array('Ticket.name'),'conditions' => array('Ticket.login_id ' => $session_id)));
    $ticket_id=$this->Ticket->find('list',array('fields'=>array('Ticket.id'),'conditions' => array('Ticket.login_id ' => $session_id)));
    
  
    foreach ($ticket as $k=>$subArray) {
        $new_ticket[$k] = $subArray.'-'.$k;
       
    }


  //echo'<pre>';print_r($new_ticket);die();

    if($this->request->is('post'))
    {
        $Parts=$this->request->data;
    
        $ticket_id = $Parts['Part']['ticket_id'];
      
        $Ticket= $this->Ticket->findTicketbyId($ticket_id); 
        $user_id = $Ticket['Ticket']['user_id'];
   
        $save = $this->Part->addPartAdmin($Parts);
        $Part_id = $this->Part->getInsertID();
        
        $this->Part->updateAll(array('user_id' => "'$user_id'"),array('id' => $Part_id));
        $this->Flash->success('Part added Successfully', array('key' => 'positive'));
        $this->redirect(array("controller" => "Parts","action" => "partlist"));
               
          
    }


    $this->set(compact('new_ticket'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function partedit($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Edit Part');

    $Part= $this->Part->findPartbyId($id); // Get Part Detail from id
    
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->Part->editPartbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Part', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Parts','action'=>'partlist'));

        

    }
    $this->data = $Part ;
    $this->set(compact('Part'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function editingPart($id){
    $this->layout = "frontenduser";
    $this->set('title','Edit Part');

    $Part= $this->Part->findPartbyId($id); // Get Part Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Part->editPartbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Part', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Parts','action'=>'partlist'));

        

    }
    $this->data = $Part ;
    $this->set(compact('Part'));
    $this->set(compact('product'));
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deletePart($id){
    $this->layout = "frontenduser";
    $this->Part->deletePart($id);
    $this->Flash->success('Part Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Parts','action'=>'partlist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function partlist()
{
    if($this->Auth->user('id')!='')
    {

    $this->layout = "frontenduser";
    $session_id = $this->Auth->user('id');
    $Part = $this->Part->query("SELECT parts.*, users.first_name ,users.last_name FROM parts  INNER JOIN users ON parts.user_id = users.id where parts.login_id = $session_id");

    
    $this->set(compact('Part'));

   //echo "<pre>";print_r($Part); die();
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Partdetails($user_id,$inv_id) {
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Part List');
    

    $Parts = $this->Part->findPartbyId($inv_id);
    $user = $this->User->findUserbyId($user_id);
    $Inventory = $this->Inventory->findInventorybyPartId($inv_id);
    //$Inventory = $this->Inventory->findInventorybyProductId($inv_id);
    //Product
    //print_r($Inventory);die();
    $this->set('Parts', $Parts);
    $this->set('user', $user);
    $this->set('Inventory', $Inventory);
    
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Partview($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Profile');
    $Part = $this->Part->findPartbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Part->editPartbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Parts','action'=>'Partview'));
    }
  //  $this->data = $Part ; 
    $this->set('Part', $Part);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Part()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
     
                
public function approve()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Part->query("Update Parts set  status = '1'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function unapprove()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Part->query("Update Parts set  status = '0'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function decline()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Part->query("Update Parts set  decline = '1'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function undodecline()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Part->query("Update Parts set  decline = '0'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function inventory()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where product_name  like '%$data%'");
    
        $this->set('user', $user);
        

   }
        
  

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function inventoryupc_code()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where upc_code  like '%$data%'");
    
        $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function inventoryupdate()
{
    $this->layout = "frontenduser";
    $qty =$this->request->data('qty');
    $inv_id =$this->request->data('inv_id');
   echo $qty;
   echo $inv_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Inventory->updateAll(array('quantity' => "'$qty'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function updatePart()
{
    $this->layout = "frontenduser";
    $total =$this->request->data('total');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Part->updateAll(array('total' => "'$total'"),array('id' => $est_id));
       // $this->set('user', $user);
        

   }
        
  

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function updatePartitem()
{
    $this->layout = "frontenduser";
    $item =$this->request->data('item');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Part->updateAll(array('item' => "'$item'"),array('id' => $est_id));
       // $this->set('user', $user);
        

   }
        
  

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
}