<?php

namespace App\Controllers;

use App\Models\Produtos;
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

        if (count($adicionais) === 0) {

            Mensagens::setMsgErro("Este produto não contém adicionais cadastrados.");
            
            // Redireciona para a página anterior, se possível
            if (!empty($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                // fallback: caso o referer não esteja disponível
                header("Location: /admin/categories");
            }
            exit;
        }


        $nomeProduto = $adicionais[0]['nome_produto'];

        $page = new PageAdmin();
        $page->renderPage('listar-adicionais', [
            "adicionais" => $adicionais,
            "id_produto" => $id_produto,
            "nome_produto" => $nomeProduto,
            "msgSucesso" => Mensagens::getMsgSucesso(),
            "msgErro" => Mensagens::getMsgErro()
        ]);


    } 


}