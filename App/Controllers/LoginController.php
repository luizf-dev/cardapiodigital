<?php


namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\PageAdmin;
use App\Models\User;
use App\Helpers\Mensagens;


class LoginController {


    //= método para login do Admin
    public function loginAdminPage(){

        $page = new PageAdmin(["adminNavbar" => false, "adminFooter" => false]);

        $page->renderPage("index", [
            "msgErro" => Mensagens::getMsgErro()
        ]);
    }

    //= método para recuperar os dados de login de usuario
    public function loginAdminPost(){

        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $connect = Sql::getDatabase();
    
        $usuario = new User($connect);
    
        $usuario->__set('username', $username);
        
    
        $dadosUsuario = $usuario->autenticarUsuario();
    
        if($dadosUsuario && password_verify($password, $dadosUsuario['password'])){
            
            $_SESSION['id'] = $dadosUsuario['id'];
            $_SESSION['username'] = $dadosUsuario['username'];      
    
            header('Location: /cardapiodigital/admin/home');
            exit();
    
        }else {

            Mensagens::setMsgErro('Algo saiu mal com o login! :( ');
            header('Location: /cardapiodigital/admin');
            exit();
        } 
    }

    //= método para logout do Admin
    public function logout(){

        // limpa todas as variáveis da sessão
        session_unset();

        // destroi a sessão
        session_destroy();

        header('Location: /cardapiodigital/admin');
        exit();
    }
}