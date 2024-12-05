<?php

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\PageAdmin;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Categories;

class EditarCategoriaController {

    //= método para atualizar uma categoria
    public function editarCategoriaPage($id_categoria){

        Auth::verifyLogin();

        $connect = Sql::getDatabase();
        $categorias = new Categories($connect);
        $categoria = $categorias->detalhesCategoria($id_categoria);

        $page = new PageAdmin();
        $page->renderPage('atualizar-categoria', [
            "categoria" => $categoria,
            "msgErro" => Mensagens::getMsgErro()
        ]);
    }

    //= método post para atualizar uma categoria
    public function editarCategoriaPost($id_categoria){

        Auth::verifyLogin();

        $nome_categoria = $_POST['nome_categoria'];
        $status = $_POST['status'];
        $exibir_na_home = $_POST['exibir_na_home'];

        $connect = Sql::getDatabase();
        $categoria = new Categories($connect);

        if($categoria->atualizarCategoria($id_categoria, $nome_categoria, $status, $exibir_na_home)){

            Mensagens::setMsgSucesso('Categoria atualizada com sucesso!');
            header('Location:  /cardapiodigital/admin/categories');
            exit();
        }else{
            
            Mensagens::setMsgErro('Não foi possível atualizar a categoria!');
            header('Location: /cardapiodigital/admin/categories');
            exit();
        }
    }



}