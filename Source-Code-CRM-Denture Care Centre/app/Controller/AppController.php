<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array (
		'Session',
		'Auth'=>array(
			'loginRedirect'=>array('controller'=>'users', 'action'=>'index'),
			'logoutRedirect'=>array('controller'=>'users', 'action'=>'login'),
			'authError'=>"You can't access that page",
			'authorize'=>array ('Controller')
			
		),
		
	);
	
	public function isAuthorized($user) {
		return true;
	}
/**
* uploads files to the server
* @params:
* $folder = the folder to upload the files e.g. 'img/files'
* $formdata = the array containing the form files
* $itemId = id of the item (optional) will create a new sub folder
* @return:
* will return an array with the success of each file upload
*/
function uploadFiles($folder, $formdata, $itemId = null)
{
     // setup dir names absolute and relative
     $folder_url = WWW_ROOT.$folder;
     $rel_url = $folder;

    // create the folder if it does not exist
    if(!is_dir($folder_url)) {
      mkdir($folder_url);
    }

    // if itemId is set create an item folder
    if($itemId) {
   // set new absolute folder
    $folder_url = WWW_ROOT.$folder.'/'.$itemId;
   // set new relative folder
   $rel_url = $folder.'/'.$itemId;
   // create directory
   if(!is_dir($folder_url)) {
     mkdir($folder_url);
   }
   }

   // list of permitted file types
   $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');

  // replace spaces with underscores
   $filename = str_replace(' ', '_', $formdata['name']);
  // assume filetype is false
   $typeOK = false;
  // check filetype is ok
   foreach($permitted as $type)
  {
     if($type == $formdata['type'])
     {
       $typeOK = true;
       break;
     }
  }
  // if file type ok upload the file
  if($typeOK)
  {
  // switch based on error code
   switch($formdata['error']) {
   case 0:
  // create full filename
  $full_url = $folder_url.'/'.$formdata['name'];
  $url = $rel_url.'/'.$formdata['name'];
  // upload the file - overwrite existing file
  $success = move_uploaded_file($formdata['tmp_name'], $url);

  // if upload was successful
  if($success)
  {
    //save the filename of the file
    $result['urls'][] = $formdata['name'];
  } else
  {
    $result['errors'][] = "Error uploaded ". $formdata['name']. "Please try again.";
  }
   break;
  case 3:
  // an error occurred
  $result['errors'][] = "Error uploading ".$formdata['name']." Please try again.";
  break;
  default:
  // an error occurred
  $result['errors'][] = "System error uploading ".$formdata['name']. "Contact webmaster.";
  break;
  }
  } elseif($formdata['error'] == 4) {
  // no file was selected for upload
   $result['nofiles'][] = "No file Selected";
  } else {
  // unacceptable file type
  $result['errors'][] = $formdata['name']." cannot be uploaded. Acceptable file types: gif, jpg, png.";
 }

  return $result;
}
	
	/**
	Non-login user
	*/
	public function beforeFilter(){
		$this->Auth->authenticate = array(
                                 'Form' => array('scope' => array('User.working_state'=>'Activated')),                                
                 );  
               // $this->Auth->allow('*');
	$this->Auth->allow(array('forgot_password','reset_password'));
	 	Controller::loadModel('JobTitle');
	 	$this->set('current_user', $this->Auth->user());
		$this->set('current_user_jobTitle', $this->JobTitle->find('all',array('conditions' => array ('JobTitle.job_title_id' =>$this->Auth->user('job_title')))));
		if ($this->name == "Patients") {
			$s = str_replace("step", "", $this->action);
			if (abs($this->Session->read('Step.id') - $s) > 1 && $s != 0) {
				$this->redirect(array("controller" => "patients", "action" => "step".($this->Session->read('Step.id')+1)), null, true);
			}
		}
	}

}
