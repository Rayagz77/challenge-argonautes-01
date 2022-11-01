<?php

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

require "connect.php";


//On deternine le nombre total d'argonautes*/
$sql = 'SELECT COUNT(*) AS nb_argonautes FROM `argonautes`;';
//Preparation de la requete
$query = $db->prepare($sql);

//Execution de la requete
$query->execute();

//Recuperation du nombre total d'argonautes
$result = $query->fetch();

$nbArgonautes = (int) $result['nb_argonautes'];

//Determination du nombre d'argonautes par page
$parPage = 10;

//Calcul du nombre de pages total et arrondissement avec la fonction ceil()
$pages = ceil($nbArgonautes / $parPage);

//Calcul 1er argonaute de la page
$premier = ($currentPage * $parPage) - $parPage;

//Connexion et recuperation de la liste des argonautes
$sql = "SELECT * FROM `argonautes`ORDER BY `id` DESC LIMIT :premier, :parpage;";

//Preparation de la requete
$query = $db->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

//Execution de la requete
$query->execute();

//Recuperation des donnees dans un tableau associatif avec fetchAll()
$argonautes = $query->fetchAll(PDO::FETCH_ASSOC);

require "close.php";