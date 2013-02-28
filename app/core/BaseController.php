<?php 

abstract class BaseController {

	protected $controller;
	protected $action;
	protected $id;
	
	/**
	 * Constructor Method
	 *
	 * Because we are extending this class for every
	 * controller class, we have a universal way of setting
	 * basic querystring variables
	 * 
	 * @param array $querystring The querystring
	 */
	public function __construct($querystring) {
		$this->controller = $querystring['controller'];
		$this->action = $querystring['action'];		
		$this->id = $querystring['id'];
	}

	// This will force all child classes to have an implementation of the index
	// method.  A basic template for every controller class.
	protected abstract function index();

	/**
	 * Execute Action method
	 *
	 * This method will dynamically call the action passed into the constructor
	 * upon the child class that extends this base class
	 * @return mixed The action from the child class
	 */
	public function executeAction() {
		return $this->{$this->action}();
	}

	/**
	 * Return View method
	 *
	 * This method will output the appropriate view.  There is also an optional full View flag
	 * for non-partial pages
	 *
	 * @todo Finish up implementation of $viewModel
	 * 
	 * @param  [type] $viewModel [description]
	 * @param  [type] $fullView  [description]
	 * @return [type]            [description]
	 */
	protected function returnView($viewModel, $fullView) {

		$view = SITE_ROOT . VIEWS_DIR . get_class($this) . '/' . $this->action . '.php';

		// Include the Header file

		require_once SITE_ROOT . TEMPLATE_DIR . 'header.php'; 

		if ($fullView) {
			require(SITE_ROOT . TEMPLATE_DIR . 'template.php');
		} else {
			require($view);
		}
	}
}

 ?>