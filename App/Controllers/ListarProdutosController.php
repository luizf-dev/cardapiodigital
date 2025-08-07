<?php

namespace App\Controllers;

use App\Helpers\Page;
use App\Models\Produtos;
use App\Models\Categories;
use App\Database\Sql;
use App\Helpers\Auth;
use App\Helpers\Mensagens;
use App\Helpers\PageAdmin;

class ListarProdutosController {

    //= método para listar os produtos de acordo com a categoria no cardapio
    public function listarProdutos($id_categoria){

        //!conexao com a base de dados
        $connect = Sql::getDatabase();

        $produto = new Produtos($connect);
        $produtos = $produto->listarProdutosPorCategoria($id_categoria);
        

        //! Para cada produto, busco os adicionais e insiro no array
        foreach ($produtos as &$item) {
            $item['adicionais'] = $produto->getAdicionaisComProduto($item['id']);
        }


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

    //= método para listar os produtos de acordo com a categoria no Admin
    public function listarProdutosAdmin($id_categoria){

            Auth::verifyLogin();

            //!conexao com a base de dados
            $connect = Sql::getDatabase();
        
            //! Instancia de um novo objeto Produtos, passando a conexao com o banco de dados
            $produto = new Produtos($connect);
            $produtos = $produto->listarProdutosPorCategoriaAdmin($id_categoria);
           
        
        
            //!instancia de um novo objeto categoria
            $categories = new Categories($connect);
            $categorie = $categories->listarCategorias();
            $nomeCategoria = $categories->getNomeCategoria($id_categoria);
            $categoriaId = $id_categoria;
            
        
            $page = new PageAdmin();
            $page->renderPage('listar-produtos', [
                "produtos" => $produtos,
                "categorie" => $categorie,
                "nome_categoria" => $nomeCategoria, 
                "id_categoria" => $categoriaId,                                          
                "msgSucesso" => Mensagens::getMsgSucesso(),
                "msgErro" => Mensagens::getMsgErro()
            ]);
    }
}