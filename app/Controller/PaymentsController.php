<?php
App::uses('AppController', 'Controller');
class PaymentsController extends AppController { 

public $uses = array('Payment','Vehicle','Customer','Draft','Transaction','Invoice','User','UserPackage','InvoicePayment','Package');


  public function admin_add() 
{

    $this->set('title','Add payment');
        $this->payment->set($this->request->data);
  if($this->request->is('post')){
    
    if($this->payment->validates()){

   		$this->payment->save($this->request->data);
    	$this->Flash->success(' Successfully', array('key' => 'positive'));
    	return $this->redirect(array('controller'=>'payments','action'=>'paymentlist'));
   }
 
}
}


///////////////////////////////////////////////////////////////////////



public function admin_addpayment() 
{
   $this->set('title','Add invoice');
     
    if($this->request->is('post'))
    {
        $invoices=$this->request->data;
       // print_r($invoices);die;
        $method=$invoices['Invoice']['payment_method'];
        $user_id=$invoices['Invoice']['user_id'];
        $amount_provided=$invoices['Invoice']['amount_provided'];
        $total=$invoices['Invoice']['total'];
        $amount= $amount_provided-$total;

        if ($amount < 0)
        {
            $this->Flash->success("You entered a 'Tendered' amount that is less than the desired payment amount, please correct that.", array('key' => 'positive'));
            $this->redirect(array("controller" => "sales","action" => "payment",$user_id,$method));
                        
               
        }
        $user = $this->User->query("SELECT * FROM users where id='$user_id'");
        foreach($user as $users) {
            $first_name = $users['users']['first_name'];
            $last_name = $users['users']['last_name'];
            $business_name = $users['users']['business_name'];
            $email = $users['users']['email'];

        }
        $name= $first_name.' '.$last_name.' '.$business_name.' '.$email;
        $save = $this->Invoice->addInvoiceAdmin($invoices);

        $invoice_id = $this->Invoice->getInsertID();
              //  echo $invoice_id;die();
        $payment = $this->Payment->query("INSERT INTO payments (user_id,invoice_id,name,payment_method,amount) VALUES ('$user_id','$invoice_id','$name','$method','$total')");



        $this->Invoice->updateAll(array('name' => "'$name'"),array('id' => $invoice_id));
        // $this->Invoice->query("Update invoices set  name = $name  where id = $invoice_id");
        $this->Flash->success('Payment Successfull', array('key' => 'positive'));
        $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$user_id,$invoice_id));   
    }
        

}




////////////////////////////////////////////////////////////////////
public function admin_paymentedit($id){
	$this->set('title','Edit payment');

	$payment= $this->payment->findpaymentbyId($id); // Get User Detail from id
	$prevProfilePic = $payment['payment']['image'];
	
	if($this->request->is('post'))
	{ 
		$this->Img = $this->Components->load('Img');
		if($this->data['payment']['image']['name']){
			$allowedExts = array("jpg","jpeg","png");
		        $ext = $this->Img->ext($this->request->data['payment']['image']['name']); 
		        if (in_array($ext, $allowedExts) ) 
    			{
    				$newName = strtotime(date("Y-m-d h:i:s"));
					$origFile = $newName . '.' . $ext;
					$dst = $newName . '.jpg';
					$targetdir = WWW_ROOT .'img/user_image/';
					$upload = $this->Img->upload($this->request->data['payment']['image']['tmp_name'], $targetdir, $origFile);
					if($upload == 'Success') 
					{
						$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/user_image/small/', $dst, 160, 160, 1, 0);
						$this->request->data['payment']['image'] = $dst;
					}


    			}

		}else{
			$this->request->data['payment']['image'] = $prevProfilePic;

		} 
	
		$this->payment->editpaymentbyId($this->request->data,$id); // Edit User
		$this->Flash->success('Successfully Edited payment', array('key' => 'positive'));		
		return $this->redirect(array('controller'=>'payments','action'=>'paymentlist'));

		

	}
	$this->data = $payment ;
	$this->set(compact('payment'));
}


public function admin_deletepayment($id){

	$this->Payment->deletePayment($id);
	$this->Flash->success('payment Deleted Successfully', array('key' => 'positive'));	
	return $this->redirect(array('controller'=>'payments','action'=>'paymentlist'));
}

public function admin_paymentlist()
{
	$this->set('title','payment List');
    

	/*$payments = $this->Transaction->allPayments();*/
    $payments = $this->Payment->allUsersPayments();
    //pr($payments);
    foreach ($payments as $key => $payment) {
                $user_id = $payment['Payment']['user_id'];
                $user = $this->User->findUserbyId($user_id);
                $payments[$key]['User'] = $user;
           }

	$this->set('payments', $payments);

}
////////////////////////////////////////////////////////
public function admin_wpshow()
	 {
	 	
	 	if($this->request->is('post'))
	 	{
		
		$cust=$this->request->data['payment']['cust_id'];
		$vech=$this->request->data['payment']['vech_id'];
		$payment= $this->Customer->findCustomerbyId($vech);
		$payment1= $this->Vehicle->findVehiclebyId($cust);
		//$save=new array();

         $save['vehicle_id']=$this->request->data['payment']['cust_id'];
         $save['Customer_id']=$this->request->data['payment']['vech_id'];

         if(isset($this->request->data['payment1'])){
         $save['payment1']=$this->request->data['payment1'];
         $payment = $this->payment->findpaymentbyId($save['payment1']);
         $quantity=$payment['payment']['quantity']-1;
         $this->payment->id = $save['payment1'];
         $this->payment->saveField('quantity',$quantity);



         }
         if(isset($this->request->data['payment2'])){
         $save['payment2']=$this->request->data['payment2'];
         $payment = $this->payment->findpaymentbyId($save['payment2']);
         $quantity=$payment['payment']['quantity']-1;
         $this->payment->id = $save['payment2'];
         $this->payment->saveField('quantity',$quantity);
         }  
         if(isset($this->request->data['payment3'])){
         $save['payment3']=$this->request->data['payment3'];
         $payment = $this->payment->findpaymentbyId($save['payment3']);
         $quantity=$payment['payment']['quantity']-1;
         $this->payment->id = $save['payment3'];
         $this->payment->saveField('quantity',$quantity);
         }  
          if(isset($this->request->data['payment4'])){
         $save['payment4']=$this->request->data['payment4'];
         $payment = $this->payment->findpaymentbyId($save['payment4']);
         $quantity=$payment['payment']['quantity']-1;
          $this->payment->id = $save['payment4'];
          $this->payment->saveField('quantity',$quantity);
         }  
         if(isset($this->request->data['payment5'])){
         $save['payment5']=$this->request->data['payment5'];
         $payment = $this->payment->findpaymentbyId($save['payment5']);
         $quantity=$payment['payment']['quantity']-1;
         $this->payment->id = $save['payment5'];
         $this->payment->saveField('quantity',$quantity);

         }  
		 $save['name']="W".$cust."RJ".$vech;
         $new['Draft']=$save;
		//print_r($new);
		if($this->Draft->save($new))
		{
         $draft_id=$this->Draft->getLastInsertID();
		return $this->redirect(array('controller'=>'warranty','action'=>'warrantydraft',$draft_id));
		}
	
	}
	}

public function admin_paymentfetch(){

	if($this->request->is('post')){
		//echo '<pre>';print_r($this->request->data);
		$data = $this->request->data['search'];
		$this->paginate = array(
	    'limit' => 1,
		'order' => array('id' => 'asc'),
		'conditions' => array(
									'OR' => array(
												array('payment.payment_name LIKE' => '%'.$data.'%'),
												array('payment.description LIKE' => '%'.$data.'%'),
												array('payment.category LIKE' => '%'.$data.'%'),
												array('payment.price LIKE' => '%'.$data.'%'),
												//array('User.email LIKE' => '%'.$data.'%')
											)
										)
	);		
		$payments = $this->paginate('payment'); 

		echo json_encode($payments);



	}
	$this->autoRender = false;


}

///////////////////////////////////////////////////
public function admin_paymentview($id){
$this->set('title','Profile');
	$payment = $this->Payment->findPaymentbyId($id);
    if($payment!='')
    {
        $user_id = $payment['Payment']['user_id'];
        $user = $this->User->findUserbyId($user_id);
	    $payment['User'] = $user;
    }
    //pr($payment);die();
	$this->data = $payment ; 
	$this->set(compact('payment'));
}






/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

 
                      /* USER SECTION */


/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////



public function add() 
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Add payment');
        $this->payment->set($this->request->data);
    if($this->request->is('post')){
    
    if($this->payment->validates()){

        $this->payment->save($this->request->data);
        $this->Flash->success(' Successfully', array('key' => 'positive'));
        return $this->redirect(array('controller'=>'payments','action'=>'paymentlist'));
    }
 
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


///////////////////////////////////////////////////////////////////////



public function addpayment() 
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Add invoice');
     
    if($this->request->is('post'))
    {
        $invoices=$this->request->data;
       // print_r($invoices);die;
        $method=$invoices['Invoice']['payment_method'];
        $user_id=$invoices['Invoice']['user_id'];
        $amount_provided=$invoices['Invoice']['amount_provided'];
        $total=$invoices['Invoice']['total'];
        $amount= $amount_provided-$total;

        if ($amount < 0)
        {
            $this->Flash->success("You entered a 'Tendered' amount that is less than the desired payment amount, please correct that.", array('key' => 'positive'));
            $this->redirect(array("controller" => "sales","action" => "payment",$user_id,$method));
                        
               
        }
        $user = $this->User->query("SELECT * FROM users where id='$user_id'");
        foreach($user as $users) {
            $first_name = $users['users']['first_name'];
            $last_name = $users['users']['last_name'];
            $business_name = $users['users']['business_name'];
            $email = $users['users']['email'];

        }
        $name= $first_name.' '.$last_name.' '.$business_name.' '.$email;
        $save = $this->Invoice->addInvoiceAdmin($invoices);

        $invoice_id = $this->Invoice->getInsertID();
              //  echo $invoice_id;die();
        $payment = $this->Payment->query("INSERT INTO payments (user_id,invoice_id,name,payment_method,amount) VALUES ('$user_id','$invoice_id','$name','$method','$total')");



        $this->Invoice->updateAll(array('name' => "'$name'"),array('id' => $invoice_id));
        // $this->Invoice->query("Update invoices set  name = $name  where id = $invoice_id");
        $this->Flash->success('Payment Successfull', array('key' => 'positive'));
        $this->redirect(array("controller" => "Invoices","action" => "invoicedetails",$invoice_id));   
    }
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }   

}




////////////////////////////////////////////////////////////////////
public function paymentedit($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Edit payment');

    $payment= $this->payment->findpaymentbyId($id); // Get User Detail from id
    $prevProfilePic = $payment['payment']['image'];
    
    if($this->request->is('post'))
    { 
        $this->Img = $this->Components->load('Img');
        if($this->data['payment']['image']['name']){
            $allowedExts = array("jpg","jpeg","png");
                $ext = $this->Img->ext($this->request->data['payment']['image']['name']); 
                if (in_array($ext, $allowedExts) ) 
                {
                    $newName = strtotime(date("Y-m-d h:i:s"));
                    $origFile = $newName . '.' . $ext;
                    $dst = $newName . '.jpg';
                    $targetdir = WWW_ROOT .'img/user_image/';
                    $upload = $this->Img->upload($this->request->data['payment']['image']['tmp_name'], $targetdir, $origFile);
                    if($upload == 'Success') 
                    {
                        $this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/user_image/small/', $dst, 160, 160, 1, 0);
                        $this->request->data['payment']['image'] = $dst;
                    }


                }

        }else{
            $this->request->data['payment']['image'] = $prevProfilePic;

        } 
    
        $this->payment->editpaymentbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited payment', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'payments','action'=>'paymentlist'));

        

    }
    $this->data = $payment ;
    $this->set(compact('payment'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


public function deletepayment($id){
    $this->layout="frontenduser";
    $this->payment->deletepayment($id);
    $this->Flash->success('payment Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'payments','action'=>'paymentlist'));
}

public function paymentlist()
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','payment List');
    $user_session_id = $this->Auth->user('id');
    $payments = $this->Payment->findPaymentbyUserId($user_session_id);
    
    //$payments = $this->Transaction->allPayments();
    $this->set('payments', $payments);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}

////////////////////////////////////////////////////////

public function invoicepaymentlist()
{
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','payment List');
    $user_session_id = $this->Auth->user('id');
    
    $payments = $this->InvoicePayment->query("SELECT invoice_payments.*, users.first_name ,users.last_name FROM invoice_payments  INNER JOIN users ON invoice_payments.user_id = users.id");

    //pr($payments);die();
    //$payments = $this->Transaction->allPayments();
    $this->set('payments', $payments);
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}
////////////////////////////////////////////////////////
public function wpshow()
     {
        $this->layout="frontenduser";
        if($this->request->is('post'))
        {
        
        $cust=$this->request->data['payment']['cust_id'];
        $vech=$this->request->data['payment']['vech_id'];
        $payment= $this->Customer->findCustomerbyId($vech);
        $payment1= $this->Vehicle->findVehiclebyId($cust);
        //$save=new array();

         $save['vehicle_id']=$this->request->data['payment']['cust_id'];
         $save['Customer_id']=$this->request->data['payment']['vech_id'];

         if(isset($this->request->data['payment1'])){
         $save['payment1']=$this->request->data['payment1'];
         $payment = $this->payment->findpaymentbyId($save['payment1']);
         $quantity=$payment['payment']['quantity']-1;
         $this->payment->id = $save['payment1'];
         $this->payment->saveField('quantity',$quantity);



         }
         if(isset($this->request->data['payment2'])){
         $save['payment2']=$this->request->data['payment2'];
         $payment = $this->payment->findpaymentbyId($save['payment2']);
         $quantity=$payment['payment']['quantity']-1;
         $this->payment->id = $save['payment2'];
         $this->payment->saveField('quantity',$quantity);
         }  
         if(isset($this->request->data['payment3'])){
         $save['payment3']=$this->request->data['payment3'];
         $payment = $this->payment->findpaymentbyId($save['payment3']);
         $quantity=$payment['payment']['quantity']-1;
         $this->payment->id = $save['payment3'];
         $this->payment->saveField('quantity',$quantity);
         }  
          if(isset($this->request->data['payment4'])){
         $save['payment4']=$this->request->data['payment4'];
         $payment = $this->payment->findpaymentbyId($save['payment4']);
         $quantity=$payment['payment']['quantity']-1;
          $this->payment->id = $save['payment4'];
          $this->payment->saveField('quantity',$quantity);
         }  
         if(isset($this->request->data['payment5'])){
         $save['payment5']=$this->request->data['payment5'];
         $payment = $this->payment->findpaymentbyId($save['payment5']);
         $quantity=$payment['payment']['quantity']-1;
         $this->payment->id = $save['payment5'];
         $this->payment->saveField('quantity',$quantity);

         }  
         $save['name']="W".$cust."RJ".$vech;
         $new['Draft']=$save;
        //print_r($new);
        if($this->Draft->save($new))
        {
         $draft_id=$this->Draft->getLastInsertID();
        return $this->redirect(array('controller'=>'warranty','action'=>'warrantydraft',$draft_id));
        }
    
    }
    }

public function paymentfetch(){
    $this->layout="frontenduser";
    if($this->request->is('post')){
        //echo '<pre>';print_r($this->request->data);
        $data = $this->request->data['search'];
        $this->paginate = array(
        'limit' => 1,
        'order' => array('id' => 'asc'),
        'conditions' => array(
                                    'OR' => array(
                                                array('payment.payment_name LIKE' => '%'.$data.'%'),
                                                array('payment.description LIKE' => '%'.$data.'%'),
                                                array('payment.category LIKE' => '%'.$data.'%'),
                                                array('payment.price LIKE' => '%'.$data.'%'),
                                                //array('User.email LIKE' => '%'.$data.'%')
                                            )
                                        )
    );      
        $payments = $this->paginate('payment'); 

        echo json_encode($payments);



    }
    $this->autoRender = false;


}

///////////////////////////////////////////////////
public function paymentview($id){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Profile');
    $payment = $this->Transaction->findPaymentsById($id);
    //pr($payment);die();
    $this->data = $payment ; 
    $this->set(compact('payment'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


///////////////////////////////////////////////////
public function plans(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Plans');
    $user_id = $this->Auth->user('id');
    $UserPackage = $this->UserPackage->findUserPackageByUserId($user_id);
    $Packages = $this->Package->allPackages();
    //pr($UserPackage);die();
   	$this->set(compact('UserPackage','Packages'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


///////////////////////////////////////////////////
public function success(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Success');
    
    $data = $_REQUEST;
    //pr($data);//die();
    $user_id = $this->Auth->user('id');
    $item_name = $data['item_name'];
    $amount = $data['payment_gross'];
    $payment_date = $data['payment_date'];
    $myJSON = json_encode($data);
    $data['payment']['user_id'] = $user_id;
    $data['payment']['data'] = $myJSON;
    if(!empty($data))
    {
    	//$payment = $this->Payment->query("INSERT INTO payments (user_id,data) VALUES ('$user_id','$myJSON')");

    	$UserPackage = $this->UserPackage->findUserPackageByUserId($user_id);
    	//pr($UserPackage);die();
    	if(!empty($UserPackage))
    	{
            $preitemname    = $UserPackage['UserPackage']['item_name'];
            $prepaymentdate = $UserPackage['UserPackage']['payment_date'];
            $userpackage_id = $UserPackage['UserPackage']['id'];
    		$this->UserPackage->updateAll(array('UserPackage.item_name' => "'$item_name'",'UserPackage.amount' => "'$amount'",'UserPackage.payment_date' => "'$payment_date'",'UserPackage.previous_item_name' => "'$preitemname'",'UserPackage.previous_payment_date' => "'$prepaymentdate'"), array('UserPackage.user_id' => $user_id));
    	}
    	else{
    		$this->UserPackage->query("INSERT INTO user_packages (user_id,item_name,	amount,payment_date) VALUES ('$user_id','$item_name','$amount','$payment_date')");
    	}



    }
    
    $this->set(compact('data'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
}


///////////////////////////////////////////////////
public function cancel(){
    if($this->Auth->user('id')!='')
    {
    $this->layout="frontenduser";
    $this->set('title','Cancel');
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
   
}

public function deleteinvoicelist($id){
    $this->layout="frontenduser";
    //pr($id);die();
    $this->InvoicePayment->deleteinvoicelist($id);
    $this->Flash->success('payment Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'payments','action'=>'invoicepaymentlist'));
}

/////////////////////////////////////////////////


}