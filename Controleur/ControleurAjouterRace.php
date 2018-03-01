<?php

	require_once('vue/Vue.php');
	require_once('Vue/Module.php');
	require_once('Modele/Classe.php');
	require_once('Modele/Race.php');
	require('contenu/lib/formidable/autoload.php');


	class ControleurAjouterRace{

		private $classeObjet;
		private $raceObjet;
		private $event;

		public function __construct(){
			$this->classeObjet = new Classe();
			$this->raceObjet = new Race();
			$this->event = '';

		}

		public function afficher(){

			$races = $this->raceObjet->getRaces();
			$classes = $this->classeObjet->getClasses('all');

			$vue = new Vue('Ajouter une race', 'vueAjouterRace');


			$formCSV = new Gregwar\Formidable\Form('Vue/module/formulaireImportCSV.php');
			$formCSV->setLanguage(new Gregwar\Formidable\Language\French);

			$formGeneral = new Gregwar\Formidable\Form('Vue/module/formulaireAjoutRace.php', array('classes' => $classes));
			$formGeneral->setLanguage(new Gregwar\Formidable\Language\French);



			$vue->generer(array("races" => $races, "formulaireGeneral" => $formGeneral, "formulaireCSV" => $formCSV, "evenement" => $this->event));
		}
	}