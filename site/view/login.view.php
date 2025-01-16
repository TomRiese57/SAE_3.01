    <!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StickSpin</title>
        <link rel="stylesheet" href="../view/style/css/style.css">
        <link rel="stylesheet" href="../view/style/css/login.css">
        <link rel="stylesheet" href="../view/style/css/accueil.css">
    </head>
    <body>
        <main>
            <form action='' method='post'>
                <div class="game-preview">
                    <img src="../view/style/images/jeu.png" alt="Aperçu du jeu">
                    <h2>StickSpin</h2>
                    <fieldset>
                        <legend>Authentification</legend>
                        <label>Email : </label>
                        <input type="text" name="login" placeholder="Votre email" value=<?= $identifiants['login'] ?>>
                        <br/><br/>
                        <label>Mot de passe : </label>
                        <input type="password" name="motDePasse" placeholder="Votre mot de passe"
                            value=<?= $identifiants['motDePasse'] ?>>
                    </fieldset>
                    <br>
                    &emsp;
                    <input type="submit" name="connexion" value="Se connecter" />
                    &emsp;
                    <input type="submit" name="inscription" value="Inscription" />
                    &emsp;
                    <?= $message ?>
                </div>
            </form>
        </main>
    </body>
</html>