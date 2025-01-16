<?php
session_start();

$email = $_SESSION['login'];
require_once "../model/utilisateurDAO.class.php";
require_once "../model/scoreDAO.class.php";
$utilisateurDAO = new UtilisateurDAO();
$scoreDA0 = new ScoreDAO();
$unUtilisateur = $utilisateurDAO->getByEmail($email);

$nb = 1;
$trouver = false;
foreach($scoreDA0->getClassement() as $elt)
{
    if ($elt['clast'] != $unUtilisateur->getIdUti() && $trouver == false){
        $nb += 1;
    } else{
        $trouver = true;
    }
}


$profil['pseudo'] = $unUtilisateur->getPseudo();
$profil['email'] = $email;
$profil['amis'] = $utilisateurDAO->getNbrAmi($unUtilisateur->getIdUti());
$profil['date'] = $unUtilisateur->getDate();
$profil['classement'] = $nb;
$profil['temps'] = $utilisateurDAO->getScoreTemps($unUtilisateur->getIdUti());
$profil['morts'] = $utilisateurDAO->getScoreMorts($unUtilisateur->getIdUti());

require_once "../view/profil.view.php";
?>  