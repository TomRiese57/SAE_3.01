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
$demandesAmisNonLues = $notificationDAO->getDemandeAmisNonLues($idUti);
$nouveauxMeilleursTempsNonLus = $notificationDAO->getNouveauMeilleurTempsNonLus($idUti);
$messagesNonLus = $notificationDAO->getMessageNonLus($idUti);

$action = $_GET['action'] ?? '';
$notifId = $_GET['notifId'] ?? null;

if ($action && $notifId) {
    switch ($action) {
        case 'accept':
            $notificationDAO->accepterDemande($notifId);
            break;
        case 'decline':
            $notificationDAO->refuserDemande($notifId);
            break;
        case 'markAsRead':
            $notificationDAO->marquerCommeLue($notifId);
            break;
        default:
            http_response_code(400);
            echo "Action non reconnue.";
            exit;
    }
} else {
    http_response_code(400);
}

require_once "../view/notification.view.php";
?>