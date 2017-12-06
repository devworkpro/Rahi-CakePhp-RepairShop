<?php
App::uses('AppModel', 'Model');
class Ticket extends AppModel {
	
 var $name = 'Ticket';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('TicketPlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allTickets(){
				return $this->find('all');
	}

	
	public function allTicketsByResolved(){
		return $this->find('all',array('conditions'=>array('Ticket.status'=>'Resolved')));
	}
	
	public function findTicketbyId($id){
		return $this->find('first',array('conditions'=>array('Ticket.id'=>$id)));
	}

	public function findTicketNameIdbyUserId($user_id){
		return $this->find('list',array('conditions'=>array('Ticket.user_id'=>$user_id),'fields'=>array('Ticket.id')));
	}

	public function findTicketbyUserId($user_id){
		return $this->find('all',array('conditions'=>array('Ticket.user_id'=>$user_id)));
	}
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Ticket.email'=>$email)));
	}

	public function editTicketbyId($data,$id){
		
		$this->id = $id;
		return $this->save($data);
	}

	public function addTicketAdmin($data){
		//pr($data);die();
		return $this->save($data);
		
		
	}

	public function addPhoneAdmin($data){
		//pr($data);die();
		return $this->save($data);

	}
	public function addAddressAdmin($data){
		//pr($data);die();
		return $this->save($data);

	}

	public function findNewTickets(){
		return $this->find('all',array('limit'=>'8','order'=>'Ticket.id DESC'));
	}

	public function deleteTicket($id){
		$this->id = $id;
		$this->delete(array('Ticket.id'=>$id));
	}

	public function TicketResolve($id){
		$this->id = $id;
		$this->updateAll(array('status' => "'Resolved'"),array('id' => $id));
	}

	public function TicketwithCourses($Ticketid){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'course_unlockeds',
            'alias' => 'course_unlockeds',
            'type' => 'INNER',
            'conditions' => array(
                'Ticket.id = course_unlockeds.Ticket_id' 
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
        'Ticket.id' => $Ticketid
    ),
    'fields'=>array('courses.*','course_unlockeds.*'),
));
	}
	
	public function TicketComment($id){
		return $this->query("select Tickets.* , comments.* , comments.comment from Tickets inner join comments on Tickets.id=comments.Ticket_id where comments.Ticket_id=$id");


		}



	/*User Section*/

	public function findallTicketsByLoginId($id){
		return $this->find('all',array('conditions'=>array('Ticket.login_id'=>$id)));
	}

	public function findLastTicketByLoginId($id){
		return $this->find('first',array('conditions'=>array('Ticket.login_id'=>$id),'order' => array('Ticket.id DESC'),'limit' => 1,));
	}

	public function allResolvedTicketsByLoginId($id){
		return $this->find('all',array('conditions'=>array('Ticket.status'=>'Resolved','Ticket.login_id'=>$id)));
	}

	public function CountTicketsBysessionId($session_id){
		return $this->find('count', array('conditions' => array('Ticket.login_id' => $session_id)));
	}
	
}
?>