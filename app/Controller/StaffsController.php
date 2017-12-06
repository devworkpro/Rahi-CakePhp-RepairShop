<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class StaffsController extends AppController {

public $components = array('Hybridauth');
public $uses = array('Phone','Address','CommunicationLog','Reminder','Invoice','Ticket','Estimate','Lead','Attachment','AssetFieldValue','Order','Email','Contract','Schedule','Appointment','Log','Warranty','Contact','CustomerField','CustomerFieldValue','PortalUser','BusinessSetting','Team','DemoRequest','InvoicePayment','StaffMenu');

////////////////////////////////////////////////////////////

public function beforeFilter() {
	$this->Auth->allow('login','register', 'portal','complete_register','thanku');
	parent::beforeFilter();
	$menu=$this->Page->find('all',array('conditions'=>array('Page.is_rule' => 0)));
    $this->set(compact('menu'));
}



/*-------------------------------------------*/

public function admin_index(){
	
	$this->set('title','User List');

    $allusers = $this->User->allALLStaffs();
    //pr($allusers);die();
	$this->set('users', $allusers);

}



//////////////////////////////////////////////////////////////////////////////

public function admin_add(){

	$this->set('title','Add Staff');
	 
	if($this->request->is('post')){

		$user  = $this->request->data['User'];
		$this->User->set($user);	

		if($this->User->validates()){

			$saveUser = $this->User->addUserAdmin($user);
			$user_id = $this->User->getInsertID();

			$this->Flash->success('Staff Add Successfully', array('key' => 'positive'));
    		return $this->redirect(array('controller'=>'staffs','action'=>'staffdetail',$user_id));
    			
				
		}
		else{
		
			$errors = $this->User->validationErrors;     
			$this->Flash->failure($errors);
		}
		
	}
}

/*-------------------------------------------*/

 public function admin_staffedit($id){
 	
 	$this->set('title','Edit Staff');
	$user = $this->User->findUserbyId($id); // Get User Detail from id
	
	if($this->request->is('post'))
	{  
		$user  = $this->request->data['User'];
		$this->User->set($user);	
		if($this->User->validates()){
			$saveUser = $this->User->editUserbyId($user,$id);
			$this->Flash->success('Staff Updated!', array('key' => 'positive'));		
			return $this->redirect(array('controller'=>'Staffs','action'=>'staffdetail',$id));
  		}
  		else{
		
			$errors = $this->User->validationErrors;    
			$this->Flash->failure($errors);
			$this->Flash->failure('Staff Not Updated!', array('key' => 'positive'));	
			return $this->redirect(array('controller'=>'Staffs','action'=>'staffedit',$id));
		}
		
	}
	$this->data = $user ;
	$this->set(compact('user'));
}

/*-------------------------------------------*/

public function admin_deletestaff($id){
	$this->User->deleteUser($id);
	$this->Flash->success('Staff Deleted Successfully', array('key' => 'positive'));	
	return $this->redirect(array('controller'=>'staffs','action'=>'index'));
}

/*-------------------------------------------*/

public function admin_staffdetail($id){
	
	$userDetail        = $this->User->findUserbyId($id);
	
    //pr($userDetail);   die();

	$this->set(compact('userDetail'));
}





/**********************************************************************************/
/*********************************User Section*************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/

/*-------------------------------------------*/



/*-------------------------------------------*/

public function index(){
	if($this->Auth->user('id')!='')
    {
	$this->layout="frontenduser";
	$this->set('title','User List');

    $allusers = $this->User->allStaffsBysessionId($this->Auth->user('id'));
    //pr($allusers);die();
	$this->set('users', $allusers);
	}
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


//////////////////////////////////////////////////////////////////////////////

public function add(){
	if($this->Auth->user('id')!='')
    {
	$this->layout="frontenduser";
	$this->set('title','Add Staff');
	 
	if($this->request->is('post')){

	//pr($this->request->data);die();
		$user  = $this->request->data['User'];
		$this->User->set($user);	

		if($this->User->validates()){

			$saveUser = $this->User->addUserAdmin($user);
			$user_id = $this->User->getInsertID();
			if(isset($this->request->data['StaffMenu']))
			{	
				$this->request->data['StaffMenu']['staff_id'] = $user_id;
				$staffmenu = $this->request->data['StaffMenu'];
				$saveUser = $this->StaffMenu->addStaffMenuAdmin($staffmenu);
				
			}
			$this->Flash->success('Staff Add Successfully', array('key' => 'positive'));
    		return $this->redirect(array('controller'=>'staffs','action'=>'staffdetail',$user_id));
    			
				
		}
		else{
		
			$errors = $this->User->validationErrors;     
			$this->Flash->failure($errors);
		}
		
	}
	}
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


/*check email in database*/
public function emailcheck() {
    	
		$this->layout="frontend1";
		$this->loadModel('UserPlan');

		$email =$this->request->data('email');
	    if ($this->request->is('ajax'))
	    {
	    	
	    	$checkemail = $this->User->findByEmail($email);	
	    	if(!empty($checkemail))
	    	{
	    		echo "invalid";exit();
	    	}
	    	else{
	    		echo "success";exit();
	    	}
	        
	   	}

    }


/*-------------------------------------------*/

 public function staffedit($id){
 	if($this->Auth->user('id')!='')
    {
 	$this->layout="frontenduser";
 	$this->set('title','Edit Staff');

	$user = $this->User->findUserbyId($id); // Get User Detail from id
	$StaffMenu = $this->StaffMenu->findStaffMenubyStaffId($id);
	//pr($this->Auth->user());
	//echo $this->Auth->user('password');die();
	if(!empty($StaffMenu))
	{
		$user['StaffMenu'] = $StaffMenu['StaffMenu'];
	}
	if($this->request->is('post'))
	{  
		$password = $this->request->data['User']['password'] ;       
            
        if(empty($password))
        {
            unset($this->request->data['User']['password']);
        }
		$user  = $this->request->data['User'];
		$this->User->set($user);	
		if($this->User->validates()){
			$saveUser = $this->User->editUserbyId($user,$id);
			if(isset($this->request->data['StaffMenu']))
			{	
				$staffmenu = $this->request->data['StaffMenu'];
				$this->StaffMenu->updateAll($staffmenu,array('StaffMenu.staff_id'=>$id));
				//$saveUser = $this->StaffMenu->editStaffMenubyStaffId($staffmenu,$id);
			}
			$this->Flash->success('Staff Updated!', array('key' => 'positive'));		
			return $this->redirect(array('controller'=>'Staffs','action'=>'staffdetail',$id));
  		}
  		else{
		
			$errors = $this->User->validationErrors;    
			$this->Flash->failure($errors);
			$this->Flash->failure('Staff Not Updated!', array('key' => 'positive'));	
			return $this->redirect(array('controller'=>'Staffs','action'=>'staffedit',$id));
		}
		
	}
	$this->data = $user ;
	$this->set(compact('user'));
	}
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

/*-------------------------------------------*/

public function deletestaff($id){
	$this->layout="frontenduser";
	$this->User->deleteUser($id);
	$this->Flash->success('Staff Deleted Successfully', array('key' => 'positive'));	
	return $this->redirect(array('controller'=>'staffs','action'=>'index'));
}

/*-------------------------------------------*/

public function staffdetail($id){
	if($this->Auth->user('id')!='')
    {
	$this->layout="frontenduser";
	
	$userDetail        = $this->User->findUserbyId($id);
	$StaffMenu = $this->StaffMenu->findStaffMenubyStaffId($id);
    //pr($StaffMenu);   die();

	$this->set(compact('userDetail','StaffMenu'));
	}
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

}