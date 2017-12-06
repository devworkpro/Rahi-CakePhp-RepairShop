<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController {

public $components = array('Hybridauth');
public $uses = array('Phone','Address','CommunicationLog','Reminder','Invoice','Ticket','Estimate','Lead','Attachment','AssetFieldValue','Order','Email','Contract','Schedule','Appointment','Log','Warranty','Contact','CustomerField','CustomerFieldValue','PortalUser','BusinessSetting','Team','DemoRequest','InvoicePayment','Contactus');

////////////////////////////////////////////////////////////

public function beforeFilter() {
	$this->Auth->allow('login','register', 'portal','complete_register','thanku','addcontactus');
	parent::beforeFilter();
	$menu=$this->Page->find('all',array('conditions'=>array('Page.is_rule' => 0)));
    $this->set(compact('menu'));
}



/*---------------------------*/
public function login(){
//$this->layout="user";
$this->layout = false;
if ($this->request->is('post')) 
	{   	
		//pr($this->request->data);die();
		if($this->Auth->login()) {
			$this->User->id = $this->Auth->user('id');
			$this->Session->write('User_id', $this->Auth->user('id'));
			$this->Session->write('User_pic', $this->Auth->user('profile_pic'));
			$this->User->saveField('online','1');   //Online
			if($this->Auth->user('role') == 'user'){

				if($this->Auth->user('login_status') == '0')
					{
						$this->User->updateAll(array('User.login_status' => "'1'"), array('User.id' => $this->Auth->user('id')));
						return $this->redirect(array('controller'=>'users','action' => 'company_info'));
					}
					else
					{
						return $this->redirect(array('controller'=>'pages','action' => 'dashboard'));
					}
			}
			elseif($this->Auth->user('role') == 'admin'){
					
				return $this->redirect(array('controller'=>'pages','action' => 'dashboard','admin'=>true));
					
					
			}
			elseif ($this->Auth->user('role') == 'staff')
			{
				$User_id = $this->Auth->user('id');
				$StaffDetail = $this->User->findUserbyId($User_id);
				if(!empty($StaffDetail))
				{
					$Parent_id = $StaffDetail['User']['login_id'];
					$userParentDetail = $this->User->findUserbyId($Parent_id);
					//pr($userParentDetail);
					//$this->Session->write('Auth.User', $userParentDetail);
                  	
                  	$this->Session->write('Auth.User.id', $userParentDetail['User']['id']);
                  	$this->Session->write('Auth.User.staff_id', $StaffDetail['User']['id']);
                    $this->Session->write('Auth.User.ParentUser', $userParentDetail['User']);
                    
					//pr($this->Auth->user());die();
					return $this->redirect(array('controller'=>'pages','action' => 'dashboard'));
				}
				
				return $this->redirect(array('controller'=>'pages','action' => 'dashboard'));
			}

		}
		else{
		
			$this->Flash->error('Please Check Your Email / Password Combination.' , array('key' => 'positive'));
		}
	}


	}

public function portal(){
	$this->set('title','d');
	$this->layout = null;
	if ($this->request->is('post')) 
	{   	
		if($this->Auth->login()) {
			
			$this->User->id = $this->Auth->user('id');
			$this->Session->write('User_id', $this->Auth->user('id'));
			$this->Session->write('User_pic', $this->Auth->user('profile_pic'));
			
			if($this->Auth->user('role') == 'admin'){

				return $this->redirect(array('controller'=>'pages','action' => 'dashboard','admin'=>true));					
					
			}
			elseif($this->Auth->user('role') == 'user'){
				
				if($this->Auth->user('login_status') == '0')
					{
						$this->User->updateAll(array('User.login_status' => "'1'"), array('User.id' => $this->Auth->user('id')));
						return $this->redirect(array('controller'=>'users','action' => 'company_info'));
					}
					else
					{
						return $this->redirect(array('controller'=>'pages','action' => 'dashboard'));
					}
			}
			elseif ($this->Auth->user('role') == 'staff')
			{
				$User_id = $this->Auth->user('id');
				$StaffDetail = $this->User->findUserbyId($User_id);
				if(!empty($StaffDetail))
				{
					$Parent_id = $StaffDetail['User']['login_id'];
					$userParentDetail = $this->User->findUserbyId($Parent_id);
					//pr($userParentDetail);
					//$this->Session->write('Auth.User', $userParentDetail);
                  	
                  	$this->Session->write('Auth.User.id', $userParentDetail['User']['id']);
                  	$this->Session->write('Auth.User.staff_id', $StaffDetail['User']['id']);
                    $this->Session->write('Auth.User.ParentUser', $userParentDetail['User']);
                    
					//pr($this->Auth->user());die();
					return $this->redirect(array('controller'=>'pages','action' => 'dashboard'));
				}
				
				return $this->redirect(array('controller'=>'pages','action' => 'dashboard'));
			}			
		}
		else{
			$this->Flash->error('Please Check Your Email / Password Combination.' , array('key' => 'positive'));
		}
	}
}


/*-------------------------------------------*/
 /*public function register() {
	//loo$this->autoRender = false;
	//$this->layout="frontend";
	$this->loadModel('UserPlan');
      if ($this->request->is('ajax')) {
      		$this->autoRender = false;
        	$this->User->create();
        	$saveUser = $this->User->save($this->request->data);
            if ($saveUser) {
            	$this->UserPlan->giveUserCredit($saveUser['User']['id']);
                $this->Flash->success(('The user has been saved'), array('key'=> 'positive'));
                return $this->redirect(array('controller'=>'pages','action' => 'index'));
            }else{
            $this->Flash->error(('The user could not be saved. Please, try again.'), array('key'=> 'positive'));
        	}
       }
       else{

       	$this->title('Register');
       }
    }*/


    public function register() {
    	$this->set('title','Repair Shoppe Login-Signup');
		
		$this->layout = false;
		$this->loadModel('UserPlan');

		$email =$this->request->data('email');
		$password =$this->request->data('password');
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

    /////////////////////////////////////////////////////


    public function feature() {
    	
		$this->layout="frontend1";
		$this->set('title','Feature');

    }


    //////////////////////////////////////////////////////

     public function pricing() {
    	
		$this->layout="frontend1";
		$this->set('title','Feature');

    }

    ///////////////////////////////////////////////////

    public function chackDomain() {
    	
		$domain =$this->request->data('domain');
		if ($this->request->is('ajax'))
	    {
	    	
	    	$checkdomain = $this->User->findUserByDomain($domain);	
	    	if(!empty($checkdomain))
	    	{
	    		echo "invalid";exit();
	    	}
	    	else{
	    		echo "success";exit();
	    	}
	        
	   	}

    }

/*-------------------------------------------*/

	
public function complete_register() {

	//loo$this->autoRender = false;
	//$this->layout="frontend1";
	$this->layout=false;
	  if($this->request->is('post')){

      		$user = $this->request->data;
      		//pr($user);die();
      		$admin_name = $user['User']['admin_name'];
      		$user['User']['first_name']= $admin_name;
      		$email = $user['User']['email'];
      		
      		
      		$this->User->create();
        	$saveUser = $this->User->save($user);
        	$newuser_id = $this->User->getInsertID();
        	$today = date("Y-m-d");
        	$user = $this->User->query("INSERT INTO users (login_id,email,first_name,last_name) VALUES ('$newuser_id','walkin@gmail.com','Walkin','Customer')");
        	$UserPackage = $this->UserPackage->query("INSERT INTO user_packages (user_id,item_name,amount,payment_date) VALUES ('$newuser_id','Basic package','0','$today')");

            if ($saveUser) {

            	$from ="admin@repairshop.com";
		        $to = $email;
		        $subject ="Activation link - Your registration with Repair Shop";
		        $message ='<html>
    <head></head>
    <body>
        <div style="width:100%; height:auto ">
            <div style="width:auto; margin:1% 15%; font-size:20px">
                <div style="width:auto; height:40px">
                    <div style="float:left;font-family:URW Chancery L; font-size:28px ">
                        <i> <a href="#" style="text-decoration:none">Repair Shop</a></i>
                    </div>
                </div>
                <div style="margin-top:40px; width:600px; text-align:justify"> Welcome to Repair Shop! Your account has been registered under your "'.$email.'" is now ready to go. All you need to do is to confirm your email address with us.</p>
                </div>
                <p style="margin-top:5px"></p>
                <p style="margin-top:5px; text-align:justify">Please, click on below link to confirm your registration at whizna.com </p>
                <div style=" margin-top:8px"> 
                    <a href="http//112.196.42.180/projects/repairshopsaas/repairshopsaas/login" style="color:#0fcfff"> Activate Now</a>
                </div>
                <div style="margin-top:100px; width:600px">
                    <hr ><center>
                    ©2017 Repair shop, All Rights Reserved<br>
                	
            	</div>
            <div style="margin-top:20px; width:600px"><center>
                <a href="#" style="color:#0fcfff">Terms of Services</a><a href="#" style="color:#0fcfff; margin-left:40px">Privacy Policy</a></div>
            <div style="margin-top:20px; width:600px;font-family:URW Chancery L; font-size:28px "><center> <i> <a href="#" style="text-decoration:none">Repair Shop</a></i></div>
        </div>
    </div>
    </body>';
		       
		        $mail = new CakeEmail();
            	$mail->from($from);
            	$mail->to($to);
            	$mail->subject($subject);
            	$mail->send($message);



                $this->Flash->success(('Account was Successfully Created!!'), array('key'=> 'positive'));
                return $this->redirect(array('controller'=>'users','action' => 'thanku'));
            }else{
            $this->Flash->error(('The user could not be saved. Please, try again.'), array('key'=> 'positive'));
        	}
       }
       else{

       	$this->title('Register');
       }

}

public function thanku() {
	
	$this->layout=false;
	

}


////////////////////////////////////////////////////////////////////////


public function admin_company_info(){
	$this->layout="frontend1";

	if($this->request->is('post')){	
		$user = $this->request->data;
		//pr($user);die();
		$address = $user['User']['address'];
		$city = $user['User']['city'];
		$state_country = $user['User']['state_country'];
		$zip = $user['User']['zip'];
		$phone_number = $user['User']['phone_number'];
		$business_website = $user['User']['business_website'];
		
		$this->User->updateAll(array('User.address' => "'$address'",'User.city' => "'$city'",'User.state_country' => "'$state_country'",'User.zip' => "'$zip'",'User.phone_number' => "'$phone_number'",'User.business_website' => "'$business_website'"), array('User.id' => $this->Auth->user('id')));

      	return $this->redirect(array('controller'=>'users','action'=>'social_media', 'admin' => true));
      		

	}	
	
}


////////////////////////////////////////////////////////////////////////


public function admin_social_media(){
	$this->layout="frontend1";
	if($this->request->is('post')){	


		$data= $this->request->data;
       // pr($data);die();
        $file = $this->data['User'];
        $name = $this->data['User']['file']['name'];
        $facebook_url = $this->data['User']['facebook_url'];
        $googleplus_url = $this->data['User']['googleplus_url'];
        $twitter_username = $this->data['User']['twitter_username'];
        $upload_dir = "img/logo/";

        if(!empty($name)){

             	$file = $this->data['User']['file'];
                $temp = explode(".", $file['name']);
                $extension = end($temp);
                $a1  = $file["name"];
                $a2 = rand();
                $aa = $a2."$a1";
                move_uploaded_file($this->data['User']['file']["tmp_name"], $upload_dir .$aa);
                $this->User->updateAll(array('User.logo' => "'$aa'"), array('User.id' => $this->Auth->user('id')));

        } 
        $this->User->updateAll(array('User.facebook_url' => "'$facebook_url'",'User.googleplus_url' => "'$googleplus_url'",'User.twitter_username' => "'$twitter_username'"), array('User.id' => $this->Auth->user('id')));

      	return $this->redirect(array('controller'=>'users','action'=>'business_setting', 'admin' => true));
      		



	}	
	
}

////////////////////////////////////////////////////////////////////////


public function admin_business_setting(){
	$this->layout="frontend1";
	if($this->request->is('post')){	
		$user = $this->request->data;
		$user['BusinessSetting']['user_id'] = $this->Auth->user('id');
		//pr($user);die();
			
		$businesssetting = $this->BusinessSetting->addBusinessSettingAdmin($user);
		if($businesssetting){
			return $this->redirect(array('controller'=>'users','action'=>'addteam', 'admin' => true));
		}
      	

	}	
	
}


////////////////////////////////////////////////////////////////////////


public function admin_addteam(){
	$this->layout="frontend1";
	if($this->request->is('post')){	
		$user = $this->request->data;
		$user['Team']['user_id'] = $this->Auth->user('id');
		//pr($user);die();
		$businesssetting = $this->Team->addTeamAdmin($user);
		if($businesssetting){
			return $this->redirect(array('controller'=>'users','action'=>'getstarted', 'admin' => true));
		}
      	

	}	
	
}


////////////////////////////////////////////////////////////////////////


public function admin_getstarted(){
	$data = 0;
	$this->layout="frontend1";
	$admin_name = $this->Auth->user('admin_name');
	$business_name = $this->Auth->user('business_name');
	$business_website = $this->Auth->user('business_website');
	$phone_number = $this->Auth->user('phone_number');
	$email = $this->Auth->user('email');

	if($this->request->is('post')){	
		$user = $this->request->data;
		$user['DemoRequest']['user_id'] = $this->Auth->user('id');
		$DemoRequest = $this->DemoRequest->addDemoRequestAdmin($user);
		
		if($DemoRequest){
			$demo_id = $this->DemoRequest->getInsertID();
			$Demo = $this->DemoRequest->findallDemoRequestById($demo_id);
			if(!empty($Demo))
			{
				$data = 1;
				return $this->set(compact('data'));
			}
			else{
				$data = 0;
				return $this->set(compact('data'));
			}
			//return $this->redirect( '/admin/' );
			//return $this->redirect(array(conaction="index",'admin' => true));
		}
      	$data = 0;

	}
	$this->set(compact('admin_name','business_name','business_website','phone_number','email','data'));	
	//$this->set(compact('user'));
	
}


////////////////////////////////////////////////////////////////////////


public function admin_watchdemo(){
	$data = 0;
	$this->layout="frontend1";

	if($this->request->is('post')){	

	}
	
}


///////////////////////////////////////////////////////////////////////

public function admin_logout(){
	$this->User->id = $this->Auth->user('id');
	$temp = $this->Auth->User('role');
	$this->User->saveField('online','0');  // Logout
	$this->Session->destroy();
	$this->Auth->logout();

	if($temp === 'admin'){

		return $this->redirect(array('controller'=>'users','action'=>'portal', 'admin' => false));
	}else{
		return $this->redirect(array('controller'=>'users','action'=>'login'));
	}
	
}

/*-------------------------------------------*/
public function logout(){
	$this->User->id = $this->Auth->user('id');
	$temp = $this->Auth->User('role');
	$this->User->saveField('online','0');  // Logout
	$this->Session->destroy();
	$this->Auth->logout();

	if($temp === 'admin'){

		return $this->redirect(array('controller'=>'users','action'=>'portal', 'admin' => false));
	}else{
		return $this->redirect(array('controller'=>'users','action'=>'login'));
	}
	
}


/*-------------------------------------------*/

public function admin_change_password(){
	$this->title('Change Password');
	$userid = $this->Auth->user('id');
	if($this->request->is('post')){	
		unset($this->request->data['User']['password2']);
		if($this->User->editUserbyId($this->request->data,$userid)){
			$this->Flash->success('Successfully Password Changed', array('key' => 'positive'));
			return $this->redirect(array('controller'=>'users','action'=>'change_password'));
		}else{
			$this->Flash->success('Password Error', array('key' => 'positive'));
		}

	}
	
}




/*-------------------------------------------*/

public function change_password(){
	if($this->Auth->user('id')!='')
    {
	$this->layout = 'frontenduser';
	$this->title('Change Password');
	$userid = $this->Auth->user('id');
	if($this->request->is('post')){	
		$user = $this->request->data;
		$current_password = $user['User']['current_password'];
		$User = $this->User->findUserPasswordById($userid);
		$Password = $User['User']['password'];
		$confirm_pass = AuthComponent::password($current_password);
		if($confirm_pass == $Password)
		{
			unset($this->request->data['User']['password2']);
			unset($this->request->data['User']['current_password']);
			if($this->User->editUserbyId($this->request->data,$userid)){
				$this->Flash->success('Successfully Password Changed', array('key' => 'positive'));
				return $this->redirect(array('controller'=>'users','action'=>'change_password'));
			}else{
				$this->Flash->failure('Password Error', array('key' => 'positive'));
			}
		}
		else{
			$this->Flash->failure('Your Current Password Not Match Please Try Again!!', array('key' => 'positive'));
			//return $this->redirect(array('controller'=>'users','action'=>'change_password'));
		}
		

	}
	}
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

/*-------------------------------------------*/

public function forgota_password(){
	App::uses('CakeEmail', 'Network/Email');
	$this->title('Forgot Password');
	$userid = $this->Auth->user('id');
	$this->layout = false;

	if($this->request->is('post')){	
	$checkemail = $this->User->findByEmail($this->request->data['User']['email']);

	if($checkemail){
		$code = md5(time());
		$data['User']['email_code'] = $code;
		$Email = new CakeEmail();
		$Email->from(array('admin@runningportal.com' => 'RP'));
		$Email->to($this->request->data['User']['email']);
		$Email->subject('Forgot Password');
		$Email->send($code);
		$this->User->editUserbyId($data,$checkemail['User']['id']);
		$this->Flash->success('Please Check your email', array('key' => 'positive'));
	}else{
		$this->Flash->success('Email Not Exist', array('key' => 'positive'));
	}

	}

}

/*-------------------------------------------*/

public function forgot_password(){
	App::uses('CakeEmail', 'Network/Email');
	$this->title('Forgot Password');
	$userid = $this->Auth->user('id');

	if($this->request->is('post')){	
	$checkemail = $this->User->findByEmail($this->request->data['User']['email']);

	if($checkemail){
		$code = md5(time());
		$data['User']['email_code'] = $code;
		$Email = new CakeEmail();
		$Email->from(array('admin@runningportal.com' => 'RP'));
		$Email->to('you@example.com');
		$Email->subject('Forgot Password');
		$Email->send($code);
		$this->User->editUserbyId($data,$checkemail['User']['id']);
		$this->Flash->success('Please Check your email', array('key' => 'positive'));
	}else{
		$this->Flash->success('Email Not Exist', array('key' => 'positive'));
	}

	}

}

/*************************/

public function checkemail(){
//echo '<pre>';print_r($this->request->data);die;
$email=$this->request->data;
$this->autoRender = false;
$checkemail = $this->User->findByEmail($email);
if($checkemail){
	echo 'Already exists';
}

}


/*-------------------------------------------*/

public function admin_index(){
	$this->set('title','User List');
    $allusers = $this->User->allUsers();
	foreach ($allusers as $key => $person) {

		   $user_id = $person['User']['id'];
		   $phones = $this->Phone->findbyUserid($user_id);
		   $result = "";
		   
		   foreach ($phones as $ph) {
		   		$type = $ph['Phone']['phone_type'];
		   		$number = $ph['Phone']['phone_number'];

		   		$result[] = $type.'*'.$number;
		   }
	 
		   $allusers[$key]["phone"] =  $result;
	
  	}
	$this->set('users', $allusers);

}

/*-------------------------------------------*/

public function admin_profile(){
	$this->set('title','Profile');
	$loggedId = $this->Auth->user('id');
	$user = $this->User->findUserbyId($loggedId);
	$prevProfilePic = $user['User']['profile_pic'];
	if($this->request->is('post'))
	{  
		$this->Img = $this->Components->load('Img');
		if($this->data['User']['profile_pic']['name']){
			$allowedExts = array("jpg","jpeg","png");
		        $ext = $this->Img->ext($this->request->data['User']['profile_pic']['name']); 
		        if (in_array($ext, $allowedExts) ) 
    			{
    				$newName = strtotime(date("Y-m-d h:i:s"));
					$origFile = $newName . '.' . $ext;
					$dst = $newName . '.jpg';
					$targetdir = WWW_ROOT .'img/user_image/';
					$upload = $this->Img->upload($this->request->data['User']['profile_pic']['tmp_name'], $targetdir, $origFile);
					if($upload == 'Success') 
					{
						$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/user_image/small/', $dst, 160, 160, 1, 0);
						$this->request->data['User']['profile_pic'] = $dst;
						
								
						

					}


    			}

		}else{
			$this->request->data['User']['profile_pic'] = $prevProfilePic;

		}
		//echo '<pre>';print_r($this->request->data);die;
		
		if($this->User->editUserbyId($this->request->data,$loggedId)){
			$this->Flash->success('Successfully Edited', array('key' => 'positive'));
		}
		return $this->redirect(array('controller'=>'users','action'=>'profile'));

		

	}
	$this->data = $user ;
	$this->set(compact('user'));
}

/*-------------------------------------------*/

public function admin_add(){

error_reporting(0);
	$this->set('title','Add User');
//	$this->loadModel('Address');findAllCustomerField
	//$this->User->set($this->request->data);
	$CustomerField = $this->CustomerField->findAllCustomerField();
   	$this->set('CustomerField', $CustomerField); 
	if($this->request->is('post')){

	pr($this->request->data);die();
		$user  = $this->request->data['User'];
		$changes = json_encode($user);
		$yes= $user['yes'];
		$customerfield  = $user['customerfield'];

		if($yes=='0')
		{


			$user  = $this->request->data['User'];
			$phone = $this->request->data['phone'];
	
		
	
			$text= $user['text'];
			$first_name= $user['first_name'];
			$last_name= $user['last_name'];
			//echo $first_name;
			//echo $last_name;die();
			//pr($user);die();
			//pr($phone);
			//	pr($address);die();

			$this->User->set($user);	

			if($this->User->validates()){

				$saveUser = $this->User->addUserAdmin($user);
				$user_id = $this->User->getInsertID();

				if($customerfield=='1')
				{
					$customerfieldValue =$this->request->data['customerfieldValue'];
					$counter = count($customerfieldValue['value']);
				    if($counter!='')
				    {
				        for($i=1;$i<=$counter;$i++)
				        {

				            $value = $customerfieldValue['value'][$i];
				            //pr($value).'<br>';
				            $name = $customerfieldValue['name'][$i];
				            //pr($name).'<br>';
				            $customer_field_id = $customerfieldValue['customer_field_id'][$i];
				            $field_type = $customerfieldValue['field_type'][$i];
				            if($value==''){
				            	$user = $this->CustomerFieldValue->query("INSERT INTO customer_field_values (user_id,customer_field_id,value,field_type,name) VALUES ('$user_id','$customer_field_id','','$field_type','$name')");
				            }
				            else{
				            	$user = $this->CustomerFieldValue->query("INSERT INTO customer_field_values (user_id,customer_field_id,value,field_type,name) VALUES ('$user_id','$customer_field_id','$value','$field_type','$name')");
				            }

				        }
				        
				    }
				}


			 	if($saveUser){

					$user_id = $this->User->getInsertID();
					$logs['changes']=$changes;
					$logs['user_id']=$user_id;
					$logs['employee']=$this->Session->read('Auth.User.email');
					$saveUser = $this->Log->addLog($logs);
					//echo $user_id; die();
					for($i=0;$i<count($phone);$i++){

						$phones[$i]['user_id'] = $user_id;
						$phones[$i]['phone_type'] = $phone[$i]['type'];
						$phones[$i]['phone_number'] = $phone[$i]['number'];
						$phones[$i]['extension'] = $phone[$i]['extension'];

						//echo "<pre>"; print_r($phones); die(); */

						$this->Phone->addPhoneAdmin($phones[$i]);
					}


	 
					if($text=="text1"){
					$this->Flash->success('User Add Successfully', array('key' => 'positive'));
	    				return $this->redirect(array('controller'=>'Users','action'=>'userdetail',$user_id));
	    			}
	    			elseif($text=="text2"){
	    				$user_id = $this->User->getInsertID();
	    				//echo $user_id;
	    				//$sqla = "INSERT INTO sales (user_id) VALUES ('$user_id')";
	    				
	    					$this->Flash->success('User Add Successfully', array('key' => 'positive'));
	    				return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0));
	    				    				//$this->Sales->query("INSERT INTO sales (user_id) VALUES ('$user_id')");
					//$this->Flash->success('User Add Successfully', array('key' => 'positive'));
					
	    				
	    			}
				}
					else{
						$this->Flash->success('User Not be added', array('key' => 'positive'));
	    				return $this->redirect(array('controller'=>'Users','action'=>'add'));
					}
				
			}
			else{
				//$errors = 
				$errors = $this->User->validationErrors;     
				$this->Flash->failure($errors);
				}
					
		}

		
		else
		{

			$user  = $this->request->data['User'];
			$phone = $this->request->data['phone'];
			$address =  $this->request->data['address'];

			$text= $user['text'];
			$first_name= $user['first_name'];
			$last_name= $user['last_name'];
			//echo $first_name;
			//echo $last_name;die();
			//pr($user);die();
			//pr($phone);
			//	pr($address);die();

			$this->User->set($user);

			if($this->User->validates()){

				$saveUser = $this->User->addUserAdmin($user);
				$user_id = $this->User->getInsertID();

				if($customerfield=='1')
				{
					$customerfieldValue =$this->request->data['customerfieldValue'];
					$counter = count($customerfieldValue['value']);
				    if($counter!='')
				    {
				        for($i=1;$i<=$counter;$i++)
				        {
				            $value = $customerfieldValue['value'][$i];
				            $customer_field_id = $customerfieldValue['customer_field_id'][$i];
				            $field_type = $customerfieldValue['field_type'][$i];
				            $name = $customerfieldValue['name'][$i];

				            if($value==''){
				            	$user = $this->CustomerFieldValue->query("INSERT INTO customer_field_values (user_id,customer_field_id,value,field_type,name) VALUES ('$user_id','$customer_field_id','','$field_type','$name')");
				            }
				            else{
				            	$user = $this->CustomerFieldValue->query("INSERT INTO customer_field_values (user_id,customer_field_id,value,field_type,name) VALUES ('$user_id','$customer_field_id','$value','$field_type','$name')");
				            }
				        	

				        }
				        
				    }
				}

			 	if($saveUser){

					$user_id = $this->User->getInsertID();
					//echo $user_id; die();

					$logs['changes']=$changes;
					$logs['user_id']=$user_id;
					$logs['employee']=$this->Session->read('Auth.User.email');
					$saveUser = $this->Log->addLog($logs);

					for($i=0;$i<count($phone);$i++){

						$phones[$i]['user_id'] = $user_id;
						$phones[$i]['phone_type'] = $phone[$i]['type'];
						$phones[$i]['phone_number'] = $phone[$i]['number'];
						$phones[$i]['extension'] = $phone[$i]['extension'];

						//echo "<pre>"; print_r($phones); die(); */

						$this->Phone->addPhoneAdmin($phones[$i]);
					}


					for($j=1;$j<=count($address);$j++){

						$addresses[$j]['user_id'] = $user_id;
						$addresses[$j]['type'] = $address[$j]['type'];
						$addresses[$j]['name'] = $address[$j]['name'];
						$addresses[$j]['street'] = $address[$j]['street'];
						$addresses[$j]['address'] = $address[$j]['address'];
						$addresses[$j]['city'] = $address[$j]['city'];
						$addresses[$j]['country'] = $address[$j]['country'];
						$addresses[$j]['zip'] = $address[$j]['zip'];

						//echo "<pre>"; print_r($addresses); die(); 

						$this->Address->addAddressAdmin($addresses[$j]);

	   					
					}
	 
					if($text=="text1"){
					$this->Flash->success('User Add Successfully', array('key' => 'positive'));
	    				return $this->redirect(array('controller'=>'Users','action'=>'userdetail',$user_id));
	    			}
	    			elseif($text=="text2"){
	    				$user_id = $this->User->getInsertID();
	    				//echo $user_id;
	    				//$sqla = "INSERT INTO sales (user_id) VALUES ('$user_id')";
	    				
	    					$this->Flash->success('User Add Successfully', array('key' => 'positive'));
	    				return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0));
	    				    				//$this->Sales->query("INSERT INTO sales (user_id) VALUES ('$user_id')");
					//$this->Flash->success('User Add Successfully', array('key' => 'positive'));
					
	    				
	    			}
				}
				else{
					$this->Flash->success('User Not be added', array('key' => 'positive'));
    				return $this->redirect(array('controller'=>'Users','action'=>'add'));
				}
				
			}
			else{
				//$errors = 
				$errors = $this->User->validationErrors;     
				$this->Flash->failure($errors);
				}
					
		}
	}
}
/*-------------------------------------------*/

 public function admin_useredit($id){
 	error_reporting(0);
	$this->set('title','Edit User');

	$user = $this->User->findUserbyId($id); // Get User Detail from id

	$userid = $user['User']['id'];

	//echo '<pre>';print_r($userid);
	//echo '<pre>';print_r($user);
	$phone = $this->Phone->findbyUserid($id);
	$address = $this->Address->findFullAddressbyUserId($id);
	$CustomerFieldValue = $this->CustomerFieldValue->findallCustomerFieldValueByUserId($id);
	$CustomerField = $this->CustomerField->findAllCustomerField();
	//echo '<pre>';print_r($CustomerFieldValue);die();
	//echo '<pre>';print_r($address);die();
	//$prevProfilePic = $user['User']['profile_pic'];
	if($this->User->validates()){

		if($this->request->is('post'))
		{  
			$user=$this->request->data;
			$customerfieldvalue = $user['User']['customerfieldvalue'];
			$customerfield = $user['User']['customerfield'];
			$changes = json_encode($user);
			//echo '<pre>';print_r($user);die();
			if($this->User->editUserbyId($user,$id)){
				$logs['changes']=$changes;
				$logs['user_id']=$id;
				$logs['employee']=$this->Session->read('Auth.User.email');
				$logs['edit']="edit";
				$saveUser = $this->Log->addLog($logs);
				if($customerfield=='yes')
				{
					$customerfieldValue =$this->request->data['customerfieldValue'];
					$counter = count($customerfieldValue['value']);
				    if($counter!='')
				    {
				        for($i=1;$i<=$counter;$i++)
				        {
				            $value = $customerfieldValue['value'][$i];
				            $customer_field_id = $customerfieldValue['customer_field_id'][$i];
				            $field_type = $customerfieldValue['field_type'][$i];
				            $name = $customerfieldValue['name'][$i];
				            $user = $this->CustomerFieldValue->query("INSERT INTO customer_field_values (user_id,customer_field_id,value,field_type,name) VALUES ('$id','$customer_field_id','$value','$field_type','$name')");
				        	

				        }
				        
				    }
					//if($this->Phone->editPhonebyUserId($this->request->data,$id)){
					$this->Flash->success('User Updated!', array('key' => 'positive'));		
					return $this->redirect(array('controller'=>'users','action'=>'userdetail',$id));
				}
				if($customerfieldvalue=="yes")
				{
					$customerfieldValue =$this->request->data['customerfieldValue'];
					$counter = count($customerfieldValue['value']);
				    if($counter!='')
				    {
				        for($i=1;$i<=$counter;$i++)
				        {
				            $value = $customerfieldValue['value'][$i];
				            $customer_field_id = $customerfieldValue['customer_field_id'][$i];
				            $field_type = $customerfieldValue['field_type'][$i];
				            $name = $customerfieldValue['name'][$i];
				            $customer_field_value_id = $customerfieldValue['id'][$i];

				        	$user = $this->CustomerFieldValue->query("UPDATE customer_field_values SET user_id='$id',customer_field_id='$customer_field_id',value='$value',field_type='$field_type',name='$name' WHERE id='$customer_field_value_id'");

				        }
				        
				    }
				    $this->Flash->success('User Updated!', array('key' => 'positive'));		
					return $this->redirect(array('controller'=>'users','action'=>'userdetail',$id));
				}
				else
				{
					$this->Flash->success('User Updated!', array('key' => 'positive'));		
					return $this->redirect(array('controller'=>'users','action'=>'userdetail',$id));
				}
	//	}
			}  
			else
			{
				return $this->redirect(array('controller'=>'users','action'=>'useredit',$id));
			}
		}

	}
	else{
				//$errors = 
				$errors = $this->User->validationErrors;     
				$this->Flash->failure($errors);
				}
	$this->data = $user ;
	$this->set(compact('user'));
	$this->set(compact('phone','CustomerFieldValue','CustomerField','address','userid'));
}




/*---------------------------------------------------*/

public function admin_useraddressedit()
 {

 	$type =$this->request->data('type');
 	$name =$this->request->data('name');
 	$street_address =$this->request->data('street_address');
 	$address =$this->request->data('address');
 	$city =$this->request->data('city');
  	$country =$this->request->data('country');
  	$zip =$this->request->data('zip');
  	$userid =$this->request->data('userid');
  	$addressid =$this->request->data('addressid');
   
  
    $this->Address->updateAll(array('user_id' => "'$userid'",'type' => "'$type'",'name' => "'$name'",'street' => "'$street_address'",'address' => "'$address'",'city' => "'$city'",'country' => "'$country'",'zip' => "'$zip'",),array('id' => $addressid));   
  
  	exit;
 }

/*---------------------------------------------------*/

public function admin_userdeleteaddress()
 {
 	$addressid =$this->request->data('addressid');
   
    $this->Address->deleteAddress($addressid);
	$this->Flash->success('Address Deleted Successfully', array('key' => 'positive'));	
	//return $this->redirect(array('controller'=>'users','action'=>'index'));
  	exit;
 }

/*---------------------------------------------------*/

public function admin_userphoneedit()
 {

 	$type =$this->request->data('phone_type');
 	$phone_number =$this->request->data('UserPhoneNumber');
 	$UserExtension =$this->request->data('UserExtension');
 	$userid =$this->request->data('userid');
  	$phoneid =$this->request->data('phoneid');
   
  
    $this->Phone->updateAll(array('user_id' => "'$userid'",'phone_type' => "'$type'",'phone_number' => "'$phone_number'",'extension' => "'$UserExtension'"),array('id' => $phoneid));   
  
  	exit;
 }


/*---------------------------------------------------*/

public function admin_userdeletephone()
 {
 	$phoneid =$this->request->data('phoneid');
   
    $this->Phone->deletePhone($phoneid);
	$this->Flash->success('Phone Deleted Successfully', array('key' => 'positive'));	
	//return $this->redirect(array('controller'=>'users','action'=>'index'));
  	exit;
 }

/*---------------------------------------------------*/

public function admin_addnewuseraddress()
 {

 	$type =$this->request->data('type');
 	$name =$this->request->data('name');
 	$street =$this->request->data('street');
 	$address =$this->request->data('address');
 	$city =$this->request->data('city');
  	$country =$this->request->data('country');
  	$zip =$this->request->data('zip');
  	$userid =$this->request->data('userid');
  	
  
    $this->Address->query("INSERT INTO addresses (user_id,type,name,street,address,city,country,zip) VALUES ('$userid','$type','$name','$street','$address','$city','$country','$zip')");
  
  	$this->Flash->success('Address Added Successfully', array('key' => 'positive'));
  	
   	exit;
 }



/*---------------------------------------------------*/

public function admin_addnewuserphone()
 {

 	$phone_user_id =$this->request->data('phone_user_id');
 	$phone_type =$this->request->data('phone_type');
 	$phone_number =$this->request->data('phone_number');
 	$extension =$this->request->data('extension');
 	
  
    $this->Address->query("INSERT INTO phones (user_id,phone_type,phone_number,extension) VALUES ('$phone_user_id','$phone_type','$phone_number','$extension')");
  
   	exit;
 }





/*-------------------------------------------*/

public function admin_deleteuser($id){
	$this->User->deleteUser($id);
	$this->Flash->success('User Deleted Successfully', array('key' => 'positive'));	
	return $this->redirect(array('controller'=>'users','action'=>'index'));
}

/*-------------------------------------------*/

////////////////////////////////////////////////////////////////////

public function admin_customerfields() 
{
    //echo $user_id;die();
   $this->set('title','Add Ticket');
   $CustomerField = $this->CustomerField->findAllCustomerField();
   $this->set('CustomerField', $CustomerField); 
    
}


////////////////////////New Customer Field////////////////////////////////////////////

public function admin_addnewcustomerfield() 
{
    $this->set('title','Add New Field');
    if($this->request->is('post')){

        $fields = $this->request->data;
        //pr($fields);die();
        $save = $this->CustomerField->addCustomerFieldAdmin($fields);
        $this->Flash->success('Field Added!', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Users","action" => "customerfields"));
    }
   
}

////////////////////////customerfieldedit////////////////////////////////////////


public function admin_customerfieldedit($id) 
{
    $this->set('title','Edit New Field');
    $CustomerField = $this->CustomerField->findCustomerFieldById($id); 
    $this->data = $CustomerField ;
	$this->set(compact('CustomerField'));
   
}
public function admin_customerfieldsedit() 
{
    $this->set('title','Edit New Field');
    if($this->request->is('post')){
        
        $Field=$this->request->data;
        //pr($Field);die();
        $id = $Field['CustomerField']['id'];
        $save = $this->CustomerField->editCustomerFieldAdmin($Field,$id);
        $this->Flash->success('Field Updated!', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Users","action" => "customerfields"));
    }   
   
}


//////////////////////////////////////////////////////////////////////

public function admin_customerfielddelete($customer_field_id){
    $this->CustomerField->deleteCustomerField($customer_field_id);
    $this->Flash->success('Field Deleted!', array('key' => 'positive'));  
    return $this->redirect(array("controller" => "Users","action" => "customerfields"));
}


///////////////////////////////////////////////////////////////////////

public function admin_updatecustomerfieldname()
{

    $name =$this->request->data('name');
    $id =$this->request->data('id');

    if ($this->request->is('ajax'))
    {
        $this->CustomerField->updateAll(array('name' => "'$name'"),array('id' => $id));
    }        
    exit();
}


////////////////////////////////////////////////////////////////////




public function admin_userfetch(){

	if($this->request->is('post')){
		echo '<pre>';print_r($this->request->data);
		$data = $this->request->data['search'];
		$this->paginate = array(
	    'limit' => 1,
		'order' => array('id' => 'asc'),
		'conditions' => array(
									'OR' => array(
												array('User.first_name LIKE' => '%'.$data.'%'),
												array('User.middle_name LIKE' => '%'.$data.'%'),
												array('User.surname LIKE' => '%'.$data.'%'),
												array('User.role LIKE' => '%'.$data.'%'),
												array('User.email LIKE' => '%'.$data.'%')
											)
										)
	);		
		$users = $this->paginate('User'); 

		echo json_encode($users);



	}
	$this->autoRender = false;


}

/*-------------------------------CRM----------------------------------*/
		
/*--------------------------------CRM--------------------------------*/

public function admin_userdetail($id){
	
	
	$userDetail = $this->User->findUserbyId($id);
	$communicationlog = $this->CommunicationLog->findallCommunicationLogByUserId($id);
	$reminder = $this->Reminder->findallReminderByUserId($id);
	$Address = $this->Address->findFullAddressbyUserId($id);
	$invoice = $this->Invoice->findInvoicebyUserId($id);
	$ticket = $this->Ticket->findTicketbyUserId($id);
	$estimate = $this->Estimate->findEstimatebyUserId($id);
	$lead = $this->Lead->findLeadbyUserId($id);
	$attachment = $this->Attachment->findAttachmentbyUserId($id);
	$assets = $this->AssetFieldValue->findallAssetFieldValueByUserId($id);
	$order = $this->Order->findOrderbyUserId($id);
	$Email = $this->Email->findEmailbyUserId($id);
	$Contract = $this->Contract->findContractbyUserId($id);
	$phone = $this->Phone->findbyUserid($id);
	$Schedule = $this->Schedule->findSchedulebyUserId($id);
	$logs = $this->Log->findLogByUserId($id);
	$Warranty = $this->Warranty->findWarrantybyUserId($id);
	$Contact = $this->Contact->findContactbyUserId($id);
	$CustomerFieldValue = $this->CustomerFieldValue->findallCustomerFieldValueByUserId($id);
	$CustomerField = $this->CustomerField->findAllCustomerField();
	$PortalUser = $this->PortalUser->findPortalUserbyUserId($id);
    //pr($PortalUser);   die();

	$this->set(compact('userDetail','communicationlog','reminder','Address','invoice','ticket','estimate','lead','attachment','assets','order','Email','Contract','phone','Schedule','logs','Warranty','Contact','CustomerFieldValue','CustomerField','PortalUser'));
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_notesupdate()
{
    $notes =$this->request->data('notes');
    $user_id =$this->request->data('user_id');
  
    if ($this->request->is('ajax'))
    {
        $this->User->query("UPDATE users SET notes = '$notes' WHERE id = $user_id");
	}
	exit();    
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_attachment()
{
    
        
    if ($this->request->is(['post','put'])) 
    {
        $data= $this->request->data;
        //pr($data);die();
        $attachment = $this->data['attachment'];
        $name = $this->data['attachment']['file']['name'];
        $user_id = $this->data['attachment']['user_id'];
        $status = $this->data['attachment']['status'];
        //$lead_id = $this->data['Lead']['lead_id'];
      //  echo "<pre>";print_r($name);
       // echo "<pre>";print_r($data);
        $upload_dir = "img/attachment/";

        if(!empty($name)){

             $file = $this->data['attachment']['file'];
             //move_uploaded_file($_FILES["files"]["tmp_name"],$file['tmp_name'],'/img/attachment/' . $file['name']);
             //$this->data['Lead']['image'] = $file['name'];die();

                $temp = explode(".", $file['name']);
                $extension = end($temp);
                $a1  = $file["name"];
                $a2 = rand();
                $aa = $a2."$a1";
              //  echo "<pre>"; print_r($aa); die();
                //    $aa = $aa . "."."$extension";
                //$name[] = $aa;
               // move_uploaded_file($this->data['Lead']['file']["tmp_name"], $upload_dir . $aa);die();
                move_uploaded_file($this->data['attachment']['file']["tmp_name"], $upload_dir .$aa);

        } 

        if ($this->Attachment->addAttachmentAdmin($data)) {

            $attachment_id = $this->Attachment->getInsertID();
            $this->Attachment->updateAll(array('user_id' => "'$user_id'",'file'=>"'$aa'",'status'=>"'$status'"),array('id' => $attachment_id));
            $this->Flash->success('File Attech Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "users","action" => "userdetail",$user_id));  
 
        } else {
            $this->Flash->success('File Not be Attech', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "users","action" => "userdetail",$user_id));  
 
        }

    }    




}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function admin_deleteAttachment($id,$user_id,$file_name)
{
    
    $this->Attachment->deleteAttachment($id);
    unlink('img/attachment/'.$file_name);
    //unlink("uploads/".$row['file']);
    $this->Flash->success('Attachment Deleted Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "users","action" => "userdetail",$user_id));

}
/*----------------------------------------------------------------*/

public function admin_communication_log(){
	
	$this->set('title','Communication Logs');
    if($this->request->is('post')){
        $communication =$this->request->data;
        $user_id = $communication['CommunicationLog']['user_id'];
        //pr($communication);die();
        $save = $this->CommunicationLog->addCommcunicationLog($communication);
        
        return $this->redirect(array("controller" => "users","action" => "userdetail",$user_id));
    }
}

/*----------------------------------------------------------------*/

public function admin_communicationlog_list(){
	
	$this->set('title','Communication Logs List');
    $log = $this->CommunicationLog->findallCommunicationLog();
    $this->set(compact('log'));
}

/*----------------------------------------------------------------*/

public function admin_delete_communicationlog($log_id){
	
    $log = $this->CommunicationLog->DeleteCommunicationLog($log_id);
    return  $this->redirect(array("controller" => "users","action" => "communicationlog_list"));

}

/*----------------------------------------------------------------*/

public function admin_addnewreminder(){
	
	$this->set('title','New Reminder');
    if($this->request->is('post')){
        $reminder =$this->request->data;
        $user_id = $reminder['Reminder']['user_id'];
        //pr($reminder);die();
        $save = $this->Reminder->addNewReminder($reminder);
        
        return $this->redirect(array("controller" => "users","action" => "userdetail",$user_id));
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function admin_deletereminder($id,$user_id){
    $this->Reminder->DeleteReminder($id);
     
    $this->Flash->success('Reminder Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'users','action'=>'userdetail',$user_id));
}


public function admin_updatereminder($id,$user_id){
    $reminder = $this->Reminder->findallReminderById($id);
    $at = $reminder['Reminder']['at'];
    $new_at = date('m/d/Y g:i A', strtotime($at. ' + 1 days'));
    //pr($reminder);die(); 
    //$this->Reminder->updateAll()
    $this->Reminder->updateAll(array('Reminder.at' => "'$new_at'"),array('Reminder.id' =>$id));
    
    $this->Flash->success('Updated!', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'users','action'=>'userdetail',$user_id));
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function admin_addappointment()
{ 
    if($this->request->is('post'))
    { 
    
        $Appointments=$this->request->data;
        //pr($Appointments);die();
        $save = $this->Appointment->addAppointmentAdmin($Appointments);
        $Appointment_id = $this->Appointment->getInsertID();
        $this->Flash->success('Appointments added Successfully', array('key' => 'positive'));
        return  $this->redirect(array("controller" => "Calendars","action" => "add"));  
    }
}

/*----------------------------------------------------------------*/

public function admin_addnewcontact(){
    
    $this->set('title','Add New Contact');
    $user_id =$this->request->data('user_id');
    $contact = array();
    $contact['Contact']['user_id']=$user_id; 
    if ($this->request->is('ajax'))
    {
        $this->Contact->addContactAdmin($contact);
        $this->Flash->success('Row Added!',array('key' => 'positive'));
        echo $contact_id = $this->Contact->getInsertID();
        // $this->set('user', $user);
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function admin_deletecontact($contact_id,$user_id){
    $this->Contact->deleteContact($contact_id);
    $this->Flash->success('Contact Deleted!',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Users","action"=>"userdetail",$user_id));    
}
/*-----------------------------------------------------------------*/

public function admin_userview($id){
	$this->set('title','Profile');
	$this->loadModel('Privacy');
	$this->loadModel('Connection');
	$this->loadModel('Blog');
	$this->loadModel('Transaction');
	$userCourseDetail = $this->User->UserwithCourses($id);
	$allPrivacy = $this->Privacy->allPrivacy($id);
	$userDetail = $this->User->findUserbyId($id);
	$userConnections = $this->Connection->findConnectionsById($id);
	$userBlogs = $this->Blog->findBlogById($id);
	$userTransactions = $this->Transaction->findbyUserid($id);
	$userPhones = $this->Phone->findbyUserid($id);	

	if($this->request->is('post'))
	{  
		$this->Flash->success('Successfully Edited', array('key' => 'positive'));
		$this->User->editUserbyId($this->request->data,$id);
		return $this->redirect(array('controller'=>'users','action'=>'userview'));
    }
	$this->data = $userDetail ;
	$this->set(compact('userDetail','userCourseDetail','userPrivacyDetail','allPrivacy','userConnections','userBlogs','userTransactions','userPhones'));
}
	
/*----------------------------------------------------------------*/

public function profile(){

	$loggedId = '00'; $isLogined = false; $anylogged = false; $status = 5;
	if($this->Auth->loggedIn()){
		$loggedId = $this->Auth->User('id');
		$anylogged = true;
		$username = $this->User->find('first', array('conditions' => array('User.id' => $loggedId)));
		$username = $username['User']['username'];

		$this->loadModel('Friend');
		$reuqests = $this->Friend->find('all', array('conditions' => array('Friend.receiver' => $loggedId, 'status' => 0)));
		pr($reuqests);
		die;
		$this->set(compact('reuqests'));
	}

	if(isset($this->request->params['id'])){
		$username = $this->request->params['id'];		
	}

		$data = $this->User->find('first', array('conditions' => array('username' => $username)));
		if(count($data) == 0){
			$this->Flash->error('User Not Found.', array('key' => 'positive'));

		}else if(intval($data['User']['id']) === intval($loggedId) ){
			$isLogined = true;
		}
		$id = $data['User']['id'];

		if($anylogged && !$isLogined){
			$status = $this->friendstatus($loggedId, $data['User']['id']);
		}

		$this->loadModel('Event');
		$this->Event->recursive = -1;
		$events = $this->Event->find('all', array(
			'conditions' => array('user_id' => $id),
			'fields' => array('id', 'title', 'start_time', 'end_time')
		 ) );

		$this->set(compact('data', 'events', 'isLogined', 'anylogged', 'status'));

}

/*----------------------------------------------------------------*/

public function user_professional(){

	
	if($this->request->is('post')){
			$this->loadModel('Event');
			$data = $this->request->data;
			//pr($data);
			$data['Event']['start_time'] = strtotime(str_replace("/","-",$data['Event']['startdate'].' '.$data['Event']['starttime']));
			$data['Event']['end_time'] = strtotime(str_replace("/","-",$data['Event']['enddate'].' '.$data['Event']['endtime']));
			$this->Event->save($data);
			//pr($data);
			$this->Flash->success('Event Added Successfully.', array('key' => 'positive'));

		}

		$data = $this->User->find('first', array('conditions' => array('id' => $this->Auth->User('id'))));

		$this->loadModel('Event');
		$this->Event->recursive = -1;
		$events = $this->Event->find('all', array('conditions' => array('user_id' => $this->Auth->User('id'))));

		$this->set(compact('data', 'events'));
	
}

/**********************************************************************************/

	public function user_uploadimage(){
		
		$user = ($this->Session->read());
		$id = $user['Auth']['User']['id'];
		$usernmae = $user['Auth']['User']['username'];
		$this->layout = null;
		$out = 'fail@fail';
		if($this->request->is('post')){
			$data = $_FILES['file'];
 			
				$this->Img = $this->Components->load('Img');
				if($data['name']){
					
					$allowedExts = array("jpg","jpeg","png");
				        $ext = $this->Img->ext($data['name']); 
				        if (in_array($ext, $allowedExts) ) 
		    			{
		    				$newName = $usernmae;
							$origFile = $newName . '.' . $ext;
							$targetdir = WWW_ROOT .'img/user_image/userbanners';
							
							$out = $upload = $this->Img->upload($data['tmp_name'], $targetdir, $origFile);
							$out .= '@'.$this->webroot.'img/user_image/userbanners/'.$origFile;
							if($upload == 'Success') 
							{
								$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/user_image/userbanners/', $origFile, 1070, 315, 1, 0);
							}
							$this->User->id = $id;
							$this->User->saveField('banner_image', $origFile);
		    			}else{
		    				$out = 'ext@error';
		    			}
				}
		}
		echo $out;
	}

	
/**********************************************************************************/

	public function user_uploadpimage(){
		
		$user = ($this->Session->read());
		$id = $user['Auth']['User']['id'];
		$usernmae = $user['Auth']['User']['username'];
		$this->layout = null;
		$out = 'fail@fail';
		pr($_FILES);
		if($this->request->is('post')){
			$data = $_FILES['file'];
 			
				$this->Img = $this->Components->load('Img');
				if($data['name']){
					
					$allowedExts = array("jpg","jpeg","png");
				        $ext = $this->Img->ext($data['name']); 
				        if (in_array($ext, $allowedExts) ) 
		    			{
		    				$newName = $usernmae;
							$origFile = $newName . '.' . $ext;
							$targetdir = WWW_ROOT .'img/user_image/small';
							
							$out = $upload = $this->Img->upload($data['tmp_name'], $targetdir, $origFile);
							$out .= '@'.$this->webroot.'img/user_image/small/'.$origFile;
							if($upload == 'Success') 
							{
								$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/user_image/small/', $origFile, 252, 318, 1, 0);
							}
							$this->User->id = $id;
							$this->User->saveField('profile_pic', $origFile);
		    			}else{
		    				$out = 'ext@error';
		    			}
				}
		}
		echo $out;
	}

	
/**********************************************************************************/

	public function user_editprofile($idd = null){
		$id = $this->Auth->User('id');
		if($this->request->is('post')){
			//echo $id;
			//pr($this->request->data); die;
			$this->User->create();
			if($this->User->editUserbyId($this->request->data,$id)){
				$this->Flash->success('Profile Edited Successfully.', array('key' => 'positive'));
			}else{
				$this->Flash->error('Please Try Again.', array('key' => 'positive'));
			}
			
		}

		$this->User->recursive = -1;
		$user = $this->User->findUserbyId($id);
		$this->data = $user;
		$eventCount = $this->Event->countEventById($id);
		//pr($user);die;
		$this->set(compact('user', 'eventCount'));

	}

/**********************************************************************************/

	public function user_sendrequest($receiver_id){
		$sender_id = $this->Auth->User('id');
		$this->loadModel('Friend');
		$data['Friend']['sender'] = $sender_id;
		$data['Friend']['receiver'] = $receiver_id;
		$data['Friend']['status'] = 0;
		$data['Friend']['by'] = $sender_id;
		if($this->Friend->save($data)){
			$this->Flash->Success('Friend Request Sent Successfully.', array('key' => 'positive'));
			return $this->redirect( $this->referer());
		}else{
			$this->Flash->error('Please Try Again.', array('key' => 'positive'));
			return $this->redirect( $this->referer());
		}
	}


/**********************************************************************************/

	public function user_cancelrequest($receiver_id){
		$sender_id = $this->Auth->User('id');
		$this->loadModel('Friend');
		
		$sql = "DELETE FROM friends WHERE receiver = $receiver_id AND sender = $sender_id";
		$this->Friend->query($sql);
		return $this->redirect( $this->referer());
	}


/**********************************************************************************/

	public function friendstatus($sender_id, $receiver_id){
		$this->loadModel('Friend');
		$count = $this->Friend->find('count', array('conditions' => array('receiver' => $receiver_id, 'sender' => $sender_id)));
		if(intval($count) === 0){
			return 3;
		}else{
			$data = $this->Friend->find('first', array('conditions' => array('receiver' => $receiver_id, 'sender' => $sender_id)));
			return intval($data['Friend']['status']);
		}
	}

/**********************************************************************************/

	public function user_unfriend($receiver_id){
		$sender_id = $this->Auth->User('id');
		$this->loadModel('Friend');
		
		$sql = "DELETE FROM friends WHERE receiver = $receiver_id AND sender = $sender_id";
		$this->Friend->query($sql);
		return $this->redirect( $this->referer());
	}

/**********************************************************************************/

/********Social Login***************/

	public function social_login($provider) {
    if( $this->Hybridauth->connect($provider) ){
        $this->_successfulHybridauth($provider,$this->Hybridauth->user_profile);
    }
    else{
        // error
        $this->Session->setFlash($this->Hybridauth->error);
        $this->redirect($this->Auth->loginAction);
    }
}

public function social_endpoint($provider = null) {
			$this->Hybridauth->processEndpoint();
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
	if($this->Auth->user('id')!="")
	{
		$this->layout="frontenduser";
		$this->set('title','User List');
	    $allusers = $this->User->allUsersBysessionId($this->Auth->user('id'));
		foreach ($allusers as $key => $person) {

			   $user_id = $person['User']['id'];
			   $phones = $this->Phone->findbyUserid($user_id);
			   $result = "";
			   
			   foreach ($phones as $ph) {
			   		$type = $ph['Phone']['phone_type'];
			   		$number = $ph['Phone']['phone_number'];

			   		$result[] = $type.'*'.$number;
			   }
		 
			   $allusers[$key]["phone"] =  $result;
		
	  	}
		$this->set('users', $allusers);
	}
	else{
		$this->layout = false;
		$this->render('/Elements/404');
	}
}




public function add(){
if($this->Auth->user('id')!=''){

	$this->layout="frontenduser";
	error_reporting(0);
	$this->set('title','Add User');
//	$this->loadModel('Address');findAllCustomerField
	//$this->User->set($this->request->data);
	$CustomerField = $this->CustomerField->findCustomerFieldByLoginId($this->Auth->user('id'));
   	$this->set('CustomerField', $CustomerField); 
	if($this->request->is('post')){

	//pr($this->request->data);die();
		$user  = $this->request->data['User'];
		$changes = json_encode($user);
		$yes= $user['yes'];
		$customerfield  = $user['customerfield'];

		if($yes=='0')
		{


			$user  = $this->request->data['User'];
			$phone = $this->request->data['phone'];
	
		
	
			$text= $user['text'];
			$first_name= $user['first_name'];
			$last_name= $user['last_name'];
			//echo $first_name;
			//echo $last_name;die();
			//pr($user);die();
			//pr($phone);
			//	pr($address);die();

			$this->User->set($user);	

			if($this->User->validates()){

				$saveUser = $this->User->addUserAdmin($user);
				$user_id = $this->User->getInsertID();

				if($customerfield=='1')
				{
					$customerfieldValue =$this->request->data['customerfieldValue'];
					$counter = count($customerfieldValue['value']);
				    if($counter!='')
				    {
				        for($i=1;$i<=$counter;$i++)
				        {

				            $value = $customerfieldValue['value'][$i];
				            //pr($value).'<br>';
				            $name = $customerfieldValue['name'][$i];
				            //pr($name).'<br>';
				            $customer_field_id = $customerfieldValue['customer_field_id'][$i];
				            $field_type = $customerfieldValue['field_type'][$i];
				            if($value==''){
				            	$user = $this->CustomerFieldValue->query("INSERT INTO customer_field_values (user_id,customer_field_id,value,field_type,name) VALUES ('$user_id','$customer_field_id','','$field_type','$name')");
				            }
				            else{
				            	$user = $this->CustomerFieldValue->query("INSERT INTO customer_field_values (user_id,customer_field_id,value,field_type,name) VALUES ('$user_id','$customer_field_id','$value','$field_type','$name')");
				            }

				        }
				        
				    }
				}


			 	if($saveUser){

					$user_id = $this->User->getInsertID();
					$logs['changes']=$changes;
					$logs['user_id']=$user_id;
					$logs['employee']=$this->Session->read('Auth.User.email');
					$saveUser = $this->Log->addLog($logs);
					//echo $user_id; die();
					for($i=0;$i<count($phone);$i++){

						$phones[$i]['user_id'] = $user_id;
						$phones[$i]['phone_type'] = $phone[$i]['type'];
						$phones[$i]['phone_number'] = $phone[$i]['number'];
						$phones[$i]['extension'] = $phone[$i]['extension'];

						//echo "<pre>"; print_r($phones); die(); */

						$this->Phone->addPhoneAdmin($phones[$i]);
					}


	 
					if($text=="text1"){
					$this->Flash->success('User Add Successfully', array('key' => 'positive'));
	    				return $this->redirect(array('controller'=>'Users','action'=>'userdetail',$user_id));
	    			}
	    			elseif($text=="text2"){
	    				$user_id = $this->User->getInsertID();
	    				//echo $user_id;
	    				//$sqla = "INSERT INTO sales (user_id) VALUES ('$user_id')";
	    				
	    					$this->Flash->success('User Add Successfully', array('key' => 'positive'));
	    				return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0));
	    				    				//$this->Sales->query("INSERT INTO sales (user_id) VALUES ('$user_id')");
					//$this->Flash->success('User Add Successfully', array('key' => 'positive'));
					
	    				
	    			}
				}
					else{
						$this->Flash->success('User Not be added', array('key' => 'positive'));
	    				return $this->redirect(array('controller'=>'Users','action'=>'add'));
					}
				
			}
			else{
				//$errors = 
				$errors = $this->User->validationErrors;     
				$this->Flash->failure($errors);
				}
					
		}

		
		else
		{

			$user  = $this->request->data['User'];
			$phone = $this->request->data['phone'];
			$address =  $this->request->data['address'];

			$text= $user['text'];
			$first_name= $user['first_name'];
			$last_name= $user['last_name'];
			//echo $first_name;
			//echo $last_name;die();
			//pr($user);die();
			//pr($phone);
			//	pr($address);die();

			$this->User->set($user);

			if($this->User->validates()){

				$saveUser = $this->User->addUserAdmin($user);
				$user_id = $this->User->getInsertID();

				if($customerfield=='1')
				{
					$customerfieldValue =$this->request->data['customerfieldValue'];
					$counter = count($customerfieldValue['value']);
				    if($counter!='')
				    {
				        for($i=1;$i<=$counter;$i++)
				        {
				            $value = $customerfieldValue['value'][$i];
				            $customer_field_id = $customerfieldValue['customer_field_id'][$i];
				            $field_type = $customerfieldValue['field_type'][$i];
				            $name = $customerfieldValue['name'][$i];

				            if($value==''){
				            	$user = $this->CustomerFieldValue->query("INSERT INTO customer_field_values (user_id,customer_field_id,value,field_type,name) VALUES ('$user_id','$customer_field_id','','$field_type','$name')");
				            }
				            else{
				            	$user = $this->CustomerFieldValue->query("INSERT INTO customer_field_values (user_id,customer_field_id,value,field_type,name) VALUES ('$user_id','$customer_field_id','$value','$field_type','$name')");
				            }
				        	

				        }
				        
				    }
				}

			 	if($saveUser){

					$user_id = $this->User->getInsertID();
					//echo $user_id; die();

					$logs['changes']=$changes;
					$logs['user_id']=$user_id;
					$logs['employee']=$this->Session->read('Auth.User.email');
					$saveUser = $this->Log->addLog($logs);

					for($i=0;$i<count($phone);$i++){

						$phones[$i]['user_id'] = $user_id;
						$phones[$i]['phone_type'] = $phone[$i]['type'];
						$phones[$i]['phone_number'] = $phone[$i]['number'];
						$phones[$i]['extension'] = $phone[$i]['extension'];

						//echo "<pre>"; print_r($phones); die(); */

						$this->Phone->addPhoneAdmin($phones[$i]);
					}


					for($j=1;$j<=count($address);$j++){

						$addresses[$j]['user_id'] = $user_id;
						$addresses[$j]['type'] = $address[$j]['type'];
						$addresses[$j]['name'] = $address[$j]['name'];
						$addresses[$j]['street'] = $address[$j]['street'];
						$addresses[$j]['address'] = $address[$j]['address'];
						$addresses[$j]['city'] = $address[$j]['city'];
						$addresses[$j]['country'] = $address[$j]['country'];
						$addresses[$j]['zip'] = $address[$j]['zip'];

						//echo "<pre>"; print_r($addresses); die(); 

						$this->Address->addAddressAdmin($addresses[$j]);

	   					
					}
	 
					if($text=="text1"){
					$this->Flash->success('User Add Successfully', array('key' => 'positive'));
	    				return $this->redirect(array('controller'=>'Users','action'=>'userdetail',$user_id));
	    			}
	    			elseif($text=="text2"){
	    				$user_id = $this->User->getInsertID();
	    				//echo $user_id;
	    				//$sqla = "INSERT INTO sales (user_id) VALUES ('$user_id')";
	    				
	    					$this->Flash->success('User Add Successfully', array('key' => 'positive'));
	    				return $this->redirect(array('controller'=>'sales','action'=>'saleview',$user_id,0));
	    				    				//$this->Sales->query("INSERT INTO sales (user_id) VALUES ('$user_id')");
					//$this->Flash->success('User Add Successfully', array('key' => 'positive'));
					
	    				
	    			}
				}
				else{
					$this->Flash->success('User Not be added', array('key' => 'positive'));
    				return $this->redirect(array('controller'=>'Users','action'=>'add'));
				}
				
			}
			else{
				//$errors = 
				$errors = $this->User->validationErrors;     
				$this->Flash->failure($errors);
				}
					
		}
	}
	}
	else{
		$this->layout = false;
		$this->render('/Elements/404');
	}
}
/*-------------------------------------------*/

 public function useredit($id){
 if($this->Auth->user('id')!='')
 {
 	$this->layout="frontenduser";
 	error_reporting(0);
	$this->set('title','Edit User');

	$user = $this->User->findUserbyId($id); // Get User Detail from id

	$userid = $user['User']['id'];

	//echo '<pre>';print_r($userid);
	//echo '<pre>';print_r($user);
	$phone = $this->Phone->findbyUserid($id);
	$address = $this->Address->findFullAddressbyUserId($id);
	$CustomerFieldValue = $this->CustomerFieldValue->findallCustomerFieldValueByUserId($id);
	$CustomerField = $this->CustomerField->findCustomerFieldByLoginId($this->Auth->user('id'));
	//echo '<pre>';print_r($CustomerFieldValue);die();
	//echo '<pre>';print_r($address);die();
	//$prevProfilePic = $user['User']['profile_pic'];
	if($this->User->validates()){

		if($this->request->is('post'))
		{  
			$user=$this->request->data;
			$customerfieldvalue = $user['User']['customerfieldvalue'];
			$customerfield = $user['User']['customerfield'];
			$changes = json_encode($user);
			//echo '<pre>';print_r($user);die();
			if($this->User->editUserbyId($user,$id)){
				$logs['changes']=$changes;
				$logs['user_id']=$id;
				$logs['employee']=$this->Session->read('Auth.User.email');
				$logs['edit']="edit";
				$saveUser = $this->Log->addLog($logs);
				if($customerfield=='yes')
				{
					$customerfieldValue =$this->request->data['customerfieldValue'];
					$counter = count($customerfieldValue['value']);
				    if($counter!='')
				    {
				        for($i=1;$i<=$counter;$i++)
				        {
				            $value = $customerfieldValue['value'][$i];
				            $customer_field_id = $customerfieldValue['customer_field_id'][$i];
				            $field_type = $customerfieldValue['field_type'][$i];
				            $name = $customerfieldValue['name'][$i];
				            $user = $this->CustomerFieldValue->query("INSERT INTO customer_field_values (user_id,customer_field_id,value,field_type,name) VALUES ('$id','$customer_field_id','$value','$field_type','$name')");
				        	

				        }
				        
				    }
					//if($this->Phone->editPhonebyUserId($this->request->data,$id)){
					$this->Flash->success('User Updated!', array('key' => 'positive'));		
					return $this->redirect(array('controller'=>'users','action'=>'userdetail',$id));
				}
				if($customerfieldvalue=="yes")
				{
					$customerfieldValue =$this->request->data['customerfieldValue'];
					$counter = count($customerfieldValue['value']);
				    if($counter!='')
				    {
				        for($i=1;$i<=$counter;$i++)
				        {
				            $value = $customerfieldValue['value'][$i];
				            $customer_field_id = $customerfieldValue['customer_field_id'][$i];
				            $field_type = $customerfieldValue['field_type'][$i];
				            $name = $customerfieldValue['name'][$i];
				            $customer_field_value_id = $customerfieldValue['id'][$i];

				        	$user = $this->CustomerFieldValue->query("UPDATE customer_field_values SET user_id='$id',customer_field_id='$customer_field_id',value='$value',field_type='$field_type',name='$name' WHERE id='$customer_field_value_id'");

				        }
				        
				    }
				    $this->Flash->success('User Updated!', array('key' => 'positive'));		
					return $this->redirect(array('controller'=>'users','action'=>'userdetail',$id));
				}
				else
				{
					$this->Flash->success('User Updated!', array('key' => 'positive'));		
					return $this->redirect(array('controller'=>'users','action'=>'userdetail',$id));
				}
	//	}
			}  
			else
			{
				return $this->redirect(array('controller'=>'users','action'=>'useredit',$id));
			}
		}

	}
	else{
				//$errors = 
				$errors = $this->User->validationErrors;     
				$this->Flash->failure($errors);
				}
	$this->data = $user ;
	$this->set(compact('user'));
	$this->set(compact('phone','CustomerFieldValue','CustomerField','address','userid'));
 }
 else{
 	$this->layout = false;
	$this->render('/Elements/404');
 }
}




/*---------------------------------------------------*/

public function useraddressedit()
 {
 	if($this->Auth->user('id')!='')
 	{

 	$this->layout="frontenduser";
 	$type =$this->request->data('type');
 	$name =$this->request->data('name');
 	$street_address =$this->request->data('street_address');
 	$address =$this->request->data('address');
 	$city =$this->request->data('city');
  	$country =$this->request->data('country');
  	$zip =$this->request->data('zip');
  	$userid =$this->request->data('userid');
  	$addressid =$this->request->data('addressid');
   
  
    $this->Address->updateAll(array('user_id' => "'$userid'",'type' => "'$type'",'name' => "'$name'",'street' => "'$street_address'",'address' => "'$address'",'city' => "'$city'",'country' => "'$country'",'zip' => "'$zip'",),array('id' => $addressid));   
  
  	exit;
  	}
    else{
 	$this->layout = false;
	$this->render('/Elements/404');
 	}
 }

/*---------------------------------------------------*/

public function userdeleteaddress()
 {
 	$this->layout="frontenduser";
 	$addressid =$this->request->data('addressid');
   
    $this->Address->deleteAddress($addressid);
	$this->Flash->success('Address Deleted Successfully', array('key' => 'positive'));	
	//return $this->redirect(array('controller'=>'users','action'=>'index'));
  	exit;
 }

/*---------------------------------------------------*/

public function userphoneedit()
 {
 	$this->layout="frontenduser";
 	$type =$this->request->data('phone_type');
 	$phone_number =$this->request->data('UserPhoneNumber');
 	$UserExtension =$this->request->data('UserExtension');
 	$userid =$this->request->data('userid');
  	$phoneid =$this->request->data('phoneid');
   
  
    $this->Phone->updateAll(array('user_id' => "'$userid'",'phone_type' => "'$type'",'phone_number' => "'$phone_number'",'extension' => "'$UserExtension'"),array('id' => $phoneid));   
  
  	exit;
 }


/*---------------------------------------------------*/

public function userdeletephone()
 {
 	$this->layout="frontenduser";
 	$phoneid =$this->request->data('phoneid');
   
    $this->Phone->deletePhone($phoneid);
	$this->Flash->success('Phone Deleted Successfully', array('key' => 'positive'));	
	//return $this->redirect(array('controller'=>'users','action'=>'index'));
  	exit;
 }

/*---------------------------------------------------*/

public function addnewuseraddress()
 {
 	$this->layout="frontenduser";
 	$type =$this->request->data('type');
 	$name =$this->request->data('name');
 	$street =$this->request->data('street');
 	$address =$this->request->data('address');
 	$city =$this->request->data('city');
  	$country =$this->request->data('country');
  	$zip =$this->request->data('zip');
  	$userid =$this->request->data('userid');
  	
  
    $this->Address->query("INSERT INTO addresses (user_id,type,name,street,address,city,country,zip) VALUES ('$userid','$type','$name','$street','$address','$city','$country','$zip')");
  
  	$this->Flash->success('Address Added Successfully', array('key' => 'positive'));
  	
   	exit;
 }



/*---------------------------------------------------*/

public function addnewuserphone()
 {
 	$this->layout="frontenduser";
 	$phone_user_id =$this->request->data('phone_user_id');
 	$phone_type =$this->request->data('phone_type');
 	$phone_number =$this->request->data('phone_number');
 	$extension =$this->request->data('extension');
 	
  
    $this->Address->query("INSERT INTO phones (user_id,phone_type,phone_number,extension) VALUES ('$phone_user_id','$phone_type','$phone_number','$extension')");
  
   	exit;
 }





/*-------------------------------------------*/

public function deleteuser($id){
	$this->layout="frontenduser";
	$this->User->deleteUser($id);
	$this->Flash->success('User Deleted Successfully', array('key' => 'positive'));	
	return $this->redirect(array('controller'=>'users','action'=>'index'));
}

/*-------------------------------------------*/

////////////////////////////////////////////////////////////////////

public function customerfields() 
{
	$this->layout="frontenduser";
    //echo $user_id;die();
   $this->set('title','Customer Fields');
   $CustomerField = $this->CustomerField->findCustomerFieldByLoginId($this->Auth->user('id'));
   $this->set('CustomerField', $CustomerField); 
    
}


////////////////////////New Customer Field////////////////////////////////////////////

public function addnewcustomerfield() 
{
	$this->layout="frontenduser";
    $this->set('title','Add New Field');
    if($this->request->is('post')){

        $fields = $this->request->data;
        //pr($fields);die();
        $save = $this->CustomerField->addCustomerFieldAdmin($fields);
        $this->Flash->success('Field Added!', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Users","action" => "customerfields"));
    }
   
}

////////////////////////customerfieldedit////////////////////////////////////////


public function customerfieldedit($id) 
{
	$this->layout="frontenduser";
    $this->set('title','Edit New Field');
    $CustomerField = $this->CustomerField->findCustomerFieldById($id); 
    $this->data = $CustomerField ;
	$this->set(compact('CustomerField'));
   
}
public function customerfieldsedit() 
{
	$this->layout="frontenduser";
    $this->set('title','Edit New Field');
    if($this->request->is('post')){
        
        $Field=$this->request->data;
        //pr($Field);die();
        $id = $Field['CustomerField']['id'];
        $save = $this->CustomerField->editCustomerFieldAdmin($Field,$id);
        $this->Flash->success('Field Updated!', array('key' => 'positive'));
        return $this->redirect(array("controller" => "Users","action" => "customerfields"));
    }   
   
}


//////////////////////////////////////////////////////////////////////

public function customerfielddelete($customer_field_id){
	$this->layout="frontenduser";
    $this->CustomerField->deleteCustomerField($customer_field_id);
    $this->Flash->success('Field Deleted!', array('key' => 'positive'));  
    return $this->redirect(array("controller" => "Users","action" => "customerfields"));
}


///////////////////////////////////////////////////////////////////////

public function updatecustomerfieldname()
{
	$this->layout="frontenduser";
    $name =$this->request->data('name');
    $id =$this->request->data('id');

    if ($this->request->is('ajax'))
    {
        $this->CustomerField->updateAll(array('name' => "'$name'"),array('id' => $id));
    }        
    exit();
}


////////////////////////////////////////////////////////////////////




public function userfetch(){

	if($this->request->is('post')){
		echo '<pre>';print_r($this->request->data);
		$data = $this->request->data['search'];
		$this->paginate = array(
	    'limit' => 1,
		'order' => array('id' => 'asc'),
		'conditions' => array(
									'OR' => array(
												array('User.first_name LIKE' => '%'.$data.'%'),
												array('User.middle_name LIKE' => '%'.$data.'%'),
												array('User.surname LIKE' => '%'.$data.'%'),
												array('User.role LIKE' => '%'.$data.'%'),
												array('User.email LIKE' => '%'.$data.'%')
											)
										)
	);		
		$users = $this->paginate('User'); 

		echo json_encode($users);



	}
	$this->autoRender = false;


}

/*-------------------------------CRM----------------------------------*/
		
/*--------------------------------CRM--------------------------------*/

public function userdetail($id){
	$this->layout="frontenduser";
	
	$userDetail        = $this->User->findUserbyId($id);
	$communicationlog  = $this->CommunicationLog->findallCommunicationLogByUserId($id);
	$reminder          = $this->Reminder->findallReminderByUserId($id);
	$Address           = $this->Address->findFullAddressbyUserId($id);
	$invoice           = $this->Invoice->findInvoicebyUserId($id);
	$ticket            = $this->Ticket->findTicketbyUserId($id);
	$estimate          = $this->Estimate->findEstimatebyUserId($id);
	$lead              = $this->Lead->findLeadbyUserId($id);
	$attachment        = $this->Attachment->findAttachmentbyUserId($id);
	$assets            = $this->AssetFieldValue->findallAssetFieldValueByUserId($id);
	$order             = $this->Order->findOrderbyUserId($id);
	$Email             = $this->Email->findEmailbyUserId($id);
	$Contract          = $this->Contract->findContractbyUserId($id);
	$phone             = $this->Phone->findbyUserid($id);
	$Schedule          = $this->Schedule->findSchedulebyUserId($id);
	$logs              = $this->Log->findLogByUserId($id);
	$Warranty          = $this->Warranty->findWarrantybyUserId($id);
	$Contact           = $this->Contact->findContactbyUserId($id);
	$CustomerFieldValue= $this->CustomerFieldValue->findallCustomerFieldValueByUserId($id);
	$CustomerField     = $this->CustomerField->findAllCustomerField();
	$PortalUser        = $this->PortalUser->findPortalUserbyUserId($id);

	$InvoicePayment = $this->InvoicePayment->findInvoicePaymentbyUserId($id);
    //pr($ticket);   die();

	$this->set(compact('userDetail','communicationlog','reminder','Address','invoice','ticket','estimate','lead','attachment','assets','order','Email','Contract','phone','Schedule','logs','Warranty','Contact','CustomerFieldValue','CustomerField','PortalUser','InvoicePayment'));
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function notesupdate()
{
	$this->layout="frontenduser";
    $notes =$this->request->data('notes');
    $user_id =$this->request->data('user_id');
  
    if ($this->request->is('ajax'))
    {
        $this->User->query("UPDATE users SET notes = '$notes' WHERE id = $user_id");
	}
	exit();    
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function attachment()
{
    $this->layout="frontenduser";
        
    if ($this->request->is(['post','put'])) 
    {
        $data= $this->request->data;
        //pr($data);die();
        $attachment = $this->data['attachment'];
        $name = $this->data['attachment']['file']['name'];
        $user_id = $this->data['attachment']['user_id'];
        $status = $this->data['attachment']['status'];
        //$lead_id = $this->data['Lead']['lead_id'];
      //  echo "<pre>";print_r($name);
       // echo "<pre>";print_r($data);
        $upload_dir = "img/attachment/";

        if(!empty($name)){

             $file = $this->data['attachment']['file'];
             //move_uploaded_file($_FILES["files"]["tmp_name"],$file['tmp_name'],'/img/attachment/' . $file['name']);
             //$this->data['Lead']['image'] = $file['name'];die();

                $temp = explode(".", $file['name']);
                $extension = end($temp);
                $a1  = $file["name"];
                $a2 = rand();
                $aa = $a2."$a1";
              //  echo "<pre>"; print_r($aa); die();
                //    $aa = $aa . "."."$extension";
                //$name[] = $aa;
               // move_uploaded_file($this->data['Lead']['file']["tmp_name"], $upload_dir . $aa);die();
                move_uploaded_file($this->data['attachment']['file']["tmp_name"], $upload_dir .$aa);

        } 

        if ($this->Attachment->addAttachmentAdmin($data)) {

            $attachment_id = $this->Attachment->getInsertID();
            $this->Attachment->updateAll(array('user_id' => "'$user_id'",'file'=>"'$aa'",'status'=>"'$status'"),array('id' => $attachment_id));
            $this->Flash->success('File Attech Successfully', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "users","action" => "userdetail",$user_id));  
 
        } else {
            $this->Flash->success('File Not be Attech', array('key' => 'positive'));
            return  $this->redirect(array("controller" => "users","action" => "userdetail",$user_id));  
 
        }

    }    




}
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function deleteAttachment($id,$user_id,$file_name)
{
    $this->layout="frontenduser";
    $this->Attachment->deleteAttachment($id);
    unlink('img/attachment/'.$file_name);
    //unlink("uploads/".$row['file']);
    $this->Flash->success('Attachment Deleted Successfully', array('key' => 'positive'));  
    return  $this->redirect(array("controller" => "users","action" => "userdetail",$user_id));

}
/*----------------------------------------------------------------*/

public function communication_log(){
	$this->layout="frontenduser";
	$this->set('title','Communication Logs');
    if($this->request->is('post')){
        $communication =$this->request->data;
        $user_id = $communication['CommunicationLog']['user_id'];
        //pr($communication);die();
        $save = $this->CommunicationLog->addCommcunicationLog($communication);
        
        return $this->redirect(array("controller" => "users","action" => "userdetail",$user_id));
    }
}

/*----------------------------------------------------------------*/

public function communicationlog_list($user_id){
	$this->layout="frontenduser";
	$this->set('title','Communication Logs List');
	//echo $id = $this->Auth->user('id');die();
    $log = $this->CommunicationLog->findallCommunicationLogByUserId($user_id);
    $this->set(compact('log'));
}

/*----------------------------------------------------------------*/

public function delete_communicationlog($log_id){
	$this->layout="frontenduser";
    $log = $this->CommunicationLog->DeleteCommunicationLog($log_id);
    return  $this->redirect(array("controller" => "users","action" => "communicationlog_list"));

}

/*----------------------------------------------------------------*/

public function addnewreminder(){
	$this->layout="frontenduser";
	$this->set('title','New Reminder');
    if($this->request->is('post')){
        $reminder =$this->request->data;
        $user_id = $reminder['Reminder']['user_id'];
        //pr($reminder);die();
        $save = $this->Reminder->addNewReminder($reminder);
        
        return $this->redirect(array("controller" => "users","action" => "userdetail",$user_id));
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function deletereminder($id,$user_id){
	$this->layout="frontenduser";
    $this->Reminder->DeleteReminder($id);
     
    $this->Flash->success('Reminder Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'users','action'=>'userdetail',$user_id));
}


public function updatereminder($id,$user_id){
	$this->layout="frontenduser";
    $reminder = $this->Reminder->findallReminderById($id);
    $at = $reminder['Reminder']['at'];
    $new_at = date('m/d/Y g:i A', strtotime($at. ' + 1 days'));
    //pr($reminder);die(); 
    //$this->Reminder->updateAll()
    $this->Reminder->updateAll(array('Reminder.at' => "'$new_at'"),array('Reminder.id' =>$id));
    
    $this->Flash->success('Updated!', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'users','action'=>'userdetail',$user_id));
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function addappointment()
{ 
	$this->layout="frontenduser";
    if($this->request->is('post'))
    { 
    
        $Appointments=$this->request->data;
        //pr($Appointments);die();
        $save = $this->Appointment->addAppointmentAdmin($Appointments);
        $Appointment_id = $this->Appointment->getInsertID();
        $this->Flash->success('Appointments added Successfully', array('key' => 'positive'));
        return  $this->redirect(array("controller" => "Calendars","action" => "add"));  
    }
}

/*----------------------------------------------------------------*/

public function addnewcontact(){
    $this->layout="frontenduser";
    $this->set('title','Add New Contact');
    $user_id =$this->request->data('user_id');
    $contact = array();
    $contact['Contact']['user_id']=$user_id; 
    if ($this->request->is('ajax'))
    {
        $this->Contact->addContactAdmin($contact);
        $this->Flash->success('Row Added!',array('key' => 'positive'));
        echo $contact_id = $this->Contact->getInsertID();
        // $this->set('user', $user);
    }    
    exit();
}

/*----------------------------------------------------------------*/

public function deletecontact($contact_id,$user_id){
	$this->layout="frontenduser";
    $this->Contact->deleteContact($contact_id);
    $this->Flash->success('Contact Deleted!',array('key' => 'positive'));  
    return $this->redirect(array("controller"=>"Users","action"=>"userdetail",$user_id));    
}
/*-----------------------------------------------------------------*/


public function userview($id){
	if($this->Auth->user('id')!='')
    {
	$this->layout="frontenduser";
	$this->set('title','Profile');
	$this->loadModel('Privacy');
	$this->loadModel('Connection');
	$this->loadModel('Blog');
	$this->loadModel('Transaction');
	$userCourseDetail = $this->User->UserwithCourses($id);
	$allPrivacy = $this->Privacy->allPrivacy($id);
	$userDetail = $this->User->findUserbyId($id);
	$userConnections = $this->Connection->findConnectionsById($id);
	$userBlogs = $this->Blog->findBlogById($id);
	$userTransactions = $this->Transaction->findbyUserid($id);
	$userPhones = $this->Phone->findbyUserid($id);	

	if($this->request->is('post'))
	{  
		$this->Flash->success('Successfully Edited', array('key' => 'positive'));
		$this->User->editUserbyId($this->request->data,$id);
		return $this->redirect(array('controller'=>'users','action'=>'userview'));
    }
	$this->data = $userDetail ;
	$this->set(compact('userDetail','userCourseDetail','userPrivacyDetail','allPrivacy','userConnections','userBlogs','userTransactions','userPhones'));
	}
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}




////////////////////////////////////////////////////////////////////////


public function company_info(){
	
	//$this->layout="frontend1";
	$this->layout = false;
	if($this->request->is('post')){	
		$user = $this->request->data;
		//pr($user);die();
		$address = $user['User']['address'];
		$city = $user['User']['city'];
		$state_country = $user['User']['state_country'];
		$zip = $user['User']['zip'];
		$phone_number = $user['User']['phone_number'];
		$business_website = $user['User']['business_website'];
		
		$this->User->updateAll(array('User.address' => "'$address'",'User.city' => "'$city'",'User.state_country' => "'$state_country'",'User.zip' => "'$zip'",'User.phone_number' => "'$phone_number'",'User.business_website' => "'$business_website'"), array('User.id' => $this->Auth->user('id')));

      	return $this->redirect(array('controller'=>'users','action'=>'social_media'));
      		

	}	
	
}


////////////////////////////////////////////////////////////////////////


public function social_media(){
	
	//$this->layout="frontend1";
	$this->layout=false;
	if($this->request->is('post')){	


		$data= $this->request->data;
       // pr($data);die();
        $file = $this->data['User'];
        $name = $this->data['User']['file']['name'];
        $facebook_url = $this->data['User']['facebook_url'];
        $googleplus_url = $this->data['User']['googleplus_url'];
        $twitter_username = $this->data['User']['twitter_username'];
        $upload_dir = "img/logo/";

        if(!empty($name)){

             	$file = $this->data['User']['file'];
                $temp = explode(".", $file['name']);
                $extension = end($temp);
                $a1  = $file["name"];
                $a2 = rand();
                $aa = $a2."$a1";
                move_uploaded_file($this->data['User']['file']["tmp_name"], $upload_dir .$aa);
                $this->User->updateAll(array('User.logo' => "'$aa'"), array('User.id' => $this->Auth->user('id')));

        } 
        $this->User->updateAll(array('User.facebook_url' => "'$facebook_url'",'User.googleplus_url' => "'$googleplus_url'",'User.twitter_username' => "'$twitter_username'"), array('User.id' => $this->Auth->user('id')));

      	return $this->redirect(array('controller'=>'users','action'=>'business_setting'));
      		



	}	
	
	
}

////////////////////////////////////////////////////////////////////////


public function business_setting(){
	//$this->layout="frontend1";
	
	$this->layout = false;
	if($this->request->is('post')){	
		$user = $this->request->data;
		$user['BusinessSetting']['user_id'] = $this->Auth->user('id');
		//pr($user);die();
			
		$businesssetting = $this->BusinessSetting->addBusinessSettingAdmin($user);
		if($businesssetting){
			return $this->redirect(array('controller'=>'users','action'=>'addteam'));
		}
      	

	}	
	
}


////////////////////////////////////////////////////////////////////////


public function addteam(){
	
	//$this->layout="frontend1";

	$this->layout = false;
	if($this->request->is('post')){	
		$user = $this->request->data;
		$user['Team']['user_id'] = $this->Auth->user('id');
		//pr($user);die();
		$businesssetting = $this->Team->addTeamAdmin($user);
		if($businesssetting){
			return $this->redirect(array('controller'=>'users','action'=>'getstarted'));
		}
      	

	}	
	
}


////////////////////////////////////////////////////////////////////////


public function getstarted(){
	
	$data = 0;
	//$this->layout="frontend1";
	$this->layout = false;
	$admin_name = $this->Auth->user('admin_name');
	$business_name = $this->Auth->user('business_name');
	$business_website = $this->Auth->user('business_website');
	$phone_number = $this->Auth->user('phone_number');
	$email = $this->Auth->user('email');

	if($this->request->is('post')){	
		$user = $this->request->data;
		$user['DemoRequest']['user_id'] = $this->Auth->user('id');
		$DemoRequest = $this->DemoRequest->addDemoRequestAdmin($user);
		
		if($DemoRequest){
			$demo_id = $this->DemoRequest->getInsertID();
			$Demo = $this->DemoRequest->findallDemoRequestById($demo_id);
			if(!empty($Demo))
			{
				$data = 1;
				return $this->set(compact('data'));
			}
			else{
				$data = 0;
				return $this->set(compact('data'));
			}
			//return $this->redirect( '/admin/' );
			//return $this->redirect(array(conaction="index",'admin' => true));
		}
      	$data = 0;

	}
	$this->set(compact('admin_name','business_name','business_website','phone_number','email','data'));	
	//$this->set(compact('user'));
	
}


////////////////////////////////////////////////////////////////////////


public function watchdemo(){
	if($this->Auth->user('id')!='')
    {
	$data = 0;
	//$this->layout="frontend1";
	$this->layout = false;
	if($this->request->is('post')){	

	}
	}
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
	
}

////////////////////////////////////////////////////////////////////////


public function account_profile(){
	if($this->Auth->user('id')!='')
    {
	$this->layout="frontenduser";
	$id = $this->Auth->user('id');
	$user = $this->User->findUserbyId($id);
	//pr($user);
	if($this->request->is('post')){	
		$user=$this->request->data;
		//pr($user);die();
		if($this->User->editUserbyId($user,$id)){
			
			$this->Flash->success('Account was successfully updated!', array('key' => 'positive'));		
			return $this->redirect(array('controller'=>'Administrations','action'=>'index'));
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


public function logo(){
	$this->layout="frontenduser";
	$id = $this->Auth->user('id');
	$user = $this->User->findUserbyId($id);
	//pr($user);
	if($this->request->is('post')){	


		$data= $this->request->data;
        //pr($data);die();
        $file = $this->data['User'];
        $name = $this->data['User']['file']['name'];
        
        $upload_dir = "img/logo/";

        if(!empty($name)){

             	$file = $this->data['User']['file'];
                $temp = explode(".", $file['name']);
                $extension = end($temp);
                $a1  = $file["name"];
                $a2 = rand();
                $aa = $a2."$a1";
                move_uploaded_file($this->data['User']['file']["tmp_name"], $upload_dir .$aa);
                $this->User->updateAll(array('User.logo' => "'$aa'"), array('User.id' => $id));

        } 
        $this->Flash->success('Logo successfully updated!', array('key' => 'positive'));	
      	return $this->redirect(array('controller'=>'users','action'=>'logo'));
      		



	}	
	$this->data = $user ;
	$this->set(compact('user'));
}

public function profile_pic(){
	$this->layout="frontenduser";
	$id = $this->Auth->user('id');
	$user = $this->User->findUserbyId($id);
	//pr($user);
	if($this->request->is('post')){	


		$data= $this->request->data;
        //pr($data);die();
        $file = $this->data['User'];
        $name = $this->data['User']['file']['name'];
        
        $upload_dir = "img/user_image/";

        if(!empty($name)){

             	$file = $this->data['User']['file'];
                $temp = explode(".", $file['name']);
                $extension = end($temp);
                $a1  = $file["name"];
                $a2 = rand();
                $aa = $a2."$a1";
                move_uploaded_file($this->data['User']['file']["tmp_name"], $upload_dir .$aa);
                $this->User->updateAll(array('User.profile_pic' => "'$aa'"), array('User.id' => $id));
                $this->Session->write('Auth.User.profile_pic',$aa);
        } 
        $this->Flash->success('Profile Picture successfully updated!', array('key' => 'positive'));	
      	return $this->redirect(array('controller'=>'users','action'=>'profile_pic'));
      		



	}	
	$this->data = $user ;
	$this->set(compact('user'));
}

public function edituseraccount(){
	$this->layout="frontenduser";
	$id = $this->Auth->user('id');
	$user = $this->User->findUserbyId($id);
	//pr($user);
	if($this->request->is('post')){	
		$user=$this->request->data;
		//pr($user);die();
		if($this->User->editUserbyId($user,$id)){
			
			$this->Flash->success('Account was successfully updated!', array('key' => 'positive'));		
			return $this->redirect(array('controller'=>'Administrations','action'=>'users'));
		}

	}
	$this->data = $user ;
	$this->set(compact('user'));
}

/////////////////////////////////////////////////////////////////////////

public function addcontactus(){
	$this->layout="frontenduser";
	if($this->request->is('post')){	
		$contact = $this->request->data;
		//pr($contact);die();
		$name = $contact['Contactus']['name'];
		$email = $contact['Contactus']['email'];
		$subject = $contact['Contactus']['subject'];
		$msg = $contact['Contactus']['message'];
		$save = $this->Contactus->addContactusAdmin($contact);
		
		if ($save) {

        	$from = $email;
	        $to = "vishvakarma.rexweb@gmail.com";
	        $subject = $subject;
	        $message ='</<!DOCTYPE html>
					    <html>
					    <head>
					    </head>
					    <body>
					    	<div style="width:100%; height:auto ">
					            <div style="width:auto; margin:1% 15%; font-size:20px">
					            '.$msg.'    
					        </div>
					    </body>
					    </html>';
	       
	        $mail = new CakeEmail();
        	$mail->from($from);
        	$mail->to($to);
        	$mail->subject($subject);
        	$mail->send($message);
        	$this->Flash->success('Thank You for Contacting Us!', array('key' => 'positive'));		
			return $this->redirect(array('controller'=>'Pages','action'=>'index'));
        }

	}
}

//////////////////////////////////////////////////////////////////////////////

public function admin_contactuslist(){
	$Contactus = $this->Contactus->allContactus();	
	$this->set('contactus', $Contactus);
}

////////////////////////////////////////////////////////////////////////////

public function admin_deletecontactus($id){
	$Contactus = $this->Contactus->deleteContactus($id);	
	$this->Flash->success('Contact Deleted!', array('key' => 'positive'));		
	return $this->redirect(array('controller'=>'Users','action'=>'admin_contactuslist'));
}

/////////////////////////////////////////////////////////////////////////

public function error404(){
	$this->layout = false;
		$this->render('/Elements/404');
	
}


}