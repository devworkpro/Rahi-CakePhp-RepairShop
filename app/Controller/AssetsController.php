<?php
App::uses('AppController', 'Controller');
class AssetsController extends AppController {

public $uses = array('Asset','AssetField','AssetFieldValue','Product','User','Invoice','Inventory','Ticket','Phone','Lead');


public function admin_add() 
{
   $this->set('title','Add Asset');
     
    if($this->request->is('post'))
    {
        $Assets=$this->request->data;
        $name=$Assets['Assets']['name'];
        $user = explode(" ", $name);
  //  $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[2]%'  or email like '%$user[3]%'");
    
  //pr($Assets);

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name = '$user[1]' and business_name='$user[2]'  and email='$user[3]' ");
            foreach($user as $users) {
            //pr($users);die();    
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
                $this->redirect(array("controller" => "Assets","action" => "newasset",'?' => array('user_id' => $user_id)));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  or email='$user[2]'");
            $this->set('user', $user);
            foreach($user as $users) {
               // pr($users);die();  
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
                $this->redirect(array("controller" => "Assets","action" => "newasset",'?' => array('user_id' => $user_id)));   
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' or business_name='$user[1]'  or email='$user[1]'");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
               // pr($users);die();  
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
                $this->redirect(array("controller" => "Assets","action" => "newasset",'?' => array('user_id' => $user_id)));   
            }  

        }
        else
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
          foreach($user as $users) {
            //pr($users);die();  
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
                $this->redirect(array("controller" => "Assets","action" => "newasset",'?' => array('user_id' => $user_id)));   
            }  

        }
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_new(){
    $this->set('title','New Asset');
    if($this->request->is('post'))
    {      
        $Asset = $this->request->data;  
        //pr($this->request->data); die();
        $this->Asset->addAssetAdmin($Asset); // Add Assets
        $Asset_id = $this->Asset->getInsertID();
        $this->Flash->success('Asset Type Save Successfully ', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Assets','action'=>'assettypes'));
    }
   
}


///////////////////////////////////////////////////////////////////////////////////////////

public function admin_assetcustomfieldvalue(){
    if($this->request->is('post'))
    { 
        //pr($this->request->data); die();
        $AssetFieldValue =$this->request->data['AssetFieldValue'];
        $text = $AssetFieldValue['asset'];
        if($text=='asset')
        {
            $user_id = $AssetFieldValue['user_id'];
            $asset_id = $AssetFieldValue['asset_id'];
            $type = $AssetFieldValue['type'];
            $user = $this->AssetFieldValue->query("INSERT INTO asset_field_values (user_id,asset_id,type) VALUES ('$user_id','$asset_id','$type')");
                $asset_field_values = $this->AssetFieldValue->query("SELECT id FROM asset_field_values ORDER BY id DESC LIMIT 1");
                foreach ($asset_field_values as $ass) {
                    $asset_field_values_id = $ass['asset_field_values']['id'];
                }
                
                //$asset_field_values_id = $this->AssetFieldValue->id;
                //echo $asset_field_values_id; die();
                    
                $this->Flash->success('Assets Fields Created Successfully', array('key' => 'positive'));

                return $this->redirect(array("controller" => "Assets","action" => "assetdetails",$asset_field_values_id));
        }
        else
        {


            $user_id = $AssetFieldValue['user_id'];
            $asset_id = $AssetFieldValue['asset_id'];
            $name = $AssetFieldValue['name'];
            $serial_number = $AssetFieldValue['serial_number'];
            $type = $AssetFieldValue['type'];
            $text = $AssetFieldValue['text'];

            if($text==1)
            {
            	$user = $this->AssetFieldValue->query("INSERT INTO asset_field_values (user_id,asset_id,name,serial_number,type) VALUES ('$user_id','$asset_id','$name','$serial_number','$type')");
    	        $asset_field_values = $this->AssetFieldValue->query("SELECT id FROM asset_field_values ORDER BY id DESC LIMIT 1");
    	        foreach ($asset_field_values as $ass) {
    	        	$asset_field_values_id = $ass['asset_field_values']['id'];
    	        }
    	        
    	        //$asset_field_values_id = $this->AssetFieldValue->id;
    	        //echo $asset_field_values_id; die();
    	            
    	        $this->Flash->success('Assets Fields Created Successfully', array('key' => 'positive'));

    	        return $this->redirect(array("controller" => "Assets","action" => "assetdetails",$asset_field_values_id)); 
            }
            else
            {

    	        $property = $AssetFieldValue['properties'];
    	        $properties = json_encode($property);
    	        
    	        $user = $this->AssetFieldValue->query("INSERT INTO asset_field_values (user_id,asset_id,name,serial_number,type,properties) VALUES ('$user_id','$asset_id','$name','$serial_number','$type','$properties')");
    	        $asset_field_values = $this->AssetFieldValue->query("SELECT id FROM asset_field_values ORDER BY id DESC LIMIT 1");
    	        foreach ($asset_field_values as $ass) {
    	        	$asset_field_values_id = $ass['asset_field_values']['id'];
    	        }
    	        
    	        //$asset_field_values_id = $this->AssetFieldValue->id;
    	        //echo $asset_field_values_id; die();
    	            
    	        $this->Flash->success('Assets Fields Created Successfully', array('key' => 'positive'));

    	        return $this->redirect(array("controller" => "Assets","action" => "assetdetails",$asset_field_values_id)); 
            }
      
        }
    }
    exit(); 
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_assetdetails($asset_field_values_id){
    $this->set('title','Asset Details');
    //$Assets = $this->AssetFieldValue->findallAssetFieldValueById($asset_field_values_id);
    $Assets = $this->AssetFieldValue->query("SELECT asset_field_values.*, users.first_name ,users.last_name FROM asset_field_values  INNER JOIN users ON asset_field_values.user_id = users.id where asset_field_values.id = $asset_field_values_id");

    foreach ($Assets as $ass) {
        	$asset_id = $ass['asset_field_values']['asset_id'];
            $ticket_id = $ass['asset_field_values']['ticket_id'];
        }
    //pr($Assets);
    $name = $this->Asset->findAssetbyId($asset_id);
    $Ticket = $this->Ticket->findTicketbyId($ticket_id);
    //pr($Tickets);die();
    $this->set(compact('Assets','name','Ticket'));   
}

public function admin_assetfieldvalueedit(){
  
  if($this->request->is('post'))
    { 
        //pr($this->request->data); die();
        $AssetFieldValue =$this->request->data['AssetFieldValue'];
        $user_id = $AssetFieldValue['user_id'];
        $asset_id = $AssetFieldValue['asset_id'];
        $name = $AssetFieldValue['name'];
        $serial_number = $AssetFieldValue['serial_number'];
        $type = $AssetFieldValue['type'];
        $text = $AssetFieldValue['text'];
        $id =  $AssetFieldValue['id'];
        if($text==1)
        {
            $this->AssetFieldValue->updateAll(array('user_id' => "'$user_id'",'asset_id' => "'$asset_id'",'name' => "'$name'",'serial_number' => "'$serial_number'",'type' => "'$type'"),array('id' => $id));
                            
            $this->Flash->success('Assets Update Successfully', array('key' => 'positive'));

            return $this->redirect(array("controller" => "Assets","action" => "assetdetails",$id)); 
        }
        else
        {

            $property = $AssetFieldValue['properties'];
            $properties = json_encode($property);
            
            $this->AssetFieldValue->updateAll(array('user_id' => "'$user_id'",'asset_id' => "'$asset_id'",'name' => "'$name'",'serial_number' => "'$serial_number'",'type' => "'$type'",'properties' => "'$properties'"),array('id' => $id));
            
            //$asset_field_values_id = $this->AssetFieldValue->id;
            //echo $asset_field_values_id; die();
                
            $this->Flash->success('Assets Update Successfully', array('key' => 'positive'));

            return $this->redirect(array("controller" => "Assets","action" => "assetdetails",$id)); 
        }
      
    } 
    $asset_id = $_GET['asset_id'];
    $Assets = $this->AssetFieldValue->query("SELECT asset_field_values.*, users.first_name ,users.last_name FROM asset_field_values  INNER JOIN users ON asset_field_values.user_id = users.id where asset_field_values.id = $asset_id");
 // pr($Assets);die();
    $this->set(compact('Assets'));
    
}

////////////////////////////////////////////////////////////////////////////////

public function admin_assetcustomfieldvaluedelete($asset_field_values_id){
    $this->AssetFieldValue->DeleteAssetFieldValue($asset_field_values_id);
    $this->Flash->success('Assets Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Assets','action'=>'customerassets'));
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_assettypes(){
    $this->set('title','Asset Types');
    $Assets = $this->Asset->allAssets();
    //pr($Assets);die();
    $this->set(compact('Assets'));   
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_customerassets(){
    $this->set('title','Customer Assets');
    $Assets = $this->AssetFieldValue->query("SELECT asset_field_values.*, users.first_name ,users.last_name FROM asset_field_values  INNER JOIN users ON asset_field_values.user_id = users.id");
    //pr($Assets);die();
    $this->set(compact('Assets'));   
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_assetfields($id){
    $this->set('title','Asset Fields');
    //echo $id;die();
    $name = $this->Asset->findAssetNameById($id);
    $asset_field = $this->AssetField->findallAssetFieldByAssetId($id);
    //pr($name);die();
    $this->set(compact('asset_field','name'));   
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
public function admin_newfield($id) 
{
    //echo $field_id;die();
    $name = $this->Asset->findAssetNameById($id);
    //pr($name);die();
    $this->set('title','New Field');
    $this->set('name', $name); 
    $this->set('custom_field_id', $id); 
    
}



////////////////////////////////////////////////////////////////////
public function admin_addnewfield() 
{
    $this->set('title','Add New Field');
    if($this->request->is('post')){
        $Assets=$this->request->data;

        //pr($Assets);
        $asset_id = $Assets['AssetField']['asset_id'];
        //echo $asset_id;die();
        $save = $this->AssetField->addAssetFieldAdmin($Assets);
        //$field_id = $this->CustomFieldType->getInsertID();
        //pr($Tickets); echo $field_id; die();
        $this->Flash->success('Asset Field added Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Assets","action" => "assetfields",$asset_id));
    }
   
}



////////////////////////////////////////////////////////////////////////////////

public function admin_assetfieldedit($AssetField_id){

    $AssetField = $this->AssetField->findallAssetFieldById($AssetField_id);
    //pr($AssetField);die();
    $this->set('AssetField', $AssetField);
    foreach($AssetField as $Assfield) {
            $asset_id = $Assfield['AssetField']['asset_id'];
    }
    $name = $this->Asset->findAssetNameById($asset_id);
    $this->set('name', $name);
    //pr($name);
    //pr($AssetField);die(); 
   
}


////////////////////////////////////////////////////////////////////
public function admin_editnewfield() 
{
    $this->set('title','Edit New Field');
    if($this->request->is('post')){
        
        $Assets=$this->request->data;

        //pr($Assets);die();
        $id = $Assets['AssetField']['id'];
        $asset_id = $Assets['AssetField']['asset_id'];
        $save = $this->AssetField->editAssetFieldAdmin($Assets,$id);
        //$field_id = $this->CustomFieldType->getInsertID();
        //pr($Tickets); echo $field_id; die();
        $this->Flash->success('Asset Field Edit Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Assets","action" => "assetfields",$asset_id));
    }
   
}

////////////////////////////////////////////////////////////////////
public function admin_assetfielview($asset_id) 
{
    $name = $this->Asset->findAssetNameById($asset_id);
    //pr($name);die();
    $this->set('title','Asset Field');
    $this->set('name', $name); 
    
}
////////////////////////////////////////////////////////////////////////////////

public function admin_assetfieldsdelete($AssetField_id,$asset_id){
    $this->AssetField->DeleteAssetField($AssetField_id);
    $this->Flash->success('Assets Field Type Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Assets','action'=>'assetfields',$asset_id));
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deleteassetstype($id){
    $this->Asset->deleteAsset($id);
    $this->Flash->success('Asset Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Assets','action'=>'assettypes'));
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_newasset(){
    $this->set('title','New Assets');
    $AssetCustomfieldName = $this->Asset->find('list',array('fields'=>array('name')));
    $this->set(compact('AssetCustomfieldName'));  
}




////////////////////////////////////////////////////////////////////
public function admin_customfields() 
{
   //$user_id;die();
   $AssetField_id =$this->request->data('AssetField_id');
   $AssetCustomField = $this->AssetField->findallAssetFieldByAssetId($AssetField_id);
   //pr($AssetCustomField);die();
   $this->set('AssetCustomField', $AssetCustomField); 
    
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Assetlist()
{
    $this->set('title','Asset List');
    

    $Assets = $this->Asset->allAssets();
    $this->set('Assets', $Assets);
    //print_r('products');
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_Assetview($id){
$this->set('title','Profile');
    $Asset = $this->Asset->findAssetbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Asset->editAssetbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Assets','action'=>'Assetview'));
    }
  //  $this->data = $Asset ; 
    $this->set('Asset', $Asset);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_asset()
{

    $data =$this->request->data('search');
   
    if ($this->request->is('ajax'))
    {
        $user = $this->User->query("SELECT * FROM users where first_name  like '%$data%' or last_name like '%$data%' or business_name like '%$data%'  or email like '%$data%' AND role != 'staff'");
    
        $this->set('user', $user);
        

   }
        
  

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_updatetypename()
{
    $id =$this->request->data('id');
    $name =$this->request->data('name');
    if ($this->request->is('ajax'))
    {
        $this->Asset->updateAll(array('name' => "'$name'"),array('id' => $id));
    }
    exit(); 
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_updateassetfieldname()
{
    $id =$this->request->data('id');
    $name =$this->request->data('name');
    if ($this->request->is('ajax'))
    {
        $this->AssetField->updateAll(array('name' => "'$name'"),array('id' => $id));
    }
    exit(); 
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

 /* USER SECTIOIN */

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function add() 
{
    $this->layout="frontenduser";
    $this->set('title','Add Asset');
     
    if($this->request->is('post'))
    {
        $Assets=$this->request->data;
        $name=$Assets['Assets']['name'];
        $user = explode(" ", $name);
  //  $user = $this->User->query("SELECT * FROM users where first_name  like '%$user[0]%' or last_name like '%$user[1]%' or business_name like '%$user[2]%'  or email like '%$user[3]%'");
    
  //pr($Assets);

        if(!empty($user[3]))
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name = '$user[1]' and business_name='$user[2]'  and email='$user[3]' ");
            foreach($user as $users) {
            //pr($users);die();    
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
                $this->redirect(array("controller" => "Assets","action" => "newasset",'?' => array('user_id' => $user_id)));   

            }  
        }
        elseif(!empty($user[2]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' and business_name='$user[2]'  or email='$user[2]'");
            $this->set('user', $user);
            foreach($user as $users) {
               // pr($users);die();  
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
                $this->redirect(array("controller" => "Assets","action" => "newasset",'?' => array('user_id' => $user_id)));   
            }   

        }
        elseif(!empty($user[1]))
        {
            //$user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
            $user = $this->User->query("SELECT * FROM users where first_name='$user[0]' and last_name='$user[1]' or business_name='$user[1]'  or email='$user[1]'");
        //    print_r($user);die();
            $this->set('user', $user);
            foreach($user as $users) {
               // pr($users);die();  
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
                $this->redirect(array("controller" => "Assets","action" => "newasset",'?' => array('user_id' => $user_id)));   
            }  

        }
        else
        {
            $user = $this->User->query("SELECT * FROM users where first_name='$name' or last_name='$name' or business_name='$name'  or email='$name' ");
          foreach($user as $users) {
            //pr($users);die();  
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
                $this->redirect(array("controller" => "Assets","action" => "newasset",'?' => array('user_id' => $user_id)));   
            }  

        }
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function newnew(){
    $this->layout="frontenduser";
    $this->set('title','New Asset');
    if($this->request->is('post'))
    {      
        $Asset = $this->request->data;  
        //pr($this->request->data); die();
        $this->Asset->addAssetAdmin($Asset); // Add Assets
        $Asset_id = $this->Asset->getInsertID();
        $this->Flash->success('Asset Type Save Successfully ', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Assets','action'=>'assettypes'));
    }
   
}


///////////////////////////////////////////////////////////////////////////////////////////

public function assetcustomfieldvalue(){
    $this->layout="frontenduser";
    if($this->request->is('post'))
    { 
        //pr($this->request->data); die();
        $AssetFieldValue =$this->request->data['AssetFieldValue'];
        $text = $AssetFieldValue['asset'];
        $session_id = $this->Session->read('User_id');
        if($text=='asset')
        {   

            $user_id = $AssetFieldValue['user_id'];
            $asset_id = $AssetFieldValue['asset_id'];
            $type = $AssetFieldValue['type'];
            $user = $this->AssetFieldValue->query("INSERT INTO asset_field_values (user_id,asset_id,type,login_id) VALUES ('$user_id','$asset_id','$type','$session_id')");
                $asset_field_values = $this->AssetFieldValue->query("SELECT id FROM asset_field_values ORDER BY id DESC LIMIT 1");
                foreach ($asset_field_values as $ass) {
                    $asset_field_values_id = $ass['asset_field_values']['id'];
                }
                
                //$asset_field_values_id = $this->AssetFieldValue->id;
                //echo $asset_field_values_id; die();
                    
                $this->Flash->success('Assets Fields Created Successfully', array('key' => 'positive'));

                return $this->redirect(array("controller" => "Assets","action" => "assetdetails",$asset_field_values_id));
        }
        else
        {


            $user_id = $AssetFieldValue['user_id'];
            $asset_id = $AssetFieldValue['asset_id'];
            $name = $AssetFieldValue['name'];
            $serial_number = $AssetFieldValue['serial_number'];
            $type = $AssetFieldValue['type'];
            $text = $AssetFieldValue['text'];

            if($text==1)
            {
                $user = $this->AssetFieldValue->query("INSERT INTO asset_field_values (user_id,asset_id,name,serial_number,type,login_id) VALUES ('$user_id','$asset_id','$name','$serial_number','$type','$session_id')");
                $asset_field_values = $this->AssetFieldValue->query("SELECT id FROM asset_field_values ORDER BY id DESC LIMIT 1");
                foreach ($asset_field_values as $ass) {
                    $asset_field_values_id = $ass['asset_field_values']['id'];
                }
                
                //$asset_field_values_id = $this->AssetFieldValue->id;
                //echo $asset_field_values_id; die();
                    
                $this->Flash->success('Assets Fields Created Successfully', array('key' => 'positive'));

                return $this->redirect(array("controller" => "Assets","action" => "assetdetails",$asset_field_values_id)); 
            }
            else
            {

                $property = $AssetFieldValue['properties'];
                $properties = json_encode($property);
                
                $user = $this->AssetFieldValue->query("INSERT INTO asset_field_values (user_id,asset_id,name,serial_number,type,properties,login_id) VALUES ('$user_id','$asset_id','$name','$serial_number','$type','$properties','$session_id')");
                $asset_field_values = $this->AssetFieldValue->query("SELECT id FROM asset_field_values ORDER BY id DESC LIMIT 1");
                foreach ($asset_field_values as $ass) {
                    $asset_field_values_id = $ass['asset_field_values']['id'];
                }
                
                //$asset_field_values_id = $this->AssetFieldValue->id;
                //echo $asset_field_values_id; die();
                    
                $this->Flash->success('Assets Fields Created Successfully', array('key' => 'positive'));

                return $this->redirect(array("controller" => "Assets","action" => "assetdetails",$asset_field_values_id)); 
            }
      
        }
    }
    exit(); 
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function assetdetails($asset_field_values_id){
    $this->layout="frontenduser";
    $this->set('title','Asset Details');
    //$Assets = $this->AssetFieldValue->findallAssetFieldValueById($asset_field_values_id);
    $Assets = $this->AssetFieldValue->query("SELECT asset_field_values.*, users.first_name ,users.last_name FROM asset_field_values  INNER JOIN users ON asset_field_values.user_id = users.id where asset_field_values.id = $asset_field_values_id");

    foreach ($Assets as $ass) {
            $asset_id = $ass['asset_field_values']['asset_id'];
            $ticket_id = $ass['asset_field_values']['ticket_id'];
        }
    //pr($Assets);
    $name = $this->Asset->findAssetbyId($asset_id);
    $Ticket = $this->Ticket->findTicketbyId($ticket_id);
    //pr($Tickets);die();
    $this->set(compact('Assets','name','Ticket'));   
}

public function assetfieldvalueedit(){
  $this->layout="frontenduser";
  if($this->request->is('post'))
    { 
        //pr($this->request->data); die();
        $AssetFieldValue =$this->request->data['AssetFieldValue'];
        $user_id = $AssetFieldValue['user_id'];
        $asset_id = $AssetFieldValue['asset_id'];
        $name = $AssetFieldValue['name'];
        $serial_number = $AssetFieldValue['serial_number'];
        $type = $AssetFieldValue['type'];
        $text = $AssetFieldValue['text'];
        $id =  $AssetFieldValue['id'];
        if($text==1)
        {
            $this->AssetFieldValue->updateAll(array('user_id' => "'$user_id'",'asset_id' => "'$asset_id'",'name' => "'$name'",'serial_number' => "'$serial_number'",'type' => "'$type'"),array('id' => $id));
                            
            $this->Flash->success('Assets Update Successfully', array('key' => 'positive'));

            return $this->redirect(array("controller" => "Assets","action" => "assetdetails",$id)); 
        }
        else
        {

            $property = $AssetFieldValue['properties'];
            $properties = json_encode($property);
            
            $this->AssetFieldValue->updateAll(array('user_id' => "'$user_id'",'asset_id' => "'$asset_id'",'name' => "'$name'",'serial_number' => "'$serial_number'",'type' => "'$type'",'properties' => "'$properties'"),array('id' => $id));
            
            //$asset_field_values_id = $this->AssetFieldValue->id;
            //echo $asset_field_values_id; die();
                
            $this->Flash->success('Assets Update Successfully', array('key' => 'positive'));

            return $this->redirect(array("controller" => "Assets","action" => "assetdetails",$id)); 
        }
      
    } 
    $asset_id = $_GET['asset_id'];
    $Assets = $this->AssetFieldValue->query("SELECT asset_field_values.*, users.first_name ,users.last_name FROM asset_field_values  INNER JOIN users ON asset_field_values.user_id = users.id where asset_field_values.id = $asset_id");
 // pr($Assets);die();
    $this->set(compact('Assets'));
    
}

////////////////////////////////////////////////////////////////////////////////

public function assetcustomfieldvaluedelete($asset_field_values_id){
    $this->layout="frontenduser";
    $this->AssetFieldValue->DeleteAssetFieldValue($asset_field_values_id);
    $this->Flash->success('Assets Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Assets','action'=>'customerassets'));
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function assettypes(){
    $this->layout="frontenduser";
    $session_id = $this->Auth->user('id');
    $this->set('title','Asset Types');

   // $Assets = $this->Asset->allAssets();
    $Assets = $this->Asset->findallAssetsByLoginId($session_id);
   // pr($Assets);die();
    $this->set(compact('Assets'));   
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function customerassets(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $session_id = $this->Auth->user('id');
    $this->set('title','Customer Assets');
    $Assets = $this->AssetFieldValue->query("SELECT asset_field_values.*, users.first_name ,users.last_name FROM asset_field_values  INNER JOIN users ON asset_field_values.user_id = users.id where asset_field_values.login_id = $session_id");
    //pr($Assets);die();
    $this->set(compact('Assets'));   
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function assetfields($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Asset Fields');
    //echo $id;die();
    $name = $this->Asset->findAssetNameById($id);
    $asset_field = $this->AssetField->findallAssetFieldByAssetId($id);
   // pr($name);pr($asset_field);die();
    $this->set(compact('asset_field','name'));   
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
public function newfield($id) 
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    //echo $id;die();
    $name = $this->Asset->findAssetNameById($id);
    //pr($name);die();
    $this->set('title','New Field'); 
    $this->set('name', $name); 
    $this->set('custom_field_id', $id); 
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
    
}



////////////////////////////////////////////////////////////////////
public function addnewfield() 
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Add New Field');
    if($this->request->is('post')){
        $Assets=$this->request->data;

        //pr($Assets);
        $asset_id = $Assets['AssetField']['asset_id'];
        //echo $asset_id;die();
        $save = $this->AssetField->addAssetFieldAdmin($Assets);
        //$field_id = $this->CustomFieldType->getInsertID();
        //pr($Tickets); echo $field_id; die();
        $this->Flash->success('Asset Field added Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Assets","action" => "assetfields",$asset_id));
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
   
}



////////////////////////////////////////////////////////////////////////////////

public function assetfieldedit($AssetField_id){
    $this->layout="frontenduser";
    $AssetField = $this->AssetField->findallAssetFieldById($AssetField_id);
    //pr($AssetField);die();
    $this->set('AssetField', $AssetField);
    foreach($AssetField as $Assfield) {
            $asset_id = $Assfield['AssetField']['asset_id'];
    }
    $name = $this->Asset->findAssetNameById($asset_id);
    $this->set('name', $name);
    //pr($name);
    //pr($AssetField);die(); 
   
}


////////////////////////////////////////////////////////////////////
public function editnewfield() 
{
    $this->layout="frontenduser";
    $this->set('title','Edit New Field');
    if($this->request->is('post')){
        
        $Assets=$this->request->data;

        //pr($Assets);die();
        $id = $Assets['AssetField']['id'];
        $asset_id = $Assets['AssetField']['asset_id'];
        $save = $this->AssetField->editAssetFieldAdmin($Assets,$id);
        //$field_id = $this->CustomFieldType->getInsertID();
        //pr($Tickets); echo $field_id; die();
        $this->Flash->success('Asset Field Edit Successfully', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Assets","action" => "assetfields",$asset_id));
    }
   
}

////////////////////////////////////////////////////////////////////
public function assetfielview($asset_id) 
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $name = $this->Asset->findAssetNameById($asset_id);
    //pr($name);die();
    $this->set('title','Asset Field');
    $this->set('name', $name); 
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}
////////////////////////////////////////////////////////////////////////////////

public function assetfieldsdelete($AssetField_id,$asset_id){
    $this->layout="frontenduser";
    $this->AssetField->DeleteAssetField($AssetField_id);
    $this->Flash->success('Assets Field Type Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Assets','action'=>'assetfields',$asset_id));
}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteassetstype($id){
    $this->layout="frontenduser";
    $this->Asset->deleteAsset($id);
    $this->Flash->success('Asset Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Assets','action'=>'assettypes'));
}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function newasset(){
    $this->layout="frontenduser";
    $session_id = $this->Auth->user('id');
    $this->set('title','New Assets');
    $AssetCustomfieldName = $this->Asset->find('list',array('conditions'=>array('login_id' => $session_id),'fields'=>array('name')));
    //$this->User->find('list', array('conditions'=>array('User.id >=' => 1)));
    //pr($AssetCustomfieldName);die();
    $this->set(compact('AssetCustomfieldName'));  
}




////////////////////////////////////////////////////////////////////
public function customfields() 
{
    $this->layout="frontenduser";
   //$user_id;die();
   $AssetField_id =$this->request->data('AssetField_id');
   $AssetCustomField = $this->AssetField->findallAssetFieldByAssetId($AssetField_id);
   //pr($AssetCustomField);die();
   $this->set('AssetCustomField', $AssetCustomField); 
    
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Assetlist()
{
    $this->layout="frontenduser";
    $this->set('title','Asset List');
    

    $Assets = $this->Asset->allAssets();
    $this->set('Assets', $Assets);
    //print_r('products');
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function Assetview($id){
    $this->layout="frontenduser";
    $this->set('title','Profile');
    $Asset = $this->Asset->findAssetbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Asset->editAssetbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Assets','action'=>'Assetview'));
    }
  //  $this->data = $Asset ; 
    $this->set('Asset', $Asset);
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function asset()
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

////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function updatetypename()
{
    $this->layout="frontenduser";
    $id =$this->request->data('id');
    $name =$this->request->data('name');
    if ($this->request->is('ajax'))
    {
        $this->Asset->updateAll(array('name' => "'$name'"),array('id' => $id));
    }
    exit(); 
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function updateassetfieldname()
{
    $this->layout="frontenduser";
    $id =$this->request->data('id');
    $name =$this->request->data('name');
    if ($this->request->is('ajax'))
    {
        $this->AssetField->updateAll(array('name' => "'$name'"),array('id' => $id));
    }
    exit(); 
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////




}
