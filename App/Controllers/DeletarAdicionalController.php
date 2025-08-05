<?php

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Produtos;


class DeletarAdicionalController {


    //= método para deletar o adicional de um produto
    public function deletarAdicional($id){

        Auth::verifyLogin();

        $connect = Sql::getDatabase();

        $produto = new Produtos($connect);

        $id_categoria = $produto->getDetalhesComCategoria($id);
        
        $id_categoria = $id_categoria['id_categoria'];

        $id_produto = $produto->getAdicionalById($id);

        $adicional = $produto->deletarAdicional($id);

        $id_produto = $id_produto['id_produto'];

        if($adicional){

            Mensagens::setMsgSucesso('Adicional excluído com sucesso!');
            header("Location: /admin/categorie/$id_categoria");
            exit;

        }else{
            
            Mensagens::setMsgSucesso('Não foi possível deletar! Tente novamente!');
            header("Location:  /admin/categorie/$id_categoria");
            exit;
        } 
    }
}