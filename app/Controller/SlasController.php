<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class SlasController extends AppController {

public $uses = array('Sla','Product','User','Purchase','Comment','Phone','Note','Attachment','Email','Reminder','SlaPricing','Inventory');

public function admin_add() 
{
    $this->set('title','Add Sla');
    if($this->request->is('post'))
    {
        $Sla=$this->request->data;
       // pr($Sla);die();
        $save = $this->Sla->addSlaAdmin($Sla);
        $this->Flash->success('Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Slas","action" => "slalist"));
    }
}


////////////////////////////////////////////////////////////////////

public function admin_slaedit($id){
    $this->set('title','Edit Sla');

    $Sla= $this->Sla->findSlabyId($id); // Get Sla Detail from id
    //pr($Sla);die();
  
    if($this->request->is('post'))
    {
        $Sla=$this->request->data;
        //pr($Sla);die();
        $save = $this->Sla->editSlabyId($Sla,$id);
        $this->Flash->success('Sla Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Slas","action" => "slalist"));
   	}

    $this->data = $Sla ;
    $this->set(compact('Sla'));
    
}

////////////////////////////////////////////////////////////////////

public function admin_deleteSla($id){
    $this->Sla->deleteSla($id);
    $this->Flash->success('Sla Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Slas","action"=>"slalist"));
    
}


// /////////////////////////////////////////////////////////////////

public function admin_slalist()
{
    $this->set('title','Sla List');
    $Slas = $this->Sla->allSlas();
    //$Slas = $this->Sla->query("SELECT Slas.*, users.first_name ,users.last_name FROM Slas  INNER JOIN users ON Slas.user_id = users.id");
   // pr($Slas);die();
    $this->set('Slas', $Slas);
}

////////////////////////////////////////////////////////////////////    

public function admin_slaview($id){
$this->set('title','Profile');
    $Sla = $this->Sla->findSlabyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Sla->editSlabyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Slas','action'=>'Slaview'));
    }
    $this->data = $Sla ; 
    $this->set(compact('Sla'));
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
    $this->set('title','Add Sla');
    if($this->request->is('post'))
    {
        $Sla=$this->request->data;
       // pr($Sla);die();
        $save = $this->Sla->addSlaAdmin($Sla);
        $this->Flash->success('Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Slas","action" => "slalist"));
    }
}


////////////////////////////////////////////////////////////////////

public function slaedit($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Sla');

    $Sla= $this->Sla->findSlabyId($id); // Get Sla Detail from id
    //pr($Sla);die();
  
    if($this->request->is('post'))
    {
        $Sla=$this->request->data;
        //pr($Sla);die();
        $save = $this->Sla->editSlabyId($Sla,$id);
        $this->Flash->success('Sla Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Slas","action" => "slalist"));
    }

    $this->data = $Sla ;
    $this->set(compact('Sla'));
    
}

////////////////////////////////////////////////////////////////////

public function deleteSla($id){
    $this->layout="frontenduser";
    $this->Sla->deleteSla($id);
    $this->Flash->success('Sla Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Slas","action"=>"slalist"));
    
}


// /////////////////////////////////////////////////////////////////

public function slalist()
{
    $this->layout="frontenduser";
    $this->set('title','Sla List');
    $session_id = $this->Session->read('Auth.User.id');
    $Slas = $this->Sla->findallSlasByLoginId($session_id);
    //$Slas = $this->Sla->query("SELECT Slas.*, users.first_name ,users.last_name FROM Slas  INNER JOIN users ON Slas.user_id = users.id");
   // pr($Slas);die();
    $this->set('Slas', $Slas);
}

////////////////////////////////////////////////////////////////////    

public function slaview($id){
    $this->layout="frontenduser";
    $this->set('title','Profile');
    $Sla = $this->Sla->findSlabyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Sla->editSlabyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Slas','action'=>'Slaview'));
    }
    $this->data = $Sla ; 
    $this->set(compact('Sla'));
}


//////////////////////////////////////////////////////////////////////////





}