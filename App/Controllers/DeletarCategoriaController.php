<?php

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\PageAdmin;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Categories;


class DeletarCategoriaController {

    //= método para deletar uma categoria
    public function deletarCategoria($id_categoria){

        Auth::verifyLogin();

        $connect = Sql::getDatabase();
        $categorias = new Categories($connect);
        

        if($categorias->deletarCategoria($id_categoria)){

            Mensagens::setMsgSucesso('Categoria excluída com sucesso!');

            header('Location: /cardapiodigital/admin/categories');
            exit;

        }else{

            Mensagens::setMsgErro('Não foi possível deletar! Tente novamente!');

            header('Location:  /cardapiodigital/admin/categories');
            exit;
        }
    }
}