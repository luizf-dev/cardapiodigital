<?php

namespace App\Models;

use App\Database\Connection;
use PDO;
use PDOException;

class  Produtos extends Connection{

    private  $id;
    private  $nome;
    private  $descricao;
    private  $preco;
    private  $imagem;
    private  $id_categoria;
    private $status;


    //!método getter mágico
    public function __get($atributo){

        return $this->$atributo;
    }

    //!método setter mágico
    public function __set($atributo, $valor){

        $this->$atributo = $valor;
    }

    //! método listar todos os Produtos
    public function listarProdutos(){

        $query = "select * from tb_produtos where status == ativo";
        $stmt = $this->database->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() > 0){

            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{

            return false;
        }

        return $produtos;
    }


    //!método para listar os produtos por categoria no cardapio
    public function listarProdutosPorCategoria($id_categoria){
        try{
            
            $query = "select * from tb_produtos where id_categoria = :id_categoria && status = 'ativo'";
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':id_categoria', $id_categoria);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return [];
            }
        }catch(PDOException $e){
            echo "Erro ao listar produtos: " . $e->getMessage();
            return [];            
        }
    } 


    //!método para listar os produtos de uma categoria na home do cardapio, se o usuario definir a opcao exibir na home como true
    public function listarProdutosNaHome(){
        try {
            $query = "
                select 
                    p.id,
                    p.nome,
                    p.descricao,
                    p.preco,
                    p.imagem,
                    p.id_categoria,
                    c.nome_categoria
                    from
                tb_produtos p
                    inner join 
                tb_categories c
                    on
                p.id_categoria = c.id_categoria
                    where 
                c.exibir_na_home = 1
                    and p.status = 'ativo'
                    and c.status = 'ativo'
                order by
                c.nome_categoria, p.nome;
            ";

            $stmt = $this->database->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //!agrupa os produtos por categoria
            $produtosAgrupados = [];

            foreach($result as $produto){
                $nomeCategoria = $produto['nome_categoria'];

                if(!isset($produtosAgrupados[$nomeCategoria])){
                    $produtosAgrupados[$nomeCategoria] = [];
                }
                $produtosAgrupados[$nomeCategoria][] = $produto;
            }

            return $produtosAgrupados;

        } catch (PDOException $e) {

            echo "Erro ao listar produtos para a home: " . $e->getMessage();
            return [];
        }
    }

    //!método para listar os produtos por categoria no dashboard Admin
    public function listarProdutosPorCategoriaAdmin($id_categoria){
        try{
            
            $query = "select * from tb_produtos where id_categoria = :id_categoria";
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':id_categoria', $id_categoria);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return [];
            }
        }catch(PDOException $e){
            echo "Erro ao listar produtos: " . $e->getMessage();
            return [];            
        }
    }

    //!método para cadastrar um novo produto
    public function cadastrarProduto(){
        try {
            $query = "insert into tb_produtos (nome, descricao, preco, imagem, id_categoria, status ) VALUES (:nome, :descricao, :preco, :imagem, :id_categoria, :status)";
    
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':nome', $this->__get('nome'));
            $stmt->bindValue(':descricao', $this->__get('descricao'));
            $stmt->bindValue(':preco', $this->__get('preco'));
            $stmt->bindValue(':imagem', $this->__get('imagem'));            
            $stmt->bindValue(':id_categoria', $this->__get('id_categoria'));
            $stmt->bindValue(':status', $this-> __get('status'));
    
            if ($stmt->execute()) {

                return true;

            } else {

                return false;
            }
        } catch (PDOException $e) {
            
            return "Erro no banco de dados: " . $e->getMessage();
        }
    }  
    
    //! método que traz os detalhes dos produtos com base em seu id
    public function detalhesProduto($id) {

        $query = "select id, nome, preco, imagem, descricao, id_categoria, status  FROM tb_produtos WHERE id = :id";
        $stmt = $this->database->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        return null;
        //! Retornar null em caso de erro ou nenhum resultado encontrado
    }

    //!método para atualizar produtos
    public function atualizarProduto($id, $nome, $descricao, $preco, $id_categoria, $status){

        try {
            $query = "update tb_produtos set nome = :nome, descricao = :descricao, preco = :preco , id_categoria = :id_categoria, status = :status WHERE id = :id";
    
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':descricao', $descricao);
            $stmt->bindValue(':preco', $preco);
            //$stmt->bindValue(':imagem', $imagem);            
            $stmt->bindValue(':id_categoria', $id_categoria);
            $stmt->bindValue(':status', $status);
            $stmt->execute();
    
            $result = $stmt->rowCount();

            if($result == 0){

                return false;
            }

            return true;

        } catch (PDOException $e) {
            return "Erro no banco de dados: " . $e->getMessage();
        }
    }

    //! método para deletar produtos
    public function deletarProduto($id){
        try {
            $query = 'DELETE FROM tb_produtos WHERE id = :id';
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $result = $stmt->rowCount();

            if($result == 0){

                return false;
            }
            
            return true;

        } catch (PDOException $e) {
            return "Erro no banco de dados: " . $e->getMessage();
        }
    }

    //! método cadastrar uma imagem para o produto
    public function cadastrarImagem($id, $imagem){

        $query = 'UPDATE tb_produtos SET imagem = :imagem WHERE id = :id';
        $stmt = $this->database->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':imagem', $imagem);
        $stmt->execute();

        $result = $stmt->rowCount();

        if($result == 0){
            return false;
        }

        return true;
    }

    //!método para verificar se existe imagem associada ao id do produto cadastrada no banco, caso exista e, se a imagem do produto for alterada, o controller irá remover a imagem antiga da pasta de uploads se não existir imagem com id associado, retorna o valor da imagem padrao cadastrada
    public function obterNomeImagem($id){
        try {

            $query = "SELECT imagem, id_categoria FROM tb_produtos WHERE id = :id";
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result && isset($result['imagem'])){
                return $result['imagem'];
            }else{
                return 'imagem-padrao.jpeg';
            }       
        } catch (PDOException $e) {
            
            return "Erro no banco de dados: " . $e->getMessage();
        }
    }
    
}

