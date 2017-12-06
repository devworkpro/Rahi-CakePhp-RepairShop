<?php
App::uses('AppModel', 'Model');
class UserPackage extends AppModel {
	
 var $name = 'UserPackage';

 	
 	public function findItemNameByUserId($user_id){
		return $this->find('first', array('conditions' => array('UserPackage.user_id' => $user_id),'fields'=>'UserPackage.item_name'));
		
	}

	public function findUserPackageByUserId($user_id){
		return $this->find('first', array('conditions' => array('UserPackage.user_id' => $user_id)));
		
	}

	

}
?>