<?php
App::uses('AppModel', 'Model');
class Log extends AppModel {
	
 var $name = 'Log';

 	
 	public function addLog($data){
		
		return $this->save($data);
	}

	public function findallLog(){
		return $this->find('all');
	}

	public function findLogByUserId($user_id){
	
		return $this->find('all',array('order'=>array('Log.id DESC'),'conditions'=>array('Log.user_id'=>$user_id)));
			
	}

	public function findLogByInvoiceId($invoice_id){
	
		return $this->find('all',array('limit' => 3,'order'=>array('Log.id DESC'),'conditions'=>array('Log.invoice_id'=>$invoice_id)));
			
	}
	public function findLogByEstimateId($estimate_id){
	
		return $this->find('all',array('limit' => 3,'order'=>array('Log.id DESC'),'conditions'=>array('Log.estimate_id'=>$estimate_id)));
			
	}
	
	public function findLogByTicketId($ticket_id){
	
		return $this->find('all',array('limit' => 3,'order'=>array('Log.id DESC'),'conditions'=>array('Log.ticket_id'=>$ticket_id)));
			
	}

	public function findallLogById($Log_id){
		return $this->find('all',array('conditions'=>array('Log.id'=>$Log_id)));
		
	}

 	public function DeleteLog($Log_id){
		$this->id = $Log_id;
		$this->delete(array('Log.id'=>$Log_id));
	}

}
?>