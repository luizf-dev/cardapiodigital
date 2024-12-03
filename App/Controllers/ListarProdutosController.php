<?php

namespace App\Controllers;

use App\Helpers\Page;
use App\Models\Produtos;
use App\Models\Categories;
use App\Database\Sql;

class ListarProdutosController {

    //= método para listar os produtos de acordo com a categoria no cardapio
    public function listarProdutos($id_categoria){

        //!conexao com a base de dados
        $connect = Sql::getDatabase();

        //! Instancia de um novo objeto Produtos, passando a conexao com o banco de dados
        $produto = new Produtos($connect);
        $produtos = $produto->listarProdutosPorCategoria($id_categoria);

        //!instancia de um novo objeto categoria
        $categories = new Categories($connect);
        $categoriasAtivas = $categories->listarCategoriasAtivas();
        $nomeCategoria = $categories->getNomeCategoria($id_categoria);

        $page = new Page();
        $page->renderPage("produtos", [
            "produtos" => $produtos,
            "category" => $categoriasAtivas,
            "nome_categoria" => $nomeCategoria
        ]);
    }
}