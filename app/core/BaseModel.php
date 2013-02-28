<?php 

abstract class BaseModel {
	
	public function __construct() {
		
		// include database wrapper
		require_once SITE_ROOT . ASSET_DIR . 'database/Database.php';

		// New database object
		$this->Database = new Database('mysql', 'mvc');

		// Grab the instance. has to be this way for some reason
		$this->db = $this->Database->getInstance();
	}

	// Need to sanitize and validate data
}

 ?>