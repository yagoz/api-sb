<?php 

/*
* Container de dependencias
*/
class App{


	protected static $registry = [];


	/*
	* Seteo de la dependecia y el valor
	*/
	public static function bind($key, $value){

		self::$registry[$key] = $value;

	}

	/*
	*  Devuelvo la dependencia solicitada
	*/
	public static function get($key){
		if(! array_key_exists($key, static::$registry)){
			throw new Exception("Error, {$key} doesnt exist in container.");
			
		}
		return self::$registry[$key];

	}
}