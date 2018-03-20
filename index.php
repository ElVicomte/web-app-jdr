<?php

  define('BASE_PATH', realpath(dirname(__FILE__)) . '/');
  require_once(BASE_PATH . 'Controleur/Routeur.php');
  require_once(BASE_PATH . 'Controleur/ControleurConnexion.php');

  session_start();


  require_once(BASE_PATH . 'Modele/Connexion.php');
  $conn = new Connexion();


  if(isset($_POST['deconnexion'])){
    $_SESSION['utilisateur-connecte'] = null;
  }
  if(isset($_POST['connexion'])){
    $bddPwd = $conn->logIn($_POST['utilisateur']);
    if(!empty($bddPwd)){
      $pwd = $bddPwd[0][0];
      if(password_verify($_POST['mdp'], $pwd)){
        $_SESSION['utilisateur-connecte'] = true;
      }
      else echo 'Mot de passe incorrect';
    }
    else echo 'Utilisateur inconnu';
  }
  if(isset($_SESSION['utilisateur-connecte'])){
    $routeur = new Routeur();
    $routeur->traiterRoute();
  }
  else{
    $ctrlAccueil = new ControleurConnexion();
    $ctrlAccueil->afficherConnexion();
  }