<?php

namespace App\Helpers;

use App\Helpers\Mensagens;
use App\Models\User;

class Auth {

    public static function verifyLogin(){

        $user = User::verificarSessao();

        if(!$user){
            Mensagens::setMsgErro('Efetue seu login!');
            header('Location: /cardapio_online/admin/');
            exit;
        }
    }
}