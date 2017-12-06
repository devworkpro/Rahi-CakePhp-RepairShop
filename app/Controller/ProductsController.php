<?php 
App::uses('AppController', 'Controller');

class ProductsController extends AppController {

  public $uses = array('Product','Vehicle','Customer','Draft','Vendor','ProductCategory');


  public function admin_add() 
  {
    $this->set('title','Add Product');
    $this->Product->set($this->request->data);

    if($this->request->is('post')){
  
        $serial =  $this->request->data['serial'];
        $pro =  $this->request->data['Product'];

        // echo "<pre>"; print_r($serial); 
        // echo "<pre>"; print_r($pro); die();
        //  echo "<pre>"; print_r($this->request->data); die();

        if($this->Product->validates()){
 
           $this->Product->save($this->request->data);

           $this->Product->save($this->request->data['serial']);
    
          $this->Flash->success('Product Add Successfully', array('key' => 'positive'));
          return $this->redirect(array('controller'=>'Products','action'=>'productlist'));
        }
 
    }
  }

////////////////////////////////////////////////////////////////////

public function admin_productedit($id){
  $this->set('title','Edit Product');
  $product= $this->Product->findProductbyId($id); // Get Product Detail from id
  //echo "<pre>"; print_r($product); die();
  if($this->request->is('post'))
  { 
      $serial =  $this->request->data['serial'];
      $pro =  $this->request->data['Product'];
      //echo "<pre>"; print_r($this->request->data); die();
      $this->Product->editProductbyId($this->request->data,$id); // Edit Product
      $this->Product->editProductbyId($this->request->data['serial'],$id); // Edit Product
      $this->Flash->success('Product Edited Successfully', array('key' => 'positive'));   
      return $this->redirect(array('controller'=>'Products','action'=>'productlist')); 
  }
  $this->data = $product ;
  $this->set(compact('product'));
}


////////////////////////////////////////////////////////////////////


public function admin_deleteproduct($id){
  $this->Product->deleteProduct($id);
  $this->Flash->success('Product Deleted Successfully', array('key' => 'positive'));  
  return $this->redirect(array('controller'=>'products','action'=>'productlist'));
}

////////////////////////////////////////////////////////////////////

public function admin_productlist()
{
  $this->set('title','Product List');
    

  $products = $this->Product->allProducts();
  $this->set('products', $products);

}

////////////////////////////////////////////////////////

public function admin_productfetch(){

  if($this->request->is('post')){
    //echo '<pre>';print_r($this->request->data);
    $data = $this->request->data['search'];
    $this->paginate = array(
      'limit' => 1,
    'order' => array('id' => 'asc'),
    'conditions' => array(
                  'OR' => array(
                        array('Product.product_name LIKE' => '%'.$data.'%'),
                        array('Product.description LIKE' => '%'.$data.'%'),
                        array('Product.category LIKE' => '%'.$data.'%'),
                        array('Product.price LIKE' => '%'.$data.'%'),
                        //array('User.email LIKE' => '%'.$data.'%')
                      )
                    )
  );    
    $products = $this->paginate('Product'); 

    echo json_encode($products);



  }
  $this->autoRender = false;


}

///////////////////////////////////////////////////

public function admin_productview($id){
$this->set('title','Profile');
  $product = $this->Product->findProductbyId($id);
  
  if($this->request->is('post'))
  {  
    $this->Flash->success('Successfully Edited', array('key' => 'positive'));
    $this->Product->editProductbyId($this->request->data,$id);
    return $this->redirect(array('controller'=>'products','action'=>'productview'));
    }
  $this->data = $product ; 
  $this->set(compact('product'));
}
/////////////////////////////////////////////////

public function serial()
{
   $serial= $this->Serial->set($this->request->data);

      pr($serial);die();
      if($this->request->is('post')){     
      }
}

////////////////////////////////////////////////////////////////////


public function admin_updateproductquantity()
{
    $qty =$this->request->data('qty');
    $product_id =$this->request->data('product_id');
   
    if ($this->request->is('ajax'))
    {
      $this->Product->updateAll(array('quantity'=>"'$qty'"),array('id'=>$product_id));  
    }
    exit();
}

//////////////////////////////////////////////////////////////////


public function admin_updateproductcost()
{
    $cost =$this->request->data('cost');
    $product_id =$this->request->data('product_id');
   
    if ($this->request->is('ajax'))
    {
      $this->Product->updateAll(array('price_cost'=>"'$cost'"),array('id'=>$product_id));  
    }
    exit();
}

//////////////////////////////////////////////////////////////////


public function admin_updateproductretail()
{
    $retail =$this->request->data('retail');
    $product_id =$this->request->data('product_id');
   
    if ($this->request->is('ajax'))
    {
      $this->Product->updateAll(array('price_retail'=>"'$retail'"),array('id'=>$product_id));  
    }
    exit();
}




/**********************************************************************************/
/*********************************User Section*************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/


  public function add() 
  {
    if($this->Auth->user('id')!='')
    {
    $this->layout = "frontenduser";
    $this->set('title','Add Product');
    $this->Product->set($this->request->data);
    $session_id = $this->Auth->user('id');
    $Vendor     = $this->Vendor->findallVendorNameByLoginId($session_id);
    $Category   = $this->ProductCategory->findProductCategoryByUserId($session_id);
    //pr($Category);die();
    if($this->request->is('post')){
  
        $serial =  $this->request->data['serial'];
        $pro =  $this->request->data['Product'];

        // echo "<pre>"; print_r($serial); 
        // echo "<pre>"; print_r($pro); die();
        //  echo "<pre>"; print_r($this->request->data); die();

        if($this->Product->validates()){
 
           $this->Product->save($this->request->data);

           $this->Product->save($this->request->data['serial']);
    
          $this->Flash->success('Product Add Successfully', array('key' => 'positive'));
          return $this->redirect(array('controller'=>'Products','action'=>'productlist'));
        }
 
    }
    $this->set(compact('Vendor','Category'));
    }
    else{
        $this->layout = false;
        $this->render('/Elements/404');
    }
  }

////////////////////////////////////////////////////////////////////

public function productedit($id){
  if($this->Auth->user('id')!='')
  {
  $this->layout = "frontenduser";
  $this->set('title','Edit Product');
  $session_id = $this->Auth->user('id');
  $Vendor = $this->Vendor->findallVendorNameByLoginId($session_id);
  $product= $this->Product->findProductbyId($id); // Get Product Detail from id
  $Category   = $this->ProductCategory->findProductCategoryByUserId($session_id);
  //echo "<pre>"; print_r($Vendor); die();
  if($this->request->is('post'))
  { 
      $serial =  $this->request->data['serial'];
      $pro =  $this->request->data['Product'];
      //echo "<pre>"; print_r($this->request->data); die();
      $this->Product->editProductbyId($this->request->data,$id); // Edit Product
      $this->Product->editProductbyId($this->request->data['serial'],$id); // Edit Product
      $this->Flash->success('Product Edited Successfully', array('key' => 'positive'));   
      return $this->redirect(array('controller'=>'Products','action'=>'productlist')); 
  }
  $this->data = $product ;
  $this->set(compact('product','Vendor','Category'));
  }
  else{
      $this->layout = false;
      $this->render('/Elements/404');
  }
}


////////////////////////////////////////////////////////////////////


public function deleteproduct($id){
  $this->layout = "frontenduser";
  $this->Product->deleteProduct($id);
  $this->Flash->success('Product Deleted Successfully', array('key' => 'positive'));  
  return $this->redirect(array('controller'=>'products','action'=>'productlist'));
}

////////////////////////////////////////////////////////////////////

public function productlist()
{
  if($this->Auth->user('id')!='')
  {
  $this->layout = "frontenduser";
  $this->set('title','Product List');
    

  $products = $this->Product->findallProductbyLoginId($this->Auth->user('id'));
  $this->set('products', $products);
  }
  else{
      $this->layout = false;
      $this->render('/Elements/404');
  }
}

////////////////////////////////////////////////////////

public function productfetch(){
  $this->layout = "frontenduser";
  if($this->request->is('post')){
    //echo '<pre>';print_r($this->request->data);
    $data = $this->request->data['search'];
    $this->paginate = array(
      'limit' => 1,
    'order' => array('id' => 'asc'),
    'conditions' => array(
                  'OR' => array(
                        array('Product.product_name LIKE' => '%'.$data.'%'),
                        array('Product.description LIKE' => '%'.$data.'%'),
                        array('Product.category LIKE' => '%'.$data.'%'),
                        array('Product.price LIKE' => '%'.$data.'%'),
                        //array('User.email LIKE' => '%'.$data.'%')
                      )
                    )
  );    
    $products = $this->paginate('Product'); 

    echo json_encode($products);



  }
  $this->autoRender = false;


}

///////////////////////////////////////////////////

public function productview($id){
  if($this->Auth->user('id')!='')
  {
  $this->layout = "frontenduser";
  $this->set('title','Profile');
  $product = $this->Product->findProductbyId($id);
  
  if($this->request->is('post'))
  {  
    $this->Flash->success('Successfully Edited', array('key' => 'positive'));
    $this->Product->editProductbyId($this->request->data,$id);
    return $this->redirect(array('controller'=>'products','action'=>'productview'));
    }
  $this->data = $product ; 
  $this->set(compact('product'));
  }
  else{
      $this->layout = false;
      $this->render('/Elements/404');
  }
}
/////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////


public function updateproductquantity()
{
  $this->layout = "frontenduser";
    $qty =$this->request->data('qty');
    $product_id =$this->request->data('product_id');
   
    if ($this->request->is('ajax'))
    {
      $this->Product->updateAll(array('quantity'=>"'$qty'"),array('id'=>$product_id));  
    }
    exit();
}

//////////////////////////////////////////////////////////////////


public function updateproductcost()
{
    $this->layout = "frontenduser";
    $cost =$this->request->data('cost');
    $product_id =$this->request->data('product_id');
   
    if ($this->request->is('ajax'))
    {
      $this->Product->updateAll(array('price_cost'=>"'$cost'"),array('id'=>$product_id));  
    }
    exit();
}

//////////////////////////////////////////////////////////////////


public function updateproductretail()
{
  $this->layout = "frontenduser";
    $retail =$this->request->data('retail');
    $product_id =$this->request->data('product_id');
   
    if ($this->request->is('ajax'))
    {
      $this->Product->updateAll(array('price_retail'=>"'$retail'"),array('id'=>$product_id));  
    }
    exit();
}






/////////////////////////////////////////////////////////////////

}