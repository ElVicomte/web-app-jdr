<?php

	require_once('vue/Vue.php');
	require_once('Vue/Module.php');
	require_once('Modele/Classe.php');
	require_once('Modele/Race.php');
	require('contenu/lib/formidable/autoload.php');
	require('Controleur/ControleurEvenement.php');




	class ControleurAjouterClasse extends ControleurEvenement{

		private $classeObjet;
		private $raceObjet;
		private $cheminFichier;
		private $fichier;
		private $event;

		public function __construct(){
			$this->classeObjet = new Classe();
			$this->raceObjet = new Race();
			$this->event = '';
		}

		public function afficher(){

			$races = $this->raceObjet->getRaces();
			$classes = $this->classeObjet->getClasses('all');

			$vue = new Vue('Ajouter une classe', 'vueAjouterClasse');

			$formCSV = new Gregwar\Formidable\Form('Vue/module/formulaireImportCSV.php');
			$formCSV->setLanguage(new Gregwar\Formidable\Language\French);

			$formGeneral = new Gregwar\Formidable\Form('Vue/module/formulaireAjoutClasse.php', array('races' => $races));
			$formGeneral->setLanguage(new Gregwar\Formidable\Language\French);
			// $formGeneral->setValue('classe-nom', 'Oui');
			// $formGeneral->setValue('classe-description', 'Oui.');

			if(isset($_POST['ajouter-csv']) && $formCSV->posted()){
				$errors = $formCSV->check();
				if(empty($errors)){
					$this->fichier = basename($_FILES['import-csv']['name']);
					if($this->verifierFichier()){
						$classes = $this->lireCSV();
						foreach($classes as $classe){
							$this->classeObjet->DBAjouterClasse($classe);
						}
						unlink('contenu/import/' . $this->fichier);
					}
				}
			}
			else if(isset($_POST['ajouter-classe']) && $formGeneral->posted()){
				$errors = $formGeneral->check();
				if(empty($errors)){
					$this->classeObjet->DBAjouterClasse($formGeneral->getValues());
					$this->event = $this->messageEvenement('success', 'La classe ? a été ajouté.', array($formGeneral->getValue('classe-nom')));				}
				else{
					$this->event = $this->messageEvenement('danger', 'Erreur');
				}
			}
			$classes = $this->classeObjet->getClasses('all');
			$vue->generer(array("classes" => $classes, "formulaireGeneral" => $formGeneral, "formulaireCSV" => $formCSV, "evenement" => $this->event));
		}

		public function verifierFichier(){ // Vérifie la correspondance du fichier et retourne si l'upload s'est fait
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

		public function lireCSV(){
			$fichierCSV = fopen('contenu/import/' . $this->fichier, 'r');
			$actuel = true;
			$ret = array();
			while($tab = fgetcsv($fichierCSV, 1024, ',')){
				if($tab[0] == "nouveau"){
					if(!empty($arr)){
						$arr['sort'] = $sorts;
						array_push($ret, $arr);
					}
					$sorts = $sort = $arr = array();
					$actuel = true;
				}
				else{
					if($actuel){
						if($tab[1] == "nom") $arr['classe-nom'] = $tab[2];
						else if ($tab[1] == "description") $arr['classe-description'] = $tab[2];
						else $actuel = false;
					}
					else{
						if($tab[1] == "nom") $sort['sort-nom'] = $tab[2];
						else if($tab[1] == "description") $sort['sort-description'] = $tab[2];
						else if($tab[1] == "sort") array_push($sorts, $sort);
					}
				}
			}
			$arr['sort'] = $sorts;
			array_push($ret, $arr);
			return $ret;		}
	}