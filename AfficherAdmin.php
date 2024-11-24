<?php
    session_start(); // Activation des sessions
    if(isset($_SESSION['idAdmin'])){//S'il y a une session
        header('location: index.php');
        exit();
    }
    //connecter à la base de donnée
    include 'DbConnect.php';
    //la requete avec l'attribut query()
    $query = $pdo->prepare("SELECT * FROM admin");
    $query->execute();

    $admins = $query->fetchAll();
    $title="Affichage Admin";
    include "AfficherAdmin.phtml";
?>
