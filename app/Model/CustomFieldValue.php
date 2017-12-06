<?php
App::uses('AppModel', 'Model');
class CustomFieldValue extends AppModel {
	
 var $name = 'CustomFieldValue';

 	
 	public function addCustomFieldValueAdmin($data){
		
		return $this->save($data);
	}

	public function editCustomFieldValueAdmin($data,$custom_field_id){
		$this->id = $custom_field_id;
		return $this->save($data);
	}
 	
	public function findallCustomFieldValueByfieldId($field_id){
		return $this->find('all',array('conditions'=>array('CustomFieldValue.custom_field_id'=>$field_id)));
		
	}

	public function findallCustomFieldValueById($CustomFieldValue_id){
		return $this->find('all',array('conditions'=>array('CustomFieldValue.id'=>$CustomFieldValue_id)));
		
	}

	public function findallCustomFieldValueByTicketId($ticket_id){
		return $this->find('all',array('conditions'=>array('CustomFieldValue.ticket_id'=>$ticket_id)));
		
	}

 	public function DeleteCustomFieldValue($CustomFieldValue_id){
		$this->id = $CustomFieldValue_id;
		$this->delete(array('CustomFieldValue.id'=>$CustomFieldValue_id));
	}

}
?>