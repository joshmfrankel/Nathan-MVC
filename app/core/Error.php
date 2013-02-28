<?php
/**
 * error
 * 
 * @author Joshua Frankel <joshmfrankel@gmail.com>
 * @copyright Copyright (c) 2012, Joshua Frankel
 * @version 0.1
 * @filename error.php
 * 
 **/
class Error extends Exception{
	
	/**
	 * Private Variables
	 * @var 
	 */
	

	/**
	 * Constructor
	 *
	 * @access public
	 * @return void
	 */
	public function __construct($msg, $details = '') {

		$this->msg = $msg;
		$this->details = $details;

	}

	public function outputErrorPage() {

		// Set the error variables
		$errorHTML = '<strong>' . $this->msg . ':</strong> ' . $this->details;

		// Include the error page
		require_once SITE_ROOT . TEMPLATE_DIR . 'errorTemplate.php';
	}

	
}
?>