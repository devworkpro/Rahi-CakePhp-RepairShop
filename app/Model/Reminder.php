<?php
App::uses('AppModel', 'Model');
class Reminder extends AppModel {
	
 var $name = 'Reminder';

 	
 	public function addNewReminder($data){
		
		return $this->save($data);
	}

	
	public function findallReminderByUserId($user_id){
		return $this->find('all',array('conditions'=>array('Reminder.user_id'=>$user_id)));
		
	}

	public function findallReminderByLoginId($user_id){
		return $this->find('all',array('conditions'=>array('Reminder.login_id'=>$user_id)));
		
	}

	public function findallReminderById($Reminder_id){
		return $this->find('first',array('conditions'=>array('Reminder.id'=>$Reminder_id)));
		
	}
	public function allReminders(){
		return $this->find('all');
		
	}
	

 	public function DeleteReminder($Reminder_id){
		$this->id = $Reminder_id;
		$this->delete(array('Reminder.id'=>$Reminder_id));
	}

}
?>