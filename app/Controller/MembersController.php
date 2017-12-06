<?php
App::uses('AppController', 'Controller');
class MembersController extends AppController {

public $uses = array('member','Product','User');


public function admin_add() 
{
   $product=$this->Product->find('list',array('fields'=>array('product_name')));
   $dealer=$this->Product->find('list',array('fields'=>array('customer_price')));
    $this->set('title','Add member');
    
    $this->member->set($this->request->data);
    

    if($this->request->is('post')){
        
         //if($this->Product->save($this->request->data))
        
		if($this->member->save($this->request->data))
		{
			$this->Flash->success('member added Successfully', array('key' => 'positive'));
			 $this->redirect(array('action'=>'memberlist'));
		}
    
        
    }
    $this->set(compact('product'));
    $this->set(compact('dealer'));


}

////////////////////////////////////////////////////////////////////
public function admin_memberedit($id){
    $this->set('title','Edit member');

    $member= $this->member->findmemberbyId($id); // Get member Detail from id
   
    if($this->request->is('post'))
    { 
        
        //pr($this->request->data); die();
        
        $this->member->editmemberbyId($this->request->data,$id); // Edit User
        $this->Flash->success('Successfully Edited member', array('key' => 'positive'));       
        return $this->redirect(array('controller'=>'Members','action'=>'memberlist'));

        

    }
    $this->data = $member ;
    $this->set(compact('member'));
}

////////////////////////////////////////

public function admin_deletemember($id){
    $this->member->deletemember($id);
    $this->Flash->success('member Deleted Successfully', array('key' => 'positive'));  
    return $this->redirect(array('controller'=>'Members','action'=>'memberlist'));
}


// /////////////////////////////////////////////////////////

public function admin_memberlist()
{
    $this->set('title','member List');
    

    $Members = $this->member->allMembers();
    $this->set('Members', $Members);
    //print_r('products');



}
////////////////////////////////////////////////////////    


///////////////////////////////////////////////////
public function admin_memberview($id){
$this->set('title','Profile');
    $member = $this->member->findmemberbyId($id);
    
    if($this->request->is('post'))
    {  
        $this->Flash->success('Successfully Edited', array('key' => 'positive'));
        $this->member->editmemberbyId($this->request->data,$id);
        return $this->redirect(array('controller'=>'Members','action'=>'memberview'));
    }
    $this->data = $member ; 
    $this->set(compact('member'));
}
/////////////////////////////////////////////////

public function admin_member()
{

    $id =$this->request->data('id');
 
    if ($this->request->is('ajax'))
    {
        $data= $this->Product->findProductbyId($id);
       // print_r($data);
 
           $this->set('data', $data);

           
         //
           //  return json_encode($data);

       
 //      echo "<pre>";  print_r($product);die;
          
            //$this->render('Members/member');
        }
        
  

}



public function admin_agencyrequest()
    {
        //$this->render('agencyrequest');
        $nw =$this->request->data('nq');
        $oq =$this->request->data('oq');
        $pid =$this->request->data('pid');
        $pname =$this->request->data('pname');
        $price =$this->request->data('price');
       
    //
      //  print_r($pname);
$user = array("$nw", "$oq","$pid","$pname","$price");
    
      pr($user);
    //    $this->loadModel('member');
    //    $user  = $this->request->data['User'];
   //     $this->member->set($pname);
       $user = $this->member->addmember($user);

        if ($this->request->is('post'))
        {
          //  $user = $this->member->patchEntity($user, $this->request->data);
          //  $user->amount = $pname;
             $saveUser = $this->member->addmember($user);
            if ($saveUser)
            {
                //$this->Flash->success(__('The agency has been saved.'));
               // return $this->redirect(['action' => 'agencyrequest']);
            }
           // $this->Flash->error(__('Unable to add the agency.'));
        }
      //  $this->set('user', $user);
        
        exit;

    }



}
