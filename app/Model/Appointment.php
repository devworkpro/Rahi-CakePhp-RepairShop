<?php App::uses('AppModel', 'Model'); 
class Appointment extends AppModel {
	
 var $name = 'Appointment';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('AppointmentPlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allAppointments(){
				return $this->find('all');
	}

	public function findAppointmentbyDecline(){
			//	return $this->find('all');
				return $this->find('all', array('conditions' => array('Appointment.decline !=' => '1')));
				
	}
	
	public function findAppointmentbyId($id){
		return $this->find('first',array('conditions'=>array('Appointment.id'=>$id)));
	}

	public function findallAppointmentsByLoginId($id){
		return $this->find('all',array('conditions'=>array('Appointment.login_id'=>$id)));
	}

	public function findAppointmentbyTicketId($id){
		
		return $this->find('first',array('conditions'=>array('Appointment.ticket_id'=>$id)));
	}

	public function findAppointmentbyLeadId($id){
		return $this->find('all',array('conditions'=>array('Appointment.lead_id'=>$id)));
	}
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Appointment.email'=>$email)));
	}


	public function editAppointmentbyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function updateAppointmentByTicketId($data,$id){
		$this->ticket_id = $id;
		return $this->save($data);
	}

	public function addAppointmentAdmin($data){
		
		return $this->save($data);
		
		//pr($data);die();
	}

	public function addPhoneAdmin($data){
		//pr($data);die();
		return $this->save($data);

	}
	public function addAddressAdmin($data){
		//pr($data);die();
		return $this->save($data);

	}

	public function findNewAppointments(){
		return $this->find('all',array('limit'=>'8','order'=>'Appointment.id DESC'));
	}

	public function deleteAppointment($id){
		$this->id = $id;
		//echo $id;die();
		$this->delete(array('Appointment.id'=>$id));
	}

	public function AppointmentwithCourses($Appointmentid){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'course_unlockeds',
            'alias' => 'course_unlockeds',
            'type' => 'INNER',
            'conditions' => array(
                'Appointment.id = course_unlockeds.Appointment_id' 
            )
        ),
         array(
            'table' => 'courses',
            'alias' => 'courses',
            'type' => 'INNER',
            'conditions' => array(
                'course_unlockeds.course_id = courses.id' 
            )
        )
    ),
    'conditions' => array(
        'Appointment.id' => $Appointmentid
    ),
    'fields'=>array('courses.*','course_unlockeds.*'),
));
	}
	
	public function AppointmentComment($id){
		return $this->query("select Appointments.* , comments.* , comments.comment from Appointments inner join comments on Appointments.id=comments.Appointment_id where comments.Appointment_id=$id");


		}

}

?>