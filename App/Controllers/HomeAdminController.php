<?php

namespace App\Controllers;

use App\Helpers\Auth;
use App\Helpers\PageAdmin;
use App\Database\Sql;

class HomeAdminController {


    //= método para a página home do Admin
    public function homeAdmin(){

        Auth::verifyLogin();

        $username = $_SESSION['username'];

        //!conexao com a base de dados
        $connect = Sql::getDatabase();

        //! Instancia de um novo objeto Produtos, passando a conexao com o banco de dados
        //$produtos = new Produtos($connect);
        //$produtos = $produtos->listarProdutos();

        $page = new PageAdmin();
        $page->renderPage("home", [
           "username" => $username,
           // "produtos" => $produtos
        ]);
    }
}