<?php

class Request
{

  
	/*
	* Return clean path of request
	*/
    public static function uri()
    {
       $uri = explode('/',trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        ))  ;

       return $uri[0];
    }

    /*
    * Return request Method
    */
    public static function method()
    {
    	return $_SERVER['REQUEST_METHOD'];
    }


    /*
    * Return request params
    */
    public static function params()
    {

        $params = [];
        switch (self::method()) {
            case "GET":
                   $params = $_GET;
                   break; 
            case "POST":
                   $params = $_POST;
                   break;

            case "PUT":
            case "DELETE":
                    parse_str(file_get_contents("php://input"),$post_vars);
                    $params = $post_vars;
                   break;
        }

        $uri = explode('/',trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        ))  ;

        if(isset($uri[1]) && is_numeric($uri[1])){
         $params['id'] = $uri[1];

        }
       

    	return $params;
    }


}