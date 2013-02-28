<?php

/**
 * Class Router
 *
 * This will properly
 */
class Router
{
    /**
     * Defaults if there is no controller or action
     */
    private $defaultAction     = 'index';
    private $defaultController = 'HomeController';
    private $defaultId         = '';

    /**
     * Protected properties
     */
    protected $querystring;
    protected $controller;
    protected $action;
    protected $id;

    /**
     * Constructor Method
     *
     * Set the proper controller and action
     * @param [type] $querystring [description]
     */
    public function __construct($querystring)
    {
        // Set the controller
        $this->setController($querystring['controller']);

        // Set the action
        $this->setAction($querystring['action']);

        // Set the Id
        $this->setId($querystring['id']);

    }

    /**
     * Set Controller
     *
     * @access private
     * @param  string $value The controller class
     * @return void
     */
    private function setController ($value)
    {
        $this->controller =
        $this->querystring['controller'] =
            ($value) ? $value . 'Controller' : $this->defaultController;
    }

    /**
     * Set Action
     *
     * @access private
     * @param  string $value The action to be set
     * @return void
     */
    private function setAction ($value)
    {
        $this->action =
        $this->querystring['action'] =
            ($value) ? $value : $this->defaultAction;
    }

    /**
     * Set Id
     *
     * @access private
     * @param void
     */
    private function setId ($value)
    {
        $this->id =
        $this->querystring['id'] =
            ($value) ? $value : $this->defaultId;
    }

    /**
     * Create Controller
     *
     * Instantiates a new controller instance the corresponds
     * to the proper file. Also performs simple exception handling
     *
     * @access  public
     * @return Controller|Error Returns either a controller or error obj
     */
    public function createController()
    {
        //does the class exist?
        if (class_exists($this->controller)) {

            // Get the Parent Base Class
            $parents = class_parents($this->controller);

            //does the class extend the controller class?
            if (in_array("BaseController", $parents)) {

                //does the class contain the requested method?
                if (method_exists($this->controller, $this->action)) {

                    // Return new controller object
                    // Note that the constructor method is within the
                    // abstract class BaseController
                    return new $this->controller($this->querystring);

                } else {

                    //bad method error
                    throw new Error("Controller method does not exist", $this->querystring['action']);
                }

            } else {

                //bad controller error
                throw new Error("Controller class does not extend the BaseController class ", $this->querystring['controller']);
            }

        } else {

            //bad controller error
            throw new Error("Controller class does not exist", $this->querystring['controller']);
        }
    }
}
