<?php
App::uses('AppController', 'Controller');
class CommentsController extends AppController {

public $uses = array('Comment','Product','User','Sale','Ticket');


public function admin_add() 
{
   $this->set('title','Add Comment');
     
    if($this->request->is('post'))
    {
        $Comments=$this->request->data;
        $name=$Comments['Comment']['name'];
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
                $save = $this->Comment->addCommentAdmin($Comments);
                $Comment_id = $this->Comment->getInsertID();
                $this->Comment->query("Update Comments set  user_id = $user_id  where id = $Comment_id");
                $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Comments","action" => "Commentdetails",$user_id,$Comment_id));   

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
                $save = $this->Comment->addCommentAdmin($Comments);
                $Comment_id = $this->Comment->getInsertID();
                $this->Comment->query("Update Comments set  user_id = $user_id  where id = $Comment_id");
                $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Comments","action" => "Commentdetails",$user_id,$Comment_id));
                
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

                $save = $this->Comment->addCommentAdmin($Comments);
                $Comment_id = $this->Comment->getInsertID();
                $this->Comment->query("Update Comments set  user_id = $user_id  where id = $Comment_id");
                $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Comments","action" => "Commentdetails",$user_id,$Comment_id));
                
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
                $save = $this->Comment->addCommentAdmin($Comments);
                $Comment_id = $this->Comment->getInsertID();
                $this->Comment->query("Update Comments set  user_id = $user_id  where id = $Comment_id");
                $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Comments","action" => "Commentdetails",$user_id,$Comment_id));
               
            }  

        }
    }
}



////////////////////////////////////////////////////////////////////


public function admin_addcomment() 
{
   $this->set('title','Add Comment');
     
    if($this->request->is('post'))
    {
        $Comments=$this->request->data;
        $Ticket_id = $Comments['Comment']['ticket_id'];
        $subject = $Comments['Comment']['subject'];

        //pr($Comments);die();
        
        $save = $this->Comment->addCommentAdmin($Comments);
        if($subject=='diagnosis')  
        {
            $this->Ticket->updateAll(array('diagnosed' => "'on'"),array('id' => $Ticket_id));
        } 
        elseif ($subject=='approval') {
            $this->Ticket->updateAll(array('approved' => "'on'"),array('id' => $Ticket_id));
        }  
        elseif ($subject=='completed') {
            $this->Ticket->updateAll(array('completed' => "'on'"),array('id' => $Ticket_id));
        }
        else {
                      
        }  
               
        $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
        $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$Ticket_id));
       
          
    }
}

/////////////////////////////////////////////////////////////////////

public function admin_adduserticketcomment() 
{
   $this->set('title','Add User Ticket Comment');
     
    if($this->request->is('post'))
    {
        $Comments=$this->request->data;
        //pr($Comments);die();
        $Ticket_id = $Comments['Comment']['ticket_id'];
               
        $save = $this->Comment->addCommentAdmin($Comments);
            
        $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
        $this->redirect(array("controller" => "PortalUsers","action" => "userticketdetail",$Ticket_id));
       
          
    }
}



////////////////////////////////////////////////////////////////////


public function admin_addcommentbyorder() 
{
   $this->set('title','Add Comment');
     
    if($this->request->is('post'))
    {
        $Comments=$this->request->data;
        //pr($Comments);die();        
        $order_id = $Comments['Comment']['order_id'];
        $save = $this->Comment->addCommentAdmin($Comments);
        $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
        $this->redirect(array("controller" => "Orders","action" => "orderdetails",$order_id));
       
          
    }
}


////////////////////////////////////////////////////////////////////

public function admin_addtender() 
{
   $this->set('title','Add Comment');
     
    if($this->request->is('post'))
    {
        $Comments=$this->request->data;
       // print_r($Comments);
        $method=$Comments['Comment']['payment_method'];
        $user_id=$Comments['Comment']['user_id'];
        $amount_provided=$Comments['Comment']['amount_provided'];
        $total=$Comments['Comment']['total'];
        $amount= $amount_provided-$total;

        if ($amount < 0)
        {
            $this->Flash->success("You entered a 'Tendered' amount that is less than the desired payment amount, please correct that.", array('key' => 'positive'));
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
        $save = $this->Comment->addCommentAdmin($Comments);
        $Comment_id = $this->Comment->getInsertID();
              //  echo $Comment_id;die();
        $this->Comment->updateAll(array('name' => "'$name'"),array('id' => $Comment_id));
        // $this->Comment->query("Update Comments set  name = $name  where id = $Comment_id");
        $this->Flash->success('Payment Successfull', array('key' => 'positive'));
        $this->redirect(array("controller" => "Comments","action" => "Commentdetails",$user_id,$Comment_id));   
    }
        

}






//////////////////////////////////////////////////////////////////////


   




////////////////////////////////////////////////////////////////////
public function admin_Commentedit($id){
    $this->set('title','Edit Comment');

    $Comment= $this->Comment->findCommentbyId($id); // Get Comment Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->Comment->editCommentbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Comment', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Comments','action'=>'Commentlist'));

        

    }
    $this->data = $Comment ;
    $this->set(compact('Comment'));
    $this->set(compact('product'));
}

///////////////////////////////////////////////////////////////////////////////////

public function admin_editingComment($id){
    $this->set('title','Edit Comment');

    $Comment= $this->Comment->findCommentbyId($id); // Get Comment Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Comment->editCommentbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Comment', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Comments','action'=>'Commentlist'));

        

    }
    $this->data = $Comment ;
    $this->set(compact('Comment'));
    $this->set(compact('product'));
}





////////////////////////////////////////////////////////////////////////////////

public function admin_deletecomment($id,$ticket_id){
    $this->Comment->deleteCommant($id);
    $this->Flash->success('Comment Deleted Successfully', array('key' => 'positive'));  
    $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$ticket_id));
       
        
}


// /////////////////////////////////////////////////////////

public function admin_Commentlist()
{
    $this->set('title','Comment List');
    

    $Comments = $this->Comment->allComments();
    $this->set('Comments', $Comments);
    //print_r('products');



}
////////////////////////////////////////////////////////    

public function admin_Commentdetails($user_id,$inv_id) {
    $this->set('title','Comment List');
    

    $Comments = $this->Comment->findCommentbyId($inv_id);
    $user = $this->User->findUserbyId($user_id);
    $sale = $this->Sale-> findSalebyUserId($user_id);
    //print_r($sale);die();
    $this->set('sale', $sale);
    $this->set('Comments', $Comments);
    $this->set('user', $user);
   // $this->set('Inventory', $Inventory);
        
}

///////////////////////////////////////////////////
public function admin_Commentview($id){
$this->set('title','Profile');
    $Comment = $this->Comment->findCommentbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Comment->editCommentbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Comments','action'=>'Commentview'));
    }
  //  $this->data = $Comment ; 
    $this->set('Comment', $Comment);
}
/////////////////////////////////////////////////


public function admin_Comment()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////



public function admin_Commentupdate()
{

    $po_number =$this->request->data('po_number');
    $inv_id =$this->request->data('inv_id');
   
    if ($this->request->is('ajax'))
    {
       $this->Comment->updateAll(array('po_number' => "'$po_number'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
        
  

}

/////////////////////////////////////////////////////////////


public function admin_updateCommentitem()
{

    $item =$this->request->data('item');
    $Comment_id =$this->request->data('Comment_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Comment->updateAll(array('item' => "'$item'"),array('id' => $Comment_id));
       // $this->set('user', $user);
        

   }
        
  

}

///////////////////////////////////////////////////////////////////


public function admin_updateComment()
{

    $total =$this->request->data('total');
    $Comment_id =$this->request->data('Comment_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Comment->updateAll(array('total' => "'$total'"),array('id' => $Comment_id));
       // $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////////////////





public function admin_saleCommentupdate()
{

    $qty =$this->request->data('qty');
    $sale_id =$this->request->data('sale_id');
   echo $qty;
   echo $inv_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('quantity' => "'$qty'"),array('id' => $sale_id));
       // $this->set('user', $user);
        

   }
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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

 /* USER SECTIOIN */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



public function add() 
{
    $this->layout = "frontenduser";
   $this->set('title','Add Comment');
     
    if($this->request->is('post'))
    {
        $Comments=$this->request->data;
        $name=$Comments['Comment']['name'];
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
                $save = $this->Comment->addCommentAdmin($Comments);
                $Comment_id = $this->Comment->getInsertID();
                $this->Comment->query("Update Comments set  user_id = $user_id  where id = $Comment_id");
                $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Comments","action" => "Commentdetails",$user_id,$Comment_id));   

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
                $save = $this->Comment->addCommentAdmin($Comments);
                $Comment_id = $this->Comment->getInsertID();
                $this->Comment->query("Update Comments set  user_id = $user_id  where id = $Comment_id");
                $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Comments","action" => "Commentdetails",$user_id,$Comment_id));
                
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

                $save = $this->Comment->addCommentAdmin($Comments);
                $Comment_id = $this->Comment->getInsertID();
                $this->Comment->query("Update Comments set  user_id = $user_id  where id = $Comment_id");
                $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Comments","action" => "Commentdetails",$user_id,$Comment_id));
                
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
                $save = $this->Comment->addCommentAdmin($Comments);
                $Comment_id = $this->Comment->getInsertID();
                $this->Comment->query("Update Comments set  user_id = $user_id  where id = $Comment_id");
                $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Comments","action" => "Commentdetails",$user_id,$Comment_id));
               
            }  

        }
    }
}



////////////////////////////////////////////////////////////////////


public function addcomment() 
{
    $this->layout = "frontenduser";
   $this->set('title','Add Comment');
     
    if($this->request->is('post'))
    {
        $Comments=$this->request->data;
        $Ticket_id = $Comments['Comment']['ticket_id'];
        $subject = $Comments['Comment']['subject'];

        //pr($Comments);die();
        
        $save = $this->Comment->addCommentAdmin($Comments);
        if($subject=='diagnosis')  
        {
            $this->Ticket->updateAll(array('diagnosed' => "'on'"),array('id' => $Ticket_id));
        } 
        elseif ($subject=='approval') {
            $this->Ticket->updateAll(array('approved' => "'on'"),array('id' => $Ticket_id));
        }  
        elseif ($subject=='completed') {
            $this->Ticket->updateAll(array('completed' => "'on'"),array('id' => $Ticket_id));
        }
        else {
                      
        }  
               
        $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
        $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$Ticket_id));
       
          
    }
}

/////////////////////////////////////////////////////////////////////

public function adduserticketcomment() 
{
    $this->layout = "frontenduser";
   $this->set('title','Add User Ticket Comment');
     
    if($this->request->is('post'))
    {
        $Comments=$this->request->data;
        //pr($Comments);die();
        $Ticket_id = $Comments['Comment']['ticket_id'];
               
        $save = $this->Comment->addCommentAdmin($Comments);
            
        $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
        $this->redirect(array("controller" => "PortalUsers","action" => "userticketdetail",$Ticket_id));
       
          
    }
}



////////////////////////////////////////////////////////////////////


public function addcommentbyorder() 
{
    $this->layout = "frontenduser";
   $this->set('title','Add Comment');
     
    if($this->request->is('post'))
    {
        $Comments=$this->request->data;
        //pr($Comments);die();        
        $order_id = $Comments['Comment']['order_id'];
        $save = $this->Comment->addCommentAdmin($Comments);
        $this->Flash->success('Comment added Successfully', array('key' => 'positive'));
        $this->redirect(array("controller" => "Orders","action" => "orderdetails",$order_id));
       
          
    }
}


////////////////////////////////////////////////////////////////////

public function addtender() 
{
    $this->layout = "frontenduser";
   $this->set('title','Add Comment');
     
    if($this->request->is('post'))
    {
        $Comments=$this->request->data;
       // print_r($Comments);
        $method=$Comments['Comment']['payment_method'];
        $user_id=$Comments['Comment']['user_id'];
        $amount_provided=$Comments['Comment']['amount_provided'];
        $total=$Comments['Comment']['total'];
        $amount= $amount_provided-$total;

        if ($amount < 0)
        {
            $this->Flash->success("You entered a 'Tendered' amount that is less than the desired payment amount, please correct that.", array('key' => 'positive'));
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
        $save = $this->Comment->addCommentAdmin($Comments);
        $Comment_id = $this->Comment->getInsertID();
              //  echo $Comment_id;die();
        $this->Comment->updateAll(array('name' => "'$name'"),array('id' => $Comment_id));
        // $this->Comment->query("Update Comments set  name = $name  where id = $Comment_id");
        $this->Flash->success('Payment Successfull', array('key' => 'positive'));
        $this->redirect(array("controller" => "Comments","action" => "Commentdetails",$user_id,$Comment_id));   
    }
        

}






//////////////////////////////////////////////////////////////////////


   




////////////////////////////////////////////////////////////////////
public function Commentedit($id){
    $this->layout = "frontenduser";
    $this->set('title','Edit Comment');

    $Comment= $this->Comment->findCommentbyId($id); // Get Comment Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->Comment->editCommentbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Comment', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Comments','action'=>'Commentlist'));

        

    }
    $this->data = $Comment ;
    $this->set(compact('Comment'));
    $this->set(compact('product'));
}

///////////////////////////////////////////////////////////////////////////////////

public function editingComment($id){
    $this->layout = "frontenduser";
    $this->set('title','Edit Comment');

    $Comment= $this->Comment->findCommentbyId($id); // Get Comment Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Comment->editCommentbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Comment', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Comments','action'=>'Commentlist'));

        

    }
    $this->data = $Comment ;
    $this->set(compact('Comment'));
    $this->set(compact('product'));
}





////////////////////////////////////////////////////////////////////////////////

public function deletecomment($id,$ticket_id){
    $this->layout = "frontenduser";
    $this->Comment->deleteCommant($id);
    $this->Flash->success('Comment Deleted Successfully', array('key' => 'positive'));  
    $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$ticket_id));
       
        
}


// /////////////////////////////////////////////////////////

public function Commentlist()
{
    $this->layout = "frontenduser";
    $this->set('title','Comment List');
    

    $Comments = $this->Comment->allComments();
    $this->set('Comments', $Comments);
    //print_r('products');



}
////////////////////////////////////////////////////////    

public function Commentdetails($user_id,$inv_id) {
    $this->layout = "frontenduser";
    $this->set('title','Comment List');
    

    $Comments = $this->Comment->findCommentbyId($inv_id);
    $user = $this->User->findUserbyId($user_id);
    $sale = $this->Sale-> findSalebyUserId($user_id);
    //print_r($sale);die();
    $this->set('sale', $sale);
    $this->set('Comments', $Comments);
    $this->set('user', $user);
   // $this->set('Inventory', $Inventory);
        
}

///////////////////////////////////////////////////
public function Commentview($id){
    $this->layout = "frontenduser";
$this->set('title','Profile');
    $Comment = $this->Comment->findCommentbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Comment->editCommentbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Comments','action'=>'Commentview'));
    }
  //  $this->data = $Comment ; 
    $this->set('Comment', $Comment);
}
/////////////////////////////////////////////////


public function Comment()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////



public function Commentupdate()
{
    $this->layout = "frontenduser";
    $po_number =$this->request->data('po_number');
    $inv_id =$this->request->data('inv_id');
   
    if ($this->request->is('ajax'))
    {
       $this->Comment->updateAll(array('po_number' => "'$po_number'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
        
  

}

/////////////////////////////////////////////////////////////


public function updateCommentitem()
{
    $this->layout = "frontenduser";
    $item =$this->request->data('item');
    $Comment_id =$this->request->data('Comment_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Comment->updateAll(array('item' => "'$item'"),array('id' => $Comment_id));
       // $this->set('user', $user);
        

   }
        
  

}

///////////////////////////////////////////////////////////////////


public function updateComment()
{
    $this->layout = "frontenduser";
    $total =$this->request->data('total');
    $Comment_id =$this->request->data('Comment_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Comment->updateAll(array('total' => "'$total'"),array('id' => $Comment_id));
       // $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////////////////





public function saleCommentupdate()
{
    $this->layout = "frontenduser";
    $qty =$this->request->data('qty');
    $sale_id =$this->request->data('sale_id');
   echo $qty;
   echo $inv_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Sale->updateAll(array('quantity' => "'$qty'"),array('id' => $sale_id));
       // $this->set('user', $user);
        

   }
}




//////////////////////////////////////////////////////////////////


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











/////////////////////////////////////////////////////////////////




}
