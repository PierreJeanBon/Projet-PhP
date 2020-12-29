<html>
<link rel="stylesheet" href="projet.css" type="text/css"/>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body><div class='authen'>
        <h1>Connexion utilisateur</h1>
        <form action="verif.php" method="post">
            <label for="nom">Adresse Mail :</label>
            <input type="text" name="login" id="nom" required />
            <label for="mdp">Mot de passe :</label>
            <input type="password" name="mdp" id="mdp" required />
            <input type="submit" value="Connexion"></br>
			<a href="accueiltest.php"> Retour à l'accueil</a>
			</div>
        </form>
    </body>
</html>