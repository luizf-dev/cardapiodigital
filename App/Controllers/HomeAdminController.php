<?php

namespace App\Controllers;

use App\Helpers\Auth;
use App\Helpers\PageAdmin;

class HomeAdminController {


    //= método para a página home do Admin
    public function homeAdmin(){

        Auth::verifyLogin();

        $username = $_SESSION['nome_estabelecimento'];
        

        $page = new PageAdmin();
        $page->renderPage("home", [
           "username" => $username,           
        ]);
    }
}