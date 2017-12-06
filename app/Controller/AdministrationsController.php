<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class AdministrationsController extends AppController {

public $uses = array('Administration','Product','User','Purchase','Comment','Phone','Note','Attachment','Email','Reminder','AdministrationPricing','Inventory','Menu','UserMenu','BusinessSetting','Ticket','ProductCategory','TicketCategory','Disclaimer','Template','Ticket','Invoice','Estimate','Multilocation','UserPackage','TransferLocation');

//protected $default_ticket_template;

public function Default_Ticket_Template()
{
$templates = '<div class="print-container">
<div class="invheader">
<div class="invheader-upper">
<div class="invheader-address-account">
<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
        <tr>
            <td style="width:50%">
            <p>{{account_address}}<br />
            {{account_city}}, {{account_state}} {{account_zip}}<br />
            {{account_phone}}</p>
            </td>
            <td>&nbsp;</td>
            <td style="width:50%">&nbsp;</td>
            <td style="width:50%">
            <div class="invheader-logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{account_logo}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            </td>
        </tr>
        <tr>
            <td>
            <p>{{customer_fullname}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            {{ticket_address}}<br />
            {{ticket_city}}, {{ticket_state}} {{ticket_zip}}</p>
            </td>
            <td>&nbsp;</td>
            <td>
            <p><strong>Ticket#&nbsp;&nbsp; </strong></p>

            <p><strong>Ticket Date</strong></p>

            <p><strong>Subject</strong></p>
            </td>
            <td>
            <p>{{ticket_number}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

            <p>{{ticket_date}}</p>

            <p><strong>{{ticket_subject}}</strong></p>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>

<div class="invheader-lower">&nbsp;</div>

<div class="invheader-lower">
<div class="print-container">
<p>{{every_comment_history}}</p>

<p>&nbsp;</p>

<p>{{every_assets}}</p>

<p>&nbsp;</p>

<p>{{every_custom_fields}}</p>

<p>&nbsp;</p>

<div class="invbody">
<div class="invbody-summary">
<h2><strong>Disclaimer</strong></h2>

<p>{{ticket_disclaimer_template}}</p>
</div>

<div class="clearb" style="height:1px; overflow:hidden">&nbsp;</div>
</div>

<div style="padding:0px; text-align:center">
<hr />
<hr />
<p>&nbsp;</p>
</div>
</div>
</div>
</div>
</div>

<p>&nbsp;</p>';
 return $templates ;

}




public function Default_Invoice_Template()
{
$templates = '<div class="print-container">
<div class="invheader">
<div class="invheader-upper">
<div class="invheader-address-account">
<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
        <tr>
            <td style="width:50%">
            <p>{{account_address}}&nbsp;<br />
            {{account_city}}, {{account_state}} {{account_zip}}<br />
            {{account_phone}}</p>
            </td>
            <td>&nbsp;</td>
            <td style="width:50%">{{invoice_paid_stamp}}</td>
            <td style="width:50%">
            <div class="invheader-logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{account_logo}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            </td>
        </tr>
        <tr>
            <td>
            <p>{{customer_fullname}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            {{customer_billing_address}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            {{customer_billing_city}},{{customer_billing_state}}{{customer_billing_zip}}</p>
            </td>
            <td>&nbsp;</td>
            <td>
            <p>Invoice#&nbsp;&nbsp;</p>

            <p>Ticket Date</p>

            <p><strong>Balance Due</strong></p>
            </td>
            <td>
            <p>{{invoice_number}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

            <p>{{invoice_date}}</p>

            <p><strong>{{invoice_balance_due}}</strong></p>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>

<div class="invheader-lower">&nbsp;</div>

<div class="invheader-lower">
<div class="print-container">
<p>{{every_invoice_line_items}}</p>

<div class="invheader-invoicedetails">
<table cellspacing="0" style="height:131px; width:792px">
    <tbody>
        <tr>
            <th rowspan="5" style="width:150px">
            <h2><strong>Disclaimer</strong></h2>

            <h2>{{invoice_disclaimer}}</h2>
            </th>
            <th style="width:10px"><strong>Subtotal</strong></th>
            <td style="width:120px"><strong>{{invoice_subtotal}}</strong></td>
        </tr>
        <tr>
            <th style="width:10px">Tax</th>
            <td style="width:120px">{{invoice_tax}}</td>
        </tr>
        <tr>
            <th style="width:10px">Invoice Total</th>
            <td style="width:120px">{{invoice_total}}</td>
        </tr>
        <tr>
            <th style="width:10px">Payments</th>
            <td style="width:120px">{{invoice_payments_amount}}</td>
        </tr>
        <tr>
            <th style="width:10px">
            <div><strong>Balance Due</strong></div>
            </th>
            <td style="width:120px">
            <div><strong>{{invoice_balance_due}}</strong></div>
            </td>
        </tr>
    </tbody>
</table>
</div>

<div class="invbody">
<div class="invbody-summary">&nbsp;
<p>{{signature}}</p>
</div>

<div class="clearb" style="height:1px; overflow:hidden">&nbsp;</div>
</div>

<div style="padding:0px; text-align:center">
<hr />
<hr />
<p>&nbsp;</p>
</div>
</div>
</div>
</div>
</div>

<p>&nbsp;</p>
';
 return $templates ;

}

public function Default_Estimate_Template()
{
$templates = '<div class="print-container">
<div class="invheader">
<div class="invheader-upper">
<div class="invheader-address-account">
<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
    <tbody>
        <tr>
            <td style="width:50%">
            <p>{{account_address}}&nbsp;<br />
            {{account_city}}, {{account_state}} {{account_zip}}<br />
            {{account_phone}}</p>
            </td>
            <td>&nbsp;</td>
            <td style="width:50%">{{estimate_stamp}}&nbsp;</td>
            <td style="width:50%">
            <div class="invheader-logo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{account_logo}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            </td>
        </tr>
        <tr>
            <td>
            <p>{{customer_fullname}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            {{customer_billing_address}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
            {{customer_billing_city}},{{customer_billing_state}}{{customer_billing_zip}}</p>
            </td>
            <td>&nbsp;</td>
            <td>
            <p>Estimate #&nbsp;&nbsp;</p>

            <p>Estimate Date</p>

            <p><strong>Total</strong></p>
            </td>
            <td>
            <p>{{estimate_number}}</p>

            <p>{{estimate_date}}</p>

            <p><strong>{{estimate_total}}</strong></p>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>

<div class="invheader-lower">&nbsp;</div>

<div class="invheader-lower">
<div class="print-container">
<p>{{every_estimate_line_items}}</p>

<p>&nbsp;</p>

<table cellspacing="0" style="height:142px; width:737px">
    <tbody>
        <tr>
            <th rowspan="3" style="width:200px">
            <h2 style="text-align:left"><strong>THIS IS AN ESTIMATE</strong></h2>

            <h2 style="text-align:left"><strong>Disclaimer</strong></h2>

            <h2 style="text-align:left">{{estimate_disclaimer}}</h2>
            </th>
            <th style="width:10px"><strong>Subtotal</strong></th>
            <td style="width:120px"><strong>{{estimate_subtotal}}</strong></td>
        </tr>
        <tr>
            <th style="width:10px">Tax</th>
            <td style="width:120px">{{estimate_tax}}</td>
        </tr>
        <tr>
            <th style="width:10px">Estimate Total</th>
            <td style="width:120px"><strong>{{estimate_total}}</strong></td>
        </tr>
    </tbody>
</table>

<div class="invbody">
<div class="invbody-summary">&nbsp;
<p>{{signature}}</p>
</div>

<div class="clearb" style="height:1px; overflow:hidden">&nbsp;</div>
</div>

<div style="padding:0px; text-align:center">
<hr />
<hr />
<p>&nbsp;</p>
</div>
</div>
</div>
</div>
</div>

<p>&nbsp;</p>';
 return $templates ;

}


public function admin_add() 
{
    $this->set('title','Add Administration');
    if($this->request->is('post'))
    {
        $Administration=$this->request->data;
       // pr($Administration);die();
        $save = $this->Administration->addAdministrationAdmin($Administration);
        $this->Flash->success('Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Administrations","action" => "Administrationlist"));
    }
}


////////////////////////////////////////////////////////////////////

public function admin_Administrationedit($id){
    $this->set('title','Edit Administration');

    $Administration= $this->Administration->findAdministrationbyId($id); // Get Administration Detail from id
    //pr($Administration);die();
  
    if($this->request->is('post'))
    {
        $Administration=$this->request->data;
        //pr($Administration);die();
        $save = $this->Administration->editAdministrationbyId($Administration,$id);
        $this->Flash->success('Administration Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Administrations","action" => "Administrationlist"));
   	}

    $this->data = $Administration ;
    $this->set(compact('Administration'));
    
}

////////////////////////////////////////////////////////////////////

public function admin_deleteAdministration($id){
    $this->Administration->deleteAdministration($id);
    $this->Flash->success('Administration Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Administrations","action"=>"Administrationlist"));
    
}


// /////////////////////////////////////////////////////////////////

public function admin_Administrationlist()
{
    $this->set('title','Administration List');
    $Administrations = $this->Administration->allAdministrations();
    //$Administrations = $this->Administration->query("SELECT Administrations.*, users.first_name ,users.last_name FROM Administrations  INNER JOIN users ON Administrations.user_id = users.id");
   // pr($Administrations);die();
    $this->set('Administrations', $Administrations);
}

////////////////////////////////////////////////////////////////////    

public function admin_Administrationview($id){
$this->set('title','Profile');
    $Administration = $this->Administration->findAdministrationbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Administration->editAdministrationbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Administrations','action'=>'Administrationview'));
    }
    $this->data = $Administration ; 
    $this->set(compact('Administration'));
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
    $this->set('title','Add Administration');
    if($this->request->is('post'))
    {
        $Administration=$this->request->data;
       // pr($Administration);die();
        $save = $this->Administration->addAdministrationAdmin($Administration);
        $this->Flash->success('Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Administrations","action" => "Administrationlist"));
    }
}


////////////////////////////////////////////////////////////////////

public function Administrationedit($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Administration');

    $Administration= $this->Administration->findAdministrationbyId($id); // Get Administration Detail from id
    //pr($Administration);die();
  
    if($this->request->is('post'))
    {
        $Administration=$this->request->data;
        //pr($Administration);die();
        $save = $this->Administration->editAdministrationbyId($Administration,$id);
        $this->Flash->success('Administration Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Administrations","action" => "Administrationlist"));
    }

    $this->data = $Administration ;
    $this->set(compact('Administration'));
    
}

////////////////////////////////////////////////////////////////////

public function deleteAdministration($id){
    $this->layout="frontenduser";
    $this->Administration->deleteAdministration($id);
    $this->Flash->success('Administration Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Administrations","action"=>"Administrationlist"));
    
}


// /////////////////////////////////////////////////////////////////

public function Administrationlist()
{
    $this->layout="frontenduser";
    $this->set('title','Administration List');
    $session_id = $this->Session->read('Auth.User.id');
    $Administrations = $this->Administration->findallAdministrationsByLoginId($session_id);
    //$Administrations = $this->Administration->query("SELECT Administrations.*, users.first_name ,users.last_name FROM Administrations  INNER JOIN users ON Administrations.user_id = users.id");
   // pr($Administrations);die();
    $this->set('Administrations', $Administrations);
}

////////////////////////////////////////////////////////////////////    

public function Administrationview($id){
    $this->layout="frontenduser";
    $this->set('title','Profile');
    $Administration = $this->Administration->findAdministrationbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Administration->editAdministrationbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Administrations','action'=>'Administrationview'));
    }
    $this->data = $Administration ; 
    $this->set(compact('Administration'));
}


////////////////////////////////////////////////////////////////////    

public function index(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Index');
    $id = $this->Auth->user('id');
    //$Administration = $this->Administration->findAdministrationbyId($id);
    $Total_ticket = $this->Ticket->find('count',array('conditions'=>array('Ticket.login_id'=>$id,'Ticket.status !='=>'Resolved')));
    $Total_invoice = $this->Invoice->find('count',array('conditions'=>array('Invoice.login_id'=>$id)));
    $Total_user = $this->User->find('count',array('conditions'=>array('User.login_id'=>$id)));
    //pr($Total_user);die();
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Administration->editAdministrationbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Administrations','action'=>'Administrationview'));
    }
   // $this->data = $Administration ; 
    $this->set(compact('Total_ticket','Total_invoice','Total_user'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}



////////////////////////////////////////////////////////////////////    

public function general(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');
    $BusinessSetting = $this->BusinessSetting->findBusinessSettingByUserId($id);
    $business_email = $this->User->findBusinessEmailByUserId($id);

    $Multilocations = $this->Multilocation->findMultilocationByUserId($id);

    //pr($business_email);die();
    //pr($Multilocations);die("asdasd");
    //pr($business_email);
    if($this->request->is('post')){ 
        $user = $this->request->data;
        //pr($user);die();
        $time_zone = $user['BusinessSetting']['time_zone'];
        $locale_region = $user['BusinessSetting']['locale_region'];
        $bus_email = $user['BusinessSetting']['business_email'];
        if(!empty($BusinessSetting))
        {
            $this->User->updateAll(array('User.business_email' => "'$bus_email'"), array('User.id' => $id));
            $this->BusinessSetting->updateAll(array('BusinessSetting.time_zone' => "'$time_zone'",'BusinessSetting.locale_region' => "'$locale_region'"), array('BusinessSetting.user_id' => $id));
            $this->Flash->success('Settings Update Successfully', array('key' => 'positive'));
            return $this->redirect(array('controller'=>'Administrations','action'=>'general'));
        }
        else
        {     
            $this->User->updateAll(array('User.business_email' => "'$bus_email'"), array('User.id' => $id));       
            $user = $this->BusinessSetting->query("INSERT INTO business_settings (time_zone,locale_region,user_id) VALUES ('$time_zone','$locale_region','$id')");
            $this->Flash->success('Settings Update Successfully', array('key' => 'positive'));
            return $this->redirect(array('controller'=>'Administrations','action'=>'general'));
        }

        //return $this->redirect(array('controller'=>'users','action'=>'social_media', 'admin' => true));
            

    }

    $this->set(compact('BusinessSetting','business_email','Multilocations'));
    //echo $this->Auth->user('business_email');die();
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}




////////////////////////////////////////////////////////////////////    

public function tabs(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $Menu = $this->Menu->findAllMenubyMenuOrder();
    //pr($Menu);die();
    $this->set(compact('Menu'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
  
}

////////////////////////////////////////////////////////////////////    

public function customer(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');
    if($this->request->is('post')){ 
        $this->Flash->success('Settings Saved..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'customer'));
    }
    //echo $this->Auth->user('business_email');die();
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


////////////////////////////////////////////////////////////////////    

public function invoice(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');
    $Disclaimer = $this->Disclaimer->findInvoiceDisclaimerByUserId($id);
    $Multilocation    = $this->Multilocation->findMultilocationNameByUserId($id);
    $TransferLocation = $this->TransferLocation->findTransferLocationByUserId($id);
    //pr($Multilocation);pr($TransferLocation);die();
    if(empty($Disclaimer))
    {
        $result = $this->ProductCategory->query("INSERT INTO disclaimers (user_id,invoice_disclaimer) VALUES ('$id','')");
    }
    if($this->request->is('post')){ 
        $this->Flash->success('Settings Saved..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'invoice'));
    }
    //echo $this->Auth->user('business_email');die();
    $this->data = $Disclaimer ;
    $this->set(compact('Disclaimer','Multilocation','TransferLocation'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

////////////////////////////////////////////////////////////////////    

public function estimates(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');
    $Disclaimer = $this->Disclaimer->findEstimateDisclaimerByUserId($id);
    $Multilocation    = $this->Multilocation->findMultilocationNameByUserId($id);
    $TransferLocation = $this->TransferLocation->findTransferLocationByUserId($id);
    //pr($Disclaimer);die();
    if(empty($Disclaimer))
    {
        $result = $this->ProductCategory->query("INSERT INTO disclaimers (user_id,estimate_disclaimer) VALUES ('$id','')");
    }
        
        
    

    if($this->request->is('post')){ 
        $this->Flash->success('Settings Saved..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'estimates'));
    }
    //echo $this->Auth->user('business_email');die();
    $this->data = $Disclaimer ;
    $this->set(compact('Disclaimer','Multilocation','TransferLocation'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

////////////////////////////////////////////////////////////////////    

public function tickets(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');

    $ticketcategory = $this->TicketCategory->findTicketCategoriesByUserId($id);
    //pr($ticketcategory);die();
    if(empty($ticketcategory))
    {
        $array = array('Virus', 'TuneUp','Software','Other');
        //pr($array);die();
        foreach ($array as $value) 
        {
            //pr($value);
            $user_id  = $id;
            $category = $value;
            
            $result = $this->ProductCategory->query("INSERT INTO ticket_categories (user_id,category) VALUES ('$user_id','$category')");
            
           //pr($result);
         
        }     
    }
    $Multilocation    = $this->Multilocation->findMultilocationNameByUserId($id);
    $TransferLocation = $this->TransferLocation->findTransferLocationByUserId($id);
    //pr($TransferLocation);die();
    if($this->request->is('post')){ 
        $this->Flash->success('Settings Saved..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'tickets'));
    }
    //echo $this->Auth->user('business_email');die();
    $this->set(compact('ticketcategory','Multilocation','TransferLocation'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

////////////////////////////////////////////////////////////////////    

public function parts(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');
    if($this->request->is('post')){ 
        $this->Flash->success('Settings Saved..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'parts'));
    }
    //echo $this->Auth->user('business_email');die();
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

///////////////////////////////////////////////////////////////////    

public function inventory(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');
    $productcategory = $this->ProductCategory->findProductCategoriesByUserId($id);
    //pr($productcategory);die();
    if(empty($productcategory))
    {
        $array = array('Default', 'Hardware','iPhone','Labor');
        //pr($array);die();
        foreach ($array as $value) 
        {
            //pr($value);
            $user_id  = $id;
            $category = $value;
            
            $result = $this->ProductCategory->query("INSERT INTO product_categories (user_id,category) VALUES ('$user_id','$category')");
            
           //pr($result);
         
        }
        
        
    }
    if($this->request->is('post')){ 
        $this->Flash->success('Settings Saved..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'inventory'));
    }
    //echo $this->Auth->user('business_email');die();
  
    $this->set(compact('productcategory'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

///////////////////////////////////////////////////////////////////    

public function pos(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');
    if($this->request->is('post')){ 
        $this->Flash->success('Settings Saved..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'pos'));
    }
    //echo $this->Auth->user('business_email');die();
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

///////////////////////////////////////////////////////////////////    

public function leads(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');
    if($this->request->is('post')){ 
        $this->Flash->success('Settings Saved..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'leads'));
    }
    //echo $this->Auth->user('business_email');die();
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

///////////////////////////////////////////////////////////////////    

public function employee(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');
    $user = $this->User->findUserbyId($id);
    
    if($this->request->is('post')){ 
    	
    	$Administration = $this->request->data;
    	//pr($Administration);die();
    	$ips = $Administration['User']['allow_ip'];
    	$timeout_in_minute = $Administration['User']['timeout_in_minute'];
    	$login_pin = $Administration['User']['login_pin'];
    	$ip = explode(",", $ips);
    	
        $error = array();
    	foreach ($ip as $key => $value) {
    	 	 
    		if (filter_var($value, FILTER_VALIDATE_IP)) {
    			
			} 
			else {
				array_push($error,"Errors: Allowed Ips: Value '$value' is not a valid IP and will be ommitted");
				
			    //echo("$value is not a valid IP address");
			}
    	}
    	if(!empty($error))
    	{
    		$this->set(compact('error'));
    	}
    	else{
    		$this->User->updateAll(array('User.allow_ip' => "'$ips'",'User.timeout_in_minute' => "'$timeout_in_minute'",'User.login_pin' => "'$login_pin'"), array('User.id' => $id));
    		
    		
    		$this->Flash->success('Settings Saved..', array('key' => 'positive'));
        	return $this->redirect(array('controller'=>'Administrations','action'=>'employee'));
    	}
// Validate ip
    	//pr($error);die();
       
  	
    }
    $this->data = $user ;
    $this->set(compact('user'));
    //echo $this->Auth->user('business_email');die();
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

///////////////////////////////////////////////////////////////////    

public function users(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $id = $this->Auth->user('id');

	$users = $this->User->findUserbyId($id);
	//pr($user);die();
   
    //echo $this->Auth->user('business_email');die();
    $this->data = $users ;
	$this->set(compact('users'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


////////////////////////////////////////////////////////////////////    

public function menuupdate(){
    
    $this->layout="frontenduser";
    $menu_data = $this->request->data('menu_data');
    $user_id = $this->Auth->user('id');
  
    if ($this->request->is('ajax'))
    {
        $this->User->query("UPDATE users SET menu_order = '$menu_data' WHERE id = $user_id");
    }
    exit(); 
    
  
}

////////////////////////////////////////////////////////////////////    

public function menuupdatenull(){
    
    $this->layout="frontenduser";
    $user_id = $this->Auth->user('id');
  
    if ($this->request->is('ajax'))
    {
        $this->User->query("UPDATE users SET menu_order = '' WHERE id = $user_id");
    }
    exit(); 
    
  
}

////////////////////////////////////////////////////////////////////    

public function updateusermenu(){
    
    $this->layout="frontenduser";
    $user_id = $this->Auth->user('id');
    $menu_id = $this->request->data('menu_id');
    if ($this->request->is('ajax'))
    {
        $user = $this->UserMenu->query("INSERT INTO user_menus (user_id,menu_id) VALUES ('$user_id','$menu_id')");
    }
    exit(); 
    
  
}

////////////////////////////////////////////////////////////////////    

public function deleteusermenu(){
    
    $this->layout="frontenduser";
    $user_id = $this->Auth->user('id');
    $menu_id = $this->request->data('menu_id');
    if ($this->request->is('ajax'))
    {
        $this->UserMenu->deleteAll(['UserMenu.user_id'=>$user_id,'UserMenu.menu_id'=>$menu_id]);
    }
    exit(); 
    
  
}

/////////////////////////////////////////////


public function newproductcategory(){
    
    $this->layout="frontenduser";
    $user_id = $this->Auth->user('id');
    $user = $this->ProductCategory->query("INSERT INTO product_categories (user_id,category) VALUES ('$user_id','Null')");

    $this->Flash->success('Category Add Successfully..', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'Administrations','action'=>'inventory'));
    
}

//////////////////////////////////////////////////////////////////

public function deleteproductcategory($productcategory_id){
    
    $this->layout="frontenduser";
   
    $this->ProductCategory->deleteAll(['ProductCategory.id'=>$productcategory_id]);
    $this->Flash->success('Category Deleted..', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'Administrations','action'=>'inventory'));
    
}
////////////////////////////////////////////////////////////////////    

public function updateproductcategory(){
    
    $this->layout="frontenduser";
    $category = $this->request->data('category');
    $productcat_id = $this->request->data('productcat_id');
    if ($this->request->is('ajax'))
    {
        $this->ProductCategory->updateAll(array('category' => "'$category'"),array('id' => $productcat_id));
    }
    exit(); 
  
}


//////////////////////////////////////////////////////////////////

public function updateestimatedisclaimer(){
    
    $this->layout="frontenduser";
    if($this->request->is('post')){
        $data = $this->request->data;
        //pr($data);die();
        $user_id = $this->Auth->user('id');
        $disclaimer = $data['Disclaimer']['estimate_disclaimer'];
        $this->Disclaimer->updateAll(array('estimate_disclaimer' => "'$disclaimer'"),array('user_id' => $user_id));
        $this->Flash->success('Disclaimer Update Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'estimates'));
    }
    
}


//////////////////////////////////////////////////////////////////

public function updateinvoicedisclaimer(){
    
    $this->layout="frontenduser";
    if($this->request->is('post')){
        $data = $this->request->data;
        //pr($data);die();
        $user_id = $this->Auth->user('id');
        $disclaimer = $data['Disclaimer']['invoice_disclaimer'];
        $this->Disclaimer->updateAll(array('invoice_disclaimer' => "'$disclaimer'"),array('user_id' => $user_id));
        $this->Flash->success('Disclaimer Update Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'invoice'));
    }
    
}


//////////////////////////////////////////////////////////////////

public function updateticketdisclaimer(){
    
    $this->layout="frontenduser";
    if($this->request->is('post')){
        $data = $this->request->data;
        //pr($data);die();
        $user_id = $this->Auth->user('id');
        $disclaimer = $data['Disclaimer']['ticket_disclaimer'];
        $this->Disclaimer->updateAll(array('ticket_disclaimer' => "'$disclaimer'"),array('user_id' => $user_id));
        $this->Flash->success('Disclaimer Update Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'tickettemplate'));
    }
    
}


/////////////////////////////////////////////


public function newticketcategory(){
    
    $this->layout="frontenduser";
    $user_id = $this->Auth->user('id');
    $user = $this->TicketCategory->query("INSERT INTO ticket_categories (user_id,category) VALUES ('$user_id','Null')");

    $this->Flash->success('Category Add Successfully..', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'Administrations','action'=>'tickets'));
    
}

//////////////////////////////////////////////////////////////////

public function deleteticketcategory($ticketcategory_id){
    
    $this->layout="frontenduser";
   
    $this->TicketCategory->deleteAll(['TicketCategory.id'=>$ticketcategory_id]);
    $this->Flash->success('Category Deleted..', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'Administrations','action'=>'tickets'));
    
}
////////////////////////////////////////////////////////////////////    

public function updateticketcategory(){
    
    $this->layout="frontenduser";
    $category = $this->request->data('category');
    $ticketcat_id = $this->request->data('ticketcat_id');
    if ($this->request->is('ajax'))
    {
        $this->TicketCategory->updateAll(array('category' => "'$category'"),array('id' => $ticketcat_id));
    }
    exit(); 
  
}

///////////////////////////////////////////////////////////////////

public function ticketproductcategory(){
    
    $this->layout="frontenduser";
    $user_id = $this->Auth->user('id');
    $user = $this->ProductCategory->query("INSERT INTO ticket_categories (user_id,category) VALUES ('$user_id','Null')");

    $this->Flash->success('Category Add Successfully..', array('key' => 'positive'));
    return $this->redirect(array('controller'=>'Administrations','action'=>'tickets'));
    
}

//////////////////////////////////////////////////////////////////


public function templates(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
    
}

/* Invoice Template */
//////////////////////////////////////////////////////////////////


public function invoicetemplate(){
    if($this->Auth->user('id')!='')
    {
    //die();
    $this->layout     = "frontenduser";
    $user_id          = $this->Auth->user('id');
    $invoicetemplate  = $this->Template->findInvoiceTemplateByUserId($user_id);
    $Login_user       = $this->User->findUserbyId($user_id);
    $Invoice          = $this->Invoice->findLastInvoiceByLoginId($user_id);
    
    $Invoice_user     = '';
    
    
    if(!empty($Invoice)){
        $invoice_user_id = $Invoice['Invoice']['user_id'];
        $Invoice_user    = $this->User->findUserbyId($invoice_user_id);
       // pr($Ticket_user);die();
    }
    //pr($invoicetemplate);die(); 
    $default_invoice_template = $this->Default_Invoice_Template();
    if(empty($invoicetemplate))
    {
        $user = $this->Template->query("INSERT INTO templates (user_id,invoice_template) VALUES ('$user_id','$default_invoice_template')");
    }
    elseif($invoicetemplate['Template']['invoice_template']==''){
        $this->Template->updateAll(array('invoice_template' => "'$default_invoice_template'"),array('user_id' => $user_id));
    }
    $Disclaimer = $this->Disclaimer->findInvoiceDisclaimerByUserId($user_id);
    //pr($tickettemplate);die();
    if(empty($Disclaimer))
    {
        $result = $this->Disclaimer->query("INSERT INTO disclaimers (user_id,invoice_disclaimer) VALUES ('$user_id','')");
    }
    //pr($Invoice_user);die();
    $this->set(compact('invoicetemplate','Disclaimer','Login_user','Invoice','Invoice_user'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

//////////////////////////////////////////////////////////////////


public function invoicetemplateedit(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $user_id = $this->Auth->user('id');
    $invoicetemplate = $this->Template->findInvoiceTemplateByUserId($user_id);
    //pr($invoicetemplate);die();
    $this->set(compact('invoicetemplate'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

//////////////////////////////////////////////////////////////////

public function updateinvoicetemplate(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    if($this->request->is('post')){
        $data = $this->request->data;
        //pr($data);die();
        $user_id = $this->Auth->user('id');
        $invoice_template = $data['invoice_template'];
        $this->Template->updateAll(array('invoice_template' => "'$invoice_template'"),array('user_id' => $user_id));
        $this->Flash->success('Template Update Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'invoicetemplateedit'));
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


////////////////////////////////////////////////////////////////////

public function resetinvoicetemplate(){
    if($this->Auth->user('id')!='')
    {
        $this->layout="frontenduser";
        $user_id = $this->Auth->user('id');
        $ticket_template = "data";
        $default_invoice_template = $this->Default_Invoice_Template();
        
        $this->Template->updateAll(array('invoice_template' => "'$default_invoice_template'"),array('user_id' => $user_id));
        $this->Flash->success('Template Reset Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'invoicetemplate'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

//////////////////////////////////////////////////////////////////



public function updateinvoicedisclaimerTemplate(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    if($this->request->is('post')){
        $data = $this->request->data;
        //pr($data);die();
        $user_id = $this->Auth->user('id');
        $disclaimer = $data['Disclaimer']['invoice_disclaimer'];
        $this->Disclaimer->updateAll(array('invoice_disclaimer' => "'$disclaimer'"),array('user_id' => $user_id));
        $this->Flash->success('Disclaimer Update Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'invoicetemplate'));
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}



//////////////////////////////////////////////////////////////////
/*Ticket Template*/

public function tickettemplate(){
    if($this->Auth->user('id')!='')
    {
    $this->layout     = "frontenduser";
    $user_id          = $this->Auth->user('id');
    $tickettemplate   = $this->Template->findTicketTemplateByUserId($user_id);
    $Login_user       = $this->User->findUserbyId($user_id);
    $Ticket           = $this->Ticket->findLastTicketByLoginId($user_id);
    $Ticket_user      = '';
    
    //pr($Ticket);
    if(!empty($Ticket)){
        $ticket_user_id = $Ticket['Ticket']['user_id'];
        $Ticket_user    = $this->User->findUserbyId($ticket_user_id);
       // pr($Ticket_user);die();
    }
    //pr($Ticket);die(); 
    $default_ticket_template = $this->Default_Ticket_Template();
    if(empty($tickettemplate))
    {
        $user = $this->Template->query("INSERT INTO templates (user_id,ticket_template) VALUES ('$user_id','$default_ticket_template')");
    }
    elseif($tickettemplate['Template']['ticket_template']==''){
        $this->Template->updateAll(array('ticket_template' => "'$default_ticket_template'"),array('user_id' => $user_id));
    }
    $Disclaimer = $this->Disclaimer->findTicketDisclaimerByUserId($user_id);
    //pr($tickettemplate);die();
    if(empty($Disclaimer))
    {
        $result = $this->Disclaimer->query("INSERT INTO disclaimers (user_id,ticket_disclaimer) VALUES ('$user_id','')");
    }

    $this->set(compact('tickettemplate','Disclaimer','Login_user','Ticket','Ticket_user'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

//////////////////////////////////////////////////////////////////


public function tickettemplateedit(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $user_id = $this->Auth->user('id');
    $tickettemplate = $this->Template->findTicketTemplateByUserId($user_id);
    //pr($tickettemplate);die();
    $this->set(compact('tickettemplate'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

//////////////////////////////////////////////////////////////////

public function updatetickettemplate(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    if($this->request->is('post')){
        $data = $this->request->data;
        //pr($data);die();
        $user_id = $this->Auth->user('id');
        $ticket_template = $data['ticket_template'];
        $this->Template->updateAll(array('ticket_template' => "'$ticket_template'"),array('user_id' => $user_id));
        $this->Flash->success('Template Update Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'tickettemplateedit'));
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


public function resettickettemplate(){
    if($this->Auth->user('id')!='')
    {
        $this->layout="frontenduser";
        $user_id = $this->Auth->user('id');
        $ticket_template = "data";
        $default_ticket_template = $this->Default_Ticket_Template();
        
        $this->Template->updateAll(array('ticket_template' => "'$default_ticket_template'"),array('user_id' => $user_id));
        $this->Flash->success('Template Reset Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'tickettemplate'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
    }



/* Estimate Template */
//////////////////////////////////////////////////////////////////


public function estimatetemplate(){
    //die();
    if($this->Auth->user('id')!='')
    {
    $this->layout     = "frontenduser";
    $user_id          = $this->Auth->user('id');
    $estimatetemplate = $this->Template->findEstimateTemplateByUserId($user_id);
    $Login_user       = $this->User->findUserbyId($user_id);
    $Estimate         = $this->Estimate->findLastEstimateByLoginId($user_id);
    
    $Estimate_user    = '';
    
    //pr($Estimate);die();
    if(!empty($Estimate)){
        $estimate_user_id = $Estimate['Estimate']['user_id'];
        $Estimate_user    = $this->User->findUserbyId($estimate_user_id);
        //pr($Estimate_user);die();
    }
    //pr($estimatetemplate);die(); 
    $default_estimate_template = $this->Default_Estimate_Template();
    if(empty($estimatetemplate))
    {
        $user = $this->Template->query("INSERT INTO templates (user_id,estimate_template) VALUES ('$user_id','$default_estimate_template')");
    }
    elseif($estimatetemplate['Template']['estimate_template']==''){
        $this->Template->updateAll(array('estimate_template' => "'$default_estimate_template'"),array('user_id' => $user_id));
    }
    $Disclaimer = $this->Disclaimer->findEstimateDisclaimerByUserId($user_id);
    //pr($Disclaimer);die();
    if(empty($Disclaimer))
    {
        $result = $this->Disclaimer->query("INSERT INTO disclaimers (user_id,estimate_disclaimer) VALUES ('$user_id','')");
    }
    //pr($Invoice_user);die();
    $this->set(compact('estimatetemplate','Disclaimer','Login_user','Estimate','Estimate_user'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

//////////////////////////////////////////////////////////////////


public function estimatetemplateedit(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $user_id = $this->Auth->user('id');
    $estimatetemplate = $this->Template->findEstimateTemplateByUserId($user_id);
    //pr($invoicetemplate);die();
    $this->set(compact('estimatetemplate'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

//////////////////////////////////////////////////////////////////

public function updateestimatetemplate(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    if($this->request->is('post')){
        $data = $this->request->data;
        //pr($data);die();
        $user_id = $this->Auth->user('id');
        $estimate_template = $data['estimate_template'];
        $this->Template->updateAll(array('estimate_template' => "'$estimate_template'"),array('user_id' => $user_id));
        $this->Flash->success('Template Update Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'estimatetemplateedit'));
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
    
}


////////////////////////////////////////////////////////////////////

public function resetestimatetemplate(){
    if($this->Auth->user('id')!='')
    {
        $this->layout="frontenduser";
        $user_id = $this->Auth->user('id');
        $default_estimate_template = $this->Default_Estimate_Template();
        
        $this->Template->updateAll(array('estimate_template' => "'$default_estimate_template'"),array('user_id' => $user_id));
        $this->Flash->success('Template Reset Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'estimatetemplate'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

//////////////////////////////////////////////////////////////////



public function updateestimatedisclaimerTemplate(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    if($this->request->is('post')){
        $data = $this->request->data;
        //pr($data);die();
        $user_id = $this->Auth->user('id');
        $disclaimer = $data['Disclaimer']['estimate_disclaimer'];
        $this->Disclaimer->updateAll(array('estimate_disclaimer' => "'$disclaimer'"),array('user_id' => $user_id));
        $this->Flash->success('Disclaimer Update Successfully..', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'Administrations','action'=>'estimatetemplate'));
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


public function employeeipcheck(){
    
    $this->layout="frontenduser";
    $ips = $this->request->data('ip');
   
    if ($this->request->is('ajax'))
    {
    	$ip = explode(",", $ips);
    	foreach ($ip as $key => $value) {
    	 	 
    		if (filter_var($value, FILTER_VALIDATE_IP)) {
    			echo("$value is a valid IP address");
			} 
			else {
			    echo("$value is not a valid IP address");
			}
    	}
    }
    exit(); 
  
}

//////////////////////////////////////////////////////////////////////////

public function addnewmultilocation()
{
    $this->layout="frontenduser";
    $this->set('title','Add New Location');
    if($this->request->is('post'))
    {
        $Multilocation =$this->request->data;
        //pr($Multilocation);die();
        $save = $this->Multilocation->addNewMultilocation($Multilocation);
        $this->Flash->success('Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Administrations","action" => "general"));
    }
}


//////////////////////////////////////////////////////////////////////////

public function GetMultiLocationValueByID()
{
	$this->layout="frontenduser";
    $multilocation_id = $this->request->data('multilocation_id');
    
    if ($this->request->is('ajax'))
    {
        $multilocation = $this->Multilocation->findMultilocationById($multilocation_id);
        pr($multilocation);
    }
    exit();
}

////////////////////////////////////////////////////////////////////////


public function editingmultilocation($id)
{
    $this->layout="frontenduser";
    $this->set('title','Add New Location');
    $Multilocation = $this->Multilocation->findMultilocationById($id);
    //pr($Multilocation);die();
    if($this->request->is('post'))
    {
        $data =$this->request->data;
        $save = $this->Multilocation->editMultilocationbyId($data,$id);
        $this->Flash->success('Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Administrations","action" => "general"));
    }
    $this->data = $Multilocation ;
    $this->set(compact('Multilocation'));
}

//////////////////////////////////////////////////////////////////////////

public function deletemultilocation($multilocation_id)
{
    $save = $this->Multilocation->deleteMultiLocation($multilocation_id);
    $this->Flash->success('Delete Successfully!', array('key' => 'positive'));
    $this->redirect(array("controller" => "Administrations","action" => "general"));    
}


//////////////////////////////////////////////////////////////////////////
public function UpdateMultiLocationInUserPackage(){
    $this->layout="frontenduser";
    $multilocation = $this->request->data('multilocation');
    $user_id = $this->Auth->user('id');
    if ($this->request->is('ajax'))
    {
        $this->UserPackage->updateAll(array('multilocation' => "'$multilocation'"),array('user_id' => $user_id));
    }
    exit();
}


///////////////////////////////////////////////////////////////////////////

public function ticketlocationtransfer(){
	$this->layout="frontenduser";    
    $user_id = $this->Auth->user('id');
    $TransferLocation = $this->TransferLocation->findTransferLocationByUserId($user_id);
    //pr($TransferLocation);die();
    if($this->request->is('post'))
    {
        $Location =$this->request->data;
        $from_ticket = $Location['TransferLocation']['from_ticket'];
        $to_ticket   = $Location['TransferLocation']['to_ticket'];
        //pr($Multilocation);die();
        if(empty($TransferLocation))
        {
       		$this->TransferLocation->addTransferLocation($Location);
       	}
       	else
       	{
       		$this->TransferLocation->updateAll(array('from_ticket' => "'$from_ticket'",'to_ticket' => "'$to_ticket'"),array('user_id' => $user_id));
       	}
        $this->Flash->success('Transfer Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Administrations","action" => "tickets"));
    }
}

///////////////////////////////////////////////////////////////////////////

public function invoicelocationtransfer(){
    $this->layout="frontenduser";    
    $user_id = $this->Auth->user('id');
    $TransferLocation = $this->TransferLocation->findTransferLocationByUserId($user_id);
    //pr($TransferLocation);die();
    if($this->request->is('post'))
    {
        $Location =$this->request->data;
        //pr($Location);die();
        $from_invoice = $Location['TransferLocation']['from_invoice'];
        $to_invoice   = $Location['TransferLocation']['to_invoice'];
        
        if(empty($TransferLocation))
        {
            $this->TransferLocation->addTransferLocation($Location);
        }
        else
        {
            $this->TransferLocation->updateAll(array('from_invoice' => "'$from_invoice'",'to_invoice' => "'$to_invoice'"),array('user_id' => $user_id));
        }
        $this->Flash->success('Transfer Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Administrations","action" => "invoice"));
    }
}

///////////////////////////////////////////////////////////////////////////

public function estimatelocationtransfer(){
    $this->layout="frontenduser";    
    $user_id = $this->Auth->user('id');
    $TransferLocation = $this->TransferLocation->findTransferLocationByUserId($user_id);
    //pr($TransferLocation);die();
    if($this->request->is('post'))
    {
        $Location =$this->request->data;
        $from_estimate = $Location['TransferLocation']['from_estimate'];
        $to_estimate   = $Location['TransferLocation']['to_estimate'];
        //pr($Multilocation);die();
        if(empty($TransferLocation))
        {
            $this->TransferLocation->addTransferLocation($Location);
        }
        else
        {
            $this->TransferLocation->updateAll(array('from_estimate' => "'$from_estimate'",'to_estimate' => "'$to_estimate'"),array('user_id' => $user_id));
        }
        $this->Flash->success('Transfer Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Administrations","action" => "estimates"));
    }
}


}