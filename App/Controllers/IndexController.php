<?php

namespace App\Controllers;
use App\Helpers\Page;


class IndexController {

    public function index(){

        $page = new Page();
        $page->renderPage("index");
    }

}