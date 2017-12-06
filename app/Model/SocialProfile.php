<?php
uApp::uses('AuthComponent', 'Controller/Component');
 
class SocialProfile extends AppModel {
     
    public $belongsTo = 'User';
 
}
?>