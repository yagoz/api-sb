<?php

class Router
{

    protected $routes = [
        "GET" => [],
        "POST"  => [],
        "PUT" => [],
        "DELETE" => []
    ];


    /*
    * Include route file and return self instace of Router
    */
    public static function load($file)
    {
        $router = new self;
        require $file;
        return $router;
    }

    /*
    * Set defined routes
    */
    public function define($routes)
    {
        $this->routes = $routes;
    }

    /*
    * Set get routes
    */
    public function get($uri, $controller)
    {
        $this->routes["GET"][$uri] = $controller;
    }

    /*
    * Set post routes
    */
    public function post($uri, $controller)
    {
        $this->routes["POST"][$uri] = $controller;
    }

    /*
    * Set put routes
    */
    public function put($uri, $controller)
    {
        $this->routes["PUT"][$uri] = $controller;
    }

    /*
    * Set delete routes
    */
    public function delete($uri, $controller)
    {
        $this->routes["DELETE"][$uri] = $controller;
    }

    /*
    * Redirect to the controller especified
    */
    public function direct($uri, $requestType)
    {

        if (array_key_exists($uri, $this->routes[$requestType])) {            
            return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
        }
        
        throw new Exception("Error route not found. ");
        
        
    }

    public function callAction($controller, $action)
    {
        $controller = new $controller;

        if( ! method_exists($controller, $action)){
            throw new Exception("Action not found. "); 
        }

        return $controller->$action();

    }

}