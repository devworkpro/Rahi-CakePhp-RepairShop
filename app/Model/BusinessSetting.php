<?php
App::uses('AppModel', 'Model');
class BusinessSetting extends AppModel {
	
 var $name = 'BusinessSetting';

 	
 	public function addBusinessSettingAdmin($data){
		
		return $this->save($data);
	}

	public function editBusinessSettingAdmin($data,$Asset_Field_id){
		$this->id = $Asset_Field_id;
		return $this->save($data);
	}
 	
	public function findallBusinessSettingByAssetId($ass_id){
		return $this->find('all',array('conditions'=>array('BusinessSetting.asset_id'=>$ass_id)));
		
	}

	public function findallBusinessSettingById($BusinessSetting_id){
		return $this->find('all',array('conditions'=>array('BusinessSetting.id'=>$BusinessSetting_id)));
		
	}

	public function findBusinessSettingByUserId($user_id){
		return $this->find('first',array('conditions'=>array('BusinessSetting.user_id'=>$user_id)));
		
	}

 	public function DeleteBusinessSetting($BusinessSetting_id){
		$this->id = $BusinessSetting_id;
		$this->delete(array('BusinessSetting.id'=>$BusinessSetting_id));
	}

}
?>