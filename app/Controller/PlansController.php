<?php
App::uses('AppController', 'Controller');
CakePlugin::load('Paypal');
App::uses('Paypal', 'Paypal.Lib');
class PlansController extends AppController{
	public $components = array();
	//var $uses=array('Bundle','User');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny();
	}

	public function admin_editregusr($id=null){
	$userplan = $this->Bundle->find('first',array('conditions'=>array('Bundle.user_type'=>'registered user plans')));
		if($this->request->is('post')){
			$this->Bundle->id =1; 
            if($this->Bundle->save($this->request->data)){
				$this->Flash->success('Successfully Edited Registered User Plans', array('key' => 'positive'));	
				return $this->redirect(array('controller'=>'plans','action'=>'addplan'));
            }else{
            	$this->Flash->error('Failed to Edit Registered User Plans', array('key' => 'positive'));	
            }
		} 

		$this->set('bundle',$userplan); 	 
	}
	
/* Admin Subscription Plans*/
	public function admin_addplan(){
	$this->title('Add Subscription Plan');
    if($this->request->is('post')){
    	$this->request->data['Plan']['plan_type'] = 2;
		$this->Plan->create();
	    if ($this->Plan->save($this->request->data)) 
		{
			$this->Flash->success('Successfully Added Plan');		
            return $this->redirect(array('controller'=>'plans','action'=>'index'));
		}
		else{
			$this->Flash->success('Professional Trainer not Added');     
			}
	}
	}

	
	
	public function admin_index(){
		$this->title('All Plans');
		$plans = $this->Plan->subsPlans();
	    $this->set('plans',$plans);	
	}
	
	public function admin_editplan($id=null){
	$this->title('Edit Plan');
	$planDetail = $this->Plan->findPlanbyId($id);
	if($this->request->is('post')){
		$this->Plan->editPlanbyId($this->request->data,$id);
		$this->Flash->success('Successfully Edited Plan', array('key' => 'positive'));		
		return $this->redirect(array('controller'=>'plans','action'=>'index'));

	}
	$this->data = $planDetail ;
}


	public function admin_deleteplan($id){
		$bundles = $this->Plan->id = $id;
	    $this->Plan->delete($id);
	    $this->Flash->success('Bundle Deleted Successfully', array('key' => 'positive'));	
		return $this->redirect(array('controller'=>'plans','action'=>'index'));

	}
/***********************************/

/***Admin Credit Plans **/

	public function admin_addcredit(){
			$this->title('Add Course Passes');
		    if($this->request->is('post')){
		    	$this->request->data['Plan']['plan_type'] = 1;
				$this->Plan->create();
			    if ($this->Plan->save($this->request->data)) 
				{
					$this->Flash->success('Successfully Added Plan');		
		            return $this->redirect(array('controller'=>'plans','action'=>'allcreditplans'));
				}
				else{
					$this->Flash->success('Professional Trainer not Added');     
					}
			}
	}

	public function admin_allcreditplans(){
		$this->title('All Course Passes');
		$plans = $this->Plan->creditPlans();
	    $this->set('plans',$plans);	
	}

	public function admin_editcredit($id=null){
	$this->title('Edit Plan');
	$planDetail = $this->Plan->findPlanbyId($id);
	if($this->request->is('post')){
		$this->Plan->editPlanbyId($this->request->data,$id);
		$this->Flash->success('Successfully Edited Plan', array('key' => 'positive'));		
		return $this->redirect(array('controller'=>'plans','action'=>'allcreditplans'));

	}
	$this->data = $planDetail ;
	}

	public function admin_deletecreditplan($id){
		$bundles = $this->Plan->id = $id;
	    $this->Plan->delete($id);
	    $this->Flash->success('Bundle Deleted Successfully', array('key' => 'positive'));	
		return $this->redirect(array('controller'=>'plans','action'=>'allcreditplans'));

	}

	public function subscription(){
		$this->title('Subscription Plans');
		$subsPlans = $this->Plan->subsPlans();
		$creditPlans = $this->Plan->creditPlans();
		$this->set(compact('subsPlans','creditPlans'));

	}

	public function subscribe(){
	    $planId = $this->params['data']['optradio'];
		$this->autoRender  = false;
		$this->layout = false;	
		$data=$this->Plan->find('first',array('conditions'=>array('Plan.id'=>$planId)));
		$price=$data['Plan']['price'];
		$plan_type=$data['Plan']['plan_type'];
		$credits=$data['Plan']['courses'];
		if($plan_type == '1' ){
			$planName = 'Course Passes Plan';
		}else{
			$planName = $data['Plan']['description'];
		}
	$paypal_email='chhabeg.rex-facilitator@gmail.com';
	$action='https://www.sandbox.paypal.com/cgi-bin/';
	echo '<form action="'.$action.'" method="post" id="paypal_submit" target="_top">
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="business" value="'.$paypal_email.'">		
			<input type="hidden" name="amount" value="'.$price.'">
			<input type="hidden" name="custom" value="'.$plan_type."/".$planId."/".$credits.'">

			<input type="hidden" name="currency_code" value="AUD">
			<input type="hidden" name="item_name" value="'.$planName.'">
			
			<input type="hidden" name="notify_url" value="'.SITEURL.'Plans/data"  />
			<input type="hidden" name="return" value="'.SITEURL.'Plans/data" />
			<input type="image" style="display:none;" name="submit" border="0"
			src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
		</form>';
		echo '<img src="'.SITEURL.'img/payment-loader.gif"><span>Redirecting to Payment Gateway</span>';
		echo '<script type="text/javascript">  
			window.onload=function(){
	        var auto = setTimeout(function(){ autoRefresh(); }, 10);

	        function submitform(){
	          
	          document.forms["paypal_submit"].submit();
	        }

	        function autoRefresh(){
	           clearTimeout(auto);
	           auto = setTimeout(function(){ submitform(); autoRefresh(); }, 5000);
	        }
	    } 

    </script>';


	}

	public function data(){
		$this->loadModel('Transaction');
		$this->loadModel('UserPlan');
		$this->autoRender  = false;
		$this->layout = false;
		$status = $this->params['data']['payment_status'];
		$txn_id =$this->params['data']['txn_id'];
		$payer_email= $this->params['data']['payer_email'];
		$plan= $this->params['data']['custom'];
		$data=explode("/",$plan);
		$plan_type=$data[0];
		$planid=$data[1];
		$credits=$data[2];
		$userid = $this->Auth->user('id');
				
				if($status=='Completed'){						
							if($plan_type==1){ // For Credits
									$planData['UserPlan']['user_id'] = $this->Auth->user('id');
									$planData['UserPlan']['credits'] =$credits;
									$planData['UserPlan']['type']=$plan_type;
									$planData['UserPlan']['plan_id']=$planid;
									$this->UserPlan->query("DELETE From user_plans WHERE  user_id= $userid");
									$this->UserPlan->save($planData);
									$this->Flash->success('Successfully completed', array('key' => 'positive'));
									$daata['Transaction']['data']=json_encode($this->params['data']);
									$daata['Transaction']['user_id']=$userid;
									$daata['Transaction']['amount']=$this->params['data']['mc_gross'];
									$this->Transaction->save($daata);
									$this->Flash->success('Successfully completed', array('key' => 'positive'));
									return $this->redirect($this->referer());

							}
							elseif($plan_type==2) // For Subscription
								{
									
									$planData['UserPlan']['user_id'] = $this->Auth->user('id');
									$planData['UserPlan']['type']=$plan_type;
									$planData['UserPlan']['credits'] =0;
									$planData['UserPlan']['plan_id']=$planid;
									$this->UserPlan->query("DELETE From user_plans WHERE  user_id= $userid");
									$this->UserPlan->save($planData);
									$this->Flash->success('Successfully completed', array('key' => 'positive'));
									$daata['Transaction']['data']=json_encode($this->params['data']);
									$daata['Transaction']['user_id']=$userid;
									$this->Transaction->save($daata);
									$this->Flash->success('Successfully completed', array('key' => 'positive'));
									return $this->redirect($this->referer());
								}			
						
					}

}

	
}