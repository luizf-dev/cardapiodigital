<?php

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\PageAdmin;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Categories;


class CadastrarCategoriaController {

    //= método para cadastrar uma nova categoria
    public function cadastrarCategoriaPage(){

        Auth::verifyLogin();

        $page = new PageAdmin();
        $page->renderPage("cadastrar-categoria", [

            "msgErro" => Mensagens::getMsgErro()
        ]);
    }


    //= método post para cadastrar uma categoria
    public function cadastrarCategoriaPost(){

        Auth::verifyLogin();

        $connect = Sql::getDatabase();

        $categoria = new Categories($connect);

        $categoria->__set('nome_categoria', $_POST['nome_categoria']);
        $categoria->__set('status', $_POST['status']);
        $categoria->__set('exibir_na_home', $_POST['exibir_na_home']);

        if($_POST['nome_categoria'] == '' || $_POST['status'] == '' || $_POST['exibir_na_home'] == ''){

            Mensagens::setMsgErro('Preencha os campos corretamente!');

            header('Location: /admin/newCategorie');
            exit;
        }

        if($categoria->cadastrarCategoria()){

            Mensagens::setMsgSucesso('Categoria cadastrada com sucesso!');
            header('Location: /admin/categories');
            exit;

    }else{

            Mensagens::setMsgErro('Não foi possível cadastrar! Tente novamente!');
            header('Location: /admin/newCategorie');
        }  
    }
}