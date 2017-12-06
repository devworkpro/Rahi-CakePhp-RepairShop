<?php
App::uses('AppModel', 'Model');
class AssetField extends AppModel {
	
 var $name = 'AssetField';

 	
 	public function addAssetFieldAdmin($data){
		
		return $this->save($data);
	}

	public function editAssetFieldAdmin($data,$Asset_Field_id){
		$this->id = $Asset_Field_id;
		return $this->save($data);
	}
 	
	public function findallAssetFieldByAssetId($ass_id){
		return $this->find('all',array('conditions'=>array('AssetField.asset_id'=>$ass_id)));
		
	}

	public function findallAssetFieldById($AssetField_id){
		return $this->find('all',array('conditions'=>array('AssetField.id'=>$AssetField_id)));
		
	}

 	public function DeleteAssetField($AssetField_id){
		$this->id = $AssetField_id;
		$this->delete(array('AssetField.id'=>$AssetField_id));
	}

}
?>