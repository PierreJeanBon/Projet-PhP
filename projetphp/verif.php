<?php
session_start();  // démarrage d'une session

// on vérifie que les données du formulaire sont présentes
if (isset($_POST['login']) && isset($_POST['mdp'])) {
    require 'fonctions.php';
    $bdd = getBdd();
    // cette requête permet de récupérer l'utilisateur depuis la BDD
    $requete = "SELECT * FROM Redacteur WHERE adressemail=? AND motdepasse=?";
    $resultat = $bdd->prepare($requete);
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $resultat->execute(array($login, $mdp));
	$result = $resultat->fetch();
    if ($resultat->rowCount() == 1) {
        // l'utilisateur existe dans la table
        // on ajoute ses infos en tant que variables de session
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
		//var_dump($result['idredacteur']);
		$_SESSION['idredacteur'] = $result['idredacteur'];
        // cette variable indique que l'authentification a réussi
        $authOK = true;
    }
}
?>

<!doctype html>
<html>
<link rel="stylesheet" href="projet.css" type="text/css"/>
<head>
    <meta charset="UTF-8" />
    <title>Résultat de l'authentification</title>
</head>
<body>
<div class='verif'>
    <h1>Résultat de l'authentification</h1>
    <?php
    if (isset($authOK)) {
        echo "<p>Vous avez été reconnu(e) en tant que " . escape($login) . "</p>";
        echo '<a href="accueiltest.php">Poursuivre vers la page d\'accueil</a>';
    }
    else { ?>
        <p>Vous n'avez pas été reconnu(e)</p>
        <p><a href="authentification.php">Nouvel essai</p>
    <?php } ?>
	</div>
</body>
</html>