<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class SaleProduct extends AppModel {

 var $name = 'SaleProduct';
 
  public function findSaleProductbyUserId($id){
		return $this->find('all',array('conditions'=>array('SaleProduct.user_id'=>$id)));
	}

 /***********************************************************************************/

  public function deleteSaleProduct($id){
		$this->id = $id;
		$this->delete(array('SaleProduct.id'=>$id));
	}

 /*********************************************************************************/

   public function deleteSaleProductbyUserId($user_id){
		$this->user_id = $user_id;
		$this->deleteAll(array('SaleProduct.user_id'=>$user_id));
	}
	
}
?>