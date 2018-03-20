<?php

	require_once(BASE_PATH . 'db_connect/DBConnect.php');

	class Race extends DBConnect{

		public function __construct(){

		}

		public function getRaces(){
			$sql = 'SELECT * FROM race';
			$res = $this->executerRequete($sql);
			return $res->fetchAll();
		}

		public function DBAjouterRace($e){
			var_dump($e);
			// Ajout du nom et de la description
			$sql = "INSERT INTO race (raceNom, raceDescription) VALUES (?, ?)";
			$this->executerRequete($sql, array($e['race-nom'], $e['race-description']));

			// ID de la race ajoutée
			$sql = "SELECT MAX(idRace) as idRace FROM race";
			$last_id = $this->executerRequete($sql)->fetchAll()[0][0];

			// ID formulaire
			$idRace = strtolower(explode(' ', trim($e['race-nom']))[0]) . '-' . $last_id;
			$sql = "UPDATE race SET idString = ? WHERE idRace = ?";
			$this->executerRequete($sql, array($idRace, $last_id));

			// Lie les classes à la race
			if(!empty($e['classes'])){
				$classes = array();
				$sql = "SELECT idClasse FROM classe WHERE idString = ?";
				foreach($e['classes'] as $c){
					$classes[] = $this->executerRequete($sql, array($c))->fetchAll()[0][0];
				}
				$sql = "INSERT INTO liaison_race_classe (idClasse, idRace) VALUES (?, ?)";
				foreach($classes as $c){
					$this->executerRequete($sql, array($c, $last_id));
				}
			}

			if(!empty($e['racial'])){
				// $sql = "INSERT INTO racial (racialType, racialNom, racialDescription) VALUES (?, ?, ?)";
				// foreach($e['racial'] as $r){
				// 	$this->executerRequete($sql, array());
				// }
			}

		}
	}