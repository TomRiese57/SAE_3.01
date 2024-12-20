<?php
require_once './model/connexion.php';
require_once './model/utilisateur.class.php';
require_once './model/utilisateurDAO.class.php';

function runTests() {
    $dao = new UtilisateurDAO();

    // Création d'un utilisateur de test
    $utilisateur = new Utilisateur();
    $utilisateur->setIdUti(1);
    $utilisateur->setPseudoUti('TestUser');
    $utilisateur->setEmailUti('testuser@example.com');
    $utilisateur->setMotDePasseUti('password123');
    $utilisateur->setMeilleurTempsUti(120);
    $utilisateur->setDateCreationUti(date('Y-m-d H:i:s'));

    // Test de l'insertion
    $dao->insert($utilisateur);
    assert($dao->existe(1) === true, "L'utilisateur devrait exister après l'insertion.");

    // Test de récupération par ID
    $utilisateurRecupere = $dao->getById(1);
    assert($utilisateurRecupere->getPseudoUti() === "TestUser", "Le pseudo de l'utilisateur récupéré doit être 'TestUser'.");

    // Test de mise à jour
    $utilisateur->setPseudoUti('UpdatedUser');
    $dao->update($utilisateur);
    $utilisateurMisAJour = $dao->getById(1);
    assert($utilisateurMisAJour->getPseudoUti() === 'UpdatedUser', "Le pseudo de l'utilisateur mis à jour doit être 'UpdatedUser'.");

    // Test de récupération de tous les utilisateurs
    $utilisateurs = $dao->getAll();
    assert(count($utilisateurs) > 0, "Il devrait y avoir au moins un utilisateur dans la base de données.");

    // Test de suppression
    $dao->delete(1);
    assert($dao->existe(1) === false, "L'utilisateur ne devrait plus exister après la suppression.");

    echo "Tous les tests ont été passés avec succès.\n";
}

// Exécution des tests
runTests();
?>

