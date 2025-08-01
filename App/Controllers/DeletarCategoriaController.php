<?php

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Categories;


class DeletarCategoriaController {

    //= método para deletar uma categoria
    public function deletarCategoria($id_categoria){

          Auth::verifyLogin();

        $connect = Sql::getDatabase();
        $categories = new Categories($connect);

        $resultado = $categories->deletarCategoria($id_categoria);

        if ($resultado === false) {
            // Categoria possui produtos → não exclui
            Mensagens::setMsgErro("Esta categoria contém produtos e não pode ser excluída. Mova ou exclua os produtos associados!");
            header('Location: /admin/categories');
            exit;

        }elseif($resultado === true){

            Mensagens::setMsgSucesso('Categoria excluída com sucesso!');

            header('Location: /admin/categories');
            exit;

        } else {
            // Erro técnico (PDOException)
            Mensagens::setMsgErro($resultado);
            header('Location: /admin/categories');
            exit;

        }
    }
}