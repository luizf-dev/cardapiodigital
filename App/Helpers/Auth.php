<?php

namespace App\Helpers;

use App\Helpers\Mensagens;
use App\Models\User;

class Auth {

    public static function verificarSessao(){

        if(isset($_SESSION['username']) && $_SESSION['username'] != ""){

            $username = $_SESSION['username'];

            return $username;

        }else{

            return false;
        }
    }

    public static function verifyLogin(){

        $user = Auth::verificarSessao();

        if(!$user){

            Mensagens::setMsgErro('Efetue seu login!');            
            header('Location: /cardapiodigital/admin');
            exit();
        }
    }
}