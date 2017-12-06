<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class VendorsController extends AppController {

public $uses = array('Vendor','Product','User','Purchase','Comment','Phone','Note','Attachment','Email','Reminder','VendorPricing','Inventory','CommunicationLog','Contact','PurchaseOrder');

public function admin_add() 
{
    $this->set('title','Add Vendor');
    if($this->request->is('post'))
    {
        $Vendor=$this->request->data;
        //pr($Vendor);die();
        $save = $this->Vendor->addVendorAdmin($Vendor);
        $vendor_id = $this->Vendor->getInsertID();
        $this->Flash->success('Vendor Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Vendors","action" => "vendordetails",$vendor_id));
    }
}


////////////////////////////////////////////////////////////////////

public function admin_vendoredit($id){
    $this->set('title','Edit Vendor');

    $Vendor= $this->Vendor->findVendorbyId($id); // Get Vendor Detail from id
    //pr($Vendor);die();
  
    if($this->request->is('post'))
    {
        $Vendor=$this->request->data;
        //pr($Vendor);die();
        $save = $this->Vendor->editVendorbyId($Vendor,$id);
        $this->Flash->success('Vendor Update Successfully!',array('key' => 'positive'));
        $this->redirect(array("controller"=>"Vendors","action" => "vendordetails",$id));
   	}
    $this->data = $Vendor;
    $this->set(compact('Vendor'));
    
}

////////////////////////////////////////////////////////////////////

public function admin_deletevendor($id){
    $this->Vendor->deleteVendor($id);
    $this->Flash->success('Vendor Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Vendors","action"=>"vendorlist"));
    
}


// /////////////////////////////////////////////////////////////////

public function admin_vendorlist()
{
    $this->set('title','Vendor List');
    $Vendors = $this->Vendor->allVendors();
    //pr($Vendors);die();
    $this->set('Vendors', $Vendors);
}

////////////////////////////////////////////////////////////////////    

public function admin_vendordetails($id){
    $this->set('title','Profile');
    $Vendor = $this->Vendor->findVendorbyId($id);
    $CommunicationLog = $this->CommunicationLog->findallCommunicationLogByVendorId($id);
    $Contact = $this->Contact->findContactbyVendorId($id);
    $PurchaseOrder = $this->PurchaseOrder->findPurchaseOrderbyVendorId($id);
    //pr($PurchaseOrder);die();
    $this->data = $Vendor ; 
    $this->set(compact('Vendor','CommunicationLog','Contact','PurchaseOrder'));
}

//////////////////////////////////////////////////////////////////////////

/*----------------------------------------------------------------*/

public function admin_communication_log(){
    
    $this->set('title','Communication Logs');
    if($this->request->is('post')){
        $communication =$this->request->data;
        $vendor_id = $communication['CommunicationLog']['vendor_id'];
        //pr($communication);die();
        $save = $this->CommunicationLog->addCommcunicationLog($communication);
        
        return $this->redirect(array("controller" => "Vendors","action" => "vendordetails",$vendor_id));
    }
}

/*----------------------------------------------------------------*/

/*----------------------------------------------------------------*/

public function admin_addnewcontact(){
    
    $this->set('title','Add New Contact');
    $vendor_id =$this->request->data('vendor_id');
    $contact = array();
    $contact['Contact']['vendor_id']=$vendor_id; 
    if ($this->request->is('ajax'))
    {
        $this->Contact->addContactAdmin($contact);
        $this->Flash->success('Row Added!',array('key' => 'positive'));
        echo $contact_id = $this->Contact->getInsertID();
        // $this->set('user', $user);
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function admin_deletecontact($contact_id,$vendor_id){
    $this->Contact->deleteContact($contact_id);
    $this->Flash->success('Contact Deleted!',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Vendors","action"=>"vendordetails",$vendor_id));    
}

/*----------------------------------------------------------------*/

public function admin_updatecontactname(){
    $name =$this->request->data('name');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('name' => "'$name'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function admin_updatecontactphone(){
    $phone =$this->request->data('phone');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('phone'=>"'$phone'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function admin_updatecontactmobile(){
    $mobile =$this->request->data('mobile');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('mobile'=>"'$mobile'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/


public function admin_updatecontactemail(){
    $email =$this->request->data('email');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('email'=>"'$email'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/


public function admin_updatecontactaddress(){
    $address =$this->request->data('address');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('address'=>"'$address'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function admin_updatecontactaddress2(){
    $address2 =$this->request->data('address2');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('address2'=>"'$address2'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function admin_updatecontactcity(){
    $city =$this->request->data('city');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('city'=>"'$city'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/


public function admin_updatecontactstate(){
    $state =$this->request->data('state');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('state'=>"'$state'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/


public function admin_updatecontactzip(){
    $zip =$this->request->data('zip');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('zip'=>"'$zip'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/


public function admin_updatecontactnotes(){
    $notes =$this->request->data('notes');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('notes'=>"'$notes'"),array('id'=>$contact_id));
    }    
    exit();
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
    $this->set('title','Add Vendor');
    if($this->request->is('post'))
    {
        $Vendor=$this->request->data;
        //pr($Vendor);die();
        $save = $this->Vendor->addVendorAdmin($Vendor);
        $vendor_id = $this->Vendor->getInsertID();
        $this->Flash->success('Vendor Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Vendors","action" => "vendordetails",$vendor_id));
    }
}


////////////////////////////////////////////////////////////////////

public function vendoredit($id){
    $this->layout = "frontenduser";
    $this->set('title','Edit Vendor');

    $Vendor= $this->Vendor->findVendorbyId($id); // Get Vendor Detail from id
    //pr($Vendor);die();
  
    if($this->request->is('post'))
    {
        $Vendor=$this->request->data;
        //pr($Vendor);die();
        $save = $this->Vendor->editVendorbyId($Vendor,$id);
        $this->Flash->success('Vendor Update Successfully!',array('key' => 'positive'));
        $this->redirect(array("controller"=>"Vendors","action" => "vendordetails",$id));
    }
    $this->data = $Vendor;
    $this->set(compact('Vendor'));
    
}

////////////////////////////////////////////////////////////////////

public function deletevendor($id){
    $this->layout = "frontenduser";
    $this->Vendor->deleteVendor($id);
    $this->Flash->success('Vendor Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Vendors","action"=>"vendorlist"));
    
}


// /////////////////////////////////////////////////////////////////

public function vendorlist()
{
    $this->layout = "frontenduser";
    $this->set('title','Vendor List');
    $session_id = $this->Auth->User('id');
    $Vendors = $this->Vendor->findallVendorsByLoginId($session_id);
    //pr($Vendors);die();
    $this->set('Vendors', $Vendors);
}

////////////////////////////////////////////////////////////////////    

public function vendordetails($id){
    $this->layout = "frontenduser";
    $this->set('title','Profile');
    $Vendor = $this->Vendor->findVendorbyId($id);
    $CommunicationLog = $this->CommunicationLog->findallCommunicationLogByVendorId($id);
    $Contact = $this->Contact->findContactbyVendorId($id);
    $PurchaseOrder = $this->PurchaseOrder->findPurchaseOrderbyVendorId($id);
    //pr($PurchaseOrder);die();
    $this->data = $Vendor ; 
    $this->set(compact('Vendor','CommunicationLog','Contact','PurchaseOrder'));
}

//////////////////////////////////////////////////////////////////////////

/*----------------------------------------------------------------*/

public function communication_log(){
    $this->layout = "frontenduser";
    $this->set('title','Communication Logs');
    if($this->request->is('post')){
        $communication =$this->request->data;
        $vendor_id = $communication['CommunicationLog']['vendor_id'];
        //pr($communication);die();
        $save = $this->CommunicationLog->addCommcunicationLog($communication);
        
        return $this->redirect(array("controller" => "Vendors","action" => "vendordetails",$vendor_id));
    }
}

/*----------------------------------------------------------------*/

/*----------------------------------------------------------------*/

public function addnewcontact(){
    $this->layout = "frontenduser";
    $this->set('title','Add New Contact');
    $vendor_id =$this->request->data('vendor_id');
    $contact = array();
    $contact['Contact']['vendor_id']=$vendor_id; 
    if ($this->request->is('ajax'))
    {
        $this->Contact->addContactAdmin($contact);
        $this->Flash->success('Row Added!',array('key' => 'positive'));
        echo $contact_id = $this->Contact->getInsertID();
        // $this->set('user', $user);
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function deletecontact($contact_id,$vendor_id){
    $this->layout = "frontenduser";
    $this->Contact->deleteContact($contact_id);
    $this->Flash->success('Contact Deleted!',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Vendors","action"=>"vendordetails",$vendor_id));    
}

/*----------------------------------------------------------------*/

public function updatecontactname(){
    $this->layout = "frontenduser";
    $name =$this->request->data('name');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('name' => "'$name'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function updatecontactphone(){
    $this->layout = "frontenduser";
    $phone =$this->request->data('phone');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('phone'=>"'$phone'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function updatecontactmobile(){
    $this->layout = "frontenduser";
    $mobile =$this->request->data('mobile');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('mobile'=>"'$mobile'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/


public function updatecontactemail(){
    $this->layout = "frontenduser";
    $email =$this->request->data('email');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('email'=>"'$email'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/


public function updatecontactaddress(){
    $this->layout = "frontenduser";
    $address =$this->request->data('address');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('address'=>"'$address'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function updatecontactaddress2(){
    $this->layout = "frontenduser";
    $address2 =$this->request->data('address2');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('address2'=>"'$address2'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function updatecontactcity(){
    $this->layout = "frontenduser";
    $city =$this->request->data('city');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('city'=>"'$city'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/


public function updatecontactstate(){
    $this->layout = "frontenduser";
    $state =$this->request->data('state');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('state'=>"'$state'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/


public function updatecontactzip(){
    $this->layout = "frontenduser";
    $zip =$this->request->data('zip');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('zip'=>"'$zip'"),array('id'=>$contact_id));
    }    
    exit();
}

/*----------------------------------------------------------------*/


public function updatecontactnotes(){
    $this->layout = "frontenduser";
    $notes =$this->request->data('notes');
    $contact_id =$this->request->data('contact_id');
    if ($this->request->is('ajax'))
    {
        $this->Contact->updateAll(array('notes'=>"'$notes'"),array('id'=>$contact_id));
    }    
    exit();
}












/*----------------------------------------------------------------*/





}