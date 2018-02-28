<?php

	require_once('db_connect/DBConnect.php');

	class Race extends DBConnect{

		public function __construct(){

		}
		
		public function getRaces(){
			$sql = 'SELECT * FROM race';
			$res = $this->executerRequete($sql);
			return $res->fetchAll();
		}

		public function DBAjouterRace($e){
			
		}
	}