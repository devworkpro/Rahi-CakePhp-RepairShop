<?php
App::uses('AppModel', 'Model');
class CustomerField extends AppModel {
	
 var $name = 'CustomerField';

 	
 	public function addCustomerFieldAdmin($data){
		
		return $this->save($data);
	}

 	public function editCustomerFieldAdmin($data,$Field_id){
		$this->id = $Field_id;
		return $this->save($data);
	}

 	public function findCustomerFieldById($field_id){
		return $this->find('first',array('conditions'=>array('CustomerField.id'=>$field_id)));
		
	}

	public function findAllCustomerField(){
		return $this->find('all');
	}

	public function findCustomerFieldByLoginId($login_id){
		return $this->find('all',array('conditions'=>array('CustomerField.login_id'=>$login_id)));
	}

	public function deleteCustomerField($id){
		$this->id = $id;
		$this->delete(array('CustomerField.id'=>$id));
	}

	public function disableCustomerFieldAdmin($field_id){
		return $this->updateAll(array('status' => "'1'"),array('id' => $field_id));

	}
}
?>