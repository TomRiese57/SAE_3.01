<?php
session_start();

$email = $_SESSION['login'];
require_once "../model/utilisateurDAO.class.php";
$utilisateurDAO = new UtilisateurDAO();
$unUtilisateur = $utilisateurDAO->getByEmail($email);

$profil['pseudo'] = $unUtilisateur->getPseudo();
$profil['email'] = $email;
$profil['amis'] = $utilisateurDAO->getNbrAmi($unUtilisateur->getIdUti());;
$profil['date'] = $unUtilisateur->getDate();
$profil['classement'] = 0;
$profil['temps'] = $utilisateurDAO->getScoreTemps($unUtilisateur->getIdUti());
$profil['morts'] = $utilisateurDAO->getScoreMorts($unUtilisateur->getIdUti());

require_once "../view/profil.view.php";
?>  