    <!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StickSpin</title>
        <link rel="stylesheet" href="../view/style/css/style.css">
    </head>
    <body>
        <header>
            <div class="logo" id="logo">
                <img src="../view/style/images/manette.png" alt="Logo">
            </div>
            <h1>StickSpin</h1>
            <div class="icones">
                <img id="amis" src="../view/style/images/amis.png" alt="Amis">
                <img id="notif" src="../view/style/images/notif.png" alt="Notifications">
                <img id="profil" src="../view/style/images/profil.png" alt="Profil">
            </div>
        </header>

        <main>
            <form action='' method='post'>

            <div class="game-preview">
                <img src="../view/style/images/jeu.png" alt="Aperçu du jeu">
                <h2>StickSpin</h2>
                <fieldset>
                        <legend>Authentification</legend>
                        <label>Identifiant : </label>
                        <input type="text" name="login" placeholder="Votre email" value=<?= $identifiants['login'] ?>>
                        <br/><br/>
                        <label>Mot de passe : </label>
                        <input type="password" name="motDePasse" placeholder="Votre mot de passe"
                            value=<?= $identifiants['motDePasse'] ?>>
                    </fieldset>
                <input type="submit" name="connexion" value="Connexion" />
                &emsp;
                <?= $message ?>
            </div>

            </form>
        </main>
    </body>
</html>