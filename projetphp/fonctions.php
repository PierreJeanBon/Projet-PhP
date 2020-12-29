<?php

function escape($valeur)
{
    return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
}

function getBdd() {
    return new PDO('mysql:host=devbdd.iutmetz.univ-lorraine.fr;port=3306;dbname=bonazzi3u_projetphp','bonazzi3u_appli','31917299',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}