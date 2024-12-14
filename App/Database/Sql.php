<?php

namespace App\Database;
use PDO;
use PDOException;

class Sql {

    const HOSTNAME = "mysql835.umbler.com";
	const USERNAME = "cardapio_admin";
	const PASSWORD = "userEpicFood";
	const DBNAME = "db_cardapio";


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