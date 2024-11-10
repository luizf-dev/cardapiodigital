<?php

//!Carregamento automatico das classes
require_once 'vendor/autoload.php';

use App\Controllers\IndexController;
use Slim\App;


$config = ['settings' => [
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false,
]];

$app = new App($config);


//! Rota index
$app->get('/', function(){

    $controller = new IndexController();
    $controller->index();
});

$app->run();