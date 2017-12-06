<?php
App::uses('AppModel', 'Model');
class TransferLocation extends AppModel {
	
 var $name = 'TransferLocation';

 	
 	public function addTransferLocation($data){
		
		return $this->save($data);
	}

	public function editMultilocationbyUserId($data,$user_id){
        $this->user_id = $user_id;
        return $this->save($data);
    }

	public function findTransferLocationByUserId($id){
		return $this->find('first',array('conditions'=>array('TransferLocation.user_id'=>$id)));
		
	}

	public function findallTransferLocationById($TransferLocation_id){
		return $this->find('all',array('conditions'=>array('TransferLocation.id'=>$TransferLocation_id)));
		
	}

 	public function DeleteTransferLocation($TransferLocation_id){
		$this->id = $TransferLocation_id;
		$this->delete(array('TransferLocation.id'=>$TransferLocation_id));
	}

}
?>