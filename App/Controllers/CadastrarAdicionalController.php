<?php

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Produtos;

class CadastrarAdicionalController{


    public function cadastrarAdicional(){

        Auth::verifyLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $connect = Sql::getDatabase(); // Sua conexão com o banco

            $id_produto = $_POST['id_produto'];
            $id_categoria = $_POST['id_categoria'];
            $nome = trim($_POST['nome']);
            $preco = $_POST['preco'];
            $valorEmReais = str_replace(['.', ','], ['', '.'], $preco);

            // Validação básica
            if (empty($id_produto) || empty($nome) || $valorEmReais === '') {
                Mensagens::setMsgErro('Preencha os campos corretamente!');
                header("Location: /admin/categorie/$id_categoria");
                exit;
            }

            // Instancia o model com a conexão
            $produtos = new Produtos($connect);

            // Define os valores via __set
            $produtos->__set('id_produto', $id_produto);
            $produtos->__set('nome', $nome);           
            $produtos->__set('preco', $valorEmReais);

            // Tenta cadastrar
            if ($produtos->cadastrarAdicional($id_produto, $nome, $preco)) {
                Mensagens::setMsgSucesso('Adicional cadastrado com sucesso!');
                header("Location: /admin/categorie/$id_categoria");
                exit;
            } else {
                Mensagens::setMsgErro('Erro ao cadastrar adicional!');
                header("Location: /admin/categorie/$id_categoria");
                exit;
            }
        }
        
    }   
}


