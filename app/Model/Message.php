<?php
App::uses('AppModel', 'Model');
class Message extends AppModel {
	
 var $name = 'Message';

 //public $belongsTo = 'User';

	public $belongsTo = array(
		'User' => array('fields' => array('first_name', 'surname', 'email')) ,
		'Group'
		);

	public $validate = array(
        'receiver' => array(
	        'rule' => 'notBlank',
	        'message' => 'Please enter atleast one recipient.'
	    )
    );

//////////////////////////////////////////////////

	public function findByGroupId($id){
		return $this->find('all', array(
			'conditions' => array('Message.group_id' => $id),
			'order' => array('Message.timestamp' => 'Desc')
			));
	}
	public function findById($id){
		return $this->find('all', array(
			'conditions' => array('group.id' => 'Message.group_id'), 
			'order' => array('Message.timestamp' => 'Desc'),
			'recursive' => 1
			));
	}



}
?>