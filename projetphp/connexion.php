<html>

<?php
try 
{
	$objPdo = new PDO ('mysql:host=devbdd.iutmetz.univ-lorraine.fr;port=3306;dbname=bonazzi3u_projetphp','bonazzi3u_appli','31917299');
		//echo "Connexion réussie<br/>\n";
}
catch(Exception $exception)
{
		die($exception->$getMessage());
}
?>			
</html>