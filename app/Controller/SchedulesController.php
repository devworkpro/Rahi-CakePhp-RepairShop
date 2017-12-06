<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class SchedulesController extends AppController {

public $uses = array('Schedule','Product','User','Purchase','Comment','Phone','Note','Attachment','Email','Reminder','SchedulePricing','Inventory');

public function admin_add() 
{
    $this->set('title','Add Schedule');
    $users = $this->User->allUsers();
    $this->set('users', $users);
    if($this->request->is('post'))
    {
        $schedule=$this->request->data;
        $user_id = $schedule['Schedule']['user_id'];
        $this->redirect(array("controller"=>"Schedules","action" => "new",'?' => array('user_id' => $user_id)));
    }
}



///////////////////////////////////////////////////////////////////


public function admin_new() 
{
  $this->set('title','Add Schedule');
    if($this->request->is('post'))
    {
        $schedule=$this->request->data;
        $save = $this->Schedule->addScheduleAdmin($schedule);
        $schedule_id = $this->Schedule->getInsertID();
        $this->Flash->success('Schedule Created Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Schedules","action" => "scheduleedit",$schedule_id));  
       
    }
}


////////////////////////////////////////////////////////////////////

public function admin_scheduleedit($id){
    $this->set('title','Edit Schedule');

    $Schedule= $this->Schedule->findSchedulebyId($id); // Get Schedule Detail from id
    $Inventory= $this->Inventory->findInventorybyScheduleId($id); 
    //pr($Inventory);die();
  
    if($this->request->is('post'))
    {
        $schedule=$this->request->data;
        //pr($Schedules);die();
        $save = $this->Schedule->editSchedulebyId($schedule,$id);
        $this->Flash->success('Schedule Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Schedules","action" => "scheduleedit",$id));
   	}

    $this->data = $Schedule ;
    $this->set(compact('Schedule','Inventory'));
    
}

////////////////////////////////////////////////////////////////////

public function admin_deleteschedule($id){
    $this->Schedule->deleteSchedule($id);
    $this->Flash->success('Schedule Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Schedules","action"=>"Schedulelist"));
    
}


// /////////////////////////////////////////////////////////////////

public function admin_schedulelist()
{
    $this->set('title','Schedule List');
    //$Schedules = $this->Schedule->allSchedules();
    $Schedules = $this->Schedule->query("SELECT schedules.*, users.first_name ,users.last_name FROM schedules  INNER JOIN users ON schedules.user_id = users.id");
    //pr($Schedules);die();
    $this->set('Schedules', $Schedules);
}

////////////////////////////////////////////////////////////////////    

public function admin_scheduleview($id){
$this->set('title','Profile');
    $Schedule = $this->Schedule->findSchedulebyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Schedule->editSchedulebyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Schedules','action'=>'Scheduleview'));
    }
    $this->data = $Schedule ; 
    $this->set(compact('Schedule'));
}



////////////////////////////////////////////////////////////////////

public function admin_inventory()
{
    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $data = $this->Product->query("SELECT * FROM products where product_name  like '%$data%'");
        $this->set('data', $data);
    }

}

////////////////////////////////////////////////////////////////////

public function admin_inventoryitem()
{
    $b =$this->request->data('b');
    if ($this->request->is('ajax'))
    {
        $Product = $this->Product->find('all',array('conditions'=>array('product_name'=>$b)));
        $this->set('Product', $Product);
    }
    //exit();
}


//////////////////////////////////////////////////////////////////////
public function admin_deleteinventoryitem($inv_id,$Schedule_id){
    
    $this->Inventory->deleteInventory($inv_id);
    $this->Flash->success('Item Deleted Successfully', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'Schedules','action'=>'scheduleedit',$Schedule_id));
}

/////////////////////////////////////////////////////////////////////


public function admin_updatedescription()
{
    $description =$this->request->data('description');
    $inv_id =$this->request->data('inv_id');
    if ($this->request->is('ajax'))
    {
        $this->Inventory->updateAll(array('description' => "'$description'"),array('id' => $inv_id));
    }
    exit();
}



//////////////////////////////////////////////////////////////////////


public function admin_updatequantity()
{
    $quantity =$this->request->data('quantity');
    $inv_id =$this->request->data('inv_id');
    if ($this->request->is('ajax'))
    {
        $this->Inventory->updateAll(array('quantity' => "'$quantity'"),array('id' => $inv_id));
    }
    exit();
}




///////////////////////////////////////////////////////////////////////

public function admin_updaterate()
{
    $rate =$this->request->data('rate');
    $inv_id =$this->request->data('inv_id');
   
    if ($this->request->is('ajax'))
    {
        $this->Inventory->updateAll(array('rate' => "'$rate'"),array('id' => $inv_id));
    }
   exit();
}

///////////////////////////////////////////////////////////////////////

public function admin_updatetax()
{
    $tax =$this->request->data('tax');
    $inv_id =$this->request->data('inv_id');
   
    if ($this->request->is('ajax'))
    {
        $this->Inventory->updateAll(array('tax' => "'$tax'"),array('id' => $inv_id));
    }
   exit();
}




/////////////////////////////////////////////////////////////////////////

public function admin_addnotes(){
   
    if($this->request->is('post'))
    {        
        $note=$this->request->data;
        //pr($Note);die();
        $Schedule_id=$note['Note']['Schedule_id'];
        $save = $this->Note->addNoteAdmin($note);
        $this->Flash->success('Schedule Note Add successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Schedules','action'=>'Scheduledetails',$Schedule_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function admin_deletenote($note_id,$Schedule_id){
   
        $delete = $this->Note->deleteNote($note_id);
        $this->Flash->success('Schedule Note Deleted successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Schedules','action'=>'Scheduledetails',$Schedule_id));
    
}




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_addattachment()
{
    
        
    if ($this->request->is(['post','put'])) 
    {
        $data= $this->request->data;
        //echo "<pre>";print_r($data);die();
        $attachment = $this->data['Lead'];
        $name = $this->data['Schedule']['file']['name'];
        $Schedule_id = $this->data['Schedule']['Schedule_id'];
      //  echo "<pre>";print_r($name);
        
        $upload_dir = "img/attachment/";

        if(!empty($name)){

             $file = $this->data['Schedule']['file'];
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
                move_uploaded_file($this->data['Schedule']['file']["tmp_name"], $upload_dir . $aa);

        } 

        if ($this->Attachment->addAttachmentAdmin($data)) {

            $attachment_id = $this->Attachment->getInsertID();
            $this->Attachment->updateAll(array('Schedule_id' => "'$Schedule_id'",'file'=>"'$aa'"),array('id' => $attachment_id));
            $this->Flash->success('File Attech Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));  
 
        } else {
            $this->Flash->success('File Not be Attech', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));   
 
        }

    }    




}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deleteAttachment($id,$Schedule_id,$file_name)
{
    
    $this->Attachment->deleteAttachment($id);
    unlink('img/attachment/'.$file_name);
    //unlink("uploads/".$row['file']);
    $this->Flash->success('Attachment Deleted Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));

}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_newemail()
{      
    if ($this->request->is(['post','put'])) 
    {
        
        $data = $this->request->data;
        //echo "<pre>";print_r($data);die();
        $from =$data['Schedule']['email_from'];
        $to =$data['Schedule']['email_to'];
        $subject =$data['Schedule']['subject'];
        $message =$data['Schedule']['message'];
        $cc =$data['Schedule']['cc'];
        $bcc =$data['Schedule']['bcc'];
        $user_id =$data['Schedule']['user_id'];
        $Schedule_id =$data['Schedule']['Schedule_id'];
        $user =$data['Schedule']['user'];
        $save = $this->Email->addEmailAdmin($data);
        $email_id = $this->Email->getInsertID();
        $this->Email->updateAll(array('user_id' => "'$user_id'",'Schedule_id' => "'$Schedule_id'" ,'email_to'=>"'$to'",'email_from'=>"'$from'",'subject'=>"'$subject'",'message'=>"'$message'",'cc'=>"'$cc'",'bcc'=>"'$bcc'",'cc'=>"'$cc'",'user'=>"'$user'"),array('id' => $email_id));
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
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));
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
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));
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
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));
        }
        else
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));  
        }
    }    
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_addnewreminder(){
    
    $this->set('title','New Reminder');
    if($this->request->is('post')){
        $reminder =$this->request->data;
        //pr($reminder);die();
        $Schedule_id = $reminder['Reminder']['Schedule_id'];
        $save = $this->Reminder->addNewReminder($reminder);
        return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));
    }
}


///////////////////////////////////////////////////////////////////////

public function admin_usernamebyid()
{
    $user_id =$this->request->data('user_id');
    if ($this->request->is('ajax'))
    {
        $user = $this->User->findUserbyId($user_id);
        //pr($user);
        $this->set('user', $user);
    }
    //exit();
}


//////////////////////////////////////////////////////////////////////////


public function admin_addpricing(){
    
    $this->set('title','New Pricing');

    if($this->request->is('post'))
    {
        $Schedule=$this->request->data;
        //pr($Schedule);die();
        $item = $Schedule['SchedulePricing']['product_name'];
        $Schedule_id = $Schedule['SchedulePricing']['Schedule_id'];
        
        $product = $this->Product->findProductbyIdName($item);
     //   $user = explode(",", $item);
        //pr($product);die();
        if(empty($product))
        {    
            $this->Flash->success("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'Schedules','action'=>'Scheduledetails',$Schedule_id));
        }
        else
        {
            $pro_id=$product['Product']['id'];
            $save = $this->SchedulePricing->addSchedulePricingAdmin($Schedule);
            $Schedule_pricing_id = $this->SchedulePricing->getInsertID();
       
        
            $this->SchedulePricing->updateAll(array('product_id' => "'$pro_id'"),array('id' => $Schedule_pricing_id));
      
            return $this->redirect(array('controller'=>'Schedules','action'=>'Scheduledetails',$Schedule_id));
        }

    }
    exit();

}

//////////////////////////////////////////////////////////////////////////////////////

public function admin_deletepricing($id,$Schedule_id)
{
    
    $this->SchedulePricing->DeleteSchedulePricing($id);
    
    $this->Flash->success('Deleted! Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));

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
    $this->set('title','Add Schedule');
    $session_id = $this->Auth->user('id');
    $users = $this->User->allUsersBysessionId($session_id);
    $this->set('users', $users);
    if($this->request->is('post'))
    {
        $schedule=$this->request->data;
        $user_id = $schedule['Schedule']['user_id'];
        $this->redirect(array("controller"=>"Schedules","action" => "newnew",'?' => array('user_id' => $user_id)));
    }
}



///////////////////////////////////////////////////////////////////


public function newnew() 
{
    $this->layout="frontenduser";
  $this->set('title','Add Schedule');
    if($this->request->is('post'))
    {
        $schedule=$this->request->data;
        $save = $this->Schedule->addScheduleAdmin($schedule);
        $schedule_id = $this->Schedule->getInsertID();
        $this->Flash->success('Schedule Created Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Schedules","action" => "scheduleedit",$schedule_id));  
       
    }
}


////////////////////////////////////////////////////////////////////

public function scheduleedit($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Schedule');

    $Schedule= $this->Schedule->findSchedulebyId($id); // Get Schedule Detail from id
    $Inventory= $this->Inventory->findInventorybyScheduleId($id); 
    //pr($Inventory);die();
  
    if($this->request->is('post'))
    {
        $schedule=$this->request->data;
        //pr($Schedules);die();
        $save = $this->Schedule->editSchedulebyId($schedule,$id);
        $this->Flash->success('Schedule Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Schedules","action" => "scheduleedit",$id));
    }

    $this->data = $Schedule ;
    $this->set(compact('Schedule','Inventory'));
    
}

////////////////////////////////////////////////////////////////////

public function deleteschedule($id){
    $this->layout="frontenduser";
    $this->Schedule->deleteSchedule($id);
    $this->Flash->success('Schedule Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Schedules","action"=>"Schedulelist"));
    
}


// /////////////////////////////////////////////////////////////////

public function schedulelist()
{
    $this->layout="frontenduser";
    $this->set('title','Schedule List');
    $session_id = $this->Auth->user('id');
    //$Schedules = $this->Schedule->allSchedules();
    $Schedules = $this->Schedule->query("SELECT schedules.*, users.first_name ,users.last_name FROM schedules  INNER JOIN users ON schedules.user_id = users.id where schedules.login_id = $session_id");
    //pr($Schedules);die();
    $this->set('Schedules', $Schedules);
}

////////////////////////////////////////////////////////////////////    

public function scheduleview($id){
    $this->layout="frontenduser";
$this->set('title','Profile');
    $Schedule = $this->Schedule->findSchedulebyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Schedule->editSchedulebyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Schedules','action'=>'Scheduleview'));
    }
    $this->data = $Schedule ; 
    $this->set(compact('Schedule'));
}



////////////////////////////////////////////////////////////////////

public function inventory()
{
    $this->layout="frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Auth->user('id');
    if ($this->request->is('ajax'))
    {
        $data = $this->Product->query("SELECT * FROM products where login_id = $session_id AND product_name  like '%$data%'");
        $this->set('data', $data);
    }

}

////////////////////////////////////////////////////////////////////

public function inventoryitem()
{
    $this->layout="frontenduser";
    $b =$this->request->data('b');
    if ($this->request->is('ajax'))
    {
        $Product = $this->Product->find('all',array('conditions'=>array('product_name'=>$b)));
        $this->set('Product', $Product);
    }
    //exit();
}


//////////////////////////////////////////////////////////////////////
public function deleteinventoryitem($inv_id,$Schedule_id){
    $this->layout="frontenduser";
    $this->Inventory->deleteInventory($inv_id);
    $this->Flash->success('Item Deleted Successfully', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'Schedules','action'=>'scheduleedit',$Schedule_id));
}

/////////////////////////////////////////////////////////////////////


public function updatedescription()
{
    $this->layout="frontenduser";
    $description =$this->request->data('description');
    $inv_id =$this->request->data('inv_id');
    if ($this->request->is('ajax'))
    {
        $this->Inventory->updateAll(array('description' => "'$description'"),array('id' => $inv_id));
    }
    exit();
}



//////////////////////////////////////////////////////////////////////


public function updatequantity()
{
    $this->layout="frontenduser";
    $quantity =$this->request->data('quantity');
    $inv_id =$this->request->data('inv_id');
    if ($this->request->is('ajax'))
    {
        $this->Inventory->updateAll(array('quantity' => "'$quantity'"),array('id' => $inv_id));
    }
    exit();
}




///////////////////////////////////////////////////////////////////////

public function updaterate()
{
    $this->layout="frontenduser";
    $rate =$this->request->data('rate');
    $inv_id =$this->request->data('inv_id');
   
    if ($this->request->is('ajax'))
    {
        $this->Inventory->updateAll(array('rate' => "'$rate'"),array('id' => $inv_id));
    }
   exit();
}

///////////////////////////////////////////////////////////////////////

public function updatetax()
{
    $this->layout="frontenduser";
    $tax =$this->request->data('tax');
    $inv_id =$this->request->data('inv_id');
   
    if ($this->request->is('ajax'))
    {
        $this->Inventory->updateAll(array('tax' => "'$tax'"),array('id' => $inv_id));
    }
   exit();
}




/////////////////////////////////////////////////////////////////////////

public function addnotes(){
    $this->layout="frontenduser";
    if($this->request->is('post'))
    {        
        $note=$this->request->data;
        //pr($Note);die();
        $Schedule_id=$note['Note']['Schedule_id'];
        $save = $this->Note->addNoteAdmin($note);
        $this->Flash->success('Schedule Note Add successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Schedules','action'=>'Scheduledetails',$Schedule_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function deletenote($note_id,$Schedule_id){
   $this->layout="frontenduser";
        $delete = $this->Note->deleteNote($note_id);
        $this->Flash->success('Schedule Note Deleted successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Schedules','action'=>'Scheduledetails',$Schedule_id));
    
}




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function addattachment()
{
    $this->layout="frontenduser";
        
    if ($this->request->is(['post','put'])) 
    {
        $data= $this->request->data;
        //echo "<pre>";print_r($data);die();
        $attachment = $this->data['Lead'];
        $name = $this->data['Schedule']['file']['name'];
        $Schedule_id = $this->data['Schedule']['Schedule_id'];
      //  echo "<pre>";print_r($name);
        
        $upload_dir = "img/attachment/";

        if(!empty($name)){

             $file = $this->data['Schedule']['file'];
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
                move_uploaded_file($this->data['Schedule']['file']["tmp_name"], $upload_dir . $aa);

        } 

        if ($this->Attachment->addAttachmentAdmin($data)) {

            $attachment_id = $this->Attachment->getInsertID();
            $this->Attachment->updateAll(array('Schedule_id' => "'$Schedule_id'",'file'=>"'$aa'"),array('id' => $attachment_id));
            $this->Flash->success('File Attech Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));  
 
        } else {
            $this->Flash->success('File Not be Attech', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));   
 
        }

    }    




}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteAttachment($id,$Schedule_id,$file_name)
{
    $this->layout="frontenduser";
    $this->Attachment->deleteAttachment($id);
    unlink('img/attachment/'.$file_name);
    //unlink("uploads/".$row['file']);
    $this->Flash->success('Attachment Deleted Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));

}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function newemail()
{      
    $this->layout="frontenduser";
    if ($this->request->is(['post','put'])) 
    {
        
        $data = $this->request->data;
        //echo "<pre>";print_r($data);die();
        $from =$data['Schedule']['email_from'];
        $to =$data['Schedule']['email_to'];
        $subject =$data['Schedule']['subject'];
        $message =$data['Schedule']['message'];
        $cc =$data['Schedule']['cc'];
        $bcc =$data['Schedule']['bcc'];
        $user_id =$data['Schedule']['user_id'];
        $Schedule_id =$data['Schedule']['Schedule_id'];
        $user =$data['Schedule']['user'];
        $save = $this->Email->addEmailAdmin($data);
        $email_id = $this->Email->getInsertID();
        $this->Email->updateAll(array('user_id' => "'$user_id'",'Schedule_id' => "'$Schedule_id'" ,'email_to'=>"'$to'",'email_from'=>"'$from'",'subject'=>"'$subject'",'message'=>"'$message'",'cc'=>"'$cc'",'bcc'=>"'$bcc'",'cc'=>"'$cc'",'user'=>"'$user'"),array('id' => $email_id));
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
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));
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
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));
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
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));
        }
        else
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));  
        }
    }    
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function addnewreminder(){
    $this->layout="frontenduser";
    $this->set('title','New Reminder');
    if($this->request->is('post')){
        $reminder =$this->request->data;
        //pr($reminder);die();
        $Schedule_id = $reminder['Reminder']['Schedule_id'];
        $save = $this->Reminder->addNewReminder($reminder);
        return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));
    }
}


///////////////////////////////////////////////////////////////////////

public function usernamebyid()
{
    $this->layout="frontenduser";
    $user_id =$this->request->data('user_id');
    if ($this->request->is('ajax'))
    {
        $user = $this->User->findUserbyId($user_id);
        //pr($user);
        $this->set('user', $user);
    }
    //exit();
}


//////////////////////////////////////////////////////////////////////////


public function addpricing(){
    $this->layout="frontenduser";
    $this->set('title','New Pricing');

    if($this->request->is('post'))
    {
        $Schedule=$this->request->data;
        //pr($Schedule);die();
        $item = $Schedule['SchedulePricing']['product_name'];
        $Schedule_id = $Schedule['SchedulePricing']['Schedule_id'];
        
        $product = $this->Product->findProductbyIdName($item);
     //   $user = explode(",", $item);
        //pr($product);die();
        if(empty($product))
        {    
            $this->Flash->success("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'Schedules','action'=>'Scheduledetails',$Schedule_id));
        }
        else
        {
            $pro_id=$product['Product']['id'];
            $save = $this->SchedulePricing->addSchedulePricingAdmin($Schedule);
            $Schedule_pricing_id = $this->SchedulePricing->getInsertID();
       
        
            $this->SchedulePricing->updateAll(array('product_id' => "'$pro_id'"),array('id' => $Schedule_pricing_id));
      
            return $this->redirect(array('controller'=>'Schedules','action'=>'Scheduledetails',$Schedule_id));
        }

    }
    exit();

}

//////////////////////////////////////////////////////////////////////////////////////

public function deletepricing($id,$Schedule_id)
{
    $this->layout="frontenduser";
    $this->SchedulePricing->DeleteSchedulePricing($id);
    
    $this->Flash->success('Deleted! Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "Schedules","action" => "Scheduledetails",$Schedule_id));

}

//////////////////////////////////////////////////////////////////////////


}