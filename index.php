<?php
require 'vendor/autoload.php';
require 'app/bootstrap.php';


Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
