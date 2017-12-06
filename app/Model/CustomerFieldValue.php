<?php
App::uses('AppModel', 'Model');
class CustomerFieldValue extends AppModel {
	
 var $name = 'CustomerFieldValue';

 	
 	public function addCustomerFieldValueAdmin($data){
		
		return $this->save($data);
	}

	public function editCustomerFieldValueAdmin($data,$custom_field_id){
		$this->id = $custom_field_id;
		return $this->save($data);
	}
 	
	public function findallCustomerFieldValueByfieldId($field_id){
		return $this->find('all',array('conditions'=>array('CustomerFieldValue.custom_field_id'=>$field_id)));
		
	}

	public function findallCustomerFieldValueById($CustomerFieldValue_id){
		return $this->find('all',array('conditions'=>array('CustomerFieldValue.id'=>$CustomerFieldValue_id)));
		
	}
	public function findallCustomerFieldValueByUserId($user_id){
		return $this->find('all',array('conditions'=>array('CustomerFieldValue.user_id'=>$user_id)));
		
	}

 	public function DeleteCustomerFieldValue($CustomerFieldValue_id){
		$this->id = $CustomerFieldValue_id;
		$this->delete(array('CustomerFieldValue.id'=>$CustomerFieldValue_id));
	}

}
?>