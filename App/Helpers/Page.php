<?php

namespace App\Helpers;

use Rain\Tpl;


class Page {

    private $tpl;
    private $options = [];
    private $defaults = [
        
        "header" => true,
        "navbar" => true,
        "footer" => true,
        "footerConfig" => true,
        "data" => []
    ];

    public function __construct($opts = [], $tpl_dir = "../cardapiodigital/App/Views/cardapio/"){

        
        $this->options = array_merge($this->defaults, $opts);

        $config = [
            "tpl_dir"   => $tpl_dir,
            "cache_dir" => "../cardapiodigital/App/Views-cache/",
            "debug"     => true
        ];

        Tpl::configure($config);
        $this->tpl = new Tpl();

        $this->setData($this->options["data"]);
        
        if ($this->options["header"]) $this->tpl->draw("header");
        if ($this->options["navbar"]) $this->tpl->draw("navbar");
    }

    private function setData($data = []) {

        foreach ($data as $key => $value) {
            $this->tpl->assign($key, $value);
        }
    }

    public function renderPage($name, $data = [], $returnHTML = false) {

        $this->setData($data);         
    
        return $this->tpl->draw($name, $returnHTML);       
       
    }

    public function __destruct() {
        
        if ($this->options["footer"]) $this->tpl->draw("footer");
        if ($this->options["footerConfig"]) $this->tpl->draw("footerConfig");
    }
}