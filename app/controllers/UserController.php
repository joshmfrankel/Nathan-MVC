<?php
/**
 * home
 * 
 * @author Joshua Frankel <joshmfrankel@gmail.com>
 * @copyright Copyright (c) 2012, Joshua Frankel
 * @version 0.1
 * @filename home.php
 * 
 **/
class UserController extends BaseController {
	
	protected function index() {
		//echo 'You have reached the index page';
		$data = array();
		$this->ReturnView($data, FALSE);

	}

	

	
}

?>