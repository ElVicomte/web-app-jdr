<?php

  require_once(BASE_PATH . 'db_connect/DBConnect.php');

  class Connexion extends DBConnect{

    public function __construct(){

    }

    public function logIn($utilisateur){
      $sql = "SELECT adminCode FROM admin WHERE adminNom=?";
      $res = $this->executerRequete($sql, array($utilisateur));
      return $res->fetchAll();
    }


  }