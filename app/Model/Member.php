<?php
App::uses('AppModel', 'Model');
class Order extends AppModel {

 var $name = 'Order';
 var $belongsTo = array('Product','User');
    
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
        $this->delete(array('Order.id'=>$id));
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
    




//////////////////////////////////////////////////

}
?>