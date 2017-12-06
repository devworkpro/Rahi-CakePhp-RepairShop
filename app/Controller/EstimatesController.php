<?php
App::uses('AppController', 'Controller');
class EstimatesController extends AppController {

public $uses = array('Estimate','Product','User','Invoice','Inventory','Ticket','Phone','Comment','Log','Sale','Disclaimer','Template','TransferLocation','Multilocation');


public function admin_add() 
{
   $this->set('title','Add Estimate');
     
    if($this->request->is('post'))
    {
        $Estimates=$this->request->data;
        $changes = json_encode($Estimates);
        $name=$Estimates['Estimate']['name'];
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
                $save = $this->Estimate->addEstimateAdmin($Estimates);
                $Estimate_id = $this->Estimate->getInsertID();
                $logs['changes']=$changes;
                $logs['estimate_id']=$Estimate_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);

                $this->Estimate->query("Update estimates set  user_id = $user_id  where id = $Estimate_id");
                $this->Flash->success('Estimate added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Estimates","action" => "estimatedetails",$user_id,$Estimate_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[2]'  and email = '$user[2]'");
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
                $save = $this->Estimate->addEstimateAdmin($Estimates);
                $Estimate_id = $this->Estimate->getInsertID();
                $logs['changes']=$changes;
                $logs['estimate_id']=$Estimate_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Estimate->query("Update estimates set  user_id = $user_id  where id = $Estimate_id");
                $this->Flash->success('Estimate added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Estimates","action" => "estimatedetails",$user_id,$Estimate_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[1]'  and email = '$user[1]'");
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

                $save = $this->Estimate->addEstimateAdmin($Estimates);
                $Estimate_id = $this->Estimate->getInsertID();
                $logs['changes']=$changes;
                $logs['estimate_id']=$Estimate_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Estimate->query("Update estimates set  user_id = $user_id  where id = $Estimate_id");
                $this->Flash->success('Estimate added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Estimates","action" => "estimatedetails",$user_id,$Estimate_id));
                
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
                $save = $this->Estimate->addEstimateAdmin($Estimates);
                $Estimate_id = $this->Estimate->getInsertID();
                $logs['changes']=$changes;
                $logs['estimate_id']=$Estimate_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Estimate->query("Update estimates set  user_id = $user_id  where id = $Estimate_id");
                $this->Flash->success('Estimate added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Estimates","action" => "estimatedetails",$user_id,$Estimate_id));
               
            }  

        }
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_editingestimate($id){
    $this->set('title','Edit Estimate');

    $Estimate= $this->Estimate->findEstimatebyId($id); // Get Estimate Detail from id
    //pr($Estimate);
    $user_id = $Estimate['Estimate']['user_id'];
    $Tickets= $this->Ticket->findTicketNameIdbyUserId($user_id);
    $Invoices= $this->Invoice->findInvoiceIdbyUserId($user_id);
    //pr($Invoices);  die();
    $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        $changes = json_encode($this->request->data);
        //pr($this->request->data); die();
                        
        $this->Estimate->editEstimatebyId($this->request->data,$id); // Edit Estimate
        $logs['changes']=$changes;
        $logs['estimate_id']=$id;
        $logs['edit']="edit";
        $logs['employee']=$this->Session->read('Auth.User.email');
        $saveLog = $this->Log->addLog($logs);
        $this->Flash->success('Successfully Edited Estimate', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));

        

    }
    $this->data = $Estimate ;
    $this->set(compact('Estimate'));
    $this->set(compact('product'));
    $this->set(compact('Tickets'));
    $this->set(compact('Invoices'));
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deleteestimate($id){
    $this->Estimate->deleteEstimate($id);
    $this->Flash->success('Estimate Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_estimatelist()
{
    $this->set('title','Estimate List');
    

    $Estimates = $this->Estimate->allEstimates();
    $this->set('Estimates', $Estimates);
    //print_r('products');
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_estimatedetails($user_id,$inv_id) {
    $this->set('title','Estimate List');
    

    $Estimates = $this->Estimate->findEstimatebyId($inv_id);
    $ticket_id = $Estimates["Estimate"]["ticket_id"];
    $user = $this->User->findUserbyId($user_id);
    $Inventory = $this->Inventory->findInventorybyEstimateId($inv_id);
    $Ticket = $this->Ticket->findTicketbyId($ticket_id);
    $comment = $this->Comment->findCommentbyTicketId($ticket_id);
    $logs = $this->Log->findLogByEstimateId($inv_id);
    //$Inventory = $this->Inventory->findInventorybyProductId($inv_id);
    //Product
    //pr($logs); die();
    $phone = $this->Phone->findbyUserid($user_id);
    $this->set(compact('Estimates','user','Inventory','phone','Ticket','comment','logs'));
    
    

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_estimateview($id){
$this->set('title','Profile');
    $Estimate = $this->Estimate->findEstimatebyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Estimate->editEstimatebyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Estimates','action'=>'Estimateview'));
    }
  //  $this->data = $Estimate ; 
    $this->set('Estimate', $Estimate);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_estimate()
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
        $user = $this->Estimate->query("Update estimates set  status = '1'  where id = $data");
    }
    exit();
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_unapprove()
{
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Estimate->query("Update estimates set  status = '0'  where id = $data");
    }
    exit();
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_decline()
{
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Estimate->query("Update estimates set  decline = '1'  where id = $data");
    }
    exit();
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_undodecline()
{
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Estimate->query("Update estimates set  decline = '0'  where id = $data");
    }
    exit();
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


public function admin_inventoryupdateqty()
{

    $qty =$this->request->data('qty');
    $inv_id =$this->request->data('inv_id');
  
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Inventory->updateAll(array('quantity' => "'$qty'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
   exit();     
  

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_inventoryupdatedes()
{

    $des =$this->request->data('des');
    $inv_id =$this->request->data('inv_id');
  
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Inventory->updateAll(array('description' => "'$des'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
   exit();     
  

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_inventoryupdateitem()
{

    $item =$this->request->data('item');
    $inv_id =$this->request->data('inv_id');
  
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Inventory->updateAll(array('item' => "'$item'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
   exit();     
  

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_inventoryupdaterate()
{

    $rt =$this->request->data('rt');
    $inv_id =$this->request->data('inv_id');
  
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Inventory->updateAll(array('rate' => "'$rt'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
   exit();     
  

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_updateestimate()
{

    $total =$this->request->data('total');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Estimate->updateAll(array('total' => "'$total'"),array('id' => $est_id));
       // $this->set('user', $user);
    }
    exit();
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_updateestimateitem()
{

    $item =$this->request->data('item');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Estimate->updateAll(array('item' => "'$item'"),array('id' => $est_id));
       // $this->set('user', $user);
        

    }
    exit();
        
  

}




/////////////////////////////////////////////////////////////////////////

public function admin_addsignature(){
   
    if($this->request->is('post'))
    {        
        $estimate = $this->request->data;
        //pr($invoice);die();
        $estimate_id = $estimate['estimate']['estimate_id'];
        $user_id = $estimate['estimate']['user_id'];
        $signature = $estimate['estimate']['signature'];
        $this->Estimate->updateAll(array('signature' => "'$signature'"),array('id' => $estimate_id));
        $this->Flash->success('Add Signature Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function admin_clearsignature($user_id,$estimate_id){
   
        $this->Estimate->updateAll(array('signature' => "''"),array('id' => $estimate_id));
        $this->Flash->success('Signature Clear Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
    
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
    $this->set('title','Add Estimate');
     
    if($this->request->is('post'))
    {
        $Estimates=$this->request->data;
        $changes = json_encode($Estimates);
        $name=$Estimates['Estimate']['name'];
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
                $save = $this->Estimate->addEstimateAdmin($Estimates);
                $Estimate_id = $this->Estimate->getInsertID();
                $logs['changes']=$changes;
                $logs['estimate_id']=$Estimate_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);

                $this->Estimate->query("Update estimates set  user_id = $user_id  where id = $Estimate_id");
                $this->Flash->success('Estimate added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Estimates","action" => "estimatedetails",$user_id,$Estimate_id));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[2]'  and email = '$user[2]'");
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
                $save = $this->Estimate->addEstimateAdmin($Estimates);
                $Estimate_id = $this->Estimate->getInsertID();
                $logs['changes']=$changes;
                $logs['estimate_id']=$Estimate_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Estimate->query("Update estimates set  user_id = $user_id  where id = $Estimate_id");
                $this->Flash->success('Estimate added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Estimates","action" => "estimatedetails",$user_id,$Estimate_id));
                
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[1]'  and email = '$user[1]'");
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

                $save = $this->Estimate->addEstimateAdmin($Estimates);
                $Estimate_id = $this->Estimate->getInsertID();
                $logs['changes']=$changes;
                $logs['estimate_id']=$Estimate_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Estimate->query("Update estimates set  user_id = $user_id  where id = $Estimate_id");
                $this->Flash->success('Estimate added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Estimates","action" => "estimatedetails",$user_id,$Estimate_id));
                
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
                $save = $this->Estimate->addEstimateAdmin($Estimates);
                $Estimate_id = $this->Estimate->getInsertID();
                $logs['changes']=$changes;
                $logs['estimate_id']=$Estimate_id;
                $logs['employee']=$this->Session->read('Auth.User.email');
                $saveLog = $this->Log->addLog($logs);
                $this->Estimate->query("Update estimates set  user_id = $user_id  where id = $Estimate_id");
                $this->Flash->success('Estimate added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Estimates","action" => "estimatedetails",$user_id,$Estimate_id));
               
            }  

        }
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function editingestimate($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Edit Estimate');

    $Estimate= $this->Estimate->findEstimatebyId($id); // Get Estimate Detail from id
    //pr($Estimate);
    $user_id = $Estimate['Estimate']['user_id'];
    $Tickets= $this->Ticket->findTicketNameIdbyUserId($user_id);
    $Invoices= $this->Invoice->findInvoiceIdbyUserId($user_id);
    //pr($Invoices);  die();
    $product=$this->Product->find('list',array('fields'=>array('product_name')));
   
    if($this->request->is('post'))
    { 
        $changes = json_encode($this->request->data);
        $estimate = $this->request->data;
        $ticket_id = $estimate['Estimate']['ticket_id'];
        if($ticket_id!='')
        {
            $this->Ticket->updateAll(array('estimate_id' => "'$id'"),array('id' => $ticket_id));
        }
        //pr($estimate); die();
                        
        $this->Estimate->editEstimatebyId($this->request->data,$id); // Edit Estimate
        $logs['changes']=$changes;
        $logs['estimate_id']=$id;
        $logs['edit']="edit";
        $logs['employee']=$this->Session->read('Auth.User.email');
        $saveLog = $this->Log->addLog($logs);
        $this->Flash->success('Successfully Edited Estimate', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));

        

    }
    $this->data = $Estimate ;
    $this->set(compact('Estimate'));
    $this->set(compact('product'));
    $this->set(compact('Tickets'));
    $this->set(compact('Invoices'));
    }else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}





///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteestimate($id){
    $this->layout = "frontenduser";
    $this->Estimate->deleteEstimate($id);
    $this->Flash->success('Estimate Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Estimates','action'=>'estimatelist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function estimatelist()
{   
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Estimate List');
    $session_id = $this->Session->read('Auth.User.id');

    $Estimates = $this->Estimate->findAllEstimatesByLoginID($session_id);
    $this->set('Estimates', $Estimates);
    //print_r('products');
    }else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function estimatedetails($user_id,$inv_id) {
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Estimate List');
    
    $session_id = $this->Auth->user('id');
    $Estimates = $this->Estimate->findEstimatebyId($inv_id);
    $ticket_id = $Estimates["Estimate"]["ticket_id"];
    $user = $this->User->findUserbyId($user_id);
    $Inventory = $this->Inventory->findInventorybyEstimateId($inv_id);
    $Ticket = $this->Ticket->findTicketbyId($ticket_id);
    $comment = $this->Comment->findCommentbyTicketId($ticket_id);
    $logs = $this->Log->findLogByEstimateId($inv_id);
    //$Inventory = $this->Inventory->findInventorybyProductId($inv_id);
    $Disclaimer = $this->Disclaimer->findEstimateDisclaimerByUserId($session_id);
    $Login_user = $this->User->findUserbyId($session_id);
    $Estimate_Template = $this->Template->findEstimateTemplateByUserId($session_id);
    //pr($Estimate_Template); die();
    $phone = $this->Phone->findbyUserid($user_id);

    $TransferLocation = $this->TransferLocation->findTransferLocationByUserId($session_id);
    $Location = array();
    if(!empty($TransferLocation))
    {
        $TransferLocationName = $TransferLocation['TransferLocation']['to_estimate'];
        $Location = $this->Multilocation->findMultilocationByUserIdAndName($session_id,$TransferLocationName);
        //pr($Location);die();
    }

    $this->set(compact('Estimates','user','Inventory','phone','Ticket','comment','logs','Disclaimer','Login_user','Estimate_Template','Location'));
    }else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
    
            
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function convertestimatetoinvoice($est_id) {
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Estimate List');
    

    $Estimate = $this->Estimate->findEstimatebyId($est_id);
    $user_id = $Estimate["Estimate"]["user_id"];
    $ticket_id = $Estimate["Estimate"]["ticket_id"];
    $user = $this->User->findUserbyId($user_id);
    $Inventory = $this->Inventory->findInventorybyEstimateId($est_id);
    $Ticket = $this->Ticket->findTicketbyId($ticket_id);
    $comment = $this->Comment->findCommentbyTicketId($ticket_id);
    $logs = $this->Log->findLogByEstimateId($est_id);
    //$Inventory = $this->Inventory->findInventorybyProductId($inv_id);
    //Product
    //echo "Estimate";pr($Estimate);
    //echo "user";pr($user);
    //echo "Ticket";pr($Ticket);
    //echo "Inventory";pr($Inventory); 
    //echo "comment";pr($comment);die();

    if(!empty($Estimate))
    {
       // pr($Estimate);
        $inv['Invoice']['inv_number'] = rand(10,10000);
        $inv['Invoice']['user_id']    = $Estimate['Estimate']['user_id'];
        $inv['Invoice']['ticket_id']  = $Estimate['Estimate']['ticket_id'];
        $inv['Invoice']['login_id']   = $Estimate['Estimate']['login_id'];
        $inv['Invoice']['name']       = $Estimate['Estimate']['name'];
        $inv['Invoice']['item']       = $Estimate['Estimate']['item'];
        $inv['Invoice']['total']      = $Estimate['Estimate']['total'];
        $inv['Invoice']['created_by'] = $Estimate['Estimate']['created_by'];
    
        $save = $this->Invoice->addInvoiceAdmin($inv);
        $invoice_id = $this->Invoice->getInsertID();
        
        if(!empty($Inventory))
        {
            foreach ($Inventory as $value) {
                
                $user_id = $value['Inventory']['user_id'];
                $pro_id = $value['Inventory']['product_id'];
                $invoice_id = $invoice_id;
                $product_name = $value['Inventory']['item'];
                $description = $value['Inventory']['description'];
                $upc_code = $value['Inventory']['upc_code'];
                $rate = $value['Inventory']['rate'];
                $cost = $value['Inventory']['cost'];
                $quantity = $value['Inventory']['quantity'];
               //pr($sale);die();
               //$save = $this->Sale->addSaleAdmin($sale);
                $user = $this->Sale->query("INSERT INTO sales (user_id,product_id,invoice_id,item,description,upc_code,rate,cost,quantity) VALUES ('$user_id','$pro_id','$invoice_id','$product_name','$description','$upc_code','$rate','$cost','$quantity')");
               //$this->Sale->save($sa);
               //echo $this->Sale->getInsertID();
                //die();
            }
        }
        $this->Flash->success('Estimate Successfully Converted', array('key' => 'positive'));
    
        return $this->redirect(array('controller'=>'Invoices','action'=>'invoicedetails',$invoice_id));
    }
    
    
   // die();
    }else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function estimateview($id){
if($this->Auth->user('id')!='')
{
    $this->layout = "frontenduser";
    $this->set('title','Profile');
    $Estimate = $this->Estimate->findEstimatebyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Estimate->editEstimatebyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Estimates','action'=>'Estimateview'));
    }
  //  $this->data = $Estimate ; 
    $this->set('Estimate', $Estimate);
}else{
    $this->layout = false;
    $this->render('/Elements/404');
}
    
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function estimate()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Auth->user('id');
    
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where login_id = $session_id AND (first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%') AND role != 'staff'");
    
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
        $user = $this->Estimate->query("Update estimates set  status = '1'  where id = $data");
    }
    exit();
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function unapprove()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Estimate->query("Update estimates set  status = '0'  where id = $data");
    }
    exit();
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function decline()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Estimate->query("Update estimates set  decline = '1'  where id = $data");
    }
    exit();
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function undodecline()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Estimate->query("Update estimates set  decline = '0'  where id = $data");
    }
    exit();
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function inventory()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Auth->user('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where login_id = $session_id AND product_name  like '%$data%'");
    
        $this->set('user', $user);
        
    }
        
  

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function inventoryupc_code()
{
    $this->layout = "frontenduser";
    $data =$this->request->data('search');
    $session_id = $this->Auth->user('id');
    if ($this->request->is('ajax'))
    {
        $user = $this->Product->query("SELECT * FROM products where login_id = $session_id AND upc_code  like '%$data%'");
    
        $this->set('user', $user);
        
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function inventoryupdateqty()
{
    $this->layout = "frontenduser";
    $qty =$this->request->data('qty');
    $inv_id =$this->request->data('inv_id');
  
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Inventory->updateAll(array('quantity' => "'$qty'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
   exit();     
  

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function inventoryupdatedes()
{
    $this->layout = "frontenduser";
    $des =$this->request->data('des');
    $inv_id =$this->request->data('inv_id');
  
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Inventory->updateAll(array('description' => "'$des'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
   exit();     
  

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function inventoryupdateitem()
{
    $this->layout = "frontenduser";
    $item =$this->request->data('item');
    $inv_id =$this->request->data('inv_id');
  
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Inventory->updateAll(array('item' => "'$item'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
   exit();     
  

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function inventoryupdaterate()
{
    $this->layout = "frontenduser";
    $rt =$this->request->data('rt');
    $inv_id =$this->request->data('inv_id');
  
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Inventory->updateAll(array('rate' => "'$rt'"),array('id' => $inv_id));
       // $this->set('user', $user);
        

   }
   exit();     
  

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function updateestimate()
{
    $this->layout = "frontenduser";
    $total =$this->request->data('total');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Estimate->updateAll(array('total' => "'$total'"),array('id' => $est_id));
       // $this->set('user', $user);
    }
    exit();
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function updateestimateitem()
{
    $this->layout = "frontenduser";
    $item =$this->request->data('item');
    $est_id =$this->request->data('est_id');
    if ($this->request->is('ajax'))
    {
       // $user = $this->Inventory->query("Update inventories set  quantity = '$qty'  where id = $inv_id");die();
        $this->Estimate->updateAll(array('item' => "'$item'"),array('id' => $est_id));
       // $this->set('user', $user);
        

    }
    exit();
        
  

}




/////////////////////////////////////////////////////////////////////////

public function addsignature(){
    $this->layout = "frontenduser";
    if($this->request->is('post'))
    {        
        $estimate = $this->request->data;
        //pr($invoice);die();
        $estimate_id = $estimate['estimate']['estimate_id'];
        $user_id = $estimate['estimate']['user_id'];
        $signature = $estimate['estimate']['signature'];
        $this->Estimate->updateAll(array('signature' => "'$signature'"),array('id' => $estimate_id));
        $this->Flash->success('Add Signature Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
    }
    
}

//////////////////////////////////////////////////////////////////////////

public function clearsignature($user_id,$estimate_id){
        $this->layout = "frontenduser";
        $this->Estimate->updateAll(array('signature' => "''"),array('id' => $estimate_id));
        $this->Flash->success('Signature Clear Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Estimates','action'=>'estimatedetails',$user_id,$estimate_id));
    
}











/////////////////////////////////////////////////////////////////////////////////////////////////////////
}
