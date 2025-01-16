<?php
session_start();

$idUti = $_SESSION['id'];
$email = $_SESSION['login'];
$amiAdd['pseudo'] = isset($_POST['idAmiAjout']) ? $_POST['idAmiAjout'] : null;
$message = '';

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
    $uti2 = $utilisateurDAO->getByPseudo($amiAdd['pseudo']);
    var_dump($uti2);
    if ($utilisateurDAO->existe($uti2->getIdUti())) {
        $ami = new Ami($unUtilisateur, $uti2);
        var_dump($ami);
        $amisDAO->insert($ami);
        $message = "<p>Une demande d'ami a été envoyé</p>";
    } else {
        $message = "<p>Pseudo inconnu. Essayez à nouveau.</p>";
    }
}

require_once "../view/ami.view.php";
?>