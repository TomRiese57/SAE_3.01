    <!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>StickSpin</title>
        <link rel="stylesheet" href="../view/style/css/style.css">
        <link rel="stylesheet" href="../view/style/css/login.css">
    </head>
    <body>
        <header>
            <div class="logo" id="logo">
                <img src="../view/style/images/manette.png" alt="Logo">
            </div>  
            <h1>StickSpin</h1>
        </header>
        
        <main>
            <form action='' method='post'>
                <div class="login">
                    <img src="../view/style/images/jeu.png" alt="Aperçu du jeu">
                    <h2>StickSpin</h2>
                    <fieldset>
                        <legend>Connexion</legend>
                        <label>Email : </label>
                        <input type="text" name="login" placeholder="Votre email">
                        <br/><br/>
                        <label>Mot de passe : </label>
                        <input type="password" name="motDePasse" placeholder="Votre mot de passe">
                    </fieldset>
                    <br>
                    &emsp;
                    <input type="submit" name="connexion" value="Se connecter"/>
                    &emsp;
                    <input type="submit" name="inscription" value="Inscription"/>
                    &emsp;
                    <?= $message ?>
                </div>
            </form>
        </main>
    </body>
</html>