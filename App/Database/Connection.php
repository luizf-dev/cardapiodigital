<?php

namespace App\Database; 
use PDO;

class Connection {

    protected $database;

    public function __construct(PDO $database){
        
        $this->database = $database;
    }
}