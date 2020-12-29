<?php
session_start();  // démarrage d'une session
include('fonctions.php');
include('connexion.php');
// on vérifie que les variables de session identifiant l'utilisateur existent
if (isset($_SESSION['login']) && isset($_SESSION['mdp'])) {
    $login = $_SESSION['login'];
    $mdp = $_SESSION['mdp'];
}
?>

<!doctype html>
<html>
    <head>
	<link rel="stylesheet" href="projet.css" type="text/css"/>
		<meta charset="UTF-8">
        <title>Accueil du site</title>
    </head>
    <body>
        <?php
        if (isset($login) && isset($mdp)) {
            echo "<div class='bienvenue'>Bienvenue " . escape($login) .  ".";
            echo "<h1>Accueil du site</h1></div>";
			echo "<div class='connexion'><a href=deconnexion.php style='text-decoration:none'> Déconnexion</a></br></br></div>";
			echo "<div class='creerarticle'><a href=creer.php style='text-decoration:none'> Créer un article</a></div></br></br>";
			echo "<div class='article'>";
		$result = $objPdo->query('select * from News, Redacteur where News.idredacteur=Redacteur.idredacteur ORDER BY idtheme');
		foreach ($result as $row )
		{
		echo "".$row ['titrenews']."</br>". $row ['textenews']."</br></br>"."Article rédigé par ". $row['nom'] . " " . $row['prenom'] . " / " . $row['datenews'] . "</br></br>";
		}
		echo "</div>";
        }
        else { ?>
<div class='bienvenue'><h1>Bienvenue sur le site d'actualités</h1>

<h3>Vous trouverez dans ce site de nombreux articles d'actualités sur des thèmes variés</h3></div></br>
           <div class='connexion'><a href="authentification.php">Se connecter</a></div>
		   <div class='creerarticle'><a href="creation.php"> Créer un compte</a></div></br>
		   <?php echo "<div class='article'>";
		$result = $objPdo->query('select * from News, Redacteur where News.idredacteur=Redacteur.idredacteur');
		foreach ($result as $row )
		{
		echo "".$row ['titrenews']."</br>". $row ['textenews']."</br></br>"."Article rédigé par ". $row['nom'] . " " . $row['prenom'] . " / " . $row['datenews'] . "</br></br>";
		}
echo "</div>"	
		   ?>
        <?php } ?>
    </body>
</html>