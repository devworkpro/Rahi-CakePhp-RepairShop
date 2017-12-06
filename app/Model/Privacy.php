<?php
App::uses('AppModel', 'Model');
class Privacy extends AppModel {
	
 var $name = 'Privacy';
 public $useTable = 'privacy';



	public function allPrivacy($userid){
					return $this->find('all', array(
			    	'joins' => array(
			        array(
			            'table' => 'user_privacy',
			            'alias' => 'UserPrivacy',
			            'type' => 'LEFT',
			            'conditions' => array(
			                
			                'UserPrivacy.user_id='.$userid,
			                'UserPrivacy.privacy_id = Privacy.id'
			            )
			        ),
			    ),
			    	 'fields'=>array('UserPrivacy.*', 'Privacy.*'),
			));
	}


	public function userPrivacy($userid){
	//	return $this->find('all',array('conditions'=>array('UserPrivacy.user_id'=>$userid)));
	}

}

 ?>
