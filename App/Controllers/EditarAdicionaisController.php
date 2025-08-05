<?php 

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Produtos;
use App\Helpers\PageAdmin;


class EditarAdicionaisController {


    //= método para atualizar um adicional
    public function editarAdicionaisPage($id){

        Auth::verifyLogin();

        $connect = Sql::getDatabase();
        $produtos = new Produtos($connect);
        $adicional = $produtos->getAdicionalById($id);        

        $page = new PageAdmin();

        $page->renderPage("atualizar-adicional", [       
            "adicional" => $adicional,
            "msgErro" => Mensagens::getMsgErro()            
        ]);
    }


    //= método para atualizar um adicional
    public function editarAdicionaisPost($id){

        Auth::verifyLogin();
        
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];        
        $valorEmReais = str_replace(['.', ','], ['', '.'], $preco);
        
    
        $connect = Sql::getDatabase();

        $produtos = new Produtos($connect);

        $adicional = $produtos->getAdicionalById($id);
        $id_produto = $adicional['id_produto'];

        if($_POST['nome'] == '' || $_POST['preco'] == ''){

            Mensagens::setMsgErro('Campos em branco, não é possível atualizar!');

            header("Location: /admin/atualizar-produto/$id_produto");
            exit;
        }

        $adicional = $produtos->editarAdicional($id, $nome, $valorEmReais);

        if($adicional){

            Mensagens::setMsgSucesso('Produto atualizado com sucesso!');

            header("Location: /admin/listar-adicionais/$id_produto");
            exit;
        }else{
        
            Mensagens::setMsgErro('Não foi possível atualizar o produto!');

            header("Location: /admin/listar-adicionais/$id_produto");
            exit();
        }  
    }
}