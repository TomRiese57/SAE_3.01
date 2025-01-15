<?php
session_start();

require_once "../model/amiDAO.class.php";
require_once "../model/messageDAO.class.php";
require_once "../model/notificationDAO.class.php";
require_once "../model/scoreDAO.class.php";
require_once "../model/utilisateurDAO.class.php";

$amiDAO = new AmiDAO();
$messageDAO = new MessageDAO();
$notificationDAO = new NotificationDAO();
$scoreDAO = new ScoreDAO();
$utilisateurDAO = new UtilisateurDAO();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("location: login.php");
    exit();
}

$idUti = $_SESSION['id']; // ID de l'utilisateur connecté

// Supprimer l'utilisateur de la base de données
$amiDAO->deleteByIdUti($idUti);
$amiDAO->deleteByIdAmi($idUti);
$messageDAO->deleteByIdExp($idUti);
$messageDAO->deleteByIdRec($idUti);
$notificationDAO->deleteByIdUti($idUti);
$scoreDAO->deleteByIdUti($idUti);
$utilisateurDAO->delete($idUti);

// Détruire la session et rediriger après la suppression
session_destroy();
header("location: login.php");
exit();
?>