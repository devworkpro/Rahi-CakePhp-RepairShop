<?php
App::uses('AppController', 'Controller');
class PortalUsersController extends AppController {

public $uses = array('PortalUser','Product','User','Purchase','Comment','Vendor','Purchase','Invoice','Ticket','Estimate','Attachment','AssetFieldValue','CustomFieldValue','Sale','Inventory');

public function admin_addNewPortalUser(){
    
    $this->set('title','Add New Portal User');
    $user_id =$this->request->data('user_id');
    $firstname =$this->request->data('firstname');
    $lastname =$this->request->data('lastname');
    $login =$this->request->data('login');
    $customername = $firstname.' '.$lastname;
    $PortalUser = array();
    $PortalUser['PortalUser']['user_id']=$user_id; 
    $PortalUser['PortalUser']['customer']=$customername;
    $PortalUser['PortalUser']['login']=$login;
    if ($this->request->is('ajax'))
    {
        $this->PortalUser->addPortalUserAdmin($PortalUser);
        $this->Flash->success('Portal User Add!',array('key' => 'positive'));
        echo $PortalUser_id = $this->PortalUser->getInsertID();
        // $this->set('user', $user);
    }    
    exit();
}



////////////////////////////////////////////////////////////////////

public function admin_userlogin()
{
    $this->set('title','Portal User Login');
    //$this->layout = false;
    $this->layout = 'portaluser';
    if($this->request->is('post'))
    {        
        $PortalUser = $this->request->data;
        $username = $PortalUser['PortalUser']['username'];
        $password = $PortalUser['PortalUser']['password'];

        //pr($PortalUser); die();
        $User = $this->PortalUser->query("SELECT * FROM portal_users WHERE login='$username' and password='$password'");
        //pr($User);

        if (!empty($User)) {
 
            foreach ($User as $user) {
                        $user_id = $user['portal_users']['user_id'];
                    }  
            $this->Session->write('PortalUser.user_id', $user_id);
            $this->Flash->success('Portal User Login!', array('key' => 'positive'));       
            return $this->redirect(array('controller'=>'PortalUsers','action'=>'myprofile'));  
        } else {
            $this->Flash->failure('Sorry, invalid credentials!', array('key' => 'positive'));       
            return $this->redirect(array('controller'=>'PortalUsers','action'=>'userlogin'));  
        }
        
    }
}


////////////////////////////////////////////////////////////////////

public function admin_userlogout()
{
    $this->set('title','Portal User Logout'); 
    $this->Session->delete('PortalUser.user_id');   
    $this->Flash->success('Signed out!', array('key' => 'positive'));       
    return $this->redirect(array('controller'=>'PortalUsers','action'=>'userlogin'));  
}
////////////////////////////////////////////////////////////////////

public function admin_myprofile()
{
    
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $userDetail = $this->User->findUserbyId($id);
    $invoice = $this->Invoice->findInvoicebyUserId($id);
    $ticket = $this->Ticket->findTicketbyUserId($id);
    $estimate = $this->Estimate->findEstimatebyUserId($id);
    $attachment = $this->Attachment->findAttachmentbyUserId($id);
    $assets = $this->AssetFieldValue->findallAssetFieldValueByUserId($id);
    //pr($PortalUser);   die();

    $this->set(compact('userDetail','invoice','ticket','estimate','attachment','assets'));
}



/////////////////////////////////////////////////////////////////////

public function admin_addnewticket() 
{
    if($this->request->is('post')){

        $Ticket=$this->request->data;
        //pr($Ticket);die();
        $save = $this->Ticket->addTicketAdmin($Ticket);
        $Ticket_id = $this->Ticket->getInsertID();
        $this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "PortalUsers","action" => "userticketdetail",$Ticket_id));

    }   
}


////////////////////////////////////////////////////////////////////

public function admin_userticketdetail($ticket_id)
{
    
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $user = $this->User->findUserbyId($id);
    $ticket = $this->Ticket->findTicketbyId($ticket_id);
    $comment = $this->Comment->findCommentbyTicketId($ticket_id);
    $attachment = $this->Attachment->findAttachmentbyTicketId($ticket_id);
    $AssetValue = $this->AssetFieldValue->findallAssetFieldValueByTicketId($ticket_id);
    $CustomFieldValue = $this->CustomFieldValue->findallCustomFieldValueByTicketId($ticket_id);
    //pr($CustomFieldValue);die();
    //pr($attachment);   die();

    $this->set(compact('user','ticket','comment','attachment','AssetValue','CustomFieldValue'));
}


////////////////////////////////////////////////////////////////////

public function admin_userticketlist()
{
    
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $userDetail = $this->User->findUserbyId($id);
    $ticket = $this->Ticket->findTicketbyUserId($id);
    //pr($ticket);   die();

    $this->set(compact('userDetail','ticket'));
}



//////////////////////////////////////////////////////////////////////////


public function admin_attachment()
{
    
        
    if ($this->request->is(['post','put'])) 
    {
        $data= $this->request->data;
        //pr($data);die();
        $attachment = $this->data['attachment'];
        $name = $this->data['attachment']['file']['name'];
        $ticket_id = $this->data['attachment']['ticket_id'];
        $status = $this->data['attachment']['status'];
        //$lead_id = $this->data['Lead']['lead_id'];
      //  echo "<pre>";print_r($name);
       // echo "<pre>";print_r($data);
        $upload_dir = "img/attachment/";

        if(!empty($name)){

             $file = $this->data['attachment']['file'];
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
                move_uploaded_file($this->data['attachment']['file']["tmp_name"], $upload_dir .$aa);

        } 

        if ($this->Attachment->addAttachmentAdmin($data)) {

            $attachment_id = $this->Attachment->getInsertID();
            $this->Attachment->updateAll(array('ticket_id' => "'$ticket_id'",'file'=>"'$aa'",'status'=>"'$status'"),array('id' => $attachment_id));
            $this->Flash->success('File Attech Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "PortalUsers","action" => "userticketdetail",$ticket_id));  
 
        } else {
            $this->Flash->success('File Not be Attech', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "PortalUsers","action" => "userticketdetail",$ticket_id));  
 
        }

    }    




}

////////////////////////////////////////////////////////////////////

public function admin_userinvoicedetail($inv_id)
{
    
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $user = $this->User->findUserbyId($id);
    $invoice = $this->Invoice->findInvoicebyId($inv_id);
    $sale = $this->Sale-> findSalebyInvoiceId($inv_id);
    //pr($sale);   die();
    $this->set(compact('user','invoice','sale'));
}

////////////////////////////////////////////////////////////////////


public function admin_userinvoicelist()
{
    
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $userDetail = $this->User->findUserbyId($id);
    $invoice = $this->Invoice->findInvoicebyUserId($id);
    //pr($ticket);   die();

    $this->set(compact('userDetail','invoice'));
}


////////////////////////////////////////////////////////////////////

public function admin_userestimatedetail($est_id)
{
    
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $user = $this->User->findUserbyId($id);
    $Estimates = $this->Estimate->findEstimatebyId($est_id);
    $Inventory = $this->Inventory->findInventorybyEstimateId($est_id);
   
    //pr($Estimates);   die();
    $this->set(compact('user','Estimates','Inventory'));
}

////////////////////////////////////////////////////////////////////


public function admin_userassetslist()
{
    
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $userDetail = $this->User->findUserbyId($id);
    $assets = $this->AssetFieldValue->findallAssetFieldValueByUserId($id);
    
    //pr($assets);   die();

    $this->set(compact('userDetail','assets'));
}

//////////////////////////////////////////////////////////////////////


public function admin_updatepassword()
{
    $password =$this->request->data('password');
    $confirm_password =$this->request->data('confirm_password');
    $portaluser_id =$this->request->data('portaluser_id');
    if ($this->request->is('ajax'))
    {
        $this->PortalUser->updateAll(array('password' => "'$password'",'confirm_password' => "'$confirm_password'"),array('id' => $portaluser_id));
    }
    exit();
}

/////////////////////////////////////////////////////////////////////


public function admin_updatelogin()
{
    $login =$this->request->data('login');
    $portaluser_id =$this->request->data('portaluser_id');
    if ($this->request->is('ajax'))
    {
        $this->PortalUser->updateAll(array('login' => "'$login'"),array('id' => $portaluser_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////


public function admin_updatecustomer()
{
    $customer =$this->request->data('customer');
    $portaluser_id =$this->request->data('portaluser_id');
    if ($this->request->is('ajax'))
    {
        $this->PortalUser->updateAll(array('customer' => "'$customer'"),array('id' => $portaluser_id));
    }
    exit();
}




//////////////////////////////////////////////////////////////////////


public function admin_estimatepdfmodal()
{

    $id =$this->request->data('id');
   
    if ($this->request->is('ajax'))
    {
        $Estimates = $this->Estimate->findEstimatebyId($id);
        $user_id = $Estimates["Estimate"]["user_id"];
        $Inventory = $this->Inventory->findInventorybyEstimateId($id);
        $user = $this->User->findUserbyId($user_id);
        //pr($Estimates);pr($Inventory);pr($user);
        $this->set(compact('Estimates','user','Inventory'));
        
    }
}


public function admin_estimatepdfmodal1()
{

    $id =$this->request->data('id');
   
    if ($this->request->is('ajax'))
    {
        $Estimates = $this->Estimate->findEstimatebyId($id);
        $user_id = $Estimates["Estimate"]["user_id"];
        $Inventory = $this->Inventory->findInventorybyEstimateId($id);
        $user = $this->User->findUserbyId($user_id);
        $data = array_merge($Estimates,$Inventory,$user);
        echo json_encode($data);
       // pr($data);
        //pr($Estimates);pr($Inventory);pr($user);
        //$this->set(compact('Estimates','user','Inventory'));
        
    }
    exit();
}


/**********************************************************************************/
/*********************************User Section*************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/

public function addNewPortalUser(){
    $this->layout="subscription";
    $this->set('title','Add New Portal User');
    $user_id =$this->request->data('user_id');
    $firstname =$this->request->data('firstname');
    $lastname =$this->request->data('lastname');
    $login =$this->request->data('login');
    $customername = $firstname.' '.$lastname;
    $PortalUser = array();
    $PortalUser['PortalUser']['user_id']=$user_id; 
    $PortalUser['PortalUser']['customer']=$customername;
    $PortalUser['PortalUser']['login']=$login;
    if ($this->request->is('ajax'))
    {
        $this->PortalUser->addPortalUserAdmin($PortalUser);
        $this->Flash->success('Portal User Add!',array('key' => 'positive'));
        echo $PortalUser_id = $this->PortalUser->getInsertID();
        // $this->set('user', $user);
    }    
    exit();
}



////////////////////////////////////////////////////////////////////

public function userlogin()
{
    $this->layout="subscription";
    $this->set('title','Portal User Login');
    //$this->layout = false;
    $this->layout = 'portaluser';
    if($this->request->is('post'))
    {        
        $PortalUser = $this->request->data;
        $username = $PortalUser['PortalUser']['username'];
        $password = $PortalUser['PortalUser']['password'];

        //pr($PortalUser); die();
        $User = $this->PortalUser->query("SELECT * FROM portal_users WHERE login='$username' and password='$password'");
        //pr($User);

        if (!empty($User)) {
 
            foreach ($User as $user) {
                        $user_id = $user['portal_users']['user_id'];
                    }  
            $this->Session->write('PortalUser.user_id', $user_id);
            $this->Flash->success('Portal User Login!', array('key' => 'positive'));       
            return $this->redirect(array('controller'=>'PortalUsers','action'=>'myprofile'));  
        } else {
            $this->Flash->failure('Sorry, invalid credentials!', array('key' => 'positive'));       
            return $this->redirect(array('controller'=>'PortalUsers','action'=>'userlogin'));  
        }
        
    }
}


////////////////////////////////////////////////////////////////////

public function userlogout()
{
    $this->layout="subscription";
    $this->set('title','Portal User Logout'); 
    $this->Session->delete('PortalUser.user_id');   
    $this->Flash->success('Signed out!', array('key' => 'positive'));       
    return $this->redirect(array('controller'=>'PortalUsers','action'=>'userlogin'));  
}
////////////////////////////////////////////////////////////////////

public function myprofile()
{
    $this->layout="subscription";
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $userDetail = $this->User->findUserbyId($id);
    $invoice = $this->Invoice->findInvoicebyUserId($id);
    $ticket = $this->Ticket->findTicketbyUserId($id);
    $estimate = $this->Estimate->findEstimatebyUserId($id);
    $attachment = $this->Attachment->findAttachmentbyUserId($id);
    $assets = $this->AssetFieldValue->findallAssetFieldValueByUserId($id);
    //pr($PortalUser);   die();

    $this->set(compact('userDetail','invoice','ticket','estimate','attachment','assets'));
}



/////////////////////////////////////////////////////////////////////

public function addnewticket() 
{
    $this->layout="subscription";
    if($this->request->is('post')){

        $Ticket=$this->request->data;
        //pr($Ticket);die();
        $save = $this->Ticket->addTicketAdmin($Ticket);
        $Ticket_id = $this->Ticket->getInsertID();
        $this->Flash->success('Ticket added Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "PortalUsers","action" => "userticketdetail",$Ticket_id));

    }   
}


////////////////////////////////////////////////////////////////////

public function userticketdetail($ticket_id)
{
    $this->layout="subscription";
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $user = $this->User->findUserbyId($id);
    $ticket = $this->Ticket->findTicketbyId($ticket_id);
    $comment = $this->Comment->findCommentbyTicketId($ticket_id);
    $attachment = $this->Attachment->findAttachmentbyTicketId($ticket_id);
    $AssetValue = $this->AssetFieldValue->findallAssetFieldValueByTicketId($ticket_id);
    $CustomFieldValue = $this->CustomFieldValue->findallCustomFieldValueByTicketId($ticket_id);
    //pr($CustomFieldValue);die();
    //pr($attachment);   die();

    $this->set(compact('user','ticket','comment','attachment','AssetValue','CustomFieldValue'));
}


////////////////////////////////////////////////////////////////////

public function userticketlist()
{
    $this->layout="subscription";
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $userDetail = $this->User->findUserbyId($id);
    $ticket = $this->Ticket->findTicketbyUserId($id);
    //pr($ticket);   die();

    $this->set(compact('userDetail','ticket'));
}



//////////////////////////////////////////////////////////////////////////


public function attachment()
{
    
    $this->layout="subscription";    
    if ($this->request->is(['post','put'])) 
    {
        $data= $this->request->data;
        //pr($data);die();
        $attachment = $this->data['attachment'];
        $name = $this->data['attachment']['file']['name'];
        $ticket_id = $this->data['attachment']['ticket_id'];
        $status = $this->data['attachment']['status'];
        //$lead_id = $this->data['Lead']['lead_id'];
      //  echo "<pre>";print_r($name);
       // echo "<pre>";print_r($data);
        $upload_dir = "img/attachment/";

        if(!empty($name)){

             $file = $this->data['attachment']['file'];
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
                move_uploaded_file($this->data['attachment']['file']["tmp_name"], $upload_dir .$aa);

        } 

        if ($this->Attachment->addAttachmentAdmin($data)) {

            $attachment_id = $this->Attachment->getInsertID();
            $this->Attachment->updateAll(array('ticket_id' => "'$ticket_id'",'file'=>"'$aa'",'status'=>"'$status'"),array('id' => $attachment_id));
            $this->Flash->success('File Attech Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "PortalUsers","action" => "userticketdetail",$ticket_id));  
 
        } else {
            $this->Flash->success('File Not be Attech', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "PortalUsers","action" => "userticketdetail",$ticket_id));  
 
        }

    }    




}

////////////////////////////////////////////////////////////////////

public function userinvoicedetail($inv_id)
{
    $this->layout="subscription";
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $user = $this->User->findUserbyId($id);
    $invoice = $this->Invoice->findInvoicebyId($inv_id);
    $sale = $this->Sale-> findSalebyInvoiceId($inv_id);
    //pr($sale);   die();
    $this->set(compact('user','invoice','sale'));
}

////////////////////////////////////////////////////////////////////


public function userinvoicelist()
{
    $this->layout="subscription";
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $userDetail = $this->User->findUserbyId($id);
    $invoice = $this->Invoice->findInvoicebyUserId($id);
    //pr($ticket);   die();

    $this->set(compact('userDetail','invoice'));
}


////////////////////////////////////////////////////////////////////

public function userestimatedetail($est_id)
{
    $this->layout="subscription";
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $user = $this->User->findUserbyId($id);
    $Estimates = $this->Estimate->findEstimatebyId($est_id);
    $Inventory = $this->Inventory->findInventorybyEstimateId($est_id);
   
    //pr($Estimates);   die();
    $this->set(compact('user','Estimates','Inventory'));
}

////////////////////////////////////////////////////////////////////


public function userassetslist()
{
    $this->layout="subscription";
    $this->layout = 'portaluser';
    $id = $this->Session->read('PortalUser.user_id');
    $userDetail = $this->User->findUserbyId($id);
    $assets = $this->AssetFieldValue->findallAssetFieldValueByUserId($id);
    
    //pr($assets);   die();

    $this->set(compact('userDetail','assets'));
}

//////////////////////////////////////////////////////////////////////


public function updatepassword()
{
    $this->layout="subscription";
    $password =$this->request->data('password');
    $confirm_password =$this->request->data('confirm_password');
    $portaluser_id =$this->request->data('portaluser_id');
    if ($this->request->is('ajax'))
    {
        $this->PortalUser->updateAll(array('password' => "'$password'",'confirm_password' => "'$confirm_password'"),array('id' => $portaluser_id));
    }
    exit();
}

/////////////////////////////////////////////////////////////////////


public function updatelogin()
{
    $this->layout="subscription";
    $login =$this->request->data('login');
    $portaluser_id =$this->request->data('portaluser_id');
    if ($this->request->is('ajax'))
    {
        $this->PortalUser->updateAll(array('login' => "'$login'"),array('id' => $portaluser_id));
    }
    exit();
}


//////////////////////////////////////////////////////////////////////


public function updatecustomer()
{
    $this->layout="subscription";
    $customer =$this->request->data('customer');
    $portaluser_id =$this->request->data('portaluser_id');
    if ($this->request->is('ajax'))
    {
        $this->PortalUser->updateAll(array('customer' => "'$customer'"),array('id' => $portaluser_id));
    }
    exit();
}




//////////////////////////////////////////////////////////////////////


public function estimatepdfmodal()
{
    $this->layout="subscription";
    $id =$this->request->data('id');
   
    if ($this->request->is('ajax'))
    {
        $Estimates = $this->Estimate->findEstimatebyId($id);
        $user_id = $Estimates["Estimate"]["user_id"];
        $Inventory = $this->Inventory->findInventorybyEstimateId($id);
        $user = $this->User->findUserbyId($user_id);
        //pr($Estimates);pr($Inventory);pr($user);
        $this->set(compact('Estimates','user','Inventory'));
        
    }
}


public function estimatepdfmodal1()
{
    $this->layout="subscription";
    $id =$this->request->data('id');
   
    if ($this->request->is('ajax'))
    {
        $Estimates = $this->Estimate->findEstimatebyId($id);
        $user_id = $Estimates["Estimate"]["user_id"];
        $Inventory = $this->Inventory->findInventorybyEstimateId($id);
        $user = $this->User->findUserbyId($user_id);
        $data = array_merge($Estimates,$Inventory,$user);
        echo json_encode($data);
       // pr($data);
        //pr($Estimates);pr($Inventory);pr($user);
        //$this->set(compact('Estimates','user','Inventory'));
        
    }
    exit();
}

//////////////////////////////////////////////////////////////////////////


}