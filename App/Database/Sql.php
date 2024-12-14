<?php

namespace App\Database;
use PDO;
use PDOException;

class Sql {

    const HOSTNAME = "mysql835.umbler.com";
	const USERNAME = "epicfood";
	const PASSWORD = "dbtestecardapio";
	const DBNAME = "db_cardapio_test";


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