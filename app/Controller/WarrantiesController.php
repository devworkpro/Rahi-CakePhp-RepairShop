<?php
App::uses('AppController', 'Controller');

class WarrantiesController extends AppController {

public $uses = array('Warranty','Product','User','Inventory','Ticket');


public function admin_add() 
{
    $this->set('title','Add Warranty');
   
    if($this->request->is('post'))
    {
        
        $save = $this->Warranty->addWarrantyAdmin($Warranty);
        $Warranty_id = $this->Warranty->getInsertID();
                
               
        $this->Flash->success('Warranty added Successfully', array('key' => 'positive'));

        $this->redirect(array("controller" => "warranties","action" => "warrantylist"));
                
           
    }

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_warrantyedit($id){
    $this->set('title','Edit Warranty');

    $Warranty= $this->Warranty->findWarrantybyId($id); // Get Warranty Detail from id
   
    if($this->request->is('post'))
    {
        $Warranty=$this->request->data;
        // pr($Warranty);die();
        $this->Warranty->editWarrantybyId($Warranty,$id);
        $this->Flash->success('Warranty Update Successfully', array('key'=>'positive'));
        $this->redirect(array("controller" => "warranties","action" => "warrantylist"));  
    }

    $this->data = $Warranty ;
    $this->set(compact('Warranty'));

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deleteWarranty($id){
    $this->Warranty->deleteWarranty($id);
    $this->Flash->success('Warranty Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'warranties','action'=>'warrantylist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_warrantylist()
{
    $Warranty = $this->Warranty->query("SELECT warranties.*, users.first_name ,users.last_name FROM warranties  INNER JOIN users ON warranties.user_id = users.id");
    //pr($Warranty);die();
    
    $this->set(compact('Warranty'));

   //echo "<pre>";print_r($Warranty); die();

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_warrantyview($id){
    $this->set('title','View Warranty');

    $Warranty= $this->Warranty->findWarrantybyId($id); // Get Warranty Detail from id
    //pr($Warranty);die();

    $this->data = $Warranty ;
    $this->set(compact('Warranty'));

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_warrantycertificate($id){
    $this->set('title','Warranty Certificate');

   //$Warranty= $this->Warranty->findWarrantybyId($id); // Get Warranty Detail from id
    $Warranty = $this->Warranty->query("SELECT warranties.*, users.first_name ,users.last_name FROM warranties  INNER JOIN users ON warranties.user_id = users.id where warranties.id= $id");
    //pr($Warranty);die();

    $this->data = $Warranty ;
    $this->set(compact('Warranty'));

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deleteInvoiceWarranty($id,$inv_id){
    $this->Warranty->deleteWarranty($id);
    $this->Flash->success('Warranty Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Invoices','action'=>'invoicedetails',$inv_id));
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
    $this->set('title','Add Warranty');
   
    if($this->request->is('post'))
    {
        
        $save = $this->Warranty->addWarrantyAdmin($Warranty);
        $Warranty_id = $this->Warranty->getInsertID();
                
               
        $this->Flash->success('Warranty added Successfully', array('key' => 'positive'));

        $this->redirect(array("controller" => "warranties","action" => "warrantylist"));
                
           
    }

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function warrantyedit($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Warranty');

    $Warranty= $this->Warranty->findWarrantybyId($id); // Get Warranty Detail from id
   
    if($this->request->is('post'))
    {
        $Warranty=$this->request->data;
        // pr($Warranty);die();
        $this->Warranty->editWarrantybyId($Warranty,$id);
        $this->Flash->success('Warranty Update Successfully', array('key'=>'positive'));
        $this->redirect(array("controller" => "warranties","action" => "warrantylist"));  
    }

    $this->data = $Warranty ;
    $this->set(compact('Warranty'));

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteWarranty($id){
    $this->layout="frontenduser";
    $this->Warranty->deleteWarranty($id);
    $this->Flash->success('Warranty Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'warranties','action'=>'warrantylist'));
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function warrantylist()
{
    $this->layout="frontenduser";
    $session_id = $this->Auth->user('id');
    $Warranty = $this->Warranty->query("SELECT warranties.*, users.first_name ,users.last_name FROM warranties  INNER JOIN users ON warranties.user_id = users.id where warranties.login_id = $session_id");
    //pr($Warranty);die();
    
    $this->set(compact('Warranty'));

   //echo "<pre>";print_r($Warranty); die();

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function warrantyview($id){
    $this->layout="frontenduser";
    $this->set('title','View Warranty');

    $Warranty= $this->Warranty->findWarrantybyId($id); // Get Warranty Detail from id
    //pr($Warranty);die();

    $this->data = $Warranty ;
    $this->set(compact('Warranty'));

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function warrantycertificate($id){
    $this->layout="frontenduser";
    $this->set('title','Warranty Certificate');

   //$Warranty= $this->Warranty->findWarrantybyId($id); // Get Warranty Detail from id
    $Warranty = $this->Warranty->query("SELECT warranties.*, users.first_name ,users.last_name FROM warranties  INNER JOIN users ON warranties.user_id = users.id where warranties.id= $id");
    //pr($Warranty);die();

    $this->data = $Warranty ;
    $this->set(compact('Warranty'));

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteInvoiceWarranty($id,$inv_id){
    $this->layout="frontenduser";
    $this->Warranty->deleteWarranty($id);
    $this->Flash->success('Warranty Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Invoices','action'=>'invoicedetails',$inv_id));
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////
}