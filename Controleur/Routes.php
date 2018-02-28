<?php
	switch ($_GET['page']) {
		case 'fiche-personnage':
			$this->ctrlFichePersonnage->afficher();
			break;
		case 'ajouter-classe':
			$this->ctrlAjouterClasse->afficher();
			break;
		case 'ajouter-race':
			$this->ctrlAjouterRace->afficher();
			break;
	}