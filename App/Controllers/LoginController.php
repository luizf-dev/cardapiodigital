<?php


namespace App\Controllers;

use App\Database\Sql;
use App\Helpers\PageAdmin;
use App\Models\User;
use App\Helpers\Mensagens;


class LoginController {


    //= método para login do Admin
    public function loginAdminPage(){

        /*$senhaDigitada = '123456';

        // Hash correspondente à senha '123', gerado com password_hash
        $hashSalvoNoBanco = password_hash($senhaDigitada, PASSWORD_DEFAULT);

        // Verificando se a senha está correta
        if (password_verify($senhaDigitada, $hashSalvoNoBanco)) {
            echo "Senha correta!<br>" . $hashSalvoNoBanco;
        } else {
            echo "Senha incorreta!";
        }*/

        

        $page = new PageAdmin(["adminNavbar" => false, "adminFooter" => false]);

        $page->renderPage("index", [
            "msgErro" => Mensagens::getMsgErro()
        ]);
    }

    //= Método para processar o login do admin via e-mail
    public function loginAdminPost() {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $connect = Sql::getDatabase();

        $usuario = new User($connect);

        $usuario->__set('email', $email);

        $dadosUsuario = $usuario->autenticarUsuario();

        if ($dadosUsuario && password_verify($password, $dadosUsuario['password'])) {

            // Salvando dados essenciais na sessão
            $_SESSION['id_usuario'] = $dadosUsuario['id'];            
            $_SESSION['nome_estabelecimento'] = $dadosUsuario['nome_estabelecimento'];           

            header('Location: /admin/categories');
            exit();

        } else {
            Mensagens::setMsgErro('Algo saiu mal com o login!');
            header('Location: /admin');
            exit();
        }
    }


    //= método para logout do Admin
    public function logout(){

        // limpa todas as variáveis da sessão
        session_unset();

        // destroi a sessão
        session_destroy();

        header('Location: /admin');
        exit();
    }
}