<?php
	session_start();
	require 'controleur/Routeur.php';

	$routeur = new Routeur();
	$routeur->traiterRoute();