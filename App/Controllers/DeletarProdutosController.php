<?php

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Produtos;


class DeletarProdutosController {


    //= método para deletar um produto
    public function deletarProdutos($id){

        Auth::verifyLogin();

        $connect = Sql::getDatabase();

        $produto = new Produtos($connect);

        $detalhesProduto = $produto->detalhesProduto($id);
        
        $id_categoria = $detalhesProduto['id_categoria'];

        if($produto->deletarProduto($id)){

            Mensagens::setMsgSucesso('Produto excluído com sucesso!');
            header("Location: /admin/categorie/$id_categoria");
            exit;

        }else{
            
            Mensagens::setMsgSucesso('Não foi possível deletar este produto! Tente novamente!');
            header("Location:  /admin/categorie/$id_categoria");
            exit;
        }
    }
}