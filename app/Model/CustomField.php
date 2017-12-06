<?php
App::uses('AppModel', 'Model');
class CustomField extends AppModel {
	
 var $name = 'CustomField';

 	
 	public function addCustomFieldTypeAdmin($data){
		
		return $this->save($data);
	}
 	
	public function findCustomFieldTypeNameById($field_id){
		return $this->find('all',array('conditions'=>array('CustomField.id'=>$field_id)));
		
	}

	public function findAllCustomFieldType(){
		return $this->find('all',array('conditions'=>array('CustomField.status'=>'0')));
	}

	public function findAllCustomFieldTypeByLoginId($id){
		return $this->find('all',array('conditions'=>array('CustomField.status'=>'0','CustomField.login_id'=>$id)));
	}

	public function disableCustomFieldTypeAdmin($field_id){
		return $this->updateAll(array('status' => "'1'"),array('id' => $field_id));

	}
}
?>