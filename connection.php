<?php
$serveur = "localhost"; 
$utilisateur = "root"; 
$motDePasse = ""; 
$baseDeDonnees = "marchesbenin";

function connex($baseDeDonnees) {
    global $serveur, $utilisateur, $motDePasse;

    $connexion = new mysqli($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    if ($connexion->connect_error) {
        die("Échec de la connexion à la base de données : " . $connexion->connect_error);
    } else {
        echo "";
    }

    return $connexion;
}

$connexion = connex($baseDeDonnees);


?>