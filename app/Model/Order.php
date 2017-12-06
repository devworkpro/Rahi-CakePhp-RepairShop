<?php //use lib\Cake\Network\Email\CakeEmail;
App::uses('CakeEmail', 'Lib/Network/Email');
App::uses('AppModel', 'Model');
class Order extends AppModel {

 var $name = 'Order';
 
    public function addOrderAdmin($data){
        
        return $this->save($data);
        
        //pr($data);die();
    }


    public function editOrderbyId($data,$id){
        $this->id = $id;
        return $this->save($data);
    }

    public function allOrders(){
    return $this->find('all') ;
    }

    public function findOrderbyId($id){
        return $this->find('first',array('conditions'=>array('Order.id'=>$id)));
    }

    public function deleteOrder($id){
        $this->id = $id;
        return $this->delete(array('Order.id'=>$id));
       // echo "hello";die();
    }

    public function findOrderbyUserId($uid){
         return $this->find('all',array('conditions'=>array('Order.user_id'=>$uid)));
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
    


    public function OrderVerificationMail(){
       
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