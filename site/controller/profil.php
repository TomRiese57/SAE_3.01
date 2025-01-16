<?php
session_start();

$email = $_SESSION['login'];
require_once "../model/utilisateurDAO.class.php";
require_once "../model/scoreDAO.class.php";
$utilisateurDAO = new UtilisateurDAO();
$scoreDA0 = new ScoreDAO();
$unUtilisateur = $utilisateurDAO->getByEmail($email);
var_dump($unUtilisateur->getIdUti());

$profil['pseudo'] = $unUtilisateur->getPseudo();
$profil['email'] = $email;
$profil['amis'] = $utilisateurDAO->getNbrAmi($unUtilisateur->getIdUti());
$profil['date'] = $unUtilisateur->getDate();
$profil['classement'] = $utilisateurDAO->getClassement($unUtilisateur->getIdUti());
$profil['temps'] = $utilisateurDAO->getScoreTemps($unUtilisateur->getIdUti());
$profil['morts'] = $utilisateurDAO->getScoreMorts($unUtilisateur->getIdUti());

require_once "../view/profil.view.php";
?>  