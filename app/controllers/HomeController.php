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
class HomeController extends BaseController {
	
	protected function index() {
		//echo 'You have reached the index page';
		$data = array();
		$this->ReturnView($data, FALSE);
	}

	public function show() {

		$Model = new HomeModel();

		$userData = $Model->show($this->id);

		$this->ReturnView($userData, FALSE);
	}

	
}

?>