<?php
App::uses('AppModel', 'Model');
class CannedResponse extends AppModel {
	
 var $name = 'CannedResponse';

 	
 	public function addCannedResponseAdmin($data){
		
		return $this->save($data);
	}

	public function editCannedResponseAdmin($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function allCannedResponse(){
		return $this->find('all');
	}

	public function allCannedResponseByLoginId($login_id){
		return $this->find('all',array('conditions'=>array('CannedResponse.login_id'=>$login_id)));
	}


	public function findCannedResponseById($id){
		return $this->find('first',array('conditions'=>array('CannedResponse.id'=>$id)));
		
	}

 	public function DeleteCannedResponse($CannedResponse_id){
		$this->id = $CannedResponse_id;
		$this->delete(array('CannedResponse.id'=>$CannedResponse_id));
	}

}
?>