<?php  App::uses('AppModel', 'Model');
class Purchase extends AppModel {
	
	var $name = 'Purchase';
 
 	public function allPurchases(){
		return $this->find('all');
	}
	
	public function findPurchasebyId($id){
		return $this->find('first',array('conditions'=>array('Purchase.id'=>$id)));
	}

	public function findPurchasebyOrderId($id){
		return $this->find('all',array('conditions'=>array('Purchase.order_id'=>$id)));
	}

	public function findPurchasebyPurchaseOrderId($id){
		return $this->find('all',array('conditions'=>array('Purchase.purchaseorder_id'=>$id)));
	}
	
	public function editPurchasebyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addPurchaseAdmin($data){
		
		return $this->save($data);
		
		//pr($data);die();
	}

	public function findNewPurchases(){
		return $this->find('all',array('limit'=>'8','order'=>'Purchase.id DESC'));
	}

	public function deletePurchase($id){
		$this->id = $id;
		$this->delete(array('Purchase.id'=>$id));
	}

	

}
?>