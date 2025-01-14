<?php
session_start();

require_once "../model/utilisateurDAO.class.php";
$utilisateurDAO = new UtilisateurDAO();
$lesUtilisateurs = $utilisateurDAO->getAll();
$identifiants['login'] = isset($_POST['login']) ? $_POST['login'] : null; // à compléter pour ‘nettoyer’ le login
$identifiants['motDePasse'] = isset($_POST['motDePasse']) ? $_POST['motDePasse'] : null; // et le mot de passe
$message = '';

function existeUtilisateur(array $identifiants, array $lesUtilisateurs): bool {
    foreach ($lesUtilisateurs as $unUtilisateur) {
        if ($identifiants['login'] == $unUtilisateur->getEmail() && password_verify($identifiants['motDePasse'], $unUtilisateur->getMotDePasse())) {
            $_SESSION['login'] = $identifiants['login'];
            $_SESSION['id'] = $unUtilisateur->getIdUti();
            return true;
        }
    }
    return false;

}

if (isset($_POST['connexion'])) {
    if (existeUtilisateur($identifiants, $lesUtilisateurs)) {
        header("location: accueil.php");
    } else {
        $message = "<p>Identification incorrecte. Essayez de nouveau.</p>";
    }
}

if (isset($_POST['inscription'])) {
    header("location: inscription.php");
}

require_once "../view/login.view.php";
?>  