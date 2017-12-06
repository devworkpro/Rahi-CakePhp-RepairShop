<?php
App::uses('AppModel', 'Model');
class PaypalAccount extends AppModel {
	
 var $name = 'PaypalAccount';

 //public $belongsTo = 'User';

	public function findPaypalAccountDetails(){
		return $this->find('first',array('conditions'=>array('PaypalAccount.id'=>1)));
	}

	public function editPaypalAccount($data){
		$this->id = 1;
	 	return $this->save($data);
	 }

//////////////////////////////////////////////////

	

}
?>