<?php
App::uses('AppModel', 'Model');
class DemoRequest extends AppModel {
	
 var $name = 'DemoRequest';

 	
 	public function addDemoRequestAdmin($data){
		
		return $this->save($data);
	}

	public function editDemoRequestAdmin($data,$Asset_Field_id){
		$this->id = $Asset_Field_id;
		return $this->save($data);
	}
 	
	public function findallDemoRequestByAssetId($ass_id){
		return $this->find('all',array('conditions'=>array('DemoRequest.asset_id'=>$ass_id)));
		
	}

	public function findallDemoRequestById($DemoRequest_id){
		return $this->find('all',array('conditions'=>array('DemoRequest.id'=>$DemoRequest_id)));
		
	}

 	public function DeleteDemoRequest($DemoRequest_id){
		$this->id = $DemoRequest_id;
		$this->delete(array('DemoRequest.id'=>$DemoRequest_id));
	}

}
?>