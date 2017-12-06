<?php App::uses('AppModel', 'Model'); 
class Asset extends AppModel {
	
 var $name = 'Asset';

	public function allAssets(){
				return $this->find('all');
	}

	public function findallAssetsByLoginId($id){
		return $this->find('all',array('conditions'=>array('Asset.login_id'=>$id)));
	}

	public function findAssetbyId($id){
		return $this->find('first',array('conditions'=>array('Asset.id'=>$id)));
	}

	public function findAssetNameById($id){
		return $this->find('all',array('conditions'=>array('Asset.id'=>$id)));
		
	}


	public function editAssetbyId($data,$id){
		$this->id = $id;
		return $this->save($data);
	}

	

	public function addAssetAdmin($data){
		
		return $this->save($data);
		
		//pr($data);die();
	}

	
	public function deleteAsset($id){
		$this->id = $id;
		//echo $id;die();
		$this->delete(array('Asset.id'=>$id));
	}

	

}

?>