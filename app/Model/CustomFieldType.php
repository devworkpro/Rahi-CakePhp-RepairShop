<?php
App::uses('AppModel', 'Model');
class CustomFieldType extends AppModel {
	
 var $name = 'CustomFieldType';

 	
 	public function addCustomFieldTypeAdmin($data){
		
		return $this->save($data);
	}

	public function editCustomFieldTypeAdmin($data,$custom_field_id){
		$this->id = $custom_field_id;
		return $this->save($data);
	}
 	
	public function findallCustomFieldTypeByfieldId($field_id){
		return $this->find('all',array('conditions'=>array('CustomFieldType.custom_field_id'=>$field_id)));
		
	}

	public function findallCustomFieldTypeById($CustomFieldType_id){
		return $this->find('all',array('conditions'=>array('CustomFieldType.id'=>$CustomFieldType_id)));
		
	}

 	public function DeleteCustomFieldType($CustomFieldType_id){
		$this->id = $CustomFieldType_id;
		$this->delete(array('CustomFieldType.id'=>$CustomFieldType_id));
	}

}
?>