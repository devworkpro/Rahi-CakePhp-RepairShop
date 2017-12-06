<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class MenusController extends AppController {

public $uses = array('Menu','Product','User','Purchase','Comment','Phone','Note','Attachment','Email','Reminder','MenuPricing','Inventory');

public function admin_add() 
{
    $this->set('title','Add Menu');
    if($this->request->is('post'))
    {
        $Menu=$this->request->data;
       // pr($Menu);die();
        $save = $this->Menu->addMenuAdmin($Menu);
        $this->Flash->success('Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Menus","action" => "menulist"));
    }
}


////////////////////////////////////////////////////////////////////

public function admin_menuedit($id){
    $this->set('title','Edit Menu');

    $Menu= $this->Menu->findMenubyId($id); // Get Menu Detail from id
    //pr($Menu);die();
  
    if($this->request->is('post'))
    {
        $Menu=$this->request->data;
        //pr($Menu);die();
        $save = $this->Menu->editMenubyId($Menu,$id);
        $this->Flash->success('Menu Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Menus","action" => "menulist"));
   	}

    $this->data = $Menu ;
    $this->set(compact('Menu'));
    
}

////////////////////////////////////////////////////////////////////

public function admin_deleteMenu($id){
    $this->Menu->deleteMenu($id);
    $this->Flash->success('Menu Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Menus","action"=>"menulist"));
    
}


// /////////////////////////////////////////////////////////////////

public function admin_menulist()
{
    $this->set('title','Menu List');
    $Menus = $this->Menu->allMenus();
    //$Menus = $this->Menu->query("SELECT Menus.*, users.first_name ,users.last_name FROM Menus  INNER JOIN users ON Menus.user_id = users.id");
   // pr($Menus);die();
    $this->set('Menus', $Menus);
}

////////////////////////////////////////////////////////////////////    

public function admin_menuview($id){
$this->set('title','Profile');
    $Menu = $this->Menu->findMenubyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Menu->editMenubyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Menus','action'=>'Menuview'));
    }
    $this->data = $Menu ; 
    $this->set(compact('Menu'));
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
    $this->set('title','Add Menu');
    if($this->request->is('post'))
    {
        $Menu=$this->request->data;
       // pr($Menu);die();
        $save = $this->Menu->addMenuAdmin($Menu);
        $this->Flash->success('Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Menus","action" => "Menulist"));
    }
}


////////////////////////////////////////////////////////////////////

public function Menuedit($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Menu');

    $Menu= $this->Menu->findMenubyId($id); // Get Menu Detail from id
    //pr($Menu);die();
  
    if($this->request->is('post'))
    {
        $Menu=$this->request->data;
        //pr($Menu);die();
        $save = $this->Menu->editMenubyId($Menu,$id);
        $this->Flash->success('Menu Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Menus","action" => "Menulist"));
    }

    $this->data = $Menu ;
    $this->set(compact('Menu'));
    
}

////////////////////////////////////////////////////////////////////

public function deleteMenu($id){
    $this->layout="frontenduser";
    $this->Menu->deleteMenu($id);
    $this->Flash->success('Menu Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Menus","action"=>"Menulist"));
    
}


// /////////////////////////////////////////////////////////////////

public function Menulist()
{
    $this->layout="frontenduser";
    $this->set('title','Menu List');
    $session_id = $this->Session->read('Auth.User.id');
    $Menus = $this->Menu->findallMenusByLoginId($session_id);
    //$Menus = $this->Menu->query("SELECT Menus.*, users.first_name ,users.last_name FROM Menus  INNER JOIN users ON Menus.user_id = users.id");
   // pr($Menus);die();
    $this->set('Menus', $Menus);
}

////////////////////////////////////////////////////////////////////    

public function Menuview($id){
    $this->layout="frontenduser";
    $this->set('title','Profile');
    $Menu = $this->Menu->findMenubyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Menu->editMenubyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Menus','action'=>'Menuview'));
    }
    $this->data = $Menu ; 
    $this->set(compact('Menu'));
}


//////////////////////////////////////////////////////////////////////////





}