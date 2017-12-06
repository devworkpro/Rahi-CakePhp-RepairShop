<?php
App::uses('AppController', 'Controller');

class CalendarsController extends AppController {

public $uses = array('Calendar','Product','User','Appointment','Inventory','Ticket');


public function admin_add() 
{
    $this->set('title','Add Calendar');
    $Appointments = $this->Appointment->allAppointments();
    $Summary=$this->Appointment->find('list',array('fields'=>array('summary')));
    
    //$Ticket=$this->Ticket->find('list',array('fields'=>array('title')));
    //print_r($name);
    //print_r($title);die();  
    if($this->request->is('post'))
    {
        $Calendar=$this->request->data;
        $name=$Calendar['Calendar']['customer_name'];
        $user = explode(" ", $name);
       

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' or last_name='$user[1]' or business_name='$user[2]'  or email='$user[3]' ");
            foreach($user as $users) {
            $user_id = $users['users']['id'];           
            }
           
    
            if(empty($user))
            {
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $Calendar_id));

                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                      
            }
            else
            {
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $Calendar_id));
                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));   

            }  
        }
        elseif(!empty($user[2]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[2]'  or email = '$user[2]'");
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];          
            }
            if(empty($user))
            {
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $Calendar_id));

                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
               
            }
            else{
               $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $Calendar_id));
                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));   

                
            }   

        }
        elseif(!empty($user[1]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            }
            if(empty($user))
            {
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $Calendar_id));

                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                
            }
            else{

                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $Calendar_id));
                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));   

                
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
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $Calendar_id));

                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                
            }
            else{
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $Calendar_id));
                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));   

               
            }  

        }
    }
    $this->set('Appointments', $Appointments);
    $this->set(compact('Summary'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_Calendaredit($id){
    $this->set('title','Edit Calendar');

    $Calendar= $this->Calendar->findCalendarbyId($id); // Get Calendar Detail from id
   
    if($this->request->is('post'))
    {
        $Calendar=$this->request->data;
        $name=$Calendar['Calendar']['customer_name'];
        $user = explode(" ", $name);
       

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' or last_name='$user[1]' or business_name='$user[2]'  or email='$user[3]' ");
            foreach($user as $users) {
            $user_id = $users['users']['id'];           
            }
           
    
            if(empty($user))
            {
                $this->Calendar->editCalendarbyId($Calendar,$id); 
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                      
            }
            else
            {
                $this->Calendar->editCalendarbyId($Calendar,$id);
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));   

            }  
        }
        elseif(!empty($user[2]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[2]'  or email = '$user[2]'");
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];          
            }
            if(empty($user))
            {
                $this->Calendar->editCalendarbyId($Calendar,$id); 
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                      
               
            }
            else{
                $this->Calendar->editCalendarbyId($Calendar,$id);
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));  

                
            }   

        }
        elseif(!empty($user[1]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            }
            if(empty($user))
            {
               $this->Calendar->editCalendarbyId($Calendar,$id); 
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                      
                
            }
            else{

                 $this->Calendar->editCalendarbyId($Calendar,$id);
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist")); 

                
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
                $this->Calendar->editCalendarbyId($Calendar,$id); 
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                      
                
            }
            else{
                 $this->Calendar->editCalendarbyId($Calendar,$id);
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));  

               
            }  

        }
    }

    $this->data = $Calendar ;
    $this->set(compact('Calendar'));

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deleteCalendar($id){
    $this->Calendar->deleteCalendar($id);
    $this->Flash->success('Calendar Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Calendars','action'=>'Calendarlist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_Calendarlist()
{

    $Calendar = $this->Calendar->allCalendars();

    
    $this->set(compact('Calendar'));

   //echo "<pre>";print_r($Calendar); die();

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Calendardetails($id) {
    $this->set('title','Calendar List'); 

    $Calendars = $this->Calendar->findCalendarbyId($id);
  
    $this->set('Calendars', $Calendars);
    

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Calendarview($id){
$this->set('title','Profile');
    $Calendar = $this->Calendar->findCalendarbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Calendar->editCalendarbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Calendars','action'=>'Calendarview'));
    }
  //  $this->data = $Calendar ; 
    $this->set('Calendar', $Calendar);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Calendar()
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
    $Calendar_id =$this->request->data('Calendar_id');
    if ($this->request->is('ajax'))
    {
       
        $this->Calendar->updateAll(array('status' => "'$status'"),array('id' => $Calendar_id));
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_schedule()
{

    $app_id =$this->request->data('app_id');
    if ($this->request->is('ajax'))
    {
        
        $Appointment=$this->Appointment->find('first',array('conditions'=>array('Appointment.id'=>$app_id)));
        $this->set('Appointment', $Appointment);
        //print_r($Appointment);die();
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_appointment()
{

        
        if($this->request->is('post'))
        { 
        
            $Appointments=$this->request->data;
            $id = $Appointments['Appointment']['id'];
            //echo "<pre>";print_r($Appointments);die();
            if($id!='')
            {
                $this->Appointment->editAppointmentbyId($Appointments,$id);
                $this->Flash->success('Appointments Re-Schedule Successfully', array('key' => 'positive'));
                return $this->redirect(array("controller" => "Calendars","action" => "add"));
            }
            $save = $this->Appointment->addAppointmentAdmin($Appointments);
            $Appointment_id = $this->Appointment->getInsertID();
            $this->Flash->success('Appointments Schedule Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Calendars","action" => "add"));  
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
	$this->layout="frontenduser";
    $this->set('title','Add Calendar');
    $session_id = $this->Auth->user('id');
    $Appointments = $this->Appointment->findallAppointmentsByLoginId($session_id);
    $Summary=$this->Appointment->find('list',array('fields'=>array('summary'),'conditions'=>array('login_id'=>$session_id)));
    $id = $this->Auth->user('id');
    $Entrycolor = $this->User->findUserCalendarEntryColorbyId($id);
    //pr($Entrycolor);die();
    //$Ticket=$this->Ticket->find('list',array('fields'=>array('title')));
    //pr($Summary);
    //pr($Appointments);die();  
    if($this->request->is('post'))
    {
        $Calendar=$this->request->data;
        $name=$Calendar['Calendar']['customer_name'];
        $user = explode(" ", $name);
       

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' or last_name='$user[1]' or business_name='$user[2]'  or email='$user[3]' ");
            foreach($user as $users) {
            $user_id = $users['users']['id'];           
            }
           
    
            if(empty($user))
            {
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $Calendar_id));

                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                      
            }
            else
            {
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $Calendar_id));
                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));   

            }  
        }
        elseif(!empty($user[2]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[2]'  or email = '$user[2]'");
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];          
            }
            if(empty($user))
            {
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $Calendar_id));

                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
               
            }
            else{
               $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $Calendar_id));
                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));   

                
            }   

        }
        elseif(!empty($user[1]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            }
            if(empty($user))
            {
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $Calendar_id));

                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                
            }
            else{

                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $Calendar_id));
                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));   

                
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
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $Calendar_id));

                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                
            }
            else{
                $save = $this->Calendar->addCalendarAdmin($Calendar);
                $Calendar_id = $this->Calendar->getInsertID();
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $Calendar_id));
                $this->Flash->success('Calendar added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));   

               
            }  

        }
    }
    $this->set('Appointments', $Appointments);
    $this->set(compact('Summary','Entrycolor'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function Calendaredit($id){
	$this->layout="frontenduser";
    $this->set('title','Edit Calendar');

    $Calendar= $this->Calendar->findCalendarbyId($id); // Get Calendar Detail from id
   
    if($this->request->is('post'))
    {
        $Calendar=$this->request->data;
        $name=$Calendar['Calendar']['customer_name'];
        $user = explode(" ", $name);
       

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' or last_name='$user[1]' or business_name='$user[2]'  or email='$user[3]' ");
            foreach($user as $users) {
            $user_id = $users['users']['id'];           
            }
           
    
            if(empty($user))
            {
                $this->Calendar->editCalendarbyId($Calendar,$id); 
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                      
            }
            else
            {
                $this->Calendar->editCalendarbyId($Calendar,$id);
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));   

            }  
        }
        elseif(!empty($user[2]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[2]'  or email = '$user[2]'");
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];          
            }
            if(empty($user))
            {
                $this->Calendar->editCalendarbyId($Calendar,$id); 
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                      
               
            }
            else{
                $this->Calendar->editCalendarbyId($Calendar,$id);
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));  

                
            }   

        }
        elseif(!empty($user[1]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            }
            if(empty($user))
            {
               $this->Calendar->editCalendarbyId($Calendar,$id); 
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                      
                
            }
            else{

                 $this->Calendar->editCalendarbyId($Calendar,$id);
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist")); 

                
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
                $this->Calendar->editCalendarbyId($Calendar,$id); 
                
                $this->Calendar->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));
                      
                
            }
            else{
                 $this->Calendar->editCalendarbyId($Calendar,$id);
                $this->Calendar->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Calendar', array('key' => 'positive'));
                $this->redirect(array("controller" => "Calendars","action" => "Calendarlist"));  

               
            }  

        }
    }

    $this->data = $Calendar ;
    $this->set(compact('Calendar'));

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteCalendar($id){
	$this->layout="frontenduser";
    $this->Calendar->deleteCalendar($id);
    $this->Flash->success('Calendar Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Calendars','action'=>'Calendarlist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function Calendarlist()
{
	$this->layout="frontenduser";
    $Calendar = $this->Calendar->allCalendars();

    
    $this->set(compact('Calendar'));

   //echo "<pre>";print_r($Calendar); die();

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Calendardetails($id) {
	$this->layout="frontenduser";
    $this->set('title','Calendar List'); 

    $Calendars = $this->Calendar->findCalendarbyId($id);
  
    $this->set('Calendars', $Calendars);
    

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Calendarview($id){
	$this->layout="frontenduser";
    $this->set('title','Profile');
    $Calendar = $this->Calendar->findCalendarbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Calendar->editCalendarbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Calendars','action'=>'Calendarview'));
    }
  //  $this->data = $Calendar ; 
    $this->set('Calendar', $Calendar);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Calendar()
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


public function statusupdate()
{
	$this->layout="frontenduser";
    $status =$this->request->data('status');
    $Calendar_id =$this->request->data('Calendar_id');
    if ($this->request->is('ajax'))
    {
       
        $this->Calendar->updateAll(array('status' => "'$status'"),array('id' => $Calendar_id));
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function schedule()
{
	$this->layout="frontenduser";
    $app_id =$this->request->data('app_id');
    if ($this->request->is('ajax'))
    {
        
        $Appointment=$this->Appointment->find('first',array('conditions'=>array('Appointment.id'=>$app_id)));
        $this->set('Appointment', $Appointment);
        //print_r($Appointment);die();
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function appointment()
{

        $this->layout="frontenduser";
        if($this->request->is('post'))
        { 
        
            $Appointments=$this->request->data;
            $id = $Appointments['Appointment']['id'];
            //echo "<pre>";print_r($Appointments);die();
            if($id!='')
            {
                $this->Appointment->editAppointmentbyId($Appointments,$id);
                $this->Flash->success('Appointments Re-Schedule Successfully', array('key' => 'positive'));
                return $this->redirect(array("controller" => "Calendars","action" => "add"));
            }
            $save = $this->Appointment->addAppointmentAdmin($Appointments);
            $Appointment_id = $this->Appointment->getInsertID();
            $this->Flash->success('Appointments Schedule Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Calendars","action" => "add"));  
        }


}





//////////////////////////////////////////////////////////////////////////////////////////////////////////////

}