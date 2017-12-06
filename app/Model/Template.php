<?php App::uses('AppModel', 'Model');
class Template extends AppModel {
	var $name = 'Template';



/************************************************/
	public function addTicketCategories($data){
		//pr($data);die();
		return $this->save($data);

	}
	
	public function findTicketTemplateByUserId($id){
		return $this->find('first',array('conditions'=>array('Template.user_id'=>$id),'fields'=>array('Template.ticket_template'))) ;
	}

	public function findInvoiceTemplateByUserId($id){
		return $this->find('first',array('conditions'=>array('Template.user_id'=>$id),'fields'=>array('Template.invoice_template')));
	}

	public function findEstimateTemplateByUserId($id){
		return $this->find('first',array('conditions'=>array('Template.user_id'=>$id),'fields'=>array('Template.estimate_template')));
	}

	// public $actsAs = array(
	// 	'Tree'
	// );


}
?>