<?php

require "connect.php";

//Traitement du formulaire d'ajout
if (!empty($_POST)) {
    //Si $_POST n'est pas vide on verifie que tous les champs soient remplis avant validation
    if (
        isset($_POST["name"], $_POST["description"]) && !empty($_POST["name"]) && !empty($_POST["description"])
    ) {
        /*
         *Si le formulaire est complet on recupere les donnees saisis en les protégeant
         *On retire toute balise du nom et description
         */
        $name = strip_tags($_POST["name"]);
        //On neutralise toute balise de la description
        $description = htmlspecialchars($_POST["description"]);

        //Connexion et recuperation de la liste des argonautes
        $sql = "INSERT INTO `argonautes`(`name`, `description`) VALUES (:name, :description)";
        //Preparation de la requete
        $query = $db->prepare($sql);

        //Injonction des valeurs
        $query->bindValue(":name", $name, PDO::PARAM_STR);
        $query->bindValue(":description", $description, PDO::PARAM_STR);

        //Execution de la requete
        if (!$query->execute()) {
            die("La requête n'est pas abouti");
        }
        //recuperation de l'id de l'argonaute ajoute
        $id = $db->lastInsertId();
        die("Ajout effectué avec succès de l'argonaute $name");
    } else {
        die("Veuillez remplir tous les champs");
    }
}
require "close.php";