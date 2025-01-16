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
            <div class="game-preview">
                <img src="../view/style/images/jeu.png" alt="Aperçu du jeu">
                <h2>StickSpin</h2>
                <button id="play-button">JOUER MAINTENANT</button>
            </div>
            <!-- Fenêtre modale Contrôles -->
            <div class="controles">
                <img id="controles" src="../view/style/images/direction.png" alt="Contrôles">
                <h3>Contrôles</h3>
                <div id="controles-modal" class="controles-modal">
                    <div class="controles-content">
                        <span class="close">&times;</span>
                        <h2>Contrôles</h2>
                        <ul>
                            <li>Q ou flèche de gauche pour aller à gauche</li>
                            <li>D ou flèche de droite pour aller à droite</li> 
                            <li>Z ou flèche du haut ou barre espace pour sauter</li> 
                            <li>S ou flèche du bas pour ouvrir une porte</li> 
                            <li>A pour faire la map de 90° vers la gauche</li> 
                            <li>E pour faire la map de 90° vers la droite</li>
                        </ul>
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
    <script src="../controller/script/bouton_jouer.js"></script>
    <script src="../controller/script/controles.js"></script>
</html>