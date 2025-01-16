<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StickSpin</title>
        <link rel="stylesheet" href="../view/style/css/style.css">
        <link rel="stylesheet" href="../view/style/css/accueil.css">
        <link rel="stylesheet" href="../view/style/css/profile.css">
        <link rel="stylesheet" href="../view/style/css/classement.css">
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
            <div class="classement">
            <h1 style="text-align: center;">Classement</h1>

                <!-- Top 10 meilleurs temps -->
                <h2 style="text-align: center;">Top 10 des Meilleurs Temps</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Utilisateur</th>
                            <th>Temps</th>
                            <th>Morts</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($top10MeilleursTemps as $index => $score): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($score['pseudo']) ?></td>
                                <td><?= htmlspecialchars($score['temps']) ?> sec</td>
                                <td><?= htmlspecialchars($score['morts']) ?></td>
                                <td><?= htmlspecialchars($score['date']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Nombre de morts totales -->
                <h2 style="text-align: center;">Nombre Total de Morts</h2>
                <p style="text-align: center;">
                    <?= $nombreMortsTotales ?> morts totales.
                </p>

                <!-- Nombre de temps totals -->
                <h2 style="text-align: center;">Nombre Total de Temps Enregistrés</h2>
                <p style="text-align: center;">
                    <?= $nombreTempsTotals ?> temps enregistrés au total.
                </p>

                <!-- Meilleur temps du jour -->
                <h2 style="text-align: center;">Meilleur Temps du Jour</h2>
                <?php if ($meilleurTempsJour): ?>
                    <p style="text-align: center;">
                        <strong><?= htmlspecialchars($meilleurTempsJour['pseudo']) ?></strong> 
                        a réalisé le meilleur temps aujourd'hui avec <strong><?= $meilleurTempsJour['temps'] ?></strong> sec et 
                        <strong><?= $meilleurTempsJour['morts'] ?></strong> morts.
                    </p>
                <?php else: ?>
                    <p style="text-align: center;">Aucun score enregistré aujourd'hui.</p>
                <?php endif; ?>

                <!-- Nombre de morts du jour -->
                <h2 style="text-align: center;">Nombre Total de Morts du Jour</h2>
                <p style="text-align: center;">
                    <?= $nombreMortsJour ?> mort(s) aujourd'hui.
                </p>

                <!-- Nombre de scores enregistrés du jour -->
                <h2 style="text-align: center;">Nombre de Temps Enregistrés Aujourd'hui</h2>
                <p style="text-align: center;">
                    <?= $nombreTempsJour ?> temps enregistré(s) aujourd'hui.
                </p>
            </div>
        </main>
    </body>

    <script src="../controller/script/accueil.js"></script>
    <script src="../controller/script/classement.js"></script>
    <script src="../controller/script/ami.js"></script>
    <script src="../controller/script/notif.js"></script>
    <script src="../controller/script/profil.js"></script>
</html>