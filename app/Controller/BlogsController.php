<?php
App::uses('AppController', 'Controller');

class BlogsController extends AppController {


      public function index($id)
	{ 
    $this->set ('title','User Blogs');

   		$this->loadModel('Blog');
   		//echo $this->Auth->user('id');die;
   		$daata = $this->Blog->find('all', array('conditions' => array('Blog.user_id'=>$id)));
           
         $this->set(compact('daata')) ; 
          
          }

     

  public function user_blogdetail()
      
      { 
            $this->set('title','Blog details');
         $this->loadModel('Blog');
   		 $data = $this->Blog->find('first', array('conditions' => array('user_id' => $this->Auth->User('id'))));
           
         $this->set(compact('data')) ; 
       

      } 

      public function user_addblog()
      {
        $this->set('title','Add Blog');
        $this->Blog->set($this->request->data);
  if($this->request->is('post')){
    
    if($this->Blog->validates()){
      //echo '<pre>';print_r($this->request->data);die;
      $this->Img = $this->Components->load('Img');
      if($this->data['Blog']['image']['name']){
          $allowedExts = array("jpg","jpeg","png");
                $ext = $this->Img->ext($this->request->data['Blog']['image']['name']); 
                if (in_array($ext, $allowedExts) ) 
              {
                $newName = strtotime(date("Y-m-d h:i:s"));
              $origFile = $newName . '.' . $ext;
              $dst = $newName . '.jpg';
              $targetdir = WWW_ROOT .'img/blog_image/';
              $upload = $this->Img->upload($this->request->data['Blog']['image']['tmp_name'], $targetdir, $origFile);
              if($upload == 'Success') 
              {
                $this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/blog_image/small/', $dst, 160, 160, 1, 0);
                $this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'img/blog_image', $dst, 500, 500, 1, 0);
                $this->request->data['Blog']['image'] = $dst;
                 }


              }
               }else{
        $this->request->data['Blog']['image'] = '';

      }
      
       $this->Blog->save($this->request->data);
    $this->Flash->success(' Successfully', array('key' => 'positive'));
    
   }
 
}

}
}

