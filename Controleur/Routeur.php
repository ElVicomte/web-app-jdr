<?php

	require('ControleurAccueil.php');
	require('ControleurFichePersonnage.php');
	require('ControleurAjouterClasse.php');
	require('ControleurAjouterRace.php');

	class Routeur{

		private $ctrlAccueil;
		private $ctrlFichePersonnage;
		private $ctrlAjouterClasse;
		private $ctrlAjouterRace;

		public function __construct(){
			$this->ctrlAccueil = new ControleurAccueil();
			$this->ctrlFichePersonnage = new ControleurFichePersonnage();
			$this->ctrlAjouterClasse = new ControleurAjouterClasse();
			$this->ctrlAjouterRace = new ControleurAjouterRace();
		}

		public function traiterRoute(){
			try{
				if(isset($_GET['page'])){
					require('Controleur/Routes.php');
				}
				else{
					$this->ctrlAccueil->afficher();
				}
			}
			catch(Exception $e){
				echo 'Chemin introuvable : ' . $e;
			}
		}
	}	