<?php

  require_once(BASE_PATH . 'Vue/Vue.php');
  require_once(BASE_PATH . 'Controleur/Routeur.php');


  class ControleurConnexion{

    public function __construct(){

    }

    public function afficherConnexion(){

      $vue = new Vue('Connexion', 'vueConnexion');
      $pageConnexion = $vue->genererFichier(BASE_PATH . 'Vue/vuePage/vueConnexion.php', array());
      echo $pageConnexion;

    }

  }