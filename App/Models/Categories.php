<?php

namespace App\Models;


use App\Database\Connection;
use PDO;
use PDOException;

class Categories extends Connection{

    private $id_categoria;
    private $nome_categoria;
    private $status;
    private $exibir_na_home;

    //!método mágico getter 
    public function __get($atributo){
        return $this->$atributo;
    }

    //!método mágico setter
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    //!método para listar todas as categorias
    public function listarCategorias(){

        $query = "select * from tb_categories";
        $stmt = $this->database->prepare($query);
        $stmt->execute();

        if($stmt-> rowCount() > 0){
            $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }

        return $categorias;
    } 

    //! método para listar as categorias ativas
    public function listarCategoriasAtivas(){

        $query = "select * from tb_categories where status = 'Ativo'";
        $stmt = $this->database->prepare($query);
        $stmt->execute();

        if($stmt-> rowCount() > 0){
            $categoriasAtivas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }

        return $categoriasAtivas;
    }

    //!método para pegar o nome de uma categoria 
    public function getNomeCategoria($id_categoria){
        $query = "SELECT nome_categoria FROM tb_categories WHERE id_categoria = :id_categoria";
        $stmt = $this->database->prepare($query);
        $stmt->bindValue(':id_categoria', $id_categoria);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['nome_categoria'];
    }


    //! método para cadastrar uma nova categoria
    public function cadastrarCategoria(){

        try{
            $query = "insert into tb_categories (nome_categoria, status, exibir_na_home) values (:nome_categoria, :status, :exibir_na_home)";
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':nome_categoria', $this->__get('nome_categoria'));
            $stmt->bindValue(':status', $this->__get('status'));
            $stmt->bindValue(':exibir_na_home', $this->__get('exibir_na_home'));

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }

        }catch(PDOException $e){

            return "Erro no banco de dados: " . $e->getMessage();
        }
    }

    //!método para trazer os detalhes de uma categoria com base no seu id
    public function detalhesCategoria($id_categoria){
        
        $query = "select id_categoria, nome_categoria, status, exibir_na_home from tb_categories where id_categoria = :id_categoria";
        $stmt = $this->database->prepare($query);
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return null;
        //! Retornar null em caso de erro ou nenhum resultado encontrado
    }

    //! método para atualizar uma categoria
    public function atualizarCategoria($id_categoria, $nome_categoria, $status, $exibir_na_home){

        try {
            $query = "update tb_categories set nome_categoria = :nome_categoria, status = :status, exibir_na_home = :exibir_na_home where id_categoria = :id_categoria";

            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':id_categoria', $id_categoria);
            $stmt->bindValue(':nome_categoria', $nome_categoria);
            $stmt->bindValue(':status', $status);
            $stmt->bindValue(':exibir_na_home', $exibir_na_home);

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

    //! método para deletar uma categoria
    public function deletarCategoria($id_categoria){

        try {
            $query = "delete from tb_categories where id_categoria = :id_categoria";
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(':id_categoria', $id_categoria);
            $stmt->execute();
            $result = $stmt->rowCount();

            if($result == 0){
                return false;
            }

            return true;

        } catch (PDOException $e) {
            
            return "Erro no banco de dados " . $e->getMessage();
        }
    }    
}


