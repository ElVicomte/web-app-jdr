<?php

	require_once('db_connect/DBConnect.php');

	class Classe extends DBConnect{

		public function __construct(){

		}
		
		public function getClasses($complements = null){
			// if(isset($complements)){
				$sql = "
					SELECT idString, classeNom, classeDescription, sortNom, raceNom
					FROM classe c
					LEFT JOIN sort s ON s.idClasse=c.idClasse
					LEFT JOIN liaison_race_classe l ON l.idClasse=c.idClasse
					LEFT JOIN race r ON r.idRace=l.idRace
				";
			// 	$res = $this->executerRequete($sql, array())->fetchAll();
			// 	// print_r($res);
			// 	return $res;
			// }
			// else{
				$sql = "SELECT * FROM classe";
				$res = $this->executerRequete($sql);
				return $res->fetchAll();	
			// }
		}

		public function DBAjouterClasse($e){
			// Ajout du nom et de la description
			$sql = "INSERT INTO classe (classeNom, classeDescription) VALUES (?, ?)";
			$this->executerRequete($sql, array($e['classe-nom'], $e['classe-description']));

			// ID de la classe ajoutée
			$sql = "SELECT MAX(idClasse) as idClasse FROM classe";
			$last_id = $this->executerRequete($sql)->fetchAll()[0][0];

			//
			$idClasse = strtolower(explode(' ', trim($e['classe-nom']))[0]) . '-' . $last_id;
			$sql = "UPDATE classe SET idString = ? WHERE idClasse = ?";
			$this->executerRequete($sql, array($idClasse, $last_id));

			// Lie les races à la classe
			if(isset($e['races'])){	
				$races = array();
				$sql = "SELECT idRace FROM race WHERE idString = ?";
				foreach($e['races'] as $r){
					$races[] = $this->executerRequete($sql, array($r))->fetchAll()[0][0];
				}
				$sql = "INSERT INTO liaison_race_classe (idRace, idClasse) VALUES (?, ?)";
				foreach($races as $r){
					$this->executerRequete($sql, array($r, $last_id));
				} 
			}

			// Ajout des sorts
			$sql = "INSERT INTO sort (idClasse, sortNom, sortDescription) VALUES (?, ?, ?)";
			foreach ($e['sort'] as $s) {
				$this->executerRequete($sql, array($last_id, $s['sort-nom'], $s['sort-description']));
			}
		}
	}