<?php

//Script permettant la connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;'
            . 'dbname=inscription', //On définit le nom de la base de données
            'root', //Le nom d'utilisateur
            'test'); //Le mot de passe
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
