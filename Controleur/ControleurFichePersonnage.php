<?php
	require_once(BASE_PATH . 'Vue/Vue.php');

	class ControleurFichePersonnage{


		public function __construct(){

		}

		public function afficher(){
			$vue = new Vue('Fiche de personnages', 'vueFiche');
			$vue->generer(array());
		}
	}