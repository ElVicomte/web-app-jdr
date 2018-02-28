<?php

	require_once('vue/Vue.php');
	require_once('Vue/Module.php');
	require_once('Modele/Classe.php');
	require_once('Modele/Race.php');
	require('contenu/lib/formidable/autoload.php');


	class ControleurAjouterRace{
		
		public function __construct(){

		}

		public function afficher(){
			$vue = new Vue('Ajouter une race', 'vueAjouterRace');
			$vue->generer(array());
		}
	}