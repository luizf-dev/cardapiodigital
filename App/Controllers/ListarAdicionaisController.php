<?php

namespace App\Controllers;

use App\Helpers\Page;
use App\Models\Produtos;
use App\Models\Categories;
use App\Database\Sql;
use App\Helpers\Auth;
use App\Helpers\Mensagens;
use App\Helpers\PageAdmin;


class ListarAdicionaisController {


    public function listarAdicionais($id_produto){


        Auth::verifyLogin();
        $connect = Sql::getDatabase();

        $produtos = new Produtos($connect);
        $adicionais = $produtos->getAdicionaisComProduto($id_produto);
        $nomeProduto = $adicionais[0]['nome_produto'] ?? 'Produto sem Adicionais Cadastrados!';

        $page = new PageAdmin();
        $page->renderPage('listar-adicionais', [
            "adicionais" => $adicionais,
            "id_produto" => $id_produto,
            "nome_produto" => $nomeProduto         
        ]);


    }



  



}