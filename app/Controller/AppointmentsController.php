<?php
App::uses('AppController', 'Controller');
class AppointmentsController extends AppController {

public $uses = array('Appointment','Product','User','Invoice','Inventory','Ticket','Phone','Lead');


public function admin_add() 
{
   $this->set('title','Add Appointment');
     
    if($this->request->is('post'))
    {
        $Appointments=$this->request->data;
        $name=$Appointments['Appointment']['name'];
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
                $save = $this->Appointment->addAppointmentAdmin($Appointments);
                $Appointment_id = $this->Appointment->getInsertID();
                $this->Appointment->query("Update Appointments set  user_id = $user_id  where id = $Appointment_id");
                $this->Flash->success('Appointment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Appointments","action" => "Appointmentdetails",$user_id,$Appointment_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  or email='$user[2]'");
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
                $save = $this->Appointment->addAppointmentAdmin($Appointments);
                $Appointment_id = $this->Appointment->getInsertID();
                $this->Appointment->query("Update Appointments set  user_id = $user_id  where id = $Appointment_id");
                $this->Flash->success('Appointment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Appointments","action" => "Appointmentdetails",$user_id,$Appointment_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
           
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' or business_name='$user[1]'  or email='$user[1]'");
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

                $save = $this->Appointment->addAppointmentAdmin($Appointments);
                $Appointment_id = $this->Appointment->getInsertID();
                $this->Appointment->query("Update Appointments set  user_id = $user_id  where id = $Appointment_id");
                $this->Flash->success('Appointment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Appointments","action" => "Appointmentdetails",$user_id,$Appointment_id));
                
            }  

        }
        else
        {
           $user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name' or email='$name' ");
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
                $save = $this->Appointment->addAppointmentAdmin($Appointments);
                $Appointment_id = $this->Appointment->getInsertID();
                $this->Appointment->query("Update Appointments set  user_id = $user_id  where id = $Appointment_id");
                $this->Flash->success('Appointment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Appointments","action" => "Appointmentdetails",$user_id,$Appointment_id));
               
            }  

        }
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_appointmentedit($id){
    $this->set('title','Edit Appointment');

    $Appointment= $this->Appointment->findAppointmentbyId($id); // Get Appointment Detail from id
    $user_id=$Appointment['Appointment']['user_id'];
    $User = $this->User->findUserbyId($user_id);
    
    $this->set(compact('User'));
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->Appointment->editAppointmentbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Appointment', array('key' => 'positive'));      
        return $this->redirect(array('controller'=>'Appointments','action'=>'appointmentdetails',$id));


        

    }
    $this->data = $Appointment ;
    $this->set(compact('Appointment'));
    
    $this->set(compact('User'));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_editingAppointment($id){
    $this->set('title','Edit Appointment');

    $Appointment= $this->Appointment->findAppointmentbyId($id); // Get Appointment Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Appointment->editAppointmentbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Appointment', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Appointments','action'=>'Appointmentlist'));

        

    }
    $this->data = $Appointment ;
    $this->set(compact('Appointment'));
    $this->set(compact('product'));
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deleteAppointment($id){
    $this->Appointment->deleteAppointment($id);
    $this->Flash->success('Appointment Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Appointments','action'=>'appointmentlist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_appointmentlist()
{
    $this->set('title','Appointment List');
    

    $Appointments = $this->Appointment->allAppointments();
    $this->set('Appointments', $Appointments);
    //print_r('products');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_appointmentdetails($app_id) {
    $this->set('title','Appointment List');
    

    $Appointments = $this->Appointment->findAppointmentbyId($app_id);
    //print_r($Appointments);
    $user_id = $Appointments['Appointment']['user_id'];
    $user = $this->User->findUserbyId($user_id);
    //print_r($user);
    $ticket_id = $Appointments['Appointment']['ticket_id'];
    $Tickets = $this->Ticket->findTicketbyId($ticket_id);
    $lead_id = $Appointments['Appointment']['lead_id'];
    $Lead = $this->Lead->findLeadbyId($lead_id); 
    //print_r($Lead);die();
    $Phone = $this->Phone->findbyUserid($user_id);
    //Product
    // print_r($Phone);die();
    $this->set('Appointments', $Appointments);
    $this->set('user', $user);
    $this->set('Ticket', $Tickets);
    $this->set('Phone', $Phone);
    $this->set('Lead', $Lead);

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Appointmentview($id){
$this->set('title','Profile');
    $Appointment = $this->Appointment->findAppointmentbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Appointment->editAppointmentbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Appointments','action'=>'Appointmentview'));
    }
  //  $this->data = $Appointment ; 
    $this->set('Appointment', $Appointment);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Appointment()
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
        $user = $this->Appointment->query("Update Appointments set  status = '1'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_unapprove()
{
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Appointment->query("Update Appointments set  status = '0'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_decline()
{
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Appointment->query("Update Appointments set  decline = '1'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_undodecline()
{
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Appointment->query("Update Appointments set  decline = '0'  where id = $data");
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


public function admin_updateAppointment()
{

    $total =$this->request->data('total');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Appointment->updateAll(array('total' => "'$total'"),array('id' => $est_id));
       // $this->set('user', $user);
        

   }
        
  

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_updateAppointmentitem()
{

    $item =$this->request->data('item');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Appointment->updateAll(array('item' => "'$item'"),array('id' => $est_id));
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
    $this->layout="frontenduser";
   $this->set('title','Add Appointment');
     
    if($this->request->is('post'))
    {
        $Appointments=$this->request->data;
        $name=$Appointments['Appointment']['name'];
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
                $save = $this->Appointment->addAppointmentAdmin($Appointments);
                $Appointment_id = $this->Appointment->getInsertID();
                $this->Appointment->query("Update Appointments set  user_id = $user_id  where id = $Appointment_id");
                $this->Flash->success('Appointment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Appointments","action" => "Appointmentdetails",$user_id,$Appointment_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  or email='$user[2]'");
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
                $save = $this->Appointment->addAppointmentAdmin($Appointments);
                $Appointment_id = $this->Appointment->getInsertID();
                $this->Appointment->query("Update Appointments set  user_id = $user_id  where id = $Appointment_id");
                $this->Flash->success('Appointment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Appointments","action" => "Appointmentdetails",$user_id,$Appointment_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
           
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' or business_name='$user[1]'  or email='$user[1]'");
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

                $save = $this->Appointment->addAppointmentAdmin($Appointments);
                $Appointment_id = $this->Appointment->getInsertID();
                $this->Appointment->query("Update Appointments set  user_id = $user_id  where id = $Appointment_id");
                $this->Flash->success('Appointment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Appointments","action" => "Appointmentdetails",$user_id,$Appointment_id));
                
            }  

        }
        else
        {
           $user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name' or email='$name' ");
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
                $save = $this->Appointment->addAppointmentAdmin($Appointments);
                $Appointment_id = $this->Appointment->getInsertID();
                $this->Appointment->query("Update Appointments set  user_id = $user_id  where id = $Appointment_id");
                $this->Flash->success('Appointment added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Appointments","action" => "Appointmentdetails",$user_id,$Appointment_id));
               
            }  

        }
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function appointmentedit($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Appointment');

    $Appointment= $this->Appointment->findAppointmentbyId($id); // Get Appointment Detail from id
    $user_id=$Appointment['Appointment']['user_id'];
    $User = $this->User->findUserbyId($user_id);
    
    $this->set(compact('User'));
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->Appointment->editAppointmentbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Appointment', array('key' => 'positive'));      
        return $this->redirect(array('controller'=>'Appointments','action'=>'appointmentdetails',$id));


        

    }
    $this->data = $Appointment ;
    $this->set(compact('Appointment'));
    
    $this->set(compact('User'));
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function editingAppointment($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Appointment');

    $Appointment= $this->Appointment->findAppointmentbyId($id); // Get Appointment Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Appointment->editAppointmentbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Appointment', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Appointments','action'=>'Appointmentlist'));

        

    }
    $this->data = $Appointment ;
    $this->set(compact('Appointment'));
    $this->set(compact('product'));
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteAppointment($id){
    $this->layout="frontenduser";
    $this->Appointment->deleteAppointment($id);
    $this->Flash->success('Appointment Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Appointments','action'=>'appointmentlist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function appointmentlist()
{
    $this->layout="frontenduser";
    $this->set('title','Appointment List');
    $session_id = $this->Auth->user('id');

    $Appointments = $this->Appointment->findallAppointmentsByLoginId($session_id);
    $this->set('Appointments', $Appointments);
    //print_r('products');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function appointmentdetails($app_id) {
    $this->layout="frontenduser";
    $this->set('title','Appointment List');
    

    $Appointments = $this->Appointment->findAppointmentbyId($app_id);
    //print_r($Appointments);
    $user_id = $Appointments['Appointment']['user_id'];
    $user = $this->User->findUserbyId($user_id);
    //print_r($user);
    $ticket_id = $Appointments['Appointment']['ticket_id'];
    $Tickets = $this->Ticket->findTicketbyId($ticket_id);
    $lead_id = $Appointments['Appointment']['lead_id'];
    $Lead = $this->Lead->findLeadbyId($lead_id); 
    //print_r($Lead);die();
    $Phone = $this->Phone->findbyUserid($user_id);
    //Product
    // print_r($Phone);die();
    $this->set('Appointments', $Appointments);
    $this->set('user', $user);
    $this->set('Ticket', $Tickets);
    $this->set('Phone', $Phone);
    $this->set('Lead', $Lead);

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Appointmentview($id){
    $this->layout="frontenduser";
$this->set('title','Profile');
    $Appointment = $this->Appointment->findAppointmentbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Appointment->editAppointmentbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Appointments','action'=>'Appointmentview'));
    }
  //  $this->data = $Appointment ; 
    $this->set('Appointment', $Appointment);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Appointment()
{
    $this->layout="frontenduser";
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
    $this->layout="frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Appointment->query("Update Appointments set  status = '1'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function unapprove()
{
    $this->layout="frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Appointment->query("Update Appointments set  status = '0'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function decline()
{
    $this->layout="frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Appointment->query("Update Appointments set  decline = '1'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function undodecline()
{
    $this->layout="frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Appointment->query("Update Appointments set  decline = '0'  where id = $data");
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function inventory()
{

    $this->layout="frontenduser";
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
    $this->layout="frontenduser";
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
    $this->layout="frontenduser";
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


public function updateAppointment()
{
    $this->layout="frontenduser";
    $total =$this->request->data('total');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Appointment->updateAll(array('total' => "'$total'"),array('id' => $est_id));
       // $this->set('user', $user);
        

   }
        
  

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function updateAppointmentitem()
{
    $this->layout="frontenduser";
    $item =$this->request->data('item');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Appointment->updateAll(array('item' => "'$item'"),array('id' => $est_id));
       // $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
