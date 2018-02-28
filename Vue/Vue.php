<?php
	
	class Vue{

		private $_fichier;
		private $_titre;

		public function __construct($titre, $action){
			$this->_fichier = 'Vue/vuePage/' . $action . '.php';
			$this->_titre = $titre;
		}

		public function generer($donnees){
			// Prend pour paramètre une array contenant les variables à placer dans la page
			// La vue traite les variables depuis $donnees
			$contenu = $this->genererFichier($this->_fichier, $donnees);
			$vue = $this->genererFichier('Vue/mainTemplate.php', array('titre' => $this->_titre, 'contenu' => $contenu));
			echo $vue;
		}


		public function genererFichier($fichier, $donnees){
			if(file_exists($fichier)){
				extract($donnees);
				ob_start();
				require $fichier;
				return ob_get_clean();
			}
			else{
				throw new Exception("Fichier " . $fichier . " introuvable");
			}
		}
	}
?>