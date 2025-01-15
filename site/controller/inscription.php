<?php
session_start();

require_once "../model/utilisateurDAO.class.php";
$utilisateurDAO = new UtilisateurDAO();
$lesUtilisateurs = $utilisateurDAO->getAll();
$identifiants['pseudo'] = isset($_POST['pseudo']) ? $_POST['pseudo'] : null; // à compléter pour ‘nettoyer’ le login
$identifiants['login'] = isset($_POST['login']) ? $_POST['login'] : null; // à compléter pour ‘nettoyer’ le login
$identifiants['motDePasse'] = isset($_POST['motDePasse']) ? $_POST['motDePasse'] : null; // et le mot de passe
$message = '';

function existeUtilisateurEmail(array $identifiants, array $lesUtilisateurs): bool {
    foreach ($lesUtilisateurs as $unUtilisateur) {
        if ($identifiants['login'] == $unUtilisateur->getEmail()) {
            $_SESSION['login'] = $identifiants['login'];
            return true;
        }
    }
    return false;
}

function existeUtilisateurPseudo(array $identifiants, array $lesUtilisateurs): bool {
    foreach ($lesUtilisateurs as $unUtilisateur) {
        if ($identifiants['pseudo'] == $unUtilisateur->getPseudo()) {
            $_SESSION['pseudo'] = $identifiants['pseudo'];
            return true;
        }
    }
    return false;
}

function estAdmin(array $identifiants) {
    $login = 'admin';
    $mdp = 'motdepasse';
    if ($identifiants['login'] == $login && $identifiants['motDePasse'] == $mdp) {
        $_SESSION['login'] = $identifiants['login'];
        return true;
    }
    return false;
}

if (isset($_POST['inscription'])) {
    // Validation des champs obligatoires
    if (empty($identifiants['pseudo']) || empty($identifiants['login']) || empty($identifiants['motDePasse'])) {
        $message = "<p>Veuillez remplir tous les champs.</p>";
    } elseif (!filter_var($identifiants['login'], FILTER_VALIDATE_EMAIL)) {
        $message = "<p>L'adresse email n'est pas valide.</p>";
    } elseif (strlen($identifiants['motDePasse']) < 10) {
        $message = "<p>Le mot de passe doit contenir au moins 10 caractères.</p>";
    } elseif (existeUtilisateurEmail($identifiants, $lesUtilisateurs)) {
        $message = "<p>Un compte existe déjà avec cet email.</p>";
    } elseif (existeUtilisateurPseudo($identifiants, $lesUtilisateurs)) {
        $message = "<p>Un compte existe déjà avec ce pseudo.</p>";
    } else {
        // Hachage du mot de passe avant de l'insérer dans la base de données
        $motDePasseHache = password_hash($identifiants['motDePasse'], PASSWORD_DEFAULT);

        // Création d'un nouvel utilisateur avec des valeurs par défaut pour les scores
        $nouvelUtilisateur = new Utilisateur(
            $identifiants['pseudo'],
            $identifiants['login'],
            $motDePasseHache,
        );

        // Insérer le nouvel utilisateur dans la base de données
        try {
            $utilisateurDAO->insert($nouvelUtilisateur);
            $message = "<p>Inscription réussie ! Vous pouvez maintenant vous connecter.</p>";
        } catch (Exception $e) {
            $message = "<p>Une erreur est survenue lors de l'inscription : " . $e->getMessage() . "</p>";
        }
    }
}

if (isset($_POST['connexion'])) {
    header("location: login.php");
}

require_once "../view/inscription.view.php";
?>  