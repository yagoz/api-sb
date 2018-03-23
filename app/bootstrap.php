<?php



App::bind('config', require 'config.php');


App::bind('database', new QueryBuilder(
	Connection::make(App::get('config')['database'])
));




function jsonView($data = []){

	header("Content-type: application/json; charset=utf-8");

	extract($data);

	echo json_encode($data);
}

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    extract($data);

    return require "views/{$name}.view.php";
}