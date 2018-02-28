<?php
	require("config.php");


	abstract class DBConnect{

		private $bdd;

		protected function executerRequete($sql, $params = null){
			if($params == null){
				$r = $this->getDB()->query($sql); // exécution instant si aucune variable dans la requête
			}
			else{
				$r = $this->getDB()->prepare($sql);
				$r->execute($params);
			}
			return $r;
		}

		private function getDB(){
			$bdd = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8', USER, PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			return $bdd;
		}	
	}
	
?>