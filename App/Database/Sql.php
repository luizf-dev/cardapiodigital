<?php

namespace App\Database;
use PDO;
use PDOException;

class Sql {

    const HOSTNAME = "sql108.infinityfree.com";
	const USERNAME = "if0_37899221";
	const PASSWORD = "JUT9QYu5vMCuoN";
	const DBNAME = "if0_37899221_db_cardapioDigital";


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