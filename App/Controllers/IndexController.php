<?php

namespace App\Controllers;

use App\Helpers\Page;
use App\Models\Produtos;
use App\Models\Categories;
use App\Database\Sql;


class IndexController {

    //= método para a rota Index do cardápio
    public function index(){

        //!conexao com a base de dados
        $connect = Sql::getDatabase();
        
        //!instancia de um novo objeto categoria
        $categories = new Categories($connect);

        //!instancia de um novo objeto de produtos para listar na home
        $produtos = new Produtos($connect);

        $produto = $produtos->listarProdutosNaHome();

        $categoriasAtivas = $categories->listarCategoriasAtivas(); 

        //! Renderiza o template passando a lista de produtos
        $page = new Page();
        $page->renderPage("index", [
            "category" => $categoriasAtivas,
            "produto" => $produto
        ]);        
    }

}