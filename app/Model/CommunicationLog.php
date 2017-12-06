<?php
App::uses('AppModel', 'Model');
class CommunicationLog extends AppModel {
	
 var $name = 'CommunicationLog';

 	
 	public function addCommcunicationLog($data){
		
		return $this->save($data);
	}

	public function findallCommunicationLog(){
		return $this->find('all');
	}

	public function findallCommunicationLogByUserId($user_id){
		return $this->find('all',array('conditions'=>array('CommunicationLog.user_id'=>$user_id)));
		
	}

	public function findallCommunicationLogByVendorId($vendor_id){
		return $this->find('all',array('conditions'=>array('CommunicationLog.vendor_id'=>$vendor_id)));
		
	}

	public function findallCommunicationLogById($CommunicationLog_id){
		return $this->find('all',array('conditions'=>array('CommunicationLog.id'=>$CommunicationLog_id)));
		
	}

 	public function DeleteCommunicationLog($CommunicationLog_id){
		$this->id = $CommunicationLog_id;
		$this->delete(array('CommunicationLog.id'=>$CommunicationLog_id));
	}

}
?>