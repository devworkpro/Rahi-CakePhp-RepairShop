<?php
App::uses('AppModel', 'Model');
class ContractPricing extends AppModel {
	
 var $name = 'ContractPricing';

 	
 	public function addContractPricingAdmin($data){
		
		return $this->save($data);
	}

	public function editContractPricingAdmin($data,$Asset_Field_id){
		$this->id = $Asset_Field_id;
		return $this->save($data);
	}
 	
	public function findallContractPricingByContractId($id){
		return $this->find('all',array('conditions'=>array('ContractPricing.contract_id'=>$id)));
		
	}

	public function findallContractPricingById($ContractPricing_id){
		return $this->find('all',array('conditions'=>array('ContractPricing.id'=>$ContractPricing_id)));
		
	}

 	public function DeleteContractPricing($ContractPricing_id){
		$this->id = $ContractPricing_id;
		$this->delete(array('ContractPricing.id'=>$ContractPricing_id));
	}

}
?>