<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StickSpin</title>
        <link rel="stylesheet" href="../view/style/css/style.css">
        <link rel="stylesheet" href="../view/style/css/accueil.css">
        <link rel="stylesheet" href="../view/style/css/profile.css">
        <link rel="stylesheet" href="../view/style/css/friend.css">
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
            <!-- Ami -->
            <div class="friends">
                <h2>Liste des amis</h2>
                <div class="friends-tab" id="friends-list">
                    <!-- Les amis seront chargés ici dynamiquement -->
                    <?php if (!empty($listeAmisAcceptes)): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Ami</th>
                                <th>Temps</th>
                                <th>Morts</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listeAmisAcceptes as $amiAccepte): ?>
                                <tr>
                                    <td><?= htmlspecialchars($amiAccepte['pseudo']) ?></td>
                                    <td><?= htmlspecialchars($amiAccepte['score_temps']) ?> sec</td>
                                    <td><?= htmlspecialchars($amiAccepte['score_morts']) ?></td>
                                    <td><?= htmlspecialchars($amiAccepte['date']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Vous n'avez pas encore d'amis.</p>
                <?php endif; ?>
                </div>

                <h2>Ajouter un ami</h2>
                <form method="post" action="">
                    <input type="text" name="idAmiAjout" placeholder="Pseudo de l'ami" required>
                    <input type="submit" name="ajouter" value="Ajouter">
                    <?= $message ?>
                </form>
            </div>
        </main>
    </body>

    <script src="../controller/script/accueil.js"></script>
    <script src="../controller/script/classement.js"></script>
    <script src="../controller/script/ami.js"></script>
    <script src="../controller/script/notif.js"></script>
    <script src="../controller/script/profil.js"></script>
    <script src="../controller/script/bouton_jouer.js"></script>
    <script src="../controller/script/controles.js"></script>
</html>