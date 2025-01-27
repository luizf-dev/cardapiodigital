<?php


namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\PageAdmin;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Categories;

class ListarCategoriasController {

    //= método para listar todas as categorias no admin
    public function listarCategorias(){

        Auth::verifyLogin();

        $connect = Sql::getDatabase();
        $categories = new Categories($connect);

        $category = $categories->listarCategorias();

        $page = new PageAdmin();
        $page->renderPage("categorias", [
            "category" => $category,
            "msgSucesso" => Mensagens::getMsgSucesso(),
            "msgErro" => Mensagens::getMsgErro()
        ]);
    }
}