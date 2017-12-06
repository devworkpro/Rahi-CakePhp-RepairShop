<?php App::uses('AppModel', 'Model');
class Invoice extends AppModel {
	
 var $name = 'Invoice';
 /*var $hasMany = 'Blogsetting';*/
// var $hasMany = array('CourseUnlocked');
// var $hasOne = array('InvoicePlan');

 					
//////////////////////////////////////////////////

 /*
   public $hasMany = array(
    'SocialProfile' => array(
        'className' => 'SocialProfile',
    )
	);*/

	public function allInvoices(){
				return $this->find('all');
	}

	public function findInvoicebyLoginId($id){
		return $this->find('all',array('conditions'=>array('Invoice.login_id'=>$id)));
	}
	
	public function findLastInvoiceByLoginId($id){
		return $this->find('first',array('conditions'=>array('Invoice.login_id'=>$id),'order' => array('Invoice.id DESC'),'limit' => 1));
	}

	public function findInvoicebyId($id){
		return $this->find('first',array('conditions'=>array('Invoice.id'=>$id)));
	}

	public function findInvoiceIdbyUserId($user_id){
		return $this->find('list',array('conditions'=>array('Invoice.user_id'=>$user_id),'fields'=>array('Invoice.id')));
	}

	public function findInvoicebyUserId($user_id){
		return $this->find('all',array('conditions'=>array('Invoice.user_id'=>$user_id,'Invoice.status !='=>1)));
	}

	public function findUnpaidInvoicebyUserId($user_id){
		return $this->find('all',array('conditions'=>array('Invoice.user_id'=>$user_id)));
	}
	
	public function findByEmail($email){
		return $this->find('first',array('conditions'=>array('Invoice.email'=>$email)));
	}


	public function editInvoicebyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	public function addInvoiceAdmin($data){
		
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

	public function findNewInvoices(){
		return $this->find('all',array('limit'=>'8','order'=>'Invoice.id DESC'));
	}

	public function deleteInvoice($id){
		$this->id = $id;
		$this->delete(array('Invoice.id'=>$id));
	}

	public function InvoicewithCourses($Invoiceid){
		return $this->find('all', array(
    	'joins' => array(
        array(
            'table' => 'course_unlockeds',
            'alias' => 'course_unlockeds',
            'type' => 'INNER',
            'conditions' => array(
                'Invoice.id = course_unlockeds.Invoice_id' 
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
        'Invoice.id' => $Invoiceid
    ),
    'fields'=>array('courses.*','course_unlockeds.*'),
));
	}
	
	public function InvoiceComment($id){
		return $this->query("select Invoices.* , comments.* , comments.comment from Invoices inner join comments on Invoices.id=comments.Invoice_id where comments.Invoice_id=$id");


		}

}
?>