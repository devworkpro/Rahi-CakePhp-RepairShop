<?php
App::uses('AppController', 'Controller');
class RemindersController extends AppController {

public $uses = array('Reminder','Product','User','Invoice','Inventory','Ticket','Phone','Lead');


public function admin_add() 
{
   $this->set('title','Add Reminder');
     
    if($this->request->is('post'))
    {
        $Reminders=$this->request->data;
        $name=$Reminders['Reminder']['name'];
        $user = explode(" ", $name);
  //  $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[2]%'  or email like '%$user[3]%'");
    
 // pr($user);die();

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name = '$user[1]' and business_name='$user[2]'  and email='$user[3]' ");
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
                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Reminders","action" => "new",$user_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  and email='$user[2]'");
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
                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Reminders","action" => "new",$user_id));   
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[1]'  and email='$user[1]'");
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

                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Reminders","action" => "new",$user_id));   
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
                $this->Flash->success("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));

                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[0]);
                
            }
            else{
                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Reminders","action" => "new",$user_id));   
            }  

        }
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
public function admin_new($user_id) 
{
    //echo $user_id;die();
   $this->set('title','Add Ticket');
   $user = $this->User->findUserbyId($user_id);
   $this->set('user', $user); 
}

////////////////////////////////////////////////////////////////////

public function admin_addnew() 
{
    
    if($this->request->is('post')){

    $reminder=$this->request->data;
    
    $user_id = $reminder['Reminder']['user_id'];
    //pr($reminder);die();
    $save = $this->Reminder->addNewReminder($reminder);
        
    

    $this->Flash->success('Reminder added Successfully', array('key' => 'positive'));
    return $this->redirect(array("controller" => "Reminders","action" => "reminderlist"));

    }   
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_reminderedit($id){
    $this->set('title','Edit reminder');

    $reminder= $this->reminder->findreminderbyId($id); // Get reminder Detail from id
    $user_id=$reminder['reminder']['user_id'];
    $User = $this->User->findUserbyId($user_id);
    
    $this->set(compact('User'));
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->reminder->editreminderbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited reminder', array('key' => 'positive'));      
        return $this->redirect(array('controller'=>'Reminders','action'=>'reminderdetails',$id));


        

    }
    $this->data = $reminder ;
    $this->set(compact('reminder'));
    
    $this->set(compact('User'));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_editingreminder($id){
    $this->set('title','Edit reminder');

    $reminder= $this->reminder->findreminderbyId($id); // Get reminder Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->reminder->editreminderbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited reminder', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Reminders','action'=>'reminderlist'));

        

    }
    $this->data = $reminder ;
    $this->set(compact('reminder'));
    $this->set(compact('product'));
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deletereminder($id){
    $this->Reminder->DeleteReminder($id);
     
    $this->Flash->success('Reminder Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Reminders','action'=>'reminderlist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_reminderlist()
{
    $this->set('title','reminder List');
    $Reminders = $this->Reminder->allReminders();
    //pr($Reminders);die();
    $this->set('Reminders', $Reminders);
    //print_r('products');
}


///////////////////////////////////////////////////////////////////////////////////////////////

public function admin_updatereminder($id){
    $reminder = $this->Reminder->findallReminderById($id);
    $at = $reminder['Reminder']['at'];
    $new_at = date('m/d/Y g:i A', strtotime($at. ' + 1 days'));
    //pr($reminder);die(); 
    //$this->Reminder->updateAll()
    $this->Reminder->updateAll(array('Reminder.at' => "'$new_at'"),array('Reminder.id' =>$id));
    
    $this->Flash->success('Updated!', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Reminders','action'=>'reminderlist'));
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_reminderdetails($app_id) {
    $this->set('title','reminder List');
    

    $Reminders = $this->reminder->findreminderbyId($app_id);
    //print_r($Reminders);
    $user_id = $Reminders['reminder']['user_id'];
    $user = $this->User->findUserbyId($user_id);
    //print_r($user);
    $ticket_id = $Reminders['reminder']['ticket_id'];
    $Tickets = $this->Ticket->findTicketbyId($ticket_id);
    $lead_id = $Reminders['reminder']['lead_id'];
    $Lead = $this->Lead->findLeadbyId($lead_id); 
    //print_r($Lead);die();
    $Phone = $this->Phone->findbyUserid($user_id);
    //Product
    // print_r($Phone);die();
    $this->set('Reminders', $Reminders);
    $this->set('user', $user);
    $this->set('Ticket', $Tickets);
    $this->set('Phone', $Phone);
    $this->set('Lead', $Lead);

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_reminderview($id){
$this->set('title','Profile');
    $reminder = $this->reminder->findreminderbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->reminder->editreminderbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Reminders','action'=>'reminderview'));
    }
  //  $this->data = $reminder ; 
    $this->set('reminder', $reminder);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_reminder()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_statusupdate()
{

    $status =$this->request->data('status');
    $rem_id =$this->request->data('rem_id');
    if ($this->request->is('ajax'))
    {
        if($status=='Reactive')
        {
            $this->Reminder->updateAll(array('Reminder.status' =>0),array('Reminder.id' =>$rem_id));
           
        }
        else{
            $this->Reminder->updateAll(array('Reminder.status' =>1),array('Reminder.id' =>$rem_id));
            
        }
        exit();
    }
        
  

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////

/*User Section*/


///////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////


public function add() 
{
    $this->layout="frontenduser";
   $this->set('title','Add Reminder');
     
    if($this->request->is('post'))
    {
        $Reminders=$this->request->data;
        $name=$Reminders['Reminder']['name'];
        $user = explode(" ", $name);
  //  $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[2]%'  or email like '%$user[3]%'");
    
 // pr($user);die();

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name = '$user[1]' and business_name='$user[2]'  and email='$user[3]' ");
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
                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Reminders","action" => "newrem",$user_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  and email='$user[2]'");
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
                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Reminders","action" => "newrem",$user_id));   
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[1]'  and email='$user[1]'");
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

                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Reminders","action" => "newrem",$user_id));   
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
                $this->Flash->success("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));

                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[0]);
                
            }
            else{
                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Reminders","action" => "newrem",$user_id,'user'=>true));   
            }  

        }
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
public function newrem($user_id) 
{
    $this->layout="frontenduser";
    //echo $user_id;die();
   $this->set('title','Add Ticket');
   $user = $this->User->findUserbyId($user_id);
   $this->set('user', $user); 
}
////////////////////////////////////////////////////////////////////

public function addnew() 
{
    $this->layout="frontenduser";
    
    if($this->request->is('post')){

    $reminder=$this->request->data;
    
    $user_id = $reminder['Reminder']['user_id'];
    //pr($reminder);die();
    $save = $this->Reminder->addNewReminder($reminder);
        
    

    $this->Flash->success('Reminder added Successfully', array('key' => 'positive'));
    return $this->redirect(array("controller" => "Reminders","action" => "reminderlist"));

    }   
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function reminderedit($id){
    $this->layout="frontenduser";
    
    $this->set('title','Edit reminder');

    $reminder= $this->reminder->findreminderbyId($id); // Get reminder Detail from id
    $user_id=$reminder['reminder']['user_id'];
    $User = $this->User->findUserbyId($user_id);
    
    $this->set(compact('User'));
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->reminder->editreminderbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited reminder', array('key' => 'positive'));      
        return $this->redirect(array('controller'=>'Reminders','action'=>'reminderdetails',$id));


        

    }
    $this->data = $reminder ;
    $this->set(compact('reminder'));
    
    $this->set(compact('User'));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function editingreminder($id){
    $this->layout="frontenduser";
    
    $this->set('title','Edit reminder');

    $reminder= $this->reminder->findreminderbyId($id); // Get reminder Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->reminder->editreminderbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited reminder', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Reminders','action'=>'reminderlist'));

        

    }
    $this->data = $reminder ;
    $this->set(compact('reminder'));
    $this->set(compact('product'));
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deletereminder($id){
    $this->layout="frontenduser";
    
    $this->Reminder->DeleteReminder($id);
     
    $this->Flash->success('Reminder Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Reminders','action'=>'reminderlist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function reminderlist()
{
        $this->layout="frontenduser";
    
    $this->set('title','reminder List');
    $Reminders = $this->Reminder->findallReminderByLoginId($this->Session->read('Auth.User.id'));
    //pr($Reminders);die();
    $this->set('Reminders', $Reminders);
    //print_r('products');
}


///////////////////////////////////////////////////////////////////////////////////////////////

public function updatereminder($id){
    $this->layout="frontenduser";
    
    $reminder = $this->Reminder->findallReminderById($id);
    $at = $reminder['Reminder']['at'];
    $new_at = date('m/d/Y g:i A', strtotime($at. ' + 1 days'));
    //pr($reminder);die(); 
    //$this->Reminder->updateAll()
    $this->Reminder->updateAll(array('Reminder.at' => "'$new_at'"),array('Reminder.id' =>$id));
    
    $this->Flash->success('Updated!', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Reminders','action'=>'reminderlist'));
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function reminderdetails($app_id) {
    $this->layout="frontenduser";
    
    $this->set('title','reminder List');
    

    $Reminders = $this->reminder->findreminderbyId($app_id);
    //print_r($Reminders);
    $user_id = $Reminders['reminder']['user_id'];
    $user = $this->User->findUserbyId($user_id);
    //print_r($user);
    $ticket_id = $Reminders['reminder']['ticket_id'];
    $Tickets = $this->Ticket->findTicketbyId($ticket_id);
    $lead_id = $Reminders['reminder']['lead_id'];
    $Lead = $this->Lead->findLeadbyId($lead_id); 
    //print_r($Lead);die();
    $Phone = $this->Phone->findbyUserid($user_id);
    //Product
    // print_r($Phone);die();
    $this->set('Reminders', $Reminders);
    $this->set('user', $user);
    $this->set('Ticket', $Tickets);
    $this->set('Phone', $Phone);
    $this->set('Lead', $Lead);

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function reminderview($id){
    $this->layout="frontenduser";
    
$this->set('title','Profile');
    $reminder = $this->reminder->findreminderbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->reminder->editreminderbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Reminders','action'=>'reminderview'));
    }
  //  $this->data = $reminder ; 
    $this->set('reminder', $reminder);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function reminder()
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


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function statusupdate()
{
$this->layout="frontenduser";
    
    $status =$this->request->data('status');
    $rem_id =$this->request->data('rem_id');
    if ($this->request->is('ajax'))
    {
        if($status=='Reactive')
        {
            $this->Reminder->updateAll(array('Reminder.status' =>0),array('Reminder.id' =>$rem_id));
           
        }
        else{
            $this->Reminder->updateAll(array('Reminder.status' =>1),array('Reminder.id' =>$rem_id));
            
        }
        exit();
    }
        
  

}








///////////////////////////////////////////////////////////////////////////////////////////////////


}
