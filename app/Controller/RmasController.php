<?php
App::uses('AppController', 'Controller');

class RmasController extends AppController {

public $uses = array('Rma','Product','User','Rma','Inventory','Ticket','Vendor');


public function admin_add() 
{
    $this->set('title','Add Rma');
    $Vendor = $this->Vendor->findallVendorName();
    if($this->request->is('post'))
    {
        $Rma=$this->request->data;
        $name=$Rma['Rma']['customer_name'];
        $user = explode(" ", $name);
       

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  and email='$user[3]' ");
            foreach($user as $users) {
            $user_id = $users['users']['id'];           
            }
           
    
            if(empty($user))
            {
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $Rma_id));

                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                      
            }
            else
            {
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $Rma_id));
                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));   

            }  
        }
        elseif(!empty($user[2]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[2]'  and email = '$user[2]'");
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];          
            }
            if(empty($user))
            {
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $Rma_id));

                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
               
            }
            else{
               $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $Rma_id));
                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));   

                
            }   

        }
        elseif(!empty($user[1]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[1]'  and email = '$user[1]'");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            }
            if(empty($user))
            {
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $Rma_id));

                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                
            }
            else{

                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $Rma_id));
                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));   

                
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
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $Rma_id));

                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                
            }
            else{
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $Rma_id));
                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));   

               
            }  

        }
    }
    $this->set(compact('Vendor'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_rmaedit($id){
    $this->set('title','Edit Rma');
    $Vendor = $this->Vendor->findallVendorName();
    $Rma= $this->Rma->findRmabyId($id); // Get Rma Detail from id
   
    if($this->request->is('post'))
    {
        $Rma=$this->request->data;
        $name=$Rma['Rma']['customer_name'];
        $user = explode(" ", $name);
       

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' or last_name='$user[1]' or business_name='$user[2]'  or email='$user[3]' ");
            foreach($user as $users) {
            $user_id = $users['users']['id'];           
            }
           
    
            if(empty($user))
            {
                $this->Rma->editRmabyId($Rma,$id); 
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                      
            }
            else
            {
                $this->Rma->editRmabyId($Rma,$id);
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));   

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
                $this->Rma->editRmabyId($Rma,$id); 
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                      
               
            }
            else{
                $this->Rma->editRmabyId($Rma,$id);
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));  

                
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
               $this->Rma->editRmabyId($Rma,$id); 
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                      
                
            }
            else{

                 $this->Rma->editRmabyId($Rma,$id);
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist")); 

                
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
                $this->Rma->editRmabyId($Rma,$id); 
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                      
                
            }
            else{
                 $this->Rma->editRmabyId($Rma,$id);
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));  

               
            }  

        }
    }

    $this->data = $Rma ;
    $this->set(compact('Rma','Vendor'));

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deleteRma($id){
    $this->Rma->deleteRma($id);
    $this->Flash->success('Rma Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Rmas','action'=>'rmalist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_rmalist()
{

    $Rma = $this->Rma->allRmas();

    foreach ($Rma as $key => $rma) {
        //pr($rma);die();
        $vendor_id = $rma['Rma']['vendor_id'];
        $vendor = $this->Vendor->findallVendorNameById($vendor_id);

        $Rma[$key]['vendor'] = $vendor;

    }
    $this->set(compact('Rma'));

   //echo "<pre>";print_r($Rma); die();

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_rmadetails($id) {
    $this->set('title','Rma List'); 

    $Rmas = $this->Rma->findRmabyId($id);
  
    $this->set('Rmas', $Rmas);
    

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Rmaview($id){
$this->set('title','Profile');
    $Rma = $this->Rma->findRmabyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Rma->editRmabyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Rmas','action'=>'Rmaview'));
    }
  //  $this->data = $Rma ; 
    $this->set('Rma', $Rma);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_rma()
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
    $rma_id =$this->request->data('rma_id');
    if ($this->request->is('ajax'))
    {
       
        $this->Rma->updateAll(array('status' => "'$status'"),array('id' => $rma_id));
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
    $this->layout = "frontenduser";
    $this->set('title','Add Rma');
    $session_id = $this->Auth->user('id');
    $Vendor = $this->Vendor->findallVendorNameByLoginId($session_id);
    if($this->request->is('post'))
    {
        $Rma=$this->request->data;
        $name=$Rma['Rma']['customer_name'];
        $user = explode(" ", $name);
       

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  and email='$user[3]' ");
            foreach($user as $users) {
            $user_id = $users['users']['id'];           
            }
           
    
            if(empty($user))
            {
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $Rma_id));

                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                      
            }
            else
            {
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $Rma_id));
                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));   

            }  
        }
        elseif(!empty($user[2]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[2]'  and email = '$user[2]'");
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];          
            }
            if(empty($user))
            {
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $Rma_id));

                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
               
            }
            else{
               $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $Rma_id));
                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));   

                
            }   

        }
        elseif(!empty($user[1]))
        {
            
            $user = $this->User->query("SELECT * FROM users where first_name  = '$user[0]' and last_name = '$user[1]' and business_name = '$user[1]'  and email = '$user[1]'");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
            $user_id = $users['users']['id'];
            }
            if(empty($user))
            {
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $Rma_id));

                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                
            }
            else{

                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $Rma_id));
                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));   

                
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
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $Rma_id));

                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                
            }
            else{
                $save = $this->Rma->addRmaAdmin($Rma);
                $Rma_id = $this->Rma->getInsertID();
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $Rma_id));
                $this->Flash->success('Rma added Successfully', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));   

               
            }  

        }
    }
    $this->set(compact('Vendor'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function rmaedit($id){
    $this->layout = "frontenduser";
    $this->set('title','Edit Rma');
    $session_id = $this->Auth->user('id');
    $Vendor = $this->Vendor->findallVendorNameByLoginId($session_id);
    $Rma= $this->Rma->findRmabyId($id); // Get Rma Detail from id
   
    if($this->request->is('post'))
    {
        $Rma=$this->request->data;
        $name=$Rma['Rma']['customer_name'];
        $user = explode(" ", $name);
       

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' or last_name='$user[1]' or business_name='$user[2]'  or email='$user[3]' ");
            foreach($user as $users) {
            $user_id = $users['users']['id'];           
            }
           
    
            if(empty($user))
            {
                $this->Rma->editRmabyId($Rma,$id); 
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                      
            }
            else
            {
                $this->Rma->editRmabyId($Rma,$id);
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));   

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
                $this->Rma->editRmabyId($Rma,$id); 
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                      
               
            }
            else{
                $this->Rma->editRmabyId($Rma,$id);
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));  

                
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
               $this->Rma->editRmabyId($Rma,$id); 
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                      
                
            }
            else{

                 $this->Rma->editRmabyId($Rma,$id);
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist")); 

                
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
                $this->Rma->editRmabyId($Rma,$id); 
                
                $this->Rma->updateAll(array('customer_name' => "''"),array('id' => $id));

                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));   

                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));
                      
                
            }
            else{
                 $this->Rma->editRmabyId($Rma,$id);
                $this->Rma->updateAll(array('user_id' => "'$user_id'"),array('id' => $id));
                $this->Flash->success('Successfully Edited Rma', array('key' => 'positive'));
                $this->redirect(array("controller" => "Rmas","action" => "rmalist"));  

               
            }  

        }
    }

    $this->data = $Rma ;
    $this->set(compact('Rma','Vendor'));

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteRma($id){
    $this->layout = "frontenduser";
    $this->Rma->deleteRma($id);
    $this->Flash->success('Rma Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Rmas','action'=>'rmalist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function rmalist()
{

    $this->layout = "frontenduser";
    $session_id = $this->Auth->user('id');
    $Rma = $this->Rma->findallRmabyLoginId($session_id);

    foreach ($Rma as $key => $rma) {
        //pr($rma);die();
        $vendor_id = $rma['Rma']['vendor_id'];
        $vendor = $this->Vendor->findallVendorNameById($vendor_id);

        $Rma[$key]['vendor'] = $vendor;

    }
    $this->set(compact('Rma'));

   //echo "<pre>";print_r($Rma); die();

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function rmadetails($id) {
    $this->layout = "frontenduser";
    $this->set('title','Rma List'); 

    $Rmas = $this->Rma->findRmabyId($id);
    $vendor_id = $Rmas['Rma']['vendor_id'];
   
    $Vendor_name = $this->Vendor->findallVendorNameById($vendor_id);
    //pr($Rmas);    pr($Vendor_name);    die();
    
    $this->set(compact('Rmas','Vendor_name'));

        
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Rmaview($id){
    $this->layout = "frontenduser";
$this->set('title','Profile');
    $Rma = $this->Rma->findRmabyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Rma->editRmabyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Rmas','action'=>'Rmaview'));
    }
  //  $this->data = $Rma ; 
    $this->set('Rma', $Rma);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function rma()
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


public function statusupdate()
{
    $this->layout = "frontenduser";
    $status =$this->request->data('status');
    $rma_id =$this->request->data('rma_id');
    if ($this->request->is('ajax'))
    {
       
        $this->Rma->updateAll(array('status' => "'$status'"),array('id' => $rma_id));
    }
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////
}