<?php

//DSN de connexion
$dsn = "mysql:dbname=db_Argo_php;host=localhost";

//Connexion a la base de donees 
try {

    //Instanciation de PDOE
    $db = new PDO($dsn, "root", "");

    //Envoyer les donnees en UTF8
    $db->exec("SET NAMES utf8");
} catch (PDOException $e) {
    die("Erreur:" . $e->getMessage());
}