<?php


namespace App\Helpers;

class Mensagens {

    const SUCESSO  = 'msgSucesso';
    const ERRO = 'msgErro';


    public static function getMsgSucesso(){
    
    $msg =  (isset($_SESSION[Mensagens::SUCESSO]) && $_SESSION[Mensagens::SUCESSO]) ? $_SESSION[Mensagens::SUCESSO] : "";           

    Mensagens::clearMsgSucesso();
    return $msg;
}

    public static function setMsgSucesso($msg){

        $_SESSION[Mensagens::SUCESSO] = $msg;
    }

    public static function clearMsgSucesso(){

        $_SESSION[Mensagens::SUCESSO] = NULL;
    }

    //! ============Mensagens de erro==========

    public static function getMsgErro(){
        
        $msg =  (isset($_SESSION[Mensagens::ERRO]) && $_SESSION[Mensagens::ERRO]) ? $_SESSION[Mensagens::ERRO] : "";           

        Mensagens::clearMsgErro();
        return $msg;
    }

    public static function setMsgErro($msg){

        $_SESSION[Mensagens::ERRO] = $msg;
    }
    
    public static function clearMsgErro(){

        $_SESSION[Mensagens::ERRO] = NULL;
    }
}