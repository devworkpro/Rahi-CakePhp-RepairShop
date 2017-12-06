<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class Contract extends AppModel {

 var $name = 'Contract';
 
    public function addContractAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editContractbyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allContracts(){
    return $this->find('all') ;
    }

    public function findContractbyId($id){
        return $this->find('first',array('conditions'=>array('Contract.id'=>$id)));
    }

    public function deleteContract($id){
        $this->id = $id;
        return $this->delete(array('Contract.id'=>$id));
       // echo "hello";die();
    }

    public function findContractbyUserId($uid){
         return $this->find('all',array('conditions'=>array('Contract.user_id'=>$uid)));
    }

    public function changePrice($fieldName,$id,$price){
        $this->id = $id;
        return $this->save(array($fieldName=>$price));

    }
/*******************************************************************************************/
    public function findProductbyProductId($pid)
    {
        return $this->find('all',array('conditions'=>array('Product.product_id'=>$pid)));
    }
    

/******************************************************************************************/

    public function findQuantitybyProductId($pid)
    {
        return $this->find('all',array('conditions'=>array('Product.quantity'=>$pid)));
    }
    


    public function ContractVerificationMail(){
       
       // $emailObj = new CakeEmail('default');
     //   $Email = new CakeEmail();
        $Email = new CakeEmail('default');
        $Email->from('vishvakarma.rexweb@gmail.com');
        $Email->to('vishvakarma.rexweb@gmail.com');
        $Email->subject('About');
        $Email->send('My message');
        echo "sfnkdsnfds";die();
   
        
       
    }

//////////////////////////////////////////////////

}
?>