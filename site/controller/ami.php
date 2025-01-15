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

$listeAmis = $amisDAO->getByIdUti($unUtilisateur->getIdUti());

$amisDetailsArray = [];  // Un tableau pour stocker les détails de tous les amis
foreach ($listeAmis as $ami) {
    // Obtenez les détails de chaque ami
    $pseudo = $ami->getUti2()->getPseudo();
    $email = $ami->getUti2()->getEmail();
    $status = $ami->getStatus()->value;

    // Ajoutez ces détails dans le tableau
    $amisDetailsArray[] = [
        'pseudo' => $pseudo,
        'email' => $email,
        'status' => $status,
    ];
}

if (isset($_POST['ajouter'])) {
    $amisDAO->insert($ami);
}

require_once "../view/ami.view.php";
?>