<?php App::uses('AppModel', 'Model');
class Warranty extends AppModel {
	var $name = 'Warranty';



/************************************************/

	public function addWarrantyAdmin($data){
		return $this->save($data);
	}


	public function editWarrantybyId($data,$id){
		$this->id = $id;
	 	return $this->save($data);
	}



	public function allWarranty(){
		return $this->find('all');
	}

	public function findWarrantybyId($id){
		return $this->find('first',array('conditions'=>array('Warranty.id'=>$id)));
	}

	public function findWarrantybyUserId($id){
		return $this->find('all',array('conditions'=>array('Warranty.user_id'=>$id)));
	}

	public function findWarrantybyInvoiceId($id){
		return $this->find('all',array('conditions'=>array('Warranty.invoice_id'=>$id)));
	}

	public function deleteWarranty($id){
		$this->id = $id;
		return $this->delete(array('Warranty.id'=>$id));
	}
	// public $actsAs = array(
	// 	'Tree'
	// );
}
?>