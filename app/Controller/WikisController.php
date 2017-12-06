<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class WikisController extends AppController {

public $uses = array('Wiki','Product','User','Purchase','Comment','Phone','Note','Attachment','Email','Reminder','WikiPricing','Inventory');

public function admin_add() 
{
    $this->set('title','Add Wiki');
    if($this->request->is('post'))
    {
        $Wiki=$this->request->data;
       // pr($Wiki);die();
        $save = $this->Wiki->addWikiAdmin($Wiki);
        $this->Flash->success('Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Wikis","action" => "wikilist"));
    }
}


////////////////////////////////////////////////////////////////////

public function admin_wikiedit($id){
    $this->set('title','Edit Wiki');

    $Wiki= $this->Wiki->findWikibyId($id); // Get Wiki Detail from id
    //pr($Wiki);die();
  
    if($this->request->is('post'))
    {
        $Wiki=$this->request->data;
        //pr($Wiki);die();
        $save = $this->Wiki->editWikibyId($Wiki,$id);
        $this->Flash->success('Wiki Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Wikis","action" => "wikilist"));
   	}

    $this->data = $Wiki ;
    $this->set(compact('Wiki'));
    
}

////////////////////////////////////////////////////////////////////

public function admin_deleteWiki($id){
    $this->Wiki->deleteWiki($id);
    $this->Flash->success('Wiki Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Wikis","action"=>"wikilist"));
    
}


// /////////////////////////////////////////////////////////////////

public function admin_wikilist()
{
    $this->set('title','Wiki List');
    $Wikis = $this->Wiki->allWikis();
    //$Wikis = $this->Wiki->query("SELECT Wikis.*, users.first_name ,users.last_name FROM Wikis  INNER JOIN users ON Wikis.user_id = users.id");
   // pr($Wikis);die();
    $this->set('Wikis', $Wikis);
}

////////////////////////////////////////////////////////////////////    

public function admin_wikidetails($id){
$this->set('title','Profile');
    $Wiki = $this->Wiki->findWikibyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Wiki->editWikibyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Wikis','action'=>'Wikiview'));
    }
    $this->data = $Wiki ; 
    $this->set(compact('Wiki'));
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
    $this->set('title','Add Wiki');
    if($this->request->is('post'))
    {
        $Wiki=$this->request->data;
       // pr($Wiki);die();
        $save = $this->Wiki->addWikiAdmin($Wiki);
        $this->Flash->success('Add Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Wikis","action" => "Wikilist"));
    }
}


////////////////////////////////////////////////////////////////////

public function Wikiedit($id){
    $this->layout="frontenduser";
    $this->set('title','Edit Wiki');

    $Wiki= $this->Wiki->findWikibyId($id); // Get Wiki Detail from id
    //pr($Wiki);die();
  
    if($this->request->is('post'))
    {
        $Wiki=$this->request->data;
        //pr($Wiki);die();
        $save = $this->Wiki->editWikibyId($Wiki,$id);
        $this->Flash->success('Wiki Update Successfully!', array('key' => 'positive'));
        $this->redirect(array("controller" => "Wikis","action" => "Wikilist"));
    }

    $this->data = $Wiki ;
    $this->set(compact('Wiki'));
    
}

////////////////////////////////////////////////////////////////////

public function deleteWiki($id){
    $this->layout="frontenduser";
    $this->Wiki->deleteWiki($id);
    $this->Flash->success('Wiki Deleted Successfully',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Wikis","action"=>"Wikilist"));
    
}


// /////////////////////////////////////////////////////////////////

public function Wikilist()
{
    $this->layout="frontenduser";
    $this->set('title','Wiki List');
    $session_id = $this->Session->read('Auth.User.id');
    $Wikis = $this->Wiki->findallWikisByLoginId($session_id);
    //$Wikis = $this->Wiki->query("SELECT Wikis.*, users.first_name ,users.last_name FROM Wikis  INNER JOIN users ON Wikis.user_id = users.id");
   // pr($Wikis);die();
    $this->set('Wikis', $Wikis);
}

////////////////////////////////////////////////////////////////////    

public function wikidetails($id){
    $this->layout="frontenduser";
$this->set('title','Profile');
    $Wiki = $this->Wiki->findWikibyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->Wiki->editWikibyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Wikis','action'=>'Wikiview'));
    }
    $this->data = $Wiki ; 
    $this->set(compact('Wiki'));
}


//////////////////////////////////////////////////////////////////////////





}