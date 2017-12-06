<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Transaction extends AppModel {

public function findbyUserid($userid){
	return $this->find('all',array('conditions'=>array('Transaction.user_id'=>$userid)));
}
   


   public function allPayments(){
   //	print_r("hfhf");
	return $this->find('all');
}
public function findPaymentsById($id){
   //	print_r("hfhf");
	return $this->find('first',array('conditions'=>array('Transaction.id'=>$id)));
}

}
?>