<?php
session_start();

$idUti = $_SESSION['id'];
$email = $_SESSION['login'];
$amiAdd['pseudo'] = isset($_POST['idAmiAjout']) ? $_POST['idAmiAjout'] : null;
$message = '';

require_once "../model/utilisateurDAO.class.php";
require_once "../model/amiDAO.class.php";

$utilisateurDAO = new UtilisateurDAO();
$amiDAO = new AmiDAO();

$unUtilisateur = $utilisateurDAO->getByEmail($email);

$profil['pseudo'] = $unUtilisateur->getPseudo();
$profil['email'] = $email;

// Affichage des amis
$listeAmisAcceptes = $amiDAO->getAmiAccepte($unUtilisateur->getIdUti());

// Ajout d'un ami
if (isset($_POST['ajouter'])) {
    $uti2 = $utilisateurDAO->getByPseudo($amiAdd['pseudo']);
    if ($utilisateurDAO->existe($uti2->getIdUti())) {
        if ($amiDAO->existe($unUtilisateur->getIdUti(), $uti2->getIdUti())) {
            $message = "<p>Une demande d'ami est déjà en attente / a été refusé</p>";
        } else {
            $ami = new Ami($unUtilisateur, $uti2);
            $amiDAO->insert($ami);
            $message = "<p>Une demande d'ami a été envoyé</p>";
        }
    } else {
        $message = "<p>Pseudo inconnu. Essayez à nouveau.</p>";
    }
}

require_once "../view/ami.view.php";
?>