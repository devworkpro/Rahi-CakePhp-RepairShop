<?php
App::uses('AppController', 'Controller');
class PackagesController extends AppController {

public $uses = array('Package');

public function admin_add() 
{
	
	//$users = $this->User->find('list', array('conditions'=>array('User.id'=>1)));
	//$cat=$this->Package->find('list',array('fields'=>array('Package'),'conditions'=>array('parent_id'=>0))); 
		
	$this->set('title','Add Package');
	$this->Package->set($this->request->data);
	if($this->request->is('post')){
		//pr($this->request->data); die();
		
		if($this->Package->save($this->request->data))
		{
			
			$this->Flash->success('Package added Successfully', array('key' => 'positive'));
			 $this->redirect(array('action'=>'packagelist'));
		}
	}
	  
}


public function admin_Packageedit($id){
	$this->set('title','Edit Package');

	$Package= $this->Package->findPackagebyId($id); // Get User Detail from id
	
	if($this->request->is('post'))
	{ 
			
		//pr($this->request->data); die();
		
		$this->Package->editPackagebyId($this->request->data,$id);
		$this->Flash->success('Successfully Edited Package', array('key' => 'positive'));		
		return $this->redirect(array('controller'=>'Packages','action'=>'packagelist'));

		

	}
	$this->data = $Package ;
	$this->set(compact('Package'));
}

////////////////////////////////////////

public function admin_deletePackage($id){
	$this->Package->deletePackage($id);
	$this->Flash->success('Package Deleted Successfully', array('key' => 'positive'));	
	return $this->redirect(array('controller'=>'Packages','action'=>'packagelist'));
}






///////////////////////////////////////////////////////////

public function admin_packagelist()
{
	$this->set('title','Package List');
    

	$Packages = $this->Package->allPackages();
	//echo '<pre>';print_r($Packages);die();
	$this->set('Packages', $Packages);
	



}
	

///////////////////////////////////////////////////

public function admin_Packageview($id){
$this->set('title','Profile');
	$Package = $this->Package->findPackagebyId($id);
	
	if($this->request->is('post'))
	{  
		$this->Flash->success('Successfully Edited', array('key' => 'positive'));
		$this->Package->editPackagebyId($this->request->data,$id);
		return $this->redirect(array('controller'=>'Packages','action'=>'Packageview'));
    }
	$this->data = $Package ; 
	$this->set(compact('Package'));
}

///////////////////////////////////////////////////
public function admin_paypalsetting($id){
$this->set('title','PaypalAccount');
	$PaypalAccount  = $this->PaypalAccount->findPaypalAccountDetails();
	
	if($this->request->is('post'))
	{  
		$this->PaypalAccount->editPaypalAccount($this->request->data);
		$this->Flash->success('Successfully Updated', array('key' => 'positive'));
		return $this->redirect(array('controller'=>'Packages','action'=>'paypalsetting'));
    }
	$this->data = $PaypalAccount ; 
	$this->set(compact('PaypalAccount'));
}


/////////////////////////////////////////////////



}