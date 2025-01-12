<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stick Spin</title>
        <link rel="stylesheet" href="../view/style/css/style.css">
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="../view/style/images/manette.png" alt="Logo">
            </div>
            <h1>Stick Spin</h1>
            <div class="icones">
                <img id="amis" src="../view/style/images/amis.png" alt="Amis">
                <img id="notif" src="../view/style/images/notif.png" alt="Notifications">
                <img id="profil" src="../view/style/images/profil.png" alt="Profil">
            </div>
        </header>

        <main>
            <div class="game-preview">
                <img src="../view/style/images/jeu.png" alt="Aperçu du jeu">
                <h2>StickSpin</h2>
                <button id="play-button">JOUER MAINTENANT</button>
            </div>
            <div class="controles">
                <img id="controles" src="../view/style/images/fleches_directionnelles_blanches.png" alt="Contrôles">
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

    <script src="../controller/script/amis.js"></script>
    <script src="../controller/script/notif.js"></script>
    <script src="../controller/script/profil.js"></script>
    <script src="../controller/script/bouton_jouer.js"></script>
    <script src="../controller/script/controles.js"></script>
</html>