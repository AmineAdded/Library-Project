<?php
    //connecter à la base de donnée
    include 'DbConnect.php';
    //la requete avec l'attribut query()
    $query = $pdo->prepare("SELECT * FROM admin");
    $query->execute();

    $admins = $query->fetchAll();
    $template="AfficherAdmin";
    $title="Affichage Admin";
    include "layout.phtml";
?>
