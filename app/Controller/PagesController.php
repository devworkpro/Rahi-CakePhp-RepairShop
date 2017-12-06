<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');
Configure::write('debug', 2);
/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Page','User','Course','Transaction','Reminder','Ticket','Part','Rma');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */


public function beforeFilter() {


  parent::beforeFilter();

  $this->Auth->deny();
  $this->Auth->allow('index','page','singup');
  $menu=$this->Page->find('all',array('conditions'=>array('Page.is_rule' => 0)));
  $this->set(compact('menu'));
}


public function admin_dashboard()
{
	$this->set('title','Admin Dashboard');
    $countuser = $this->User->find('count', array('conditions' => array('User.role !=' => 'admin')));
    $countevent=$this->Course->find('count');
    $totalGross = $this->Transaction->query('SELECT sum(amount) as total from transactions');
    $totalAmount= $totalGross[0][0]['total'];
    $newUsers = $this->User->findNewUsers();
    $ticket = $this->Ticket->allTickets();
    $latlngusers = $this->User->findAllUsersLatLng();
    $reminder = $this->Reminder->findallReminderByUserId($this->Auth->user('id'));
    $userDetail = $this->User->findUserbyId($this->Auth->user('id'));
    //pr($latlngusers);die();
	$this->set(compact('countevent','countuser','totalAmount','newUsers','latlngusers','reminder','userDetail','ticket'));

		
    $week = 604800;
	$month = 2592000;
	$year = 31536000;
  
  	$k_week = $this->countdb($week);
  	$k_month = $this->countdb($month);
  	$k_year = $this->countdb($year);

  	$this->set(compact('k_week', 'k_month', 'k_year'));

    //pr($us);die();
}
/*-------------------------------------------------------*/

public function admin_addnewreminder(){
	
	$this->set('title','New Reminder');

    if($this->request->is('post')){

        $reminder =$this->request->data;
        $user_id = $reminder['Reminder']['user_id'];
        //pr($reminder);die();
        $save = $this->Reminder->addNewReminder($reminder);
        
        return $this->redirect(array("controller" => "pages","action" => "dashboard"));
    }
}

public function admin_deletereminder($id){
    $this->Reminder->DeleteReminder($id);
     
    $this->Flash->success('Reminder Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Pages','action'=>'dashboard'));
}

public function admin_updatereminder($id){
    $reminder = $this->Reminder->findallReminderById($id);
    $at = $reminder['Reminder']['at'];
   	$new_at = date('m/d/Y g:i A', strtotime($at. ' + 1 days'));
    //pr($reminder);die(); 
    //$this->Reminder->updateAll()
    $this->Reminder->updateAll(array('Reminder.at' => "'$new_at'"),array('Reminder.id' =>$id));
    
    $this->Flash->success('Updated!', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Pages','action'=>'dashboard'));
}

/*--------------------------------------------------------*/




	public function admin_addcmspage(){
	$this->set('title','Add CMS Page');

	if($this->request->is('post')){
		$this->Page->set($this->request->data);
		if($this->Page->validates())
		{
			$this->Page->savePage($this->request->data);
			$this->Flash->success('CMS Page Created', array('key' => 'positive'));	
			return $this->redirect(array('controller'=>'pages','action'=>'addcmspage'));
		}else{
			$this->Page->validationErrors;     
			}
	}

	}

/*-------------------------------------------------------*/


	public function admin_listcmspages(){
	$this->set('title','All CMS Pages');
	$pages = $this->Page->allCmsPages();
	$this->set(compact('pages'));	

	}

/*-------------------------------------------------------*/

	public function page($key){
		$this->layout = 'pages';
		$pageDetail = $this->Page->getPagebyKey($key);
		$title = $pageDetail['Page']['title'];
		$this->set(compact('title','pageDetail'));
	}

/*-------------------------------------------------------*/

	public function admin_editpage($id){
		error_reporting(0);
		$this->set('title','Edit Page');
		$pageDetail = $this->Page->findPagebyId($id);

		if($this->request->is('post')){
			$this->Page->id = $id;
			if($this->Page->validates()){
				$this->Page->editCmsPage($id,$this->request->data);
				$this->Flash->success('CMS Page Edited', array('key' => 'positive'));	
				return $this->redirect(array('controller'=>'pages','action'=>'listcmspages'));
			}
		}
		$this->data = $pageDetail;				
		$this->set(compact('title','pageDetail'));
	}

/*-------------------------------------------------------*/

	public function admin_deletepage($id){

		$pageDetail = $this->Page->deletePagebyId($id);
		$this->Flash->success('Page Deleted', array('key' => 'positive'));	
		return $this->redirect(array('controller'=>'pages','action'=>'listcmspages'));

	}
 

/*-------------------------------------------------------*/  
	public function countdb($in){

        $now = time();
        $start = date('Y-m-d H:i:s', $now - $in);
        $end = date('Y-m-d H:i:s', $now);

        $sql = "SELECT count(id) as total FROM users WHERE created BETWEEN '$start' AND '$end'";
       	$result = ($this->User->query($sql));
       	return $result[0][0]['total'];
	}

/*------------------Homepage----------------------------*/
  public function index(){

  	/*if($this->Auth->user('id')){
  		return $this->redirect(array('controller'=>'courses','action'=>'index'));
  	}*/
    $this->title('Repair Shop');
    //$this->layout = false;
    //$this->layout = 'frontend';
    $this->layout = "latestfrontend";
    $this->loadModel('Slider');
    $sliders=$this->Slider->find('all');
    $this->set(compact('sliders'));

    $this->loadModel('Page');
  }

  public function signup(){
  	
    $this->layout = 'frontend';
    
  }

 
public function dashboard(){
	 $this->layout = 'frontenduser';
	$this->set('title','User Dashboard');
    $countuser = $this->User->find('count', array('conditions' => array('User.role !=' => 'admin')));
    $countevent=$this->Course->find('count');
    $totalGross = $this->Transaction->query('SELECT sum(amount) as total from transactions');
    $totalAmount= $totalGross[0][0]['total'];
    $newUsers = $this->User->findNewUsers();
    $ticket = $this->Ticket->FindallTicketsByLoginId($this->Auth->user('id'));
    //pr($ticket);die();
    $latlngusers = $this->User->findAllUsersLatLngByLoginId($this->Auth->user('id'));
    $reminder = $this->Reminder->findallReminderByLoginId($this->Auth->user('id'));
    $userDetail = $this->User->findUserbyId($this->Auth->user('id'));
    //pr($latlngusers);die();
	$this->set(compact('countevent','countuser','totalAmount','newUsers','latlngusers','reminder','userDetail','ticket'));

		
    $week = 604800;
	$month = 2592000;
	$year = 31536000;
  
  	$k_week = $this->countdb($week);
  	$k_month = $this->countdb($month);
  	$k_year = $this->countdb($year);

  	$session_id = $this->Auth->user('id');
  	$parts = $this->Part->findPartbyLoginId($session_id);
  	foreach ($parts as $part) {
  	
		$received = $part['Part']['received'];
        $today = date('m/d/Y H:i A');
        if($received > $today){
        	
        }
        else
        {
        	$rmas = $this->Rma->findRmabyPartId($part['Part']['id']);
        	
        	if(empty($rmas))
        	{
        		$part_id		 = $part['Part']['id'];
        		$user_id         = $part['Part']['user_id'];
        		$login_id        = $part['Part']['login_id'];
        		$item_description= $part['Part']['description'];
        		$status          = "new";
        		$tracking_number = $part['Part']['tracking_number'];
        		$notes           = $part['Part']['notes'];
        		$submitted       = $today;
        		$user            = $this->User->findUserbyId($user_id);
        		$customer_name   = $user['User']['first_name'].' '.$user['User']['last_name'];
        		$this->Rma->query("INSERT INTO rmas (user_id,login_id,part_id,customer_name,item_description,status,notes,tracking_number,submitted,returned) VALUES ('$user_id','$login_id','$part_id','$customer_name','$item_description','$status','$notes','$tracking_number','$submitted','$submitted')");
			
			}

        }
	}
  	

  	$this->set(compact('k_week', 'k_month', 'k_year'));


}
 

 // Your feed section 
	 public function addComments(){
		 	if($this->request->is('ajax')){
			$this->loadModel('Comment');
			$this->loadModel('User');
			$this->autoRender=false;
			$this->layout=false;
			
			$data = $this->request->data; 
			$userinfo = $this->User->findUserbyId($this->Auth->user('id'));
			$result =  $this->Comment->save($data);
				if($result){
					$comment_id = $result['Comment']['id'];
					$userDetail= $userinfo;
					$userDetail['comment_id']=$comment_id;
					echo json_encode($userDetail);
					}
		 
		 }
	 }

public function deleteComments(){
		if($this->request->is('ajax')){
			$this->loadModel('Comment');
			$this->loadModel('User');
			$this->autoRender=false;
			$this->layout=false;

			$id = $this->request->data['lid']; 
			$this->Comment->id = $id;
			$result =  $this->Comment->delete($id);

			if($result){
					$success = 1;
			}
			else{
						$success = 0;
				}
				echo $success ;
			die();
		 
		}


}


public function likeGpx(){
	$this->autoRender=false;
			$this->layout=false;
		if($this->request->is('ajax')){
			
			$this->loadModel('Like');
			$data = $this->request->data; 
			$result=$this->Like->save($data);	
			if($result){
				
				echo json_encode($result);
			}
			

			}

		}


public function loadmoreGpx(){

	$this->autoRender=false;
			$this->layout=false;
	if($this->request->is('ajax')){
			$this->loadModel('Comment');
			$this->loadModel('User');
			$this->loadModel('Gpx');
			
			
			$loadmore=$this->request->data;
			//echo "<pre>";print_r($loadmore);die;

			$result= $this->Gpx->loadGPx($loadmore);
				if($result){
				
				echo json_encode($result);
			}
				

	}
}

public function search(){
	$this->autoRender=false;
			$this->layout=false;
	if($this->request->is('ajax')){
			$this->loadModel('Friend');
			$search_name = $this->request->data['first_name'];
			
			$result =$this->Friend->search_friend($search_name);
			//echo "<pre>";print_r($result);
			if($result){
				//success=1;
				echo json_encode($result);
		}
	}

}

public function badges(){
	$this->autoRender=false;
			$this->layout=false;
			$this->loadModel('Badge');
			$result=$this->Badge->find('all');
			echo "<pre>";print_r($result);die;


}

function AddPlayTime($times) {
$minutes = 0;
    // loop throught all the times
    foreach ($times as $time) {
        list($hour, $minute) = explode(':', $time);
        $minutes += $hour * 60;
        $minutes += $minute;
    }

    $hours = floor($minutes / 60);
    $minutes -= $hours * 60;

    // returns the time already formatted
    return sprintf('%02d:%02d', $hours, $minutes);
}

function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}



/*user section*/
/*-------------------------------------------------------*/

public function addnewreminder(){
	
	$this->set('title','New Reminder');

    if($this->request->is('post')){

        $reminder =$this->request->data;
        $user_id = $reminder['Reminder']['user_id'];
        //pr($reminder);die();
        $save = $this->Reminder->addNewReminder($reminder);
        
        return $this->redirect(array("controller" => "pages","action" => "dashboard"));
    }
}

public function deletereminder($id){
    $this->Reminder->DeleteReminder($id);
     
    $this->Flash->success('Reminder Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Pages','action'=>'dashboard'));
}

public function updatereminder($id){
    $reminder = $this->Reminder->findallReminderById($id);
    $at = $reminder['Reminder']['at'];
   	$new_at = date('m/d/Y g:i A', strtotime($at. ' + 1 days'));
    //pr($reminder);die(); 
    //$this->Reminder->updateAll()
    $this->Reminder->updateAll(array('Reminder.at' => "'$new_at'"),array('Reminder.id' =>$id));
    
    $this->Flash->success('Updated!', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Pages','action'=>'dashboard'));
}







}