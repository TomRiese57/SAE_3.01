<?php
session_start();

require_once "../model/utilisateurDAO.class.php";
require_once "../model/amiDAO.class.php";
require_once "../model/scoreDAO.class.php";

// Instanciation des DAO
$utilisateurDAO = new UtilisateurDAO();
$amisDAO = new AmiDAO();
$scoreDAO = new ScoreDAO();

// Récupération de l'utilisateur connecté
$email = $_SESSION['login'];
$unUtilisateur = $utilisateurDAO->getByEmail($email);

// Instanciation des données du profil
$profil['pseudo'] = $unUtilisateur->getPseudo();
$profil['email'] = $email;

// Récupérer les données de classement
$top10MeilleursTemps = $scoreDAO->getTop10();
$nombreMortsTotales = $scoreDAO->getNbrMortsTotales();
$nombreTempsTotals = $scoreDAO->getNbrTempsTotals();
$meilleurTempsJour = $scoreDAO->getTopTempsJour();
$nombreMortsJour = $scoreDAO->getNbrMortsJour();
$nombreTempsJour = $scoreDAO->getNbrTempsJour();

require_once "../view/classement.view.php";
?>