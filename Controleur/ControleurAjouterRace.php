<?php

	require_once(BASE_PATH . 'Vue/Vue.php');
	require_once(BASE_PATH . 'Vue/Module.php');
	require_once(BASE_PATH . 'Modele/Classe.php');
	require_once(BASE_PATH . 'Modele/Race.php');
	require_once(BASE_PATH . 'contenu/lib/formidable/autoload.php');
	require_once(BASE_PATH . 'Controleur/ControleurEvenement.php');


	class ControleurAjouterRace extends ControleurEvenement{

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

			$formGeneral->setValue('race-nom', 'Une Race');
			$formGeneral->setValue('race-description', 'Une description de race très complète');

			if(isset($_POST['ajouter-csv']) && $formCSV->posted()){
				$errors = $formCSV->check();
				if(empty($errors)){
					$this->fichier = basename($_FILES['import-csv']['name']);
					if($this->verifierFichier()){
						// $classeCSV = $this->lireCSV();
						// foreach($classeCSV as $classe){
						// 	$this->classeObjet->DBAjouterClasse($classe);
						// }
						// unlink('contenu/import/' . $this->fichier);
					}
				}
			}

			else if(isset($_POST['ajouter-race']) && $formGeneral->posted()){
				echo 'lol';
				$errors = $formGeneral->check();
				if(empty($errors)){
					$this->raceObjet->DBAjouterRace($formGeneral->getValues());
					$this->event = $this->messageEvenement('success', 'La classe ? a été ajouté.', array($formGeneral->getValue('race-nom')));
				}
				// else{
				// 	$this->event = $this->messageEvenement('danger', 'Impossible d\'ajouter cette classe');
				// }
			}

			$classes = $this->classeObjet->getClasses('all');
			$vue->generer(array("races" => $races, "formulaireGeneral" => $formGeneral, "formulaireCSV" => $formCSV, "evenement" => $this->event));
		}



		public function verifierFichier(){ // Vérifie la correspondance du fichier et retourne si l'upload s'est effectué correctement
			$fichierExtension = strtolower(pathinfo($this->fichier, PATHINFO_EXTENSION));
			if($fichierExtension == "csv"){
				if(move_uploaded_file($_FILES['import-csv']['tmp_name'], 'contenu/import/' . $this->fichier)){
					$this->event = $this->messageEvenement('success', 'Le fichier "?" a été importé avec succès.', array($this->fichier));
					return true;
				}
				else{
					$this->event = $this->messageEvenement('danger', 'Erreur lors de l\import du fichier ?.', array($this->fichier));
					return false;
				}
			}
			else{
				$this->event = $this->messageEvenement('danger', 'Veuillez choisir un fichier CSV.');
				return false;
			}
		}
	}