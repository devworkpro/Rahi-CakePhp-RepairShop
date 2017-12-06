<?php App::uses('AppModel', 'Model');
class Product extends AppModel {
	
 var $name = 'Product'; 
  var $hasMany = array( 'Dealership' );


   public $validate = array(


'product_name' => array(
			'notEmpty' => array(
            'rule' => array('notBlank'),
            'message' => 'Please Enter Product Name',
            'allowEmpty' => false
        ),
	), 


  'physical_location' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            'message' => 'Please Enter physical location',
            'allowEmpty' => false
        ),
    ),


	'upc_code' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            'message' => 'Please Enter upc code',
            'allowEmpty' => false
        ),
    ),

    'price_cost' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            'message' => 'Please Enter cost price',
            'allowEmpty' => false
        ),
    ),

    'price_retail' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            'message' => 'Please Enter retail price',
            'allowEmpty' => false
        ),
    ),

     'quantity' => array(
        'notEmpty' => array(
            'rule' => array('notBlank'),
            'message' => 'Please Enter quantity',
            'allowEmpty' => false
        )
    )
    
       
 );
 


	
 public function editProductbyId($data,$id){
		$this->id = $id;
	 	return $this->save($data);
	 }

	public function allProducts(){
	return $this->find('all');
	}

    public function findProductbyUserId($id){
        return $this->find('all',array('conditions'=>array('Product.user_id'=>$id)));
    }
    
    public function findallProductbyLoginId($id){
        return $this->find('all',array('conditions'=>array('Product.login_id'=>$id)));
    }

	public function findProductbyId($id){
		return $this->find('first',array('conditions'=>array('Product.id'=>$id)));
	}
	
	public function findProductbyIdName($item){
		return $this->find('first',array('conditions'=>array('Product.product_name'=>$item)));
	}

    public function findProductbyNameAndLoginId($item,$id){
        return $this->find('first',array('conditions'=>array('Product.product_name'=>$item,'Product.login_id'=>$id)));
    }

	public function findProductbyIdUpccode($item){
		return $this->find('first',array('conditions'=>array('Product.upc_code'=>$item)));
	}

    public function findProductbyUpccodeAndLoginId($item,$id){
        return $this->find('first',array('conditions'=>array('Product.upc_code'=>$item,'Product.login_id'=>$id)));
    }

	public function deleteProduct($id){
		$this->id = $id;
		$this->delete(array('Product.id'=>$id));
	}



}