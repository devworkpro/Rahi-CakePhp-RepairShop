<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class ContractsController extends AppController {

public $uses = array('Contract','Product','User','Purchase','Comment','Phone','Note','Attachment','Email','Reminder','ContractPricing','Sla');

public function admin_add() 
{
  $this->set('title','Add Contract');
    $slaname = $this->Sla->findallSlaName();
    if($this->request->is('post'))
    {
        $Contracts=$this->request->data;
        //pr($Contracts);die();
        $name=$Contracts['Contract']['name'];
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
                $save = $this->Contract->addContractAdmin($Contracts);
                $Contract_id = $this->Contract->getInsertID();
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $Contract_id");
                $this->Flash->success('Contract added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$Contract_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[2]'  or email = '$user[2]'");
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
                $save = $this->Contract->addContractAdmin($Contracts);
                $Contract_id = $this->Contract->getInsertID();
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $Contract_id");
                $this->Flash->success('Contract added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$Contract_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
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

                $save = $this->Contract->addContractAdmin($Contracts);
                $Contract_id = $this->Contract->getInsertID();
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $Contract_id");
                $this->Flash->success('Contract added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$Contract_id));
                
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
                $save = $this->Contract->addContractAdmin($Contracts);
                $Contract_id = $this->Contract->getInsertID();
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $Contract_id");
                $this->Flash->success('Contract added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$Contract_id));
               
            }  

        }
    }
    $this->set(compact('slaname'));
}

////////////////////////////////////////////////////////////////////

public function admin_contractedit($id){
    $this->set('title','Edit Contract');

    $Contract= $this->Contract->findContractbyId($id); // Get Contract Detail from id
    $slaname = $this->Sla->findallSlaName();

    //pr($slaname);die();
  
    if($this->request->is('post'))
    {
        $Contracts=$this->request->data;
        //pr($Contracts);die();
        $name=$Contracts['Contract']['name'];
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
                $this->Contract->editContractbyId($this->request->data,$id);
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $id");
                $this->Flash->success('Contract Successfully updated!', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[2]'  or email = '$user[2]'");
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
                $this->Contract->editContractbyId($this->request->data,$id);
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $id");
                $this->Flash->success('Contract Successfully updated!', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
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

                $this->Contract->editContractbyId($this->request->data,$id);
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $id");
                $this->Flash->success('Contract Successfully updated!', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$id));
                
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
                $this->Contract->editContractbyId($this->request->data,$id);
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $id");
                $this->Flash->success('Contract Successfully updated!', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$id));
               
            }  

        }
    }




    $this->data = $Contract ;
    $this->set(compact('Contract','slaname'));
    
}

////////////////////////////////////////////////////////////////////

public function admin_deletecontract($id){
    $this->Contract->deleteContract($id);
    $this->Flash->success('Contract Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Contracts","action"=>"contractlist"));
    
}


// /////////////////////////////////////////////////////////////////

public function admin_contractlist()
{
    $this->set('title','Contract List');
    //$Contracts = $this->Contract->allContracts();
    $Contracts = $this->Contract->query("SELECT contracts.*, users.first_name ,users.last_name FROM contracts  INNER JOIN users ON contracts.user_id = users.id");
    //pr($Contracts);die();
    $this->set('Contracts', $Contracts);
}

////////////////////////////////////////////////////////////////////    

public function admin_contractview($id){
$this->set('title','Profile');
    $Contract = $this->Contract->findContractbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Contract->editContractbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Contracts','action'=>'contractview'));
    }
    $this->data = $Contract ; 
    $this->set(compact('Contract'));
}



////////////////////////////////////////////////////////////////////

public function admin_contractdetails($id)
{
	$Contract = $this->Contract->findContractbyId($id);
    //pr($Contract);    
    $sla_id = $Contract['Contract']['sla_id'];

    $user_id=$Contract['Contract']['user_id'];
    $user = $this->User->findUserbyId($user_id);
    $phone = $this->Phone->findbyUserid($user_id);
    $Note = $this->Note->findNotebyContractId($id);
    $Attachment = $this->Attachment->findAttachmentbyContractId($id);
    $Email = $this->Email->findEmailbyContractId($id);
    $Pricing = $this->ContractPricing->findallContractPricingByContractId($id);
    $slaname = $this->Sla->findallSlaName();
    $slanamebyid = $this->Sla->findallSlaNameById($sla_id);
    //pr($slanamebyid);die();
    $this->set(compact('Contract','user','phone','Note','Attachment','Email','Pricing','slaname','slanamebyid'));
}


////////////////////////////////////////////////////////////////////

public function admin_contract()
{

    $id =$this->request->data('id');
 
    if ($this->request->is('ajax'))
    {
        $data= $this->Product->findProductbyId($id);
        $this->set('data', $data);
    }
}

////////////////////////////////////////////////////////////////////
public function admin_product()
{
    $data =$this->request->data('search');
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where product_name like '%$data%'");
        $this->set('user', $user);
    }
}


////////////////////////////////////////////////////////////////////
public function admin_productprice()
{
    $b =$this->request->data('b');
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT price_retail FROM products where product_name='$b'");
        foreach ($user as $product) {
            echo $product['products']['price_retail'];
            
        }
        
    }
    exit();
}


//////////////////////////////////////////////////////////////////////
public function admin_deletecomment($comment_id,$Contract_id){
    
    $this->Comment->deleteCommant($comment_id);
    $this->Flash->success('Comment Deleted Successfully', array('key' => 'positive'));
  //  return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));
    return $this->redirect(array('controller'=>'Contracts','action'=>'contractdetails',$Contract_id));
}

/////////////////////////////////////////////////////////////////////


public function admin_updatepurchaseitem()
{
    $item =$this->request->data('item');
    $Contract_id =$this->request->data('Contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('item' => "'$item'"),array('id' => $Contract_id));
    }
    exit();
}



//////////////////////////////////////////////////////////////////////


public function admin_updatepurchasetotal()
{
    $total =$this->request->data('total');
    $Contract_id =$this->request->data('Contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('total' => "'$total'"),array('id' => $Contract_id));
    }
    exit();
}




///////////////////////////////////////////////////////////////////////

public function admin_contractnameupdate()
{
    $contract_name =$this->request->data('contract_name');
    $Contract_id =$this->request->data('contract_id');
   
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('contract_name' => "'$contract_name'"),array('id' => $Contract_id));
    }
   exit();
}


//////////////////////////////////////////////////////////////////////

public function admin_statusupdate()
{
    $status =$this->request->data('status');
    $Contract_id =$this->request->data('contract_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Contract->updateAll(array('status' => "'$status'"),array('id' => $Contract_id));
       // $this->set('user', $user);
        

   }
   exit();
}


///////////////////////////////////////////////////////////////////////

public function admin_estimatedvalueupdate()
{
    $estimated_value =$this->request->data('estimated_value');
    $Contract_id =$this->request->data('contract_id');
   
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('estimated_value' => "'$estimated_value'"),array('id' => $Contract_id));
    }
   exit();
}



////////////////////////////////////////////////////////////////////////

public function admin_likelihoodupdate()
{
    $likelihood =$this->request->data('likelihood');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('likelihood' => "'$likelihood'"),array('id' => $Contract_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function admin_startdateupdate()
{
    $start_date =$this->request->data('start_date');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('start_date' => "'$start_date'"),array('id' => $Contract_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function admin_enddateupdate()
{
    $end_date =$this->request->data('end_date');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('end_date' => "'$end_date'"),array('id' => $Contract_id));
    }
    exit();
}



////////////////////////////////////////////////////////////////////////

public function admin_primarycontactupdate()
{
    $primary_contact =$this->request->data('primary_contact');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('primary_contact' => "'$primary_contact'"),array('id' => $Contract_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function admin_servicelevelagreementupdate()
{
    $service_level_agreement =$this->request->data('service_level_agreement');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('sla_id' => "'$service_level_agreement'"),array('id' => $Contract_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function admin_appliestoallticketsupdate()
{
    $applie =$this->request->data('applie');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('applies_to_all_tickets' => "'$applie'"),array('id' => $Contract_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function admin_descriptionupdate()
{
    $description =$this->request->data('description');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('description' => "'$description'"),array('id' => $Contract_id));
    }
    exit();
}
/////////////////////////////////////////////////////////////////////////

public function admin_addnotes(){
   
    if($this->request->is('post'))
    {        
        $note=$this->request->data;
        //pr($Note);die();
        $Contract_id=$note['Note']['contract_id'];
        $save = $this->Note->addNoteAdmin($note);
        $this->Flash->success('Contract Note Add successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Contracts','action'=>'contractdetails',$Contract_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function admin_deletenote($note_id,$Contract_id){
   
        $delete = $this->Note->deleteNote($note_id);
        $this->Flash->success('Contract Note Deleted successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Contracts','action'=>'contractdetails',$Contract_id));
    
}




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_addattachment()
{
    
        
    if ($this->request->is(['post','put'])) 
    {
        $data= $this->request->data;
        //echo "<pre>";print_r($data);die();
        $attachment = $this->data['Lead'];
        $name = $this->data['contract']['file']['name'];
        $contract_id = $this->data['contract']['contract_id'];
      //  echo "<pre>";print_r($name);
        
        $upload_dir = "img/attachment/";

        if(!empty($name)){

             $file = $this->data['contract']['file'];
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
                move_uploaded_file($this->data['contract']['file']["tmp_name"], $upload_dir . $aa);

        } 

        if ($this->Attachment->addAttachmentAdmin($data)) {

            $attachment_id = $this->Attachment->getInsertID();
            $this->Attachment->updateAll(array('contract_id' => "'$contract_id'",'file'=>"'$aa'"),array('id' => $attachment_id));
            $this->Flash->success('File Attech Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));  
 
        } else {
            $this->Flash->success('File Not be Attech', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));   
 
        }

    }    




}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deleteAttachment($id,$contract_id,$file_name)
{
    
    $this->Attachment->deleteAttachment($id);
    unlink('img/attachment/'.$file_name);
    //unlink("uploads/".$row['file']);
    $this->Flash->success('Attachment Deleted Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));

}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_newemail()
{      
    if ($this->request->is(['post','put'])) 
    {
        
        $data = $this->request->data;
        //echo "<pre>";print_r($data);die();
        $from =$data['contract']['email_from'];
        $to =$data['contract']['email_to'];
        $subject =$data['contract']['subject'];
        $message =$data['contract']['message'];
        $cc =$data['contract']['cc'];
        $bcc =$data['contract']['bcc'];
        $user_id =$data['contract']['user_id'];
        $contract_id =$data['contract']['contract_id'];
        $user =$data['contract']['user'];
        $save = $this->Email->addEmailAdmin($data);
        $email_id = $this->Email->getInsertID();
        $this->Email->updateAll(array('user_id' => "'$user_id'",'contract_id' => "'$contract_id'" ,'email_to'=>"'$to'",'email_from'=>"'$from'",'subject'=>"'$subject'",'message'=>"'$message'",'cc'=>"'$cc'",'bcc'=>"'$bcc'",'cc'=>"'$cc'",'user'=>"'$user'"),array('id' => $email_id));
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
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));
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
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));
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
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));
        }
        else
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));  
        }
    }    
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_addnewreminder(){
    
    $this->set('title','New Reminder');
    if($this->request->is('post')){
        $reminder =$this->request->data;
        //pr($reminder);die();
        $contract_id = $reminder['Reminder']['contract_id'];
        $save = $this->Reminder->addNewReminder($reminder);
        return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));
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
        $contract=$this->request->data;
        //pr($contract);die();
        $item = $contract['ContractPricing']['product_name'];
        $contract_id = $contract['ContractPricing']['contract_id'];
        
        $product = $this->Product->findProductbyIdName($item);
     //   $user = explode(",", $item);
        //pr($product);die();
        if(empty($product))
        {    
            $this->Flash->success("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'Contracts','action'=>'contractdetails',$contract_id));
        }
        else
        {
            $pro_id=$product['Product']['id'];
            $save = $this->ContractPricing->addContractPricingAdmin($contract);
            $contract_pricing_id = $this->ContractPricing->getInsertID();
       
        
            $this->ContractPricing->updateAll(array('product_id' => "'$pro_id'"),array('id' => $contract_pricing_id));
      
            return $this->redirect(array('controller'=>'Contracts','action'=>'contractdetails',$contract_id));
        }

    }
    exit();

}

//////////////////////////////////////////////////////////////////////////////////////

public function admin_deletepricing($id,$contract_id)
{
    
    $this->ContractPricing->DeleteContractPricing($id);
    
    $this->Flash->success('Deleted! Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));

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
  $this->layout="frontenduser";
  $this->set('title','Add Contract');
  $session_id = $this->Auth->user('id');
    $slaname = $this->Sla->findallSlaNameByLoginId($session_id);
    if($this->request->is('post'))
    {
        $Contracts=$this->request->data;
        //pr($Contracts);die();
        $name=$Contracts['Contract']['name'];
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
                $this->Flash->failure("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[3]);
       
            }
            else
            {
                $save = $this->Contract->addContractAdmin($Contracts);
                $Contract_id = $this->Contract->getInsertID();
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $Contract_id");
                $this->Flash->success('Contract added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$Contract_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[2]'  or email = '$user[2]'");
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
                $save = $this->Contract->addContractAdmin($Contracts);
                $Contract_id = $this->Contract->getInsertID();
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $Contract_id");
                $this->Flash->success('Contract added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$Contract_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
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

                $save = $this->Contract->addContractAdmin($Contracts);
                $Contract_id = $this->Contract->getInsertID();
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $Contract_id");
                $this->Flash->success('Contract added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$Contract_id));
                
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
                $save = $this->Contract->addContractAdmin($Contracts);
                $Contract_id = $this->Contract->getInsertID();
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $Contract_id");
                $this->Flash->success('Contract added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$Contract_id));
               
            }  

        }
    }
    $this->set(compact('slaname'));
}

////////////////////////////////////////////////////////////////////

public function contractedit($id){

    $this->layout="frontenduser";
    $this->set('title','Edit Contract');
    $session_id = $this->Auth->user('id');
    $Contract= $this->Contract->findContractbyId($id); // Get Contract Detail from id
    $slaname = $this->Sla->findallSlaNameByLoginId($session_id);

    //pr($slaname);die();
  
    if($this->request->is('post'))
    {
        $Contracts=$this->request->data;
        //pr($Contracts);die();
        $name=$Contracts['Contract']['name'];
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
                $this->Flash->failure("$name hasn't been set as a customer yet, please fill out the relevant information!", array('key' => 'positive'));
                $this->redirect(array("controller"=>"users","action" => "add",'?' => array('name' => $name)));
                $this->set('user', $user[3]);
       
            }
            else
            {
                $this->Contract->editContractbyId($this->request->data,$id);
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $id");
                $this->Flash->success('Contract Successfully updated!', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[2]'  or email = '$user[2]'");
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
                $this->Contract->editContractbyId($this->request->data,$id);
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $id");
                $this->Flash->success('Contract Successfully updated!', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' or business_name = '$user[1]'  or email = '$user[1]'");
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

                $this->Contract->editContractbyId($this->request->data,$id);
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $id");
                $this->Flash->success('Contract Successfully updated!', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$id));
                
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
                $this->Contract->editContractbyId($this->request->data,$id);
                $this->Contract->query("Update contracts set  user_id = $user_id  where id = $id");
                $this->Flash->success('Contract Successfully updated!', array('key' => 'positive'));
                $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$id));
               
            }  

        }
    }




    $this->data = $Contract ;
    $this->set(compact('Contract','slaname'));
    
}

////////////////////////////////////////////////////////////////////

public function deletecontract($id){
    $this->layout="frontenduser";
    $this->Contract->deleteContract($id);
    $this->Flash->success('Contract Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Contracts","action"=>"contractlist"));
    
}


// /////////////////////////////////////////////////////////////////

public function contractlist()
{
    $session_id = $this->Auth->user('id');
    $this->layout="frontenduser";
    $this->set('title','Contract List');
    //$Contracts = $this->Contract->allContracts();
    $Contracts = $this->Contract->query("SELECT contracts.*, users.first_name ,users.last_name FROM contracts  INNER JOIN users ON contracts.user_id = users.id where contracts.login_id = $session_id");
    //pr($Contracts);die();
    $this->set('Contracts', $Contracts);
}

////////////////////////////////////////////////////////////////////    

public function contractview($id){
    $this->layout="frontenduser";
$this->set('title','Profile');
    $Contract = $this->Contract->findContractbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Contract->editContractbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Contracts','action'=>'contractview'));
    }
    $this->data = $Contract ; 
    $this->set(compact('Contract'));
}



////////////////////////////////////////////////////////////////////

public function contractdetails($id)
{
    $this->layout="frontenduser";
    $session_id = $this->Auth->user('id');
    $Contract = $this->Contract->findContractbyId($id);
    //pr($Contract);    
    $sla_id = $Contract['Contract']['sla_id'];

    $user_id=$Contract['Contract']['user_id'];
    $user = $this->User->findUserbyId($user_id);
    $phone = $this->Phone->findbyUserid($user_id);
    $Note = $this->Note->findNotebyContractId($id);
    $Attachment = $this->Attachment->findAttachmentbyContractId($id);
    $Email = $this->Email->findEmailbyContractId($id);
    $Pricing = $this->ContractPricing->findallContractPricingByContractId($id);
    $slaname = $this->Sla->findallSlaNameByLoginId($session_id);
    $slanamebyid = $this->Sla->findallSlaNameById($sla_id);
    //pr($slanamebyid);die();
    $this->set(compact('Contract','user','phone','Note','Attachment','Email','Pricing','slaname','slanamebyid'));
}


////////////////////////////////////////////////////////////////////

public function contract()
{
    $this->layout="frontenduser";
    $id =$this->request->data('id');
 
    if ($this->request->is('ajax'))
    {
        $data= $this->Product->findProductbyId($id);
        $this->set('data', $data);
    }
}

////////////////////////////////////////////////////////////////////
public function product()
{
    $this->layout="frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Auth->user('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where login_id = $session_id AND product_name like '%$data%'");
        $this->set('user', $user);
    }
}


////////////////////////////////////////////////////////////////////
public function productprice()
{
    $this->layout="frontenduser";
    $b =$this->request->data('b');
    $session_id = $this->Auth->user('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT price_retail FROM products where login_id = $session_id AND product_name='$b'");
        foreach ($user as $product) {
            echo $product['products']['price_retail'];
            
        }
        
    }
    exit();
}


//////////////////////////////////////////////////////////////////////
public function deletecomment($comment_id,$Contract_id){
    $this->layout="frontenduser";
    $this->Comment->deleteCommant($comment_id);
    $this->Flash->success('Comment Deleted Successfully', array('key' => 'positive'));
  //  return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));
    return $this->redirect(array('controller'=>'Contracts','action'=>'contractdetails',$Contract_id));
}

/////////////////////////////////////////////////////////////////////


public function updatepurchaseitem()
{
    $this->layout="frontenduser";
    $item =$this->request->data('item');
    $Contract_id =$this->request->data('Contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('item' => "'$item'"),array('id' => $Contract_id));
    }
    exit();
}



//////////////////////////////////////////////////////////////////////


public function updatepurchasetotal()
{
    $this->layout="frontenduser";
    $total =$this->request->data('total');
    $Contract_id =$this->request->data('Contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('total' => "'$total'"),array('id' => $Contract_id));
    }
    exit();
}




///////////////////////////////////////////////////////////////////////

public function contractnameupdate()
{
    $this->layout="frontenduser";
    $contract_name =$this->request->data('contract_name');
    $Contract_id =$this->request->data('contract_id');
   
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('contract_name' => "'$contract_name'"),array('id' => $Contract_id));
    }
   exit();
}


//////////////////////////////////////////////////////////////////////

public function statusupdate()
{
    $this->layout="frontenduser";
    $status =$this->request->data('status');
    $Contract_id =$this->request->data('contract_id');
   
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Contract->updateAll(array('status' => "'$status'"),array('id' => $Contract_id));
       // $this->set('user', $user);
        

   }
   exit();
}


///////////////////////////////////////////////////////////////////////

public function estimatedvalueupdate()
{
    $this->layout="frontenduser";
    $estimated_value =$this->request->data('estimated_value');
    $Contract_id =$this->request->data('contract_id');
   
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('estimated_value' => "'$estimated_value'"),array('id' => $Contract_id));
    }
   exit();
}



////////////////////////////////////////////////////////////////////////

public function likelihoodupdate()
{
    $this->layout="frontenduser";
    $likelihood =$this->request->data('likelihood');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('likelihood' => "'$likelihood'"),array('id' => $Contract_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function startdateupdate()
{
    $this->layout="frontenduser";
    $start_date =$this->request->data('start_date');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('start_date' => "'$start_date'"),array('id' => $Contract_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function enddateupdate()
{
    $this->layout="frontenduser";
    $end_date =$this->request->data('end_date');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('end_date' => "'$end_date'"),array('id' => $Contract_id));
    }
    exit();
}



////////////////////////////////////////////////////////////////////////

public function primarycontactupdate()
{
    $this->layout="frontenduser";
    $primary_contact =$this->request->data('primary_contact');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('primary_contact' => "'$primary_contact'"),array('id' => $Contract_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function servicelevelagreementupdate()
{
    $this->layout="frontenduser";
    $service_level_agreement =$this->request->data('service_level_agreement');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('sla_id' => "'$service_level_agreement'"),array('id' => $Contract_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function appliestoallticketsupdate()
{
    $this->layout="frontenduser";
    $applie =$this->request->data('applie');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('applies_to_all_tickets' => "'$applie'"),array('id' => $Contract_id));
    }
    exit();
}


////////////////////////////////////////////////////////////////////////

public function descriptionupdate()
{
    $this->layout="frontenduser";
    $description =$this->request->data('description');
    $Contract_id =$this->request->data('contract_id');
    if ($this->request->is('ajax'))
    {
        $this->Contract->updateAll(array('description' => "'$description'"),array('id' => $Contract_id));
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
        $Contract_id=$note['Note']['contract_id'];
        $save = $this->Note->addNoteAdmin($note);
        $this->Flash->success('Contract Note Add successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Contracts','action'=>'contractdetails',$Contract_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function deletenote($note_id,$Contract_id){
   $this->layout="frontenduser";
        $delete = $this->Note->deleteNote($note_id);
        $this->Flash->success('Contract Note Deleted successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Contracts','action'=>'contractdetails',$Contract_id));
    
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
        $name = $this->data['contract']['file']['name'];
        $contract_id = $this->data['contract']['contract_id'];
      //  echo "<pre>";print_r($name);
        
        $upload_dir = "img/attachment/";

        if(!empty($name)){

             $file = $this->data['contract']['file'];
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
                move_uploaded_file($this->data['contract']['file']["tmp_name"], $upload_dir . $aa);

        } 

        if ($this->Attachment->addAttachmentAdmin($data)) {

            $attachment_id = $this->Attachment->getInsertID();
            $this->Attachment->updateAll(array('contract_id' => "'$contract_id'",'file'=>"'$aa'"),array('id' => $attachment_id));
            $this->Flash->success('File Attech Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));  
 
        } else {
            $this->Flash->success('File Not be Attech', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));   
 
        }

    }    




}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteAttachment($id,$contract_id,$file_name)
{
    $this->layout="frontenduser";
    $this->Attachment->deleteAttachment($id);
    unlink('img/attachment/'.$file_name);
    //unlink("uploads/".$row['file']);
    $this->Flash->success('Attachment Deleted Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));

}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function newemail()
{      
    $this->layout="frontenduser";
    if ($this->request->is(['post','put'])) 
    {
        
        $data = $this->request->data;
        //echo "<pre>";print_r($data);die();
        $from =$data['contract']['email_from'];
        $to =$data['contract']['email_to'];
        $subject =$data['contract']['subject'];
        $message =$data['contract']['message'];
        $cc =$data['contract']['cc'];
        $bcc =$data['contract']['bcc'];
        $user_id =$data['contract']['user_id'];
        $contract_id =$data['contract']['contract_id'];
        $user =$data['contract']['user'];
        $save = $this->Email->addEmailAdmin($data);
        $email_id = $this->Email->getInsertID();
        $this->Email->updateAll(array('user_id' => "'$user_id'",'contract_id' => "'$contract_id'" ,'email_to'=>"'$to'",'email_from'=>"'$from'",'subject'=>"'$subject'",'message'=>"'$message'",'cc'=>"'$cc'",'bcc'=>"'$bcc'",'cc'=>"'$cc'",'user'=>"'$user'"),array('id' => $email_id));
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
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));
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
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));
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
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));
        }
        else
        {
            $mail = new CakeEmail();
            $mail->from($from);
            $mail->to($to);
            $mail->subject($subject);
            $mail->send($message);
            $this->Flash->success('Email send Successfully', array('key' => 'positive'));  
            return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));  
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
        $contract_id = $reminder['Reminder']['contract_id'];
        $save = $this->Reminder->addNewReminder($reminder);
        return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));
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
        $contract=$this->request->data;
        //pr($contract);die();
        $item = $contract['ContractPricing']['product_name'];
        $contract_id = $contract['ContractPricing']['contract_id'];
        $session_id = $this->Auth->user('id');
        $product = $this->Product->findProductbyNameAndLoginId($item,$session_id);
     //   $user = explode(",", $item);
        //pr($product);die();
        if(empty($product))
        {    
            $this->Flash->failure("We couldn't find that product, try again.", array('key' => 'positive'));
            return $this->redirect(array('controller'=>'Contracts','action'=>'contractdetails',$contract_id));
        }
        else
        {
            $pro_id=$product['Product']['id'];
            $save = $this->ContractPricing->addContractPricingAdmin($contract);
            $contract_pricing_id = $this->ContractPricing->getInsertID();
       
        
            $this->ContractPricing->updateAll(array('product_id' => "'$pro_id'"),array('id' => $contract_pricing_id));
      
            return $this->redirect(array('controller'=>'Contracts','action'=>'contractdetails',$contract_id));
        }

    }
    exit();

}

//////////////////////////////////////////////////////////////////////////////////////

public function deletepricing($id,$contract_id)
{
    $this->layout="frontenduser";
    $this->ContractPricing->DeleteContractPricing($id);
    
    $this->Flash->success('Deleted! Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "Contracts","action" => "contractdetails",$contract_id));

}


/////////////////////////////////////////////////////////////////////////



}