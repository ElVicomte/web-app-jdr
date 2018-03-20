<?php

	require_once(BASE_PATH . 'Vue/Vue.php');

	class ControleurAccueil{

		public function __construct(){

		}

		public function afficher(){
			$vue = new Vue('Accueil', 'vueAccueil');
			$vue->generer(array());
		}
	}