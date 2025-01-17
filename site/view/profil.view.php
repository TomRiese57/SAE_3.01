<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil de <?= $profil['pseudo'] ?></title>
        <link rel="stylesheet" href="../view/style/css/style.css">
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
            <!-- Fenêtre modale Amis -->
            <!-- Fenêtre modale Notifications -->
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
                        <li class="li-profile" id="delete-profile">Supprimé le compte</li>
                        <li class="li-profile" id="logout-profile">Déconnexion</li>
                    </ul>
                </div>
            </div>
            <!-- Statistiques -->
            <div class="game-preview">
                <div class="profile-info">
                    <h2><?= $profil['pseudo'] ?></h2>
                </div>
                <div class="stats" style="display: flex;">
                    <div class="stat">
                        <img src="../view/style/images/amis.png">
                        <p>Amis</p>
                        <p><?= $profil['amis'] ?></p>
                    </div>
                    <div class="stat">
                        <img src="../view/style/images/calendrier.png">
                        <p>Membres depuis</p>
                        <p><?= $profil['date'] ?></p>
                    </div>
                    <div class="stat">
                        <img src="../view/style/images/classement.png">
                        <p>Classement</p>
                        <p><?= $profil['classement'] ?></p>
                    </div>
                    <div class="stat">
                        <img src="../view/style/images/temps.png">
                        <p>Meilleur temps</p>
                        <p><?= $profil['temps'] ?> sec</p>
                    </div>
                    <div class="stat">
                        <img src="../view/style/images/mort.png">
                        <p>Morts Totales</p>
                        <p><?= $profil['morts'] ?></p>
                    </div>
                </div>
            </div>
        </main>
    </body>

    <script src="../controller/script/accueil.js"></script>
    <script src="../controller/script/classement.js"></script>
    <script src="../controller/script/ami.js"></script>
    <script src="../controller/script/notif.js"></script>
    <script src="../controller/script/profil.js"></script>
</html>