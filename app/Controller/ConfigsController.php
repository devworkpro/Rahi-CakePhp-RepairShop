<?php
App::uses('AppController', 'Controller');
class ConfigsController extends AppController{
	public $components = array();
	var $uses=array('Bundle','User','Config');

	public function admin_editregusr($id=null){
	$userplan = $this->Bundle->find('first',array('conditions'=>array('Bundle.user_type'=>'registered user plans')));
		if($this->request->is('post')){
			$this->Bundle->id =1; 
            $this->Bundle->save($this->request->data);
			$this->Flash->success('Successfully Edited Registered User Plans', array('key' => 'positive'));	
			return $this->redirect(array('controller'=>'configs','action'=>'editregusr'));
		} 
		$this->set('bundle',$userplan); 	 
	}
	
    public function admin_paysetting($id=null){
		$paypalemail = $this->Config->find('first',array('conditions'=>array('Config.key'=>'paypal_email')));
		$paypaltype = $this->Config->find('first',array('conditions'=>array('Config.key'=>'paypal_type')));
	    $this->set('paypal_email',$paypalemail);
	    $this->set('paypal_type',$paypaltype);
        if($this->request->is('post')){
			//die('sss'); 
			echo '<pre>';print_r($this->request->data);			
			$paypal_email['Config']['value'] = $this->request->data['Config']['Paypal_email'];
			$paypal_type['Config']['value'] = $this->request->data['Config']['paypal_type'];
			$this->Config->id= 1;
			$this->Config->save($paypal_email);
			$this->Config->id = '2';
			$this->Config->save($paypal_type);

			$this->Flash->success('Successfully Edited Paypal Settings');	
			return $this->redirect(array('controller'=>'configs','action'=>'paysetting'));
		}	
    }
	
	
}


