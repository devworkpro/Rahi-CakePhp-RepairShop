<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class PurchaseOrder extends AppModel {

 var $name = 'PurchaseOrder';
 
    public function addPurchaseOrderAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editPurchaseOrderbyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allPurchaseOrders(){
    return $this->find('all') ;
    }

    public function findPurchaseOrderbyId($id){
        return $this->find('first',array('conditions'=>array('PurchaseOrder.id'=>$id)));
    }

    
    public function findallPurchaseOrdersByLoginId($id){
        return $this->find('all',array('conditions'=>array('PurchaseOrder.login_id'=>$id)));
    }

    public function findPurchaseOrderbyVendorId($id){
        return $this->find('all',array('conditions'=>array('PurchaseOrder.vendor_id'=>$id)));
    }

    public function deletePurchaseOrder($id){
        $this->id = $id;
        return $this->delete(array('PurchaseOrder.id'=>$id));
       // echo "hello";die();
    }

    public function findPurchaseOrderbyUserId($uid){
         return $this->find('all',array('conditions'=>array('PurchaseOrder.user_id'=>$uid)));
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
    


    public function PurchaseOrderVerificationMail(){
       
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