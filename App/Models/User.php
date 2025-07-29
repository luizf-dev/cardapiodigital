<?php

namespace App\Models;

use App\Database\Connection;
use PDO;

class User extends Connection {

    private $id;
    private $password;
    private $email;
    private $telefone;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

    //! Autenticar usuário com base no e-mail
    public function autenticarUsuario(){

        $query = "SELECT id, email, password FROM tb_usuarios WHERE email = :email";
        $stmt = $this->database->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario !== false && $usuario !== null){
            return $usuario;
        } else {
            return false;
        }
    }
}
