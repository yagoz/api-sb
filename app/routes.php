<?php

$router->get('', 'IndexController@index');
$router->get('products', 'ProductsController@read');
$router->post('products', 'ProductsController@create');
$router->put('products', 'ProductsController@update');
$router->delete('products', 'ProductsController@delete');

