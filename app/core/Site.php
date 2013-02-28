<?php
/**
 * Site
 * 
 * @author Joshua Frankel <joshmfrankel@gmail.com>
 * @copyright Copyright (c) 2012, Joshua Frankel
 * @version 0.1
 * @filename Site.php
 * 
 **/
class Site {
	
	/**
	 * Private Variables
	 * @var 
	 */
	private $querystring;

	/**
	 * Constructor
	 *
	 * @access public
	 * @return void
	 */
	public function __construct($querystring) {

		// Require the basic MVC classes
		require_once SITE_ROOT . CORE_DIR . 'Router.php';
		require_once SITE_ROOT . CORE_DIR . 'BaseController.php';
		require_once SITE_ROOT . CORE_DIR . 'BaseModel.php';
		require_once SITE_ROOT . CORE_DIR . 'Error.php';

		$this->querystring = $querystring;
		$this->Router = new Router($querystring);

		// Register the autoloading method
		spl_autoload_register(array($this, 'autoload'));

		if (HTML5_ENABLED) {

			// Add html5shiv
			// modernizr
		}
	}

	/**
	 * Output important debug variables
	 * @return string 
	 */
	public function outputDebugMode() {

		$outputHTML = '<pre class="debug">
			<p><strong>Debug Mode:</strong>
			Controller: ' . $this->querystring['controller'] . '
			Action: ' . $this->querystring['action'] . '
			id: ' . $this->querystring['id'] . '</p>
			</pre>';

		return $outputHTML;
	}

	/**
	 * Autoload the controller / model / view
	 */
	public function autoload($className) {

		// Determine the type of file to load
		preg_match('(Controller|Model|View)', $className, $match);

		// The class is not a controller, model, or view
		// and it is not included.  There is probably an include
		// problem in the model
		if (!count($match)) {
			throw new Error($className . '.php asset has not yet been loaded.  Make sure to include the appropriate files');
		}

		// Build the filename
		$filename = SITE_ROOT . APP_DIR . strtolower($match[0]) . 's/' . $className . '.php';

		// Check to make sure the file actually exists
		if (stream_resolve_include_path($filename) !== FALSE) {
			include_once $filename;
		} else {
			throw new Error($className . " class does not exist (" . $filename . ").  Check filename and captialization");
		}

		
	}
	
}
?>