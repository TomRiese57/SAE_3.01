<?php
session_start();

$email = $_SESSION['login'];

require_once "../model/utilisateurDAO.class.php";
require_once "../model/notificationDAO.class.php";

$utilisateurDAO = new UtilisateurDAO();
$notificationDAO = new NotificationDAO();

$unUtilisateur = $utilisateurDAO->getByEmail($email);
$idUti = $unUtilisateur->getIdUti();

$profil['pseudo'] = $unUtilisateur->getPseudo();
$profil['email'] = $email;

// Récupérer les notifications non lues
$notificationsNonLues = $notificationDAO->getNotifNonLues($idUti);

// Marquer une notification comme lue
if (isset($_POST['idNotif'])) {
    $idNotif = (int)$_POST['idNotif'];
    $notificationDAO->marquerCommeLue($idNotif);
}

require_once "../view/notification.view.php";
?>