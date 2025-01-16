<?php
session_start();

$email = $_SESSION['login'];

require_once "../model/utilisateurDAO.class.php";
require_once "../model/amiDAO.class.php";

$utilisateurDAO = new UtilisateurDAO();
$amisDAO = new AmiDAO();

$unUtilisateur = $utilisateurDAO->getByEmail($email);

$profil['pseudo'] = $unUtilisateur->getPseudo();
$profil['email'] = $email;

// Affichage des amis
$listeAmisAcceptes = $amisDAO->getAmiAccepte($unUtilisateur->getIdUti());

// Ajout d'un ami
if (isset($_POST['ajouter'])) {
    $amisDAO->insert($ami);
}

require_once "../view/ami.view.php";
?>