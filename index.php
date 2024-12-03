<?php

//!Carregamento automatico das classes
require_once 'vendor/autoload.php';
require_once './App/Helpers/Funcoes.php';

use App\Controllers\IndexController;
use App\Controllers\ListarProdutosController;
use Slim\App;


$config = ['settings' => [
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false,
]];

$app = new App($config);


//= Rota index
$app->get('/', function(){

    $controller = new IndexController();
    $controller->index();
});

//= rota listar produtos de acordo com a categoria
$app->get('/categorie/{id_categoria}', function($request, $response, $args){

    $id_categoria = $args['id_categoria'];
    $controller = new ListarProdutosController();
    $controller->listarProdutos($id_categoria);
});



$app->run();