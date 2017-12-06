<?php App::uses('AppModel', 'Model');
class Phone extends AppModel {
	
 var $name = 'Phone';

 public function addPhoneAdmin($data){
		//pr($data);
 	$this->create($data);
	 $this->save($data);

	}

	public function findbyUserid($id){
		return $this->find('all',array('conditions'=>array('Phone.user_id'=>$id)));
	}
	
	public function editPhonebyUserId($data,$id){
		$this->id = $id;
		$this->create($data);
	 	//$this->save($data);
	 	$this->updateAll($data,array('user_id' => $id));

	}

	public function deletePhone($phoneid){
		$this->id = $phoneid;
		$this->delete(array('Phone.id'=>$phoneid));
	}
	
	public function findOfficePhonebyUserid($id){
		return $this->find('all',array('conditions'=>array('Phone.user_id'=>$id,'Phone.phone_type'=>'Office'),'fields' => array('Phone.phone_number','Phone.phone_type')));
	}
	

}

 ?>
