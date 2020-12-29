<?php session_start();
include ('connexion.php');
include ('fonctions.php');	
	$idredacteur=$_SESSION['idredacteur'];
	date_default_timezone_get('Europe/Paris');
	$datenews=date('d-m-y h:i:s');
	//var_dump($_SESSION['idredacteur']);
if (!empty($_POST)) {
	$ok=true;
	if(empty($_POST['titrenews'])) {
		echo 'Vous devez renseigner le titre de l\'article.<br />';
		$ok=false;
	}
	elseif(empty($_POST['textenews'])) {
		echo 'Vous devez renseigner le corps de l\'article.<br />';
		$ok=false;
	}
//var_dump('textenews');
//var_dump('titrenews');
//var_dump('idredacteur');
	if($ok){
		$insert_stmt = $objPdo->prepare("insert into News (idtheme, titrenews, datenews, textenews, idredacteur) 
		values(:idtheme , :titrenews , :datenews , :textenews, :idredacteur ) ");
		$insert_stmt->bindValue(':idtheme',$_POST['idtheme'], PDO::PARAM_INT);
		$insert_stmt->bindValue(':titrenews',$_POST['titrenews'], PDO::PARAM_STR);
		$insert_stmt->bindValue(':datenews',$datenews, PDO::PARAM_STR);
		$insert_stmt->bindValue(':textenews',$_POST['textenews'], PDO::PARAM_STR);
		$insert_stmt->bindValue(':idredacteur',$idredacteur, PDO::PARAM_INT);
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
<div class='creer'>
<form method='post'>
<h1>Ajouter un article</h1>
<label for="titrenews"> Titre de l'article : </label><input type="text" id="titrenews" name ="titrenews" size="30" placeholder="Saisir le titre de l'article" required><br/><br/>
<label for="textenews">  Corps de l'article : </label><input type="text" id="textenews" name ="textenews" size="100" placeholder="Saisir le corps de l'article" required><br/><br/>
<label for="idtheme"> Sélection du thème : </label><select name="idtheme"><option value="1">Jeux Vidéos</option><option value="2">Sport</option><option value="3">Musique</option><option value="4">Automobile</option></select>
<INPUT TYPE="submit" NAME="Ajouter" VALUE="Ajouter">
</br>
<a href="accueiltest.php"> Retour à l'accueil</a>
</form>
</div>
</body>
</html>