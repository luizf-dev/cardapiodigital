<?php

namespace App\Helpers;
use Rain\Tpl;

class PageAdmin {

    private $tpl;
    private $options = [];
    private $defaults = [

        "adminHeader"=>true,
        "adminNavbar"=>true,
        "adminFooter"=>true,
        "adminFooterConfig"=>true,
        "data"=>[]
    ];

    public function __construct($opts = [], $tpl_dir = "App/Views/admin/"){

        $this->options = array_merge($this->defaults, $opts);

        
        $config = [
            "tpl_dir"=> $tpl_dir,
            "cache_dir"=> "App/Views-cache/",
            "debug"=>true
        ];

        Tpl::configure($config);

        $this->tpl = new Tpl;

        $this->setData($this->options["data"]);

        if($this->options["adminHeader"] == true) $this->tpl->draw("adminHeader");

        if($this->options["adminNavbar"] == true) $this->tpl->draw("adminNavbar"); 
    }

    private function setData($data = []){

        foreach($data as $key => $value){
            $this->tpl->assign($key, $value);
        }
    }
   
    public function renderPage($name, $data = [], $returnHTML = false){

        $this->setData($data);   
        
        return $this->tpl->draw($name, $returnHTML);
    }

    public function __destruct(){
     
        if ($this->options['adminFooter'] == true) $this->tpl->draw("adminFooter");
        if($this->options["adminFooterConfig"] == true) $this->tpl->draw("adminFooterConfig");
    }    
}