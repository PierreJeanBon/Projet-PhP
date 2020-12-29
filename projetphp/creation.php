<?php
include ('connexion.php');
if (!empty($_POST)) {
	$ok=true;
	$_POST['nom']=trim(utf8_decode($_POST['nom']));
	$_POST['prenom']=trim(utf8_decode($_POST['prenom']));
	$_POST['adressemail']=trim(utf8_decode($_POST['adressemail']));
	$_POST['motdepasse']=trim(utf8_decode($_POST['motdepasse']));
	if(empty($_POST['nom'])) {
		echo 'Vous devez renseigner le nom de l\'utilisateur.<br />';
		$ok=false;
	}
	elseif(empty($_POST['prenom'])) {
		echo 'Vous devez renseigner le prenom de l\'utilisateur.<br />';
		$ok=false;
	}
	elseif(empty($_POST['adressemail'])) {
		echo 'Vous devez renseigner le login de l\'utilisateur.<br />';
		$ok=false;
	}
	elseif(empty($_POST['motdepasse'])) {
		echo 'Vous devez renseigner le mot de passe de l\'utilisateur.<br />';
		$ok=false;
	}
	if($ok){
		$insert_stmt = $objPdo->prepare("INSERT INTO Redacteur (idredacteur, nom, prenom, adressemail, motdepasse) 
		VALUES(:id, :nom , :prenom , :adressemail , :motdepasse ) ");
		$insert_stmt->bindValue('id',NULL, PDO::PARAM_INT);
		$insert_stmt->bindValue('nom',$_POST['nom'], PDO::PARAM_STR);
		$insert_stmt->bindValue('prenom',$_POST['prenom'], PDO::PARAM_STR);
		$insert_stmt->bindValue('adressemail',$_POST['adressemail'], PDO::PARAM_STR);
		$insert_stmt->bindValue('motdepasse',$_POST['motdepasse'], PDO::PARAM_STR);
		$insert_stmt->execute();
	}
}
?>
<html>
<head>
<link rel="stylesheet" href="projet.css" type="text/css"/>
<meta charset="utf-8">
<title>Ajout</title>
</head>
<body>
<div class='crea'>
<form method='post'>
<h1>Ajouter un utilisateur</h1>
<label for="nom"> Nom de l'utilisateur : </label><input type="text" id="nom" name ="nom" size="30" placeholder="Saisir le nom de l'utilisateur" required><br/><br/>
<label for="prenom">Prenom de l'utilisateur : </label><input type="text" id="prenom" name ="prenom" size="30" placeholder="Saisir le prénom de l'utilisateur" required><br/><br/>
<label for="adressemail"> Adresse mail de l'utilisateur : </label><input type="text" id="adressemail" name ="adressemail" size="30" placeholder="Saisir une adresse mail" required><br/><br/>
<label for="motdepasse">Mot de passe : </label><input type="text" id="motdepasse" name ="motdepasse" size="30" placeholder="Saisir un mot de passe" required><br/><br/>
<INPUT TYPE="submit" NAME="Ajouter" VALUE="Ajouter">
</form>
<a href="accueiltest.php"> Retour à l'accueil</a>
</div>
</body>
</html>