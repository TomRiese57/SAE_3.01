<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StickSpin</title>
        <link rel="stylesheet" href="../view/style/css/style.css">
        <link rel="stylesheet" href="../view/style/css/accueil.css">
        <link rel="stylesheet" href="../view/style/css/profile.css">
        <link rel="stylesheet" href="../view/style/css/notif.css">
    </head>
    <body>
        <header>
            <div class="logo" id="logo">
                <img src="../view/style/images/manette.png" alt="Logo">
                <h3>Accueil</h3>
            </div>  
            <h1>StickSpin</h1>
            <div class="icones">
                <img id="classement" src="../view/style/images/classement.png" alt="classement">
                <img id="ami" src="../view/style/images/amis.png" alt="Amis">
                <img id="notif" src="../view/style/images/notif.png" alt="Notifications">
                <img id="open-profile" src="../view/style/images/profil.png" alt="Profil">
            </div>
        </header>

        <main>
            <!-- Fenêtre modale Profil -->
            <div class="profile-overlay" id="profile-overlay">
                <div class="profile-container">
                    <button class="close-button-profile" id="close-profile">&times;</button>
                    <div class="profile-header">
                        <h1><?= $profil['pseudo'] ?></h1>
                        <p><?= $profil['email'] ?></p>
                    </div>
                    <div class="buttons-profile">
                        <button class="view-profile" id="view-profile">Voir le profil</button>
                        <button class="share-profile" id="share-profile">Partager le profil</button>
                    </div>
                    <ul class="ul-profile">
                        <li class="li-profile" id="open-profile-delete">Supprimé le compte</li>
                        <li class="li-profile" id="logout-profile">Déconnexion</li>
                    </ul>
                </div>
            </div>
            <!-- Fenêtre modale Suppression Profil -->
            <div class="profile-delete-overlay" id="profile-delete-overlay">
                <div class="profile-delete-container">
                    <button class="close-button-profile-delete" id="close-profile-delete">&times;</button>
                    <div class="profile-delete-header">
                        <h1>Confirmer la suppression</h1>
                        <p>Êtes-vous sûr de vouloir supprimer définitivement votre compte ?</p>
                    </div>
                    <div class="buttons-profile-delete">
                        <button class="share-profile" id="confirm-profile-delete">Confirmer</button>
                        <button class="share-profile" id="cancel-profile-delete">Annuler</button>
                    </div>
                </div>
            </div>
            <!-- Aperçu du jeu -->
            <div class="notifications">
                <h1>Vos Notifications</h1>

                <?php if (empty($notificationsNonLues)): ?>
                    <p>Aucune notification non lue.</p>
                <?php else: ?>
                    <!-- Demande d'amis -->
                    <h2 style="text-align: center;">Demande d'amis</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Contenu</th>
                                <th>Date</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($demandesAmisNonLues as $demandeAmi): ?>
                                <tr data-id="<?= $demandeAmi['id_notif'] ?>">
                                    <td><?= ucfirst(str_replace('_', ' ', $demandeAmi['type'])) ?></td>
                                    <td><?= htmlspecialchars($demandeAmi['contenu']) ?></td>
                                    <td><?= $demandeAmi['date'] ?></td>
                                    <td><img src="../view/style/images/accepter.png" id="accepter"></a></td>
                                    <td><img src="../view/style/images/refuser.png" id="refuser"></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Nouveau Meilleur Temps -->
                    <h2 style="text-align: center;">Nouveau Meilleur Temps</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Contenu</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($nouveauxMeilleursTempsNonLus as $nouveauMeilleurTemps): ?>
                                <tr data-id="<?= $nouveauMeilleurTemps['id_notif'] ?>">
                                    <td><?= ucfirst(str_replace('_', ' ', $nouveauMeilleurTemps['type'])) ?></td>
                                    <td><?= htmlspecialchars($nouveauMeilleurTemps['contenu']) ?></td>
                                    <td><?= $nouveauMeilleurTemps['date'] ?></td>
                                    <td><img src="../view/style/images/corbeille.png" id="marquerCommeLue"></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </main>
    </body>

    <script src="../controller/script/accueil.js"></script>
    <script src="../controller/script/classement.js"></script>
    <script src="../controller/script/ami.js"></script>
    <script src="../controller/script/notif.js"></script>
    <script src="../controller/script/profil.js"></script>
</html>