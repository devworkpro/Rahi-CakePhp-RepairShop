<?php App::uses('AppModel', 'Model');
class Disclaimer extends AppModel {
	var $name = 'Disclaimer';



/************************************************/
	public function findTicketDisclaimerByUserId($id){
		return $this->find('first',array('conditions'=>array('Disclaimer.user_id'=>$id),'fields'=>array('Disclaimer.ticket_disclaimer'))) ;
	}

	public function findEstimateDisclaimerByUserId($id){
		return $this->find('first',array('conditions'=>array('Disclaimer.user_id'=>$id),'fields'=>array('Disclaimer.estimate_disclaimer	'))) ;
	}

	public function findInvoiceDisclaimerByUserId($id){
		return $this->find('first',array('conditions'=>array('Disclaimer.user_id'=>$id),'fields'=>array('Disclaimer.invoice_disclaimer'))) ;
	}

}
?>