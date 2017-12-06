<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class LeadsController extends AppController {

public $uses = array('Lead','Product','User','Invoice','Inventory','Phone','Address','Ticket','Appointment','Attachment','Email');


public function admin_add() 
{
   $this->set('title','Add Lead');
    if($this->request->is('post'))
    {
        
        $Leads=$this->request->data;
        //echo "<pre>";print_r($Leads);die();
        $this->Lead->addLeadAdmin($Leads);
        $this->Flash->success('Lead added Successfully', array('key' => 'positive'));
        $this->redirect(array("controller" => "Leads","action" => "leadlist"));
    }

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_ticketinfo() 
{
    $this->set('title','Add Lead');
   
    if($this->request->is('post'))
    {
        
       
       
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_newUser() 
{
    $this->set('title','Add Lead');
   
    if($this->request->is('post'))
    {
        
        $Leads=$this->request->data;
       // echo "<pre>";print_r($Leads);
      
            $user  = $this->request->data['User'];
            $Phone = $this->request->data['Phone'];
            $Address =  $this->request->data['Address'];
            $Lead =  $this->request->data['Lead'];
            $lead_id= $Lead['lead_id'];
      //  echo "<pre>";print_r($lead_id);die();
      // echo "<pre>";print_r($Phone);    
      // echo "<pre>";print_r($Address);die(); 
                $saveUser = $this->User->addUserAdmin($user);
            
                if($saveUser){ 

                    $user_id = $this->User->getInsertID();
                   // echo $user_id;    
                        $this->Lead->updateAll(array('user_id' => "'$user_id'"),array('id' => $lead_id));
                        $this->Phone->addPhoneAdmin($Phone); 
                        $phone_id= $this->Phone->getInsertID();
                        $this->Phone->updateAll(array('user_id' => "'$user_id'"),array('id' => $phone_id));


                        $this->Address->addAddressAdmin($Address);
                        $address_id= $this->Address->getInsertID();
                        $this->Address->updateAll(array('user_id' => "'$user_id'"),array('id' => $address_id));
                    //  $this->Lead->deleteLead($id);  
                    $this->Flash->success('User Add Successfully', array('key' => 'positive'));
                    return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));   

                        
                 
            }
           
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_newTicket() 
{
    $this->set('title','Add Lead');
   
    if($this->request->is('post'))
    {
        
        $Leads=$this->request->data;
        //echo "<pre>";print_r($Leads);die();  
      
            $Ticket  = $this->request->data['Ticket'];
            
            
            $u_id= $Ticket['user_id'];
            $lead_id= $Ticket['lead_id'];
            if($u_id=='') 
            {
                        $user  = $this->request->data['User'];
                        //echo "<pre>";print_r($this->request->data);
                        //echo "<pre>";print_r($user);  die();  
                        $saveUser = $this->User->addUserAdmin($user);
                

                        $new_user_id = $this->User->getInsertID();
                        //echo $new_user_id;  die();
                        $first_name= $Leads['User']['first_name'];
                        $last_name= $Leads['User']['last_name'];
                        $name = $first_name.' '.$last_name;

                        $this->Lead->updateAll(array('user_id' => "'$new_user_id'"),array('id' => $lead_id));
                        $save = $this->Ticket->addTicketAdmin($Ticket);
            

                        $Ticket_id = $this->Ticket->getInsertID();
                        $this->Ticket->updateAll(array('name' => "'$name'",'user_id' => "'$new_user_id'"),array('id' => $Ticket_id));
                        $this->Lead->updateAll(array('ticket_id' => "'$Ticket_id'"),array('id' => $lead_id));

                    //  $this->Lead->deleteLead($id);  
                        $this->Flash->success('User And Ticket Add Successfully', array('key' => 'positive'));
                        return  $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$Ticket_id));   
                              
                     
            }
            else{  

                $tickets=$this->request->data;
                 
               // echo "<pre>";print_r($tickets);die();
                $Ticket  = $this->request->data['Ticket'];
                
                $user_id=$tickets['Ticket']['user_id'];
                
                
                $user = $this->User->findUserbyId($user_id);
                //echo "<pre>";print_r($user);die(); 
                $first_name= $user['User']['first_name'];
                 $last_name= $user['User']['last_name'];
                $name= $first_name.' '.$last_name;
                $save = $this->Ticket->addTicketAdmin($Ticket); 
                
               // $this->Product->save($this->request->data['Email']);

                $Ticket_id = $this->Ticket->getInsertID();
                $this->Ticket->updateAll(array('name' => "'$name'"),array('id' => $Ticket_id));
                $this->Lead->updateAll(array('ticket_id' => "'$Ticket_id'"),array('id' => $lead_id));

                $this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$Ticket_id));


            }
      
      
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_existingUser() 
{
   
     
    if($this->request->is('post'))
    {
        $Leads=$this->request->data;
        $name=$Leads['Lead']['name'];
        $Lead =  $this->request->data['Lead'];
        $lead_id= $Lead['lead_id'];
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
                $this->Lead->updateAll(array('user_id' => "'$user_id'"),array('id' => $lead_id));
                $this->Flash->success('Attech Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[2]'  or email = '$user[2]'");
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
                $this->Lead->updateAll(array('user_id' => "'$user_id'"),array('id' => $lead_id));
                $this->Flash->success('Attech Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
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
                $this->Lead->updateAll(array('user_id' => "'$user_id'"),array('id' => $lead_id));
                $this->Flash->success('Attech Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
                
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
                $this->Lead->updateAll(array('user_id' => "'$user_id'"),array('id' => $lead_id));
                $this->Flash->success('Attech Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
               
            }  

        }
    }
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_lookup() 
{   
    if($this->request->is('post'))
    {
        
       return $this->redirect(array('controller'=>'Leads','action'=>'add'));
       
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_convertlead($id){
    $this->set('title','Edit Lead');
    $session_id = $this->Session->read('User_id');
    $session_email = $this->User->find('first', array('fields' => array('User.email','User.first_name'),'conditions' => array('User.id' =>  $session_id )));
    $user_first_name=$session_email['User']['first_name'];

    $Lead = $this->Lead->findLeadbyId($id); // Get Lead Detail from id
    $userid = $Lead['Lead']['user_id'];
    $ticketid = $Lead['Lead']['ticket_id'];
    $user = $this->User->findUserbyId($userid);

    $Appointment = $this->Appointment->findAppointmentbyLeadId($id);
    $Attachment = $this->Attachment->findAttachmentbyLeadId($id);
    $Email = $this->Email->findEmailbyLeadId($id);
    //echo "<pre>";print_r($Email);die();

    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->Lead->editLeadbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Lead', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Leads','action'=>'leadlist'));
 
        

    }
    $this->data = $Lead ;
    $this->set(compact('Lead'));
    $this->set(compact('product'));
    $this->set('user_first_name', $user_first_name);   
    $this->set('userid', $userid);   
    $this->set('user', $user);
    $this->set('ticketid', $ticketid);
    $this->set('Appointment', $Appointment);
    $this->set('Attachment', $Attachment);
    $this->set('Email', $Email);
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_editingLead($id){
    $this->set('title','Edit Lead');

    $Lead= $this->Lead->findLeadbyId($id); // Get Lead Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Lead->editLeadbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Lead', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Leads','action'=>'leadlist'));

        

    }
    $this->data = $Lead ;
    $this->set(compact('Lead'));
    $this->set(compact('product'));
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deleteLead($id){
    $this->Lead->deleteLead($id);
    $this->Flash->success('Lead Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Leads','action'=>'leadlist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_leadlist()
{
    $this->set('title','Lead List');
    

    $Leads = $this->Lead->allLeads();
    $this->set('Leads', $Leads);
    //print_r($Leads);die();
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Leaddetails($user_id,$inv_id) {
    $this->set('title','Lead List');
    

    $Leads = $this->Lead->findLeadbyId($inv_id);
    $user = $this->User->findUserbyId($user_id);
    $Inventory = $this->Inventory->findInventorybyLeadId($inv_id);
    //$Inventory = $this->Inventory->findInventorybyProductId($inv_id);
    //Product
    //print_r($Inventory);die();
    $this->set('Leads', $Leads);
    $this->set('user', $user);
    $this->set('Inventory', $Inventory);
    

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Leadview($id){
$this->set('title','Profile');
    $Lead = $this->Lead->findLeadbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Lead->editLeadbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Leads','action'=>'Leadview'));
    }
  //  $this->data = $Lead ; 
    $this->set('Lead', $Lead);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_lead()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
        //print_r($user);die();
        $this->set('user', $user);
        

   }
        
  

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_statusupdate()
{

    $status =$this->request->data('status');
    $lead_id =$this->request->data('lead_id');
    if ($this->request->is('ajax'))
    {
        $this->Lead->updateAll(array('status' => "'$status'"),array('id' => $lead_id));
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_email()
{

    $id =$this->request->data('id');

    if ($this->request->is('ajax'))
    {
      $email = $this->User->query("SELECT first_name,email FROM users where id='$id'");
      //  print_r($email);
        $this->set('email', $email);
        $this->layout=false;
        //$this->autoRender=false;

   }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_loadmodel()
{
    $lead_id =$this->request->data('lead_id');
    if ($this->request->is('ajax'))
    {
        $Lead= $this->Lead->findLeadbyId($lead_id);
        //echo "<pre>";print_r($Lead);

        $this->set('Leads', $Lead);
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_assigneeupdate()
{

    $assignee =$this->request->data('assignee');
    $lead_id =$this->request->data('lead_id');
    if ($this->request->is('ajax'))
    {
        $this->Lead->updateAll(array('assignee' => "'$assignee'"),array('id' => $lead_id));
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_appointment()
{

        
        if($this->request->is('post'))
        { 
        
            $Appointments=$this->request->data;
            $lead_id = $Appointments['Appointment']['lead_id'];
            //echo "<pre>";print_r($Appointments);die();
            $save = $this->Appointment->addAppointmentAdmin($Appointments);
            $Appointment_id = $this->Appointment->getInsertID();
            $this->Flash->success('Appointments added Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));  
        }


}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_merge()
{

        
        if($this->request->is('post'))
        { 
        
            $merge=$this->request->data;
            $lead_id = $merge['Ticket']['lead_id'];
            $user_id = $merge['Ticket']['user_id'];
            $ticket_id = $merge['Ticket']['ticket_id'];
            $Ticket = $this->Ticket->findTicketbyId($ticket_id);
            //echo "<pre>";print_r($merge);die();
            $count = count($Ticket); 
            if($count=='0')
            {
                $this->Flash->success("We couldn't find that Ticket, try again.", array('key' => 'positive'));

                return $this->redirect(array('controller'=>'Leads','action'=>'convertlead',$lead_id));
            }
            else
            {
                $this->Lead->updateAll(array('ticket_id' => "'$ticket_id'",'user_id' => "'$user_id'"),array('id' => $lead_id));

                $this->Flash->success('Lead Converted Successfully', array('key' => 'positive'));
                return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$ticket_id));
            } 
        }


}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_attachment()
{
    
        
    if ($this->request->is(['post','put'])) 
    {
        $data= $this->request->data;
        $attachment = $this->data['Lead'];
        $name = $this->data['Lead']['file']['name'];
        $user_id = $this->data['Lead']['user_id'];
        $lead_id = $this->data['Lead']['lead_id'];
      //  echo "<pre>";print_r($name);
       // echo "<pre>";print_r($data);
        $upload_dir = "img/attachment/";

        if(!empty($name)){

             $file = $this->data['Lead']['file'];
             //move_uploaded_file($_FILES["files"]["tmp_name"],$file['tmp_name'],'/img/attachment/' . $file['name']);
             //$this->data['Lead']['image'] = $file['name'];die();

                $temp = explode(".", $file['name']);
                $extension = end($temp);
                $a1  = $file["name"];
                $a2 = rand();
                $aa = $a2."$a1";
              //  echo "<pre>"; print_r($aa); die();
                //    $aa = $aa . "."."$extension";
                //$name[] = $aa;
               // move_uploaded_file($this->data['Lead']['file']["tmp_name"], $upload_dir . $aa);die();
                move_uploaded_file($this->data['Lead']['file']["tmp_name"], $upload_dir . $aa);

        } 

        if ($this->Attachment->addAttachmentAdmin($data)) {

            $attachment_id = $this->Attachment->getInsertID();
            $this->Attachment->updateAll(array('user_id' => "'$user_id'",'lead_id' => "'$lead_id'" ,'file'=>"'$aa'"),array('id' => $attachment_id));
            $this->Flash->success('File Attech Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));  
 
        } else {
            $this->Flash->success('File Not be Attech', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));  
 
        }

    }    




}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_deleteAttachment($id,$lead_id,$file_name)
{
    
    $this->Attachment->deleteAttachment($id);
    unlink('img/attachment/'.$file_name);
    //unlink("uploads/".$row['file']);
    $this->Flash->success('Attachment Deleted Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));  
 


}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_newemail()
{      
    if ($this->request->is(['post','put'])) 
    {
        
        $data = $this->request->data;
        //echo "<pre>";print_r($data);die();
        $from =$data['lead']['email_from'];
        $to =$data['lead']['email_to'];
        $subject =$data['lead']['subject'];
        $message =$data['lead']['message'];
        $cc =$data['lead']['cc'];
        $bcc =$data['lead']['bcc'];
        $user_id =$data['lead']['user_id'];
        $lead_id =$data['lead']['lead_id'];
        $user =$data['lead']['user'];
        $save = $this->Email->addEmailAdmin($data);
        $email_id = $this->Email->getInsertID();
        $this->Email->updateAll(array('user_id' => "'$user_id'",'lead_id' => "'$lead_id'" ,'email_to'=>"'$to'",'email_from'=>"'$from'",'subject'=>"'$subject'",'message'=>"'$message'",'cc'=>"'$cc'",'bcc'=>"'$bcc'",'cc'=>"'$cc'",'user'=>"'$user'"),array('id' => $email_id));
        //echo "<pre>";print_r($data);echo $email_id;die();
        if(!empty($cc) && !empty($bcc))
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->cc($cc);
            $mail->bcc($bcc);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
        }
        elseif(!empty($cc))
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->cc($cc);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
        }
        elseif(!empty($bcc))
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->bcc($bcc);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
        }
        else
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));  
        }
    }    
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


public function add() 
{
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Add Lead');
    if($this->request->is('post'))
    {
        
        $Leads=$this->request->data;
        //echo "<pre>";print_r($Leads);die();
        $this->Lead->addLeadAdmin($Leads);
        $this->Flash->success('Lead added Successfully', array('key' => 'positive'));
        $this->redirect(array("controller" => "Leads","action" => "leadlist"));
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function ticketinfo() 
{
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Add Lead');
   
    if($this->request->is('post'))
    {
        
       
       
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function newUser() 
{
    $this->layout = "frontenduser";
    $this->set('title','Add Lead');
   
    if($this->request->is('post'))
    {
        
        $Leads=$this->request->data;
       // echo "<pre>";print_r($Leads);
      
            $user  = $this->request->data['User'];
            $Phone = $this->request->data['Phone'];
            $Address =  $this->request->data['Address'];
            $Lead =  $this->request->data['Lead'];
            $lead_id= $Lead['lead_id'];
      //  echo "<pre>";print_r($lead_id);die();
      // echo "<pre>";print_r($Phone);    
      // echo "<pre>";print_r($Address);die(); 
                $saveUser = $this->User->addUserAdmin($user);
            
                if($saveUser){ 

                    $user_id = $this->User->getInsertID();
                   // echo $user_id;    
                        $this->Lead->updateAll(array('user_id' => "'$user_id'"),array('id' => $lead_id));
                        $this->Phone->addPhoneAdmin($Phone); 
                        $phone_id= $this->Phone->getInsertID();
                        $this->Phone->updateAll(array('user_id' => "'$user_id'"),array('id' => $phone_id));


                        $this->Address->addAddressAdmin($Address);
                        $address_id= $this->Address->getInsertID();
                        $this->Address->updateAll(array('user_id' => "'$user_id'"),array('id' => $address_id));
                    //  $this->Lead->deleteLead($id);  
                    $this->Flash->success('User Add Successfully', array('key' => 'positive'));
                    return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));   

                        
                 
            }
           
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
public function newTicket() 
{
    $this->layout = "frontenduser";
    $this->set('title','Add Lead');
   
    if($this->request->is('post'))
    {
        
        $Leads=$this->request->data;
        //echo "<pre>";print_r($Leads);die();  
      
            $Ticket  = $this->request->data['Ticket'];
            
            
            $u_id= $Ticket['user_id'];
            $lead_id= $Ticket['lead_id'];
            if($u_id=='') 
            {
                        $user  = $this->request->data['User'];
                        //echo "<pre>";print_r($this->request->data);
                        //echo "<pre>";print_r($user);  die();  
                        $saveUser = $this->User->addUserAdmin($user);
                

                        $new_user_id = $this->User->getInsertID();
                        //echo $new_user_id;  die();
                        $first_name= $Leads['User']['first_name'];
                        $last_name= $Leads['User']['last_name'];
                        $name = $first_name.' '.$last_name;

                        $this->Lead->updateAll(array('user_id' => "'$new_user_id'"),array('id' => $lead_id));
                        $save = $this->Ticket->addTicketAdmin($Ticket);
            

                        $Ticket_id = $this->Ticket->getInsertID();
                        $this->Ticket->updateAll(array('name' => "'$name'",'user_id' => "'$new_user_id'"),array('id' => $Ticket_id));
                        $this->Lead->updateAll(array('ticket_id' => "'$Ticket_id'"),array('id' => $lead_id));

                    //  $this->Lead->deleteLead($id);  
                        $this->Flash->success('User And Ticket Add Successfully', array('key' => 'positive'));
                        return  $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$Ticket_id));   
                              
                     
            }
            else{  

                $tickets=$this->request->data;
                 
               // echo "<pre>";print_r($tickets);die();
                $Ticket  = $this->request->data['Ticket'];
                
                $user_id=$tickets['Ticket']['user_id'];
                
                
                $user = $this->User->findUserbyId($user_id);
                //echo "<pre>";print_r($user);die(); 
                $first_name= $user['User']['first_name'];
                 $last_name= $user['User']['last_name'];
                $name= $first_name.' '.$last_name;
                $save = $this->Ticket->addTicketAdmin($Ticket); 
                
               // $this->Product->save($this->request->data['Email']);

                $Ticket_id = $this->Ticket->getInsertID();
                $this->Ticket->updateAll(array('name' => "'$name'"),array('id' => $Ticket_id));
                $this->Lead->updateAll(array('ticket_id' => "'$Ticket_id'"),array('id' => $lead_id));

                $this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$Ticket_id));


            }
      
      
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////

public function existingUser() 
{
   
    $this->layout = "frontenduser";
    if($this->request->is('post'))
    {
        $Leads=$this->request->data;
        $name=$Leads['Lead']['name'];
        $Lead =  $this->request->data['Lead'];
        $lead_id= $Lead['lead_id'];
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
                $this->Lead->updateAll(array('user_id' => "'$user_id'"),array('id' => $lead_id));
                $this->Flash->success('Attech Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[2]'  or email = '$user[2]'");
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
                $this->Lead->updateAll(array('user_id' => "'$user_id'"),array('id' => $lead_id));
                $this->Flash->success('Attech Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' or last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
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
                $this->Lead->updateAll(array('user_id' => "'$user_id'"),array('id' => $lead_id));
                $this->Flash->success('Attech Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
                
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
                $this->Lead->updateAll(array('user_id' => "'$user_id'"),array('id' => $lead_id));
                $this->Flash->success('Attech Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
               
            }  

        }
    }
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function lookup() 
{   
    $this->layout = "frontenduser";
    if($this->request->is('post'))
    {
        
       return $this->redirect(array('controller'=>'Leads','action'=>'add'));
       
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function convertlead($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Edit Lead');
    $session_id = $this->Session->read('User_id');
    $session_email = $this->User->find('first', array('fields' => array('User.email','User.first_name'),'conditions' => array('User.id' =>  $session_id )));
    $user_first_name=$session_email['User']['first_name'];

    $Lead = $this->Lead->findLeadbyId($id); // Get Lead Detail from id
    $userid = $Lead['Lead']['user_id'];
    $ticketid = $Lead['Lead']['ticket_id'];
    $user = $this->User->findUserbyId($userid);

    $Appointment = $this->Appointment->findAppointmentbyLeadId($id);
    $Attachment = $this->Attachment->findAttachmentbyLeadId($id);
    $Email = $this->Email->findEmailbyLeadId($id);
    //echo "<pre>";print_r($Email);die();

    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->Lead->editLeadbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Lead', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Leads','action'=>'leadlist'));
 
        

    }
    $this->data = $Lead ;
    $this->set(compact('Lead'));
    $this->set(compact('product'));
    $this->set('user_first_name', $user_first_name);   
    $this->set('userid', $userid);   
    $this->set('user', $user);
    $this->set('ticketid', $ticketid);
    $this->set('Appointment', $Appointment);
    $this->set('Attachment', $Attachment);
    $this->set('Email', $Email);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function editingLead($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Edit Lead');

    $Lead= $this->Lead->findLeadbyId($id); // Get Lead Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Lead->editLeadbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Lead', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Leads','action'=>'leadlist'));

        

    }
    $this->data = $Lead ;
    $this->set(compact('Lead'));
    $this->set(compact('product'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteLead($id){
    $this->layout = "frontenduser";
    $this->Lead->deleteLead($id);
    $this->Flash->success('Lead Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Leads','action'=>'leadlist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function leadlist()
{
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Lead List');
    $session_id = $this->Auth->User('id');

    $Leads = $this->Lead->findallLeadbyLoginId($session_id);
    //pr($Leads);die();
    $this->set('Leads', $Leads);
    //print_r($Leads);die();
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Leaddetails($user_id,$inv_id) {
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Lead List');
    

    $Leads = $this->Lead->findLeadbyId($inv_id);
    $user = $this->User->findUserbyId($user_id);
    $Inventory = $this->Inventory->findInventorybyLeadId($inv_id);
    //$Inventory = $this->Inventory->findInventorybyProductId($inv_id);
    //Product
    //print_r($Inventory);die();
    $this->set('Leads', $Leads);
    $this->set('user', $user);
    $this->set('Inventory', $Inventory);
    
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Leadview($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
$this->set('title','Profile');
    $Lead = $this->Lead->findLeadbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Lead->editLeadbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Leads','action'=>'Leadview'));
    }
  //  $this->data = $Lead ; 
    $this->set('Lead', $Lead);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function lead()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Auth->User('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where login_id = $session_id AND (first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%') AND role != 'staff'");
        //print_r($user);die();
        $this->set('user', $user);
        

   }
        
  

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function statusupdate()
{
    $this->layout = "frontenduser";
    $status =$this->request->data('status');
    $lead_id =$this->request->data('lead_id');
    if ($this->request->is('ajax'))
    {
        $this->Lead->updateAll(array('status' => "'$status'"),array('id' => $lead_id));
    }
    exit();
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function email()
{
    $this->layout = "frontenduser";
    $id =$this->request->data('id');

    if ($this->request->is('ajax'))
    {
      $email = $this->User->query("SELECT first_name,email FROM users where id='$id'");
      //  print_r($email);
        $this->set('email', $email);
        $this->layout=false;
        //$this->autoRender=false;

   }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function loadmodel1()
{
    $this->layout = "frontenduser";
    $lead_id =$this->request->data('lead_id');
    if ($this->request->is('ajax'))
    {
        $Lead= $this->Lead->findLeadbyId($lead_id);
        //echo "<pre>";print_r($Lead);

        $this->set('Leads', $Lead);
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function assigneeupdate()
{
    $this->layout = "frontenduser";
    $assignee =$this->request->data('assignee');
    $lead_id =$this->request->data('lead_id');
    if ($this->request->is('ajax'))
    {
        $this->Lead->updateAll(array('assignee' => "'$assignee'"),array('id' => $lead_id));
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function appointment()
{
    $this->layout = "frontenduser";
        
        if($this->request->is('post'))
        { 
        
            $Appointments=$this->request->data;
            $lead_id = $Appointments['Appointment']['lead_id'];
            //echo "<pre>";print_r($Appointments);die();
            $save = $this->Appointment->addAppointmentAdmin($Appointments);
            $Appointment_id = $this->Appointment->getInsertID();
            $this->Flash->success('Appointments added Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));  
        }


}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function merge()
{
    $this->layout = "frontenduser";
        
        if($this->request->is('post'))
        { 
        
            $merge=$this->request->data;
            $lead_id = $merge['Ticket']['lead_id'];
            $user_id = $merge['Ticket']['user_id'];
            $ticket_id = $merge['Ticket']['ticket_id'];
            $Ticket = $this->Ticket->findTicketbyId($ticket_id);
            //echo "<pre>";print_r($merge);die();
            $count = count($Ticket); 
            if($count=='0')
            {
                $this->Flash->success("We couldn't find that Ticket, try again.", array('key' => 'positive'));

                return $this->redirect(array('controller'=>'Leads','action'=>'convertlead',$lead_id));
            }
            else
            {
                $this->Lead->updateAll(array('ticket_id' => "'$ticket_id'",'user_id' => "'$user_id'"),array('id' => $lead_id));

                $this->Flash->success('Lead Converted Successfully', array('key' => 'positive'));
                return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$ticket_id));
            } 
        }


}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function attachment()
{
    $this->layout = "frontenduser";
        
    if ($this->request->is(['post','put'])) 
    {
        $data= $this->request->data;
        $attachment = $this->data['Lead'];
        $name = $this->data['Lead']['file']['name'];
        $user_id = $this->data['Lead']['user_id'];
        $lead_id = $this->data['Lead']['lead_id'];
      //  echo "<pre>";print_r($name);
       // echo "<pre>";print_r($data);
        $upload_dir = "img/attachment/";

        if(!empty($name)){

             $file = $this->data['Lead']['file'];
             //move_uploaded_file($_FILES["files"]["tmp_name"],$file['tmp_name'],'/img/attachment/' . $file['name']);
             //$this->data['Lead']['image'] = $file['name'];die();

                $temp = explode(".", $file['name']);
                $extension = end($temp);
                $a1  = $file["name"];
                $a2 = rand();
                $aa = $a2."$a1";
              //  echo "<pre>"; print_r($aa); die();
                //    $aa = $aa . "."."$extension";
                //$name[] = $aa;
               // move_uploaded_file($this->data['Lead']['file']["tmp_name"], $upload_dir . $aa);die();
                move_uploaded_file($this->data['Lead']['file']["tmp_name"], $upload_dir . $aa);

        } 

        if ($this->Attachment->addAttachmentAdmin($data)) {

            $attachment_id = $this->Attachment->getInsertID();
            $this->Attachment->updateAll(array('user_id' => "'$user_id'",'lead_id' => "'$lead_id'" ,'file'=>"'$aa'"),array('id' => $attachment_id));
            $this->Flash->success('File Attech Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));  
 
        } else {
            $this->Flash->success('File Not be Attech', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));  
 
        }

    }    




}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function deleteAttachment($id,$lead_id,$file_name)
{
    $this->layout = "frontenduser";
    $this->Attachment->deleteAttachment($id);
    unlink('img/attachment/'.$file_name);
    //unlink("uploads/".$row['file']);
    $this->Flash->success('Attachment Deleted Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));  
 


}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function newemail()
{      
    $this->layout="frontenduser";
    if ($this->request->is(['post','put'])) 
    {
        
        $data = $this->request->data;
        //echo "<pre>";print_r($data);die();
        $from =$data['lead']['email_from'];
        $to =$data['lead']['email_to'];
        $subject =$data['lead']['subject'];
        $message =$data['lead']['message'];
        $cc =$data['lead']['cc'];
        $bcc =$data['lead']['bcc'];
        $user_id =$data['lead']['user_id'];
        $lead_id =$data['lead']['lead_id'];
        $user =$data['lead']['user'];
        $save = $this->Email->addEmailAdmin($data);
        $email_id = $this->Email->getInsertID();
        $this->Email->updateAll(array('user_id' => "'$user_id'",'lead_id' => "'$lead_id'" ,'email_to'=>"'$to'",'email_from'=>"'$from'",'subject'=>"'$subject'",'message'=>"'$message'",'cc'=>"'$cc'",'bcc'=>"'$bcc'",'cc'=>"'$cc'",'user'=>"'$user'"),array('id' => $email_id));
        //echo "<pre>";print_r($data);echo $email_id;die();
        if(!empty($cc) && !empty($bcc))
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->cc($cc);
            $mail->bcc($bcc);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
        }
        elseif(!empty($cc))
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->cc($cc);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
        }
        elseif(!empty($bcc))
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->bcc($bcc);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));
        }
        else
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Leads","action" => "convertlead",$lead_id));  
        }
    }    
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}