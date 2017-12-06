<?php App::uses('AppModel', 'Model');
class InvoicePayment extends AppModel {
	
 var $name = 'InvoicePayment'; 
 // var $hasMany = array( 'Dealership' );

 	public function addInvoicePaymentAdmin($data){
		
		return $this->save($data);
		
		//pr($data);die();
	}

	public function allInvoicePayments(){
		return $this->find('all');
	}

	public function findInvoicePaymentbyId($id){
		return $this->find('first',array('conditions'=>array('InvoicePayment.id'=>$id)));
	}
	
	public function findInvoicePaymentbyLoginId($id){
		return $this->find('first',array('conditions'=>array('InvoicePayment.login_id'=>$id)));
	}

	public function findInvoicePaymentbyUserId($user_id){
		return $this->find('all',array('conditions'=>array('InvoicePayment.user_id'=>$user_id)));
	}


	public function deleteInvoicePayment($id){
		$this->id = $id;
		$this->delete(array('InvoicePayment.id'=>$id));
	}
    public function deleteinvoicelist($id){
		$this->id = $id;
		$this->delete(array('Payment.id'=>$id));
	}


}
?>