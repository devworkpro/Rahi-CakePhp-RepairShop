<?php
App::uses('AppModel', 'Model');
class AssetFieldValue extends AppModel {
	
 var $name = 'AssetFieldValue';

 	
 	public function addAssetFieldValueAdmin($data){
		
		return $this->save($data);
	}

	public function editAssetFieldValueAdmin($data,$custom_field_id){
		$this->id = $custom_field_id;
		return $this->save($data);
	}

	public function allAssetFieldValue(){
				return $this->find('all');
	}

 	
	public function findallAssetFieldValueByassetIdAndUserId($asset_id,$user_id){
		return $this->find('all',array('conditions'=>array('AssetFieldValue.asset_id'=>$asset_id,'AssetFieldValue.user_id'=>$user_id)));
		
	}

	public function findallAssetFieldValueByUserId($user_id){
		return $this->find('all',array('conditions'=>array('AssetFieldValue.user_id'=>$user_id)));
		
	}

	public function findallAssetFieldValueByTicketId($ticket_id){
		return $this->find('all',array('conditions'=>array('AssetFieldValue.ticket_id'=>$ticket_id)));
		
	}

	public function findallAssetFieldValueById($AssetFieldValue_id){
		return $this->find('all',array('conditions'=>array('AssetFieldValue.id'=>$AssetFieldValue_id)));
		
	}

 	public function DeleteAssetFieldValue($AssetFieldValue_id){
		$this->id = $AssetFieldValue_id;
		$this->delete(array('AssetFieldValue.id'=>$AssetFieldValue_id));
	}

}
?>