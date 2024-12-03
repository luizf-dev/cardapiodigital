<?php

namespace   App\Models;

use App\Database\Connection;
use PDO;

class User extends Connection{

    private $id;
    private $username;
    private $password;


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

     //! Autenticar usuário verificando se os dados da base correspondem aos informados
     public function autenticarUsuario(){

        $query = "select id, username, password from tb_admin_user where username = :username";
        $stmt = $this->database->prepare($query);
        $stmt->bindValue(':username', $this->__get('username'));
        //$stmt->bindValue(':password', $this->__get('password'));
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario !== false && $usuario !== null){
            return $usuario;
        }else{
            return false;
        }
    }

    public static function verificarSessao(){

        if(isset($_SESSION['username']) && $_SESSION['username'] != ""){

            $username = $_SESSION['username'];

            return $username;

        }else{

            return false;
           /* Mensagens::setMsgErro('Efetue seu login!');

            header('Location: /cardapio_online/admin/');
            exit;*/
        }
    }

}