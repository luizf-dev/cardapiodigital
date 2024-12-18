<?php

namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\PageAdmin;
use App\Helpers\Mensagens;
use App\Helpers\Auth;
use App\Models\Produtos;


class CadastrarImagemController {

    //= método para cadastrar uma imagem ao produto
    public function cadastrarImagemPage($id){

        Auth::verifyLogin();
    
        $connect = Sql::getDatabase();
    
        $produto = new Produtos($connect);
    
        $detalhesProduto = $produto->detalhesProduto($id);    
    
        $page = new PageAdmin();
    
        $page->renderPage('cadastrar-imagem', [
    
            "produtos" => $detalhesProduto,
            "msgErro"  => Mensagens::getMsgErro()
        ]);
    }

    //= método post para cadastrar uma imagem ao produto
    public function cadastrarImagemPost($id){

        //= Define o fuso horário para o Brasil
        date_default_timezone_set('America/Sao_Paulo'); 

        Auth::verifyLogin();

        $imagem = $_FILES['imagem'];

        $connect = Sql::getDatabase();
        $produto = new Produtos($connect);
        $detalhesProduto = $produto->detalhesProduto($id);
        $id_categoria = $detalhesProduto['id_categoria'];

        //= obtem a extensao do arquivo
        $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);    

        //= adiciona uma data de cadastro para a imagem
        $data = date('dmYHis');

        //= verifica se a extensão da imagem é válida(jpeg, jpg, png);
        $extensoesPermitidas = ['jpeg', 'jpg', 'png'];
        if(!in_array(strtolower($extensao), $extensoesPermitidas)){
            
            Mensagens::setMsgErro('Apenas arquivos JPEG, JPG e PNG são permitidos!');
            header("Location: /admin/cadastrar-imagem/$id");
            exit;
        }

        //= renomeia a imagem com o id do produto correspondente
        $novoNomeImagem = 'imagemProduto'.$id.'-'.$data.'.'.$extensao;    

        //= caminho completo com o novo nome do arquivo
        $urlArquivo = "./assets/img/uploads/$novoNomeImagem";

        //=caminho da pasta uploads
         $urlPastaUploads = './assets/img/uploads/';

        //=consulta o banco de dados para ver se já existe uma imagem com o id do produto
        $imagemAnterior = $produto->obterNomeImagem($id);
        

        //= quebra a string do nome da imagem anterior usando o hifen '-' como delimitador
        $stringImagemAnterior = explode('-', $imagemAnterior);

        //= obtem apenas o nome do arquivo anterior sem a extensão
        $nomeImagemAnterior = implode('-', array_slice($stringImagemAnterior, 0, -1));

        //= quebra a string do nome da imagem atual usando o hifen '-' como delimitador
        $stringImagemAtual = explode('-', $novoNomeImagem);
        
        //= obtem apenas o nome do arquivo atual sem a extensão
        $nomeImagemAtual = implode('-', array_slice($stringImagemAtual, 0, -1));
            

        //= compara os nomes do arquivos exclui a imagem anterior se existir para evitar encher a pasta de uploads
        if($nomeImagemAnterior == $nomeImagemAtual){

            $imagemAnteriorPath = $urlPastaUploads . $imagemAnterior;

            if(file_exists($imagemAnteriorPath)){
                unlink($imagemAnteriorPath);
            }
        }

        //= Move a nova imagem para a pasta de uploads
        $movidoComSucesso =  move_uploaded_file($_FILES['imagem']['tmp_name'], $urlArquivo );       

    
        if(!$movidoComSucesso){
            Mensagens::setMsgErro('Erro ao mover a imagem!');
        }
        
        //= cadastra a string com o nome da imagem no banco de dados
        if($produto->cadastrarImagem($id, $novoNomeImagem)){

            Mensagens::setMsgSucesso('A imagem foi cadastrada com sucesso!');
            header("Location: /admin/categorie/$id_categoria");
            exit;

        }else{

            Mensagens::setMsgErro('Erro ao cadastrar a imagem!');
            header("Location: /admin/categorie/$id_categoria");
            exit;
        } 
    }



}