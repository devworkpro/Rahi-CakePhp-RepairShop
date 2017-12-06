<?php App::uses('AppModel', 'Model');
class Group extends AppModel {
	
	//public $actsAs = array('Containable');

 var $name = 'Group';

 	public $belongsTo = array(
        'Message' => array(
            'foreignKey' => false
        )
    );

	//public $belongsTo = array('Message');

//////////////////////////////////////////////////

 	public function findByUserId($id){
 		return $this->find('all', array('conditions' => array('Group.receiver LIKE' => '%"'.$id.'"%')));
 	}
 	public function findById($id){
 		return $this->find('first', array('conditions' => array('Message.id' => $id)));
 	}

 	public function findMessage($id){
 		return $this->find('all', array(
					//'conditions' => array('Message.group_id' => 'Group.id'), 
					'order' => array('Message.timestamp' => 'Desc')
					));
 	}

 	public function readIt($id){
 		$this->id = $id;
 		$this->saveField('isread', 1);
 	}
 	public function unReadIt($id){
 		$this->id = $id;
 		$this->saveField('isread', 0);
 	}

 	public function deleteGroup($id){
		$this->id = $id;
		$this->delete(array('Group.id'=>$id));
	}

}
?>