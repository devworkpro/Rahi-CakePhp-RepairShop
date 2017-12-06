<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');
CakePlugin::load('Paypal');
App::uses('Paypal', 'Paypal.Lib');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	

public $helpers = array('Facebook.Facebook');
//public $components = array('Facebook.Connect');

	public $components = array(
        'Session',
        'Auth',
        'Flash',
        'Facebook.Connect'
    );

	public $uses = array('Page','User','Event', 'Group', 'Message','Reminder','UserMenu','UserPackage','Package','PaypalAccount','StaffMenu','Ticket');

public function beforeFilter() {


	/*******************************************************/
	$package_name     = '';
	$payment_date     = '';
	$payment_enddate  = '';
	$PackageDateDiffernce = '';
	$StaffMenu        = '';
	$User_Reminder    = $this->Reminder->findallReminderByLoginId($this->Auth->user('id'));
	$totalUser_count  = $this->User->CountUsersBysessionId($this->Auth->user('id'));
	$totalStaff_count = $this->User->CountStaffBysessionId($this->Auth->user('id'));
	$totalTicket_count= $this->Ticket->CountTicketsBysessionId($this->Auth->user('id'));
	//pr($totalTicket_count);die();
	$walkin_user_id   = $this->User->findWalkinUserIdBysessionId($this->Auth->user('id'));
	$Menu_order       = $this->User->findMenuOrderBysessionId($this->Auth->user('id'));
	$User_menu        = $this->UserMenu->findUserMenuByUserId($this->Auth->user('id'));
	$Package          = $this->UserPackage->findUserPackageByUserId($this->Auth->user('id'));
	$Packages         = $this->Package->allPackages();
	$PaypalAccount    = $this->PaypalAccount->findPaypalAccountDetails();
	$StaffMenu 	      = $this->StaffMenu->findStaffMenubyStaffId($this->Auth->user('staff_id'));
	//pr($PaypalAccount);die();
	if(!empty($Package))
	{
		$package_name    = $Package['UserPackage']['item_name'];
		$payment_date    = $Package['UserPackage']['payment_date'];

		foreach($Packages as $package) {

			$status = $package['Package']['status'];

	        if($status == "monthly")
	        {
				if($package_name == $package['Package']['title'])
			    {
			    	$payment_enddate = date('Y-m-d', strtotime($payment_date . ' +30 days'));
			    	$today = date("Y-m-d");
					$datetime1 = new DateTime($payment_enddate);
					$datetime2 = new DateTime($today);
					$interval  = $datetime2->diff($datetime1);
					$PackageDateDiffernce = $interval->format('%R%a');
			    }
			}
			elseif($status == "yearly")
			{
				if($package_name == $package['Package']['title'])
			    {
			    	$payment_enddate = date('Y-m-d', strtotime($payment_date . ' +1 year'));
			    	$today = date("Y-m-d");
					$datetime1 = new DateTime($payment_enddate);
					$datetime2 = new DateTime($today);
					$interval  = $datetime2->diff($datetime1);
					$PackageDateDiffernce = $interval->format('%R%a');
			    }
			}
			elseif($status == "new")
			{
				if($package_name == $package['Package']['title'])
			    {
			    	$payment_enddate = date('Y-m-d', strtotime($payment_date . ' +30 days'));
			    	$today = date("Y-m-d");
					$datetime1 = new DateTime($payment_enddate);
					$datetime2 = new DateTime($today);
					$interval  = $datetime2->diff($datetime1);
					$PackageDateDiffernce = $interval->format('%R%a');
			    }
			}
		    else
		    {
		    	$payment_enddate = '';
		    }

		}
	}
	//pr($StaffMenu);die();
	//pr($User_menu);die();
	$this->set(compact('User_Reminder','walkin_user_id','Menu_order','User_menu','Package','payment_enddate','package_name','PackageDateDiffernce','PaypalAccount','StaffMenu','totalUser_count','totalStaff_count','totalTicket_count'));
	/*******************************************************/

	$this->Paypal = new Paypal(array(
		    'sandboxMode' => true,
		    'nvpUsername' => 'chhabeg.rex-facilitator_api1.gmail.com',
		    'nvpPassword' => 'CMH4FSNCXD4SW8JX',
		    'nvpSignature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AxHNIq46luLJmgad71wLHo1T6KNd'
		));
		$this->loadModel('User');
		if($this->Auth->user('id')){
			$userLoggedDetail = $this->User->findUserbyId($this->Auth->user('id'));
			$this->set('userLoggedDetail',$userLoggedDetail);
		}

		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => false);	
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'index');
		$this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'index', 'admin' => false);
		$this->Auth->authorize = array('Controller');

		$this->Auth->authenticate = array(
			AuthComponent::ALL => array(
				'userModel' => 'User',
				'fields' => array(
					'username' => 'email',
					'password' => 'password'
				),
				'scope' => array(
					'User.status' => '1',
				)
			), 'Form'
		);

	
		if(isset($this->request->params['admin'])) {
			if($this->Session->check('Auth.User')) {
				$this->set('authUser', $this->Auth->user());
				$loggedin = $this->Session->read('Auth.User');
				$this->set(compact('loggedin'));
				$this->layout = 'admin';
		

		/******************Setting messages*****************/
			$user_id = $this->Auth->User('id');
			$this->Group->recursive = -1;
			$messages = $this->Group->findByUserId($user_id);
			$unreads = 0;
			for($i = 0; $i < count($messages); $i++){
				$sender_id = ($messages[$i]['Group']['user_id']);
				if(intval($messages[$i]['Group']['isread']) == 0){
					$unreads++;
				}

				$temp = $this->User->findUserbyId_e($sender_id);
				$messages[$i]['Sender'] = $temp['User'];

				$temp = $this->Message->find('first', array(
					'conditions' => array('Message.group_id' => $messages[$i]['Group']['id']),
					'order' => array('Message.timestamp' => 'Desc')
					));
				$messages[$i]['Message'] = $temp['Message'];
		
			}
			$top_messages = $messages;
			$this->set(compact('top_messages', 'unreads'));
			//pr($top_messages);
			

		/************************************/


			}else{

				$this->Auth->loginAction = array('controller' => 'users', 'action' => 'portal', 'admin' => false);	
				

			}
		}else if(isset($this->request->params['user'])){
			if($this->Session->check('Auth.User')) {
				$this->set('authUser', $this->Auth->user());
				$loggedin = $this->Session->read('Auth.User');
				$this->set(compact('loggedin'));
				//$this->layout = 'admin';
			}
		}
		else {
			$this->Auth->allow();
		}

	}


	public function isAuthorized($user) {
		//pr($user);
		if (($this->params['prefix'] === 'admin') && ($user['role'] != 'admin')) {
			echo '<a href="/runningportal/users/logout">Logout</a><br />';
			die('Invalid request for '. $user['role'] . ' user.');




		}
		

		
		return true;
	}

	/**Custom Functions**/

	public function title($title){
    $this->set('title',$title);
  }


 
}
