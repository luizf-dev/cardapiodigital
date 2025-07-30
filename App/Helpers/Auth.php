<?php

namespace App\Helpers;

use App\Helpers\Mensagens;

class Auth {

    public static function verificarSessao(){

        if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {

            return [
                'id' => $_SESSION['id_usuario'],               
                'email' => $_SESSION['email'],
                'nome_estabelecimento' => $_SESSION['nome_estabelecimento']
            ]; // retorna o ID do usuário logado

        } else {
            return false;
        }
    }

    public static function verifyLogin(){

        $idUsuario = self::verificarSessao();

        if (!$idUsuario) {
            Mensagens::setMsgErro('Efetue seu login!');
            header('Location: /admin');
            exit();
        }
    }
}
