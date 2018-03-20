<?php

	require(BASE_PATH . 'Controleur/ControleurAccueil.php');
	require(BASE_PATH . 'Controleur/ControleurFichePersonnage.php');
	require(BASE_PATH . 'Controleur/ControleurAjouterClasse.php');
	require(BASE_PATH . 'Controleur/ControleurAjouterRace.php');

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
					require(BASE_PATH . 'Controleur/Routes.php');
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