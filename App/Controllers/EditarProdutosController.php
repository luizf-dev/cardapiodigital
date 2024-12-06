<?php

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\PageAdmin;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Produtos;
use App\Models\Categories;


class EditarProdutosController {


    //= método para atualização dos produtos 
    public function EditarProdutoPage($id){

        Auth::verifyLogin();

        $connect = Sql::getDatabase();

        $categories = new Categories($connect);

        $categorie = $categories->listarCategorias();

        $produto = new Produtos($connect);

        $detalhesProduto = $produto->detalhesProduto($id);

        $page = new PageAdmin();

        $page->renderPage("atualizar-produto", [
            "produtos" => $detalhesProduto,
            "categorie" => $categorie,
            "msgErro" => Mensagens::getMsgErro()
        ]);
    }


    //= método post para atualização dos produtos
    public function EditarProdutoPost($id){

        Auth::verifyLogin();

        $preco = $_POST['preco'];
        $valorEmReais = str_replace(['.', ','], ['', '.'], $preco);
    
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $valorEmReais; 
        $id_categoria = $_POST['id_categoria'];
        $status = $_POST['status'];



        $connect = Sql::getDatabase();

        $produto = new Produtos($connect);

        if($_POST['nome'] == '' || $_POST['descricao'] == ''|| $_POST['preco'] == '' ||  $_POST['id_categoria'] == '' || $_POST['status'] == ''){

            Mensagens::setMsgErro('Campos em branco, não é possível atualizar!');

            header("Location: /cardapiodigital/admin/atualizar-produto/$id");
            exit;
        }

        if($produto->atualizarProduto($id, $nome, $descricao, $preco, $id_categoria, $status)){

            Mensagens::setMsgSucesso('Produto atualizado com sucesso!');

            header("Location: /cardapiodigital/admin/categorie/$id_categoria");
            exit;

        }else{
        
            Mensagens::setMsgErro('Não foi possível atualizar o produto!');

            header("Location: /cardapiodigital/admin/atualizar-produto/$id");
            exit();
        }  
    }
}