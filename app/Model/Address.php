<?php App::uses('AppModel', 'Model');
class Address extends AppModel {
	
 var $name = 'Address';

 public function addAddressAdmin($data){
		//pr($data);die();
 	$this->create($data);
	 $this->save($data);

	}

 public function editAddressbyUserId($data,$id){
	
	 	$this->id = $id;
		$this->create($data);
	 	//$this->save($data);
	 	$this->updateAll($data,array('user_id' => $id));

	}

	
	public function deleteAddress($addressid){
		$this->id = $addressid;
		$this->delete(array('Address.id'=>$addressid));
	}


 public function findAddressbyUserId($id)
 {
 	//pr($id);die();
 	return $this->find('all',array('conditions'=>array('Address.user_id'=>$id),'fields' => array('Address.name','Address.type','Address.address','Address.city')));
 	//return $this->find('first',array('conditions'=>array('User.id'=>$id),'fields' => array('User.first_name','User.last_name')));
 }
 public function findFullAddressbyUserId($id)
 {
 	//pr($id);die();
 	return $this->find('all',array('conditions'=>array('Address.user_id'=>$id)));
 	//return $this->find('first',array('conditions'=>array('User.id'=>$id),'fields' => array('User.first_name','User.last_name')));
 }

}

 ?>