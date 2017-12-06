<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class Contact extends AppModel {

 var $name = 'Contact';
 
    public function addContactAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editContactbyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allContacts(){
        return $this->find('all') ;
    }

    public function findContactbyId($id){
        return $this->find('first',array('conditions'=>array('Contact.id'=>$id)));
    }

    public function findContactbyUserId($uid){
        return $this->find('all',array('conditions'=>array('Contact.user_id'=>$uid)));
    }

    public function findContactbyVendorId($vendor_id){
        return $this->find('all',array('conditions'=>array('Contact.vendor_id'=>$vendor_id)));
    }


    public function deleteContact($id){
        $this->id = $id;
        return $this->delete(array('Contact.id'=>$id));
       // echo "hello";die();
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
    


    public function ContactVerificationMail(){
       
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