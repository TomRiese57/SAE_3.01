<?php
session_start();

require_once "../modele/clientDAO.class.php";
$clientDAO = new ClientDAO();
$lesClients = $clientDAO->getAll();
$identifiants['login'] = isset($_POST['login']) ? $_POST['login'] : null; // à compléter pour ‘nettoyer’ le login
$identifiants['motDePasse'] = isset($_POST['motDePasse']) ? $_POST['motDePasse'] : null; // et le mot de passe
$message = '';

function existeUtilisateur(array $identifiants, array $lesClients): bool
{
    foreach ($lesClients as $unClient) {
        if ($identifiants['login'] == $unClient->getId() && $identifiants['motDePasse'] == $unClient->getMotDePasse()) {
            $_SESSION['login'] = $identifiants['login'];
            return true;
        }
    }
    return false;

}

function estAdmin(array $identifiants)
{
    $login = 'admin';
    $mdp = 'motdepasse';
    if ($identifiants['login'] == $login && $identifiants['motDePasse'] == $mdp) {
        $_SESSION['login'] = $identifiants['login'];
        return true;
    }
    return false;
}

if (isset($_POST['connexion'])) {
    if (existeUtilisateur($identifiants, $lesClients)) {
        header("location: factures.php?id=" . $identifiants['login']);
    } else if (estAdmin($identifiants)) {
        header("location: factures.php?admin=" . $identifiants['login']);
    } else {
        $message = "<p class = rouge>Identification incorrecte. Essayez de nouveau.</p>";
    }

}

require_once "../vue/login.view.php";
?>