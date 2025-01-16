<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StickSpin</title>
        <link rel="stylesheet" href="../view/style/css/style.css">
        <link rel="stylesheet" href="../view/style/css/accueil.css">
        <link rel="stylesheet" href="../view/style/css/profile.css">
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
                    <ul>
                        <?php foreach ($notificationsNonLues as $notif): ?>
                            <li>
                                <p><strong>Type :</strong> <?= ucfirst(str_replace('_', ' ', $notif['type'])) ?></p>
                                <p><strong>Contenu :</strong> <?= htmlspecialchars($notif['contenu']) ?></p>
                                <p><strong>Date :</strong> <?= $notif['date'] ?></p>
                                <form method="post" action="">
                                    <input type="hidden" name="idNotif" value="<?= $notif['id_notif'] ?>">
                                    <button type="submit">Marquer comme lue</button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
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