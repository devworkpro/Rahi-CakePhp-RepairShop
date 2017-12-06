<?php
App::uses('AppModel', 'Model');
class Team extends AppModel {
	
 var $name = 'Team';

 	
 	public function addTeamAdmin($data){
		
		return $this->save($data);
	}

	public function editTeamAdmin($data,$Asset_Field_id){
		$this->id = $Asset_Field_id;
		return $this->save($data);
	}
 	
	public function findallTeamByAssetId($ass_id){
		return $this->find('all',array('conditions'=>array('Team.asset_id'=>$ass_id)));
		
	}

	public function findallTeamById($Team_id){
		return $this->find('all',array('conditions'=>array('Team.id'=>$Team_id)));
		
	}

 	public function DeleteTeam($Team_id){
		$this->id = $Team_id;
		$this->delete(array('Team.id'=>$Team_id));
	}

}
?>