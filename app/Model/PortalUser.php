<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class PortalUser extends AppModel {

 var $name = 'PortalUser';
 
    public function addPortalUserAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editPortalUserbyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allPortalUsers(){
        return $this->find('all') ;
    }

    public function findPortalUserbyId($id){
        return $this->find('first',array('conditions'=>array('PortalUser.id'=>$id)));
    }

    public function findPortalUserbyUserId($uid){
        return $this->find('all',array('conditions'=>array('PortalUser.user_id'=>$uid)));
    }

    public function findPortalUserbyVendorId($vendor_id){
        return $this->find('all',array('conditions'=>array('PortalUser.vendor_id'=>$vendor_id)));
    }


    public function deletePortalUser($id){
        $this->id = $id;
        return $this->delete(array('PortalUser.id'=>$id));
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
    


    public function PortalUserVerificationMail(){
       
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