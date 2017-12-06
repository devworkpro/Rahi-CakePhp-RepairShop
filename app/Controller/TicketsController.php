<?php
App::uses('AppController', 'Controller'); 
class TicketsController extends AppController {

public $uses = array('Ticket','Product','User','Sale','Address','Appointment','Phone','Comment','CustomField','CustomFieldType','CustomFieldValue','AssetFieldValue','Contract','CannedResponse','Log','Sla','TicketCategory','Template','Disclaimer','TransferLocation','Multilocation');


public function admin_add() 
{
    $this->set('title','Add Ticket');
     
    if($this->request->is('post'))
    {
        $Tickets=$this->request->data;
        $name=$Tickets['Ticket']['name'];
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
                $this->redirect(array("controller" => "Tickets","action" => "new",$user_id));   

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
                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Tickets","action" => "new",$user_id));   
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

                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Tickets","action" => "new",$user_id));   
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
                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Tickets","action" => "new",$user_id));   
            }  

        }
    }
}




////////////////////////<!--Custom Fields-->/////////////////////////////////////////

public function admin_customfieldtype() 
{
    //echo $user_id;die();
   $CustomFieldId =$this->request->data('CustomFieldId');
   $CustomFieldTypes = $this->CustomFieldType->findallCustomFieldTypeByfieldId($CustomFieldId);
   //pr($CustomFieldTypes);
   $this->set('CustomFieldTypes', $CustomFieldTypes); 
    
}


////////////////////////////////////////////////////////////////////

public function admin_customfieldtypemodel() 
{
    //echo $user_id;die();
   $CustomFieldId =$this->request->data('CustomFieldId');
   $CustomFieldTypes = $this->CustomFieldType->findallCustomFieldTypeByfieldId($CustomFieldId);
   //pr($CustomFieldTypes);
   $this->set('CustomFieldTypes', $CustomFieldTypes); 
    
}

////////////////////////////////////////////////////////////////////

public function admin_customfields() 
{
    //echo $user_id;die();
   $this->set('title','Add Ticket');
   $CustomField = $this->CustomField->findAllCustomFieldType();
   $this->set('CustomField', $CustomField); 
    
}

////////////////////////////////////////////////////////////////////////////////

public function admin_disableticketfield($field_id){
    $this->CustomField->disableCustomFieldTypeAdmin($field_id);
    $this->Flash->success('Ticket Type Disable Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Tickets','action'=>'customfields'));
}

////////////////////////////////////////////////////////////////////

public function admin_fieldtype() 
{
    //echo $user_id;die();
    $this->set('title','Custom Field Type');
    if($this->request->is('post')){
        $Tickets=$this->request->data;

        $save = $this->CustomField->addCustomFieldTypeAdmin($Tickets);
        $field_id = $this->CustomField->getInsertID();
        $this->Flash->success('Field added Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Tickets","action" => "ticketfields",$field_id));
    }
    
}


////////////////////////////////////////////////////////////////////

public function admin_ticketfields($field_id) 
{
    //echo $field_id;
    $name = $this->CustomField->findCustomFieldTypeNameById($field_id);
    $CustomFieldType = $this->CustomFieldType->findallCustomFieldTypeByfieldId($field_id);
    //pr($CustomFieldType);
    //pr($name);die();
    $this->set('title','Ticket Fields');

    if($this->request->is('post')){
        $Tickets=$this->request->data;

        $save = $this->CustomField->addCustomFieldTypeAdmin($Tickets);
        $field_id = $this->CustomField->getInsertID();
        $this->Flash->success('Field added Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Tickets","action" => "ticketfields",$field_id));

    }
    $this->set('name', $name); 
    $this->set('CustomFieldType', $CustomFieldType); 
}

////////////////////////////////////////////////////////////////////

public function admin_newfield($field_id) 
{
    //echo $field_id;die();
    $name = $this->CustomField->findCustomFieldTypeNameById($field_id);
    $this->set('title','New Field');
    $this->set('name', $name); 
    $this->set('custom_field_id', $field_id); 
    
}

////////////////////////////////////////////////////////////////////

public function admin_addnewfield() 
{
    $this->set('title','Add New Field');
    if($this->request->is('post')){
        $Tickets=$this->request->data;

        //pr($Tickets);
        $custom_field_id = $Tickets['CustomFieldType']['custom_field_id'];
        $save = $this->CustomFieldType->addCustomFieldTypeAdmin($Tickets);
        //$field_id = $this->CustomFieldType->getInsertID();
        //pr($Tickets); echo $field_id; die();
        $this->Flash->success('Ticket Field added Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Tickets","action" => "ticketfields",$custom_field_id));
    }
   
}

////////////////////////////////////////////////////////////////////////////////

public function admin_ticketfieldsedit($CustomFieldType_id){

    $CustomFieldType = $this->CustomFieldType->findallCustomFieldTypeById($CustomFieldType_id);
    $this->set('CustomFieldType', $CustomFieldType);
    foreach($CustomFieldType as $cftype) {
            $custom_field_id = $cftype['CustomFieldType']['custom_field_id'];
    }
    $name = $this->CustomField->findCustomFieldTypeNameById($custom_field_id);
    $this->set('name', $name);
    //pr($name);
    //pr($CustomFieldType);die(); 
    //$this->set('custom_field_id', $field_id);
    //$this->Flash->success('Ticket Field Type Deleted Successfully', array('key' => 'positive'));  
    //return $this->redirect(array('controller'=>'Tickets','action'=>'ticketfields',$field_id));
}


////////////////////////////////////////////////////////////////////

public function admin_editnewfield() 
{
    $this->set('title','Edit New Field');
    if($this->request->is('post')){
        
        $Tickets=$this->request->data;

        //pr($Tickets);die();
        $id = $Tickets['CustomFieldType']['id'];
        $custom_field_id = $Tickets['CustomFieldType']['custom_field_id'];
        $save = $this->CustomFieldType->editCustomFieldTypeAdmin($Tickets,$id);
        //$field_id = $this->CustomFieldType->getInsertID();
        //pr($Tickets); echo $field_id; die();
        $this->Flash->success('Ticket Field Edit Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Tickets","action" => "ticketfields",$custom_field_id));
    }
   
}

////////////////////////////////////////////////////////////////////////////////

public function admin_ticketfieldsdelete($CustomFieldType_id,$custom_field_id){
    $this->CustomFieldType->DeleteCustomFieldType($CustomFieldType_id);
    $this->Flash->success('Ticket Field Type Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Tickets','action'=>'ticketfields',$custom_field_id));
}


////////////////////////////////////////////////////////////////////

public function admin_new($user_id) 
{
    //echo $user_id;die();
   $this->set('title','Add Ticket');
   $user = $this->User->findUserbyId($user_id);
   //$this->set('user', $user);
   $address = $this->Address->findAddressbyUserId($user_id);
  // print_r($address);die();
   //$this->set('address', $address);  
  // $this->set(compact('address'));
   $CustomFieldName = $this->CustomField->find('list',array('fields'=>array('name'),'conditions'=>array('CustomField.status'=>'0')));

   $AssetValue = $this->AssetFieldValue->find('all',array('conditions'=>array('AssetFieldValue.user_id'=>$user_id)));

   $Contract = $this->Contract->find('list',array('fields'=>array('contract_name'),'conditions'=>array('Contract.user_id'=>$user_id)));

   $Sla = $this->Sla->find('list',array('fields'=>array('name')));

   $CannedResponse = $this->CannedResponse->allCannedResponse();
   //$this->set('CannedResponse', $CannedResponse);
   //pr($Sla);die();
   //$this->set('CustomFieldName', $CustomFieldName);  
   //$this->set('AssetValue', $AssetValue); 
   //$this->set('Contract', $Contract); 
   $this->set(compact('user','address','CannedResponse','CustomFieldName','AssetValue','Contract','Sla'));
   
}


////////////////////////////////////////////////////////////////////

public function admin_addnew() 
{
    error_reporting(0);
    if($this->request->is('post')){

    $tickets=$this->request->data;
    $changes = json_encode($tickets);
    //pr($tickets);die();
    $CustomFieldValue =$this->request->data['CustomFieldValue'];
    
    $email=$this->request->data['Email'];

    $Ticket  = $this->request->data['Ticket'];
    
    $user_id=$tickets['Ticket']['user_id'];
    $address=$tickets['Ticket']['address'];
    $summary= $tickets['Ticket']['name'].'-'.$tickets['Ticket']['title'];
    $user = $this->User->findUserbyId($user_id);
    
    $save = $this->Ticket->addTicketAdmin($Ticket);
    $save = $this->Ticket->addTicketAdmin($this->request->data['Email']);
   // $this->Product->save($this->request->data['Email']);

    $Ticket_id = $this->Ticket->getInsertID();
    $logs['changes']=$changes;
    $logs['ticket_id']=$Ticket_id;
    $logs['employee']=$this->Session->read('Auth.User.email');
    $saveLog = $this->Log->addLog($logs);

    $Asset = $Ticket['asset'];
    
    if($Asset=='yes')
    {
        $AssetValue_id =  $this->request->data['AssetValue']['id'];
        //pr($Asset);die(); 
        foreach ($AssetValue_id as $assetvalue_id) {
            $this->AssetFieldValue->updateAll(array('ticket_id' => "'$Ticket_id'"),array('id' => $assetvalue_id));
        }  
    }
   
    $appointment = $Ticket['appointment'];

    if($appointment=='yes')
    {

    $Appointment = $this->request->data['Appointment'];
    $appointment=$this->Appointment->addAppointmentAdmin($Appointment);
    $appointment_id = $this->Appointment->getInsertID();

    $Ticket = $this->Ticket->findTicketbyId($Ticket_id);

    $description = 'Notes: Contact: '.$user['User']['first_name'].' '.$user['User']['last_name'].' Details: '.$Ticket['Ticket']['description'].' Customer Information: '.$Ticket['Ticket']['name'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip'].'-'.$user['User']['email'];


  //  $this->Appointment->query("Update appointments set description= '$description' ,   summary = '$summary' , user_id = '$user_id' , ticket_id= '$Ticket_id' ,address= '$address' where id = $appointment_id");
   

    $this->Appointment->updateAll(array('description' => "'$description'",'summary' => "'$summary'" , 'user_id' => "'$user_id'" , 'ticket_id'=> "'$Ticket_id'" ,'address'=> "'$address'"),array('id' => $appointment_id));

    }



    $counter = count($CustomFieldValue['value']);
    if($counter!='')
    {
        for($i=1;$i<=$counter;$i++)
        {
            $custom_field_id =$this->request->data['CustomFieldValue']['custom_field_id'];
            $value = $CustomFieldValue['value'][$i];
            $custom_field_type_id = $CustomFieldValue['custom_field_type_id'][$i];
            $field_type = $CustomFieldValue['field_type'][$i];
            $name = $CustomFieldValue['name'][$i];
            $user = $this->Sale->query("INSERT INTO custom_field_values (ticket_id,custom_field_id,custom_field_type_id,value,field_type,name) VALUES ('$Ticket_id','$custom_field_id','$custom_field_type_id','$value','$field_type','$name')");
        }
        $this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
    return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$Ticket_id));
    }
    //pr($CustomFieldValue);die();


    $this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
    return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$Ticket_id));

    }   
}




////////////////////////////////////////////////////////////////////




public function admin_addtender() 
{
   $this->set('title','Add Ticket');
     
    if($this->request->is('post'))
    {
        $Tickets=$this->request->data;
       // print_r($Tickets);
        $method=$Tickets['Ticket']['payment_method'];
        $user_id=$Tickets['Ticket']['user_id'];
        $amount_provided=$Tickets['Ticket']['amount_provided'];
        $total=$Tickets['Ticket']['total'];
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
        $save = $this->Ticket->addTicketAdmin($Tickets);
        $Ticket_id = $this->Ticket->getInsertID();
              //  echo $Ticket_id;die();
        $this->Ticket->updateAll(array('name' => "'$name'"),array('id' => $Ticket_id));
        // $this->Ticket->query("Update Tickets set  name = $name  where id = $Ticket_id");
        $this->Flash->success('Payment Successfull', array('key' => 'positive'));
        $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$user_id,$Ticket_id));   
    }
        

}






/////////////////////////CannedResponse/////////////////////////////////////////////



public function admin_addcannedresponse() 
{   
    $save = $this->CannedResponse->query("INSERT INTO canned_responses (title,body) VALUES ('Title','Body')");
    $this->Flash->success('Added Successfully', array('key' => 'positive'));
    return $this->redirect(array("controller" => "Tickets","action" => "cannedresponses"));
}

public function admin_cannedresponses() 
{    
    $CannedResponse = $this->CannedResponse->allCannedResponse();
    $this->set('CannedResponse', $CannedResponse);
    
}

public function admin_cannedresponseedit($id) 
{   
    $this->set('title','Edit Canned Response');
    
    if($this->request->is('post'))
    {       
        $conned = $this->request->data;
        $id = $conned['CannedResponse']['id'];
        $this->CannedResponse->editCannedResponseAdmin($this->request->data,$id);
        $this->Flash->success('Canned response updated successfully.', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Tickets","action" => "cannedresponseview",$id));
    }
    $CannedResponse = $this->CannedResponse->findCannedResponseById($id);
    $this->data = $CannedResponse;
    $this->set(compact('CannedResponse'));
}

public function admin_cannedresponseview($id) 
{   
    $this->set('title','view Canned Response');
    $CannedResponse = $this->CannedResponse->findCannedResponseById($id);
   // pr($CannedResponse);die();
    
    $this->set(compact('CannedResponse'));
}

public function admin_deletecannedresponse($id) 
{    
    $CannedResponse = $this->CannedResponse->DeleteCannedResponse($id);
    $this->Flash->success('Deleted Successfully', array('key' => 'positive'));
    return $this->redirect(array("controller" => "Tickets","action" => "cannedresponses"));
    
}


public function admin_updatecannedresponsetitle()
{

    $title =$this->request->data('title');
    $id =$this->request->data('id');

    if ($this->request->is('ajax'))
    {
        $this->CannedResponse->updateAll(array('title' => "'$title'"),array('id' => $id));
    }        
    exit();
}


public function admin_updatecannedresponsebody()
{

    $body =$this->request->data('body');
    $id =$this->request->data('id');

    if ($this->request->is('ajax'))
    {
        $this->CannedResponse->updateAll(array('body' => "'$body'"),array('id' => $id));
    }        
    exit();
}


////////////////////////////////////////////////////////////////////


public function admin_ticketedit($id){
    $this->set('title','Edit Ticket');

    $Ticket= $this->Ticket->findTicketbyId($id); // Get Ticket Detail from id

    $custom_field_id=$Ticket['Ticket']['custom_field_id'];
    $user_id = $Ticket['Ticket']['user_id'];
    //pr($Ticket);die();


//  pr($CustomFieldValue);die();

    $CustomFieldName = $this->CustomField->find('list',array('fields'=>array('name'),'conditions'=>array('CustomField.status'=>'0')));

   //pr($CustomFieldName);die();
    $this->set('CustomFieldName', $CustomFieldName);  

    $Contract = $this->Contract->find('list',array('fields'=>array('contract_name'),'conditions'=>array('Contract.user_id'=>$user_id)));

    //pr($Contract);die();
    $this->set('Contract', $Contract); 
    $Sla = $this->Sla->find('list',array('fields'=>array('name')));
    $this->set('Sla',$Sla);
    //$AssetfieldValue = $this->AssetFieldValue->find('all',array('conditions'=>array('AssetFieldValue.user_id' => $user_id),array('AssetFieldValue.ticket_id !=' => $id)));
    $AssetfieldValue = $this->AssetFieldValue->query("SELECT * FROM asset_field_values where user_id = '$user_id' AND ticket_id != '$id'");
    //pr($AssetfieldValue);die();
    $this->set('AssetfieldValue', $AssetfieldValue); 

    if($this->request->is('post'))
    { 
        $tic_id=$id;
        $changes = json_encode($this->request->data);
        $logs['changes']=$changes;
        $logs['ticket_id']=$id;
        $logs['edit']="edit";
        $logs['employee']=$this->Session->read('Auth.User.email');
        $saveLog = $this->Log->addLog($logs);
        //pr($this->request->data); 
        $ticket =  $this->request->data['Ticket'];
        $email =  $this->request->data['Email'];
        $CustomFieldValue =$this->request->data['CustomFieldValue'];
        $asset = $ticket['asset'];
        if($asset=='yes')
        {
            $AssetValue_id =  $this->request->data['AssetValue']['id'];
            //pr($AssetValue_id);die(); 
            foreach ($AssetValue_id as $assetvalue_id) {
                $this->AssetFieldValue->updateAll(array('ticket_id' => "'$id'"),array('id' => $assetvalue_id));
            }  
        }
        $this->Ticket->editTicketbyId($ticket,$tic_id); 
        $res = $this->Ticket->editTicketbyId($email,$tic_id);// Edit User
        if(!empty($custom_field_id))
        {

            $custom_field_id =$this->request->data['CustomFieldValue']['tickettext'];
            if($custom_field_id=='1')
            {
                $counter = count($CustomFieldValue['value']);
                for($i=1;$i<=$counter;$i++)
                {
                    $custom_field_id =$this->request->data['CustomFieldValue']['custom_field_id'];
                    $value = $CustomFieldValue['value'][$i];
                    $custom_field_type_id = $CustomFieldValue['custom_field_type_id'][$i];
                    $field_type = $CustomFieldValue['field_type'][$i];
                    $name = $CustomFieldValue['name'][$i];
                    $user = $this->CustomFieldValue->query("INSERT INTO custom_field_values (ticket_id,custom_field_id,custom_field_type_id,value,field_type,name) VALUES ('$id','$custom_field_id','$custom_field_type_id','$value','$field_type','$name')");
                }
            }
            else{
                $counter = count($CustomFieldValue['name']);
                for($i=1;$i<=$counter;$i++)
                {
                    $custom_field_id =$this->request->data['Ticket']['custom_field_id'];
                    $id = $CustomFieldValue['id'][$i];
                    $value = $CustomFieldValue['value'][$i];
                    $custom_field_type_id = $CustomFieldValue['custom_field_type_id'][$i];
                    $field_type = $CustomFieldValue['field_type'][$i];
                    $name = $CustomFieldValue['name'][$i];
                    
                    $user = $this->CustomFieldValue->query("UPDATE custom_field_values SET ticket_id='$tic_id',custom_field_id='$custom_field_id',custom_field_type_id='$custom_field_type_id',value='$value',field_type='$field_type',name='$name' WHERE id='$id'");
                    
                }
            }

        }
        $this->Flash->success('Successfully Edited Ticket', array('key' => 'positive'));

        return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$tic_id));
    }
    //$AssetValue = $this->AssetFieldValue->find('all',array('conditions'=>array('AssetFieldValue.ticket_id'=>$id)));
    //pr($AssetValue);die();
    //$this->set('AssetValue', $AssetValue); 

    $CustomFieldValue = $this->Ticket->query("SELECT custom_field_values.id,custom_field_values.custom_field_id ,custom_field_values.custom_field_type_id ,custom_field_values.field_type ,custom_field_values.value ,custom_field_values.name FROM custom_field_values  INNER JOIN tickets ON custom_field_values.ticket_id = tickets.id where ticket_id=$id");
    $this->data = $CustomFieldValue ;
    $this->set(compact('CustomFieldValue'));

    $AssetValue = $this->AssetFieldValue->find('all',array('conditions'=>array('AssetFieldValue.ticket_id'=>$id)));
    //pr($AssetValue);die();
    $this->set(compact('AssetValue'));

    $this->data = $Ticket ;
    $this->set(compact('Ticket'));
    
}


////////////////////////////////////////////////////////////////////


public function admin_ticketeditbycustomfield(){
    
    if($this->request->is('post'))
    { 
        //pr($this->request->data); die();
        $ticket =  $this->request->data['Ticket'];
        $CustomFieldValue =$this->request->data['CustomFieldValue'];
        $ticket_id = $CustomFieldValue['tic_id'];
        $res = $this->Ticket->editTicketbyId($ticket,$ticket_id);// Edit Ticket

        $text =$this->request->data['CustomFieldValue']['tickettext'];
        if($text=='1')
        {
            $counter = count($CustomFieldValue['value']);
            for($i=1;$i<=$counter;$i++)
            {
                $custom_field_id =$this->request->data['Ticket']['custom_field_id'];
                $value = $CustomFieldValue['value'][$i];
                $custom_field_type_id = $CustomFieldValue['custom_field_type_id'][$i];
                $field_type = $CustomFieldValue['field_type'][$i];
                $name = $CustomFieldValue['name'][$i];
                $user = $this->Sale->query("INSERT INTO custom_field_values (ticket_id,custom_field_id,custom_field_type_id,value,field_type,name) VALUES ('$ticket_id','$custom_field_id','$custom_field_type_id','$value','$field_type','$name')");
                
            }
            $this->Flash->success('Custom Fields Add Successfully', array('key' => 'positive'));

            return $this->redirect(array("controller" => "Tickets","action" => "ticketedit",$ticket_id));
        }
        else{
            $counter = count($CustomFieldValue['value']);
            //echo $counter;die();    
            for($i=1;$i<=$counter;$i++)
            {
                $id = $CustomFieldValue['id'][$i];
                $value = $CustomFieldValue['value'][$i];
                $custom_field_type_id = $CustomFieldValue['custom_field_type_id'][$i];
                $field_type = $CustomFieldValue['field_type'][$i];
                $name = $CustomFieldValue['name'][$i];
                

                $user = $this->Sale->query("UPDATE custom_field_values SET ticket_id='$ticket_id',custom_field_type_id='$custom_field_type_id',value='$value',field_type='$field_type',name='$name' WHERE id='$id'");
                
                
            }
            $this->Flash->success('Custom Fields Edited Successfully', array('key' => 'positive'));

            return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$ticket_id));
        }

        
    }
    exit();
}



///////////////////////////////////////////////////////////////////////////////////

public function admin_editingTicket($id){
    $this->set('title','Edit Ticket');

    $Ticket= $this->Ticket->findTicketbyId($id); // Get Ticket Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Ticket->editTicketbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Ticket', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Tickets','action'=>'Ticketlist'));

        

    }
    $this->data = $Ticket ;
    $this->set(compact('Ticket'));
    $this->set(compact('product'));
}





////////////////////////////////////////////////////////////////////////////////

public function admin_deleteTicket($id){
    $this->Ticket->deleteTicket($id);
    $this->Flash->success('Ticket Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Tickets','action'=>'ticketlist'));
}

////////////////////////////////////////////////////////////////////////////////

public function admin_TicketResolve($id){
    $this->Ticket->TicketResolve($id);
    $this->Flash->success('Ticket Update Successfully', array('key' => 'positive'));  
    return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$id));
}



// /////////////////////////////////////////////////////////

public function admin_Ticketlist()
{
    $this->set('title','Ticket List');
    

    $Tickets = $this->Ticket->allTickets();
    $this->set('Tickets', $Tickets);
    //print_r('products');



}

////////////////////////////////////////////////////////    

public function admin_ticketdetails($tic_id) {
    $this->set('title','Ticket List');

    $session_id = $this->Session->read('User_id');
    $session_email = $this->User->find('first', array('fields' => array('User.email','User.first_name'),'conditions' => array('User.id' =>  $session_id )));
    $email=$session_email['User']['email'];
    $user_first_name=$session_email['User']['first_name'];
   
    $Tickets = $this->Ticket->findTicketbyId($tic_id);

    $user_id=$Tickets['Ticket']['user_id'];
    $contract_id=$Tickets['Ticket']['contract_id'];
    $sla_id=$Tickets['Ticket']['sla_id'];

    $user = $this->User->findUserbyId($user_id);
    $Appointment = $this->Appointment-> findAppointmentbyTicketId($tic_id);
    //print_r($Tickets);die();
    //$this->set('sale', $sale);
    $Address = $this->Address->findAddressbyUserId($user_id);
    //pr($Address);die();
   
    $phone = $this->Phone->findbyUserid($user_id);
  // print_r($phone);die();
    $comment = $this->Comment->findCommentbyTicketId($tic_id);
   // print_r($comment);die();
    $CustomFieldName = $this->CustomField->find('list',array('fields'=>array('name'),'conditions'=>array('CustomField.status'=>'0')));
    //pr($CustomFieldName);die();

    $CustomFieldValue = $this->Ticket->query("SELECT custom_field_values.id,custom_field_values.custom_field_id ,custom_field_values.custom_field_type_id ,custom_field_values.field_type ,custom_field_values.value ,custom_field_values.name FROM custom_field_values  INNER JOIN tickets ON custom_field_values.ticket_id = tickets.id where ticket_id=$tic_id");
    //pr($CustomFieldValue);die();
    $this->data = $CustomFieldValue ;
    $this->set(compact('CustomFieldValue'));
    
    $AssetValue = $this->AssetFieldValue->query("SELECT asset_field_values.*, users.first_name ,users.last_name FROM asset_field_values  INNER JOIN users ON asset_field_values.user_id = users.id where asset_field_values.ticket_id = $tic_id");
    //pr($AssetValue);die();
    $this->set(compact('AssetValue'));

    $Contract = $this->Contract->findContractbyId($contract_id);
    $Sla = $this->Sla->findallSlaName();
    $SlaById = $this->Sla->findallSlaNameById($sla_id);
    $ContractByUser = $this->Contract->findContractbyUserId($user_id);
    $logs = $this->Log->findLogByTicketId($tic_id);
    //pr($Sla);
    //pr($ContractByUser);die();
    $this->set(compact('Sla','SlaById','Contract','ContractByUser','Address','phone','comment','Tickets','user','Appointment','email','user_first_name','CustomFieldName','logs'));
      
}

///////////////////////////////////////////////////ticketeditbycustomfield


public function admin_Ticketview($id){
$this->set('title','Profile');
    $Ticket = $this->Ticket->findTicketbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Ticket->editTicketbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Tickets','action'=>'Ticketview'));
    }
  //  $this->data = $Ticket ; 
    $this->set('Ticket', $Ticket);
}


/////////////////////////////////////////////////


public function admin_Ticket()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////



public function admin_Ticketupdate()
{

    $po_number =$this->request->data('po_number');
    $inv_id =$this->request->data('inv_id');
   
    if ($this->request->is('ajax'))
    {
       $this->Ticket->updateAll(array('po_number' => "'$po_number'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}

/////////////////////////////////////////////////////////////


public function admin_updateTicketitem()
{

    $item =$this->request->data('item');
    $Ticket_id =$this->request->data('Ticket_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('item' => "'$item'"),array('id' => $Ticket_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}

///////////////////////////////////////////////////////////////////


public function admin_updateTicket()
{

    $total =$this->request->data('total');
    $Ticket_id =$this->request->data('Ticket_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('total' => "'$total'"),array('id' => $Ticket_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}

//////////////////////////////////////////////////////////////////





public function admin_saleTicketupdate()
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


/////////////////////////////////////////////////////////////////

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



//////////////////////////////////////////////////////////////////

public function admin_statusupdate()
{

    $status =$this->request->data('status');
    $tic_id =$this->request->data('tic_id');
   echo $status;
   echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('status' => "'$status'"),array('id' => $tic_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}
/////////////////////////////////////////////////////////

public function admin_typeupdate()
{

    $type =$this->request->data('type');
    $tic_id =$this->request->data('tic_id');
   echo $type;
   echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('type' => "'$type'"),array('id' => $tic_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}


////////////////////////////////////////////////////////////

public function admin_addressupdate()
{

    $address =$this->request->data('address');
    $tic_id =$this->request->data('tic_id');
   echo $address;
   echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('address' => "'$address'"),array('id' => $tic_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}

////////////////////////////////////////////////////////////

public function admin_updateticketfieldtypename()
{

    $name =$this->request->data('name');
    $id =$this->request->data('id');
   //echo $address;
   //echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->CustomFieldType->updateAll(array('name' => "'$name'"),array('id' => $id));
       // $this->set('user', $user);
        

   }
    exit(); 
  

}

////////////////////////////////////////////////////////////

public function admin_updateticketfieldname()
{

    $name =$this->request->data('name');
    $id =$this->request->data('id');
   //echo $address;
   //echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->CustomField->updateAll(array('name' => "'$name'"),array('id' => $id));
       // $this->set('user', $user);
        

    }
    exit(); 
  

}

///////////////////////////////////////////////////////////////////////////////

public function admin_contractupdate()
{

    $contract =$this->request->data('contract');
    $tic_id =$this->request->data('tic_id');
   //echo $address;
   //echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('contract_id' => "'$contract'"),array('id' => $tic_id));
       // $this->set('user', $user);
        

    }
    exit(); 
  

}

///////////////////////////////////////////////////////////////////////////////

public function admin_slaupdate()
{

    $sla =$this->request->data('sla');
    $tic_id =$this->request->data('tic_id');
   //echo $address;
   //echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('sla_id' => "'$sla'"),array('id' => $tic_id));
       // $this->set('user', $user);
        

    }
    exit(); 
  

}

////////////////////////////////////////////////////////////

public function admin_dashboard()
{
    $this->set('title','Ticket List');
    $this->layout = false; 
    $Resolved = $this->Ticket->allTicketsByResolved();
    $Tickets = $this->Ticket->query("SELECT tickets.*, users.first_name ,users.last_name,users.email FROM tickets  INNER JOIN users ON tickets.user_id = users.id where tickets.status!='Resolved'");
    $this->set('Tickets', $Tickets);    
    $this->set('Resolved', $Resolved);  
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
    $this->set('title','Add Ticket');
     
    if($this->request->is('post'))
    {
        $Tickets=$this->request->data;
        $name=$Tickets['Ticket']['name'];
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
                $this->redirect(array("controller" => "Tickets","action" => "newnew",$user_id));   

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
                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Tickets","action" => "newnew",$user_id));   
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

                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Tickets","action" => "newnew",$user_id));   
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
                //$save = $this->Ticket->addTicketAdmin($Tickets);
                //$Ticket_id = $this->Ticket->getInsertID();
                //$this->Ticket->query("Update Tickets set  user_id = $user_id  where id = $Ticket_id");
                //$this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Tickets","action" => "newnew",$user_id));   
            }  

        }
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}




////////////////////////<!--Custom Fields-->/////////////////////////////////////////

public function customfieldtype() 
{
    $this->layout = "frontenduser";
    //echo $user_id;die();
   $CustomFieldId =$this->request->data('CustomFieldId');
   $CustomFieldTypes = $this->CustomFieldType->findallCustomFieldTypeByfieldId($CustomFieldId);
   //pr($CustomFieldTypes);
   $this->set('CustomFieldTypes', $CustomFieldTypes); 
    
}


////////////////////////////////////////////////////////////////////

public function customfieldtypemodel() 
{
    $this->layout = "frontenduser";
    //echo $user_id;die();
   $CustomFieldId =$this->request->data('CustomFieldId');
   $CustomFieldTypes = $this->CustomFieldType->findallCustomFieldTypeByfieldId($CustomFieldId);
   //pr($CustomFieldTypes);
   $this->set('CustomFieldTypes', $CustomFieldTypes); 
    
}

////////////////////////////////////////////////////////////////////

public function customfields() 
{
    $this->layout = "frontenduser";
    //echo $user_id;die();
   $this->set('title','Add Ticket');
   $session_id = $this->Auth->user('id');
   //$CustomField = $this->CustomField->findAllCustomFieldType();
   $CustomField = $this->CustomField->findAllCustomFieldTypeByLoginId($session_id);
   $this->set('CustomField', $CustomField); 
    
}

////////////////////////////////////////////////////////////////////////////////

public function disableticketfield($field_id){
    $this->layout = "frontenduser";
    $this->CustomField->disableCustomFieldTypeAdmin($field_id);
    $this->Flash->success('Ticket Type Disable Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Tickets','action'=>'customfields'));
}

////////////////////////////////////////////////////////////////////

public function fieldtype() 
{
    $this->layout = "frontenduser";
    //echo $user_id;die();
    $this->set('title','Custom Field Type');
    if($this->request->is('post')){
        $Tickets=$this->request->data;

        $save = $this->CustomField->addCustomFieldTypeAdmin($Tickets);
        $field_id = $this->CustomField->getInsertID();
        $this->Flash->success('Field added Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Tickets","action" => "ticketfields",$field_id));
    }
    
}


////////////////////////////////////////////////////////////////////

public function ticketfields($field_id) 
{
    $this->layout = "frontenduser";
    //echo $field_id;
    $name = $this->CustomField->findCustomFieldTypeNameById($field_id);
    $CustomFieldType = $this->CustomFieldType->findallCustomFieldTypeByfieldId($field_id);
    //pr($CustomFieldType);
    //pr($name);die();
    $this->set('title','Ticket Fields');

    if($this->request->is('post')){
        $Tickets=$this->request->data;

        $save = $this->CustomField->addCustomFieldTypeAdmin($Tickets);
        $field_id = $this->CustomField->getInsertID();
        $this->Flash->success('Field added Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Tickets","action" => "ticketfields",$field_id));

    }
    $this->set('name', $name); 
    $this->set('CustomFieldType', $CustomFieldType); 
}

////////////////////////////////////////////////////////////////////

public function newfield($field_id) 
{
    $this->layout = "frontenduser";
    //echo $field_id;die();
    $name = $this->CustomField->findCustomFieldTypeNameById($field_id);
    $this->set('title','New Field');
    $this->set('name', $name); 
    $this->set('custom_field_id', $field_id); 
    
}

////////////////////////////////////////////////////////////////////

public function addnewfield() 
{
    $this->layout = "frontenduser";
    $this->set('title','Add New Field');
    if($this->request->is('post')){
        $Tickets=$this->request->data;

        //pr($Tickets);
        $custom_field_id = $Tickets['CustomFieldType']['custom_field_id'];
        $save = $this->CustomFieldType->addCustomFieldTypeAdmin($Tickets);
        //$field_id = $this->CustomFieldType->getInsertID();
        //pr($Tickets); echo $field_id; die();
        $this->Flash->success('Ticket Field added Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Tickets","action" => "ticketfields",$custom_field_id));
    }
   
}

////////////////////////////////////////////////////////////////////////////////

public function ticketfieldsedit($CustomFieldType_id){

    $this->layout = "frontenduser";
    $CustomFieldType = $this->CustomFieldType->findallCustomFieldTypeById($CustomFieldType_id);
    $this->set('CustomFieldType', $CustomFieldType);
    foreach($CustomFieldType as $cftype) {
            $custom_field_id = $cftype['CustomFieldType']['custom_field_id'];
    }
    $name = $this->CustomField->findCustomFieldTypeNameById($custom_field_id);
    $this->set('name', $name);
    //pr($name);
    //pr($CustomFieldType);die(); 
    //$this->set('custom_field_id', $field_id);
    //$this->Flash->success('Ticket Field Type Deleted Successfully', array('key' => 'positive'));  
    //return $this->redirect(array('controller'=>'Tickets','action'=>'ticketfields',$field_id));
}


////////////////////////////////////////////////////////////////////

public function editnewfield() 
{
    $this->layout = "frontenduser";
    $this->set('title','Edit New Field');
    if($this->request->is('post')){
        
        $Tickets=$this->request->data;

        //pr($Tickets);die();
        $id = $Tickets['CustomFieldType']['id'];
        $custom_field_id = $Tickets['CustomFieldType']['custom_field_id'];
        $save = $this->CustomFieldType->editCustomFieldTypeAdmin($Tickets,$id);
        //$field_id = $this->CustomFieldType->getInsertID();
        //pr($Tickets); echo $field_id; die();
        $this->Flash->success('Ticket Field Edit Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Tickets","action" => "ticketfields",$custom_field_id));
    }
   
}

////////////////////////////////////////////////////////////////////////////////

public function ticketfieldsdelete($CustomFieldType_id,$custom_field_id){
    $this->layout = "frontenduser";
    $this->CustomFieldType->DeleteCustomFieldType($CustomFieldType_id);
    $this->Flash->success('Ticket Field Type Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Tickets','action'=>'ticketfields',$custom_field_id));
}


////////////////////////////////////////////////////////////////////

public function newnew($user_id) 
{
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    //echo $user_id;die();
   $this->set('title','Add Ticket');
   $id = $this->Auth->user('id');
   $user = $this->User->findUserbyId($user_id);
   //$this->set('user', $user);
   $address = $this->Address->findAddressbyUserId($user_id);
   $Category   = $this->TicketCategory->findTicketCategoryByUserId($id);
  // pr($Category);
     // print_r($address);die();
   //$this->set('address', $address);  
  // $this->set(compact('address'));
   $CustomFieldName = $this->CustomField->find('list',array('fields'=>array('name'),'conditions'=>array('CustomField.status'=>'0','CustomField.login_id'=>$id)));

   $AssetValue = $this->AssetFieldValue->find('all',array('conditions'=>array('AssetFieldValue.user_id'=>$user_id)));

   $Contract = $this->Contract->find('list',array('fields'=>array('contract_name'),'conditions'=>array('Contract.user_id'=>$user_id)));

  // $Sla = $this->Sla->find('list',array('fields'=>array('name')));
   $Sla = $this->Sla->find('list',array('conditions'=>array('Sla.login_id'=>$id),'fields'=>array('name')));

   $CannedResponse = $this->CannedResponse->allCannedResponseByLoginId($id);
   //$this->set('CannedResponse', $CannedResponse);
   //pr($Sla);die();
   //$this->set('CustomFieldName', $CustomFieldName);  
   //$this->set('AssetValue', $AssetValue); 
   //$this->set('Contract', $Contract); 
   $this->set(compact('user','address','CannedResponse','CustomFieldName','AssetValue','Contract','Sla','Category'));

    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
   
}


////////////////////////////////////////////////////////////////////

public function addnew() 
{
    $this->layout = "frontenduser";
    error_reporting(0);
    if($this->request->is('post')){

    $tickets=$this->request->data;
    $changes = json_encode($tickets);
    //pr($tickets);die();
    $CustomFieldValue =$this->request->data['CustomFieldValue'];
    
    $email=$this->request->data['Email'];

    $Ticket  = $this->request->data['Ticket'];
    
    $user_id=$tickets['Ticket']['user_id'];
    $address=$tickets['Ticket']['address'];
    $summary= $tickets['Ticket']['name'].'-'.$tickets['Ticket']['title'];
    $user = $this->User->findUserbyId($user_id);
    
    $save = $this->Ticket->addTicketAdmin($Ticket);
    $save = $this->Ticket->addTicketAdmin($this->request->data['Email']);
   // $this->Product->save($this->request->data['Email']);

    $Ticket_id = $this->Ticket->getInsertID();
    $logs['changes']=$changes;
    $logs['ticket_id']=$Ticket_id;
    $logs['employee']=$this->Session->read('Auth.User.email');
    $saveLog = $this->Log->addLog($logs);

    $Asset = $Ticket['asset'];
    
    if($Asset=='yes')
    {
        $AssetValue_id =  $this->request->data['AssetValue']['id'];
        //pr($Asset);die(); 
        foreach ($AssetValue_id as $assetvalue_id) {
            $this->AssetFieldValue->updateAll(array('ticket_id' => "'$Ticket_id'"),array('id' => $assetvalue_id));
        }  
    }
   
    $appointment = $Ticket['appointment'];

    if($appointment=='yes')
    {

    $Appointment = $this->request->data['Appointment'];
    $appointment=$this->Appointment->addAppointmentAdmin($Appointment);
    $appointment_id = $this->Appointment->getInsertID();

    $Ticket = $this->Ticket->findTicketbyId($Ticket_id);

    $description = 'Notes: Contact: '.$user['User']['first_name'].' '.$user['User']['last_name'].' Details: '.$Ticket['Ticket']['description'].' Customer Information: '.$Ticket['Ticket']['name'].' '.$user['User']['city'].' '.$user['User']['state_country'].' '.$user['User']['zip'].'-'.$user['User']['email'];


  //  $this->Appointment->query("Update appointments set description= '$description' ,   summary = '$summary' , user_id = '$user_id' , ticket_id= '$Ticket_id' ,address= '$address' where id = $appointment_id");
   

    $this->Appointment->updateAll(array('description' => "'$description'",'summary' => "'$summary'" , 'user_id' => "'$user_id'" , 'ticket_id'=> "'$Ticket_id'" ,'address'=> "'$address'"),array('id' => $appointment_id));

    }



    $counter = count($CustomFieldValue['value']);
    if($counter!='')
    {
        for($i=1;$i<=$counter;$i++)
        {
            $custom_field_id =$this->request->data['CustomFieldValue']['custom_field_id'];
            $value = $CustomFieldValue['value'][$i];
            $custom_field_type_id = $CustomFieldValue['custom_field_type_id'][$i];
            $field_type = $CustomFieldValue['field_type'][$i];
            $name = $CustomFieldValue['name'][$i];
            $user = $this->Sale->query("INSERT INTO custom_field_values (ticket_id,custom_field_id,custom_field_type_id,value,field_type,name) VALUES ('$Ticket_id','$custom_field_id','$custom_field_type_id','$value','$field_type','$name')");
        }
        $this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
    return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$Ticket_id));
    }
    //pr($CustomFieldValue);die();


    $this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
    return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$Ticket_id));

    }   
}




////////////////////////////////////////////////////////////////////




public function addtender() 
{
    $this->layout = "frontenduser";
   $this->set('title','Add Ticket');
     
    if($this->request->is('post'))
    {
        $Tickets=$this->request->data;
       // print_r($Tickets);
        $method=$Tickets['Ticket']['payment_method'];
        $user_id=$Tickets['Ticket']['user_id'];
        $amount_provided=$Tickets['Ticket']['amount_provided'];
        $total=$Tickets['Ticket']['total'];
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
        $save = $this->Ticket->addTicketAdmin($Tickets);
        $Ticket_id = $this->Ticket->getInsertID();
              //  echo $Ticket_id;die();
        $this->Ticket->updateAll(array('name' => "'$name'"),array('id' => $Ticket_id));
        // $this->Ticket->query("Update Tickets set  name = $name  where id = $Ticket_id");
        $this->Flash->success('Payment Successfull', array('key' => 'positive'));
        $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$user_id,$Ticket_id));   
    }
        

}






/////////////////////////CannedResponse/////////////////////////////////////////////



public function addcannedresponse() 
{   
    $this->layout = "frontenduser";
    $login_id = $this->Auth->user('id');
    $save = $this->CannedResponse->query("INSERT INTO canned_responses (title,body,login_id) VALUES ('Title','Body',$login_id)");
    $this->Flash->success('Added Successfully', array('key' => 'positive'));
    return $this->redirect(array("controller" => "Tickets","action" => "cannedresponses"));
}

public function cannedresponses() 
{    
    $this->layout = "frontenduser";
    $CannedResponse = $this->CannedResponse->allCannedResponseByLoginId($this->Auth->user('id'));
    $this->set('CannedResponse', $CannedResponse);
    
}

public function cannedresponseedit($id) 
{   
    $this->layout = "frontenduser";
    $this->set('title','Edit Canned Response');
    
    if($this->request->is('post'))
    {       
        $conned = $this->request->data;
        $id = $conned['CannedResponse']['id'];
        $this->CannedResponse->editCannedResponseAdmin($this->request->data,$id);
        $this->Flash->success('Canned response updated successfully.', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Tickets","action" => "cannedresponseview",$id));
    }
    $CannedResponse = $this->CannedResponse->findCannedResponseById($id);
    $this->data = $CannedResponse;
    $this->set(compact('CannedResponse'));
}

public function cannedresponseview($id) 
{   
    $this->layout = "frontenduser";
    $this->set('title','view Canned Response');
    $CannedResponse = $this->CannedResponse->findCannedResponseById($id);
   // pr($CannedResponse);die();
    
    $this->set(compact('CannedResponse'));
}

public function deletecannedresponse($id) 
{    
    $this->layout = "frontenduser";
    $CannedResponse = $this->CannedResponse->DeleteCannedResponse($id);
    $this->Flash->success('Deleted Successfully', array('key' => 'positive'));
    return $this->redirect(array("controller" => "Tickets","action" => "cannedresponses"));
    
}


public function updatecannedresponsetitle()
{
    $this->layout = "frontenduser";
    $title =$this->request->data('title');
    $id =$this->request->data('id');

    if ($this->request->is('ajax'))
    {
        $this->CannedResponse->updateAll(array('title' => "'$title'"),array('id' => $id));
    }        
    exit();
}


public function updatecannedresponsebody()
{
    $this->layout = "frontenduser";
    $body =$this->request->data('body');
    $id =$this->request->data('id');

    if ($this->request->is('ajax'))
    {
        $this->CannedResponse->updateAll(array('body' => "'$body'"),array('id' => $id));
    }        
    exit();
}


////////////////////////////////////////////////////////////////////


public function ticketedit($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Edit Ticket');
    $session_id = $this->Auth->user('id');

    $Ticket= $this->Ticket->findTicketbyId($id); // Get Ticket Detail from id
    $Category   = $this->TicketCategory->findTicketCategoryByUserId($session_id);
    //pr($Category);die();
    $custom_field_id=$Ticket['Ticket']['custom_field_id'];
    $user_id = $Ticket['Ticket']['user_id'];
    //pr($Ticket);die();


//  pr($CustomFieldValue);die();

    $CustomFieldName = $this->CustomField->find('list',array('fields'=>array('name'),'conditions'=>array('CustomField.status'=>'0','CustomField.login_id'=>$session_id)));

   //pr($CustomFieldName);die();
    $this->set('CustomFieldName', $CustomFieldName);  

    $Contract = $this->Contract->find('list',array('fields'=>array('contract_name'),'conditions'=>array('Contract.user_id'=>$user_id)));

    //pr($Contract);die();
    $this->set('Contract', $Contract); 
    $Sla = $this->Sla->findallSlaNameByLoginId($session_id);
    $this->set('Sla',$Sla);
    //$AssetfieldValue = $this->AssetFieldValue->find('all',array('conditions'=>array('AssetFieldValue.user_id' => $user_id),array('AssetFieldValue.ticket_id !=' => $id)));
    $AssetfieldValue = $this->AssetFieldValue->query("SELECT * FROM asset_field_values where user_id = '$user_id' AND ticket_id != '$id'");
    //pr($AssetfieldValue);die();
    $this->set('AssetfieldValue', $AssetfieldValue); 

    if($this->request->is('post'))
    { 
        $tic_id=$id;
        $changes = json_encode($this->request->data);
        $logs['changes']=$changes;
        $logs['ticket_id']=$id;
        $logs['edit']="edit";
        $logs['employee']=$this->Session->read('Auth.User.email');
        $saveLog = $this->Log->addLog($logs);
        //pr($this->request->data); die();
        $ticket =  $this->request->data['Ticket'];
        $email =  $this->request->data['Email'];
        $CustomFieldValue =$this->request->data['CustomFieldValue'];
        $asset = $ticket['asset'];
        if($asset=='yes')
        {
            $AssetValue_id =  $this->request->data['AssetValue']['id'];
            //pr($AssetValue_id);die(); 
            foreach ($AssetValue_id as $assetvalue_id) {
                $this->AssetFieldValue->updateAll(array('ticket_id' => "'$id'"),array('id' => $assetvalue_id));
            }  
        }
        $this->Ticket->editTicketbyId($ticket,$tic_id); 
        $res = $this->Ticket->editTicketbyId($email,$tic_id);// Edit User
        if(!empty($custom_field_id))
        {

            $custom_field_id =$this->request->data['CustomFieldValue']['tickettext'];
            if($custom_field_id=='1')
            {
                $counter = count($CustomFieldValue['value']);
                for($i=1;$i<=$counter;$i++)
                {
                    $custom_field_id =$this->request->data['CustomFieldValue']['custom_field_id'];
                    $value = $CustomFieldValue['value'][$i];
                    $custom_field_type_id = $CustomFieldValue['custom_field_type_id'][$i];
                    $field_type = $CustomFieldValue['field_type'][$i];
                    $name = $CustomFieldValue['name'][$i];
                    $user = $this->CustomFieldValue->query("INSERT INTO custom_field_values (ticket_id,custom_field_id,custom_field_type_id,value,field_type,name) VALUES ('$id','$custom_field_id','$custom_field_type_id','$value','$field_type','$name')");
                }
            }
            else{
                $counter = count($CustomFieldValue['name']);
                for($i=1;$i<=$counter;$i++)
                {
                    $custom_field_id =$this->request->data['Ticket']['custom_field_id'];
                    $id = $CustomFieldValue['id'][$i];
                    $value = $CustomFieldValue['value'][$i];
                    $custom_field_type_id = $CustomFieldValue['custom_field_type_id'][$i];
                    $field_type = $CustomFieldValue['field_type'][$i];
                    $name = $CustomFieldValue['name'][$i];
                    
                    $user = $this->CustomFieldValue->query("UPDATE custom_field_values SET ticket_id='$tic_id',custom_field_id='$custom_field_id',custom_field_type_id='$custom_field_type_id',value='$value',field_type='$field_type',name='$name' WHERE id='$id'");
                    
                }
            }

        }
        $this->Flash->success('Successfully Edited Ticket', array('key' => 'positive'));

        return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$tic_id));
    }
    //$AssetValue = $this->AssetFieldValue->find('all',array('conditions'=>array('AssetFieldValue.ticket_id'=>$id)));
    //pr($AssetValue);die();
    //$this->set('AssetValue', $AssetValue); 

    $CustomFieldValue = $this->Ticket->query("SELECT custom_field_values.id,custom_field_values.custom_field_id ,custom_field_values.custom_field_type_id ,custom_field_values.field_type ,custom_field_values.value ,custom_field_values.name FROM custom_field_values  INNER JOIN tickets ON custom_field_values.ticket_id = tickets.id where ticket_id=$id");
    $this->data = $CustomFieldValue ;
    $this->set(compact('CustomFieldValue'));

    $AssetValue = $this->AssetFieldValue->find('all',array('conditions'=>array('AssetFieldValue.ticket_id'=>$id)));
    //pr($AssetValue);die();
    $this->set(compact('AssetValue'));

    $this->data = $Ticket ;
    $this->set(compact('Ticket'));
    $this->set(compact('Category'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


////////////////////////////////////////////////////////////////////


public function ticketeditbycustomfield(){
    $this->layout = "frontenduser";
    if($this->request->is('post'))
    { 
        //pr($this->request->data); die();
        $ticket =  $this->request->data['Ticket'];
        $CustomFieldValue =$this->request->data['CustomFieldValue'];
        $ticket_id = $CustomFieldValue['tic_id'];
        $res = $this->Ticket->editTicketbyId($ticket,$ticket_id);// Edit Ticket

        $text =$this->request->data['CustomFieldValue']['tickettext'];
        if($text=='1')
        {
            $counter = count($CustomFieldValue['value']);
            for($i=1;$i<=$counter;$i++)
            {
                $custom_field_id =$this->request->data['Ticket']['custom_field_id'];
                $value = $CustomFieldValue['value'][$i];
                $custom_field_type_id = $CustomFieldValue['custom_field_type_id'][$i];
                $field_type = $CustomFieldValue['field_type'][$i];
                $name = $CustomFieldValue['name'][$i];
                $user = $this->Sale->query("INSERT INTO custom_field_values (ticket_id,custom_field_id,custom_field_type_id,value,field_type,name) VALUES ('$ticket_id','$custom_field_id','$custom_field_type_id','$value','$field_type','$name')");
                
            }
            $this->Flash->success('Custom Fields Add Successfully', array('key' => 'positive'));

            return $this->redirect(array("controller" => "Tickets","action" => "ticketedit",$ticket_id));
        }
        else{
            $counter = count($CustomFieldValue['value']);
            //echo $counter;die();    
            for($i=1;$i<=$counter;$i++)
            {
                $id = $CustomFieldValue['id'][$i];
                $value = $CustomFieldValue['value'][$i];
                $custom_field_type_id = $CustomFieldValue['custom_field_type_id'][$i];
                $field_type = $CustomFieldValue['field_type'][$i];
                $name = $CustomFieldValue['name'][$i];
                

                $user = $this->Sale->query("UPDATE custom_field_values SET ticket_id='$ticket_id',custom_field_type_id='$custom_field_type_id',value='$value',field_type='$field_type',name='$name' WHERE id='$id'");
                
                
            }
            $this->Flash->success('Custom Fields Edited Successfully', array('key' => 'positive'));

            return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$ticket_id));
        }

        
    }
    exit();
}



///////////////////////////////////////////////////////////////////////////////////

public function editingTicket($id){
    $this->layout = "frontenduser";
    $this->set('title','Edit Ticket');

    $Ticket= $this->Ticket->findTicketbyId($id); // Get Ticket Detail from id
     $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
                        
        $this->Ticket->editTicketbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited Ticket', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Tickets','action'=>'Ticketlist'));

        

    }
    $this->data = $Ticket ;
    $this->set(compact('Ticket'));
    $this->set(compact('product'));
}





////////////////////////////////////////////////////////////////////////////////

public function deleteTicket($id){
    $this->layout = "frontenduser";
    $this->Ticket->deleteTicket($id);
    $this->Flash->success('Ticket Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Tickets','action'=>'ticketlist'));
}

////////////////////////////////////////////////////////////////////////////////

public function TicketResolve($id){
    $this->layout = "frontenduser";
    $this->Ticket->TicketResolve($id);
    $this->Flash->success('Ticket Update Successfully', array('key' => 'positive'));  
    return $this->redirect(array("controller" => "Tickets","action" => "ticketdetails",$id));
}



// /////////////////////////////////////////////////////////

public function Ticketlist()
{
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Ticket List');
    $session_id = $this->Session->read('Auth.User.id');
    

    $Tickets = $this->Ticket->findallTicketsByLoginId($session_id);
    $this->set('Tickets', $Tickets);
    //print_r('products');

    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }

}

////////////////////////////////////////////////////////    

public function ticketdetails($tic_id) {
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Ticket List');

    $session_id = $this->Session->read('User_id');
    $Login_user       = $this->User->findUserbyId($session_id);
    $session_email = $this->User->find('first', array('fields' => array('User.email','User.first_name'),'conditions' => array('User.id' =>  $session_id )));
    $tickettemplate = $this->Template->findTicketTemplateByUserId($session_id);
    $TicketCategory = $this->TicketCategory->findTicketCategoryByUserId($session_id);
    $Disclaimer = $this->Disclaimer->findTicketDisclaimerByUserId($session_id);
    $email=$session_email['User']['email'];
    $user_first_name=$session_email['User']['first_name'];
    
    $Tickets = $this->Ticket->findTicketbyId($tic_id);

    $user_id=$Tickets['Ticket']['user_id'];
    $contract_id=$Tickets['Ticket']['contract_id'];
    $sla_id=$Tickets['Ticket']['sla_id'];

    $user = $this->User->findUserbyId($user_id);
    $Appointment = $this->Appointment-> findAppointmentbyTicketId($tic_id);
    //print_r($Tickets);die();
    //$this->set('sale', $sale);
    $Address = $this->Address->findAddressbyUserId($user_id);
    //pr($Address);die();
   
    $phone = $this->Phone->findbyUserid($user_id);
  // print_r($phone);die();
    $comment = $this->Comment->findCommentbyTicketId($tic_id);
   // print_r($comment);die();
    $CustomFieldName = $this->CustomField->find('list',array('fields'=>array('name'),'conditions'=>array('CustomField.status'=>'0','CustomField.login_id'=>$session_id)));
    //pr($CustomFieldName);die();

    $CustomFieldValue = $this->Ticket->query("SELECT custom_field_values.id,custom_field_values.custom_field_id ,custom_field_values.custom_field_type_id ,custom_field_values.field_type ,custom_field_values.value ,custom_field_values.name FROM custom_field_values  INNER JOIN tickets ON custom_field_values.ticket_id = tickets.id where ticket_id=$tic_id");
    //pr($CustomFieldValue);die();
    $this->data = $CustomFieldValue ;
    $this->set(compact('CustomFieldValue'));
    
    $AssetValue = $this->AssetFieldValue->query("SELECT asset_field_values.*, users.first_name ,users.last_name FROM asset_field_values  INNER JOIN users ON asset_field_values.user_id = users.id where asset_field_values.ticket_id = $tic_id");
    //pr($AssetValue);die();

    $TransferLocation = $this->TransferLocation->findTransferLocationByUserId($session_id);
    $Location = array();
    if(!empty($TransferLocation))
    {
        $TransferLocationName = $TransferLocation['TransferLocation']['to_ticket'];
        $Location = $this->Multilocation->findMultilocationByUserIdAndName($session_id,$TransferLocationName);
        //pr($Location);die();
    }
    $this->set(compact('AssetValue'));

    $Contract = $this->Contract->findContractbyId($contract_id);
    $Sla = $this->Sla->findallSlaNameByLoginId($session_id);
    $SlaById = $this->Sla->findallSlaNameById($sla_id);
    $ContractByUser = $this->Contract->findContractbyUserId($user_id);
    $logs = $this->Log->findLogByTicketId($tic_id);
    //pr($Sla);
    //pr($ContractByUser);die();
    $this->set(compact('Login_user','Sla','SlaById','Contract','ContractByUser','Address','phone','comment','Tickets','user','Appointment','email','user_first_name','CustomFieldName','logs','tickettemplate','TicketCategory','Disclaimer','Location'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
      
}

///////////////////////////////////////////////////ticketeditbycustomfield


public function Ticketview($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Profile');
    $Ticket = $this->Ticket->findTicketbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Ticket->editTicketbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Tickets','action'=>'Ticketview'));
    }
  //  $this->data = $Ticket ; 
    $this->set('Ticket', $Ticket);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


/////////////////////////////////////////////////


public function Ticket()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Session->read('Auth.User.id');
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where login_id = $session_id And (first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%') AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}

//////////////////////////////////////////////////////



public function Ticketupdate()
{
    $this->layout = "frontenduser";
    $po_number =$this->request->data('po_number');
    $inv_id =$this->request->data('inv_id');
   
    if ($this->request->is('ajax'))
    {
       $this->Ticket->updateAll(array('po_number' => "'$po_number'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}

/////////////////////////////////////////////////////////////


public function updateTicketitem()
{
    $this->layout = "frontenduser";
    $item =$this->request->data('item');
    $Ticket_id =$this->request->data('Ticket_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('item' => "'$item'"),array('id' => $Ticket_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}

///////////////////////////////////////////////////////////////////


public function updateTicket()
{
    $this->layout = "frontenduser";
    $total =$this->request->data('total');
    $Ticket_id =$this->request->data('Ticket_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('total' => "'$total'"),array('id' => $Ticket_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}

//////////////////////////////////////////////////////////////////





public function saleTicketupdate()
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
   exit();
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



//////////////////////////////////////////////////////////////////

public function statusupdate()
{
    $this->layout = "frontenduser";
    $status =$this->request->data('status');
    $tic_id =$this->request->data('tic_id');
   echo $status;
   echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('status' => "'$status'"),array('id' => $tic_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}
/////////////////////////////////////////////////////////

public function typeupdate()
{
    $this->layout = "frontenduser";
    $type =$this->request->data('type');
    $tic_id =$this->request->data('tic_id');
   echo $type;
   echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('type' => "'$type'"),array('id' => $tic_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}


////////////////////////////////////////////////////////////

public function addressupdate()
{
    $this->layout = "frontenduser";
    $address =$this->request->data('address');
    $tic_id =$this->request->data('tic_id');
   echo $address;
   echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('address' => "'$address'"),array('id' => $tic_id));
       // $this->set('user', $user);
        

   }
        
    exit();

}

////////////////////////////////////////////////////////////

public function updateticketfieldtypename()
{
    $this->layout = "frontenduser";
    $name =$this->request->data('name');
    $id =$this->request->data('id');
   //echo $address;
   //echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->CustomFieldType->updateAll(array('name' => "'$name'"),array('id' => $id));
       // $this->set('user', $user);
        

   }
    exit(); 
  

}

////////////////////////////////////////////////////////////

public function updateticketfieldname()
{
    $this->layout = "frontenduser";
    $name =$this->request->data('name');
    $id =$this->request->data('id');
   //echo $address;
   //echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->CustomField->updateAll(array('name' => "'$name'"),array('id' => $id));
       // $this->set('user', $user);
        

    }
    exit(); 
  

}

///////////////////////////////////////////////////////////////////////////////

public function contractupdate()
{
    $this->layout = "frontenduser";
    $contract =$this->request->data('contract');
    $tic_id =$this->request->data('tic_id');
   //echo $address;
   //echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('contract_id' => "'$contract'"),array('id' => $tic_id));
       // $this->set('user', $user);
        

    }
    exit(); 
  

}

///////////////////////////////////////////////////////////////////////////////

public function slaupdate()
{
    $this->layout = "frontenduser";
    $sla =$this->request->data('sla');
    $tic_id =$this->request->data('tic_id');
   //echo $address;
   //echo $tic_id;
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Ticket->updateAll(array('sla_id' => "'$sla'"),array('id' => $tic_id));
       // $this->set('user', $user);
        

    }
    exit(); 
  

}

////////////////////////////////////////////////////////////

public function dashboard()
{
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Ticket List');
    $session_id = $this->Session->read('Auth.User.id');
    $this->layout = false; 
    $Resolved = $this->Ticket->allResolvedTicketsByLoginId($session_id);
    $Tickets = $this->Ticket->query("SELECT tickets.*, users.first_name ,users.last_name,users.email FROM tickets  INNER JOIN users ON tickets.user_id = users.id where tickets.login_id = $session_id AND tickets.status!='Resolved'");
    //pr($Resolved);
    //pr($Tickets);
    //die();
    $this->set('Tickets', $Tickets);    
    $this->set('Resolved', $Resolved);  
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }

}











////////////////////////////////////////////////////////////

}