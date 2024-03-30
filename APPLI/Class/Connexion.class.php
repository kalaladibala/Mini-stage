<?php

// On définit les 4 variables nécessaires à la connexion MySQL :
    $hostname = "localhost";
    $user     = "root";
    $password = "";
    $nom_base_donnees = "ministages44_4";

    $mysqli = new mysqli($hostname, $user, $password, $nom_base_donnees);

// Vérifiez la connexion
if ($mysqli->connect_error) {
    die("Erreur de connexion à la base de données : " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8");

?>