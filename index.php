<?php

	/**
	 * Single Point of Entry
	 * 
	 * This file is the single entry point.
	 * All requests for the site must go 
	 * through this file
	 */

	// Basic includes
	require_once 'config.php';
	require_once SITE_ROOT . CORE_DIR . 'Site.php';

	

	/**
	 * Application Wide Error Catching
	 * 
	 * We will run the starting mvc commands from
	 * within the try catch block so that any
	 * errors thrown within will bubble back to
	 * this page.
	 */
	try {

		// Instantiate new Site object
		// pass in query string to the constructor
		$Site = new Site($_GET);

		// Check for Debug Mode
		if (SITE_STATUS == 'DEV') {
			echo $Site->outputDebugMode();
		}

		// Attempt to create a new controller based off the querystring
		$Controller = $Site->Router->createController();
		$Controller->executeAction();

	} catch (Error $e) {
		$e->outputErrorPage();

	}
	
?>