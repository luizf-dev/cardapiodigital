<?php

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\PageAdmin;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Produtos;
use App\Models\Categories;

class CadastrarProdutosController {


    //= método para cadastrar um novo produto
    public function cadastrarProdutoPage(){

        Auth::verifyLogin();

        $connect = Sql::getDatabase();

        $categories = new Categories($connect);
        $categorie = $categories->listarCategorias();

        $page = new PageAdmin();

        $page->renderPage("cadastrar-produto", [

            "msgErro" => Mensagens::getMsgErro(),
            "categorie" => $categorie
        ]);
    }

    //= método post para cadastrar um novo produto
    public function cadastrarProdutoPost(){

        Auth::verifyLogin();

        $imagem = 'imagem-padrao.jpeg';
    
        $connect = Sql::getDatabase();

        $id_categoria = $_POST['id_categoria'];    
        $preco = $_POST['preco'];
        $valorEmReais = str_replace(['.', ','], ['', '.'], $preco);
    
        $produto = new Produtos($connect);
        $produto->__set('nome', $_POST['nome']);
        $produto->__set('descricao', $_POST['descricao']);
        $produto->__set('preco', $valorEmReais);
        $produto->__set('imagem', $imagem);   
        $produto->__set('id_categoria', $_POST['id_categoria']);
        $produto->__set('status', $_POST['status']);
    
        if($_POST['nome'] == '' || $_POST['descricao'] == ''|| $_POST['preco'] == '' ||  $_POST['id_categoria'] == '' || $_POST['status'] == ''){
    
            Mensagens::setMsgErro('Preencha os campos corretamente!');
    
            header('Location: /admin/cadastrar-produto');
            exit;
        }
    
       if($produto->cadastrarProduto()){
    
            Mensagens::setMsgSucesso('Produto cadastrado com sucesso!');
    
            header("Location: /admin/categorie/$id_categoria");
            exit;
    
       }else{
    
            Mensagens::setMsgErro('Não foi possível cadastrar o produto! Tente novamente!');
    
            header('Location: /admin/cadastrar-produto');
            exit;
       } 
    }


}