<?php
session_start();

$email = $_SESSION['login'];
require_once "../model/utilisateurDAO.class.php";
$utilisateurDAO = new UtilisateurDAO();
$unUtilisateur = $utilisateurDAO->getByEmail($email);

$profil['pseudo'] = $unUtilisateur->getPseudo();
$profil['email'] = $email;

require_once "../view/accueil.view.php";
?>