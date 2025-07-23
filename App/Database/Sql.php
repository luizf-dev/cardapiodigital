<?php

namespace App\Database;
use PDO;
use PDOException;

class Sql {

    const HOSTNAME = "srv1897.hstgr.io";
	const USERNAME = "u895071941_cardapio";
	const DBNAME = "u895071941_db_cardapio";
	const PASSWORD = "Bfg4fgl37";
	


    public static function getDatabase() {

		try{
			$connect = new PDO(
				"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
				Sql::USERNAME,
				Sql::PASSWORD);

			return $connect;

		}catch (PDOException $error) {
			
			echo 'Erro ao conectar ao banco de dados: ' . $error->getMessage();
		}
	}
}