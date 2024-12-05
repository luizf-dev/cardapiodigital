<?php

session_start();

//!Carregamento automatico das classes
require_once 'vendor/autoload.php';
require_once './App/Helpers/Funcoes.php';

use App\Controllers\CadastrarCategoriaController;
use App\Controllers\DeletarCategoriaController;
use App\Controllers\EditarCategoriaController;
use App\Controllers\HomeAdminController;
use App\Controllers\IndexController;
use App\Controllers\ListarCategoriasController;
use App\Controllers\ListarProdutosController;
use App\Controllers\LoginController;
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

//= rota para o login do Admin
$app->get('/admin', function(){

    $controller = new LoginController(); 
    $controller->loginAdminPage();
  
});

//= rota post para o login do Admin
$app->post('/admin', function(){

    $controller = new LoginController();
    $controller->loginAdminPost();
});

//= rota para logout do Admin
$app->get('/admin/logout', function(){

    $controller = new LoginController();
    $controller->logout();
});

//= rota para a home do Admin
$app->get('/admin/home', function(){

    $controller = new HomeAdminController();
    $controller->homeAdmin();
});

//= rota para listar categorias no Admin
$app->get('/admin/categories', function(){

    $controller = new ListarCategoriasController();
    $controller->listarCategorias();
});

//= rota para cadastrar uma categoria
$app->get('/admin/newCategorie', function(){

    $controller = new CadastrarCategoriaController();
    $controller->cadastrarCategoriaPage();
});

//= rota post para cadastrar uma categoria
$app->post('/admin/newCategorie', function(){

    $controller = new CadastrarCategoriaController();
    $controller->cadastrarCategoriaPost();
});

//= rota para editar uma categoria
$app->get('/admin/atualizar-categoria/{id_categoria}', function($request, $response, $args){

    $id_categoria = $args['id_categoria'];
    $controller = new EditarCategoriaController();
    $controller->editarCategoriaPage($id_categoria);
    return $response;
});

//= rota post para editar uma categoria
$app->post('/admin/atualizar-categoria/{id_categoria}', function($request, $response, $args){

    $id_categoria = $args['id_categoria'];
    $controller = new EditarCategoriaController();
    $controller->editarCategoriaPost($id_categoria);
    return $response;
});

//= rota para deletar uma categoria
$app->get('/admin/deletar-categoria/{id_categoria}', function($request, $response, $args){

    $id_categoria = $args['id_categoria'];
    $controller = new DeletarCategoriaController();
    $controller->deletarCategoria($id_categoria);
    return $response;
});

//= rota para listar os produtos de acordo com categoria no Admin
$app->get('/admin/categorie/{id_categoria}', function($request, $response, $args){

    $id_categoria = $args['id_categoria'];
    $controller = new ListarProdutosController();
    $controller->listarProdutosAdmin($id_categoria);
    return $response;
});




$app->run();